<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Dịch Vụ Email Marketing</h1>
    
    <div class="text-center mb-12">
        <h2 class="text-2xl font-semibold text-gray-800">Gửi Email Marketing Hiệu Quả & Chuyên Nghiệp</h2>
        <p class="text-gray-600 mt-2 max-w-2xl mx-auto">Xây dựng chiến dịch, nuôi dưỡng khách hàng và tăng trưởng doanh thu với nền tảng gửi email mạnh mẽ của chúng tôi.</p>
    </div>

    <!-- Pricing Table -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 mb-12">
        <?php if(!empty($services)): ?>
            <?php foreach($services as $service): ?>
            <?php 
            $isPopular = strpos($service['id'], 'growth') !== false;
            $features = json_decode($service['features'], true); 
            ?>
            <div class="bg-white border<?= $isPopular ? '-2 border-indigo-600 shadow-lg transform scale-105' : '' ?> rounded-xl shadow-sm p-6 flex flex-col relative">
                <?php if($isPopular): ?>
                <span class="absolute top-0 -translate-y-1/2 bg-indigo-600 text-white text-xs font-bold px-3 py-1 rounded-full left-1/2 -translate-x-1/2">Phổ biến</span>
                <?php endif; ?>
                
                <h3 class="text-xl font-bold text-center"><?= explode(' - ', $service['name'])[1] ?? $service['name'] ?></h3>
                <p class="text-sm text-center text-gray-500"><?= $service['description'] ?></p>
                <p class="text-4xl font-bold text-center my-6"><?= number_format($service['price']) ?><span class="text-lg font-medium">đ/tháng</span></p>
                
                <?php if(!empty($features) && is_array($features)): ?>
                <ul class="space-y-3 text-sm flex-grow">
                    <?php foreach($features as $feature): ?>
                    <li class="flex items-center gap-2">
                        <?php if(strpos(strtolower($feature), 'không') !== false || strpos(strtolower($feature), 'tối đa') !== false): ?>
                        <i data-lucide="users" class="w-5 h-5 text-indigo-500"></i>
                        <?php elseif(strpos(strtolower($feature), 'báo cáo') !== false): ?>
                        <i data-lucide="bar-chart-2" class="w-5 h-5 text-indigo-500"></i>
                        <?php elseif(strpos(strtolower($feature), 'hỗ trợ') !== false): ?>
                        <i data-lucide="life-buoy" class="w-5 h-5 text-indigo-500"></i>
                        <?php elseif(strpos(strtolower($feature), 'tự động') !== false): ?>
                        <i data-lucide="zap" class="w-5 h-5 text-indigo-500"></i>
                        <?php elseif(strpos(strtolower($feature), 'tích hợp') !== false): ?>
                        <i data-lucide="link" class="w-5 h-5 text-indigo-500"></i>
                        <?php else: ?>
                        <i data-lucide="check" class="w-5 h-5 text-green-500"></i>
                        <?php endif; ?>
                        <span><?= $feature ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
                
                <form action="<?= site_url('cart/add') ?>" method="post" class="mt-8 w-full">
                    <?= csrf_field() ?>
                    <input type="hidden" name="service_id" value="<?= $service['id'] ?>">
                    <input type="hidden" name="duration" value="<?= $service['duration'] ?>">
                    <button type="submit" class="w-full <?= $isPopular ? 'bg-indigo-600 text-white hover:bg-indigo-700' : 'bg-indigo-100 text-indigo-700 hover:bg-indigo-200' ?> font-bold py-3 rounded-lg transition">
                        <i data-lucide="shopping-cart" class="w-4 h-4 inline-block mr-1"></i>
                        Đăng ký
                    </button>
                </form>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
        <!-- Card 1: Starter -->
        <div class="bg-white border rounded-xl shadow-sm p-6 flex flex-col">
            <h3 class="text-xl font-bold text-center">Khởi Đầu</h3>
            <p class="text-sm text-center text-gray-500">Cho cá nhân, dự án nhỏ</p>
            <p class="text-4xl font-bold text-center my-6">250.000<span class="text-lg font-medium">đ/tháng</span></p>
            <ul class="space-y-3 text-sm flex-grow">
                <li class="flex items-center gap-2"><i data-lucide="users" class="w-5 h-5 text-indigo-500"></i>Tối đa <b>2,000</b> subscribers</li>
                <li class="flex items-center gap-2"><i data-lucide="send" class="w-5 h-5 text-indigo-500"></i><b>10,000</b> email/tháng</li>
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-5 h-5 text-green-500"></i>Trình tạo email kéo thả</li>
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-5 h-5 text-green-500"></i>Báo cáo cơ bản</li>
                <li class="flex items-center gap-2"><i data-lucide="x" class="w-5 h-5 text-gray-400"></i>Tự động hóa (Automation)</li>
            </ul>
            <button class="mt-8 w-full bg-indigo-100 text-indigo-700 font-bold py-3 rounded-lg hover:bg-indigo-200">Đăng ký</button>
        </div>

        <!-- Card 2: Growth (Popular) -->
        <div class="bg-white border-2 border-indigo-600 rounded-xl shadow-lg p-6 flex flex-col relative transform scale-105">
            <span class="absolute top-0 -translate-y-1/2 bg-indigo-600 text-white text-xs font-bold px-3 py-1 rounded-full left-1/2 -translate-x-1/2">Phổ biến</span>
            <h3 class="text-xl font-bold text-center">Phát Triển</h3>
            <p class="text-sm text-center text-gray-500">Cho doanh nghiệp đang tăng trưởng</p>
            <p class="text-4xl font-bold text-center my-6">790.000<span class="text-lg font-medium">đ/tháng</span></p>
            <ul class="space-y-3 text-sm flex-grow">
                <li class="flex items-center gap-2"><i data-lucide="users" class="w-5 h-5 text-indigo-500"></i>Tối đa <b>10,000</b> subscribers</li>
                <li class="flex items-center gap-2"><i data-lucide="send" class="w-5 h-5 text-indigo-500"></i><b>Không giới hạn</b> email</li>
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-5 h-5 text-green-500"></i>Trình tạo email kéo thả</li>
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-5 h-5 text-green-500"></i>Báo cáo nâng cao</li>
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-5 h-5 text-green-500"></i>Tự động hóa (Automation)</li>
            </ul>
            <button class="mt-8 w-full bg-indigo-600 text-white font-bold py-3 rounded-lg hover:bg-indigo-700">Đăng ký</button>
        </div>

        <!-- Card 3: Business -->
        <div class="bg-white border rounded-xl shadow-sm p-6 flex flex-col">
            <h3 class="text-xl font-bold text-center">Doanh Nghiệp</h3>
            <p class="text-sm text-center text-gray-500">Giải pháp toàn diện, nhiều tính năng</p>
            <p class="text-4xl font-bold text-center my-6">1.890.000<span class="text-lg font-medium">đ/tháng</span></p>
            <ul class="space-y-3 text-sm flex-grow">
                <li class="flex items-center gap-2"><i data-lucide="users" class="w-5 h-5 text-indigo-500"></i>Tối đa <b>25,000</b> subscribers</li>
                <li class="flex items-center gap-2"><i data-lucide="send" class="w-5 h-5 text-indigo-500"></i><b>Không giới hạn</b> email</li>
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-5 h-5 text-green-500"></i>Trình tạo email kéo thả</li>
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-5 h-5 text-green-500"></i>Báo cáo nâng cao</li>
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-5 h-5 text-green-500"></i>Tự động hóa (Automation)</li>
            </ul>
            <button class="mt-8 w-full bg-indigo-100 text-indigo-700 font-bold py-3 rounded-lg hover:bg-indigo-200">Đăng ký</button>
        </div>

        <!-- Card 4: Enterprise -->
        <div class="bg-white border rounded-xl shadow-sm p-6 flex flex-col">
            <h3 class="text-xl font-bold text-center">Tuỳ Chỉnh</h3>
            <p class="text-sm text-center text-gray-500">Cho nhu cầu gửi email số lượng cực lớn</p>
            <p class="text-4xl font-bold text-center my-6">Liên Hệ</p>
            <ul class="space-y-3 text-sm flex-grow">
                <li class="flex items-center gap-2"><i data-lucide="users" class="w-5 h-5 text-indigo-500"></i><b>Không giới hạn</b> subscribers</li>
                <li class="flex items-center gap-2"><i data-lucide="send" class="w-5 h-5 text-indigo-500"></i><b>Không giới hạn</b> email</li>
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-5 h-5 text-green-500"></i>Hạ tầng gửi riêng</li>
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-5 h-5 text-green-500"></i>Hỗ trợ chuyên biệt</li>
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-5 h-5 text-green-500"></i>Tích hợp API</li>
            </ul>
            <button class="mt-8 w-full bg-indigo-100 text-indigo-700 font-bold py-3 rounded-lg hover:bg-indigo-200">Liên hệ</button>
        </div>
        <?php endif; ?>
    </div>
    
    <!-- Features Section -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-12">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-8 text-center">Tính Năng Nổi Bật</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="flex flex-col items-center text-center p-4">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="mail-plus" class="w-8 h-8 text-indigo-600"></i>
                    </div>
                    <h3 class="font-bold text-lg">Trình Tạo Email Chuyên Nghiệp</h3>
                    <p class="text-gray-600 mt-2">Thiết kế email marketing chuyên nghiệp bằng công cụ kéo thả dễ sử dụng, không cần kiến thức kỹ thuật.</p>
                </div>
                
                <div class="flex flex-col items-center text-center p-4">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="users" class="w-8 h-8 text-indigo-600"></i>
                    </div>
                    <h3 class="font-bold text-lg">Phân Đoạn Đối Tượng</h3>
                    <p class="text-gray-600 mt-2">Phân chia danh sách người nhận theo hành vi, nhân khẩu học và tương tác để nâng cao hiệu quả chiến dịch.</p>
                </div>
                
                <div class="flex flex-col items-center text-center p-4">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="bar-chart-2" class="w-8 h-8 text-indigo-600"></i>
                    </div>
                    <h3 class="font-bold text-lg">Báo Cáo Chi Tiết</h3>
                    <p class="text-gray-600 mt-2">Theo dõi tỷ lệ mở, nhấp chuột, chuyển đổi và nhiều chỉ số khác để đánh giá hiệu quả chiến dịch.</p>
                </div>
                
                <div class="flex flex-col items-center text-center p-4">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="workflow" class="w-8 h-8 text-indigo-600"></i>
                    </div>
                    <h3 class="font-bold text-lg">Tự Động Hóa Marketing</h3>
                    <p class="text-gray-600 mt-2">Thiết lập chuỗi email tự động dựa trên hành vi và sở thích của khách hàng để nuôi dưỡng lead hiệu quả.</p>
                </div>
                
                <div class="flex flex-col items-center text-center p-4">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="link" class="w-8 h-8 text-indigo-600"></i>
                    </div>
                    <h3 class="font-bold text-lg">Tích Hợp Đa Nền Tảng</h3>
                    <p class="text-gray-600 mt-2">Kết nối với CRM, cửa hàng trực tuyến, website và công cụ phân tích để tạo hệ sinh thái marketing hoàn chỉnh.</p>
                </div>
                
                <div class="flex flex-col items-center text-center p-4">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="shield-check" class="w-8 h-8 text-indigo-600"></i>
                    </div>
                    <h3 class="font-bold text-lg">Tuân Thủ & Bảo Mật</h3>
                    <p class="text-gray-600 mt-2">Đảm bảo tuân thủ các quy định về email marketing, GDPR và bảo vệ dữ liệu người dùng an toàn.</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Benefits Section -->
    <div class="mb-12">
        <h2 class="text-2xl font-semibold mb-8 text-center">Lợi Ích Khi Sử Dụng Email Marketing</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <div class="flex items-start">
                    <div class="mr-4 text-indigo-600">
                        <i data-lucide="target" class="w-10 h-10"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-2">ROI Cao Nhất</h3>
                        <p class="text-gray-600">Email marketing có tỷ lệ hoàn vốn đầu tư (ROI) trung bình là 42:1, nghĩa là mỗi 1đ chi tiêu có thể thu về 42đ lợi nhuận, cao hơn bất kỳ kênh marketing nào khác.</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <div class="flex items-start">
                    <div class="mr-4 text-indigo-600">
                        <i data-lucide="users" class="w-10 h-10"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Tiếp Cận Đúng Đối Tượng</h3>
                        <p class="text-gray-600">Email marketing giúp bạn giao tiếp trực tiếp với những người đã chủ động đăng ký nhận thông tin, đảm bảo thông điệp đến với những đối tượng quan tâm thực sự.</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <div class="flex items-start">
                    <div class="mr-4 text-indigo-600">
                        <i data-lucide="line-chart" class="w-10 h-10"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Đo Lường Hiệu Quả Dễ Dàng</h3>
                        <p class="text-gray-600">Mọi hoạt động trong chiến dịch email đều có thể đo lường chi tiết từ tỷ lệ mở, tỷ lệ click đến tỷ lệ chuyển đổi, giúp tối ưu hiệu suất liên tục.</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <div class="flex items-start">
                    <div class="mr-4 text-indigo-600">
                        <i data-lucide="refresh-cw" class="w-10 h-10"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Xây Dựng Mối Quan Hệ Lâu Dài</h3>
                        <p class="text-gray-600">Email marketing không chỉ là công cụ bán hàng, mà còn là kênh để nuôi dưỡng khách hàng, xây dựng lòng tin và mối quan hệ bền vững với thương hiệu của bạn.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Process Section -->
    <div class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white rounded-xl p-8 mb-12">
        <h2 class="text-2xl font-bold mb-8 text-center">Quy Trình Triển Khai Email Marketing</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
            <div class="flex flex-col items-center text-center">
                <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mb-4">
                    <span class="text-xl font-bold">1</span>
                </div>
                <h3 class="text-lg font-semibold">Thiết Lập Tài Khoản</h3>
                <p class="text-sm mt-2 text-white/80">Cài đặt tài khoản và cấu hình máy chủ gửi email chuyên nghiệp</p>
            </div>
            
            <div class="flex flex-col items-center text-center">
                <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mb-4">
                    <span class="text-xl font-bold">2</span>
                </div>
                <h3 class="text-lg font-semibold">Xây Dựng Danh Sách</h3>
                <p class="text-sm mt-2 text-white/80">Thu thập và nhập khẩu danh sách người nhận, phân đoạn theo tiêu chí</p>
            </div>
            
            <div class="flex flex-col items-center text-center">
                <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mb-4">
                    <span class="text-xl font-bold">3</span>
                </div>
                <h3 class="text-lg font-semibold">Thiết Kế Email</h3>
                <p class="text-sm mt-2 text-white/80">Thiết kế email hấp dẫn, tương thích với mọi thiết bị và trình duyệt</p>
            </div>
            
            <div class="flex flex-col items-center text-center">
                <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mb-4">
                    <span class="text-xl font-bold">4</span>
                </div>
                <h3 class="text-lg font-semibold">Gửi & Theo Dõi</h3>
                <p class="text-sm mt-2 text-white/80">Triển khai chiến dịch và theo dõi hiệu suất thời gian thực</p>
            </div>
            
            <div class="flex flex-col items-center text-center">
                <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mb-4">
                    <span class="text-xl font-bold">5</span>
                </div>
                <h3 class="text-lg font-semibold">Phân Tích & Tối Ưu</h3>
                <p class="text-sm mt-2 text-white/80">Phân tích kết quả và liên tục cải thiện hiệu suất chiến dịch</p>
            </div>
        </div>
    </div>
    
    <!-- FAQ Section -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-12">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-6">Câu Hỏi Thường Gặp</h2>
            
            <div class="space-y-4">
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="flex justify-between items-center w-full px-6 py-4 text-left font-medium">
                        <span>Tỷ lệ gửi email thành công của dịch vụ là bao nhiêu?</span>
                        <i data-lucide="plus" class="w-5 h-5 faq-icon"></i>
                    </button>
                    <div class="px-6 py-4 bg-gray-50 border-t faq-content hidden">
                        <p>Dịch vụ email marketing của chúng tôi đạt tỷ lệ gửi thành công trung bình là 99.5%. Chúng tôi sử dụng máy chủ gửi email chuyên nghiệp với độ uy tín cao, liên tục theo dõi và cải thiện khả năng gửi để đảm bảo email của bạn đến được hộp thư đến của người nhận.</p>
                    </div>
                </div>
                
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="flex justify-between items-center w-full px-6 py-4 text-left font-medium">
                        <span>Làm thế nào để xây dựng danh sách email chất lượng?</span>
                        <i data-lucide="plus" class="w-5 h-5 faq-icon"></i>
                    </button>
                    <div class="px-6 py-4 bg-gray-50 border-t faq-content hidden">
                        <p>Để xây dựng danh sách email chất lượng, bạn nên: (1) Sử dụng các form đăng ký trên website; (2) Cung cấp giá trị thông qua nội dung miễn phí (ebook, khóa học); (3) Thực hiện chiến dịch quảng cáo có mục tiêu thu thập email; (4) Thường xuyên làm sạch danh sách bằng cách loại bỏ email không hoạt động; (5) Không bao giờ mua danh sách email, điều này có thể dẫn đến tỷ lệ spam cao và ảnh hưởng uy tín người gửi.</p>
                    </div>
                </div>
                
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="flex justify-between items-center w-full px-6 py-4 text-left font-medium">
                        <span>Tôi có cần kiến thức kỹ thuật để sử dụng dịch vụ không?</span>
                        <i data-lucide="plus" class="w-5 h-5 faq-icon"></i>
                    </button>
                    <div class="px-6 py-4 bg-gray-50 border-t faq-content hidden">
                        <p>Không, dịch vụ email marketing của chúng tôi được thiết kế để dễ sử dụng cho tất cả mọi người, không yêu cầu kiến thức kỹ thuật. Giao diện kéo thả trực quan giúp bạn dễ dàng thiết kế email đẹp mắt, và các hướng dẫn chi tiết cùng đội ngũ hỗ trợ luôn sẵn sàng giúp đỡ bạn trong mọi bước triển khai.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Contact Form -->
    <div class="bg-white rounded-xl shadow-sm border p-8 max-w-4xl mx-auto mb-12">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Đăng Ký Dịch Vụ</h2>
        <div class="space-y-4">
            <div>
                <label for="plan-select" class="font-semibold text-sm">Chọn gói dịch vụ</label>
                <select id="plan-select" class="w-full mt-1 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    <option>Gói Khởi Đầu</option>
                    <option>Gói Phát Triển</option>
                    <option>Gói Doanh Nghiệp</option>
                    <option>Gói Tuỳ Chỉnh</option>
                </select>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="font-semibold text-sm">Họ và tên</label>
                    <input id="name" type="text" placeholder="Nhập họ và tên của bạn" class="w-full mt-1 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label for="email" class="font-semibold text-sm">Email</label>
                    <input id="email" type="email" placeholder="Nhập địa chỉ email của bạn" class="w-full mt-1 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="phone" class="font-semibold text-sm">Số điện thoại</label>
                    <input id="phone" type="tel" placeholder="Nhập số điện thoại liên hệ" class="w-full mt-1 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label for="company" class="font-semibold text-sm">Tên công ty</label>
                    <input id="company" type="text" placeholder="Nhập tên công ty của bạn" class="w-full mt-1 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>
            <div>
                <label for="message" class="font-semibold text-sm">Nhu cầu cụ thể</label>
                <textarea id="message" placeholder="Mô tả chi tiết nhu cầu email marketing của bạn..." class="w-full mt-1 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" rows="4"></textarea>
            </div>
            <button class="w-full bg-indigo-600 text-white font-bold py-3 rounded-lg hover:bg-indigo-700 text-lg">Gửi Đăng Ký</button>
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