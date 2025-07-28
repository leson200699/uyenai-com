<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Dịch Vụ Zalo ZNS</h1>
    
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="p-6 bg-white border border-gray-200 rounded-xl shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Số tin đã gửi (tháng này)</p>
                    <p class="text-3xl font-bold text-gray-900">15,280</p>
                </div>
                <div class="p-3 bg-blue-100 rounded-full">
                    <i data-lucide="send" class="w-6 h-6 text-blue-600"></i>
                </div>
            </div>
        </div>
        <div class="p-6 bg-white border border-gray-200 rounded-xl shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Tỷ lệ thành công</p>
                    <p class="text-3xl font-bold text-gray-900">99.8%</p>
                </div>
                <div class="p-3 bg-green-100 rounded-full">
                    <i data-lucide="check-check" class="w-6 h-6 text-green-600"></i>
                </div>
            </div>
        </div>
        <div class="p-6 bg-white border border-gray-200 rounded-xl shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Chi phí (tháng này)</p>
                    <p class="text-3xl font-bold text-gray-900">4.584.000đ</p>
                </div>
                <div class="p-3 bg-indigo-100 rounded-full">
                    <i data-lucide="dollar-sign" class="w-6 h-6 text-indigo-600"></i>
                </div>
            </div>
        </div>
        <div class="p-6 bg-white border border-gray-200 rounded-xl shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Số dư ZCA</p>
                    <p class="text-3xl font-bold text-gray-900">10.000.000đ</p>
                </div>
                <div class="p-3 bg-orange-100 rounded-full">
                    <i data-lucide="wallet" class="w-6 h-6 text-orange-600"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabs -->
    <div class="bg-white rounded-xl shadow-sm border p-6">
        <div class="border-b border-gray-200 mb-6">
            <nav class="flex -mb-px space-x-6" aria-label="Tabs">
                <button id="tab-send" class="py-3 px-1 border-b-2 text-sm font-medium tab-active">Gửi Chiến Dịch</button>
                <button id="tab-templates" class="py-3 px-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">Quản Lý Mẫu Tin</button>
                <button id="tab-history" class="py-3 px-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">Lịch Sử</button>
                <button id="tab-api" class="py-3 px-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">Tích Hợp API</button>
            </nav>
        </div>
        <!-- Tab Content: Send Campaign -->
        <div id="content-send">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="template-select" class="block text-sm font-medium text-gray-700 mb-1">1. Chọn mẫu tin đã được duyệt</label>
                    <select id="template-select" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option>Xác nhận đơn hàng #{{order_code}}</option>
                        <option>Thông báo giao hàng thành công</option>
                        <option>Gửi mã OTP: {{otp_code}}</option>
                    </select>
                    <div class="mt-4 p-4 bg-gray-50 rounded-lg border">
                        <p class="text-sm text-gray-600">Xem trước:</p>
                        <p class="mt-2">Cảm ơn bạn đã đặt hàng. Mã đơn hàng của bạn là <span class="font-bold text-indigo-600">#{{order_code}}</span>. Chúng tôi sẽ sớm liên hệ với bạn.</p>
                    </div>
                </div>
                <div>
                     <label for="phone-list" class="block text-sm font-medium text-gray-700 mb-1">2. Nhập danh sách SĐT và dữ liệu</label>
                     <textarea id="phone-list" rows="6" class="w-full font-mono text-xs border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Định dạng: sđt,order_code&#10;0987654321,DH1138&#10;0987654322,DH1139"></textarea>
                     <p class="text-xs text-gray-500 mt-1">Mỗi dòng là một người nhận. Các tham số cách nhau bởi dấu phẩy, theo đúng thứ tự trong mẫu tin.</p>
                </div>
            </div>
            <div class="mt-6 text-center">
                <button class="w-full sm:w-auto inline-flex justify-center py-3 px-8 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                    <i data-lucide="send" class="w-5 h-5 mr-2"></i>
                    Gửi Tin
                </button>
            </div>
        </div>
        <!-- Tab Content: Template Management (hidden by default) -->
        <div id="content-templates" class="hidden">
            <div class="flex justify-end mb-4">
                <button class="px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg shadow-sm hover:bg-indigo-700 flex items-center gap-2">
                    <i data-lucide="plus" class="w-4 h-4"></i>
                    <span>Tạo Mẫu Mới</span>
                </button>
            </div>
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-gray-500 uppercase bg-gray-50">
                    <tr>
                        <th class="px-6 py-3">Tên Mẫu</th>
                        <th class="px-6 py-3">Nội dung</th>
                        <th class="px-6 py-3">Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-6 py-4 font-medium">Xác nhận đơn hàng</td>
                        <td class="px-6 py-4 text-gray-600">Cảm ơn bạn đã đặt hàng. Mã đơn hàng của bạn là #{{order_code}}...</td>
                        <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">Đã duyệt</span></td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 font-medium">Thông báo khuyến mãi</td>
                        <td class="px-6 py-4 text-gray-600">Nhân dịp {{event}}, TechHub giảm giá 50% cho tất cả dịch vụ...</td>
                        <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full">Bị từ chối</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Other tabs content would go here -->
        <div id="content-history" class="hidden"><p>Lịch sử gửi tin sẽ được hiển thị ở đây.</p></div>
        <div id="content-api" class="hidden"><p>Thông tin tích hợp API sẽ được hiển thị ở đây.</p></div>
    </div>
</div>
<?= $this->endSection() ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tab switching logic
    const tabs = [
        { btn: document.getElementById('tab-send'), content: document.getElementById('content-send') },
        { btn: document.getElementById('tab-templates'), content: document.getElementById('content-templates') },
        { btn: document.getElementById('tab-history'), content: document.getElementById('content-history') },
        { btn: document.getElementById('tab-api'), content: document.getElementById('content-api') }
    ];

    tabs.forEach(tab => {
        tab.btn.addEventListener('click', () => {
            tabs.forEach(t => {
                t.btn.classList.remove('tab-active');
                t.content.classList.add('hidden');
            });
            tab.btn.classList.add('tab-active');
            tab.content.classList.remove('hidden');
        });
    });
});
</script> 