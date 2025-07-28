<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table      = 'transactions';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['user_id', 'amount', 'type', 'reference', 'status', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'user_id'   => 'required|integer',
        'amount'    => 'required|numeric',
        'type'      => 'required|in_list[deposit,withdrawal,purchase]',
        'status'    => 'required|in_list[pending,completed,failed]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;

    /**
     * Get transactions for a specific user
     */
    public function getUserTransactions($userId, $limit = 10, $offset = 0)
    {
        return $this->where('user_id', $userId)
                    ->orderBy('created_at', 'DESC')
                    ->findAll($limit, $offset);
    }

    /**
     * Create a deposit transaction
     */
    public function createDeposit($userId, $amount, $reference = '')
    {
        $this->db->transBegin();
        
        try {
            // Create transaction record
            $transactionId = $this->insert([
                'user_id' => $userId,
                'amount' => $amount,
                'type' => 'deposit',
                'reference' => $reference,
                'status' => 'completed'
            ]);
            
            if (!$transactionId) {
                throw new \Exception("Failed to create transaction record");
            }
            
            // Update user balance
            $userModel = new \App\Models\UserModel();
            $balanceUpdated = $userModel->updateBalance($userId, $amount);
            
            if (!$balanceUpdated) {
                throw new \Exception("Failed to update user balance");
            }
            
            $this->db->transCommit();
            return $transactionId;
            
        } catch (\Exception $e) {
            $this->db->transRollback();
            return ['error' => $e->getMessage()];
        }
    }
} 