<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div>
    <div class="mb-6 flex flex-col md:flex-row md:justify-between md:items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Chi Tiết Đơn Hàng #<?= $order['id'] ?></h1>
            <p class="text-gray-600 mt-1">Đặt hàng ngày <?= date('d/m/Y H:i', strtotime($order['created_at'])) ?></p>
        </div>
        
        <div class="mt-4 md:mt-0 flex items-center">
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
            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full <?= $class ?>">
                <?= $text ?>
            </span>
        </div>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Order Details -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-6">
                <div class="p-4 border-b">
                    <h2 class="font-bold text-lg">Chi tiết mua hàng</h2>
                </div>
                
                <div class="divide-y">
                    <?php foreach ($order['items'] as $item): ?>
                    <div class="p-4 flex items-start">
                        <div class="flex-shrink-0">
                            <img src="<?= $item['image'] ?? 'https://placehold.co/80x80/indigo/white' ?>" alt="<?= $item['product_name'] ?>" class="w-16 h-16 object-cover rounded-lg">
                        </div>
                        
                        <div class="ml-4 flex-grow">
                            <h3 class="font-medium text-gray-900">
                                <?= $item['product_name'] ?>
                                <?php if(isset($item['type']) && $item['type'] === 'service'): ?>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 ml-2">
                                    Dịch vụ
                                </span>
                                <?php endif; ?>
                            </h3>
                            <div class="flex items-center mt-1">
                                <?php if(isset($item['type']) && $item['type'] === 'service'): ?>
                                <span class="text-gray-500">Thời hạn: <?= $item['quantity'] ?> tháng</span>
                                <span class="mx-2 text-gray-300">|</span>
                                <span class="text-indigo-600 font-medium"><?= number_format($item['price']) ?>đ/tháng</span>
                                <?php else: ?>
                                <span class="text-gray-500">Số lượng: <?= $item['quantity'] ?></span>
                                <span class="mx-2 text-gray-300">|</span>
                                <span class="text-indigo-600 font-medium"><?= number_format($item['price']) ?>đ</span>
                                <?php endif; ?>
                            </div>
                            
                            <?php if(isset($item['type']) && $item['type'] === 'service'): ?>
                            <?php 
                                // Tính toán thời gian kết thúc dịch vụ
                                $startDate = new \DateTime($order['created_at']);
                                $endDate = clone $startDate;
                                $endDate->modify('+' . $item['quantity'] . ' months');
                                
                                // Hiển thị thời gian bắt đầu và kết thúc dịch vụ
                                $startFormatted = $startDate->format('d/m/Y');
                                $endFormatted = $endDate->format('d/m/Y');
                            ?>
                            <div class="mt-2 text-sm text-gray-500">
                                <span class="font-medium">Thời hạn:</span> <?= $startFormatted ?> - <?= $endFormatted ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="ml-4 text-right">
                            <p class="font-bold"><?= number_format($item['price'] * $item['quantity']) ?>đ</p>
                            <?php if(isset($item['type']) && $item['type'] === 'service' && $order['status'] !== 'cancelled'): ?>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?= time() < $endDate->getTimestamp() ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?> mt-2">
                                <?= time() < $endDate->getTimestamp() ? 'Còn hạn' : 'Hết hạn' ?>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <!-- Thông tin chi tiết về dịch vụ -->
                <?php 
                $hasServices = false;
                foreach ($order['items'] as $item) {
                    if (isset($item['type']) && $item['type'] === 'service') {
                        $hasServices = true;
                        break;
                    }
                }
                ?>
                
                <?php if ($hasServices && $order['status'] !== 'cancelled'): ?>
                <div class="p-4 bg-blue-50 border-t">
                    <h3 class="font-semibold text-gray-800 mb-2">Thông tin dịch vụ</h3>
                    <p class="text-sm text-gray-600">
                        Các dịch vụ của bạn đã được kích hoạt và sẵn sàng sử dụng. Thông tin chi tiết về cách truy cập và sử dụng dịch vụ đã được gửi vào email của bạn.
                    </p>
                    <div class="mt-2">
                        <a href="#" class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-800">
                            <i data-lucide="external-link" class="w-4 h-4 mr-1"></i>
                            Truy cập quản lý dịch vụ
                        </a>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            
            <!-- Order Status History -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="p-4 border-b">
                    <h2 class="font-bold text-lg">Lịch sử đơn hàng</h2>
                </div>
                
                <div class="p-4">
                    <div class="relative">
                        <!-- Status Line -->
                        <div class="absolute left-3.5 top-0 h-full w-0.5 bg-gray-200"></div>
                        
                        <!-- Status 1: Placed -->
                        <div class="relative flex items-start mb-6">
                            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-green-100 flex items-center justify-center z-10">
                                <i data-lucide="check" class="w-4 h-4 text-green-600"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-medium text-gray-900">Đặt hàng</h3>
                                <p class="text-sm text-gray-500">Đơn hàng đã được đặt thành công</p>
                                <p class="text-xs text-gray-400 mt-1"><?= date('d/m/Y H:i', strtotime($order['created_at'])) ?></p>
                            </div>
                        </div>
                        
                        <!-- Status 2: Processing (if applicable) -->
                        <?php if (in_array($order['status'], ['processing', 'completed'])): ?>
                        <div class="relative flex items-start mb-6">
                            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center z-10">
                                <i data-lucide="loader" class="w-4 h-4 text-blue-600"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-medium text-gray-900">Đang xử lý</h3>
                                <p class="text-sm text-gray-500">Đơn hàng của bạn đang được xử lý</p>
                                <p class="text-xs text-gray-400 mt-1"><?= date('d/m/Y H:i', strtotime($order['created_at'] . ' +1 minute')) ?></p>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <!-- Status 3: Completed (if applicable) -->
                        <?php if ($order['status'] === 'completed'): ?>
                        <div class="relative flex items-start">
                            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-green-100 flex items-center justify-center z-10">
                                <i data-lucide="check-circle" class="w-4 h-4 text-green-600"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-medium text-gray-900">Hoàn thành</h3>
                                <p class="text-sm text-gray-500">Đơn hàng của bạn đã hoàn thành</p>
                                <p class="text-xs text-gray-400 mt-1"><?= date('d/m/Y H:i', strtotime($order['created_at'] . ' +5 minutes')) ?></p>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <!-- Status 3: Cancelled (if applicable) -->
                        <?php if ($order['status'] === 'cancelled'): ?>
                        <div class="relative flex items-start">
                            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-red-100 flex items-center justify-center z-10">
                                <i data-lucide="x" class="w-4 h-4 text-red-600"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-medium text-gray-900">Đã hủy</h3>
                                <p class="text-sm text-gray-500">Đơn hàng đã bị hủy</p>
                                <p class="text-xs text-gray-400 mt-1"><?= isset($order['updated_at']) ? date('d/m/Y H:i', strtotime($order['updated_at'])) : date('d/m/Y H:i', strtotime($order['created_at'] . ' +5 minutes')) ?></p>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
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
                        <span class="font-medium"><?= number_format($order['total_amount']) ?>đ</span>
                    </div>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-600">Giảm giá</span>
                        <span class="font-medium">0đ</span>
                    </div>
                    
                    <div class="flex justify-between pt-3 border-t">
                        <span class="font-bold text-lg">Tổng cộng</span>
                        <span class="font-bold text-lg text-indigo-600"><?= number_format($order['total_amount']) ?>đ</span>
                    </div>
                </div>
                
                <div class="pt-4 border-t">
                    <a href="<?= site_url('orders') ?>" class="w-full block py-3 text-center bg-indigo-600 text-white font-bold rounded-lg hover:bg-indigo-700 transition">
                        Quay lại danh sách đơn hàng
                    </a>
                    
                    <?php if ($order['status'] === 'pending'): ?>
                    <button type="button" id="cancel-order" class="w-full block py-3 text-center text-red-600 font-medium hover:text-red-800 mt-3">
                        Hủy đơn hàng
                    </button>
                    <form id="cancel-form" action="<?= site_url('orders/cancel/' . $order['id']) ?>" method="post" class="hidden">
                        <?= csrf_field() ?>
                    </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($order['status'] === 'pending'): ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('cancel-order')?.addEventListener('click', function() {
            if (confirm('Bạn có chắc chắn muốn hủy đơn hàng này? Số tiền sẽ được hoàn lại vào tài khoản của bạn.')) {
                document.getElementById('cancel-form').submit();
            }
        });
    });
</script>
<?php endif; ?>
<?= $this->endSection() ?> 