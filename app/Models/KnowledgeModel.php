<?php

namespace App\Models;

use CodeIgniter\Model;

class KnowledgeModel extends Model
{
    protected $table = 'knowledges';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'content', 'category_id', 'is_hot', 'image', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
} 