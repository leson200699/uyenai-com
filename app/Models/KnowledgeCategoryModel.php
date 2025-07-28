<?php

namespace App\Models;

use CodeIgniter\Model;

class KnowledgeCategoryModel extends Model
{
    protected $table = 'knowledge_categories';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
} 