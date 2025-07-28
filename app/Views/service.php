<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div>
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Đặt Hàng Dịch Vụ</h1>
        <p class="text-gray-600 mt-1">Phát triển doanh nghiệp của bạn với các dịch vụ chuyên nghiệp của chúng tôi.</p>
    </div>
    
    <!-- Service Categories Filter -->
    <div class="flex flex-wrap gap-3 mb-8">
        <button class="px-5 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-full">
            Tất cả dịch vụ
        </button>
        <button class="px-5 py-2 text-sm font-medium text-gray-600 bg-white border rounded-full hover:bg-gray-50">
            SEO
        </button>
        <button class="px-5 py-2 text-sm font-medium text-gray-600 bg-white border rounded-full hover:bg-gray-50">
            Thiết kế Website
        </button>
        <button class="px-5 py-2 text-sm font-medium text-gray-600 bg-white border rounded-full hover:bg-gray-50">
            Quảng cáo
        </button>
        <button class="px-5 py-2 text-sm font-medium text-gray-600 bg-white border rounded-full hover:bg-gray-50">
            Phát triển phần mềm
        </button>
        <button class="px-5 py-2 text-sm font-medium text-gray-600 bg-white border rounded-full hover:bg-gray-50">
            Hosting & VPS
        </button>
    </div>

    <!-- Services Grid -->
    <div class="space-y-8">
        <!-- Service Card 1: SEO -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden flex flex-col lg:flex-row">
            <div class="lg:w-1/3 bg-indigo-50 flex items-center justify-center p-8">
                <i data-lucide="trending-up" class="w-24 h-24 text-indigo-500"></i>
            </div>
            <div class="p-8 lg:w-2/3">
                <h3 class="text-2xl font-bold text-gray-900">Dịch Vụ SEO Tổng Thể</h3>
                <p class="mt-2 text-gray-600">Tối ưu hóa toàn diện website của bạn để chiếm lĩnh vị trí cao trên các công cụ tìm kiếm, thu hút lượng truy cập tự nhiên chất lượng và gia tăng doanh thu bền vững.</p>
                <ul class="mt-4 space-y-2 text-sm text-gray-700">
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-5 h-5 text-green-500"></i>Nghiên cứu và tối ưu bộ từ khóa.</li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-5 h-5 text-green-500"></i>Tối ưu On-page, Off-page và Technical SEO.</li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-5 h-5 text-green-500"></i>Xây dựng liên kết chất lượng.</li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-5 h-5 text-green-500"></i>Báo cáo định kỳ minh bạch, chi tiết.</li>
                </ul>
                <div class="mt-6 flex flex-col sm:flex-row gap-3">
                    <button class="px-6 py-3 font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition-all">
                        Yêu Cầu Báo Giá
                    </button>
                    <a href="<?= site_url('services/seo') ?>" class="px-6 py-3 font-medium text-indigo-600 bg-indigo-50 border border-indigo-200 rounded-lg hover:bg-indigo-100 transition-all text-center">
                        Chi Tiết Dịch Vụ
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Service Card 2: Web Design -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden flex flex-col lg:flex-row">
            <div class="lg:w-1/3 bg-blue-50 flex items-center justify-center p-8">
                <i data-lucide="layout-template" class="w-24 h-24 text-blue-500"></i>
            </div>
            <div class="p-8 lg:w-2/3">
                <h3 class="text-2xl font-bold text-gray-900">Thiết Kế Website Chuyên Nghiệp</h3>
                <p class="mt-2 text-gray-600">Sở hữu một website với giao diện hiện đại, độc đáo, chuẩn UI/UX và được tối ưu hóa cho tỷ lệ chuyển đổi. Chúng tôi xây dựng website trên các nền tảng mạnh mẽ, dễ dàng quản trị.</p>
                <ul class="mt-4 space-y-2 text-sm text-gray-700">
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-5 h-5 text-green-500"></i>Thiết kế theo yêu cầu, chuẩn nhận diện thương hiệu.</li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-5 h-5 text-green-500"></i>Tương thích hoàn hảo trên mọi thiết bị (Responsive).</li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-5 h-5 text-green-500"></i>Tối ưu tốc độ tải trang và bảo mật.</li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-5 h-5 text-green-500"></i>Bàn giao toàn bộ mã nguồn và hướng dẫn quản trị.</li>
                </ul>
                <div class="mt-6 flex flex-col sm:flex-row gap-3">
                    <button class="px-6 py-3 font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-all">
                        Liên Hệ Tư Vấn
                    </button>
                    <a href="<?= site_url('services/web') ?>" class="px-6 py-3 font-medium text-blue-600 bg-blue-50 border border-blue-200 rounded-lg hover:bg-blue-100 transition-all text-center">
                        Chi Tiết Dịch Vụ
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Service Card 3: Advertising -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden flex flex-col lg:flex-row">
            <div class="lg:w-1/3 bg-orange-50 flex items-center justify-center p-8">
                <i data-lucide="megaphone" class="w-24 h-24 text-orange-500"></i>
            </div>
            <div class="p-8 lg:w-2/3">
                <h3 class="text-2xl font-bold text-gray-900">Dịch Vụ Quảng Cáo Online</h3>
                <p class="mt-2 text-gray-600">Triển khai chiến dịch quảng cáo hiệu quả trên các nền tảng Google, Facebook, TikTok và nhiều kênh khác. Tiếp cận đúng khách hàng mục tiêu, tối ưu ngân sách và tối đa hóa ROI.</p>
                <ul class="mt-4 space-y-2 text-sm text-gray-700">
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-5 h-5 text-green-500"></i>Nghiên cứu đối tượng và thiết kế chiến dịch tùy chỉnh.</li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-5 h-5 text-green-500"></i>Thiết kế nội dung quảng cáo hấp dẫn.</li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-5 h-5 text-green-500"></i>Tối ưu chi phí mỗi lần click (CPC) và tỷ lệ chuyển đổi.</li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-5 h-5 text-green-500"></i>Phân tích dữ liệu và điều chỉnh liên tục để tăng hiệu quả.</li>
                </ul>
                <div class="mt-6 flex flex-col sm:flex-row gap-3">
                    <button class="px-6 py-3 font-semibold text-white bg-orange-600 rounded-lg hover:bg-orange-700 transition-all">
                        Đặt Dịch Vụ
                    </button>
                    <a href="<?= site_url('services/ads') ?>" class="px-6 py-3 font-medium text-orange-600 bg-orange-50 border border-orange-200 rounded-lg hover:bg-orange-100 transition-all text-center">
                        Chi Tiết Dịch Vụ
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Service Card 4: Hosting & VPS -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden flex flex-col lg:flex-row">
            <div class="lg:w-1/3 bg-purple-50 flex items-center justify-center p-8">
                <i data-lucide="server" class="w-24 h-24 text-purple-500"></i>
            </div>
            <div class="p-8 lg:w-2/3">
                <h3 class="text-2xl font-bold text-gray-900">Dịch Vụ Hosting & VPS</h3>
                <p class="mt-2 text-gray-600">Cung cấp giải pháp lưu trữ website ổn định, tốc độ cao với hệ thống bảo mật đa lớp. Hỗ trợ kỹ thuật 24/7 đảm bảo website của bạn luôn hoạt động trơn tru.</p>
                <ul class="mt-4 space-y-2 text-sm text-gray-700">
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-5 h-5 text-green-500"></i>Uptime cam kết 99.9%, tốc độ tải trang nhanh.</li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-5 h-5 text-green-500"></i>Bảo mật SSL, chống tấn công DDoS.</li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-5 h-5 text-green-500"></i>Sao lưu dữ liệu tự động hàng ngày.</li>
                    <li class="flex items-center gap-2"><i data-lucide="check-circle-2" class="w-5 h-5 text-green-500"></i>Hệ thống quản lý cPanel/Plesk dễ sử dụng.</li>
                </ul>
                <div class="mt-6 flex flex-col sm:flex-row gap-3">
                    <button class="px-6 py-3 font-semibold text-white bg-purple-600 rounded-lg hover:bg-purple-700 transition-all">
                        Đăng Ký Ngay
                    </button>
                    <a href="<?= site_url('services/hosting') ?>" class="px-6 py-3 font-medium text-purple-600 bg-purple-50 border border-purple-200 rounded-lg hover:bg-purple-100 transition-all text-center">
                        Chi Tiết Dịch Vụ
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Why Choose Us Section -->
    <div class="mt-12 bg-white p-8 rounded-xl shadow-sm border border-gray-200">
        <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">Tại sao chọn dịch vụ của chúng tôi?</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="users" class="w-8 h-8 text-indigo-600"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Đội ngũ chuyên nghiệp</h3>
                <p class="text-gray-600">Đội ngũ chuyên gia với kinh nghiệm nhiều năm trong lĩnh vực công nghệ và digital marketing.</p>
            </div>
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="award" class="w-8 h-8 text-indigo-600"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Chất lượng hàng đầu</h3>
                <p class="text-gray-600">Cam kết cung cấp dịch vụ với tiêu chuẩn chất lượng cao nhất, đáp ứng mọi yêu cầu của khách hàng.</p>
            </div>
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="clock" class="w-8 h-8 text-indigo-600"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Hỗ trợ 24/7</h3>
                <p class="text-gray-600">Đội ngũ hỗ trợ kỹ thuật luôn sẵn sàng giải đáp mọi thắc mắc và xử lý sự cố 24/7.</p>
            </div>
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="refresh-ccw" class="w-8 h-8 text-indigo-600"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Cập nhật liên tục</h3>
                <p class="text-gray-600">Luôn cập nhật các xu hướng và công nghệ mới nhất để đảm bảo dịch vụ hiệu quả nhất.</p>
            </div>
        </div>
    </div>
    
    <!-- Contact CTA Section -->
    <div class="mt-12 bg-gradient-to-r from-indigo-600 to-blue-600 p-8 rounded-xl shadow-lg">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-2xl font-bold text-white mb-4">Bạn có dự án cần triển khai?</h2>
            <p class="text-indigo-100 mb-6">Hãy để chúng tôi giúp bạn hiện thực hóa ý tưởng và phát triển doanh nghiệp của bạn.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="px-6 py-3 bg-white text-indigo-600 font-semibold rounded-lg hover:bg-indigo-50 transition-all">Liên hệ tư vấn</button>
                <button class="px-6 py-3 bg-transparent text-white border border-white font-medium rounded-lg hover:bg-indigo-700 transition-all">Xem thêm dịch vụ</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 