<?php
namespace App\Controllers\Admin;

use App\Models\AudiobookModel;
use App\Models\AudiobookChapterModel;
use CodeIgniter\Controller;

class Audiobooks extends Controller
{
    protected $audiobookModel;
    protected $chapterModel;

    public function __construct()
    {
        $this->audiobookModel = new AudiobookModel();
        $this->chapterModel = new AudiobookChapterModel();
    }

    public function index()
    {
        $data['audiobooks'] = $this->audiobookModel->orderBy('created_at', 'DESC')->findAll();
        return view('admin/audiobooks/index', $data);
    }

    public function create()
    {
        return view('admin/audiobooks/create');
    }

    public function store()
    {
        // 1. Save Audiobook basic info
        $audiobookData = [
            'title'       => $this->request->getPost('title'),
            'author'      => $this->request->getPost('author'),
            'description' => $this->request->getPost('description'),
            'cover_image' => $this->request->getPost('cover_image'),
            'status'      => $this->request->getPost('status'),
        ];
        $this->audiobookModel->save($audiobookData);
        $audiobookId = $this->audiobookModel->getInsertID();

        // 2. Save Chapters
        $chaptersData = $this->request->getPost('chapters');
        if (!empty($chaptersData)) {
            foreach ($chaptersData as $chapter) {
                $chapter['audiobook_id'] = $audiobookId;
                $this->chapterModel->save($chapter);
            }
        }
        
        return redirect()->to('/admin/audiobooks/edit/' . $audiobookId)->with('message', 'Tạo sách nói thành công!');
    }

    public function edit($id)
    {
        $data['audiobook'] = $this->audiobookModel->find($id);
        $data['chapters'] = $this->chapterModel->getChaptersByAudiobookId($id);
        return view('admin/audiobooks/edit', $data);
    }

    public function update($id)
    {
        // 1. Update Audiobook basic info
        $audiobookData = [
            'title'       => $this->request->getPost('title'),
            'author'      => $this->request->getPost('author'),
            'description' => $this->request->getPost('description'),
            'cover_image' => $this->request->getPost('cover_image'),
            'status'      => $this->request->getPost('status'),
        ];
        $this->audiobookModel->update($id, $audiobookData);

        // 2. Update Chapters
        $chaptersData = $this->request->getPost('chapters');
        $existingChapters = $this->chapterModel->where('audiobook_id', $id)->findAll();
        $existingChapterIds = array_column($existingChapters, 'id');
        
        $submittedChapterIds = [];
        if (!empty($chaptersData)) {
            foreach ($chaptersData as $chapter) {
                $chapter['audiobook_id'] = $id;
                if (!empty($chapter['id'])) {
                    $submittedChapterIds[] = $chapter['id'];
                }
                $this->chapterModel->save($chapter);
            }
        }

        // 3. Delete chapters that were removed from the form
        $chaptersToDelete = array_diff($existingChapterIds, $submittedChapterIds);
        if (!empty($chaptersToDelete)) {
            $this->chapterModel->delete($chaptersToDelete);
        }

        return redirect()->to('/admin/audiobooks/edit/' . $id)->with('message', 'Cập nhật sách nói thành công!');
    }

    public function delete($id)
    {
        // Deleting chapters is handled by the database foreign key constraint (ON DELETE CASCADE)
        $this->audiobookModel->delete($id);
        return redirect()->to('/admin/audiobooks')->with('message', 'Xóa sách nói thành công!');
    }
} 