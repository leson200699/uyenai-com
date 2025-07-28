<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ApiController extends BaseController
{
    /**
     * Trả về token CSRF mới
     */
    public function getNewCsrf()
    {
        try {
            return $this->response->setJSON([
                'success' => true,
                'csrf_token' => csrf_token(),
                'csrf_hash' => csrf_hash()
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Error generating CSRF token: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Không thể tạo CSRF token',
                'error' => $e->getMessage()
            ]);
        }
    }
    
    /**
     * Kiểm tra tên miền có sẵn hay không
     */
    public function checkWhois()
    {
        $domain = $this->request->getVar('domain');

        if (empty($domain)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Tên miền không được để trống.']);
        }

        // Validate tên miền đơn giản
        if (!preg_match('/^[a-z0-9\-]+\.[a-z]{2,}$/i', $domain)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Tên miền không hợp lệ.']);
        }

        // Thông tin API - sử dụng trực tiếp thay vì qua .env để đảm bảo chính xác
        $username = 'amexperience';
        $apikey = '164c329040f0ff2ac7263131a68e7f5c';
        $apiUrl = 'https://daily.pavietnam.vn/interface.php';

        $fullUrl = sprintf(
            '%s?cmd=check_whois&username=%s&apikey=%s&domain=%s',
            $apiUrl,
            urlencode($username),
            urlencode($apikey),
            urlencode($domain)
        );

        // Log URL đang gọi để debug
        log_message('debug', 'Calling WHOIS API URL: ' . $fullUrl);

        try {
            // Sử dụng CURL để gọi API
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $fullUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36');
            
            // Thực hiện request
            $responseBody = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $curlErrno = curl_errno($ch);
            $curlError = curl_error($ch);
            
            // Log thông tin debug
            log_message('debug', 'CURL Response: ' . json_encode([
                'domain' => $domain,
                'response' => $responseBody,
                'http_code' => $httpCode,
                'curl_errno' => $curlErrno,
                'curl_error' => $curlError
            ]));
            
            curl_close($ch);
            
            // Kiểm tra lỗi CURL
            if ($curlErrno > 0) {
                throw new \Exception('CURL Error #' . $curlErrno . ': ' . $curlError);
            }
            
            // Kiểm tra mã HTTP
            if ($httpCode >= 400) {
                throw new \Exception('HTTP Error: ' . $httpCode);
            }
            
            // Kiểm tra phản hồi
            if ($responseBody === false || empty($responseBody)) {
                throw new \Exception('Empty response from API');
            }
            
            $trimmedBody = trim($responseBody);
            log_message('info', 'PA Vietnam WHOIS response for domain [' . $domain . ']: [' . $trimmedBody . ']');
            
            // Phân tích phản hồi
            if ($trimmedBody === '1') {
                return $this->response->setJSON([
                    'status' => 'available',
                    'message' => 'Tên miền có sẵn để đăng ký.',
                    'raw_response' => $trimmedBody
                ]);
            } elseif ($trimmedBody === '0') {
                return $this->response->setJSON([
                    'status' => 'unavailable',
                    'message' => 'Tên miền đã được đăng ký.',
                    'raw_response' => $trimmedBody
                ]);
            } else {
                // Xử lý phản hồi không phải 0 hoặc 1
                log_message('warning', 'Unexpected response format: [' . $trimmedBody . ']');
                
                if (stripos($trimmedBody, 'available') !== false && stripos($trimmedBody, 'not') === false) {
                    return $this->response->setJSON([
                        'status' => 'available',
                        'message' => 'Tên miền có sẵn để đăng ký.',
                        'raw_response' => $trimmedBody
                    ]);
                } elseif (stripos($trimmedBody, 'not available') !== false || 
                          stripos($trimmedBody, 'unavailable') !== false ||
                          stripos($trimmedBody, 'registered') !== false) {
                    return $this->response->setJSON([
                        'status' => 'unavailable',
                        'message' => 'Tên miền đã được đăng ký.',
                        'raw_response' => $trimmedBody
                    ]);
                }
                
                // Nếu không xác định được, trả về lỗi với nội dung phản hồi gốc
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Không thể xác định trạng thái tên miền.',
                    'raw_response' => $trimmedBody
                ]);
            }
        } catch (\Exception $e) {
            log_message('error', 'WHOIS API error: ' . $e->getMessage());
            
            // Thử lại một lần nữa với file_get_contents
            try {
                $context = stream_context_create([
                    'http' => [
                        'timeout' => 15,
                        'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
                    ],
                    'ssl' => [
                        'verify_peer' => false,
                        'verify_peer_name' => false
                    ]
                ]);
                
                $responseBody = @file_get_contents($fullUrl, false, $context);
                
                if ($responseBody === false) {
                    throw new \Exception('Không thể lấy dữ liệu từ API sử dụng file_get_contents');
                }
                
                $trimmedBody = trim($responseBody);
                log_message('info', 'PA Vietnam WHOIS response (file_get_contents) for domain [' . $domain . ']: [' . $trimmedBody . ']');
                
                if ($trimmedBody === '1') {
                    return $this->response->setJSON([
                        'status' => 'available',
                        'message' => 'Tên miền có sẵn để đăng ký.',
                        'method' => 'file_get_contents',
                        'raw_response' => $trimmedBody
                    ]);
                } elseif ($trimmedBody === '0') {
                    return $this->response->setJSON([
                        'status' => 'unavailable',
                        'message' => 'Tên miền đã được đăng ký.',
                        'method' => 'file_get_contents',
                        'raw_response' => $trimmedBody
                    ]);
                } else {
                    return $this->response->setJSON([
                        'status' => 'error',
                        'message' => 'Không thể xác định trạng thái tên miền.',
                        'method' => 'file_get_contents',
                        'raw_response' => $trimmedBody
                    ]);
                }
            } catch (\Exception $e2) {
                log_message('error', 'WHOIS API retry error: ' . $e2->getMessage());
                
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Không thể kết nối đến dịch vụ kiểm tra tên miền.',
                    'error' => $e->getMessage() . ' | Retry: ' . $e2->getMessage()
                ]);
            }
        }
    }
    
    /**
     * Phương thức dự phòng khi PA Vietnam API không hoạt động
     */
    private function fallbackWhoisCheck($domain)
    {
        try {
            // Trả về kết quả giả định để ứng dụng không bị gián đoạn
            return $this->response->setJSON([
                'status' => 'available', // Giả định là available để người dùng tiếp tục
                'message' => 'Tên miền có thể đăng ký (thông tin tham khảo).',
                'note' => 'Vui lòng liên hệ bộ phận hỗ trợ để xác nhận tình trạng tên miền.'
            ]);
            
            /* 
             * Có thể bổ sung thêm whois service khác trong tương lai
             * ví dụ: sử dụng whois.iana.org hoặc whois.internic.net
             */
        } catch (\Exception $e) {
            log_message('error', 'Fallback WHOIS check failed: ' . $e->getMessage());
            
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Không thể kiểm tra tên miền. Vui lòng liên hệ bộ phận hỗ trợ.',
            ]);
        }
    }
} 