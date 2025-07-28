<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ServiceModel;

class Services extends BaseController
{
    protected $categoryModel;
    protected $serviceModel;
    
    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
        $this->serviceModel = new ServiceModel();
    }
    
    public function index()
    {
        return view('services/index', [
            'title' => 'Dịch vụ của chúng tôi',
            'categories' => $this->categoryModel->findAll()
        ]);
    }
    
    public function web()
    {
        $services = $this->serviceModel->getWebServices();
        $vpsServices = $this->serviceModel->getVpsServices();
        $hostingServices = $this->serviceModel->getHostingServices();
        
        return view('services/web', [
            'title' => 'Thiết kế Website',
            'services' => $services,
            'vpsServices' => $vpsServices,
            'hostingServices' => $hostingServices
        ]);
    }
    
    public function hosting()
    {
        $services = $this->serviceModel->getHostingServices();
        
        return view('services/hosting', [
            'title' => 'Dịch vụ Hosting',
            'services' => $services
        ]);
    }
    
    public function domain()
    {
        $services = $this->serviceModel->getDomainServices();
        
        return view('services/domain', [
            'title' => 'Đăng ký Domain',
            'services' => $services
        ]);
    }
    
    public function seo()
    {
        $services = $this->serviceModel->where('category', 'seo')
                                      ->where('status', 'active')
                                      ->findAll();
        
        return view('services/seo', [
            'title' => 'Dịch vụ SEO',
            'services' => $services
        ]);
    }
    
    public function facebook()
    {
        $likeServices = $this->serviceModel->getFacebookLikeServices();
        $adsServices = $this->serviceModel->getFacebookAdsServices();
        $managementServices = $this->serviceModel->getFacebookManagementServices();

        return view('services/facebook', [
            'title' => 'Dịch Vụ Facebook Chuyên Sâu',
            'likeServices' => $likeServices,
            'adsServices' => $adsServices,
            'managementServices' => $managementServices
        ]);
    }
    
    public function zalo()
    {
        $data = [
            'title' => 'Zalo Marketing',
            'mainServices' => $this->serviceModel->getZaloMarketingServices(),
            'adsServices' => $this->serviceModel->getZaloAdsServices(),
            'managementServices' => $this->serviceModel->getZaloManagementServices(),
        ];

        return view('services/zalo', $data);
    }
    
    public function tiktok()
    {
        $services = $this->serviceModel->where('category', 'tiktok')
                                      ->where('status', 'active')
                                      ->findAll();

        return view('services/tiktok', [
            'title' => 'Dịch Vụ TikTok',
            'tiktokServices' => $services
        ]);
    }
    
    public function mobileApp()
    {
        $services = $this->serviceModel->where('category', 'mobile-app')
                                      ->where('status', 'active')
                                      ->findAll();

        return view('services/mobile-app', [
            'title' => 'Dịch Vụ Phát Triển Mobile App',
            'services' => $services
        ]);
    }
    
    public function emailMarketing()
    {
        $services = $this->serviceModel->where('category', 'email-marketing')
                                      ->where('status', 'active')
                                      ->findAll();
        
        return view('services/email-marketing', [
            'title' => 'Dịch Vụ Email Marketing',
            'services' => $services
        ]);
    }
    
    public function contentWriting()
    {
        $data = [
            'title' => 'Dịch vụ viết nội dung',
            'websiteServices' => $this->serviceModel->getContentWebsiteServices(),
            'facebookServices' => $this->serviceModel->getContentFacebookServices()
        ];

        return view('services/content', $data);
    }
    
    public function maps()
    {
        $services = $this->serviceModel->where('category', 'maps')
                                      ->where('status', 'active')
                                      ->findAll();
        
        return view('services/maps', [
            'title' => 'Google Maps',
            'services' => $services
        ]);
    }
    
    public function ads()
    {
        $services = $this->serviceModel->where('category', 'ads')
                                  ->where('status', 'active')
                                  ->findAll();
        
        $packages = $this->serviceModel->where('category', 'ads-package')
                                  ->where('status', 'active')
                                  ->findAll();

        return view('services/ads', [
            'title' => 'Dịch vụ Quảng Cáo',
            'services' => $services,
            'packages' => $packages
        ]);
    }
    
    public function vps()
    {
        // Use the dedicated method from the model
        $services = $this->serviceModel->getVpsServices();
        $managementServices = $this->serviceModel->getVpsManagementServices();
        
        return view('services/vps', [
            'title' => 'Dịch vụ VPS',
            'services' => $services,
            'managementServices' => $managementServices
        ]);
    }
    
    public function zaloApp()
    {
        $services = $this->serviceModel->getZaloAppServices();
        $managementServices = $this->serviceModel->getZaloAppManagementServices();

        return view('services/zalo-app', [
            'title' => 'Dịch Vụ Phát Triển Zalo Mini App',
            'services' => $services,
            'managementServices' => $managementServices
        ]);
    }

    public function zaloZns()
    {
        $services = $this->serviceModel->where('category', 'zalo-zns')
                                      ->where('status', 'active')
                                      ->findAll();

        return view('services/zalo-zns', [
            'title' => 'Dịch vụ Zalo ZNS',
            'services' => $services
        ]);
    }

    public function design()
    {
        $serviceModel = new \App\Models\ServiceModel();
        $projectModel = new \App\Models\ProjectModel();

        $data['title'] = 'Dịch vụ Thiết kế Chuyên nghiệp';
        $data['description'] = 'Cung cấp các giải pháp thiết kế sáng tạo từ logo, bộ nhận diện thương hiệu đến giao diện website và ứng dụng.';
        $data['designServices'] = $serviceModel->getDesignServices();
        $data['projects'] = $projectModel->findAll();

        return view('services/design', $data);
    }

    public function email()
    {
        $services = $this->serviceModel->where('category', 'email')
                                      ->where('status', 'active')
                                      ->findAll();

        return view('services/email', [
            'title' => 'Email Doanh Nghiệp',
            'services' => $services
        ]);
    }

    public function soft()
    {
        $services = $this->serviceModel->where('category', 'software')
                                      ->where('status', 'active')
                                      ->findAll();

        return view('services/soft', [
            'title' => 'Phần Mềm Quản Lý Doanh Nghiệp',
            'services' => $services
        ]);
    }
    
    public function ssl()
    {
        $services = $this->serviceModel->getSslServices();

        return view('services/ssl', [
            'title' => 'Chứng chỉ bảo mật SSL',
            'services' => $services
        ]);
    }

    public function kol()
    {
        $services = $this->serviceModel->where('category', 'kol')
                                      ->where('status', 'active')
                                      ->findAll();

        return view('services/kol', [
            'title' => 'Dịch Vụ Booking KOL/KOC',
            'services' => $services
        ]);
    }

    public function check_whois()
    {
        $domain = $this->request->getVar('domain');

        if (empty($domain)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Tên miền không được để trống.']);
        }

        // Validate tên miền đơn giản
        if (!preg_match('/^[a-z0-9\-]+\.[a-z]{2,}$/i', $domain)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Tên miền không hợp lệ.']);
        }

        // Lấy thông tin từ .env
        $username = getenv('PAVIETNAM_USERNAME');
        $apikey = getenv('PAVIETNAM_APIKEY');
        $apiUrl = getenv('PAVIETNAM_APIURL');

        // Kiểm tra nếu thiếu thông tin cấu hình
        if (empty($username) || empty($apikey) || empty($apiUrl)) {
            log_message('error', 'WHOIS API error: Thiếu thông tin cấu hình API trong file .env');
            return $this->response->setStatusCode(500)->setJSON([
                'status' => 'error',
                'message' => 'Lỗi cấu hình hệ thống. Vui lòng thử lại sau.',
            ]);
        }

        $fullUrl = sprintf(
            '%s?cmd=check_whois&username=%s&apikey=%s&domain=%s',
            $apiUrl,
            urlencode($username),
            urlencode($apikey),
            urlencode($domain)
        );

        try {
            // Sử dụng cURL thay vì file_get_contents
            $ch = curl_init();
            
            // Thiết lập các tùy chọn cURL
            curl_setopt($ch, CURLOPT_URL, $fullUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10); // Timeout sau 10 giây
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); // Connection timeout 5 giây
            curl_setopt($ch, CURLOPT_USERAGENT, 'CodeIgniter/UyenAI'); // User agent
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Tắt xác minh SSL nếu cần
            
            // Thực hiện request
            $responseBody = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $curlError = curl_error($ch);
            
            curl_close($ch);
            
            // Kiểm tra lỗi cURL
            if ($responseBody === false) {
                throw new \Exception('Lỗi cURL: ' . $curlError);
            }
            
            // Kiểm tra mã HTTP
            if ($httpCode >= 400) {
                throw new \Exception('Lỗi HTTP: ' . $httpCode);
            }

            log_message('info', 'PAVietnam WHOIS response for domain [' . $domain . ']: ' . $responseBody);

            $trimmedBody = trim($responseBody);

            if ($trimmedBody === '1') {
                return $this->response->setJSON([
                    'status' => 'available',
                    'message' => 'Tên miền có sẵn để đăng ký.'
                ]);
            } elseif ($trimmedBody === '0') {
                return $this->response->setJSON([
                    'status' => 'unavailable',
                    'message' => 'Tên miền đã được đăng ký.'
                ]);
            } else {
                // Log phản hồi không mong đợi
                log_message('warning', 'PAVietnam WHOIS unexpected response format: ' . $trimmedBody);
                
                // Kiểm tra nếu phản hồi chứa "available" hoặc "not available"
                if (stripos($trimmedBody, 'available') !== false && stripos($trimmedBody, 'not') === false) {
                    return $this->response->setJSON([
                        'status' => 'available',
                        'message' => 'Tên miền có sẵn để đăng ký.'
                    ]);
                } elseif (stripos($trimmedBody, 'not available') !== false || 
                          stripos($trimmedBody, 'unavailable') !== false ||
                          stripos($trimmedBody, 'registered') !== false) {
                    return $this->response->setJSON([
                        'status' => 'unavailable',
                        'message' => 'Tên miền đã được đăng ký.'
                    ]);
                }
                
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Không thể xác định trạng thái tên miền. Vui lòng thử lại sau.'
                ]);
            }
        } catch (\Exception $e) {
            log_message('error', 'WHOIS API error: ' . $e->getMessage());

            return $this->response->setStatusCode(500)->setJSON([
                'status' => 'error',
                'message' => 'Không thể kết nối đến dịch vụ kiểm tra tên miền.',
                'details' => $e->getMessage()
            ]);
        }
    }

} 