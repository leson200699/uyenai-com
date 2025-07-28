<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= $title ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
        <div class="p-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Dịch vụ Phát triển Zalo Mini App</h1>
            <p class="text-lg text-gray-600">
                Chuyển đổi ý tưởng của bạn thành một Zalo Mini App mạnh mẽ. Tiếp cận hàng triệu người dùng Zalo và thúc đẩy doanh nghiệp của bạn với các giải pháp được thiết kế riêng.
            </p>
        </div>
    </div>
    
    <!-- Gói Phát triển -->
    <div class="mb-12">
        <h2 class="text-3xl font-bold text-center mb-8">Các Gói Phát Triển Mini App</h2>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch">
            <?php foreach ($services as $index => $service): ?>
            <?php 
                $features = json_decode($service['features'], true);
                $isPopular = $index === 1; // Gói thứ 2 là phổ biến nhất
            ?>
            <div class="bg-white rounded-xl shadow-lg flex flex-col transition-transform transform hover:scale-105 <?= $isPopular ? 'border-4 border-indigo-500' : 'border' ?>">
                <?php if($isPopular): ?>
                    <div class="bg-indigo-500 text-white text-sm font-bold text-center py-2 rounded-t-lg">GÓI PHỔ BIẾN</div>
                <?php endif; ?>
                <div class="p-8 flex-grow">
                    <h3 class="text-2xl font-bold text-center mb-2"><?= esc($service['name']) ?></h3>
                    <p class="text-gray-500 text-center mb-6 h-16"><?= esc($service['description']) ?></p>
                    <div class="text-center mb-8">
                        <span class="text-4xl font-extrabold"><?= number_format($service['price'], 0, ',', '.') ?>đ</span>
                        <span class="text-gray-500">/ trọn gói</span>
                    </div>
                    <ul class="space-y-4">
                        <?php if (is_array($features)): ?>
                            <?php foreach ($features as $feature): ?>
                                <li class="flex items-start">
                                    <i data-lucide="check-circle" class="w-6 h-6 text-green-500 mr-3 flex-shrink-0 mt-1"></i>
                                    <span><?= esc($feature) ?></span>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="p-8 bg-gray-50 rounded-b-lg">
                    <form action="<?= site_url('cart/add') ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="service_id" value="<?= esc($service['id']) ?>">
                        <button type="submit" class="w-full py-3 bg-indigo-600 text-white font-bold rounded-lg hover:bg-indigo-700 transition-colors text-lg">
                            Chọn Gói Này
                        </button>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <!-- Dịch vụ Quản lý & Bảo trì -->
    <div class="mb-12">
        <h2 class="text-3xl font-bold text-center mb-8">Dịch Vụ Bổ Sung</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php foreach ($managementServices as $service): ?>
            <?php $features = json_decode($service['features'], true); ?>
            <div class="bg-white rounded-xl shadow-lg p-8">
                <h3 class="text-2xl font-bold mb-4"><?= esc($service['name']) ?></h3>
                <p class="text-gray-600 mb-6"><?= esc($service['description']) ?></p>
                <div class="mb-6">
                    <span class="text-3xl font-bold"><?= number_format($service['price'], 0, ',', '.') ?>đ</span>
                    <span class="text-gray-500">/ tháng</span>
                </div>
                <ul class="space-y-3 mb-8">
                    <?php if (is_array($features)): ?>
                        <?php foreach ($features as $feature): ?>
                            <li class="flex items-start">
                                <i data-lucide="check" class="w-5 h-5 text-green-500 mr-2 mt-1"></i>
                                <span><?= esc($feature) ?></span>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
                <form action="<?= site_url('cart/add') ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="service_id" value="<?= esc($service['id']) ?>">
                    <button type="submit" class="w-full py-3 bg-gray-700 text-white font-bold rounded-lg hover:bg-gray-800 transition-colors">
                        Đăng Ký
                    </button>
                </form>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <!-- Why Choose Us -->
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900">Tại Sao Chọn Chúng Tôi?</h2>
                <p class="mt-4 text-lg text-gray-600">Chúng tôi không chỉ xây dựng Mini App, chúng tôi kiến tạo giải pháp kinh doanh hiệu quả.</p>
            </div>
            <div class="mt-12 grid gap-10 md:grid-cols-2 lg:grid-cols-3">
                <div class="text-center">
                    <div class="flex items-center justify-center h-16 w-16 rounded-full bg-indigo-500 text-white mx-auto">
                        <i data-lucide="award" class="w-8 h-8"></i>
                    </div>
                    <h3 class="mt-6 text-xl font-bold">Kinh Nghiệm & Chuyên Môn</h3>
                    <p class="mt-2 text-base text-gray-600">Đội ngũ lập trình viên dày dặn kinh nghiệm, am hiểu sâu sắc nền tảng Zalo và các xu hướng công nghệ mới nhất.</p>
                </div>
                <div class="text-center">
                    <div class="flex items-center justify-center h-16 w-16 rounded-full bg-indigo-500 text-white mx-auto">
                        <i data-lucide="dollar-sign" class="w-8 h-8"></i>
                    </div>
                    <h3 class="mt-6 text-xl font-bold">Chi Phí Tối Ưu</h3>
                    <p class="mt-2 text-base text-gray-600">Cung cấp các gói dịch vụ linh hoạt, phù hợp với mọi ngân sách nhưng vẫn đảm bảo chất lượng và hiệu quả vượt trội.</p>
                </div>
                <div class="text-center">
                    <div class="flex items-center justify-center h-16 w-16 rounded-full bg-indigo-500 text-white mx-auto">
                        <i data-lucide="clock" class="w-8 h-8"></i>
                    </div>
                    <h3 class="mt-6 text-xl font-bold">Hỗ Trợ Tận Tâm 24/7</h3>
                    <p class="mt-2 text-base text-gray-600">Luôn sẵn sàng đồng hành, hỗ trợ kỹ thuật và tư vấn chiến lược để Mini App của bạn vận hành trơn tru và phát triển bền vững.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Successful Projects Carousel -->
    <div class="py-16">
        <h2 class="text-3xl font-bold text-center mb-10">Các Dự Án Thành Công</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="rounded-lg overflow-hidden shadow-lg">
                <img src="https://via.placeholder.com/400x300/A78BFA/FFFFFF?text=Project+1" alt="Dự án 1" class="w-full h-60 object-cover">
                <div class="p-6 bg-white">
                    <h3 class="font-bold text-xl mb-2">Mini App Thời Trang</h3>
                    <p class="text-gray-700 text-base">Tăng 200% đơn hàng online trong 3 tháng.</p>
                </div>
            </div>
            <div class="rounded-lg overflow-hidden shadow-lg">
                <img src="https://via.placeholder.com/400x300/FBBF24/FFFFFF?text=Project+2" alt="Dự án 2" class="w-full h-60 object-cover">
                <div class="p-6 bg-white">
                    <h3 class="font-bold text-xl mb-2">Mini App Đặt Bàn F&B</h3>
                    <p class="text-gray-700 text-base">Tự động hóa 80% quy trình đặt bàn.</p>
                </div>
            </div>
            <div class="rounded-lg overflow-hidden shadow-lg">
                 <img src="https://via.placeholder.com/400x300/34D399/FFFFFF?text=Project+3" alt="Dự án 3" class="w-full h-60 object-cover">
                <div class="p-6 bg-white">
                    <h3 class="font-bold text-xl mb-2">Mini App Đặt Lịch Spa</h3>
                    <p class="text-gray-700 text-base">Giảm 50% cuộc gọi đặt lịch, tăng trải nghiệm khách hàng.</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Partners -->
    <div class="bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold text-center text-gray-700 mb-8">Đối Tác Tin Cậy</h2>
            <div class="flex flex-wrap justify-center items-center gap-x-12 gap-y-8">
                <img class="h-10" src="https://via.placeholder.com/150x50/CBD5E1/475569?text=Partner+1" alt="Partner 1">
                <img class="h-10" src="https://via.placeholder.com/150x50/CBD5E1/475569?text=Partner+2" alt="Partner 2">
                <img class="h-10" src="https://via.placeholder.com/150x50/CBD5E1/475569?text=Partner+3" alt="Partner 3">
                <img class="h-10" src="https://via.placeholder.com/150x50/CBD5E1/475569?text=Partner+4" alt="Partner 4">
                <img class="h-10" src="https://via.placeholder.com/150x50/CBD5E1/475569?text=Partner+5" alt="Partner 5">
            </div>
        </div>
    </div>

    <!-- FAQ -->
    <div class="my-16">
        <h2 class="text-3xl font-bold text-center mb-10">Câu Hỏi Thường Gặp</h2>
        <div class="max-w-3xl mx-auto space-y-4">
            <div class="border border-gray-200 rounded-lg">
                <button class="faq-button w-full flex justify-between items-center p-5 font-semibold">
                    <span>Chi phí để phát triển Zalo Mini App là bao nhiêu?</span>
                    <i data-lucide="chevron-down" class="w-6 h-6 transform transition-transform"></i>
                </button>
                <div class="faq-content hidden p-5 border-t">
                    <p class="text-gray-600">Chi phí phụ thuộc vào độ phức tạp của Mini App. Chúng tôi có các gói dịch vụ từ cơ bản đến doanh nghiệp, bắt đầu từ 15.000.000 VNĐ. Hãy liên hệ để được tư vấn và báo giá chi tiết nhất.</p>
                </div>
            </div>
            <div class="border border-gray-200 rounded-lg">
                <button class="faq-button w-full flex justify-between items-center p-5 font-semibold">
                    <span>Thời gian hoàn thành một Mini App là bao lâu?</span>
                    <i data-lucide="chevron-down" class="w-6 h-6 transform transition-transform"></i>
                </button>
                <div class="faq-content hidden p-5 border-t">
                    <p class="text-gray-600">Thời gian phát triển có thể từ 2 tuần cho các dự án đơn giản đến vài tháng cho các ứng dụng phức tạp có tích hợp hệ thống. Chúng tôi sẽ cung cấp lộ trình chi tiết khi bắt đầu dự án.</p>
                </div>
            </div>
             <div class="border border-gray-200 rounded-lg">
                <button class="faq-button w-full flex justify-between items-center p-5 font-semibold">
                    <span>Tôi có cần tài khoản Zalo Official Account (OA) không?</span>
                    <i data-lucide="chevron-down" class="w-6 h-6 transform transition-transform"></i>
                </button>
                <div class="faq-content hidden p-5 border-t">
                    <p class="text-gray-600">Có, Zalo Mini App cần được liên kết với một Zalo OA đã được xác thực. Nếu bạn chưa có, chúng tôi sẽ hỗ trợ bạn trong quá trình tạo và xác thực OA.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const faqButtons = document.querySelectorAll('.faq-button');
    faqButtons.forEach(button => {
        button.addEventListener('click', () => {
            const content = button.nextElementSibling;
            const icon = button.querySelector('i');
            content.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');

            // Re-render icons after state change
            if (lucide) {
                lucide.createIcons();
            }
        });
    });
});
</script>

<?= $this->endSection() ?> 