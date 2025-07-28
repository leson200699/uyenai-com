<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Dịch Vụ Phát Triển Mobile App</h1>
    
    <!-- Hero Section -->
    <div class="bg-white rounded-xl p-8 md:p-12 border shadow-sm flex flex-col md:flex-row items-center gap-8 mb-12">
        <div class="md:w-1/2">
            <span class="text-sm font-bold text-indigo-600">GIẢI PHÁP TOÀN DIỆN</span>
            <h2 class="text-2xl font-bold text-gray-900 mt-2">Biến Ý Tưởng Thành Ứng Dụng Di Động</h2>
            <p class="mt-4 text-lg text-gray-600">Chúng tôi cung cấp dịch vụ phát triển ứng dụng di động trọn gói trên cả hai nền tảng iOS và Android, từ khâu tư vấn, thiết kế UI/UX đến lập trình và phát hành lên các kho ứng dụng.</p>
            <a href="#contact" class="mt-8 inline-block bg-indigo-600 text-white font-bold px-8 py-3 rounded-lg shadow-lg hover:bg-indigo-700 transition-colors">
                Liên Hệ Tư Vấn
            </a>
        </div>
        <div class="md:w-1/2">
            <div class="bg-indigo-100 rounded-lg p-12 flex items-center justify-center">
                <i data-lucide="smartphone" class="w-24 h-24 text-indigo-600"></i>
            </div>
        </div>
    </div>

    <!-- Platforms Section -->
    <div class="my-16 text-center">
        <h3 class="text-2xl font-semibold text-center mb-10">Phát triển trên các nền tảng hàng đầu</h3>
        <div class="flex justify-center items-center gap-12 flex-wrap">
            <div class="flex flex-col items-center gap-3">
                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center">
                    <i data-lucide="apple" class="w-10 h-10"></i>
                </div>
                <p class="font-semibold">Apple iOS</p>
            </div>
            <div class="flex flex-col items-center gap-3">
                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center">
                    <i data-lucide="smartphone" class="w-10 h-10 text-green-600"></i>
                </div>
                <p class="font-semibold">Google Android</p>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="my-16">
        <h3 class="text-2xl font-semibold text-center mb-10">Các Dịch Vụ Mobile App Chúng Tôi Cung Cấp</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-sm border">
                <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="store" class="w-6 h-6 text-indigo-600"></i>
                </div>
                <h4 class="text-lg font-semibold mb-2">Ứng Dụng Thương Mại Điện Tử</h4>
                <p class="text-gray-600">Xây dựng các ứng dụng mua sắm trực tuyến với đầy đủ tính năng như giỏ hàng, thanh toán, quản lý đơn hàng và tích hợp các cổng thanh toán.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-sm border">
                <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="message-square" class="w-6 h-6 text-indigo-600"></i>
                </div>
                <h4 class="text-lg font-semibold mb-2">Ứng Dụng Mạng Xã Hội</h4>
                <p class="text-gray-600">Phát triển các nền tảng kết nối, chia sẻ với tính năng chat realtime, newsfeed, profile và thông báo push.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-sm border">
                <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="briefcase" class="w-6 h-6 text-indigo-600"></i>
                </div>
                <h4 class="text-lg font-semibold mb-2">Ứng Dụng Doanh Nghiệp</h4>
                <p class="text-gray-600">Tạo các ứng dụng nội bộ giúp doanh nghiệp quản lý nhân sự, khách hàng, dự án và tăng cường hiệu quả làm việc.</p>
            </div>
        </div>
    </div>

    <!-- Process Section -->
    <div class="my-16">
        <h3 class="text-2xl font-semibold text-center mb-10">Quy Trình Phát Triển Minh Bạch</h3>
        <div class="max-w-4xl mx-auto">
            <div class="space-y-8">
                <!-- Step 1 -->
                <div class="flex relative">
                    <div class="absolute left-5 top-10 bottom-0 border-l-2 border-gray-200 h-full"></div>
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-600 text-white flex items-center justify-center font-bold z-10">1</div>
                    <div class="ml-6">
                        <h4 class="font-bold text-lg">Tư Vấn & Phân Tích</h4>
                        <p class="text-gray-600">Lắng nghe ý tưởng, phân tích yêu cầu và tư vấn giải pháp công nghệ, tính năng phù hợp nhất.</p>
                    </div>
                </div>
                <!-- Step 2 -->
                <div class="flex relative">
                    <div class="absolute left-5 top-10 bottom-0 border-l-2 border-gray-200 h-full"></div>
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-600 text-white flex items-center justify-center font-bold z-10">2</div>
                    <div class="ml-6">
                        <h4 class="font-bold text-lg">Thiết Kế UI/UX</h4>
                        <p class="text-gray-600">Xây dựng wireframe, prototype và thiết kế giao diện người dùng (UI) tối ưu, thân thiện và đẹp mắt.</p>
                    </div>
                </div>
                 <!-- Step 3 -->
                <div class="flex relative">
                    <div class="absolute left-5 top-10 bottom-0 border-l-2 border-gray-200 h-full"></div>
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-600 text-white flex items-center justify-center font-bold z-10">3</div>
                    <div class="ml-6">
                        <h4 class="font-bold text-lg">Lập Trình & Phát Triển</h4>
                        <p class="text-gray-600">Đội ngũ lập trình viên tiến hành phát triển ứng dụng (Front-end, Back-end, API) theo thiết kế.</p>
                    </div>
                </div>
                 <!-- Step 4 -->
                <div class="flex relative">
                    <div class="absolute left-5 top-10 bottom-0 border-l-2 border-gray-200 h-full"></div>
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-600 text-white flex items-center justify-center font-bold z-10">4</div>
                    <div class="ml-6">
                        <h4 class="font-bold text-lg">Kiểm Thử (Testing)</h4>
                        <p class="text-gray-600">Kiểm tra và đảm bảo mọi tính năng hoạt động ổn định, không có lỗi trước khi ra mắt.</p>
                    </div>
                </div>
                <!-- Step 5 -->
                <div class="flex relative">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-600 text-white flex items-center justify-center font-bold z-10">5</div>
                    <div class="ml-6">
                        <h4 class="font-bold text-lg">Phát Hành & Bảo Trì</h4>
                        <p class="text-gray-600">Hỗ trợ đưa ứng dụng lên Apple App Store và Google Play Store, đồng thời cung cấp các gói bảo trì, nâng cấp sau dự án.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white rounded-xl p-8 mb-12">
        <h3 class="text-2xl font-semibold text-center mb-8">Tại Sao Chọn Dịch Vụ Của Chúng Tôi?</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white/10 backdrop-blur-sm p-6 rounded-lg">
                <div class="flex items-center mb-4">
                    <i data-lucide="code" class="w-8 h-8 mr-3"></i>
                    <h4 class="text-lg font-semibold">Đội Ngũ Chuyên Nghiệp</h4>
                </div>
                <p class="text-sm text-white/90">Lập trình viên giàu kinh nghiệm với hơn 50+ ứng dụng đã phát hành trên cả iOS và Android.</p>
            </div>
            
            <div class="bg-white/10 backdrop-blur-sm p-6 rounded-lg">
                <div class="flex items-center mb-4">
                    <i data-lucide="timer" class="w-8 h-8 mr-3"></i>
                    <h4 class="text-lg font-semibold">Tiến Độ Cam Kết</h4>
                </div>
                <p class="text-sm text-white/90">Luôn đảm bảo thời gian hoàn thành dự án đúng như cam kết với khách hàng.</p>
            </div>
            
            <div class="bg-white/10 backdrop-blur-sm p-6 rounded-lg">
                <div class="flex items-center mb-4">
                    <i data-lucide="award" class="w-8 h-8 mr-3"></i>
                    <h4 class="text-lg font-semibold">Chất Lượng Đỉnh Cao</h4>
                </div>
                <p class="text-sm text-white/90">Mã nguồn sạch, tối ưu hiệu năng và trải nghiệm người dùng luôn được đặt lên hàng đầu.</p>
            </div>
        </div>
    </div>
    
    <!-- Technologies Section -->
    <div class="my-16">
        <h3 class="text-2xl font-semibold text-center mb-10">Công Nghệ Chúng Tôi Sử Dụng</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div class="bg-white p-4 rounded-xl shadow-sm border flex flex-col items-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                    <span class="text-xl font-bold text-blue-600">RN</span>
                </div>
                <p class="font-semibold">React Native</p>
            </div>
            
            <div class="bg-white p-4 rounded-xl shadow-sm border flex flex-col items-center">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mb-4">
                    <span class="text-xl font-bold text-purple-600">F</span>
                </div>
                <p class="font-semibold">Flutter</p>
            </div>
            
            <div class="bg-white p-4 rounded-xl shadow-sm border flex flex-col items-center">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mb-4">
                    <span class="text-xl font-bold text-orange-600">SW</span>
                </div>
                <p class="font-semibold">Swift</p>
            </div>
            
            <div class="bg-white p-4 rounded-xl shadow-sm border flex flex-col items-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4">
                    <span class="text-xl font-bold text-green-600">K</span>
                </div>
                <p class="font-semibold">Kotlin</p>
            </div>
        </div>
    </div>
    
    <!-- FAQ Section -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-12">
        <div class="p-6">
            <h3 class="text-2xl font-semibold mb-6">Câu Hỏi Thường Gặp</h3>
            
            <div class="space-y-4">
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="flex justify-between items-center w-full px-6 py-4 text-left font-medium">
                        <span>Chi phí phát triển một ứng dụng di động là bao nhiêu?</span>
                        <i data-lucide="plus" class="w-5 h-5 faq-icon"></i>
                    </button>
                    <div class="px-6 py-4 bg-gray-50 border-t faq-content hidden">
                        <p>Chi phí phát triển một ứng dụng di động phụ thuộc vào nhiều yếu tố như độ phức tạp, số lượng tính năng, nền tảng (iOS/Android/cả hai), và yêu cầu thiết kế. Các ứng dụng đơn giản có thể bắt đầu từ 30-50 triệu đồng, trong khi các ứng dụng phức tạp hơn với nhiều tính năng có thể từ 100-500 triệu đồng hoặc cao hơn. Chúng tôi luôn cung cấp báo giá chi tiết sau khi phân tích yêu cầu cụ thể của dự án.</p>
                    </div>
                </div>
                
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="flex justify-between items-center w-full px-6 py-4 text-left font-medium">
                        <span>Mất bao lâu để phát triển một ứng dụng di động?</span>
                        <i data-lucide="plus" class="w-5 h-5 faq-icon"></i>
                    </button>
                    <div class="px-6 py-4 bg-gray-50 border-t faq-content hidden">
                        <p>Thời gian phát triển một ứng dụng di động thường dao động từ 2-6 tháng tùy thuộc vào quy mô và độ phức tạp. Ứng dụng đơn giản với các tính năng cơ bản có thể hoàn thành trong 2-3 tháng, trong khi ứng dụng phức tạp với tích hợp nhiều hệ thống bên thứ ba và xử lý dữ liệu phức tạp có thể mất 4-6 tháng hoặc lâu hơn.</p>
                    </div>
                </div>
                
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="flex justify-between items-center w-full px-6 py-4 text-left font-medium">
                        <span>Tôi có sở hữu mã nguồn của ứng dụng sau khi phát triển không?</span>
                        <i data-lucide="plus" class="w-5 h-5 faq-icon"></i>
                    </button>
                    <div class="px-6 py-4 bg-gray-50 border-t faq-content hidden">
                        <p>Có, bạn hoàn toàn sở hữu mã nguồn và tất cả các tài nguyên liên quan đến ứng dụng sau khi dự án hoàn thành và thanh toán đầy đủ. Chúng tôi đảm bảo bàn giao đầy đủ mã nguồn, tài liệu kỹ thuật và hướng dẫn sử dụng để bạn có thể tự do quản lý, bảo trì hoặc phát triển tiếp ứng dụng trong tương lai.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- CTA Section -->
    <div id="contact" class="bg-indigo-600 text-white rounded-xl p-8 mb-12">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-4">Sẵn sàng biến ý tưởng của bạn thành hiện thực?</h2>
            <p class="text-lg mb-8">Liên hệ ngay hôm nay để nhận tư vấn miễn phí về dự án ứng dụng di động của bạn.</p>
            <div class="flex flex-col md:flex-row justify-center gap-4">
                <button class="bg-white text-indigo-600 font-bold px-6 py-3 rounded-lg hover:bg-gray-100">Gọi ngay: 0987 654 321</button>
                <button class="bg-indigo-500 text-white font-bold px-6 py-3 rounded-lg hover:bg-indigo-400 border border-white">Yêu cầu báo giá</button>
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
            
            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                icon.setAttribute('data-lucide', 'minus');
                lucide.createIcons();
            } else {
                content.classList.add('hidden');
                icon.setAttribute('data-lucide', 'plus');
                lucide.createIcons();
            }
        });
    });
});
</script> 