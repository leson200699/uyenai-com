<?php

namespace App\Controllers;

use App\Models\CartModel;

class Cart extends BaseController
{
    protected $cartModel;
    
    public function __construct()
    {
        $this->cartModel = new CartModel();
    }
    
    /**
     * Hiển thị giỏ hàng
     */
    public function index()
    {
        // Sử dụng CartModel để lấy dữ liệu giỏ hàng đã được chuẩn hóa
        $cartData = $this->cartModel->getContents();
        
        $data = [
            'title' => 'Giỏ Hàng',
            'cartItems' => $cartData
        ];
        
        return view('cart/index', $data);
    }
    
    /**
     * Thêm mục vào giỏ hàng (sản phẩm hoặc dịch vụ)
     */
    public function add()
    {
        // Kiểm tra loại dữ liệu được gửi lên
        $productId = $this->request->getPost('product_id');
            $serviceId = $this->request->getPost('service_id');
        
        log_message('info', 'Cart/add: Product ID: ' . ($productId ?? 'null') . ', Service ID: ' . ($serviceId ?? 'null'));
        
        // Xử lý thêm sản phẩm vào giỏ hàng
        if ($productId) {
            $quantity = (int)($this->request->getPost('quantity') ?? 1);
            log_message('info', 'Adding product: ' . $productId . ' with quantity: ' . $quantity);
            
            $result = $this->cartModel->addProduct($productId, $quantity);
            
            if ($result) {
                return redirect()->to('cart')->with('success', 'Đã thêm sản phẩm vào giỏ hàng');
            } else {
                return redirect()->back()->with('error', 'Không thể thêm sản phẩm vào giỏ hàng');
            }
        }
        
        // Xử lý thêm dịch vụ vào giỏ hàng
        elseif ($serviceId) {
            $duration = (int)($this->request->getPost('duration') ?? 1);
            $websiteUrl = $this->request->getPost('website_url');
            $platform = $this->request->getPost('platform');
            $budget = $this->request->getPost('budget');
            $goals = $this->request->getPost('goals');
            $package = $this->request->getPost('package');
            
            // Log chi tiết hơn
            log_message('info', 'Adding service: ' . $serviceId . ' with duration: ' . $duration);
            log_message('info', 'Additional data - Website URL: ' . ($websiteUrl ?? 'null'));
            log_message('info', 'Additional data - Platform: ' . ($platform ?? 'null'));
            log_message('info', 'Additional data - Budget: ' . ($budget ?? 'null'));
            log_message('info', 'Additional data - Goals: ' . ($goals ?? 'null'));
            log_message('info', 'Additional data - Package: ' . ($package ?? 'null'));
            
            // Kiểm tra service tồn tại
            $serviceModel = model('ServiceModel');
            $serviceExists = $serviceModel->find($serviceId);
            if (!$serviceExists) {
                log_message('error', 'Service not found in database: ' . $serviceId);
                return redirect()->back()->with('error', 'Không tìm thấy dịch vụ trong hệ thống. Vui lòng thử lại sau.');
            }
            
            $result = $this->cartModel->addService($serviceId, $duration, $websiteUrl);
                
            if ($result) {
                return redirect()->to('cart')->with('success', 'Đã thêm dịch vụ vào giỏ hàng');
            } else {
                log_message('error', 'Failed to add service: ' . $serviceId);
                return redirect()->back()->with('error', 'Không thể thêm dịch vụ vào giỏ hàng. Vui lòng thử lại sau.');
            }
        }
        
        // Trường hợp không có dữ liệu hợp lệ
        else {
            log_message('error', 'No product_id or service_id found in POST data: ' . json_encode($this->request->getPost()));
            return redirect()->back()->with('error', 'Không tìm thấy thông tin sản phẩm hoặc dịch vụ');
        }
    }
    
