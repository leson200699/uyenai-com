<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Dịch vụ Hosting</h1>
    
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-4">Giải pháp hosting chất lượng cao</h2>
            <p class="mb-4 text-gray-600">Chúng tôi cung cấp dịch vụ hosting ổn định, tốc độ cao và bảo mật tốt cho website của bạn. Với hệ thống máy chủ hiện đại và đội ngũ kỹ thuật hỗ trợ 24/7, chúng tôi cam kết mang đến trải nghiệm hosting tốt nhất cho khách hàng.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 my-8">
                <div class="flex flex-col items-center p-4 bg-emerald-50 rounded-lg">
                    <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="zap" class="w-8 h-8 text-emerald-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Tốc độ cao</h3>
                    <p class="text-center text-gray-600">SSD NVMe siêu nhanh, tối ưu cho tốc độ tải trang</p>
                </div>
                
                <div class="flex flex-col items-center p-4 bg-emerald-50 rounded-lg">
                    <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="shield" class="w-8 h-8 text-emerald-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Bảo mật</h3>
                    <p class="text-center text-gray-600">Bảo mật cao với tường lửa và giám sát 24/7</p>
                </div>
                
                <div class="flex flex-col items-center p-4 bg-emerald-50 rounded-lg">
                    <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="headphones" class="w-8 h-8 text-emerald-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Hỗ trợ 24/7</h3>
                    <p class="text-center text-gray-600">Đội ngũ hỗ trợ chuyên nghiệp luôn sẵn sàng giúp đỡ</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Pricing Plans -->
    <div class="mb-8">
        <h2 class="text-2xl font-semibold mb-6">Bảng giá dịch vụ hosting</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($services as $index => $service): ?>
            <?php 
                $features = json_decode($service['features'], true);
                $isMiddle = $index === 1; 
            ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden border <?= $isMiddle ? 'border-2 border-emerald-500 transform scale-105' : 'border-gray-200 transition-transform hover:scale-105' ?>">
                <?php if ($isMiddle): ?>
                <div class="absolute top-0 right-0">
                    <div class="bg-emerald-500 text-white text-xs font-bold px-3 py-1 rounded-bl-lg">
                        PHỔ BIẾN
                    </div>
                </div>
                <?php endif; ?>
                <div class="p-6 border-b bg-emerald-50">
                    <h3 class="text-xl font-bold text-center"><?= $service['name'] ?></h3>
                    <div class="flex justify-center my-4">
                        <span class="text-3xl font-bold"><?= number_format($service['price'], 0, ',', '.') ?>đ</span>
                        <span class="text-gray-500 self-end ml-1">/<?= $service['duration'] === 'month' ? 'tháng' : 'năm' ?></span>
                    </div>
                </div>
                <div class="p-6">
                    <ul class="space-y-3">
                        <li class="flex items-center">
                            <i data-lucide="check" class="w-5 h-5 text-green-500 mr-2"></i>
                            <span><?= $features['storage'] ?? 'SSD Storage' ?></span>
                        </li>
                        <li class="flex items-center">
                            <i data-lucide="check" class="w-5 h-5 text-green-500 mr-2"></i>
                            <span><?= $features['bandwidth'] ?? 'Băng thông' ?></span>
                        </li>
                        <li class="flex items-center">
                            <i data-lucide="check" class="w-5 h-5 text-green-500 mr-2"></i>
                            <span><?= $features['email'] ?? 'Email Accounts' ?></span>
                        </li>
                        <li class="flex items-center">
                            <i data-lucide="check" class="w-5 h-5 text-green-500 mr-2"></i>
                            <span><?= $features['database'] ?? 'Database' ?></span>
                        </li>
                        <li class="flex items-center">
                            <i data-lucide="check" class="w-5 h-5 text-green-500 mr-2"></i>
                            <span>
                                <?= $features['ssl'] ?? 'SSL' ?>
                                <?= isset($features['backup']) && $features['backup'] !== 'No' ? ' + ' . $features['backup'] : '' ?>
                                <?= isset($features['cdn']) && $features['cdn'] === 'Yes' ? ' + CDN' : '' ?>
                            </span>
                        </li>
                    </ul>
                    <form action="<?= site_url('cart/add') ?>" method="post" class="mt-6">
                        <?= csrf_field() ?>
                        <input type="hidden" name="service_id" value="<?= $service['id'] ?>">
                        <input type="hidden" name="type" value="service">
                        
                        <div class="mb-3">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Thời hạn</label>
                            <select name="duration" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-emerald-500">
                                <option value="1">1 tháng</option>
                                <option value="3">3 tháng</option>
                                <option value="6">6 tháng</option>
                                <option value="12">12 tháng</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="w-full py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
                            Thêm vào giỏ hàng
                        </button>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <p class="text-center text-gray-500 mt-6">Tất cả các gói hosting đều có hệ điều hành Linux, cPanel và hỗ trợ kỹ thuật 24/7</p>
    </div>
    
    <!-- Features -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-6">Tính năng nổi bật</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-emerald-100 text-emerald-600">
                            <i data-lucide="cpu" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Hiệu năng mạnh mẽ</h3>
                        <p class="mt-1 text-gray-600">Sử dụng ổ cứng SSD NVMe với tốc độ đọc/ghi siêu nhanh, giúp website của bạn hoạt động mượt mà.</p>
                    </div>
                </div>
                
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-emerald-100 text-emerald-600">
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
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-emerald-100 text-emerald-600">
                            <i data-lucide="shield" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Bảo mật nâng cao</h3>
                        <p class="mt-1 text-gray-600">Tích hợp tường lửa, bảo vệ DDoS và chứng chỉ SSL miễn phí giúp bảo vệ website của bạn.</p>
                    </div>
                </div>
                
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-emerald-100 text-emerald-600">
                            <i data-lucide="settings" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Quản lý dễ dàng</h3>
                        <p class="mt-1 text-gray-600">Giao diện cPanel thân thiện giúp bạn quản lý website, email, database một cách dễ dàng.</p>
                    </div>
                </div>
                
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-emerald-100 text-emerald-600">
                            <i data-lucide="refresh-cw" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Backup thường xuyên</h3>
                        <p class="mt-1 text-gray-600">Hệ thống sao lưu tự động giúp bảo vệ dữ liệu website của bạn khỏi rủi ro mất mát.</p>
                    </div>
                </div>
                
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-emerald-100 text-emerald-600">
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
        <h2 class="text-2xl font-semibold mb-6">Câu hỏi thường gặp</h2>
        
        <div class="space-y-4">
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button class="w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100">
                    <span class="font-medium text-gray-800">Hosting của bạn có hỗ trợ WordPress không?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-gray-500"></i>
                </button>
                <div class="p-4 border-t border-gray-200">
                    <p class="text-gray-600">Có, tất cả các gói hosting của chúng tôi đều hỗ trợ WordPress và các CMS phổ biến khác như Joomla, Drupal, Magento, v.v.</p>
                </div>
            </div>
            
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button class="w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100">
                    <span class="font-medium text-gray-800">Tôi có thể nâng cấp gói hosting khi cần thiết không?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-gray-500"></i>
                </button>
                <div class="p-4 border-t border-gray-200">
                    <p class="text-gray-600">Có, bạn có thể dễ dàng nâng cấp gói hosting của mình bất kỳ lúc nào. Quá trình nâng cấp sẽ được thực hiện nhanh chóng và không làm gián đoạn hoạt động của website.</p>
                </div>
            </div>
            
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button class="w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100">
                    <span class="font-medium text-gray-800">Chính sách hoàn tiền như thế nào?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-gray-500"></i>
                </button>
                <div class="p-4 border-t border-gray-200">
                    <p class="text-gray-600">Chúng tôi cung cấp chính sách hoàn tiền trong vòng 30 ngày đầu tiên nếu bạn không hài lòng với dịch vụ của chúng tôi.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Lucide Icons
    lucide.createIcons();
    
    // FAQ accordion functionality
    const faqButtons = document.querySelectorAll('.border.rounded-lg.overflow-hidden button');
    
    faqButtons.forEach(button => {
        button.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const isVisible = !content.classList.contains('hidden');
            
            if (isVisible) {
                content.classList.add('hidden');
                this.querySelector('i').classList.remove('rotate-180');
            } else {
                content.classList.remove('hidden');
                this.querySelector('i').classList.add('rotate-180');
            }
        });
    });
});
</script>
<?= $this->endSection() ?> 