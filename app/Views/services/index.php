<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Dịch vụ của chúng tôi</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Web Design -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <div class="h-48 overflow-hidden">
                <img src="https://via.placeholder.com/600x400/4F46E5/FFFFFF?text=Web+Design" alt="Web Design" class="w-full h-full object-cover">
            </div>
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2 text-indigo-700">Thiết kế Website</h2>
                <p class="text-gray-600 mb-4">Thiết kế website chuyên nghiệp, tối ưu trải nghiệm người dùng và tương thích với các thiết bị.</p>
                <a href="<?= site_url('services/web') ?>" class="inline-block px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition-colors">Xem chi tiết</a>
            </div>
        </div>
        
        <!-- Hosting -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <div class="h-48 overflow-hidden">
                <img src="https://via.placeholder.com/600x400/10B981/FFFFFF?text=Hosting" alt="Hosting" class="w-full h-full object-cover">
            </div>
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2 text-emerald-700">Dịch vụ Hosting</h2>
                <p class="text-gray-600 mb-4">Dịch vụ hosting ổn định, bảo mật cao với tốc độ truy cập nhanh và hỗ trợ 24/7.</p>
                <a href="<?= site_url('services/hosting') ?>" class="inline-block px-4 py-2 bg-emerald-600 text-white rounded hover:bg-emerald-700 transition-colors">Xem chi tiết</a>
            </div>
        </div>
        
        <!-- Domain -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <div class="h-48 overflow-hidden">
                <img src="https://via.placeholder.com/600x400/F59E0B/FFFFFF?text=Domain" alt="Domain" class="w-full h-full object-cover">
            </div>
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2 text-amber-700">Đăng ký Domain</h2>
                <p class="text-gray-600 mb-4">Đăng ký tên miền nhanh chóng với nhiều lựa chọn đuôi miền và giá cả cạnh tranh.</p>
                <a href="<?= site_url('services/domain') ?>" class="inline-block px-4 py-2 bg-amber-600 text-white rounded hover:bg-amber-700 transition-colors">Xem chi tiết</a>
            </div>
        </div>
        
        <!-- SEO -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <div class="h-48 overflow-hidden">
                <img src="https://via.placeholder.com/600x400/EF4444/FFFFFF?text=SEO" alt="SEO" class="w-full h-full object-cover">
            </div>
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2 text-red-700">Dịch vụ SEO</h2>
                <p class="text-gray-600 mb-4">Tối ưu hóa công cụ tìm kiếm, cải thiện thứ hạng từ khóa và tăng lượng truy cập tự nhiên.</p>
                <a href="<?= site_url('services/seo') ?>" class="inline-block px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition-colors">Xem chi tiết</a>
            </div>
        </div>
        
        <!-- Facebook Marketing -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <div class="h-48 overflow-hidden">
                <img src="https://via.placeholder.com/600x400/3B82F6/FFFFFF?text=Facebook+Marketing" alt="Facebook Marketing" class="w-full h-full object-cover">
            </div>
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2 text-blue-700">Facebook Marketing</h2>
                <p class="text-gray-600 mb-4">Quảng cáo Facebook hiệu quả, tiếp cận đúng đối tượng và tối ưu chi phí quảng cáo.</p>
                <a href="<?= site_url('services/facebook') ?>" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">Xem chi tiết</a>
            </div>
        </div>
        
        <!-- Zalo Marketing -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <div class="h-48 overflow-hidden">
                <img src="https://via.placeholder.com/600x400/8B5CF6/FFFFFF?text=Zalo+Marketing" alt="Zalo Marketing" class="w-full h-full object-cover">
            </div>
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2 text-purple-700">Zalo Marketing</h2>
                <p class="text-gray-600 mb-4">Chiến lược tiếp thị trên Zalo, tăng lượng tương tác và xây dựng kênh bán hàng hiệu quả.</p>
                <a href="<?= site_url('services/zalo') ?>" class="inline-block px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700 transition-colors">Xem chi tiết</a>
            </div>
        </div>
        
        <!-- TikTok Marketing -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <div class="h-48 overflow-hidden">
                <img src="https://via.placeholder.com/600x400/EC4899/FFFFFF?text=TikTok+Marketing" alt="TikTok Marketing" class="w-full h-full object-cover">
            </div>
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2 text-pink-700">TikTok Marketing</h2>
                <p class="text-gray-600 mb-4">Tiếp cận thế hệ Gen Z qua TikTok, xây dựng nội dung viral và quảng cáo hiệu quả.</p>
                <a href="<?= site_url('services/tiktok') ?>" class="inline-block px-4 py-2 bg-pink-600 text-white rounded hover:bg-pink-700 transition-colors">Xem chi tiết</a>
            </div>
        </div>
        
        <!-- Mobile App Development -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <div class="h-48 overflow-hidden">
                <img src="https://via.placeholder.com/600x400/2563EB/FFFFFF?text=Mobile+App" alt="Mobile App Development" class="w-full h-full object-cover">
            </div>
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2 text-blue-800">Phát triển Ứng dụng Mobile</h2>
                <p class="text-gray-600 mb-4">Phát triển ứng dụng iOS và Android chuyên nghiệp, đáp ứng nhu cầu người dùng.</p>
                <a href="<?= site_url('services/mobile-app') ?>" class="inline-block px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-800 transition-colors">Xem chi tiết</a>
            </div>
        </div>
        
        <!-- Email Marketing -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <div class="h-48 overflow-hidden">
                <img src="https://via.placeholder.com/600x400/6D28D9/FFFFFF?text=Email+Marketing" alt="Email Marketing" class="w-full h-full object-cover">
            </div>
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2 text-violet-700">Email Marketing</h2>
                <p class="text-gray-600 mb-4">Chiến dịch email marketing chuyên nghiệp, tăng tỷ lệ mở mail và chuyển đổi khách hàng.</p>
                <a href="<?= site_url('services/email-marketing') ?>" class="inline-block px-4 py-2 bg-violet-600 text-white rounded hover:bg-violet-700 transition-colors">Xem chi tiết</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 