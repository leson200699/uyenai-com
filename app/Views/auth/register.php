<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Đăng Ký<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex justify-center">
    <div class="w-full max-w-md">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 md:p-8">
            <h1 class="text-2xl font-bold text-gray-900 mb-6 text-center">Đăng Ký Tài Khoản</h1>
            
            <form action="<?= site_url('register') ?>" method="POST">
                <?= csrf_field() ?>
                
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Họ và tên</label>
                    <input type="text" name="name" id="name" value="<?= old('name') ?>" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" id="email" value="<?= old('email') ?>" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu</label>
                    <input type="password" name="password" id="password" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <p class="text-xs text-gray-500 mt-1">Mật khẩu phải có ít nhất 8 ký tự</p>
                </div>
                
                <div class="mb-6">
                    <label for="password_confirm" class="block text-sm font-medium text-gray-700 mb-1">Xác nhận mật khẩu</label>
                    <input type="password" name="password_confirm" id="password_confirm" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                
                <div class="mb-6">
                    <div class="flex items-center">
                        <input type="checkbox" name="terms" id="terms" required class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                        <label for="terms" class="ml-2 block text-sm text-gray-700">
                            Tôi đồng ý với <a href="<?= site_url('terms') ?>" class="text-indigo-600 hover:text-indigo-800">Điều khoản sử dụng</a> và <a href="<?= site_url('privacy') ?>" class="text-indigo-600 hover:text-indigo-800">Chính sách bảo mật</a>
                        </label>
                    </div>
                </div>
                
                <button type="submit" class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors">
                    Đăng Ký
                </button>
                
                <div class="text-center mt-6">
                    <p class="text-sm text-gray-600">
                        Đã có tài khoản? <a href="<?= site_url('login') ?>" class="text-indigo-600 hover:text-indigo-800 font-medium">Đăng nhập</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 