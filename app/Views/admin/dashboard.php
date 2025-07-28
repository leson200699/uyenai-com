<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>Admin Dashboard<?= $this->endSection() ?>
<?= $this->section('page_title') ?>Admin Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Stats Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <div class="p-6 bg-white border border-gray-200 rounded-xl shadow-sm">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Tổng Người Dùng</p>
                <p class="text-3xl font-bold text-gray-900"><?= $totalUsers ?></p>
            </div>
            <div class="p-3 bg-indigo-100 rounded-full">
                <i data-lucide="users" class="w-6 h-6 text-indigo-600"></i>
            </div>
        </div>
    </div>

    <div class="p-6 bg-white border border-gray-200 rounded-xl shadow-sm">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Tổng Đơn Hàng</p>
                <p class="text-3xl font-bold text-gray-900"><?= $totalOrders ?></p>
            </div>
            <div class="p-3 bg-blue-100 rounded-full">
                <i data-lucide="shopping-bag" class="w-6 h-6 text-blue-600"></i>
            </div>
        </div>
    </div>

    <div class="p-6 bg-white border border-gray-200 rounded-xl shadow-sm">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Đơn Hoàn Thành</p>
                <p class="text-3xl font-bold text-gray-900"><?= $completedOrders ?></p>
            </div>
            <div class="p-3 bg-green-100 rounded-full">
                <i data-lucide="check-circle" class="w-6 h-6 text-green-600"></i>
            </div>
        </div>
    </div>

    <div class="p-6 bg-white border border-gray-200 rounded-xl shadow-sm">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Tổng Doanh Thu</p>
                <p class="text-3xl font-bold text-gray-900"><?= number_format($totalRevenue) ?>đ</p>
            </div>
            <div class="p-3 bg-purple-100 rounded-full">
                <i data-lucide="dollar-sign" class="w-6 h-6 text-purple-600"></i>
            </div>
        </div>
    </div>
</div>

<!-- Recent Orders Table -->
<div class="bg-white border border-gray-200 rounded-xl shadow-sm">
    <div class="p-4 border-b flex justify-between items-center">
        <h3 class="text-lg font-semibold">Đơn Hàng Gần Đây</h3>
        <a href="<?= site_url('admin/orders') ?>" class="text-sm text-indigo-600 hover:text-indigo-900">Xem tất cả</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="text-xs text-gray-500 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Khách hàng</th>
                    <th scope="col" class="px-6 py-3">Ngày</th>
                    <th scope="col" class="px-6 py-3">Trạng thái</th>
                    <th scope="col" class="px-6 py-3">Tổng tiền</th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($recentOrders)): ?>
                    <tr class="bg-white border-b">
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">Không có đơn hàng nào</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($recentOrders as $order): ?>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">#<?= $order['id'] ?></td>
                            <td class="px-6 py-4">
                                <?php
                                $userModel = new \App\Models\UserModel();
                                $user = $userModel->find($order['user_id']);
                                echo $user ? $user['name'] : 'Không xác định';
                                ?>
                            </td>
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
                                <a href="<?= site_url('admin/orders/view/' . $order['id']) ?>" class="text-indigo-600 hover:text-indigo-900">Chi tiết</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Quick Links -->
<div class="mt-8 bg-white border border-gray-200 rounded-xl shadow-sm p-6">
    <h3 class="text-lg font-semibold mb-4">Quản lý nhanh</h3>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
        <a href="<?= site_url('admin/products/create') ?>" class="flex flex-col items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
            <i data-lucide="plus-circle" class="w-8 h-8 mb-2 text-indigo-600"></i>
            <span class="text-sm font-medium">Thêm sản phẩm</span>
        </a>
        
        <a href="<?= site_url('admin/categories/create') ?>" class="flex flex-col items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
            <i data-lucide="folder-plus" class="w-8 h-8 mb-2 text-green-600"></i>
            <span class="text-sm font-medium">Thêm danh mục</span>
        </a>
        
        <a href="<?= site_url('admin/users/create') ?>" class="flex flex-col items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
            <i data-lucide="user-plus" class="w-8 h-8 mb-2 text-blue-600"></i>
            <span class="text-sm font-medium">Thêm người dùng</span>
        </a>
        
        <a href="<?= site_url('admin/orders') ?>" class="flex flex-col items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
            <i data-lucide="package-check" class="w-8 h-8 mb-2 text-orange-600"></i>
            <span class="text-sm font-medium">Quản lý đơn hàng</span>
        </a>
    </div>
</div>
<?= $this->endSection() ?> 