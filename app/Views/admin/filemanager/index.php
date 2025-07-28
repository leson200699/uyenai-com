<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?= csrf_hash() ?>">
    <title>File Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .file-item:hover { background-color: #f3f4f6; }
        .file-item.selected { background-color: #dbeafe; border-color: #3b82f6; }
        .drop-zone.drag-over { background-color: #f0f9ff; border-color: #0ea5e9; }
    </style>
</head>
<body class="bg-gray-100">
    <div class="h-screen flex flex-col">
        <!-- Header -->
        <div class="bg-white border-b px-6 py-4">
            <div class="flex items-center justify-between">
                <h1 class="text-xl font-bold text-gray-900">File Manager</h1>
                <div class="flex space-x-2">
                    <button id="createFolderBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">
                        <i class="fas fa-folder-plus mr-2"></i>Tạo thư mục
                    </button>
                    <button id="uploadBtn" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm">
                        <i class="fas fa-upload mr-2"></i>Upload
                    </button>
                </div>
            </div>
            
            <!-- Breadcrumb -->
            <nav class="mt-3">
                <ol id="breadcrumb" class="flex items-center space-x-2 text-sm text-gray-500">
                    <li><a href="#" data-path="" class="hover:text-blue-600">Root</a></li>
                </ol>
            </nav>
        </div>

        <!-- Content -->
        <div class="flex-1 flex">
            <!-- File List -->
            <div class="flex-1 p-6">
                <div id="dropZone" class="drop-zone border-2 border-dashed border-gray-300 rounded-lg p-8 text-center h-full">
                    <div id="loadingSpinner" class="hidden">
                        <i class="fas fa-spinner fa-spin text-4xl text-gray-400 mb-4"></i>
                        <p class="text-gray-500">Loading...</p>
                    </div>
                    
                    <div id="fileGrid" class="grid grid-cols-4 gap-4 h-full overflow-y-auto">
                        <!-- Files will be loaded here -->
                    </div>
                    
                    <div id="emptyState" class="hidden">
                        <i class="fas fa-folder-open text-6xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500 text-lg mb-2">Thư mục trống</p>
                        <p class="text-gray-400">Kéo thả file vào đây hoặc click Upload để thêm file</p>
                    </div>
                </div>
            </div>

            <!-- Preview Panel -->
            <div class="w-80 bg-white border-l p-6">
                <div id="previewPanel" class="hidden">
                    <h3 class="text-lg font-semibold mb-4">Chi tiết file</h3>
                    <div id="previewContent">
                        <!-- Preview will be shown here -->
                    </div>
                    <div class="mt-6 space-y-3">
                        <button id="selectFileBtn" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg">
                            <i class="fas fa-check mr-2"></i>Chọn file này
                        </button>
                        <button id="renameBtn" class="w-full bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg">
                            <i class="fas fa-edit mr-2"></i>Đổi tên
                        </button>
                        <button id="deleteBtn" class="w-full bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg">
                            <i class="fas fa-trash mr-2"></i>Xóa
                        </button>
                    </div>
                </div>
                
                <div id="noSelection" class="text-center text-gray-500">
                    <i class="fas fa-mouse-pointer text-4xl mb-4"></i>
                    <p>Chọn một file để xem chi tiết</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden file input -->
    <input type="file" id="fileInput" multiple accept="image/*,application/pdf,.doc,.docx" style="display: none;">

    <!-- Modals -->
    <div id="createFolderModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 w-96">
            <h3 class="text-lg font-semibold mb-4">Tạo thư mục mới</h3>
            <input type="text" id="folderNameInput" placeholder="Tên thư mục..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <div class="mt-4 flex space-x-3">
                <button id="confirmCreateFolder" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Tạo</button>
                <button id="cancelCreateFolder" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">Hủy</button>
            </div>
        </div>
    </div>

    <div id="renameModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 w-96">
            <h3 class="text-lg font-semibold mb-4">Đổi tên</h3>
            <input type="text" id="renameInput" placeholder="Tên mới..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <div class="mt-4 flex space-x-3">
                <button id="confirmRename" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Đổi tên</button>
                <button id="cancelRename" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">Hủy</button>
            </div>
        </div>
    </div>

    <script>
        const FileManager = {
            currentPath: '',
            selectedFile: null,
            
            init() {
                this.bindEvents();
                this.loadFiles();
            },
            
            bindEvents() {
                // Upload button
                document.getElementById('uploadBtn').addEventListener('click', () => {
                    document.getElementById('fileInput').click();
                });
                
                // File input change
                document.getElementById('fileInput').addEventListener('change', (e) => {
                    this.uploadFiles(e.target.files);
                });
                
                // Create folder
                document.getElementById('createFolderBtn').addEventListener('click', () => {
                    this.showCreateFolderModal();
                });
                
                // Modal events
                document.getElementById('confirmCreateFolder').addEventListener('click', () => {
                    this.createFolder();
                });
                
                document.getElementById('cancelCreateFolder').addEventListener('click', () => {
                    this.hideCreateFolderModal();
                });
                
                document.getElementById('confirmRename').addEventListener('click', () => {
                    this.renameFile();
                });
                
                document.getElementById('cancelRename').addEventListener('click', () => {
                    this.hideRenameModal();
                });
                
                // File actions
                document.getElementById('selectFileBtn').addEventListener('click', () => {
                    this.selectFile();
                });
                
                document.getElementById('renameBtn').addEventListener('click', () => {
                    this.showRenameModal();
                });
                
                document.getElementById('deleteBtn').addEventListener('click', () => {
                    this.deleteFile();
                });
                
                // Drag and drop
                const dropZone = document.getElementById('dropZone');
                
                dropZone.addEventListener('dragover', (e) => {
                    e.preventDefault();
                    dropZone.classList.add('drag-over');
                });
                
                dropZone.addEventListener('dragleave', () => {
                    dropZone.classList.remove('drag-over');
                });
                
                dropZone.addEventListener('drop', (e) => {
                    e.preventDefault();
                    dropZone.classList.remove('drag-over');
                    this.uploadFiles(e.dataTransfer.files);
                });
            },
            
            async loadFiles(path = '') {
                this.currentPath = path;
                this.showLoading();
                
                try {
                    const response = await fetch(`/admin/filemanager/browse?path=${encodeURIComponent(path)}`);
                    const data = await response.json();
                    
                    if (data.error) {
                        throw new Error(data.error);
                    }
                    
                    this.renderFiles(data.items);
                    this.updateBreadcrumb(path);
                    this.hideLoading();
                } catch (error) {
                    console.error('Error loading files:', error);
                    this.hideLoading();
                }
            },
            
            renderFiles(items) {
                const fileGrid = document.getElementById('fileGrid');
                const emptyState = document.getElementById('emptyState');
                
                if (items.length === 0) {
                    fileGrid.innerHTML = '';
                    emptyState.classList.remove('hidden');
                    return;
                }
                
                emptyState.classList.add('hidden');
                
                fileGrid.innerHTML = items.map(item => `
                    <div class="file-item border border-gray-200 rounded-lg p-4 cursor-pointer" data-item='${JSON.stringify(item)}'>
                        <div class="text-center">
                            ${item.type === 'folder' 
                                ? '<i class="fas fa-folder text-4xl text-yellow-500 mb-2"></i>'
                                : item.isImage 
                                    ? `<img src="${item.webPath}" alt="${item.name}" class="w-16 h-16 object-cover mx-auto mb-2 rounded">`
                                    : '<i class="fas fa-file text-4xl text-gray-400 mb-2"></i>'
                            }
                            <p class="text-sm font-medium truncate" title="${item.name}">${item.name}</p>
                            ${item.type === 'file' ? `<p class="text-xs text-gray-500">${this.formatFileSize(item.size)}</p>` : ''}
                        </div>
                    </div>
                `).join('');
                
                // Bind click events
                document.querySelectorAll('.file-item').forEach(item => {
                    item.addEventListener('click', () => {
                        const itemData = JSON.parse(item.dataset.item);
                        if (itemData.type === 'folder') {
                            this.loadFiles(itemData.path + '/');
                        } else {
                            this.selectFileItem(item, itemData);
                        }
                    });
                });
            },
            
            selectFileItem(element, itemData) {
                // Remove previous selection
                document.querySelectorAll('.file-item').forEach(item => {
                    item.classList.remove('selected');
                });
                
                // Add selection to current item
                element.classList.add('selected');
                this.selectedFile = itemData;
                this.showPreview(itemData);
            },
            
            showPreview(item) {
                const previewPanel = document.getElementById('previewPanel');
                const noSelection = document.getElementById('noSelection');
                const previewContent = document.getElementById('previewContent');
                
                noSelection.classList.add('hidden');
                previewPanel.classList.remove('hidden');
                
                let preview = '';
                if (item.isImage) {
                    preview = `
                        <img src="${item.webPath}" alt="${item.name}" class="w-full rounded-lg mb-4">
                    `;
                }
                
                preview += `
                    <div class="space-y-2 text-sm">
                        <div><strong>Tên:</strong> ${item.name}</div>
                        <div><strong>Kích thước:</strong> ${this.formatFileSize(item.size)}</div>
                        <div><strong>Loại:</strong> ${item.extension?.toUpperCase() || 'Folder'}</div>
                        <div><strong>Ngày sửa:</strong> ${item.modified}</div>
                        <div><strong>Đường dẫn:</strong> ${item.webPath}</div>
                    </div>
                `;
                
                previewContent.innerHTML = preview;
            },
            
            async uploadFiles(files) {
                if (files.length === 0) return;
                
                const formData = new FormData();
                formData.append('path', this.currentPath);
                
                for (let file of files) {
                    formData.append('files[]', file);
                }
                
                try {
                    console.log('Uploading files:', files.length, 'to path:', this.currentPath);
                    
                    // Add CSRF token if available
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                    if (csrfToken) {
                        formData.append('<?= csrf_token() ?>', csrfToken);
                    }
                    
                    const response = await fetch('/admin/filemanager/upload', {
                        method: 'POST',
                        body: formData
                    });
                    
                    console.log('Upload response status:', response.status);
                    
                    if (!response.ok) {
                        throw new Error(`HTTP ${response.status}: ${response.statusText}`);
                    }
                    
                    const data = await response.json();
                    console.log('Upload response data:', data);
                    
                    if (data.success) {
                        this.loadFiles(this.currentPath);
                        this.showMessage('Upload thành công!', 'success');
                    } else {
                        throw new Error(data.error || 'Upload failed');
                    }
                } catch (error) {
                    console.error('Upload error:', error);
                    this.showMessage('Upload thất bại: ' + error.message, 'error');
                }
            },
            
            async createFolder() {
                const folderName = document.getElementById('folderNameInput').value.trim();
                if (!folderName) return;
                
                try {
                    const response = await fetch('/admin/filemanager/create-folder', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            path: this.currentPath,
                            name: folderName
                        })
                    });
                    
                    const data = await response.json();
                    
                    if (data.success) {
                        this.loadFiles(this.currentPath);
                        this.hideCreateFolderModal();
                        this.showMessage('Tạo thư mục thành công!', 'success');
                    } else {
                        throw new Error(data.error || 'Failed to create folder');
                    }
                } catch (error) {
                    console.error('Create folder error:', error);
                    this.showMessage('Tạo thư mục thất bại: ' + error.message, 'error');
                }
            },
            
            async deleteFile() {
                if (!this.selectedFile || !confirm('Bạn có chắc muốn xóa file này?')) return;
                
                try {
                    const response = await fetch('/admin/filemanager/delete', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            path: this.selectedFile.path
                        })
                    });
                    
                    const data = await response.json();
                    
                    if (data.success) {
                        this.loadFiles(this.currentPath);
                        this.hidePreview();
                        this.showMessage('Xóa file thành công!', 'success');
                    } else {
                        throw new Error(data.error || 'Failed to delete');
                    }
                } catch (error) {
                    console.error('Delete error:', error);
                    this.showMessage('Xóa file thất bại: ' + error.message, 'error');
                }
            },
            
            async renameFile() {
                const newName = document.getElementById('renameInput').value.trim();
                if (!newName || !this.selectedFile) return;
                
                try {
                    const response = await fetch('/admin/filemanager/rename', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            oldPath: this.selectedFile.path,
                            newName: newName
                        })
                    });
                    
                    const data = await response.json();
                    
                    if (data.success) {
                        this.loadFiles(this.currentPath);
                        this.hideRenameModal();
                        this.hidePreview();
                        this.showMessage('Đổi tên thành công!', 'success');
                    } else {
                        throw new Error(data.error || 'Failed to rename');
                    }
                } catch (error) {
                    console.error('Rename error:', error);
                    this.showMessage('Đổi tên thất bại: ' + error.message, 'error');
                }
            },
            
            selectFile() {
                if (!this.selectedFile) return;
                
                // Send selected file to parent window
                if (window.opener && window.opener.handleFileSelection) {
                    window.opener.handleFileSelection(this.selectedFile);
                    window.close();
                }
            },
            
            updateBreadcrumb(path) {
                const breadcrumb = document.getElementById('breadcrumb');
                const parts = path.split('/').filter(p => p);
                
                let html = '<li><a href="#" data-path="" class="hover:text-blue-600">Root</a></li>';
                let currentPath = '';
                
                parts.forEach((part, index) => {
                    currentPath += part + '/';
                    html += `
                        <li>
                            <span class="mx-2">/</span>
                            <a href="#" data-path="${currentPath}" class="hover:text-blue-600">${part}</a>
                        </li>
                    `;
                });
                
                breadcrumb.innerHTML = html;
                
                // Bind breadcrumb clicks
                breadcrumb.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', (e) => {
                        e.preventDefault();
                        this.loadFiles(link.dataset.path);
                    });
                });
            },
            
            showCreateFolderModal() {
                document.getElementById('createFolderModal').classList.remove('hidden');
                document.getElementById('folderNameInput').value = '';
                document.getElementById('folderNameInput').focus();
            },
            
            hideCreateFolderModal() {
                document.getElementById('createFolderModal').classList.add('hidden');
            },
            
            showRenameModal() {
                if (!this.selectedFile) return;
                document.getElementById('renameModal').classList.remove('hidden');
                document.getElementById('renameInput').value = this.selectedFile.name;
                document.getElementById('renameInput').focus();
            },
            
            hideRenameModal() {
                document.getElementById('renameModal').classList.add('hidden');
            },
            
            hidePreview() {
                document.getElementById('previewPanel').classList.add('hidden');
                document.getElementById('noSelection').classList.remove('hidden');
                this.selectedFile = null;
            },
            
            showLoading() {
                document.getElementById('loadingSpinner').classList.remove('hidden');
                document.getElementById('fileGrid').classList.add('hidden');
                document.getElementById('emptyState').classList.add('hidden');
            },
            
            hideLoading() {
                document.getElementById('loadingSpinner').classList.add('hidden');
                document.getElementById('fileGrid').classList.remove('hidden');
            },
            
            formatFileSize(bytes) {
                if (bytes === 0) return '0 Bytes';
                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
            },
            
            showMessage(message, type = 'info') {
                // Simple alert for now, can be replaced with toast notification
                alert(message);
            }
        };
        
        // Initialize file manager
        document.addEventListener('DOMContentLoaded', () => {
            FileManager.init();
        });
    </script>
</body>
</html> 