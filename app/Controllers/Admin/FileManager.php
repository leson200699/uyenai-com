<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class FileManager extends BaseController
{
    private $uploadPath;
    private $webPath;

    public function __construct()
    {
        $this->uploadPath = WRITEPATH . '../public/uploads/';
        $this->webPath = '/uploads/';
        
        // Create uploads directory if it doesn't exist
        if (!is_dir($this->uploadPath)) {
            mkdir($this->uploadPath, 0755, true);
        }
        
        // Ensure directory is writable
        if (!is_writable($this->uploadPath)) {
            chmod($this->uploadPath, 0755);
        }
    }

    public function index()
    {
        $mode = $this->request->getGet('mode');
        
        if ($mode === 'select') {
            return view('admin/filemanager/selector');
        }
        
        return view('admin/filemanager/index');
    }

    public function browse()
    {
        $path = $this->request->getGet('path') ?: '';
        $fullPath = $this->uploadPath . $path;
        
        // Security check
        if (!$this->isPathSafe($fullPath)) {
            return $this->response->setJSON(['error' => 'Invalid path']);
        }

        if (!is_dir($fullPath)) {
            return $this->response->setJSON(['error' => 'Directory not found']);
        }

        $items = [];
        $files = scandir($fullPath);
        
        foreach ($files as $file) {
            if ($file === '.' || $file === '..') continue;
            
            $filePath = $fullPath . $file;
            $webFilePath = $this->webPath . $path . $file;
            
            $item = [
                'name' => $file,
                'path' => $path . $file,
                'webPath' => $webFilePath,
                'type' => is_dir($filePath) ? 'folder' : 'file',
                'size' => is_file($filePath) ? filesize($filePath) : 0,
                'modified' => date('Y-m-d H:i:s', filemtime($filePath))
            ];
            
            if ($item['type'] === 'file') {
                $item['extension'] = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                $item['isImage'] = in_array($item['extension'], ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg']);
            }
            
            $items[] = $item;
        }
        
        // Sort: folders first, then files
        usort($items, function($a, $b) {
            if ($a['type'] !== $b['type']) {
                return $a['type'] === 'folder' ? -1 : 1;
            }
            return strcmp($a['name'], $b['name']);
        });

        return $this->response->setJSON([
            'path' => $path,
            'items' => $items
        ]);
    }

    public function upload()
    {
        try {
            $path = $this->request->getPost('path') ?: '';
            $fullPath = $this->uploadPath . $path;
            
            if (!$this->isPathSafe($fullPath)) {
                return $this->response->setJSON(['error' => 'Invalid path']);
            }

            if (!is_dir($fullPath)) {
                if (!mkdir($fullPath, 0755, true)) {
                    return $this->response->setJSON(['error' => 'Failed to create directory']);
                }
            }

            $files = $this->request->getFiles();
            $uploadedFiles = [];
            
            if (!isset($files['files'])) {
                return $this->response->setJSON(['error' => 'No files uploaded']);
            }

            foreach ($files['files'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    // Check file type
                    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg', 'pdf', 'doc', 'docx'];
                    $extension = strtolower($file->getClientExtension());
                    
                    if (!in_array($extension, $allowedTypes)) {
                        continue;
                    }
                    
                    // Generate unique filename
                    $fileName = $file->getClientName();
                    $baseName = pathinfo($fileName, PATHINFO_FILENAME);
                    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                    
                    $counter = 1;
                    while (file_exists($fullPath . $fileName)) {
                        $fileName = $baseName . '_' . $counter . '.' . $ext;
                        $counter++;
                    }
                    
                    if ($file->move($fullPath, $fileName)) {
                        $uploadedFiles[] = [
                            'name' => $fileName,
                            'path' => $path . $fileName,
                            'webPath' => $this->webPath . $path . $fileName,
                            'size' => filesize($fullPath . $fileName)
                        ];
                    } else {
                        log_message('error', 'Failed to move uploaded file: ' . $file->getError());
                    }
                } else {
                    log_message('error', 'File upload error: ' . $file->getError());
                }
            }

            if (empty($uploadedFiles)) {
                return $this->response->setJSON(['error' => 'No valid files were uploaded']);
            }

            return $this->response->setJSON([
                'success' => true,
                'files' => $uploadedFiles
            ]);
            
        } catch (\Exception $e) {
            log_message('error', 'FileManager upload error: ' . $e->getMessage());
            return $this->response->setJSON(['error' => 'Upload failed: ' . $e->getMessage()]);
        }
    }

    public function createFolder()
    {
        $path = $this->request->getPost('path') ?: '';
        $folderName = $this->request->getPost('name');
        
        if (!$folderName) {
            return $this->response->setJSON(['error' => 'Folder name is required']);
        }
        
        // Sanitize folder name
        $folderName = preg_replace('/[^a-zA-Z0-9_-]/', '_', $folderName);
        
        $fullPath = $this->uploadPath . $path . $folderName;
        
        if (!$this->isPathSafe($fullPath)) {
            return $this->response->setJSON(['error' => 'Invalid path']);
        }

        if (is_dir($fullPath)) {
            return $this->response->setJSON(['error' => 'Folder already exists']);
        }

        if (mkdir($fullPath, 0755, true)) {
            return $this->response->setJSON([
                'success' => true,
                'folder' => [
                    'name' => $folderName,
                    'path' => $path . $folderName . '/'
                ]
            ]);
        }

        return $this->response->setJSON(['error' => 'Failed to create folder']);
    }

    public function delete()
    {
        $path = $this->request->getPost('path');
        
        if (!$path) {
            return $this->response->setJSON(['error' => 'Path is required']);
        }
        
        $fullPath = $this->uploadPath . $path;
        
        if (!$this->isPathSafe($fullPath)) {
            return $this->response->setJSON(['error' => 'Invalid path']);
        }

        if (!file_exists($fullPath)) {
            return $this->response->setJSON(['error' => 'File or folder not found']);
        }

        if (is_dir($fullPath)) {
            if ($this->deleteDirectory($fullPath)) {
                return $this->response->setJSON(['success' => true]);
            }
        } else {
            if (unlink($fullPath)) {
                return $this->response->setJSON(['success' => true]);
            }
        }

        return $this->response->setJSON(['error' => 'Failed to delete']);
    }

    public function rename()
    {
        $oldPath = $this->request->getPost('oldPath');
        $newName = $this->request->getPost('newName');
        
        if (!$oldPath || !$newName) {
            return $this->response->setJSON(['error' => 'Path and new name are required']);
        }
        
        $fullOldPath = $this->uploadPath . $oldPath;
        $dir = dirname($fullOldPath);
        $fullNewPath = $dir . '/' . $newName;
        
        if (!$this->isPathSafe($fullOldPath) || !$this->isPathSafe($fullNewPath)) {
            return $this->response->setJSON(['error' => 'Invalid path']);
        }

        if (!file_exists($fullOldPath)) {
            return $this->response->setJSON(['error' => 'File not found']);
        }

        if (file_exists($fullNewPath)) {
            return $this->response->setJSON(['error' => 'File with new name already exists']);
        }

        if (rename($fullOldPath, $fullNewPath)) {
            return $this->response->setJSON(['success' => true]);
        }

        return $this->response->setJSON(['error' => 'Failed to rename']);
    }

    private function isPathSafe($path)
    {
        $realPath = realpath($path) ?: $path;
        $uploadRealPath = realpath($this->uploadPath);
        
        return strpos($realPath, $uploadRealPath) === 0;
    }

    private function deleteDirectory($dir)
    {
        if (!is_dir($dir)) {
            return false;
        }

        $files = array_diff(scandir($dir), ['.', '..']);
        
        foreach ($files as $file) {
            $path = $dir . '/' . $file;
            if (is_dir($path)) {
                $this->deleteDirectory($path);
            } else {
                unlink($path);
            }
        }
        
        return rmdir($dir);
    }
} 