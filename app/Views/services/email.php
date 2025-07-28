<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= esc($title) ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Email Doanh Nghiệp</h1>

    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-4">Giải pháp Email chuyên nghiệp theo tên miền riêng</h2>
            <p class="mb-4 text-gray-600">Nâng cao uy tín thương hiệu và hiệu quả giao tiếp với hệ thống email theo tên miền riêng của bạn (ví dụ: tenban@tencongty.com). Dịch vụ của chúng tôi đảm bảo độ tin cậy, bảo mật cao và dễ dàng quản lý.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 my-8">
                <div class="flex flex-col items-center p-4 bg-blue-50 rounded-lg">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="shield-check" class="w-8 h-8 text-blue-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Uy tín & Chuyên nghiệp</h3>
                    <p class="text-center text-gray-600">Xây dựng hình ảnh thương hiệu nhất quán và đáng tin cậy.</p>
                </div>
                
                <div class="flex flex-col items-center p-4 bg-blue-50 rounded-lg">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="lock" class="w-8 h-8 text-blue-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Bảo mật cao</h3>
                    <p class="text-center text-gray-600">Hệ thống lọc spam và virus tiên tiến, đảm bảo an toàn.</p>
                </div>
                
                <div class="flex flex-col items-center p-4 bg-blue-50 rounded-lg">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="smartphone" class="w-8 h-8 text-blue-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Tương thích mọi thiết bị</h3>
                    <p class="text-center text-gray-600">Truy cập email mọi lúc, mọi nơi từ máy tính, điện thoại, tablet.</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Pricing Plans -->
    <div class="mb-10">
        <h2 class="text-2xl font-semibold text-center mb-8">Bảng giá dịch vụ Email Doanh Nghiệp</h2>
        
        <?php if (!empty($services)): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($services as $index => $service): ?>
            <?php 
                $features = json_decode($service['features'], true);
                $isPopular = $index === 1;
            ?>
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border <?= $isPopular ? 'border-2 border-blue-500' : 'border-gray-200 hover:border-blue-300' ?> transition-all flex flex-col">
                <?php if ($isPopular): ?>
                <div class="absolute top-0 right-0">
                    <div class="bg-blue-500 text-white text-xs font-bold px-3 py-1 rounded-bl-lg">
                        PHỔ BIẾN
                    </div>
                </div>
                <?php endif; ?>

                <div class="p-8 border-b <?= $isPopular ? 'bg-blue-50' : 'bg-gray-50' ?> text-center">
                    <h3 class="text-2xl font-bold text-gray-800"><?= esc($service['name']) ?></h3>
                    <p class="text-gray-500 mt-2"><?= esc($service['description']) ?></p>
                    <div class="my-6">
                        <span class="text-5xl font-extrabold"><?= number_format($service['price'], 0, ',', '.') ?>đ</span>
                        <span class="text-gray-500 self-end ml-1">/người dùng/tháng</span>
                    </div>
                </div>

                <div class="p-8 flex-grow flex flex-col">
                    <ul class="space-y-4 mb-8">
                        <?php if (!empty($features) && is_array($features)): ?>
                            <?php foreach ($features as $key => $value): ?>
                            <li class="flex items-center">
                                <?php
                                $icons = [
                                    'storage' => 'database',
                                    'security' => 'shield',
                                    'support' => 'life-buoy',
                                    'users' => 'users'
                                ];
                                $icon = $icons[$key] ?? 'check-circle';
                                ?>
                                <i data-lucide="<?= $icon ?>" class="w-5 h-5 text-blue-500 mr-3 flex-shrink-0"></i>
                                <span>
                                    <span class="font-semibold capitalize"><?= str_replace('_', ' ', esc($key)) ?>:</span>
                                    <?php if (is_array($value)): ?>
                                        <?= esc(implode(', ', $value)) ?>
                                    <?php else: ?>
                                        <?= esc($value) ?>
                                    <?php endif; ?>
                                </span>
                            </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                    <form action="<?= site_url('cart/add') ?>" method="post" class="mt-auto">
                        <?= csrf_field() ?>
                        <input type="hidden" name="service_id" value="<?= esc($service['id']) ?>">
                        <input type="hidden" name="type" value="service">
                        
                        <div class="mb-4">
                            <label for="quantity-<?= esc($service['id']) ?>" class="block text-sm font-medium text-gray-700 mb-1">Số lượng người dùng:</label>
                            <input type="number" id="quantity-<?= esc($service['id']) ?>" name="quantity" value="1" min="1" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
                        </div>

                        <button type="submit" class="w-full py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition-colors">
                            Thêm vào giỏ hàng
                        </button>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
            <div class="text-center py-12 px-6 bg-gray-50 rounded-lg">
                <i data-lucide="info" class="w-16 h-16 mx-auto text-gray-400"></i>
                <h3 class="mt-4 text-lg font-semibold text-gray-700">Chưa có dịch vụ Email</h3>
                <p class="mt-2 text-gray-500">Hiện tại chúng tôi chưa cung cấp dịch vụ Email Doanh Nghiệp. Vui lòng quay lại sau.</p>
            </div>
        <?php endif; ?>
        
        <p class="text-center text-gray-500 mt-8">Tất cả các gói đều có thể thanh toán theo tháng hoặc theo năm (tiết kiệm hơn). Liên hệ để biết thêm chi tiết.</p>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        lucide.createIcons();
    });
</script>
<?= $this->endSection() ?> 