<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'products';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['name', 'description', 'price', 'image', 'category_id', 'stock', 'status', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'name'        => 'required|min_length[3]',
        'description' => 'required',
        'price'       => 'required|numeric',
        'category_id' => 'required|integer',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;

    /**
     * Get products by category
     */
    public function getByCategory($categoryId)
    {
        return $this->where('category_id', $categoryId)
                    ->where('status', 'active')
                    ->findAll();
    }

    /**
     * Get active products
     */
    public function getActiveProducts($limit = 0, $offset = 0)
    {
        $builder = $this->where('status', 'active');
        
        if ($limit > 0) {
            $builder->limit($limit, $offset);
        }
        
        return $builder->findAll();
    }

    /**
     * Update product stock
     */
    public function updateStock($productId, $quantity)
    {
        $product = $this->find($productId);
        if (!$product) {
            return false;
        }

        $newStock = $product['stock'] - $quantity;
        
        // Don't allow negative stock
        if ($newStock < 0) {
            return false;
        }

        $this->update($productId, ['stock' => $newStock]);
        return true;
    }

    /**
     * Get product with category name
     */
    public function getWithCategory($productId)
    {
        $builder = $this->db->table('products');
        $builder->select('products.*, categories.name as category_name');
        $builder->join('categories', 'categories.id = products.category_id');
        $builder->where('products.id', $productId);
        
        return $builder->get()->getRowArray();
    }
} 