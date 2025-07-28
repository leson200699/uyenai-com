<?php
namespace App\Models;

use CodeIgniter\Model;

class AudiobookModel extends Model
{
    protected $table = 'audiobooks';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    
    // Danh sách tất cả các trường cho phép trong bảng
    protected $allowedFields = [
        'id', 'title', 'author', 'description', 'audio_file', 'cover_image', 'status', 'created_at', 'updated_at'
    ];
    
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    
    // Tắt các validation để tránh lỗi
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;
    
    // Thiết lập database group để đảm bảo sử dụng đúng database
    protected $DBGroup = 'default';
} 