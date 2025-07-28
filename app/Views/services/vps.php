<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Dịch vụ VPS</h1>
    
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-4">Giải pháp VPS hiệu năng cao</h2>
            <p class="mb-4 text-gray-600">Chúng tôi cung cấp dịch vụ VPS chất lượng cao, hiệu năng vượt trội với công nghệ ảo hóa tiên tiến. Máy chủ được trang bị ổ cứng SSD NVMe, CPU và RAM hiệu năng cao, mang đến trải nghiệm tuyệt vời cho người dùng.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 my-8">
                <div class="flex flex-col items-center p-4 bg-indigo-50 rounded-lg">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="zap" class="w-8 h-8 text-indigo-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Hiệu năng cao</h3>
                    <p class="text-center text-gray-600">Công nghệ ảo hóa tiên tiến, tối ưu hiệu suất</p>
                </div>
                
                <div class="flex flex-col items-center p-4 bg-indigo-50 rounded-lg">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="shield" class="w-8 h-8 text-indigo-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Bảo mật</h3>
                    <p class="text-center text-gray-600">Bảo mật hàng đầu với tường lửa chuyên nghiệp</p>
                </div>
                
                <div class="flex flex-col items-center p-4 bg-indigo-50 rounded-lg">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="settings" class="w-8 h-8 text-indigo-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Quản lý linh hoạt</h3>
                    <p class="text-center text-gray-600">Full quyền root, tùy chỉnh theo nhu cầu của bạn</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Pricing Plans -->
    <div class="mb-10">
        <h2 class="text-2xl font-semibold mb-6">Bảng giá VPS</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($services as $index => $service): ?>
            <?php 
                $features = json_decode($service['features'], true);
                $isPopular = $index === 1; 
            ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden border <?= $isPopular ? 'border-2 border-indigo-500 transform scale-105' : 'border-gray-200 hover:border-indigo-300' ?> transition-all">
                <?php if ($isPopular): ?>
                <div class="absolute top-0 right-0">
                    <div class="bg-indigo-500 text-white text-xs font-bold px-3 py-1 rounded-bl-lg">
                        PHỔ BIẾN
                    </div>
                </div>
                <?php endif; ?>
                <div class="p-6 border-b <?= $isPopular ? 'bg-indigo-50' : 'bg-gray-50' ?>">
                    <h3 class="text-xl font-bold text-center"><?= $service['name'] ?></h3>
                    <div class="flex justify-center my-4">
                        <span class="text-3xl font-bold"><?= number_format($service['price'], 0, ',', '.') ?>đ</span>
                        <span class="text-gray-500 self-end ml-1">/<?= $service['duration'] === 'month' ? 'tháng' : 'năm' ?></span>
                    </div>
                </div>
                <div class="p-6">
                    <ul class="space-y-3">
                        <li class="flex items-center">
                            <i data-lucide="cpu" class="w-5 h-5 text-indigo-500 mr-2"></i>
                            <span class="font-medium">CPU:</span>
                            <span class="ml-2"><?= $features['cpu'] ?? '1 Core' ?></span>
                        </li>
                        <li class="flex items-center">
                            <i data-lucide="database" class="w-5 h-5 text-indigo-500 mr-2"></i>
                            <span class="font-medium">RAM:</span>
                            <span class="ml-2"><?= $features['ram'] ?? '1 GB' ?></span>
                        </li>
                        <li class="flex items-center">
                            <i data-lucide="hard-drive" class="w-5 h-5 text-indigo-500 mr-2"></i>
                            <span class="font-medium">Disk:</span>
                            <span class="ml-2"><?= $features['disk'] ?? '25 GB SSD' ?></span>
                        </li>
                        <li class="flex items-center">
                            <i data-lucide="activity" class="w-5 h-5 text-indigo-500 mr-2"></i>
                            <span class="font-medium">Bandwidth:</span>
                            <span class="ml-2"><?= $features['bandwidth'] ?? '1 TB' ?></span>
                        </li>
                        <li class="flex items-center">
                            <i data-lucide="globe" class="w-5 h-5 text-indigo-500 mr-2"></i>
                            <span class="font-medium">IP:</span>
                            <span class="ml-2"><?= $features['ip'] ?? '1 IPv4' ?></span>
                        </li>
                    </ul>
                    <form action="<?= site_url('cart/add') ?>" method="post" class="mt-6">
                        <?= csrf_field() ?>
                        <input type="hidden" name="service_id" value="<?= $service['id'] ?>">
                        <input type="hidden" name="type" value="service">
                        
                        <div class="mb-3">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Thời hạn</label>
                            <select name="duration" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500">
                                <option value="1">1 tháng</option>
                                <option value="3">3 tháng</option>
                                <option value="6">6 tháng</option>
                                <option value="12">12 tháng</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="w-full py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                            Thêm vào giỏ hàng
                        </button>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <p class="text-center text-gray-500 mt-6">Tất cả VPS đều được cài đặt hệ điều hành theo yêu cầu (Linux/Windows) và hỗ trợ kỹ thuật 24/7</p>
    </div>
    
    <!-- VPS Management Services -->
    <div class="mb-10">
        <h2 class="text-2xl font-semibold mb-6">Dịch vụ quản trị VPS</h2>
        <p class="mb-6 text-gray-600">Đừng lo lắng nếu bạn không có kinh nghiệm quản lý máy chủ. Chúng tôi cung cấp dịch vụ quản trị VPS chuyên nghiệp, giúp bạn vận hành máy chủ một cách hiệu quả và an toàn.</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($managementServices as $service): ?>
            <?php $features = json_decode($service['features'], true); ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 flex flex-col">
                <div class="p-6 border-b bg-gray-50">
                    <h3 class="text-xl font-bold"><?= $service['name'] ?></h3>
                    <div class="mt-2">
                        <span class="text-2xl font-bold"><?= number_format($service['price'], 0, ',', '.') ?>đ</span>
                        <span class="text-gray-500">/tháng</span>
                    </div>
                </div>
                <div class="p-6 flex-grow">
                    <div class="mb-4">
                        <p class="text-gray-600"><?= $service['description'] ?></p>
                    </div>
                    <ul class="space-y-2 mb-6">
                        <?php if (is_array($features)): ?>
                            <?php foreach ($features as $feature): ?>
                                <li class="flex items-start">
                                    <i data-lucide="check" class="w-5 h-5 text-green-500 mr-2 flex-shrink-0 mt-1"></i>
                                    <span><?= esc($feature) ?></span>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="p-6 bg-gray-50">
                    <form action="<?= site_url('cart/add') ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="service_id" value="<?= $service['id'] ?>">
                        <input type="hidden" name="type" value="service">
                        <button type="submit" class="w-full py-2 bg-indigo-600 text-white font-bold rounded-lg hover:bg-indigo-700 transition-colors flex items-center justify-center">
                            <i data-lucide="shopping-cart" class="w-5 h-5 mr-2"></i>
                            Đăng ký ngay
                        </button>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <!-- Features -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-6">Tính năng nổi bật của VPS</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-indigo-100 text-indigo-600">
                            <i data-lucide="cpu" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Hiệu năng mạnh mẽ</h3>
                        <p class="mt-1 text-gray-600">CPU và RAM hiệu năng cao, ổ cứng SSD NVMe cho tốc độ vượt trội, đáp ứng mọi nhu cầu.</p>
                    </div>
                </div>
                
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-indigo-100 text-indigo-600">
                            <i data-lucide="clock" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Uptime 99.9%</h3>
                        <p class="mt-1 text-gray-600">Cam kết thời gian hoạt động 99.9% với hệ thống máy chủ dự phòng và giám sát liên tục.</p>
                    </div>
                </div>
                
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-indigo-100 text-indigo-600">
                            <i data-lucide="shield" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Bảo mật nâng cao</h3>
                        <p class="mt-1 text-gray-600">Tích hợp tường lửa, bảo vệ DDoS và các giải pháp bảo mật chuyên nghiệp.</p>
                    </div>
                </div>
                
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-indigo-100 text-indigo-600">
                            <i data-lucide="settings" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Toàn quyền kiểm soát</h3>
                        <p class="mt-1 text-gray-600">Full quyền root/admin, tùy chọn hệ điều hành và cài đặt phần mềm theo nhu cầu.</p>
                    </div>
                </div>
                
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-indigo-100 text-indigo-600">
                            <i data-lucide="refresh-cw" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Nâng cấp linh hoạt</h3>
                        <p class="mt-1 text-gray-600">Dễ dàng nâng cấp tài nguyên (CPU, RAM, SSD) khi nhu cầu tăng lên mà không cần cài đặt lại.</p>
                    </div>
                </div>
                
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-indigo-100 text-indigo-600">
                            <i data-lucide="headphones" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Hỗ trợ chuyên nghiệp</h3>
                        <p class="mt-1 text-gray-600">Đội ngũ kỹ thuật chuyên nghiệp hỗ trợ 24/7 qua ticket, email và hotline.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- FAQ -->
    <div class="mb-12">
        <h2 class="text-2xl font-semibold mb-6">Câu hỏi thường gặp về VPS</h2>
        
        <div class="space-y-4">
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button class="w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100">
                    <span class="font-medium text-gray-800">VPS khác gì so với Shared Hosting?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-gray-500"></i>
                </button>
                <div class="p-4 border-t border-gray-200">
                    <p class="text-gray-600">VPS (Virtual Private Server) là một máy chủ ảo riêng biệt với tài nguyên (CPU, RAM, SSD) được cam kết dành riêng cho bạn, không chia sẻ với người dùng khác như Shared Hosting. VPS mang lại hiệu năng ổn định hơn, bảo mật cao hơn và toàn quyền kiểm soát máy chủ.</p>
                </div>
            </div>
            
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button class="w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100">
                    <span class="font-medium text-gray-800">Tôi có cần kiến thức kỹ thuật để sử dụng VPS?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-gray-500"></i>
                </button>
                <div class="p-4 border-t border-gray-200">
                    <p class="text-gray-600">Để quản lý hiệu quả một VPS, bạn cần có kiến thức cơ bản về quản trị máy chủ. Tuy nhiên, chúng tôi cung cấp dịch vụ quản trị VPS chuyên nghiệp nếu bạn không có kinh nghiệm hoặc muốn tiết kiệm thời gian quản lý.</p>
                </div>
            </div>
            
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button class="w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100">
                    <span class="font-medium text-gray-800">Có thể nâng cấp tài nguyên VPS sau này không?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-gray-500"></i>
                </button>
                <div class="p-4 border-t border-gray-200">
                    <p class="text-gray-600">Có, bạn có thể dễ dàng nâng cấp CPU, RAM và SSD của VPS khi nhu cầu của bạn tăng lên. Quá trình nâng cấp thường chỉ mất vài phút và không làm gián đoạn hoạt động của máy chủ.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // FAQ Toggle
    const faqItems = document.querySelectorAll('.space-y-4 .border');
    faqItems.forEach(item => {
        const button = item.querySelector('button');
        const content = button.nextElementSibling;
        const icon = button.querySelector('i[data-lucide]');
        
        // Initially hide all content except the first one if you want it open
        content.style.maxHeight = null;

        button.addEventListener('click', () => {
            const isExpanded = content.style.maxHeight;
            
            // Close all other items
            faqItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.querySelector('button').nextElementSibling.style.maxHeight = null;
                    const otherIcon = otherItem.querySelector('i[data-lucide]');
                    if (otherIcon) {
                        otherIcon.setAttribute('data-lucide', 'chevron-down');
                    }
                }
            });

            // Toggle current item
            if (isExpanded) {
                content.style.maxHeight = null;
                if (icon) icon.setAttribute('data-lucide', 'chevron-down');
            } else {
                content.style.maxHeight = content.scrollHeight + 'px';
                if (icon) icon.setAttribute('data-lucide', 'chevron-up');
            }
            lucide.createIcons();
        });
    });
});
</script> 