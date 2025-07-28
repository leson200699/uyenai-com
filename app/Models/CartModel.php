<?php

namespace App\Models;

// CartModel không cần kế thừa từ Model của CodeIgniter vì nó chỉ làm việc với session
class CartModel
{
    protected $session;
    protected $productModel;
    protected $serviceModel;
    
    public function __construct()
    {
        $this->session = session();
        $this->productModel = new ProductModel();
        $this->serviceModel = new ServiceModel();
    }
    
    /**
     * Lấy nội dung giỏ hàng, tách sản phẩm và dịch vụ
     */
    public function getContents()
    {
        $cart = session()->get('cart') ?? [];
        $cart = $this->normalizeCart($cart);
        
        $products = [];
        $services = [];
        $serviceCategories = [];
        
        // Duyệt qua từng mục trong giỏ hàng
        foreach ($cart as $id => $item) {
            // Kiểm tra loại: sản phẩm hay dịch vụ
            if (isset($item['type']) && $item['type'] === 'service') {
                // Format lại thông tin dịch vụ để hiển thị
                $services[$id] = $this->formatService($item);
                
                // Nhóm dịch vụ theo danh mục
                $category = $item['category'] ?? 'default';
                if (!isset($serviceCategories[$category])) {
                    $serviceCategories[$category] = [];
                }
                $serviceCategories[$category][$id] = $services[$id];
            } else {
                $products[$id] = $item;
            }
        }
        
        // Tính tổng giỏ hàng
        $totalItems = count($cart);
        $subtotal = 0;
        
        foreach ($cart as $item) {
            $subtotal += $item['subtotal'];
        }
        
        // Dịch tên các danh mục dịch vụ
        $categoryNames = [
            'seo' => 'SEO',
            'email-marketing' => 'Email Marketing',
            'maps' => 'Google Maps',
            'domain' => 'Tên miền',
            'hosting' => 'Hosting',
            'vps' => 'VPS',
            'default' => 'Dịch vụ khác'
        ];
        
        // Lấy tên miền đã có từ session (nếu có)
        $existingDomain = session()->get('web_service_domain');
        if ($existingDomain) {
            $result['existingDomain'] = $existingDomain;
        }
        
        // Trả về kết quả
        return [
            'items' => $cart,
            'products' => $products,
            'services' => $services,
            'servicesByCategory' => $serviceCategories,
            'categoryNames' => $categoryNames,
            'totalItems' => $totalItems,
            'subtotal' => $subtotal,
            'existingDomain' => session()->get('web_service_domain') // Thêm dòng này
        ];
    }
    
    /**
     * Thêm sản phẩm vào giỏ hàng
     */
    public function addProduct($productId, $quantity = 1)
    {
        // Chuyển ID thành chuỗi để đồng nhất
        $productId = (string)$productId;
        
        $product = $this->productModel->find($productId);
        if (!$product) {
            return [
                'status' => false,
                'message' => 'Không tìm thấy sản phẩm'
            ];
        }
        
        // Kiểm tra tồn kho
        if ($product['stock'] < $quantity) {
            return [
                'status' => false,
                'message' => 'Số lượng sản phẩm không đủ'
            ];
        }
        
        $cart = $this->session->get('cart') ?? [];
        
        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
        if (isset($cart[$productId])) {
            $newQuantity = $cart[$productId]['quantity'] + $quantity;
            
            // Kiểm tra lại số lượng không vượt quá tồn kho
            if ($newQuantity > $product['stock']) {
                $newQuantity = $product['stock'];
                $message = 'Số lượng sản phẩm đã được điều chỉnh theo số lượng tồn kho';
            } else {
                $message = 'Đã cập nhật số lượng sản phẩm trong giỏ hàng';
            }
            
            $cart[$productId]['quantity'] = $newQuantity;
        } else {
            $cart[$productId] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $quantity,
                'image' => $product['image'] ?? 'https://placehold.co/300x300/indigo/white?text=Product',
                'type' => 'product'
            ];
            $message = 'Đã thêm sản phẩm vào giỏ hàng';
        }
        
