<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Phần Mềm Quản Lý Doanh Nghiệp</h1>
    
    <div class="text-center mb-12">
        <h2 class="text-2xl font-semibold text-gray-800">Tối Ưu Vận Hành, Tăng Trưởng Bền Vững</h2>
        <p class="text-gray-600 mt-2 max-w-2xl mx-auto">Các giải pháp phần mềm quản lý toàn diện giúp bạn số hóa quy trình, quản lý tài chính, nhân sự và khách hàng tập trung trên một nền tảng duy nhất.</p>
    </div>

    <!-- Software Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
        <!-- Card 1: Perfex CRM -->
        <div class="bg-white border rounded-xl shadow-sm p-6 flex flex-col">
            <div class="flex-shrink-0 flex items-center gap-4 mb-4">
                <div class="w-16 h-16 rounded-lg flex items-center justify-center bg-blue-100 text-blue-600 text-2xl font-bold">P</div>
                <div>
                    <h3 class="text-2xl font-bold">Perfex CRM</h3>
                    <p class="text-sm text-gray-500">Giải pháp CRM & Quản lý dự án</p>
                </div>
            </div>
            <p class="text-sm text-gray-600 flex-grow">Một trong những hệ thống quản lý quan hệ khách hàng (CRM) và dự án mạnh mẽ nhất, phù hợp cho các agency, freelancer và doanh nghiệp vừa và nhỏ.</p>
            <div class="my-4 border-t pt-4">
                <p class="font-semibold mb-2">Tính năng chính:</p>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-green-500"></i>Quản lý khách hàng & Hợp đồng</li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-green-500"></i>Quản lý dự án & Công việc</li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-green-500"></i>Tạo hoá đơn & Báo giá</li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-green-500"></i>Hệ thống Ticket hỗ trợ</li>
                </ul>
            </div>
            <button class="mt-4 w-full bg-indigo-600 text-white font-bold py-3 rounded-lg hover:bg-indigo-700">Xem Chi Tiết & Mua</button>
        </div>

        <!-- Card 2: Worksuite -->
        <div class="bg-white border rounded-xl shadow-sm p-6 flex flex-col">
            <div class="flex-shrink-0 flex items-center gap-4 mb-4">
                <div class="w-16 h-16 rounded-lg flex items-center justify-center bg-yellow-100 text-yellow-600 text-2xl font-bold">W</div>
                <div>
                    <h3 class="text-2xl font-bold">Worksuite</h3>
                    <p class="text-sm text-gray-500">Bộ công cụ quản lý toàn diện</p>
                </div>
            </div>
            <p class="text-sm text-gray-600 flex-grow">Giải pháp "tất cả trong một" giúp quản lý mọi khía cạnh của doanh nghiệp: từ nhân sự, chấm công, đến tài chính và bán hàng.</p>
            <div class="my-4 border-t pt-4">
                <p class="font-semibold mb-2">Tính năng chính:</p>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-green-500"></i>Quản lý Nhân sự (HRM)</li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-green-500"></i>Chấm công & Bảng lương</li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-green-500"></i>Quản lý Thu-Chi</li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-green-500"></i>Tích hợp CRM & Bán hàng</li>
                </ul>
            </div>
            <button class="mt-4 w-full bg-indigo-600 text-white font-bold py-3 rounded-lg hover:bg-indigo-700">Xem Chi Tiết & Mua</button>
        </div>
        
        <!-- Card 3: Custom Solution -->
        <div class="bg-white border rounded-xl shadow-sm p-6 flex flex-col">
            <div class="flex-shrink-0 flex items-center gap-4 mb-4">
                <div class="w-16 h-16 rounded-lg flex items-center justify-center bg-purple-100 text-purple-600 text-2xl font-bold">C</div>
                <div>
                    <h3 class="text-2xl font-bold">Giải Pháp Tuỳ Chỉnh</h3>
                    <p class="text-sm text-gray-500">Phần mềm theo yêu cầu của bạn</p>
                </div>
            </div>
            <p class="text-sm text-gray-600 flex-grow">Nếu các giải pháp có sẵn chưa đáp ứng được quy trình đặc thù của bạn, chúng tôi sẽ phân tích và xây dựng một hệ thống phần mềm được "may đo" riêng cho doanh nghiệp.</p>
            <div class="my-4 border-t pt-4">
                <p class="font-semibold mb-2">Lợi ích:</p>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-green-500"></i>Bám sát 100% quy trình vận hành</li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-green-500"></i>Khả năng mở rộng không giới hạn</li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-green-500"></i>Bảo mật theo tiêu chuẩn riêng</li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-4 h-4 text-green-500"></i>Toàn quyền sở hữu mã nguồn</li>
                </ul>
            </div>
            <button class="mt-4 w-full bg-indigo-100 text-indigo-700 font-bold py-3 rounded-lg hover:bg-indigo-200">Liên Hệ Tư Vấn</button>
        </div>
    </div>
    
    <!-- Process Section -->
    <div class="bg-white rounded-lg shadow-md p-8 mb-12">
        <h2 class="text-2xl font-semibold mb-8 text-center">Quy Trình Triển Khai Phần Mềm</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="clipboard-list" class="w-8 h-8 text-indigo-600"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">1. Phân tích yêu cầu</h3>
                <p class="text-gray-600 text-sm">Chúng tôi tìm hiểu quy trình, thách thức và mục tiêu của doanh nghiệp bạn</p>
            </div>
            
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="settings" class="w-8 h-8 text-indigo-600"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">2. Cài đặt & Cấu hình</h3>
                <p class="text-gray-600 text-sm">Thiết lập và tùy biến phần mềm phù hợp với nhu cầu cụ thể của bạn</p>
            </div>
            
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="graduation-cap" class="w-8 h-8 text-indigo-600"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">3. Đào tạo nhân sự</h3>
                <p class="text-gray-600 text-sm">Hướng dẫn chi tiết giúp đội ngũ của bạn làm chủ hệ thống mới</p>
            </div>
            
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="headphones" class="w-8 h-8 text-indigo-600"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">4. Hỗ trợ liên tục</h3>
                <p class="text-gray-600 text-sm">Đồng hành cùng bạn sau triển khai với dịch vụ hỗ trợ 24/7</p>
            </div>
        </div>
    </div>
    
    <!-- Why Choose Us -->
    <div class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white rounded-lg p-8 mb-12">
        <h2 class="text-2xl font-bold mb-8 text-center">Tại Sao Chọn Chúng Tôi?</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white/10 backdrop-blur-sm p-6 rounded-lg">
                <div class="flex items-center mb-4">
                    <i data-lucide="award" class="w-8 h-8 mr-3"></i>
                    <h3 class="text-lg font-semibold">Chuyên Môn & Kinh Nghiệm</h3>
                </div>
                <p class="text-sm text-white/90">Đội ngũ chuyên gia với hơn 10 năm kinh nghiệm triển khai phần mềm cho mọi quy mô doanh nghiệp.</p>
            </div>
            
            <div class="bg-white/10 backdrop-blur-sm p-6 rounded-lg">
                <div class="flex items-center mb-4">
                    <i data-lucide="code" class="w-8 h-8 mr-3"></i>
                    <h3 class="text-lg font-semibold">Công Nghệ Hiện Đại</h3>
                </div>
                <p class="text-sm text-white/90">Luôn cập nhật công nghệ mới nhất, đảm bảo hệ thống của bạn được xây dựng trên nền tảng vững chắc và bảo mật.</p>
            </div>
            
            <div class="bg-white/10 backdrop-blur-sm p-6 rounded-lg">
                <div class="flex items-center mb-4">
                    <i data-lucide="heart-handshake" class="w-8 h-8 mr-3"></i>
                    <h3 class="text-lg font-semibold">Hỗ Trợ Tận Tâm</h3>
                </div>
                <p class="text-sm text-white/90">Cam kết đồng hành cùng bạn sau triển khai với chính sách hỗ trợ nhanh chóng và hiệu quả.</p>
            </div>
        </div>
    </div>
    
    <!-- FAQ Section -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-12">
        <div class="p-8">
            <h2 class="text-2xl font-semibold mb-8">Câu Hỏi Thường Gặp</h2>
            
            <div class="space-y-4">
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="flex justify-between items-center w-full px-6 py-4 text-left font-medium">
                        <span>Phần mềm có thể tùy chỉnh theo nhu cầu riêng không?</span>
                        <i data-lucide="plus" class="w-5 h-5 faq-icon"></i>
                    </button>
                    <div class="px-6 py-4 bg-gray-50 border-t faq-content hidden">
                        <p>Có, tất cả các giải pháp phần mềm của chúng tôi đều có khả năng tùy chỉnh cao. Chúng tôi hiểu rằng mỗi doanh nghiệp có quy trình và nhu cầu khác nhau, vì vậy chúng tôi cung cấp các tùy chọn cấu hình linh hoạt hoặc thậm chí phát triển các tính năng riêng biệt cho doanh nghiệp của bạn.</p>
                    </div>
                </div>
                
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="flex justify-between items-center w-full px-6 py-4 text-left font-medium">
                        <span>Chi phí và thời gian triển khai là bao nhiêu?</span>
                        <i data-lucide="plus" class="w-5 h-5 faq-icon"></i>
                    </button>
                    <div class="px-6 py-4 bg-gray-50 border-t faq-content hidden">
                        <p>Chi phí và thời gian triển khai phụ thuộc vào quy mô và phức tạp của dự án. Đối với các giải pháp có sẵn như Perfex CRM hoặc Worksuite, quá trình triển khai có thể từ 1-4 tuần với chi phí từ 5-30 triệu đồng. Đối với các giải pháp tùy chỉnh, chúng tôi sẽ cung cấp báo giá chi tiết sau khi phân tích yêu cầu của bạn.</p>
                    </div>
                </div>
                
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="flex justify-between items-center w-full px-6 py-4 text-left font-medium">
                        <span>Tôi có thể di chuyển dữ liệu từ hệ thống cũ sang không?</span>
                        <i data-lucide="plus" class="w-5 h-5 faq-icon"></i>
                    </button>
                    <div class="px-6 py-4 bg-gray-50 border-t faq-content hidden">
                        <p>Vâng, chúng tôi cung cấp dịch vụ di chuyển dữ liệu từ hệ thống cũ của bạn sang phần mềm mới. Đội ngũ chuyên gia của chúng tôi sẽ đánh giá cấu trúc dữ liệu hiện tại và xây dựng quy trình chuyển đổi an toàn, đảm bảo không mất mát thông tin quan trọng trong quá trình này.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- CTA Section -->
    <div class="bg-indigo-600 text-white rounded-xl p-8 mb-12">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-4">Sẵn sàng số hóa quy trình kinh doanh của bạn?</h2>
            <p class="text-lg mb-8">Liên hệ ngay hôm nay để nhận tư vấn miễn phí về giải pháp phần mềm phù hợp nhất cho doanh nghiệp của bạn.</p>
            <div class="flex flex-col md:flex-row justify-center gap-4">
                <button class="bg-white text-indigo-600 font-bold px-6 py-3 rounded-lg hover:bg-gray-100">Gọi ngay: 0987 654 321</button>
                <button class="bg-indigo-500 text-white font-bold px-6 py-3 rounded-lg hover:bg-indigo-400 border border-white">Yêu cầu tư vấn</button>
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