    /**
     * Thêm nhiều dịch vụ vào giỏ hàng cùng một lúc (cho trang SEO)
     */
    public function addMultiple()
    {
        $serviceIds = $this->request->getPost('service_ids');
        $durations = $this->request->getPost('durations');
        $websiteUrl = $this->request->getPost('website_url');
        $notes = $this->request->getPost('notes');
        
        log_message('info', 'Cart/addMultiple: Adding multiple services. Count: ' . count($serviceIds ?? []));
            
        if (empty($serviceIds) || !is_array($serviceIds)) {
            return redirect()->back()->with('error', 'Vui lòng chọn ít nhất một dịch vụ');
            }
            
        if (empty($websiteUrl)) {
            return redirect()->back()->with('error', 'Vui lòng nhập địa chỉ website cần SEO');
            }
            
        $successCount = 0;
        $errorCount = 0;
        
        // Lưu notes vào session
        if (!empty($notes)) {
            session()->set('seo_notes', $notes);
        }
        
        foreach ($serviceIds as $serviceId) {
            // Lấy thời hạn cho dịch vụ này
            $duration = isset($durations[$serviceId]) ? (int)$durations[$serviceId] : 1;
            
            // Thêm dịch vụ vào giỏ hàng
            $result = $this->cartModel->addService($serviceId, $duration, $websiteUrl);
            
            if ($result) {
                $successCount++;
            } else {
                $errorCount++;
                log_message('error', 'Failed to add service: ' . $serviceId);
            }
        }
        
        if ($successCount > 0) {
            $message = 'Đã thêm ' . $successCount . ' dịch vụ vào giỏ hàng';
            if ($errorCount > 0) {
                $message .= ' (' . $errorCount . ' dịch vụ không thể thêm)';
            }
            return redirect()->to('cart')->with('success', $message);
        } else {
            return redirect()->back()->with('error', 'Không thể thêm dịch vụ vào giỏ hàng. Vui lòng thử lại sau.');
        }
    }
    
    /**
     * Cập nhật số lượng các mục trong giỏ hàng
     */
    public function update()
    {
        $updates = $this->request->getPost('updates');

        if (!$updates || !is_array($updates)) {
            return redirect()->to('cart');
        }

        $result = $this->cartModel->updateCartItems($updates);

        if ($result) {
            return redirect()->to('cart')->with('success', 'Giỏ hàng đã được cập nhật');
        } else {
            return redirect()->to('cart')->with('error', 'Không thể cập nhật giỏ hàng');
        }
    }
    
    /**
     * Xóa một mục khỏi giỏ hàng
     */
    public function remove()
    {
        // Chấp nhận cả id và product_id để tương thích với cả code cũ và mới
        $id = $this->request->getPost('id') ?? $this->request->getPost('product_id');
        
        if (!$id) {
            return redirect()->to('cart')->with('error', 'Không tìm thấy mã sản phẩm hoặc dịch vụ');
        }
        
        $result = $this->cartModel->remove($id);
        
        if ($result) {
            return redirect()->to('cart')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng');
        } else {
            return redirect()->to('cart')->with('error', 'Không thể xóa sản phẩm khỏi giỏ hàng');
        }
    }
    
    /**
     * Xóa mục bằng method GET (cho khả năng tương thích ngược)
     */
    public function removeItem($id)
    {
        if (!$id) {
            return redirect()->to('cart')->with('error', 'Không tìm thấy mã sản phẩm hoặc dịch vụ');
        }
        
        $result = $this->cartModel->remove($id);
        
        if ($result) {
            return redirect()->to('cart')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng');
        } else {
            return redirect()->to('cart')->with('error', 'Không thể xóa sản phẩm khỏi giỏ hàng');
    }
    }
    
    /**
     * Xóa toàn bộ giỏ hàng
     */
    public function clear()
    {
        $this->cartModel->clear();
        return redirect()->to('cart')->with('success', 'Giỏ hàng đã được xóa');
    }
    
    /**
     * Lấy số lượng giỏ hàng (cho AJAX)
     */
    public function getCount()
    {
        $cartItems = $this->cartModel->getContents();
        
        return $this->response->setJSON([
            'count' => $cartItems['count']
        ]);
    }

