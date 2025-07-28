<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <a href="<?= site_url('admin/orders') ?>" class="inline-flex items-center text-indigo-600 hover:text-indigo-900 mb-4">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
            Trở về danh sách Đơn hàng
        </a>

        <h2 class="text-2xl font-semibold leading-tight">Chi tiết Đơn hàng #<?= esc($order['id']) ?></h2>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative my-4" role="alert">
                <span class="block sm:inline"><?= session()->getFlashdata('success') ?></span>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative my-4" role="alert">
                <span class="block sm:inline"><?= session()->getFlashdata('error') ?></span>
            </div>
        <?php endif; ?>
        
        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Order Details -->
            <div class="md:col-span-2">
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-semibold border-b pb-3 mb-4">Sản phẩm trong đơn hàng</h3>
                    <div class="space-y-4">
                        <?php foreach($items as $item): ?>
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="font-semibold"><?= esc($item['product_name'] ?? 'Sản phẩm không xác định') ?></p>
                                    <p class="text-sm text-gray-600">Số lượng: <?= esc($item['quantity']) ?></p>
                                </div>
                                <p class="text-lg font-semibold"><?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?>đ</p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="border-t mt-4 pt-4 flex justify-between items-center">
                        <span class="text-lg font-bold">Tổng cộng</span>
                        <span class="text-xl font-bold text-indigo-600"><?= number_format($order['total_amount'], 0, ',', '.') ?>đ</span>
                    </div>
                </div>
            </div>

            <!-- Customer & Status -->
            <div class="md:col-span-1 space-y-6">
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-semibold border-b pb-3 mb-4">Thông tin Khách hàng</h3>
                    <div class="space-y-2">
                        <p><strong>Tên:</strong> <?= esc($order['name']) ?></p>
                        <p><strong>Email:</strong> <?= esc($order['email']) ?></p>
                        <p><strong>Ngày đặt:</strong> <?= date('d/m/Y H:i', strtotime($order['created_at'])) ?></p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-semibold border-b pb-3 mb-4">Cập nhật Trạng thái</h3>
                    <form action="<?= site_url('admin/orders/update-status/' . $order['id']) ?>" method="post">
                        <?= csrf_field() ?>
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái đơn hàng</label>
                            <select name="status" id="status" class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="pending" <?= $order['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                                <option value="completed" <?= $order['status'] === 'completed' ? 'selected' : '' ?>>Completed</option>
                                <option value="cancelled" <?= $order['status'] === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                            </select>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                Cập nhật
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 