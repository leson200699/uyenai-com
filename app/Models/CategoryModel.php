<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table      = 'categories';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['name', 'description', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'name'        => 'required|min_length[3]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;

    /**
     * Get categories with product counts
     */
    public function getCategoriesWithProductCount()
    {
        $builder = $this->db->table('categories');
        $builder->select('categories.*, COUNT(products.id) as product_count');
        $builder->join('products', 'categories.id = products.category_id', 'left');
        $builder->where('products.status', 'active');
        $builder->groupBy('categories.id');
        
        return $builder->get()->getResultArray();
    }
} 