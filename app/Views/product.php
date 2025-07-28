<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div>
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Cửa hàng tài khoản AI</h1>
        <p class="text-gray-600 mt-1">Chọn và mua ngay các loại tài khoản AI mạnh mẽ nhất.</p>
    </div>

    <!-- Search & Filter Bar -->
    <div class="flex flex-col md:flex-row gap-4 mb-8">
        <div class="relative flex-grow">
            <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"></i>
            <input type="text" placeholder="Tìm kiếm sản phẩm..." class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>
        <div class="flex gap-2">
            <select class="px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="">Danh mục</option>
                <option value="ai">Tài khoản AI</option>
                <option value="social">Mạng xã hội</option>
                <option value="course">Khoá học</option>
                <option value="digital">Digital Marketing</option>
            </select>
            <select class="px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="">Sắp xếp theo</option>
                <option value="popular">Phổ biến nhất</option>
                <option value="newest">Mới nhất</option>
                <option value="price_asc">Giá thấp đến cao</option>
                <option value="price_desc">Giá cao đến thấp</option>
            </select>
        </div>
    </div>

    <!-- Featured Products Banner -->
    <div class="mb-8 bg-gradient-to-r from-indigo-500 to-indigo-700 rounded-2xl overflow-hidden shadow-lg">
        <div class="flex flex-col md:flex-row items-center">
            <div class="p-8 md:w-1/2">
                <span class="inline-block px-3 py-1 bg-white text-indigo-700 rounded-full text-sm font-medium">Nổi bật</span>
                <h2 class="mt-4 text-3xl font-bold text-white">Tài khoản ChatGPT-4o</h2>
                <p class="mt-2 text-indigo-100">Truy cập mô hình AI tiên tiến nhất với khả năng xử lý đa phương tiện, giọng nói và các tính năng mới nhất.</p>
                <div class="mt-4 flex items-center">
                    <span class="text-3xl font-bold text-white">599.000đ</span>
                    <span class="ml-2 text-indigo-200 line-through">799.000đ</span>
                </div>
                <button class="mt-6 px-6 py-3 bg-white text-indigo-700 rounded-lg font-semibold hover:bg-indigo-50 transition">Mua ngay</button>
            </div>
            <div class="md:w-1/2 p-4 flex justify-center">
                <img src="https://placehold.co/300x300/e0e7ff/4338ca?text=GPT-4o" class="max-w-full h-auto rounded-xl shadow-lg" alt="ChatGPT-4o">
            </div>
        </div>
    </div>

    <!-- Product Categories -->
    <div class="mb-10">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Danh mục sản phẩm</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="#" class="bg-white border border-gray-200 rounded-xl p-6 flex flex-col items-center text-center shadow-sm hover:shadow-md transition-all">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="sparkles" class="w-8 h-8 text-indigo-600"></i>
                </div>
                <h3 class="font-semibold">Tài khoản AI</h3>
                <p class="text-sm text-gray-500 mt-1">ChatGPT, Midjourney, Claude</p>
            </a>
            <a href="#" class="bg-white border border-gray-200 rounded-xl p-6 flex flex-col items-center text-center shadow-sm hover:shadow-md transition-all">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="facebook" class="w-8 h-8 text-blue-600"></i>
                </div>
                <h3 class="font-semibold">Tài khoản MXH</h3>
                <p class="text-sm text-gray-500 mt-1">Facebook, Instagram, TikTok</p>
            </a>
            <a href="#" class="bg-white border border-gray-200 rounded-xl p-6 flex flex-col items-center text-center shadow-sm hover:shadow-md transition-all">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="graduation-cap" class="w-8 h-8 text-green-600"></i>
                </div>
                <h3 class="font-semibold">Khoá học</h3>
                <p class="text-sm text-gray-500 mt-1">SEO, Marketing, Design</p>
            </a>
            <a href="#" class="bg-white border border-gray-200 rounded-xl p-6 flex flex-col items-center text-center shadow-sm hover:shadow-md transition-all">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="box" class="w-8 h-8 text-purple-600"></i>
                </div>
                <h3 class="font-semibold">Tất cả sản phẩm</h3>
                <p class="text-sm text-gray-500 mt-1">Xem tất cả danh mục</p>
            </a>
        </div>
    </div>

    <!-- Product Grid -->
    <div>
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-900">Tài khoản AI phổ biến</h2>
            <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center">
                Xem tất cả
                <i data-lucide="chevron-right" class="w-4 h-4 ml-1"></i>
            </a>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-12">
            <!-- Product Card 1 -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm flex flex-col">
                <div class="h-40 bg-gray-100 flex items-center justify-center rounded-t-xl">
                    <img src="https://placehold.co/120x120/111827/4f46e5?text=GPT" class="rounded-lg" alt="ChatGPT Icon">
                </div>
                <div class="p-4 flex flex-col flex-grow">
                    <h3 class="font-bold text-lg text-gray-900">Tài khoản ChatGPT Plus</h3>
                    <p class="text-sm text-gray-600 mt-1 flex-grow">Truy cập GPT-4, DALL-E 3, Advanced Data Analysis...</p>
                    <div class="mt-4">
                        <p class="text-sm text-gray-500">Giá bán</p>
                        <p class="text-2xl font-bold text-indigo-600">499.000đ</p>
                    </div>
                    <button class="mt-4 w-full px-4 py-2 font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition-all">
                        Mua Ngay
                    </button>
                </div>
            </div>
            <!-- Product Card 2 -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm flex flex-col">
                <div class="h-40 bg-gray-100 flex items-center justify-center rounded-t-xl">
                    <img src="https://placehold.co/120x120/111827/0ea5e9?text=GEMINI" class="rounded-lg" alt="Gemini Icon">
                </div>
                <div class="p-4 flex flex-col flex-grow">
                    <h3 class="font-bold text-lg text-gray-900">Tài khoản Gemini Advanced</h3>
                    <p class="text-sm text-gray-600 mt-1 flex-grow">Sức mạnh của mô hình Gemini 1.5 Pro, tích hợp trong Google Apps.</p>
                    <div class="mt-4">
                        <p class="text-sm text-gray-500">Giá bán</p>
                        <p class="text-2xl font-bold text-indigo-600">480.000đ</p>
                    </div>
                    <button class="mt-4 w-full px-4 py-2 font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition-all">
                        Mua Ngay
                    </button>
                </div>
            </div>
            <!-- Product Card 3 -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm flex flex-col">
                <div class="h-40 bg-gray-100 flex items-center justify-center rounded-t-xl">
                    <img src="https://placehold.co/120x120/111827/10b981?text=MID" class="rounded-lg" alt="Midjourney Icon">
                </div>
                <div class="p-4 flex flex-col flex-grow">
                    <h3 class="font-bold text-lg text-gray-900">Tài khoản Midjourney</h3>
                    <p class="text-sm text-gray-600 mt-1 flex-grow">Công cụ tạo ảnh bằng AI hàng đầu thế giới, sáng tạo không giới hạn.</p>
                    <div class="mt-4">
                        <p class="text-sm text-gray-500">Giá bán</p>
                        <p class="text-2xl font-bold text-indigo-600">250.000đ</p>
                    </div>
                    <button class="mt-4 w-full px-4 py-2 font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition-all">
                        Mua Ngay
                    </button>
                </div>
            </div>
             <!-- Product Card 4 -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm flex flex-col">
                <div class="h-40 bg-gray-100 flex items-center justify-center rounded-t-xl">
                    <img src="https://placehold.co/120x120/111827/ef4444?text=CANVA" class="rounded-lg" alt="Canva Icon">
                </div>
                <div class="p-4 flex flex-col flex-grow">
                    <h3 class="font-bold text-lg text-gray-900">Tài khoản Canva Pro</h3>
                    <p class="text-sm text-gray-600 mt-1 flex-grow">Thiết kế mọi thứ với bộ công cụ Pro và kho tài nguyên khổng lồ.</p>
                    <div class="mt-4">
                        <p class="text-sm text-gray-500">Giá bán</p>
                        <p class="text-2xl font-bold text-indigo-600">150.000đ</p>
                    </div>
                    <button class="mt-4 w-full px-4 py-2 font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition-all">
                        Mua Ngay
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Why Choose Us Section -->
    <div class="mb-12 bg-white rounded-2xl p-8 shadow-sm border border-gray-200">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Tại sao chọn chúng tôi?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="shield" class="w-8 h-8 text-indigo-600"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Bảo hành 100%</h3>
                <p class="text-gray-600">Cam kết hoàn tiền nếu tài khoản có vấn đề trong thời gian bảo hành.</p>
            </div>
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="zap" class="w-8 h-8 text-indigo-600"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Kích hoạt tức thì</h3>
                <p class="text-gray-600">Tài khoản được giao ngay sau khi thanh toán thành công.</p>
            </div>
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="message-circle" class="w-8 h-8 text-indigo-600"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Hỗ trợ 24/7</h3>
                <p class="text-gray-600">Đội ngũ kỹ thuật luôn sẵn sàng hỗ trợ bạn mọi lúc mọi nơi.</p>
            </div>
        </div>
    </div>
    
    <!-- FAQs Section -->
    <div class="mb-12">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Câu hỏi thường gặp</h2>
        <div class="space-y-4">
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button class="w-full flex items-center justify-between p-4 bg-white">
                    <span class="font-medium text-left">Làm thế nào để nhận tài khoản sau khi mua?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-gray-500"></i>
                </button>
                <div class="p-4 bg-gray-50 border-t border-gray-200">
                    <p class="text-gray-700">Sau khi thanh toán thành công, thông tin tài khoản sẽ được gửi ngay vào email đăng ký của bạn, đồng thời hiển thị trong mục "Kho của tôi" trên website.</p>
                </div>
            </div>
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button class="w-full flex items-center justify-between p-4 bg-white">
                    <span class="font-medium text-left">Tài khoản có thời hạn bao lâu?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-gray-500"></i>
                </button>
                <div class="p-4 bg-gray-50 border-t border-gray-200 hidden">
                    <p class="text-gray-700">Thời hạn tài khoản được hiển thị rõ ràng trong thông tin sản phẩm. Hầu hết tài khoản AI của chúng tôi có thời hạn 1 tháng và được gia hạn tự động.</p>
                </div>
            </div>
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button class="w-full flex items-center justify-between p-4 bg-white">
                    <span class="font-medium text-left">Chính sách bảo hành của cửa hàng là gì?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-gray-500"></i>
                </button>
                <div class="p-4 bg-gray-50 border-t border-gray-200 hidden">
                    <p class="text-gray-700">Chúng tôi cam kết bảo hành 100% trong suốt thời gian sử dụng. Nếu tài khoản gặp vấn đề, chúng tôi sẽ thay thế hoặc hoàn tiền ngay lập tức.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Accordion functionality for FAQs
        document.querySelectorAll('.border.border-gray-200.rounded-lg').forEach(item => {
            const button = item.querySelector('button');
            const content = item.querySelector('.p-4.bg-gray-50');
            const icon = item.querySelector('[data-lucide="chevron-down"]');
            
            button.addEventListener('click', () => {
                content.classList.toggle('hidden');
                if (!content.classList.contains('hidden')) {
                    icon.style.transform = 'rotate(180deg)';
                } else {
                    icon.style.transform = 'rotate(0)';
                }
            });
        });
    });
</script>
<?= $this->endSection() ?> 