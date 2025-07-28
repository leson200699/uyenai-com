<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Lịch Sử Đơn Hàng</h1>
    
    <!-- Stats Section -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white p-4 rounded-xl border shadow-sm">
            <div class="flex items-center gap-3">
                <div class="bg-indigo-100 p-3 rounded-lg">
                    <i data-lucide="shopping-cart" class="w-6 h-6 text-indigo-600"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Tổng đơn hàng</p>
                    <p class="text-xl font-bold">25</p>
                </div>
            </div>
        </div>
        <div class="bg-white p-4 rounded-xl border shadow-sm">
            <div class="flex items-center gap-3">
                <div class="bg-green-100 p-3 rounded-lg">
                    <i data-lucide="check-circle" class="w-6 h-6 text-green-600"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Hoàn thành</p>
                    <p class="text-xl font-bold">21</p>
                </div>
            </div>
        </div>
        <div class="bg-white p-4 rounded-xl border shadow-sm">
            <div class="flex items-center gap-3">
                <div class="bg-blue-100 p-3 rounded-lg">
                    <i data-lucide="loader-circle" class="w-6 h-6 text-blue-600"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Đang xử lý</p>
                    <p class="text-xl font-bold">3</p>
                </div>
            </div>
        </div>
        <div class="bg-white p-4 rounded-xl border shadow-sm">
            <div class="flex items-center gap-3">
                <div class="bg-red-100 p-3 rounded-lg">
                    <i data-lucide="x-circle" class="w-6 h-6 text-red-600"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Đã hủy</p>
                    <p class="text-xl font-bold">1</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="mb-6 flex flex-col sm:flex-row gap-4">
        <div class="relative flex-grow">
            <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"></i>
            <input type="text" placeholder="Tìm theo mã đơn hàng hoặc tên sản phẩm..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>
        <div class="flex gap-2">
            <select class="border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                <option>Tất cả trạng thái</option>
                <option>Hoàn thành</option>
                <option>Đang xử lý</option>
                <option>Đã hủy</option>
            </select>
            <input type="date" class="border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
        </div>
    </div>

    <!-- Orders Table -->
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden mb-6">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-gray-500 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Mã Đơn Hàng</th>
                        <th scope="col" class="px-6 py-3">Ngày Tạo</th>
                        <th scope="col" class="px-6 py-3">Sản phẩm / Dịch vụ</th>
                        <th scope="col" class="px-6 py-3">Tổng Tiền</th>
                        <th scope="col" class="px-6 py-3">Trạng thái</th>
                        <th scope="col" class="px-6 py-3">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">#DH1138</td>
                        <td class="px-6 py-4">11/07/2025</td>
                        <td class="px-6 py-4">Dịch vụ SEO Tổng Thể</td>
                        <td class="px-6 py-4 font-semibold">15.000.000đ</td>
                        <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-medium text-blue-800 bg-blue-100 rounded-full">Đang xử lý</span></td>
                        <td class="px-6 py-4"><a href="#" class="font-medium text-indigo-600 hover:underline">Xem chi tiết</a></td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">#DH1137</td>
                        <td class="px-6 py-4">10/07/2025</td>
                        <td class="px-6 py-4">Tài khoản ChatGPT Plus</td>
                        <td class="px-6 py-4 font-semibold">499.000đ</td>
                        <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">Hoàn thành</span></td>
                        <td class="px-6 py-4"><a href="#" class="font-medium text-indigo-600 hover:underline">Xem chi tiết</a></td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">#DH1136</td>
                        <td class="px-6 py-4">08/07/2025</td>
                        <td class="px-6 py-4">Đăng ký tên miền "mycoolsite.com"</td>
                        <td class="px-6 py-4 font-semibold">250.000đ</td>
                        <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">Hoàn thành</span></td>
                        <td class="px-6 py-4"><a href="#" class="font-medium text-indigo-600 hover:underline">Xem chi tiết</a></td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">#DH1135</td>
                        <td class="px-6 py-4">05/07/2025</td>
                        <td class="px-6 py-4">Gói Hosting Doanh Nghiệp (1 năm)</td>
                        <td class="px-6 py-4 font-semibold">1.188.000đ</td>
                        <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">Hoàn thành</span></td>
                        <td class="px-6 py-4"><a href="#" class="font-medium text-indigo-600 hover:underline">Xem chi tiết</a></td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">#DH1134</td>
                        <td class="px-6 py-4">02/07/2025</td>
                        <td class="px-6 py-4">Khoá học "Ứng dụng AI vào Marketing"</td>
                        <td class="px-6 py-4 font-semibold">599.000đ</td>
                        <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full">Đã hủy</span></td>
                        <td class="px-6 py-4"><a href="#" class="font-medium text-indigo-600 hover:underline">Xem chi tiết</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <div class="p-4 border-t flex justify-between items-center">
            <span class="text-sm text-gray-600">Hiển thị 1-5 của 25 đơn hàng</span>
            <div class="flex gap-1">
                <button class="px-3 py-1 text-sm border rounded-md hover:bg-gray-100 disabled:opacity-50" disabled>Trước</button>
                <button class="px-3 py-1 text-sm border rounded-md hover:bg-gray-100">Sau</button>
            </div>
        </div>
    </div>
    
    <!-- Order Summary Section -->
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 mb-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Tổng Kết Đơn Hàng</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <h3 class="font-medium text-gray-700 mb-2">Loại Dịch Vụ Đã Mua</h3>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="flex justify-between mb-2">
                        <span class="text-sm text-gray-600">Tên miền</span>
                        <span class="text-sm font-semibold">4</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-sm text-gray-600">Hosting</span>
                        <span class="text-sm font-semibold">5</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-sm text-gray-600">Khoá học</span>
                        <span class="text-sm font-semibold">8</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-sm text-gray-600">Dịch vụ SEO</span>
                        <span class="text-sm font-semibold">3</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Tài khoản AI</span>
                        <span class="text-sm font-semibold">5</span>
                    </div>
                </div>
            </div>
            <div>
                <h3 class="font-medium text-gray-700 mb-2">Tổng Chi Tiêu</h3>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="flex justify-between mb-2">
                        <span class="text-sm text-gray-600">Tháng này</span>
                        <span class="text-sm font-semibold text-indigo-600">15.499.000đ</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-sm text-gray-600">Tháng trước</span>
                        <span class="text-sm font-semibold">12.450.000đ</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-sm text-gray-600">3 tháng gần đây</span>
                        <span class="text-sm font-semibold">35.720.000đ</span>
                    </div>
                    <div class="flex justify-between pt-2 border-t">
                        <span class="text-sm font-medium text-gray-700">Tổng cộng</span>
                        <span class="text-sm font-bold text-indigo-600">65.250.000đ</span>
                    </div>
                </div>
            </div>
            <div>
                <h3 class="font-medium text-gray-700 mb-2">Trạng Thái Đơn Hàng</h3>
                <div class="bg-gray-50 p-4 rounded-lg h-[calc(100%-30px)] flex items-center justify-center">
                    <div class="w-32 h-32">
                        <div class="relative w-full h-full">
                            <!-- Replace with actual chart if needed -->
                            <div class="bg-green-500 w-3/4 h-3/4 rounded-full absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"></div>
                            <div class="bg-gray-50 w-1/2 h-1/2 rounded-full absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex items-center justify-center">
                                <span class="font-bold text-gray-800">84%</span>
                            </div>
                            <div class="absolute bottom-0 right-0 bg-blue-500 w-7 h-7 rounded-full"></div>
                            <div class="absolute top-0 right-5 bg-red-500 w-5 h-5 rounded-full"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 