    /**
     * Xử lý đặt hàng dịch vụ SEO
     */
    public function addSeoService()
    {
        $websiteUrl = $this->request->getPost('website_url');
        $packageName = $this->request->getPost('package_name');
        $packagePrice = $this->request->getPost('package_price');
        $notes = $this->request->getPost('notes');
        
        log_message('info', 'SEO Order: ' . $packageName . ' for ' . $websiteUrl . ' with notes: ' . $notes);
        
        if (empty($websiteUrl) || empty($packageName)) {
            return redirect()->back()->with('error', 'Vui lòng nhập đầy đủ thông tin');
        }
        
        // Tìm service_id tương ứng với package name
        $serviceId = null;
        
        // Tìm trong database trước
        $service = model('ServiceModel')->where('name', $packageName)->first();
        
        if ($service) {
            $serviceId = $service['id'];
        } else {
            // Nếu không có trong database, map với các service_id mẫu
            $serviceMap = [
                'SEO Audit' => 'seo-audit',
                'SEO Từ Khóa' => 'seo-keywords',
                'SEO Tổng Thể' => 'seo-full',
                'Tư Vấn & Báo Giá Riêng' => 'seo-consult'
            ];
            
            $serviceId = $serviceMap[$packageName] ?? null;
        }
        
        if (!$serviceId) {
            return redirect()->back()->with('error', 'Không tìm thấy dịch vụ phù hợp');
        }
        
        // Xác định thời hạn mặc định theo loại dịch vụ
        $duration = 1;
        if ($serviceId === 'seo-keywords') {
            $duration = 3;
        } elseif ($serviceId === 'seo-full') {
            $duration = 6;
        }
        
        // Lưu ghi chú
        if (!empty($notes)) {
            session()->set('seo_notes_' . $serviceId, $notes);
        }
        
        // Thêm vào giỏ hàng
        $result = $this->cartModel->addService($serviceId, $duration, $websiteUrl);
        
        if ($result) {
            return redirect()->to('cart')->with('success', 'Đã thêm dịch vụ SEO vào giỏ hàng');
        } else {
            return redirect()->back()->with('error', 'Không thể thêm dịch vụ vào giỏ hàng');
        }
    }

    /**
     * Xử lý đặt hàng dịch vụ thiết kế web
     */
    public function addWebService()
    {
        // Lấy dữ liệu từ POST
        $serviceId = $this->request->getPost('service_id');
        $addSsl = (bool)$this->request->getPost('add_ssl');
        $hostingId = $this->request->getPost('hosting_id');
        $hostingDuration = (int)($this->request->getPost('hosting_duration') ?: 12);
        $vpsId = $this->request->getPost('vps_id');
        $vpsDuration = (int)($this->request->getPost('vps_duration') ?: 12);
        $existingDomain = $this->request->getPost('existing_domain');

        log_message('info', 'Web Service Order: Service ID ' . $serviceId);
        
        if (empty($serviceId)) {
            return redirect()->back()->with('error', 'Vui lòng chọn gói dịch vụ website');
        }

        // Thêm dịch vụ web chính
        $this->cartModel->addService($serviceId, 1);
        
        // Thêm SSL nếu được chọn
        if ($addSsl) {
            $this->cartModel->addService('ssl-certificate', 12);
        }
        
        // Thêm Hosting nếu được chọn
        if ($hostingId && $hostingId !== 'none') {
            $this->cartModel->addService($hostingId, $hostingDuration);
        }

        // Thêm VPS nếu được chọn
        if ($vpsId && $vpsId !== 'none') {
            $this->cartModel->addService($vpsId, $vpsDuration);
        }
        
        // Xử lý tên miền đã có
        if (!empty($existingDomain)) {
            session()->set('web_service_domain', $existingDomain);
        }
        
        return redirect()->to('cart')->with('success', 'Đã thêm các dịch vụ vào giỏ hàng.');
    }

    /**
     * Xử lý thêm tên miền vào giỏ hàng
     */
    public function addDomain()
    {
        // Kiểm tra AJAX request
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403)->setJSON(['success' => false, 'message' => 'Truy cập không hợp lệ']);
        }

        // Lấy dữ liệu từ POST
        $serviceId = $this->request->getPost('service_id');
        $domain = $this->request->getPost('domain');
        $price = $this->request->getPost('price');
        
        if (empty($domain) || empty($serviceId) || empty($price)) {
            return $this->response->setJSON(['success' => false, 'message' => 'Dữ liệu không hợp lệ']);
        }
        
        log_message('info', 'Domain Order: ' . $domain . ' with service_id: ' . $serviceId . ' and price: ' . $price);
        
        // Dữ liệu tên miền
        $domainData = [
            'id' => $serviceId,
            'name' => 'Tên miền ' . $domain,
            'description' => 'Đăng ký tên miền ' . $domain,
            'price' => $price,
            'type' => 'domain',
            'duration' => 12 // 1 năm
        ];
        
        // Thêm vào giỏ hàng
        $cart = session()->get('cart') ?? [];
        $cart[$serviceId] = [
            'id' => $serviceId,
            'name' => 'Tên miền ' . $domain,
            'price' => $price,
            'quantity' => 1,
            'domain' => $domain,
            'type' => 'service',
            'category' => 'domain',
            'duration' => 12,
            'image' => 'https://placehold.co/300x300/eab308/ffffff?text=Domain',
            'subtotal' => $price
        ];
        session()->set('cart', $cart);
        
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Đã thêm tên miền ' . $domain . ' vào giỏ hàng',
            'cartCount' => count($cart),
            'new_csrf' => csrf_hash()
        ]);
    }
} 