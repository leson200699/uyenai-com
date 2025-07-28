<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Bảng điều khiển<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1 class="text-3xl font-bold text-gray-900 mb-6">Xin chào, <?= session()->get('name') ?>!</h1>

<!-- Stats Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
    <div class="p-6 bg-white border border-gray-200 rounded-xl shadow-sm">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Số dư tài khoản</p>
                <p class="text-3xl font-bold text-gray-900"><?= number_format(session()->get('balance')) ?>đ</p>
            </div>
            <div class="p-3 bg-indigo-100 rounded-full">
                <i data-lucide="wallet" class="w-6 h-6 text-indigo-600"></i>
            </div>
        </div>
        <div class="mt-4">
            <a href="<?= site_url('deposit') ?>" class="inline-flex items-center text-sm font-medium text-indigo-600">
                Nạp tiền <i data-lucide="arrow-right" class="w-4 h-4 ml-1"></i>
            </a>
        </div>
    </div>

    <div class="p-6 bg-white border border-gray-200 rounded-xl shadow-sm">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Đơn hàng của tôi</p>
                <p class="text-3xl font-bold text-gray-900"><?= count($recentOrders) ?></p>
            </div>
            <div class="p-3 bg-blue-100 rounded-full">
                <i data-lucide="shopping-bag" class="w-6 h-6 text-blue-600"></i>
            </div>
        </div>
        <div class="mt-4">
            <a href="<?= site_url('orders') ?>" class="inline-flex items-center text-sm font-medium text-blue-600">
                Xem tất cả đơn hàng <i data-lucide="arrow-right" class="w-4 h-4 ml-1"></i>
            </a>
        </div>
    </div>

    <div class="p-6 bg-white border border-gray-200 rounded-xl shadow-sm">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Giao dịch gần đây</p>
                <p class="text-3xl font-bold text-gray-900"><?= count($recentTransactions) ?></p>
            </div>
            <div class="p-3 bg-green-100 rounded-full">
                <i data-lucide="history" class="w-6 h-6 text-green-600"></i>
            </div>
        </div>
        <div class="mt-4">
            <a href="<?= site_url('transactions') ?>" class="inline-flex items-center text-sm font-medium text-green-600">
                Xem tất cả giao dịch <i data-lucide="arrow-right" class="w-4 h-4 ml-1"></i>
            </a>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Recent Orders Table -->
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm">
        <div class="p-4 border-b">
            <h3 class="text-lg font-semibold">Đơn Hàng Gần Đây</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-gray-500 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Mã ĐH</th>
                        <th scope="col" class="px-6 py-3">Ngày</th>
                        <th scope="col" class="px-6 py-3">Trạng thái</th>
                        <th scope="col" class="px-6 py-3">Tổng tiền</th>
                        <th scope="col" class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($recentOrders)): ?>
                        <tr class="bg-white border-b">
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">Bạn chưa có đơn hàng nào</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($recentOrders as $order): ?>
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900">#<?= $order['id'] ?></td>
                                <td class="px-6 py-4"><?= date('d/m/Y', strtotime($order['created_at'])) ?></td>
                                <td class="px-6 py-4">
                                    <?php
                                        $statusClasses = [
                                            'pending' => 'bg-yellow-100 text-yellow-800',
                                            'processing' => 'bg-blue-100 text-blue-800',
                                            'completed' => 'bg-green-100 text-green-800',
                                            'cancelled' => 'bg-red-100 text-red-800',
                                        ];
                                        $statusNames = [
                                            'pending' => 'Chờ xử lý',
                                            'processing' => 'Đang xử lý',
                                            'completed' => 'Hoàn thành',
                                            'cancelled' => 'Đã hủy',
                                        ];
                                        $statusClass = $statusClasses[$order['status']] ?? 'bg-gray-100 text-gray-800';
                                        $statusName = $statusNames[$order['status']] ?? 'Không xác định';
                                    ?>
                                    <span class="px-2 py-1 text-xs font-medium <?= $statusClass ?> rounded-full">
                                        <?= $statusName ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-semibold"><?= number_format($order['total_amount']) ?>đ</td>
                                <td class="px-6 py-4 text-right">
                                    <a href="<?= site_url('orders/view/' . $order['id']) ?>" class="text-indigo-600 hover:text-indigo-900">Chi tiết</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t">
            <a href="<?= site_url('orders') ?>" class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">Xem tất cả đơn hàng</a>
        </div>
    </div>

    <!-- Recent Transactions -->
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm">
        <div class="p-4 border-b">
            <h3 class="text-lg font-semibold">Giao Dịch Gần Đây</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-gray-500 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Ngày</th>
                        <th scope="col" class="px-6 py-3">Loại</th>
                        <th scope="col" class="px-6 py-3">Số tiền</th>
                        <th scope="col" class="px-6 py-3">Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($recentTransactions)): ?>
                        <tr class="bg-white border-b">
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">Bạn chưa có giao dịch nào</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($recentTransactions as $transaction): ?>
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900">#<?= $transaction['id'] ?></td>
                                <td class="px-6 py-4"><?= date('d/m/Y', strtotime($transaction['created_at'])) ?></td>
                                <td class="px-6 py-4">
                                    <?php
                                        $typeNames = [
                                            'deposit' => 'Nạp tiền',
                                            'withdrawal' => 'Rút tiền',
                                            'purchase' => 'Mua hàng',
                                        ];
                                        echo $typeNames[$transaction['type']] ?? 'Không xác định';
                                    ?>
                                </td>
                                <td class="px-6 py-4 font-semibold <?= $transaction['amount'] > 0 ? 'text-green-600' : 'text-red-600' ?>">
                                    <?= ($transaction['amount'] > 0 ? '+' : '') . number_format($transaction['amount']) ?>đ
                                </td>
                                <td class="px-6 py-4">
                                    <?php
                                        $transStatusClasses = [
                                            'pending' => 'bg-yellow-100 text-yellow-800',
                                            'completed' => 'bg-green-100 text-green-800',
                                            'failed' => 'bg-red-100 text-red-800',
                                        ];
                                        $transStatusNames = [
                                            'pending' => 'Chờ xử lý',
                                            'completed' => 'Hoàn thành',
                                            'failed' => 'Thất bại',
                                        ];
                                        $transStatusClass = $transStatusClasses[$transaction['status']] ?? 'bg-gray-100 text-gray-800';
                                        $transStatusName = $transStatusNames[$transaction['status']] ?? 'Không xác định';
                                    ?>
                                    <span class="px-2 py-1 text-xs font-medium <?= $transStatusClass ?> rounded-full">
                                        <?= $transStatusName ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t">
            <a href="<?= site_url('transactions') ?>" class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">Xem tất cả giao dịch</a>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="mt-8 bg-white border border-gray-200 rounded-xl shadow-sm p-6">
    <h3 class="text-lg font-semibold mb-4">Truy cập nhanh</h3>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
        <a href="<?= site_url('products') ?>" class="flex flex-col items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
            <i data-lucide="shopping-cart" class="w-8 h-8 mb-2 text-indigo-600"></i>
            <span class="text-sm font-medium">Mua sản phẩm</span>
        </a>
        
        <a href="<?= site_url('deposit') ?>" class="flex flex-col items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
            <i data-lucide="wallet" class="w-8 h-8 mb-2 text-green-600"></i>
            <span class="text-sm font-medium">Nạp tiền</span>
        </a>
        
        <a href="<?= site_url('profile') ?>" class="flex flex-col items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
            <i data-lucide="user" class="w-8 h-8 mb-2 text-blue-600"></i>
            <span class="text-sm font-medium">Thông tin cá nhân</span>
        </a>
        
        <a href="<?= site_url('contact') ?>" class="flex flex-col items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
            <i data-lucide="help-circle" class="w-8 h-8 mb-2 text-orange-600"></i>
            <span class="text-sm font-medium">Hỗ trợ</span>
        </a>
    </div>
</div>
<?= $this->endSection() ?> 