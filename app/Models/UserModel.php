<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['name', 'email', 'password', 'balance', 'role', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'name'     => 'required|min_length[3]',
        'email'    => 'required|valid_email|is_unique[users.email,id,{id}]',
        'password' => 'required|min_length[8]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;

    /**
     * Verify password for login
     */
    public function verifyPassword($password, $hash)
    {
        return password_verify($password, $hash);
    }

    /**
     * Update user balance
     */
    public function updateBalance($userId, $amount)
    {
        // Ensure amount is numeric
        if (!is_numeric($amount)) {
            return false;
        }

        // Use set() and increment() for an atomic update to prevent race conditions
        $builder = $this->db->table($this->table);
        $builder->where($this->primaryKey, $userId);

        // Check if we are decrementing and if the balance would go below zero
        if ($amount < 0) {
            $builder->where('balance >=', abs($amount));
        }

        $builder->set('balance', 'balance + ' . (float)$amount, false);
        
        $result = $builder->update();

        // The update method returns a result object. We need to check affected rows.
        return $this->db->affectedRows() > 0;
    }
} 