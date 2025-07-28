<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Đơn Hàng Của Tôi</h1>
        <p class="text-gray-600 mt-1">Quản lý và theo dõi các đơn hàng của bạn</p>
    </div>
    
    <?php if (empty($orders)): ?>
    
    <div class="bg-white rounded-xl shadow-sm p-8 text-center">
        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i data-lucide="package" class="w-10 h-10 text-gray-400"></i>
        </div>
        <h2 class="text-xl font-bold text-gray-900 mb-2">Chưa có đơn hàng nào</h2>
        <p class="text-gray-600 mb-6">Bạn chưa có đơn hàng nào. Hãy mua sắm để tạo đơn hàng đầu tiên.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?= site_url('products') ?>" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                <i data-lucide="shopping-bag" class="w-5 h-5 mr-2"></i>
                Xem sản phẩm
            </a>
            <a href="<?= site_url('services/hosting') ?>" class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700">
                <i data-lucide="server" class="w-5 h-5 mr-2"></i>
                Xem dịch vụ
            </a>
        </div>
    </div>
    
    <?php else: ?>
    
    <div class="space-y-6">
        <?php foreach ($orders as $order): ?>
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="p-4 sm:p-6 flex flex-col sm:flex-row items-start sm:items-center justify-between border-b">
                    <div>
                        <div class="flex items-center">
                            <h3 class="text-lg font-bold text-gray-900">Đơn hàng #<?= $order['id'] ?></h3>
                            <?php 
                                $statusClass = [
                                    'pending' => 'bg-yellow-100 text-yellow-800',
                                    'processing' => 'bg-blue-100 text-blue-800',
                                    'completed' => 'bg-green-100 text-green-800',
                                    'cancelled' => 'bg-red-100 text-red-800'
                                ];
                                
                                $statusText = [
                                    'pending' => 'Chờ xử lý',
                                    'processing' => 'Đang xử lý',
                                    'completed' => 'Hoàn tất',
                                    'cancelled' => 'Đã hủy'
                                ];
                                
                                $class = $statusClass[$order['status']] ?? 'bg-gray-100 text-gray-800';
                                $text = $statusText[$order['status']] ?? 'Không xác định';
                            ?>
                            <span class="ml-3 px-3 py-1 text-xs leading-5 font-semibold rounded-full <?= $class ?>">
                                <?= $text ?>
                            </span>
                        </div>
                        <p class="text-sm text-gray-500 mt-1">
                            Ngày đặt: <?= date('d/m/Y H:i', strtotime($order['created_at'])) ?>
                        </p>
                    </div>
                    <div class="mt-4 sm:mt-0">
                        <p class="text-lg font-bold text-indigo-600"><?= number_format($order['total_amount']) ?>đ</p>
                    </div>
                </div>

                <div class="p-4 sm:p-6">
                    <!-- Thông tin tóm tắt về các sản phẩm và dịch vụ -->
                    <?php if (!empty($order['item_summary'])): ?>
                    <div class="mb-4">
                        <h4 class="text-sm font-medium text-gray-600 mb-2">
                            <?= $order['total_items'] ?> mục 
                            <?php if ($order['product_count'] > 0): ?>
                                <span class="px-2 py-0.5 text-xs bg-indigo-100 text-indigo-800 rounded">
                                    <?= $order['product_count'] ?> sản phẩm
                                </span>
                            <?php endif; ?>
                            <?php if ($order['service_count'] > 0): ?>
                                <span class="px-2 py-0.5 text-xs bg-blue-100 text-blue-800 rounded ml-1">
                                    <?= $order['service_count'] ?> dịch vụ
                                </span>
                            <?php endif; ?>
                        </h4>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-3">
                            <?php foreach($order['item_summary'] as $item): ?>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-md object-cover" 
                                         src="<?= $item['image'] ?? 'https://placehold.co/40x40/indigo/white' ?>" 
                                         alt="<?= $item['product_name'] ?>">
                                </div>
                                <div class="ml-3">
                                    <div class="flex items-center">
                                        <p class="text-sm font-medium text-gray-900"><?= $item['product_name'] ?></p>
                                        <?php if(isset($item['type']) && $item['type'] === 'service'): ?>
                                        <span class="ml-2 px-1.5 py-0.5 text-xs bg-blue-100 text-blue-800 rounded-full">Dịch vụ</span>
                                        <?php endif; ?>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-0.5">
                                        <?php if(isset($item['type']) && $item['type'] === 'service'): ?>
                                            <?= $item['quantity'] ?> tháng x <?= number_format($item['price']) ?>đ
                                        <?php else: ?>
                                            <?= $item['quantity'] ?> x <?= number_format($item['price']) ?>đ
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                            <?php endforeach; ?>

                            <?php if($order['total_items'] > 2): ?>
                            <div class="flex items-center">
                                <div class="bg-gray-100 rounded-full w-10 h-10 flex items-center justify-center">
                                    <span class="text-sm font-medium text-gray-700">+<?= $order['total_items'] - 2 ?></span>
                                </div>
                                <p class="ml-3 text-sm text-gray-600"><?= $order['total_items'] - 2 ?> mục khác</p>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Nút thao tác -->
                    <div class="flex flex-wrap items-center gap-2 pt-4 border-t">
                        <a href="<?= site_url('orders/view/' . $order['id']) ?>" 
                           class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700">
                            Xem chi tiết
                        </a>
                        
                        <?php if ($order['status'] === 'pending'): ?>
                        <form action="<?= site_url('orders/cancel/' . $order['id']) ?>" method="post" class="inline-block" onsubmit="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')">
                            <?= csrf_field() ?>
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-red-300 text-sm font-medium rounded-lg text-red-600 bg-white hover:bg-red-50">
                                Hủy đơn hàng
                            </button>
                        </form>
                        <?php endif; ?>

                        <?php if ($order['status'] === 'completed' && $order['service_count'] > 0): ?>
                        <a href="#" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50">
                            <i data-lucide="server" class="w-4 h-4 mr-1"></i>
                            Quản lý dịch vụ
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <?php endif; ?>
</div>
<?= $this->endSection() ?> 