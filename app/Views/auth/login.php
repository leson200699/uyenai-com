<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Đăng Nhập<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex justify-center">
    <div class="w-full max-w-md">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 md:p-8">
            <h1 class="text-2xl font-bold text-gray-900 mb-6 text-center">Đăng Nhập</h1>
            
            <form action="<?= site_url('login') ?>" method="POST">
                <?= csrf_field() ?>
                
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" id="email" value="<?= old('email') ?>" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu</label>
                    <input type="password" name="password" id="password" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">Ghi nhớ đăng nhập</label>
                    </div>
                    
                    <div class="text-sm">
                        <a href="#" class="text-indigo-600 hover:text-indigo-800">Quên mật khẩu?</a>
                    </div>
                </div>
                
                <button type="submit" class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors">
                    Đăng Nhập
                </button>
                
                <div class="text-center mt-6">
                    <p class="text-sm text-gray-600">
                        Chưa có tài khoản? <a href="<?= site_url('register') ?>" class="text-indigo-600 hover:text-indigo-800 font-medium">Đăng ký ngay</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 