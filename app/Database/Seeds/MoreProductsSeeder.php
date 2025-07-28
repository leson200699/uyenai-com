<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MoreProductsSeeder extends Seeder
{
    public function run()
    {
        // Thêm danh mục mới
        $categories = [
            [
                'name' => 'Domains & Hosting',
                'description' => 'Domain, hosting và dịch vụ liên quan'
            ],
            [
                'name' => 'Website & Themes',
                'description' => 'Giao diện và mã nguồn website'
            ],
            [
                'name' => 'Marketing Tools',
                'description' => 'Công cụ tiếp thị số'
            ],
            [
                'name' => 'Digital Content',
                'description' => 'Nội dung số: Ebook, Video, Templates'
            ],
        ];

        // Thêm danh mục nếu chưa tồn tại
        $categoryModel = model('CategoryModel');
        $existingCategories = $categoryModel->findAll();
        $existingCategoryNames = array_column($existingCategories, 'name');

        foreach ($categories as $category) {
            if (!in_array($category['name'], $existingCategoryNames)) {
                $this->db->table('categories')->insert($category);
            }
        }
        
        // Thêm sản phẩm domains & hosting
        $domainsProducts = [
            [
                'name' => 'Domain .COM - 1 năm',
                'description' => 'Tên miền .COM cao cấp, bao gồm bảo vệ thông tin cá nhân và gia hạn tự động.',
                'price' => 249000,
                'image' => 'https://placehold.co/300x300/06b6d4/ffffff?text=.COM',
                'category_id' => $this->getCategoryIdByName('Domains & Hosting'),
                'stock' => 999,
                'status' => 'active'
            ],
            [
                'name' => 'Domain .VN - 1 năm',
                'description' => 'Tên miền quốc gia Việt Nam, tăng niềm tin với khách hàng trong nước.',
                'price' => 450000,
                'image' => 'https://placehold.co/300x300/14b8a6/ffffff?text=.VN',
                'category_id' => $this->getCategoryIdByName('Domains & Hosting'),
                'stock' => 999,
                'status' => 'active'
            ],
            [
                'name' => 'Email Doanh nghiệp - 5 người dùng',
                'description' => 'Dịch vụ email chuyên nghiệp với tên miền riêng, 5 tài khoản dung lượng 10GB/tài khoản.',
                'price' => 1200000,
                'image' => 'https://placehold.co/300x300/0891b2/ffffff?text=EMAIL',
                'category_id' => $this->getCategoryIdByName('Domains & Hosting'),
                'stock' => 100,
                'status' => 'active'
            ],
            [
                'name' => 'Shared Hosting Premium - 1 năm',
                'description' => 'Hosting chất lượng cao với SSD, 10GB dung lượng, 100GB băng thông, hỗ trợ PHP, MySQL và cPanel.',
                'price' => 1390000,
                'image' => 'https://placehold.co/300x300/0284c7/ffffff?text=HOSTING',
                'category_id' => $this->getCategoryIdByName('Domains & Hosting'),
                'stock' => 50,
                'status' => 'active'
            ],
            [
                'name' => 'SSL Chứng thực Doanh nghiệp - 1 năm',
                'description' => 'Chứng chỉ SSL xác thực doanh nghiệp, tăng độ tin cậy và bảo mật cho website của bạn.',
                'price' => 2490000,
                'image' => 'https://placehold.co/300x300/0369a1/ffffff?text=SSL',
                'category_id' => $this->getCategoryIdByName('Domains & Hosting'),
                'stock' => 100,
                'status' => 'active'
            ],
        ];
        
        // Thêm sản phẩm website & themes
        $themesProducts = [
            [
                'name' => 'Theme WordPress Bất động sản',
                'description' => 'Giao diện WordPress chuyên nghiệp cho website bất động sản với tính năng tìm kiếm nâng cao và IDX.',
                'price' => 1290000,
                'image' => 'https://placehold.co/300x300/4f46e5/ffffff?text=REAL+ESTATE',
                'category_id' => $this->getCategoryIdByName('Website & Themes'),
                'stock' => 20,
                'status' => 'active'
            ],
            [
                'name' => 'Theme WordPress Bán hàng WooCommerce',
                'description' => 'Giao diện bán hàng cao cấp tương thích WooCommerce, tối ưu tỷ lệ chuyển đổi và mobile-first.',
                'price' => 1190000,
                'image' => 'https://placehold.co/300x300/6366f1/ffffff?text=SHOP',
                'category_id' => $this->getCategoryIdByName('Website & Themes'),
                'stock' => 20,
                'status' => 'active'
            ],
            [
                'name' => 'Landing Page Marketing - HTML Template',
                'description' => 'Template HTML5 chuyên nghiệp dành cho landing page marketing, tối ưu tỷ lệ chuyển đổi.',
                'price' => 790000,
                'image' => 'https://placehold.co/300x300/8b5cf6/ffffff?text=LANDING',
                'category_id' => $this->getCategoryIdByName('Website & Themes'),
                'stock' => 30,
                'status' => 'active'
            ],
            [
                'name' => 'Mã nguồn App bán hàng React Native',
                'description' => 'Mã nguồn ứng dụng bán hàng hoàn chỉnh, sử dụng React Native, sẵn sàng tùy biến và đưa lên App Store/Google Play.',
                'price' => 3990000,
                'image' => 'https://placehold.co/300x300/a855f7/ffffff?text=REACT',
                'category_id' => $this->getCategoryIdByName('Website & Themes'),
                'stock' => 5,
                'status' => 'active'
            ],
        ];
        
        // Thêm sản phẩm marketing tools
        $marketingProducts = [
            [
                'name' => 'Phần mềm Email Marketing - 10,000 email/tháng',
                'description' => 'Công cụ email marketing chuyên nghiệp với tính năng tự động hóa, phân đoạn và báo cáo chi tiết.',
                'price' => 1490000,
                'image' => 'https://placehold.co/300x300/059669/ffffff?text=EMAIL+MKT',
                'category_id' => $this->getCategoryIdByName('Marketing Tools'),
                'stock' => 10,
                'status' => 'active'
            ],
            [
                'name' => 'Công cụ phân tích SEO - 1 năm',
                'description' => 'Công cụ phân tích và theo dõi SEO chuyên nghiệp, hỗ trợ cải thiện thứ hạng website của bạn.',
                'price' => 2490000,
                'image' => 'https://placehold.co/300x300/10b981/ffffff?text=SEO',
                'category_id' => $this->getCategoryIdByName('Marketing Tools'),
                'stock' => 15,
                'status' => 'active'
            ],
            [
                'name' => 'Chatbot AI cho Website - 6 tháng',
                'description' => 'Chatbot thông minh sử dụng AI, tự động hóa chăm sóc khách hàng 24/7 trên website của bạn.',
                'price' => 1990000,
                'image' => 'https://placehold.co/300x300/14b8a6/ffffff?text=CHATBOT',
                'category_id' => $this->getCategoryIdByName('Marketing Tools'),
                'stock' => 20,
                'status' => 'active'
            ],
            [
                'name' => 'Phần mềm quản lý Social Media - 1 năm',
                'description' => 'Công cụ quản lý đăng bài và phân tích đa nền tảng mạng xã hội (Facebook, Instagram, Twitter).',
                'price' => 1690000,
                'image' => 'https://placehold.co/300x300/0d9488/ffffff?text=SOCIAL',
                'category_id' => $this->getCategoryIdByName('Marketing Tools'),
                'stock' => 25,
                'status' => 'active'
            ],
        ];
        
        // Thêm sản phẩm digital content
        $contentProducts = [
            [
                'name' => 'Bộ Template PowerPoint Doanh nghiệp',
                'description' => '50 mẫu slide PowerPoint chuyên nghiệp cho doanh nghiệp, đầy đủ biểu đồ và đồ họa.',
                'price' => 590000,
                'image' => 'https://placehold.co/300x300/0ea5e9/ffffff?text=PPT',
                'category_id' => $this->getCategoryIdByName('Digital Content'),
                'stock' => 100,
                'status' => 'active'
            ],
            [
                'name' => 'Bộ Stock Photos - 500 hình ảnh',
                'description' => 'Bộ sưu tập 500 hình ảnh stock chuyên nghiệp chất lượng cao, không giới hạn sử dụng.',
                'price' => 990000,
                'image' => 'https://placehold.co/300x300/0284c7/ffffff?text=PHOTOS',
                'category_id' => $this->getCategoryIdByName('Digital Content'),
                'stock' => 50,
                'status' => 'active'
            ],
            [
                'name' => 'Ebook Marketing Online 2024',
                'description' => 'Cuốn sách điện tử toàn diện về chiến lược marketing online năm 2024, cập nhật xu hướng mới nhất.',
                'price' => 390000,
                'image' => 'https://placehold.co/300x300/0369a1/ffffff?text=EBOOK',
                'category_id' => $this->getCategoryIdByName('Digital Content'),
                'stock' => 200,
                'status' => 'active'
            ],
            [
                'name' => 'Khóa học Video SEO Nâng cao',
                'description' => '10 giờ video hướng dẫn kỹ thuật SEO nâng cao từ chuyên gia hàng đầu trong ngành.',
                'price' => 1290000,
                'image' => 'https://placehold.co/300x300/0891b2/ffffff?text=SEO+VIDEO',
                'category_id' => $this->getCategoryIdByName('Digital Content'),
                'stock' => 30,
                'status' => 'active'
            ],
            [
                'name' => '100 Template Email Marketing',
                'description' => 'Bộ sưu tập 100 mẫu email marketing đã được tối ưu tỷ lệ mở và chuyển đổi.',
                'price' => 790000,
                'image' => 'https://placehold.co/300x300/06b6d4/ffffff?text=EMAIL',
                'category_id' => $this->getCategoryIdByName('Digital Content'),
                'stock' => 80,
                'status' => 'active'
            ],
        ];

        // Gộp tất cả sản phẩm
        $allProducts = array_merge($domainsProducts, $themesProducts, $marketingProducts, $contentProducts);
        
        // Thêm vào database
        $productModel = model('ProductModel');
        $existingProducts = $productModel->findAll();
        $existingProductNames = array_column($existingProducts, 'name');

        foreach ($allProducts as $product) {
            // Chỉ thêm nếu sản phẩm chưa tồn tại
            if (!in_array($product['name'], $existingProductNames)) {
                $this->db->table('products')->insert($product);
            }
        }
    }
    
    // Hàm hỗ trợ lấy ID danh mục theo tên
    private function getCategoryIdByName($name)
    {
        $category = $this->db->table('categories')
                         ->where('name', $name)
                         ->get()
                         ->getRowArray();
        
        if ($category) {
            return $category['id'];
        }
        
        // Nếu không tìm thấy, trả về danh mục đầu tiên
        $firstCategory = $this->db->table('categories')
                             ->limit(1)
                             ->get()
                             ->getRowArray();
        
        return $firstCategory ? $firstCategory['id'] : 1;
    }
} 