<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsCategoryModel extends Model
{
    protected $table = 'news_categories';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
