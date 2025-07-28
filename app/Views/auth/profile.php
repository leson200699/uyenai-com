<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Thông tin cá nhân<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex justify-center">
    <div class="w-full max-w-2xl">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 md:p-8">
            <h1 class="text-2xl font-bold text-gray-900 mb-6">Thông tin cá nhân</h1>
            
            <form action="<?= site_url('profile') ?>" method="POST">
                <?= csrf_field() ?>
                
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Họ và tên</label>
                    <input type="text" name="name" id="name" value="<?= $user['name'] ?? old('name') ?>" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" id="email" value="<?= $user['email'] ?? old('email') ?>" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Số dư tài khoản</label>
                    <div class="px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg text-lg font-semibold text-indigo-600">
                        <?= number_format($user['balance'] ?? 0) ?>đ
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Để nạp tiền vào tài khoản, vui lòng truy cập <a href="<?= site_url('deposit') ?>" class="text-indigo-600 hover:text-indigo-800">Nạp tiền</a></p>
                </div>
                
                <div class="border-t border-gray-200 my-6 pt-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Đổi mật khẩu</h2>
                    <p class="text-sm text-gray-600 mb-4">Để giữ nguyên mật khẩu, hãy để trống các trường bên dưới.</p>
                    
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu mới</label>
                        <input type="password" name="password" id="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <p class="text-xs text-gray-500 mt-1">Mật khẩu phải có ít nhất 8 ký tự</p>
                    </div>
                    
                    <div class="mb-6">
                        <label for="password_confirm" class="block text-sm font-medium text-gray-700 mb-1">Xác nhận mật khẩu mới</label>
                        <input type="password" name="password_confirm" id="password_confirm" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                </div>
                
                <div class="flex justify-end">
                    <button type="submit" class="py-2 px-6 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors">
                        Cập nhật thông tin
                    </button>
                </div>
            </form>
        </div>
        
        <!-- Account Actions -->
        <div class="mt-6 bg-white border border-gray-200 rounded-xl shadow-sm p-6 md:p-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Các thao tác khác</h2>
            
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="font-semibold text-gray-900">Xem lịch sử giao dịch</h3>
                        <p class="text-sm text-gray-600">Kiểm tra lịch sử nạp tiền và thanh toán</p>
                    </div>
                    <a href="<?= site_url('transactions') ?>" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded-lg transition-colors">Xem</a>
                </div>
                
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="font-semibold text-gray-900">Xem lịch sử đơn hàng</h3>
                        <p class="text-sm text-gray-600">Kiểm tra thông tin đơn hàng đã mua</p>
                    </div>
                    <a href="<?= site_url('orders') ?>" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded-lg transition-colors">Xem</a>
                </div>
                
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="font-semibold text-gray-900">Nạp tiền vào tài khoản</h3>
                        <p class="text-sm text-gray-600">Nạp thêm tiền để mua hàng</p>
                    </div>
                    <a href="<?= site_url('deposit') ?>" class="px-4 py-2 bg-indigo-600 text-white hover:bg-indigo-700 rounded-lg transition-colors">Nạp tiền</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 