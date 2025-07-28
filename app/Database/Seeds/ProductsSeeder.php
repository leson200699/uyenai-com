<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        // Thêm danh mục mới nếu cần
        $categories = [
            [
                'name' => 'Phần mềm',
                'description' => 'Phần mềm thiết kế, chỉnh sửa hình ảnh và video'
            ],
            [
                'name' => 'Khóa học online',
                'description' => 'Các khóa học lập trình, thiết kế, marketing'
            ],
            [
                'name' => 'Tài liệu',
                'description' => 'Tài liệu, ebook chuyên ngành'
            ],
            [
                'name' => 'Công cụ AI',
                'description' => 'Các công cụ AI cho marketing, thiết kế và viết nội dung'
            ],
            [
                'name' => 'Tài khoản AI',
                'description' => 'Các tài khoản AI chính hãng: ChatGPT, Gemini, Midjourney, Claude và nhiều loại khác'
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

        // Danh sách sản phẩm mẫu
        $products = [
            // Phần mềm
            [
                'name' => 'Adobe Photoshop CC - 1 năm',
                'description' => 'Phần mềm chỉnh sửa và xử lý hình ảnh hàng đầu từ Adobe, bản quyền sử dụng 1 năm.',
                'price' => 1490000,
                'image' => 'https://placehold.co/300x300/2563eb/ffffff?text=Photoshop',
                'category_id' => $this->getCategoryIdByName('Phần mềm'),
                'stock' => 50,
                'status' => 'active'
            ],
            [
                'name' => 'Adobe Illustrator CC - 1 năm',
                'description' => 'Phần mềm thiết kế đồ họa vector chuyên nghiệp, bản quyền sử dụng 1 năm.',
                'price' => 1490000,
                'image' => 'https://placehold.co/300x300/dc2626/ffffff?text=Illustrator',
                'category_id' => $this->getCategoryIdByName('Phần mềm'),
                'stock' => 50,
                'status' => 'active'
            ],
            [
                'name' => 'Adobe Premiere Pro CC - 1 năm',
                'description' => 'Phần mềm biên tập và chỉnh sửa video chuyên nghiệp, bản quyền sử dụng 1 năm.',
                'price' => 1690000,
                'image' => 'https://placehold.co/300x300/9333ea/ffffff?text=Premiere',
                'category_id' => $this->getCategoryIdByName('Phần mềm'),
                'stock' => 30,
                'status' => 'active'
            ],
            [
                'name' => 'Microsoft Office 365 - 1 năm',
                'description' => 'Bộ ứng dụng văn phòng đầy đủ: Word, Excel, PowerPoint, Outlook, bản quyền sử dụng 1 năm cho 5 thiết bị.',
                'price' => 990000,
                'image' => 'https://placehold.co/300x300/0369a1/ffffff?text=Office365',
                'category_id' => $this->getCategoryIdByName('Phần mềm'),
                'stock' => 100,
                'status' => 'active'
            ],
            [
                'name' => 'Windows 11 Pro',
                'description' => 'Hệ điều hành Windows 11 bản quyền vĩnh viễn, kích hoạt trực tiếp từ Microsoft.',
                'price' => 1200000,
                'image' => 'https://placehold.co/300x300/0891b2/ffffff?text=Windows11',
                'category_id' => $this->getCategoryIdByName('Phần mềm'),
                'stock' => 80,
                'status' => 'active'
            ],
            
            // Khóa học online
            [
                'name' => 'Khóa học Full-Stack Web Developer',
                'description' => 'Khóa học đầy đủ về phát triển web từ cơ bản đến nâng cao với HTML, CSS, JavaScript, React, Node.js, MongoDB.',
                'price' => 2490000,
                'image' => 'https://placehold.co/300x300/059669/ffffff?text=WebDev',
                'category_id' => $this->getCategoryIdByName('Khóa học online'),
                'stock' => 100,
                'status' => 'active'
            ],
            [
                'name' => 'Khóa học Digital Marketing Toàn Diện',
                'description' => 'Khóa học về marketing online đầy đủ: SEO, Facebook Ads, Google Ads, Email Marketing, Content Marketing.',
                'price' => 1990000,
                'image' => 'https://placehold.co/300x300/0d9488/ffffff?text=Marketing',
                'category_id' => $this->getCategoryIdByName('Khóa học online'),
                'stock' => 100,
                'status' => 'active'
            ],
            [
                'name' => 'Khóa học UI/UX Design',
                'description' => 'Học thiết kế giao diện người dùng và trải nghiệm người dùng với Figma, Adobe XD từ cơ bản đến nâng cao.',
                'price' => 1790000,
                'image' => 'https://placehold.co/300x300/7e22ce/ffffff?text=UI/UX',
                'category_id' => $this->getCategoryIdByName('Khóa học online'),
                'stock' => 100,
                'status' => 'active'
            ],
            
            // Tài liệu
            [
                'name' => 'Ebook: Python Data Science Handbook',
                'description' => 'Sách điện tử đầy đủ về khoa học dữ liệu với Python, bao gồm NumPy, Pandas, Matplotlib, và Machine Learning.',
                'price' => 290000,
                'image' => 'https://placehold.co/300x300/4338ca/ffffff?text=Python',
                'category_id' => $this->getCategoryIdByName('Tài liệu'),
                'stock' => 999,
                'status' => 'active'
            ],
            [
                'name' => 'Ebook: Clean Code - Robert C. Martin',
                'description' => 'Sách điện tử bản quyền về cách viết code sạch, dễ bảo trì và mở rộng.',
                'price' => 250000,
                'image' => 'https://placehold.co/300x300/1e40af/ffffff?text=CleanCode',
                'category_id' => $this->getCategoryIdByName('Tài liệu'),
                'stock' => 999,
                'status' => 'active'
            ],
            [
                'name' => 'Ebook Bundle: Digital Marketing Ultimate Guide',
                'description' => 'Bộ sách điện tử đầy đủ về Digital Marketing, bao gồm SEO, Social Media, Content Marketing, Email Marketing và Analytics.',
                'price' => 490000,
                'image' => 'https://placehold.co/300x300/0369a1/ffffff?text=Marketing',
                'category_id' => $this->getCategoryIdByName('Tài liệu'),
                'stock' => 999,
                'status' => 'active'
            ],
            
            // Công cụ AI
            [
                'name' => 'Claude Ultra - 3 tháng',
                'description' => 'Truy cập vào AI Claude Ultra từ Anthropic trong 3 tháng, hỗ trợ viết content, phân tích dữ liệu và nhiều tác vụ khác.',
                'price' => 890000,
                'image' => 'https://placehold.co/300x300/c2410c/ffffff?text=Claude',
                'category_id' => $this->getCategoryIdByName('Công cụ AI'),
                'stock' => 30,
                'status' => 'active'
            ],
            [
                'name' => 'Perplexity Pro - 1 năm',
                'description' => 'Truy cập vào công cụ AI tìm kiếm thông minh Perplexity Pro trong 1 năm, tích hợp Claude và GPT-4.',
                'price' => 790000,
                'image' => 'https://placehold.co/300x300/a21caf/ffffff?text=Perplexity',
                'category_id' => $this->getCategoryIdByName('Công cụ AI'),
                'stock' => 50,
                'status' => 'active'
            ],
            [
                'name' => 'AutoGPT - Phần mềm tự động hóa với AI',
                'description' => 'Công cụ tự động hóa các tác vụ sử dụng AI, giúp tự động viết nội dung, phân tích dữ liệu và nhiều tác vụ khác.',
                'price' => 1290000,
                'image' => 'https://placehold.co/300x300/166534/ffffff?text=AutoGPT',
                'category_id' => $this->getCategoryIdByName('Công cụ AI'),
                'stock' => 15,
                'status' => 'active'
            ],
            [
                'name' => 'AI Image Generator Pro',
                'description' => 'Phần mềm tạo hình ảnh bằng AI với hơn 50 style và preset, không giới hạn số lượng hình ảnh tạo ra.',
                'price' => 990000,
                'image' => 'https://placehold.co/300x300/0e7490/ffffff?text=AIImage',
                'category_id' => $this->getCategoryIdByName('Công cụ AI'),
                'stock' => 40,
                'status' => 'active'
            ],
            
            // Thêm sản phẩm tài khoản AI
            [
                'name' => 'ChatGPT Plus',
                'description' => 'Truy cập GPT-4, DALL-E 3, Advanced Data Analysis và các tính năng cao cấp khác. Tài khoản chính chủ, sử dụng không giới hạn.',
                'price' => 499000,
                'image' => 'https://placehold.co/300x300/4f46e5/ffffff?text=GPT',
                'category_id' => $this->getCategoryIdByName('Tài khoản AI'),
                'stock' => 15,
                'status' => 'active'
            ],
            [
                'name' => 'Gemini Advanced',
                'description' => 'Sức mạnh của mô hình Gemini 1.5 Pro, tích hợp trong Google Apps. Hỗ trợ dữ liệu với độ dài lên đến 1 triệu token.',
                'price' => 480000,
                'image' => 'https://placehold.co/300x300/0ea5e9/ffffff?text=GEMINI',
                'category_id' => $this->getCategoryIdByName('Tài khoản AI'),
                'stock' => 10,
                'status' => 'active'
            ],
            [
                'name' => 'Midjourney',
                'description' => 'Công cụ tạo ảnh bằng AI hàng đầu thế giới, sáng tạo không giới hạn. Bản Pro với 30 giờ GPU nhanh mỗi tháng.',
                'price' => 550000,
                'image' => 'https://placehold.co/300x300/10b981/ffffff?text=MID',
                'category_id' => $this->getCategoryIdByName('Tài khoản AI'),
                'stock' => 8,
                'status' => 'active'
            ],
            [
                'name' => 'Canva Pro',
                'description' => 'Thiết kế mọi thứ với bộ công cụ Pro và kho tài nguyên khổng lồ. Hỗ trợ tất cả tính năng AI mới nhất của Canva.',
                'price' => 250000,
                'image' => 'https://placehold.co/300x300/ef4444/ffffff?text=CANVA',
                'category_id' => $this->getCategoryIdByName('Tài khoản AI'),
                'stock' => 20,
                'status' => 'active'
            ],
            [
                'name' => 'Claude Pro',
                'description' => 'Truy cập vào AI Claude từ Anthropic với khả năng lập luận sắc bén và xử lý ngôn ngữ tự nhiên xuất sắc.',
                'price' => 420000,
                'image' => 'https://placehold.co/300x300/a855f7/ffffff?text=CLAUDE',
                'category_id' => $this->getCategoryIdByName('Tài khoản AI'),
                'stock' => 12,
                'status' => 'active'
            ],
            [
                'name' => 'Perplexity Pro',
                'description' => 'Công cụ tìm kiếm thông minh sử dụng AI để tổng hợp thông tin từ nhiều nguồn khác nhau với tính năng trích dẫn tự động.',
                'price' => 350000,
                'image' => 'https://placehold.co/300x300/0284c7/ffffff?text=PERPLEXITY',
                'category_id' => $this->getCategoryIdByName('Tài khoản AI'),
                'stock' => 15,
                'status' => 'active'
            ],
            [
                'name' => 'Adobe Firefly',
                'description' => 'Công cụ tạo và chỉnh sửa hình ảnh bằng AI từ Adobe với nhiều tính năng độc quyền và tích hợp vào hệ sinh thái Creative Cloud.',
                'price' => 390000,
                'image' => 'https://placehold.co/300x300/f97316/ffffff?text=FIREFLY',
                'category_id' => $this->getCategoryIdByName('Tài khoản AI'),
                'stock' => 25,
                'status' => 'active'
            ],
            [
                'name' => 'Runway ML',
                'description' => 'Nền tảng video AI tiên tiến với khả năng biên tập, tạo video từ văn bản, và nhiều công cụ sáng tạo nâng cao.',
                'price' => 650000,
                'image' => 'https://placehold.co/300x300/6366f1/ffffff?text=RUNWAY',
                'category_id' => $this->getCategoryIdByName('Tài khoản AI'),
                'stock' => 8,
                'status' => 'active'
            ],
        ];

        // Thêm sản phẩm vào database
        $productModel = model('ProductModel');
        $existingProducts = $productModel->findAll();
        $existingProductNames = array_column($existingProducts, 'name');

        foreach ($products as $product) {
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