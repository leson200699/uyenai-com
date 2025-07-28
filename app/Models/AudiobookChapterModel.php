<?php

namespace App\Models;

use CodeIgniter\Model;

class AudiobookChapterModel extends Model
{
    protected $table            = 'audiobook_chapters';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'audiobook_id',
        'title',
        'audio_file',
        'duration',
        'chapter_order'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    /**
     * Lấy tất cả các chương của một sách nói, sắp xếp theo thứ tự.
     *
     * @param int $audiobookId
     * @return array
     */
    public function getChaptersByAudiobookId($audiobookId)
    {
        return $this->where('audiobook_id', $audiobookId)
                    ->orderBy('chapter_order', 'ASC')
                    ->findAll();
    }
} 