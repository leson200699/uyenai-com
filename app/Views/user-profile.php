<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-900">Thông Tin Cá Nhân</h1>
    <p class="text-gray-600 mt-1">Cập nhật thông tin tài khoản của bạn</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Profile Navigation -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-xl shadow-sm border p-6">
            <div class="flex flex-col items-center text-center mb-6">
                <img src="https://placehold.co/128x128/e0e7ff/4338ca?text=A" alt="Avatar" class="w-24 h-24 rounded-full mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Nguyễn Văn A</h3>
                <p class="text-gray-600 text-sm">Thành viên từ: 01/01/2023</p>
                <div class="mt-4 flex gap-2">
                    <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">Premium</span>
                    <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">Verified</span>
                </div>
            </div>
            
            <div class="space-y-1">
                <a href="#" class="flex items-center px-4 py-2 text-sm font-medium bg-indigo-50 text-indigo-700 rounded-lg">
                    <i data-lucide="user" class="w-5 h-5 mr-3"></i>
                    Thông tin cá nhân
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i data-lucide="wallet" class="w-5 h-5 mr-3"></i>
                    Thông tin thanh toán
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i data-lucide="bell" class="w-5 h-5 mr-3"></i>
                    Thông báo
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i data-lucide="shield" class="w-5 h-5 mr-3"></i>
                    Bảo mật
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i data-lucide="log-out" class="w-5 h-5 mr-3"></i>
                    Đăng xuất
                </a>
            </div>
            
            <div class="mt-8 bg-indigo-50 p-4 rounded-lg">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-indigo-800">Số dư tài khoản:</span>
                    <span class="font-bold text-indigo-700">1.250.000đ</span>
                </div>
                <button class="mt-2 w-full py-2 px-4 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition">
                    Nạp tiền
                </button>
            </div>
        </div>
    </div>
    
    <!-- Personal Info Form -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-xl shadow-sm border p-6 mb-8">
            <h2 class="text-xl font-bold text-gray-800 mb-6">Thông tin cá nhân</h2>
            <form class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="full-name" class="block text-sm font-medium text-gray-700 mb-1">Họ và tên</label>
                        <input type="text" id="full-name" value="Nguyễn Văn A" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <label for="display-name" class="block text-sm font-medium text-gray-700 mb-1">Tên hiển thị</label>
                        <input type="text" id="display-name" value="Văn A" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Địa chỉ Email</label>
                    <input type="email" id="email" value="nguyenvana@email.com" readonly class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-gray-100 cursor-not-allowed">
                    <p class="mt-1 text-xs text-gray-500">Email không thể thay đổi sau khi đăng ký</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Số điện thoại</label>
                        <input type="text" id="phone" value="0987654321" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <label for="dob" class="block text-sm font-medium text-gray-700 mb-1">Ngày sinh</label>
                        <input type="date" id="dob" value="1990-01-01" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                </div>
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Địa chỉ</label>
                    <input type="text" id="address" value="123 Đường ABC, Quận XYZ, TP. Hồ Chí Minh" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="text-right">
                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition">
                        Lưu thay đổi
                    </button>
                </div>
            </form>
        </div>
        
        <!-- Change Password Form -->
        <div class="bg-white rounded-xl shadow-sm border p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-6">Đổi mật khẩu</h2>
            <form class="space-y-6">
                <div>
                    <label for="current-password" class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu hiện tại</label>
                    <input type="password" id="current-password" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="new-password" class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu mới</label>
                        <input type="password" id="new-password" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <label for="confirm-password" class="block text-sm font-medium text-gray-700 mb-1">Xác nhận mật khẩu mới</label>
                        <input type="password" id="confirm-password" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                </div>
                <p class="text-sm text-gray-600">
                    Mật khẩu phải có ít nhất 8 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt.
                </p>
                <div class="text-right">
                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition">
                        Đổi mật khẩu
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 