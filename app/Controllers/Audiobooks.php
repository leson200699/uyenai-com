<?php
namespace App\Controllers;

use App\Models\AudiobookModel;
use App\Models\AudiobookChapterModel;
use CodeIgniter\Controller;

class Audiobooks extends Controller
{
    protected $AudiobookModel;
    
    public function __construct()
    {
        $this->AudiobookModel = new AudiobookModel();
    }

    public function index()
    {
        $data['audiobooks'] = $this->AudiobookModel->findAll();    
        return view('audiobooks', $data);
    }

    public function detail($id)
    {
        $model = new AudiobookModel();
        $chapterModel = new AudiobookChapterModel();

        $data['audiobook'] = $model->find($id);
        if (!$data['audiobook']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Không tìm thấy sách nói này.');
        }

        $data['chapters'] = $chapterModel->getChaptersByAudiobookId($id);
        
        // Kiểm tra người dùng đã đăng nhập chưa
        $session = session();
        $data['isLoggedIn'] = $session->get('isLoggedIn');

        return view('audiobook-detail', $data);
    }
} 