        // Cập nhật subtotal
        $cart[$productId]['subtotal'] = $cart[$productId]['price'] * $cart[$productId]['quantity'];
        
        // Lưu giỏ hàng vào session
        $this->session->set('cart', $cart);
        
        return [
            'status' => true,
            'message' => $message,
            'item' => $cart[$productId]
        ];
    }
    
    /**
     * Add a service to the cart
     */
    public function addService(string $serviceId, int $duration = 1, ?string $websiteUrl = null)
    {
        $serviceModel = new ServiceModel();
        $service = $serviceModel->find($serviceId);
        
        if (!$service) {
             $service = $this->getSampleService($serviceId);
        }

        if (!$service) {
            log_message('error', "Service/Sample not found with ID: {$serviceId}");
            return false;
        }
        
        $cart = $this->session->get('cart') ?? [];
        $id = $service['id'];
        
        $cart[$id] = [
            'id' => $service['id'],
            'name' => $service['name'],
            'price' => $service['price'],
            'quantity' => $duration,
            'duration' => $duration,
            'type' => 'service',
            'website_url' => $websiteUrl,
            'category' => $service['category'] ?? 'default',
            'image' => $service['image'] ?? 'https://placehold.co/300x300/e2e8f0/1e293b?text=Service',
            'features' => is_string($service['features']) ? json_decode($service['features'], true) : $service['features'],
        ];
        
        $cart[$id]['subtotal'] = $cart[$id]['price'] * $cart[$id]['quantity'];
        
        $this->session->set('cart', $cart);
        
        return true;
    }

    /**
     * Cập nhật số lượng các mục trong giỏ hàng
     */
    public function updateCartItems($updates)
    {
        if (empty($updates)) {
            return false;
        }
        
        $cart = session()->get('cart') ?? [];
        
        foreach ($updates as $id => $data) {
            $id = (string)$id; // Đảm bảo ID là chuỗi
            
            // Lấy quantity từ mảng lồng nhau
            if (!is_array($data) || !isset($data['quantity'])) {
                continue;
            }
            $quantity = (int)$data['quantity'];
            
            if (!isset($cart[$id])) {
                continue;
            }
            
            if ($quantity <= 0) {
                unset($cart[$id]);
                continue;
            }
            
            // Xử lý khác nhau cho sản phẩm và dịch vụ
            if (isset($cart[$id]['type']) && $cart[$id]['type'] === 'service') {
                // Dịch vụ: cập nhật thời hạn
                $cart[$id]['duration'] = $quantity;
                // Đồng bộ quantity và duration để đảm bảo tương thích với code cũ
                $cart[$id]['quantity'] = $quantity;
                // Cập nhật subtotal
                $cart[$id]['subtotal'] = $cart[$id]['price'] * $quantity;
            } else {
                // Sản phẩm: kiểm tra tồn kho
                $product = $this->productModel->find($id);
                
                // Kiểm tra tồn kho
                if ($product && $product['stock'] >= $quantity) {
                    $cart[$id]['quantity'] = $quantity;
                } else if ($product) {
                    // Số lượng vượt quá tồn kho, set về tồn kho tối đa
                    $cart[$id]['quantity'] = (int)$product['stock'];
                }
                
                // Cập nhật subtotal
                $cart[$id]['subtotal'] = $cart[$id]['price'] * $cart[$id]['quantity'];
            }
        }
        
        // Cập nhật giỏ hàng trong session
        session()->set('cart', $cart);
        
        return true;
    }
    
    /**
     * Xóa sản phẩm/dịch vụ khỏi giỏ hàng
     */
    public function remove($id)
    {
        $id = (string)$id; // Đảm bảo ID là chuỗi
        $cart = session()->get('cart') ?? [];
        $normalizedCart = $this->normalizeCart($cart);
        $removed = false;

        // Tìm và xóa item trong giỏ hàng đã được chuẩn hóa
        foreach ($normalizedCart as $key => $item) {
            if ((string)$item['id'] === $id) {
                unset($normalizedCart[$key]);
                $removed = true;
                break;
            }
        }
        
        // Cập nhật lại session với giỏ hàng đã được lọc
        if ($removed) {
            // Cần phải xây dựng lại cấu trúc session ban đầu
            // Nếu session gốc có 'items', ta cần cập nhật lại mảng đó
            if (isset($cart['items']) && is_array($cart['items'])) {
                 // Lọc ra các item không bị xóa
                $newCartItems = [];
                foreach ($cart['items'] as $originalItem) {
                    if (!isset($originalItem['id']) || (string)$originalItem['id'] !== $id) {
                        $newCartItems[] = $originalItem;
                    }
                }
                $cart['items'] = $newCartItems;
            } else {
                // Nếu là cấu trúc cũ, giỏ hàng đã được cập nhật chính xác
                $cart = $normalizedCart;
            }
            
            session()->set('cart', $cart);
        }
        
        return $removed;
    }
    
    /**
     * Xóa toàn bộ giỏ hàng
     */
    public function clear()
    {
        session()->remove('cart');
        session()->remove('web_service_domain'); // Thêm dòng này
        return true;
    }
    
    /**
     * Kiểm tra số lượng tồn kho trước khi checkout
     */
    public function validateStock()
    {
        $cart = $this->session->get('cart') ?? [];
        $errors = [];
        $updatedCart = false;
        
        foreach ($cart as $id => $item) {
            // Chỉ kiểm tra sản phẩm, không kiểm tra dịch vụ
            if ($item['type'] === 'product') {
                $product = $this->productModel->find($id);
                
                if ($product && $product['stock'] < $item['quantity']) {
                    if ($product['stock'] > 0) {
                        // Điều chỉnh số lượng
                        $cart[$id]['quantity'] = $product['stock'];
                        $cart[$id]['subtotal'] = $cart[$id]['price'] * $product['stock'];
                        $updatedCart = true;
                        $errors[] = 'Số lượng sản phẩm "' . $item['name'] . '" đã được điều chỉnh do tồn kho không đủ';
                    } else {
                        // Xóa khỏi giỏ hàng nếu hết hàng
                        unset($cart[$id]);
                        $updatedCart = true;
                        $errors[] = 'Sản phẩm "' . $item['name'] . '" đã hết hàng và đã bị xóa khỏi giỏ hàng';
                    }
                }
            }
        }
        
        if ($updatedCart) {
            $this->session->set('cart', $cart);
        }
        
        return [
            'valid' => empty($errors),
            'errors' => $errors
        ];
    }
    
    /**
     * Chuẩn hóa giỏ hàng
     */
    private function normalizeCart($cart)
    {
        $normalizedCart = [];
        
        // Xử lý items nếu sử dụng cấu trúc mới
        if (isset($cart['items']) && is_array($cart['items'])) {
            foreach ($cart['items'] as $key => $item) {
                $stringId = isset($item['id']) ? (string)$item['id'] : 'item_' . $key;
                $normalizedCart[$stringId] = $item;
                $normalizedCart[$stringId]['id'] = $stringId;
                
                // Đảm bảo có giá
                if (!isset($normalizedCart[$stringId]['price'])) {
                    $normalizedCart[$stringId]['price'] = 0;
                }
                
                // Tính subtotal
                if (isset($item['type']) && $item['type'] === 'service') {
                    $duration = isset($item['duration']) ? $item['duration'] : 1;
                    $normalizedCart[$stringId]['duration'] = $duration;
                    $normalizedCart[$stringId]['quantity'] = $duration;
                    
                    // Subtotal đã được tính toán chính xác và lưu trong session bởi addService.
                    // Chỉ cần đảm bảo trường subtotal tồn tại.
                    if (!isset($normalizedCart[$stringId]['subtotal'])) {
                        // Fallback tính toán (trường hợp hiếm gặp)
                        if (isset($item['category']) && in_array($item['category'], ['domain', 'ssl'])) {
                            $normalizedCart[$stringId]['subtotal'] = $normalizedCart[$stringId]['price'];
                        } else {
                            $normalizedCart[$stringId]['subtotal'] = $normalizedCart[$stringId]['price'] * $duration;
                        }
                    }
                } else {
                    // Đối với sản phẩm, sử dụng quantity
                    $quantity = isset($item['quantity']) ? $item['quantity'] : 1;
                    $normalizedCart[$stringId]['quantity'] = $quantity;
                    $normalizedCart[$stringId]['subtotal'] = $normalizedCart[$stringId]['price'] * $quantity;
                }
            }
            return $normalizedCart;
        }
        
        // Xử lý cấu trúc giỏ hàng cũ
        foreach ($cart as $id => $item) {
            $stringId = (string)$id; // Đảm bảo khóa là chuỗi
            
            $normalizedCart[$stringId] = $item;
            $normalizedCart[$stringId]['id'] = $stringId;
            
            // Đảm bảo có giá
            if (!isset($normalizedCart[$stringId]['price'])) {
                $normalizedCart[$stringId]['price'] = 0;
            }
            
            // Kiểm tra loại item để tính subtotal đúng
            if (isset($item['type']) && $item['type'] === 'service') {
                $duration = isset($item['duration']) ? $item['duration'] : 1;
                $normalizedCart[$stringId]['duration'] = $duration;
                $normalizedCart[$stringId]['quantity'] = $duration; // Đảm bảo tương thích với code cũ
                
                // Subtotal đã được tính toán chính xác và lưu trong session bởi addService.
                // Chỉ cần đảm bảo trường subtotal tồn tại.
                if (!isset($normalizedCart[$stringId]['subtotal'])) {
                    // Fallback tính toán (trường hợp hiếm gặp)
                    if (isset($item['category']) && in_array($item['category'], ['domain', 'ssl'])) {
                        $normalizedCart[$stringId]['subtotal'] = $normalizedCart[$stringId]['price'];
                    } else {
                        $normalizedCart[$stringId]['subtotal'] = $normalizedCart[$stringId]['price'] * $duration;
                    }
                }
            } else {
                // Đối với sản phẩm, sử dụng quantity
                $quantity = isset($item['quantity']) ? $item['quantity'] : 1;
                $normalizedCart[$stringId]['quantity'] = $quantity;
                $normalizedCart[$stringId]['subtotal'] = $normalizedCart[$stringId]['price'] * $quantity;
            }
        }
        
        return $normalizedCart;
    }
    
    /**
     * Lấy dữ liệu dịch vụ mẫu (nếu không có trong database)
     */
    private function getSampleService($serviceId)
    {
        log_message('info', 'Getting sample service: ' . $serviceId);
        
        // Thêm các dịch vụ SEO mẫu
        $sampleServices = [
            'seo-audit' => [
                'id' => 'seo-audit',
                'name' => 'SEO Audit',
                'description' => 'Phân tích, đánh giá tổng thể tình trạng website và đưa ra kế hoạch hành động chi tiết.',
                'price' => 2000000,
                'image' => 'https://placehold.co/600x400/4f46e5/ffffff?text=SEO+Audit',
                'category' => 'seo',
                'type' => 'service',
                'duration' => 1,
                'features' => json_encode([
                    'Đánh giá kỹ thuật website',
                    'Phân tích cấu trúc website',
                    'Đánh giá nội dung',
                    'Phân tích backlink',
                    'Phân tích từ khóa và đối thủ',
                    'Báo cáo chi tiết và kế hoạch hành động'
                ])
            ],
            'seo-keywords' => [
                'id' => 'seo-keywords',
                'name' => 'SEO Từ Khóa',
                'description' => 'Đẩy thứ hạng các từ khóa quan trọng lên top Google, thu hút khách hàng mục tiêu.',
                'price' => 8000000,
                'image' => 'https://placehold.co/600x400/4338ca/ffffff?text=SEO+T%E1%BB%AB+kh%C3%B3a',
                'category' => 'seo',
                'type' => 'service',
                'duration' => 3,
                'features' => json_encode([
                    'Phân tích và lựa chọn từ khóa',
                    'Tối ưu hóa On-page',
                    'Tối ưu hóa kỹ thuật',
                    'Xây dựng liên kết chất lượng',
                    'Theo dõi xếp hạng từ khóa',
                    'Báo cáo tiến độ hàng tháng'
                ])
            ],
            'seo-full' => [
                'id' => 'seo-full',
                'name' => 'SEO Tổng Thể',
                'description' => 'Tối ưu toàn diện On-page, Off-page, kỹ thuật. Phát triển website bền vững.',
                'price' => 15000000,
                'image' => 'https://placehold.co/600x400/3730a3/ffffff?text=SEO+T%E1%BB%95ng+th%E1%BB%83',
                'category' => 'seo',
                'type' => 'service',
                'duration' => 6,
                'features' => json_encode([
                    'Tất cả tính năng của gói SEO Từ khóa',
                    'Tối ưu hóa cấu trúc website',
                    'Phát triển nội dung chuyên sâu',
                    'Chiến lược xây dựng thương hiệu',
                    'Chiến dịch link building quy mô lớn',
                    'Phân tích và báo cáo chuyên sâu'
                ])
            ],
            // Các dịch vụ khác (nếu cần)
            'vps1' => [
                'id' => 'vps1',
                'name' => 'VPS Basic',
                'price' => 150000,
                'image' => 'https://placehold.co/300x300/4f46e5/ffffff?text=VPS1',
                'type' => 'service',
                'category' => 'vps',
                'features' => json_encode([
                    'CPU' => '1 vCore',
                    'RAM' => '2GB',
                    'SSD' => '20GB',
                    'Bandwidth' => 'Không giới hạn',
                    'IP' => '1 IPv4'
                ])
            ],
            'vps2' => [
                'id' => 'vps2',
                'name' => 'VPS Standard',
                'price' => 280000,
                'image' => 'https://placehold.co/300x300/4f46e5/ffffff?text=VPS2',
                'type' => 'service',
                'category' => 'vps',
                'features' => json_encode([
                    'CPU' => '2 vCore',
                    'RAM' => '4GB',
                    'SSD' => '40GB',
                    'Bandwidth' => 'Không giới hạn',
                    'IP' => '1 IPv4'
                ])
            ],
        ];
        
        if (isset($sampleServices[$serviceId])) {
            log_message('info', 'Found sample service: ' . $serviceId);
            return $sampleServices[$serviceId];
        }
        
        log_message('error', 'Sample service not found: ' . $serviceId);
        return null;
    }

    /**
     * Format dịch vụ để hiển thị trong giỏ hàng
     */
    private function formatService($service) 
    {
        $duration = $service['duration'];
        $durationText = '';
        
        // Xử lý hiển thị cho dịch vụ theo năm hoặc theo tháng
        if (isset($service['category']) && in_array($service['category'], ['domain', 'ssl'])) {
            $years = ceil($duration / 12);
            $durationText = $years . ' năm';
            $service['price_unit_text'] = '/năm';
        } else {
            $durationText = $duration . ' tháng';
            $service['price_unit_text'] = '/tháng';
        }
        
        $service['durationText'] = $durationText;
        
        // Giải mã tính năng nếu là chuỗi JSON
        if (isset($service['features']) && is_string($service['features'])) {
            $service['features'] = json_decode($service['features'], true);
        }
        
        return $service;
    }
} 