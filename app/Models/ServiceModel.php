<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceModel extends Model
{
    protected $table      = 'services';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = false;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id', 'name', 'description', 'price', 'image', 'category', 'type', 'duration', 'features', 'status', 'created_at', 'updated_at'];

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
        'type'        => 'required'
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;

    /**
     * Get services by category
     */
    public function getByCategory($category)
    {
        return $this->where('category', $category)
                   ->where('status', 'active')
                   ->findAll();
    }

    /**
     * Get services by type
     */
    public function getByType($type)
    {
        return $this->where('type', $type)
                   ->where('status', 'active')
                   ->findAll();
    }
    
    /**
     * Get VPS services
     */
    public function getVpsServices()
    {
        return $this->where('category', 'vps')
                    ->where('status', 'active')
                    ->orderBy('price', 'ASC')
                    ->findAll();
    }
    
    /**
     * Get hosting services
     */
    public function getHostingServices()
    {
        return $this->groupStart()
                        ->where('type', 'hosting')
                        ->orWhere('category', 'hosting')
                   ->groupEnd()
                   ->where('status', 'active')
                   ->findAll();
    }
    
    /**
     * Get domain services
     */
    public function getDomainServices()
    {
        return $this->where('type', 'domain')
                   ->where('status', 'active')
                   ->findAll();
    }
    
    /**
     * Get web design services
     */
    public function getWebServices()
    {
        return $this->where('category', 'web')
                   ->where('status', 'active')
                   ->findAll();
    }

    /**
     * Get VPS management services
     */
    public function getVpsManagementServices()
    {
        return $this->where('category', 'vps-management')
                    ->where('status', 'active')
                    ->orderBy('price', 'ASC')
                    ->findAll();
    }

    public function getWebPackages()
    {
        return $this->groupStart()
            ->where('type', 'web')
            ->orWhere('category', 'web')
        ->groupEnd()
        ->where('status', 'active')
        ->findAll();
    }

    public function getSslServices()
    {
        return $this->where('category', 'ssl')
                    ->where('status', 'active')
                    ->orderBy('price', 'ASC')
                    ->findAll();
    }

    /**
     * Get Facebook Like services
     */
    public function getFacebookLikeServices()
    {
        return $this->where('category', 'facebook')
                    ->where('status', 'active')
                    ->orderBy('price', 'ASC')
                    ->findAll();
    }

    /**
     * Get Facebook Ads services
     */
    public function getFacebookAdsServices()
    {
        return $this->where('category', 'facebook-ads')
                    ->where('status', 'active')
                    ->orderBy('price', 'ASC')
                    ->findAll();
    }

    /**
     * Get Facebook Management services
     */
    public function getFacebookManagementServices()
    {
        return $this->where('category', 'facebook-management')
                    ->where('status', 'active')
                    ->orderBy('price', 'ASC')
                    ->findAll();
    }

    /**
     * Get Zalo App services
     */
    public function getZaloAppServices()
    {
        return $this->where('category', 'zalo-app')
                    ->where('status', 'active')
                    ->orderBy('price', 'ASC')
                    ->findAll();
    }

    /**
     * Get Zalo App management services
     */
    public function getZaloAppManagementServices()
    {
        return $this->where('category', 'zalo-app-management')
                    ->where('status', 'active')
                    ->orderBy('price', 'ASC')
                    ->findAll();
    }

    /**
     * Get Zalo Marketing services (main services)
     */
    public function getZaloMarketingServices()
    {
        return $this->where('category', 'zalo')
                    ->where('status', 'active')
                    ->orderBy('price', 'ASC')
                    ->findAll();
    }
    
    /**
     * Get Zalo Ads services
     */
    public function getZaloAdsServices()
    {
        return $this->where('category', 'zalo-ads')
                    ->where('status', 'active')
                    ->orderBy('price', 'ASC')
                    ->findAll();
    }

    /**
     * Get Zalo Management services
     */
    public function getZaloManagementServices()
    {
        return $this->where('category', 'zalo-management')
                    ->where('status', 'active')
                    ->orderBy('price', 'ASC')
                    ->findAll();
    }

    /**
     * Get Content Writing services
     */
    public function getContentWritingServices()
    {
        return $this->where('category', 'content-writing')
                    ->where('status', 'active')
                    ->orderBy('price', 'ASC')
                    ->findAll();
    }

    /**
     * Get Content Management (Fanpage) services
     */
    public function getContentManagementServices()
    {
        return $this->where('category', 'content-management')
                    ->where('status', 'active')
                    ->orderBy('price', 'ASC')
                    ->findAll();
    }

    /**
     * Get Content Website services
     */
    public function getContentWebsiteServices()
    {
        return $this->where('category', 'content-website')
                    ->where('status', 'active')
                    ->orderBy('price', 'ASC')
                    ->findAll();
    }

    /**
     * Get Content Facebook (Fanpage) services
     */
    public function getContentFacebookServices()
    {
        return $this->where('category', 'content-facebook')->findAll();
    }

    public function getDesignServices()
    {
        return $this->where('category', 'design')->findAll();
    }

    /**
     * Get distinct values for a specific column.
     * @param string $column
     * @return array
     */
    public function getDistinct(string $column)
    {
        return $this->distinct()->select($column)->findAll();
    }
} 