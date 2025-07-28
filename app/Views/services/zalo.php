<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php
    // Find specific services for the top cards to maintain the layout
    $oa_service = null;
    $ads_service = null;
    $chatbot_service = null;

    foreach($mainServices as $s) {
        if($s['id'] === 'zalo-oa-verify') $oa_service = $s;
        if($s['id'] === 'zalo-chatbot-basic') $chatbot_service = $s;
    }
    foreach($adsServices as $s) {
        if($s['id'] === 'zalo-ads-basic') $ads_service = $s;
    }
?>
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Dịch Vụ Zalo Marketing</h1>
    
    <div class="text-center mb-8">
        <h2 class="text-2xl font-semibold text-gray-800">Khai Thác Tối Đa Tiềm Năng Zalo</h2>
        <p class="text-gray-600 mt-2 max-w-2xl mx-auto">Tiếp cận hơn 70 triệu người dùng Việt Nam, chăm sóc khách hàng và tăng trưởng doanh thu hiệu quả qua nền tảng Zalo.</p>
    </div>
    
    <!-- Service Categories -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
        <!-- Card 1: OA Verification -->
        <?php if ($oa_service): ?>
        <div class="bg-white border rounded-xl shadow-sm p-6 flex flex-col">
            <div class="flex justify-center mb-4">
                <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center">
                    <i data-lucide="badge-check" class="w-8 h-8 text-yellow-500"></i>
                </div>
            </div>
            <h3 class="text-xl font-bold text-center"><?= $oa_service['name'] ?></h3>
            <p class="text-sm text-center text-gray-500 flex-grow mt-2"><?= $oa_service['description'] ?></p>
            <p class="text-2xl font-bold text-center my-4"><?= number_format($oa_service['price'], 0, ',', '.') ?>đ</p>
            <form action="<?= site_url('cart/add') ?>" method="post" class="mt-auto">
                <?= csrf_field() ?>
                <input type="hidden" name="service_id" value="<?= $oa_service['id'] ?>">
                <button type="submit" class="w-full bg-purple-600 text-white font-bold py-3 rounded-lg hover:bg-purple-700">Thêm vào giỏ</button>
            </form>
        </div>
        <?php endif; ?>

        <!-- Card 2: ZNS Service (Contact) -->
        <div class="bg-white border rounded-xl shadow-sm p-6 flex flex-col">
            <div class="flex justify-center mb-4">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center">
                    <i data-lucide="message-square-text" class="w-8 h-8 text-blue-600"></i>
                </div>
            </div>
            <h3 class="text-xl font-bold text-center">Gửi tin nhắn ZNS</h3>
            <p class="text-sm text-center text-gray-500 flex-grow mt-2">Gửi thông báo giao dịch, mã OTP, chăm sóc khách hàng tự động đến số điện thoại qua Zalo với tỉ lệ nhận tin 100%.</p>
            <p class="text-2xl font-bold text-center my-4">Liên hệ báo giá</p>
            <a href="<?= site_url('contact') ?>" class="mt-auto w-full block text-center bg-gray-500 text-white font-bold py-3 rounded-lg hover:bg-gray-600">Liên Hệ</a>
        </div>

        <!-- Card 3: Zalo Ads -->
        <?php if ($ads_service): ?>
        <div class="bg-white border rounded-xl shadow-sm p-6 flex flex-col">
            <div class="flex justify-center mb-4">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                    <i data-lucide="megaphone" class="w-8 h-8 text-green-600"></i>
                </div>
            </div>
            <h3 class="text-xl font-bold text-center"><?= $ads_service['name'] ?></h3>
            <p class="text-sm text-center text-gray-500 flex-grow mt-2"><?= $ads_service['description'] ?></p>
            <p class="text-2xl font-bold text-center my-4"><?= number_format($ads_service['price'], 0, ',', '.') ?>đ/tháng</p>
            <form action="<?= site_url('cart/add') ?>" method="post" class="mt-auto">
                <?= csrf_field() ?>
                <input type="hidden" name="service_id" value="<?= $ads_service['id'] ?>">
                <button type="submit" class="w-full bg-purple-600 text-white font-bold py-3 rounded-lg hover:bg-purple-700">Thêm vào giỏ</button>
            </form>
        </div>
        <?php endif; ?>

        <!-- Card 4: Chatbot -->
        <?php if ($chatbot_service): ?>
        <div class="bg-white border rounded-xl shadow-sm p-6 flex flex-col">
            <div class="flex justify-center mb-4">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center">
                    <i data-lucide="bot" class="w-8 h-8 text-purple-600"></i>
                </div>
            </div>
            <h3 class="text-xl font-bold text-center"><?= $chatbot_service['name'] ?></h3>
            <p class="text-sm text-center text-gray-500 flex-grow mt-2"><?= $chatbot_service['description'] ?></p>
            <p class="text-2xl font-bold text-center my-4"><?= number_format($chatbot_service['price'], 0, ',', '.') ?>đ</p>
            <form action="<?= site_url('cart/add') ?>" method="post" class="mt-auto">
                <?= csrf_field() ?>
                <input type="hidden" name="service_id" value="<?= $chatbot_service['id'] ?>">
                <button type="submit" class="w-full bg-purple-600 text-white font-bold py-3 rounded-lg hover:bg-purple-700">Thêm vào giỏ</button>
            </form>
        </div>
        <?php endif; ?>
    </div>
    
    <!-- ZNS Service Details -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-12">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-6">Dịch vụ tin nhắn Zalo (ZNS) cho doanh nghiệp</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="flex flex-col items-center p-4 bg-blue-50 rounded-lg">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="check-circle" class="w-8 h-8 text-blue-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Tỷ lệ đọc cao</h3>
                    <p class="text-center text-gray-600">Tỷ lệ đọc tin nhắn qua Zalo đạt 80-95%, cao hơn hẳn so với SMS hoặc Email thông thường.</p>
                </div>
                
                <div class="flex flex-col items-center p-4 bg-blue-50 rounded-lg">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="shield" class="w-8 h-8 text-blue-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Chính thức từ Zalo</h3>
                    <p class="text-center text-gray-600">ZNS là kênh liên lạc được Zalo công nhận và ủy quyền chính thức cho doanh nghiệp.</p>
                </div>
                
                <div class="flex flex-col items-center p-4 bg-blue-50 rounded-lg">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="bar-chart" class="w-8 h-8 text-blue-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Đo lường hiệu quả</h3>
                    <p class="text-center text-gray-600">Theo dõi chi tiết tỷ lệ gửi, tỷ lệ đọc và tương tác từ người nhận thông qua báo cáo trực quan.</p>
                </div>
            </div>
            
            <div class="overflow-x-auto mt-8">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Loại tin nhắn ZNS</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thông báo giao dịch</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">OTP / Xác thực</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Marketing</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap font-medium">Giá mỗi tin</td>
                            <td class="px-6 py-4 whitespace-nowrap">200đ - 300đ</td>
                            <td class="px-6 py-4 whitespace-nowrap">200đ - 300đ</td>
                            <td class="px-6 py-4 whitespace-nowrap">500đ - 800đ</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap font-medium">Phí khởi tạo</td>
                            <td class="px-6 py-4 whitespace-nowrap">2.000.000đ</td>
                            <td class="px-6 py-4 whitespace-nowrap">2.000.000đ</td>
                            <td class="px-6 py-4 whitespace-nowrap">3.000.000đ</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap font-medium">Đối tượng nhận</td>
                            <td class="px-6 py-4">Khách hàng đã xác nhận mua hàng hoặc sử dụng dịch vụ</td>
                            <td class="px-6 py-4">Người dùng đang thực hiện giao dịch cần xác thực</td>
                            <td class="px-6 py-4">Khách hàng đã đồng ý nhận thông tin từ doanh nghiệp</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Zalo OA Management -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-12">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-6">Quản lý Zalo Official Account (OA)</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-purple-100 text-purple-600">
                            <i data-lucide="users" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Xây dựng cộng đồng</h3>
                        <p class="mt-1 text-gray-600">Phát triển cộng đồng người theo dõi chất lượng trên Zalo OA của doanh nghiệp, tăng lượng tương tác.</p>
                    </div>
                </div>
                
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-purple-100 text-purple-600">
                            <i data-lucide="message-square" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Quản lý tin nhắn</h3>
                        <p class="mt-1 text-gray-600">Phản hồi và tương tác với khách hàng nhanh chóng, chuyên nghiệp thông qua tin nhắn Zalo.</p>
                    </div>
                </div>
                
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-purple-100 text-purple-600">
                            <i data-lucide="file-text" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Nội dung chất lượng</h3>
                        <p class="mt-1 text-gray-600">Xây dựng nội dung đa dạng, hấp dẫn và đúng chuẩn SEO cho bài đăng Zalo OA.</p>
                    </div>
                </div>
                
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-purple-100 text-purple-600">
                            <i data-lucide="bell" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Chiến dịch Broadcast</h3>
                        <p class="mt-1 text-gray-600">Thiết kế và triển khai chiến dịch gửi thông báo hàng loạt đến người theo dõi để quảng bá sản phẩm, dịch vụ.</p>
                    </div>
                </div>
            </div>
            
            <div class="mt-8 bg-purple-50 rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4 text-center">Bảng giá quản lý Zalo OA</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php foreach($managementServices as $index => $service): ?>
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-purple-100 flex flex-col <?= $index === 1 ? 'transform scale-105' : '' ?>">
                         <?php if($index === 1): ?>
                        <div class="absolute -top-3 right-4 bg-purple-600 text-white text-xs font-bold px-2 py-1 rounded">PHỔ BIẾN</div>
                        <?php endif; ?>
                        <h4 class="text-lg font-bold text-center mb-2"><?= $service['name'] ?></h4>
                        <p class="text-purple-600 font-bold text-center text-2xl mb-4"><?= number_format($service['price'], 0, ',', '.') ?>đ/tháng</p>
                        <ul class="space-y-2 flex-grow">
                            <?php $features = json_decode($service['features'], true); ?>
                            <?php if(is_array($features)): foreach($features as $feature): ?>
                            <li class="flex items-start">
                                <i data-lucide="check" class="w-5 h-5 text-green-500 mr-2 flex-shrink-0 mt-0.5"></i>
                                <span><?= esc($feature) ?></span>
                            </li>
                            <?php endforeach; endif; ?>
                        </ul>
                        <form action="<?= site_url('cart/add') ?>" method="post" class="mt-4">
                            <?= csrf_field() ?>
                            <input type="hidden" name="service_id" value="<?= $service['id'] ?>">
                            <button type="submit" class="w-full bg-purple-600 text-white font-bold py-3 rounded-lg hover:bg-purple-700">Thêm vào giỏ</button>
                        </form>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Request Form has been removed -->
    
    <!-- FAQ -->
    <div class="mb-12">
        <h2 class="text-2xl font-semibold mb-6">Câu hỏi thường gặp</h2>
        
        <div class="space-y-4">
            <div class="border rounded-lg overflow-hidden">
                <button class="flex justify-between items-center w-full p-4 text-left font-semibold hover:bg-gray-50 focus:outline-none faq-button">
                    <span>Zalo OA và Zalo cá nhân khác nhau như thế nào?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5"></i>
                </button>
                <div class="p-4 bg-gray-50 border-t hidden faq-content">
                    <p>Zalo OA (Official Account) là tài khoản dành riêng cho doanh nghiệp với nhiều tính năng nâng cao như gửi thông báo hàng loạt, tạo menu, tích hợp chatbot và các công cụ phân tích dữ liệu. Zalo cá nhân chỉ phục vụ mục đích liên lạc giữa cá nhân với cá nhân và bị giới hạn số lượng kết bạn. Doanh nghiệp nên sử dụng Zalo OA để xây dựng hình ảnh chuyên nghiệp và tiếp cận khách hàng hiệu quả hơn.</p>
                </div>
            </div>
            
            <div class="border rounded-lg overflow-hidden">
                <button class="flex justify-between items-center w-full p-4 text-left font-semibold hover:bg-gray-50 focus:outline-none faq-button">
                    <span>Chi phí để chạy quảng cáo Zalo Ads là bao nhiêu?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5"></i>
                </button>
                <div class="p-4 bg-gray-50 border-t hidden faq-content">
                    <p>Chi phí quảng cáo Zalo Ads phụ thuộc vào nhiều yếu tố như mục tiêu chiến dịch, đối tượng nhắm mục tiêu và cạnh tranh trong lĩnh vực của bạn. Ngân sách tối thiểu cho một chiến dịch Zalo Ads thường bắt đầu từ 1 triệu đồng, với chi phí CPC (Cost-Per-Click) trung bình từ 1.500đ đến 5.000đ. Để tối ưu hiệu quả, chúng tôi khuyến nghị ngân sách từ 5-10 triệu đồng/tháng cho doanh nghiệp vừa và nhỏ.</p>
                </div>
            </div>
            
            <div class="border rounded-lg overflow-hidden">
                <button class="flex justify-between items-center w-full p-4 text-left font-semibold hover:bg-gray-50 focus:outline-none faq-button">
                    <span>Làm thế nào để được xác thực tick vàng cho Zalo OA?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5"></i>
                </button>
                <div class="p-4 bg-gray-50 border-t hidden faq-content">
                    <p>Để được xác thực tick vàng, Zalo OA của bạn cần đáp ứng các điều kiện như: (1) Đã đăng ký gói Zalo OA trả phí, (2) Cung cấp đầy đủ giấy tờ chứng minh doanh nghiệp hợp lệ, (3) Có lượng người theo dõi và tương tác đủ lớn, (4) Đảm bảo hoạt động thường xuyên và tuân thủ chính sách của Zalo. Dịch vụ của chúng tôi sẽ hỗ trợ bạn chuẩn bị hồ sơ và tối ưu hóa tài khoản để đạt được tiêu chuẩn xác thực nhanh nhất.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // FAQ accordion functionality
    const faqButtons = document.querySelectorAll('.faq-button');
    
    faqButtons.forEach(button => {
        button.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const icon = this.querySelector('i');
            const isVisible = !content.classList.contains('hidden');
            
            content.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        });
    });
});
</script>
<?= $this->endSection() ?> 