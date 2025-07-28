<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Quản Lý Hosting & VPS</h1>

    <!-- Actions Section -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <p class="text-gray-600">Quản lý tất cả các hosting và máy chủ ảo (VPS) của bạn.</p>
        </div>
        <a href="#" class="px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg shadow-sm hover:bg-indigo-700 flex items-center gap-2">
            <i data-lucide="plus" class="w-4 h-4"></i>
            <span>Đăng ký mới</span>
        </a>
    </div>
    
    <!-- Stats Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-white p-4 rounded-xl border shadow-sm">
            <div class="flex items-center gap-3">
                <div class="bg-indigo-100 p-3 rounded-lg">
                    <i data-lucide="hard-drive" class="w-6 h-6 text-indigo-600"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Tổng dịch vụ</p>
                    <p class="text-xl font-bold">4</p>
                </div>
            </div>
        </div>
        <div class="bg-white p-4 rounded-xl border shadow-sm">
            <div class="flex items-center gap-3">
                <div class="bg-green-100 p-3 rounded-lg">
                    <i data-lucide="check-circle" class="w-6 h-6 text-green-600"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Đang hoạt động</p>
                    <p class="text-xl font-bold">1</p>
                </div>
            </div>
        </div>
        <div class="bg-white p-4 rounded-xl border shadow-sm">
            <div class="flex items-center gap-3">
                <div class="bg-orange-100 p-3 rounded-lg">
                    <i data-lucide="alert-circle" class="w-6 h-6 text-orange-600"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Sắp hết hạn</p>
                    <p class="text-xl font-bold">1</p>
                </div>
            </div>
        </div>
        <div class="bg-white p-4 rounded-xl border shadow-sm">
            <div class="flex items-center gap-3">
                <div class="bg-red-100 p-3 rounded-lg">
                    <i data-lucide="x-circle" class="w-6 h-6 text-red-600"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Đã hết hạn</p>
                    <p class="text-xl font-bold">1</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="mb-6 flex flex-col sm:flex-row gap-4">
        <div class="relative flex-grow">
            <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"></i>
            <input type="text" placeholder="Tìm theo tên miền hoặc nhãn VPS..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>
        <select class="border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
            <option>Tất cả trạng thái</option>
            <option>Đang hoạt động</option>
            <option>Sắp hết hạn</option>
            <option>Đã hết hạn</option>
            <option>Tạm ngưng</option>
        </select>
    </div>

    <!-- Services Table -->
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden mb-6">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-gray-500 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Tên Miền / Nhãn Dịch Vụ</th>
                        <th scope="col" class="px-6 py-3">Gói Dịch Vụ</th>
                        <th scope="col" class="px-6 py-3">Ngày Hết Hạn</th>
                        <th scope="col" class="px-6 py-3">Trạng thái</th>
                        <th scope="col" class="px-6 py-3 text-right">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">mycoolwebsite.com</td>
                        <td class="px-6 py-4">Hosting Doanh Nghiệp</td>
                        <td class="px-6 py-4">05/07/2026</td>
                        <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">Đang hoạt động</span></td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="#" class="font-medium text-indigo-600 hover:underline">Đăng nhập cPanel</a>
                            <a href="#" class="font-medium text-indigo-600 hover:underline">Quản lý</a>
                        </td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">vps-main-server</td>
                        <td class="px-6 py-4">VPS 2</td>
                        <td class="px-6 py-4 text-orange-600 font-semibold">25/07/2025</td>
                        <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-medium text-orange-800 bg-orange-100 rounded-full">Sắp hết hạn</span></td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="#" class="px-4 py-2 text-sm font-semibold text-white bg-orange-500 rounded-lg hover:bg-orange-600">Gia hạn</a>
                            <a href="#" class="font-medium text-indigo-600 hover:underline">Quản lý</a>
                        </td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">oldblog.net</td>
                        <td class="px-6 py-4">Hosting Cá Nhân</td>
                        <td class="px-6 py-4 text-red-600 font-semibold">01/06/2025</td>
                        <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full">Đã hết hạn</span></td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="#" class="px-4 py-2 text-sm font-semibold text-white bg-red-600 rounded-lg hover:bg-red-700">Gia hạn ngay</a>
                        </td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">test-server</td>
                        <td class="px-6 py-4">VPS 1</td>
                        <td class="px-6 py-4">15/09/2025</td>
                        <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-medium text-gray-800 bg-gray-200 rounded-full">Tạm ngưng</span></td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="#" class="font-medium text-indigo-600 hover:underline">Liên hệ hỗ trợ</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <div class="p-4 border-t flex justify-between items-center">
            <span class="text-sm text-gray-600">Hiển thị 1-4 của 4 dịch vụ</span>
            <div class="flex gap-1">
                <button class="px-3 py-1 text-sm border rounded-md hover:bg-gray-100 disabled:opacity-50" disabled>Trước</button>
                <button class="px-3 py-1 text-sm border rounded-md hover:bg-gray-100 disabled:opacity-50" disabled>Sau</button>
            </div>
        </div>
    </div>
    
    <!-- Quick Links -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-xl border shadow-sm">
            <div class="flex items-center gap-4 mb-4">
                <div class="bg-blue-100 p-3 rounded-lg">
                    <i data-lucide="help-circle" class="w-6 h-6 text-blue-600"></i>
                </div>
                <h3 class="text-lg font-semibold">Trung tâm hỗ trợ</h3>
            </div>
            <p class="text-gray-600 mb-4">Xem các hướng dẫn, câu hỏi thường gặp và liên hệ đội hỗ trợ kỹ thuật.</p>
            <a href="#" class="text-indigo-600 font-medium hover:underline">Xem hướng dẫn →</a>
        </div>
        
        <div class="bg-white p-6 rounded-xl border shadow-sm">
            <div class="flex items-center gap-4 mb-4">
                <div class="bg-green-100 p-3 rounded-lg">
                    <i data-lucide="arrow-up-circle" class="w-6 h-6 text-green-600"></i>
                </div>
                <h3 class="text-lg font-semibold">Nâng cấp dịch vụ</h3>
            </div>
            <p class="text-gray-600 mb-4">Nâng cấp gói dịch vụ hiện tại để có thêm tài nguyên và tính năng mới.</p>
            <a href="#" class="text-indigo-600 font-medium hover:underline">Khám phá các gói nâng cấp →</a>
        </div>
        
        <div class="bg-white p-6 rounded-xl border shadow-sm">
            <div class="flex items-center gap-4 mb-4">
                <div class="bg-purple-100 p-3 rounded-lg">
                    <i data-lucide="shield" class="w-6 h-6 text-purple-600"></i>
                </div>
                <h3 class="text-lg font-semibold">Dịch vụ bảo mật</h3>
            </div>
            <p class="text-gray-600 mb-4">Bảo vệ website với SSL, tường lửa ứng dụng web và quét malware định kỳ.</p>
            <a href="#" class="text-indigo-600 font-medium hover:underline">Bảo vệ dịch vụ của bạn →</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 