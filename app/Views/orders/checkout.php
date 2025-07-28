<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Thanh Toán</h1>
        <p class="text-gray-600 mt-1">Hoàn tất đơn hàng của bạn</p>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Order Items -->
        <div class="lg:col-span-2">
            <!-- Payment Method -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-6">
                <div class="p-4 border-b">
                    <h2 class="font-bold text-lg">Phương thức thanh toán</h2>
                </div>
                
                <div class="p-4">
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-gray-200 mb-4">
                        <div class="flex items-center">
                            <input type="radio" name="payment_method" id="balance" value="balance" checked class="w-5 h-5 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                            <label for="balance" class="ml-3 block text-sm font-medium text-gray-700">Thanh toán từ số dư tài khoản</label>
                        </div>
                        <div class="text-right">
                            <p class="text-gray-600 text-sm">Số dư hiện tại</p>
                            <p class="font-bold text-lg text-indigo-600"><?= number_format($user['balance']) ?>đ</p>
                        </div>
                    </div>
                    
                    <?php if ($user['balance'] < $cartItems['subtotal']): ?>
                    <div class="p-4 bg-yellow-50 text-yellow-700 border border-yellow-200 rounded-lg flex items-start">
                        <i data-lucide="alert-triangle" class="w-5 h-5 mr-3 flex-shrink-0"></i>
                        <div>
                            <p class="font-medium">Số dư không đủ</p>
                            <p class="text-sm mt-1">Số dư hiện tại của bạn không đủ để thanh toán đơn hàng này. Vui lòng nạp thêm tiền vào tài khoản để tiếp tục.</p>
                            <div class="mt-3">
                                <a href="<?= site_url('deposit') ?>" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700">
                                    <i data-lucide="wallet" class="w-4 h-4 mr-2"></i>
                                    Nạp tiền ngay
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Order Items -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="p-4 border-b">
                    <h2 class="font-bold text-lg">Các mục đã chọn (<?= count($cartItems['items']) ?>)</h2>
                </div>
                
                <div class="divide-y">
                    <?php foreach ($cartItems['items'] as $item): ?>
                    <div class="p-4 flex items-start">
                        <div class="flex-shrink-0">
                            <img src="<?= $item['image'] ?? 'https://placehold.co/300x300/e2e8f0/1e293b?text=Item' ?>" alt="<?= $item['name'] ?>" class="w-16 h-16 object-cover rounded-lg">
                        </div>
                        
                        <div class="ml-4 flex-grow">
                            <h3 class="font-medium text-gray-900">
                                <?= $item['name'] ?>
                                <?php if($item['type'] === 'service'): ?>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 ml-2">
                                        Dịch vụ
                                    </span>
                                <?php endif; ?>
                            </h3>
                            <div class="flex items-center mt-1">
                                <span class="text-gray-500">
                                    <?php if($item['type'] === 'product'): ?>
                                        Số lượng: <?= $item['quantity'] ?>
                                    <?php elseif($item['type'] === 'service'): ?>
                                        Thời hạn: <?= $item['quantity'] ?> tháng
                                    <?php endif; ?>
                                </span>
                                <span class="mx-2 text-gray-300">|</span>
                                <span class="text-indigo-600 font-medium"><?= number_format($item['price']) ?>đ<?= $item['type'] === 'service' ? '/tháng' : '' ?></span>
                            </div>
                            
                            <?php if($item['type'] === 'service' && !empty($item['features'])): ?>
                                <div class="mt-2 text-sm text-gray-500">
                                    <?php
                                        $features = is_string($item['features']) ? json_decode($item['features'], true) : $item['features'];
                                        $displayFeatures = [];
                                        if (is_array($features)) {
                                            $featureKeys = ['cpu', 'ram', 'disk', 'bandwidth'];
                                            foreach($featureKeys as $key) {
                                                if (isset($features[$key])) {
                                                    $displayFeatures[] = ucfirst($key) . ': ' . $features[$key];
                                                }
                                            }
                                        }
                                        echo implode(' • ', $displayFeatures);
                                    ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="ml-4 text-right">
                            <p class="font-bold">
                                <?= number_format($item['subtotal']) ?>đ
                            </p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="p-4 bg-gray-50 border-t">
                    <a href="<?= site_url('cart') ?>" class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-800">
                        <i data-lucide="arrow-left" class="w-4 h-4 mr-1"></i>
                        Quay lại giỏ hàng
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Order Summary -->
        <div>
            <div class="bg-white rounded-xl shadow-sm p-4 sticky top-24">
                <h2 class="font-bold text-lg border-b pb-4">Tóm tắt đơn hàng</h2>
                
                <div class="py-4 space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Tạm tính</span>
                        <span class="font-medium" id="subtotal"><?= number_format($cartItems['subtotal']) ?>đ</span>
                    </div>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-600">Giảm giá</span>
                        <span class="font-medium">0đ</span>
                    </div>
                    
                    <div class="flex justify-between pt-3 border-t">
                        <span class="font-bold text-lg">Tổng cộng</span>
                        <span class="font-bold text-lg text-indigo-600" id="total"><?= number_format($cartItems['subtotal']) ?>đ</span>
                    </div>
                </div>
                
                <form action="<?= site_url('checkout') ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="payment_method" value="balance">
                    
                    <div class="pt-4 border-t">
                        <button type="submit" <?= $user['balance'] < $cartItems['subtotal'] ? 'disabled' : '' ?> class="w-full py-3 bg-indigo-600 text-white font-bold rounded-lg hover:bg-indigo-700 transition <?= $user['balance'] < $cartItems['subtotal'] ? 'opacity-50 cursor-not-allowed' : '' ?>">
                            Hoàn tất thanh toán
                        </button>
                        
                        <?php if ($user['balance'] < $cartItems['subtotal']): ?>
                        <p class="mt-3 text-sm text-center text-red-600">Số dư không đủ để thanh toán</p>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 