<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Dịch Vụ TikTok Marketing</h1>
    
    <div class="text-center mb-8">
        <h2 class="text-2xl font-semibold text-gray-800">Bùng Nổ Thương Hiệu Trên TikTok</h2>
        <p class="text-gray-600 mt-2 max-w-2xl mx-auto">Giải pháp toàn diện từ xây dựng kênh, sản xuất video, quảng cáo đến booking KOL/KOC để chinh phục nền tảng video ngắn hàng đầu.</p>
    </div>
    
    <!-- Service Categories -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
        <!-- Channel Management -->
        <div class="bg-white border rounded-xl shadow-sm p-6 flex flex-col">
            <div class="flex justify-center mb-4">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center">
                    <i data-lucide="video" class="w-8 h-8 text-indigo-600"></i>
                </div>
            </div>
            <h3 class="text-xl font-bold text-center">Xây Dựng & Chăm Sóc Kênh</h3>
            <p class="text-sm text-center text-gray-500 flex-grow mt-2">Sản xuất nội dung video theo xu hướng, xây dựng kịch bản, tăng trưởng follow và tương tác cho kênh TikTok của bạn.</p>
            <p class="text-2xl font-bold text-center my-4">Từ 10.000.000đ/tháng</p>
            <button class="mt-4 w-full bg-indigo-600 text-white font-bold py-3 rounded-lg hover:bg-indigo-700">Đăng Ký Ngay</button>
        </div>

        <!-- TikTok Ads -->
        <div class="bg-white border rounded-xl shadow-sm p-6 flex flex-col">
            <div class="flex justify-center mb-4">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center">
                    <i data-lucide="megaphone" class="w-8 h-8 text-indigo-600"></i>
                </div>
            </div>
            <h3 class="text-xl font-bold text-center">Quảng Cáo TikTok Ads</h3>
            <p class="text-sm text-center text-gray-500 flex-grow mt-2">Thiết lập, quản lý và tối ưu các chiến dịch quảng cáo trên TikTok để tăng chuyển đổi, thu hút khách hàng tiềm năng.</p>
            <p class="text-2xl font-bold text-center my-4">Theo ngân sách</p>
            <button class="mt-4 w-full bg-indigo-600 text-white font-bold py-3 rounded-lg hover:bg-indigo-700">Yêu Cầu Tư Vấn</button>
        </div>

        <!-- KOL/KOC Booking -->
        <div class="bg-white border rounded-xl shadow-sm p-6 flex flex-col">
            <div class="flex justify-center mb-4">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center">
                    <i data-lucide="star" class="w-8 h-8 text-indigo-600"></i>
                </div>
            </div>
            <h3 class="text-xl font-bold text-center">Booking KOL/KOC</h3>
            <p class="text-sm text-center text-gray-500 flex-grow mt-2">Kết nối thương hiệu của bạn với những nhà sáng tạo nội dung phù hợp để quảng bá sản phẩm một cách tự nhiên và hiệu quả.</p>
            <p class="text-2xl font-bold text-center my-4">Báo giá theo Influencer</p>
            <button class="mt-4 w-full bg-indigo-600 text-white font-bold py-3 rounded-lg hover:bg-indigo-700">Liên Hệ Ngay</button>
        </div>
    </div>
    
    <!-- TikTok Packages Services -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-12">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-6">Gói Dịch Vụ TikTok Marketing</h2>
            <?php
            // Lấy danh sách dịch vụ TikTok từ ServiceModel nếu controller truyền vào
            $tiktokServices = $tiktokServices ?? [];
            ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php foreach ($tiktokServices as $service): ?>
                <div class="bg-indigo-50 border border-indigo-100 rounded-xl p-6 flex flex-col">
                    <div class="flex justify-center mb-4">
                        <img src="<?= esc($service['image']) ?>" class="w-16 h-16 rounded-full object-cover" alt="<?= esc($service['name']) ?>">
                    </div>
                    <h3 class="text-xl font-bold text-center text-indigo-800"><?= esc($service['name']) ?></h3>
                    <p class="text-sm text-center text-gray-600 flex-grow mt-2"><?= esc($service['description']) ?></p>
                    <p class="text-2xl font-bold text-center my-4 text-indigo-700"><?= number_format($service['price']) ?>đ/tháng</p>
                    <form action="<?= site_url('cart/add') ?>" method="post" class="mt-2">
                        <?= csrf_field() ?>
                        <input type="hidden" name="service_id" value="<?= $service['id'] ?>">
                        <input type="hidden" name="duration" value="1">
                        <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-3 rounded-lg hover:bg-indigo-700">Thêm vào giỏ hàng</button>
                    </form>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    
    <!-- Special Features -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-12">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-6">Tại sao chọn dịch vụ TikTok Marketing của chúng tôi?</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Creative Content -->
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-indigo-100 text-indigo-600">
                            <i data-lucide="sparkles" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Nội dung sáng tạo</h3>
                        <p class="mt-1 text-gray-600">Đội ngũ sáng tạo nội dung chuyên nghiệp luôn cập nhật xu hướng mới nhất trên TikTok.</p>
                    </div>
                </div>
                
                <!-- Trend Analysis -->
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-indigo-100 text-indigo-600">
                            <i data-lucide="trending-up" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Phân tích xu hướng</h3>
                        <p class="mt-1 text-gray-600">Nghiên cứu chuyên sâu về xu hướng, hashtag và âm thanh đang viral trên nền tảng.</p>
                    </div>
                </div>
                
                <!-- Professional Production -->
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-indigo-100 text-indigo-600">
                            <i data-lucide="video" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Sản xuất chuyên nghiệp</h3>
                        <p class="mt-1 text-gray-600">Trang thiết bị quay dựng hiện đại cùng đội ngũ sản xuất video chất lượng cao.</p>
                    </div>
                </div>
                
                <!-- KOL/KOC Network -->
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-indigo-100 text-indigo-600">
                            <i data-lucide="users" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Mạng lưới KOL/KOC</h3>
                        <p class="mt-1 text-gray-600">Hợp tác với mạng lưới KOL/KOC rộng khắp các ngành hàng với đa dạng phong cách.</p>
                    </div>
                </div>
                
                <!-- Ads Optimization -->
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-indigo-100 text-indigo-600">
                            <i data-lucide="target" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Tối ưu quảng cáo</h3>
                        <p class="mt-1 text-gray-600">Chiến lược quảng cáo TikTok hiệu quả với chi phí tối ưu và tỷ lệ chuyển đổi cao.</p>
                    </div>
                </div>
                
                <!-- Analytics & Reports -->
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-indigo-100 text-indigo-600">
                            <i data-lucide="bar-chart" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Phân tích & Báo cáo</h3>
                        <p class="mt-1 text-gray-600">Báo cáo chi tiết về hiệu suất chiến dịch, phân tích insight và đề xuất cải tiến.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- CTA Section -->
    <div class="bg-indigo-600 text-white rounded-xl p-8 mb-12">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-4">Sẵn sàng bùng nổ trên TikTok?</h2>
            <p class="text-lg mb-8">Liên hệ ngay với chúng tôi để nhận tư vấn miễn phí và bắt đầu chiến lược TikTok Marketing hiệu quả cho thương hiệu của bạn.</p>
            <div class="flex justify-center space-x-4">
                <button class="bg-white text-indigo-600 font-bold px-6 py-3 rounded-lg hover:bg-gray-100">Gọi ngay: 0987 654 321</button>
                <button class="bg-indigo-500 text-white font-bold px-6 py-3 rounded-lg hover:bg-indigo-400 border border-white">Đăng ký tư vấn</button>
            </div>
        </div>
    </div>
    
    <!-- FAQ Section -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-12">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-6">Câu hỏi thường gặp</h2>
            
            <div class="space-y-4">
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="flex justify-between items-center w-full px-6 py-4 text-left">
                        <span class="font-medium">TikTok có phù hợp với mọi loại hình doanh nghiệp không?</span>
                        <i data-lucide="plus" class="w-5 h-5"></i>
                    </button>
                    <div class="px-6 py-4 bg-gray-50 border-t">
                        <p>TikTok phù hợp với nhiều loại hình doanh nghiệp, đặc biệt là các thương hiệu muốn tiếp cận đối tượng khách hàng trẻ tuổi (Gen Z và Millennials). Tuy nhiên, mỗi ngành hàng sẽ cần chiến lược tiếp cận khác nhau. Chúng tôi sẽ tư vấn giải pháp phù hợp nhất cho doanh nghiệp của bạn.</p>
                    </div>
                </div>
                
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="flex justify-between items-center w-full px-6 py-4 text-left">
                        <span class="font-medium">Chi phí cho một chiến dịch TikTok Marketing là bao nhiêu?</span>
                        <i data-lucide="plus" class="w-5 h-5"></i>
                    </button>
                    <div class="px-6 py-4 bg-gray-50 border-t">
                        <p>Chi phí cho một chiến dịch TikTok Marketing phụ thuộc vào nhiều yếu tố như quy mô, thời gian, số lượng nội dung, ngân sách quảng cáo và có sử dụng KOL/KOC hay không. Chúng tôi cung cấp nhiều gói dịch vụ với mức giá linh hoạt phù hợp với ngân sách của doanh nghiệp.</p>
                    </div>
                </div>
                
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="flex justify-between items-center w-full px-6 py-4 text-left">
                        <span class="font-medium">Làm thế nào để đo lường hiệu quả của chiến dịch TikTok?</span>
                        <i data-lucide="plus" class="w-5 h-5"></i>
                    </button>
                    <div class="px-6 py-4 bg-gray-50 border-t">
                        <p>Chúng tôi sẽ thiết lập các KPI cụ thể như số lượt xem, tương tác, follow, lưu video, chuyển đổi, và các chỉ số khác phù hợp với mục tiêu của doanh nghiệp. Báo cáo hiệu suất sẽ được cung cấp định kỳ để đánh giá và điều chỉnh chiến lược kịp thời.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // FAQ Toggle
    document.querySelectorAll('.border-gray-200 button').forEach(button => {
        button.addEventListener('click', () => {
            const content = button.nextElementSibling;
            const icon = button.querySelector('[data-lucide]');
            
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                icon.setAttribute('data-lucide', 'plus');
                lucide.createIcons();
            } else {
                content.style.maxHeight = content.scrollHeight + 'px';
                icon.setAttribute('data-lucide', 'minus');
                lucide.createIcons();
            }
        });
    });
});
</script> 