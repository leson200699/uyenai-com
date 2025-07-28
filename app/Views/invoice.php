<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Dịch Vụ Định Kỳ & Hoá Đơn</h1>
    
    <div class="mb-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <p class="text-gray-600">Quản lý các dịch vụ định kỳ và xem lịch sử hoá đơn của bạn.</p>
        </div>
        <div class="bg-white py-2 px-4 rounded-lg border shadow-sm flex items-center gap-3">
            <div class="bg-indigo-100 p-2 rounded-full">
                <i data-lucide="wallet" class="w-5 h-5 text-indigo-600"></i>
            </div>
            <div>
                <p class="text-xs text-gray-500">Số dư khả dụng</p>
                <p class="font-bold text-indigo-600">1.250.000đ</p>
            </div>
            <a href="#" class="bg-indigo-600 text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-indigo-700 ml-2">Nạp tiền</a>
        </div>
    </div>

    <!-- Recurring Services -->
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Các dịch vụ đang hoạt động</h2>
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-gray-500 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Dịch vụ</th>
                            <th scope="col" class="px-6 py-3">Chu kỳ</th>
                            <th scope="col" class="px-6 py-3">Ngày gia hạn kế tiếp</th>
                            <th scope="col" class="px-6 py-3">Chi phí</th>
                            <th scope="col" class="px-6 py-3 text-right">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">Hosting Doanh Nghiệp - mycoolwebsite.com</td>
                            <td class="px-6 py-4">Hàng năm</td>
                            <td class="px-6 py-4">05/07/2026</td>
                            <td class="px-6 py-4 font-semibold">1.188.000đ</td>
                            <td class="px-6 py-4 text-right"><a href="#" class="font-medium text-indigo-600 hover:underline">Quản lý</a></td>
                        </tr>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">VPS 2 - vps-main-server</td>
                            <td class="px-6 py-4">Hàng tháng</td>
                            <td class="px-6 py-4 text-orange-600 font-semibold">25/07/2025</td>
                            <td class="px-6 py-4 font-semibold">280.000đ</td>
                            <td class="px-6 py-4 text-right"><a href="#" class="font-medium text-indigo-600 hover:underline">Quản lý</a></td>
                        </tr>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">Dịch vụ SEO Tổng Thể</td>
                            <td class="px-6 py-4">Hàng tháng</td>
                            <td class="px-6 py-4">11/08/2025</td>
                            <td class="px-6 py-4 font-semibold">15.000.000đ</td>
                            <td class="px-6 py-4 text-right"><a href="#" class="font-medium text-red-600 hover:underline">Hủy gia hạn</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Payment Summary -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-5 rounded-xl border shadow-sm">
            <div class="flex items-center gap-4 mb-1">
                <div class="bg-green-100 p-3 rounded-full">
                    <i data-lucide="credit-card" class="w-6 h-6 text-green-600"></i>
                </div>
                <h3 class="text-xl font-bold">16.468.000đ</h3>
            </div>
            <p class="text-gray-600">Tổng thanh toán trong năm</p>
        </div>
        
        <div class="bg-white p-5 rounded-xl border shadow-sm">
            <div class="flex items-center gap-4 mb-1">
                <div class="bg-blue-100 p-3 rounded-full">
                    <i data-lucide="calendar" class="w-6 h-6 text-blue-600"></i>
                </div>
                <h3 class="text-xl font-bold">15.000.000đ</h3>
            </div>
            <p class="text-gray-600">Thanh toán tháng tiếp theo</p>
        </div>
        
        <div class="bg-white p-5 rounded-xl border shadow-sm">
            <div class="flex items-center gap-4 mb-1">
                <div class="bg-orange-100 p-3 rounded-full">
                    <i data-lucide="alert-triangle" class="w-6 h-6 text-orange-600"></i>
                </div>
                <h3 class="text-xl font-bold">280.000đ</h3>
            </div>
            <p class="text-gray-600">Hoá đơn quá hạn</p>
        </div>
    </div>

    <!-- Invoices History -->
    <div class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Lịch sử hoá đơn</h2>
            <div class="flex items-center gap-2">
                <div class="relative">
                    <i data-lucide="calendar" class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"></i>
                    <input type="text" placeholder="Tháng/Năm" class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <button class="bg-indigo-100 text-indigo-600 font-medium px-4 py-2 rounded-lg hover:bg-indigo-200">Lọc</button>
            </div>
        </div>
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-gray-500 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Mã Hoá Đơn</th>
                            <th scope="col" class="px-6 py-3">Ngày phát hành</th>
                            <th scope="col" class="px-6 py-3">Nội dung</th>
                            <th scope="col" class="px-6 py-3">Số tiền</th>
                            <th scope="col" class="px-6 py-3">Trạng thái</th>
                            <th scope="col" class="px-6 py-3 text-right">Tải về</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">#HD2025-0711</td>
                            <td class="px-6 py-4">11/07/2025</td>
                            <td class="px-6 py-4">Gia hạn Dịch vụ SEO T.07/2025</td>
                            <td class="px-6 py-4 font-semibold">15.000.000đ</td>
                            <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">Đã thanh toán</span></td>
                            <td class="px-6 py-4 text-right"><a href="#" class="text-gray-500 hover:text-indigo-600"><i data-lucide="download" class="w-5 h-5"></i></a></td>
                        </tr>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">#HD2025-0705</td>
                            <td class="px-6 py-4">05/07/2025</td>
                            <td class="px-6 py-4">Đăng ký Hosting Doanh Nghiệp (1 năm)</td>
                            <td class="px-6 py-4 font-semibold">1.188.000đ</td>
                            <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">Đã thanh toán</span></td>
                            <td class="px-6 py-4 text-right"><a href="#" class="text-gray-500 hover:text-indigo-600"><i data-lucide="download" class="w-5 h-5"></i></a></td>
                        </tr>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">#HD2025-0625</td>
                            <td class="px-6 py-4">25/06/2025</td>
                            <td class="px-6 py-4">Gia hạn VPS 2 T.07/2025</td>
                            <td class="px-6 py-4 font-semibold">280.000đ</td>
                            <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full">Quá hạn</span></td>
                            <td class="px-6 py-4 text-right"><a href="#" class="text-gray-500 hover:text-indigo-600"><i data-lucide="download" class="w-5 h-5"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="p-4 border-t flex justify-between items-center">
                <span class="text-sm text-gray-600">Hiển thị 1-3 của 3 hoá đơn</span>
                <div class="flex gap-1">
                    <button class="px-3 py-1 text-sm border rounded-md hover:bg-gray-100 disabled:opacity-50" disabled>Trước</button>
                    <button class="px-3 py-1 text-sm border rounded-md hover:bg-gray-100 disabled:opacity-50" disabled>Sau</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 