<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Dịch Vụ Google Maps</h1>
    
    <div class="text-center mb-12">
        <h2 class="text-2xl font-semibold text-gray-800">Tối Ưu Hiện Diện Trực Tuyến Của Doanh Nghiệp Trên Google Maps</h2>
        <p class="text-gray-600 mt-2 max-w-2xl mx-auto">Tăng lưu lượng khách hàng, xây dựng uy tín và tối ưu khả năng hiển thị của doanh nghiệp trên nền tảng Google Maps.</p>
    </div>
    
    <!-- Service Categories -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
        <?php if(!empty($services)): ?>
            <?php foreach($services as $service): ?>
            <div class="bg-white border rounded-xl shadow-sm p-6 flex flex-col">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                        <?php if(strpos($service['id'], 'verify') !== false): ?>
                        <i data-lucide="check-circle" class="w-8 h-8 text-green-600"></i>
                        <?php else: ?>
                        <i data-lucide="trending-up" class="w-8 h-8 text-orange-600"></i>
                        <?php endif; ?>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-center"><?= $service['name'] ?></h3>
                <p class="text-sm text-center text-gray-500 flex-grow mt-2"><?= $service['description'] ?></p>
                
                <?php 
                $features = json_decode($service['features'], true);
                if(!empty($features) && is_array($features)): 
                ?>
                <ul class="space-y-2 mt-4 mb-4 text-sm">
                    <?php foreach($features as $feature): ?>
                    <li class="flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-5 h-5 text-green-500"></i>
                        <span><?= $feature ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
                
                <p class="text-2xl font-bold text-center my-4"><?= number_format($service['price']) ?>đ</p>
                
                <form action="<?= site_url('cart/add') ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="service_id" value="<?= $service['id'] ?>">
                    <input type="hidden" name="duration" value="<?= $service['duration'] ?>">
                    <button type="submit" class="mt-4 w-full 
                        <?= strpos($service['id'], 'verify') !== false ? 'bg-green-600 hover:bg-green-700' : 'bg-orange-600 hover:bg-orange-700' ?> 
                        text-white font-bold py-3 rounded-lg transition">
                        <i data-lucide="shopping-cart" class="w-5 h-5 inline-block mr-2"></i>
                        Đặt Hàng Ngay
                    </button>
                </form>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
        <!-- Maps Verification -->
        <div class="bg-white border rounded-xl shadow-sm p-6 flex flex-col">
            <div class="flex justify-center mb-4">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                    <i data-lucide="check-circle" class="w-8 h-8 text-green-600"></i>
                </div>
            </div>
            <h3 class="text-xl font-bold text-center">Xác Minh Google Maps</h3>
            <p class="text-sm text-center text-gray-500 flex-grow mt-2">Tạo mới và xác minh địa điểm doanh nghiệp trên Google Maps, tối ưu thông tin và hình ảnh để thu hút khách hàng.</p>
            <ul class="space-y-2 mt-4 mb-4 text-sm">
                <li class="flex items-center gap-2">
                    <i data-lucide="check-circle" class="w-5 h-5 text-green-500"></i>
                    <span>Tạo và xác minh địa điểm chính thức</span>
                </li>
                <li class="flex items-center gap-2">
                    <i data-lucide="check-circle" class="w-5 h-5 text-green-500"></i>
                    <span>Tối ưu thông tin và hình ảnh</span>
                </li>
                <li class="flex items-center gap-2">
                    <i data-lucide="check-circle" class="w-5 h-5 text-green-500"></i>
                    <span>Thiết lập giờ làm việc, dịch vụ</span>
                </li>
                <li class="flex items-center gap-2">
                    <i data-lucide="check-circle" class="w-5 h-5 text-green-500"></i>
                    <span>Hỗ trợ xử lý vấn đề xác minh</span>
                </li>
            </ul>
            <p class="text-2xl font-bold text-center my-4">1.500.000đ</p>
            <button class="mt-4 w-full bg-green-600 text-white font-bold py-3 rounded-lg hover:bg-green-700">Đặt Hàng Ngay</button>
        </div>

        <!-- Maps SEO -->
        <div class="bg-white border rounded-xl shadow-sm p-6 flex flex-col">
            <div class="flex justify-center mb-4">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center">
                    <i data-lucide="trending-up" class="w-8 h-8 text-orange-600"></i>
                </div>
            </div>
            <h3 class="text-xl font-bold text-center">SEO Google Maps</h3>
            <p class="text-sm text-center text-gray-500 flex-grow mt-2">Tối ưu, tăng hạng và tăng đánh giá cho doanh nghiệp trên Google Maps, giúp doanh nghiệp dễ dàng được tìm thấy.</p>
            <ul class="space-y-2 mt-4 mb-4 text-sm">
                <li class="flex items-center gap-2">
                    <i data-lucide="check-circle" class="w-5 h-5 text-green-500"></i>
                    <span>Tối ưu từ khóa địa điểm</span>
                </li>
                <li class="flex items-center gap-2">
                    <i data-lucide="check-circle" class="w-5 h-5 text-green-500"></i>
                    <span>Tăng số lượng đánh giá và review</span>
                </li>
                <li class="flex items-center gap-2">
                    <i data-lucide="check-circle" class="w-5 h-5 text-green-500"></i>
                    <span>Chiến lược thúc đẩy xếp hạng</span>
                </li>
                <li class="flex items-center gap-2">
                    <i data-lucide="check-circle" class="w-5 h-5 text-green-500"></i>
                    <span>Báo cáo hiệu suất hàng tháng</span>
                </li>
            </ul>
            <p class="text-2xl font-bold text-center my-4">5.000.000đ</p>
            <button class="mt-4 w-full bg-orange-600 text-white font-bold py-3 rounded-lg hover:bg-orange-700">Đặt Hàng Ngay</button>
        </div>
        <?php endif; ?>
    </div>
    
    <!-- Packages Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-12">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-6">So Sánh Các Gói Dịch Vụ</h2>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tính năng</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Xác minh cơ bản</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SEO Maps 3 tháng</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SEO Maps 6 tháng</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap font-medium">Tạo và xác minh địa điểm</td>
                            <td class="px-6 py-4 whitespace-nowrap"><i data-lucide="check" class="inline w-5 h-5 text-green-500"></i></td>
                            <td class="px-6 py-4 whitespace-nowrap"><i data-lucide="check" class="inline w-5 h-5 text-green-500"></i></td>
                            <td class="px-6 py-4 whitespace-nowrap"><i data-lucide="check" class="inline w-5 h-5 text-green-500"></i></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap font-medium">Cập nhật thông tin doanh nghiệp</td>
                            <td class="px-6 py-4 whitespace-nowrap"><i data-lucide="check" class="inline w-5 h-5 text-green-500"></i></td>
                            <td class="px-6 py-4 whitespace-nowrap"><i data-lucide="check" class="inline w-5 h-5 text-green-500"></i></td>
                            <td class="px-6 py-4 whitespace-nowrap"><i data-lucide="check" class="inline w-5 h-5 text-green-500"></i></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap font-medium">Thêm hình ảnh doanh nghiệp</td>
                            <td class="px-6 py-4 whitespace-nowrap">5 hình</td>
                            <td class="px-6 py-4 whitespace-nowrap">20 hình</td>
                            <td class="px-6 py-4 whitespace-nowrap">30+ hình</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap font-medium">Tối ưu từ khóa địa điểm</td>
                            <td class="px-6 py-4 whitespace-nowrap"><i data-lucide="x" class="inline w-5 h-5 text-gray-400"></i></td>
                            <td class="px-6 py-4 whitespace-nowrap"><i data-lucide="check" class="inline w-5 h-5 text-green-500"></i></td>
                            <td class="px-6 py-4 whitespace-nowrap"><i data-lucide="check" class="inline w-5 h-5 text-green-500"></i></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap font-medium">Tăng đánh giá & review</td>
                            <td class="px-6 py-4 whitespace-nowrap"><i data-lucide="x" class="inline w-5 h-5 text-gray-400"></i></td>
                            <td class="px-6 py-4 whitespace-nowrap">30 review</td>
                            <td class="px-6 py-4 whitespace-nowrap">100 review</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap font-medium">Phản hồi đánh giá khách hàng</td>
                            <td class="px-6 py-4 whitespace-nowrap"><i data-lucide="x" class="inline w-5 h-5 text-gray-400"></i></td>
                            <td class="px-6 py-4 whitespace-nowrap"><i data-lucide="check" class="inline w-5 h-5 text-green-500"></i></td>
                            <td class="px-6 py-4 whitespace-nowrap"><i data-lucide="check" class="inline w-5 h-5 text-green-500"></i></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap font-medium">Báo cáo hiệu suất</td>
                            <td class="px-6 py-4 whitespace-nowrap"><i data-lucide="x" class="inline w-5 h-5 text-gray-400"></i></td>
                            <td class="px-6 py-4 whitespace-nowrap">Hàng tháng</td>
                            <td class="px-6 py-4 whitespace-nowrap">Hàng tuần</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap font-medium">Tư vấn chiến lược</td>
                            <td class="px-6 py-4 whitespace-nowrap"><i data-lucide="x" class="inline w-5 h-5 text-gray-400"></i></td>
                            <td class="px-6 py-4 whitespace-nowrap"><i data-lucide="check" class="inline w-5 h-5 text-green-500"></i></td>
                            <td class="px-6 py-4 whitespace-nowrap"><i data-lucide="check" class="inline w-5 h-5 text-green-500"></i></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap font-medium">Giá dịch vụ</td>
                            <td class="px-6 py-4 whitespace-nowrap">1.500.000đ</td>
                            <td class="px-6 py-4 whitespace-nowrap">5.000.000đ</td>
                            <td class="px-6 py-4 whitespace-nowrap">9.000.000đ</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap font-medium"></td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button class="px-3 py-1 bg-green-600 text-white text-sm rounded hover:bg-green-700">Đặt hàng</button>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button class="px-3 py-1 bg-orange-600 text-white text-sm rounded hover:bg-orange-700">Đặt hàng</button>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button class="px-3 py-1 bg-orange-600 text-white text-sm rounded hover:bg-orange-700">Đặt hàng</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Process Section -->
    <div class="my-16">
        <h2 class="text-3xl font-bold text-center mb-10">Quy Trình Làm Việc</h2>
        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
                <div class="flex flex-col items-center text-center">
                    <div class="flex justify-center mb-4">
                        <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center">
                            <span class="font-bold text-indigo-600">1</span>
                        </div>
                    </div>
                    <h3 class="font-semibold">Thu Thập Thông Tin</h3>
                    <p class="text-sm text-gray-600 mt-2">Thu thập thông tin doanh nghiệp và mục tiêu cần đạt được.</p>
                </div>
                
                <div class="flex flex-col items-center text-center">
                    <div class="flex justify-center mb-4">
                        <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center">
                            <span class="font-bold text-indigo-600">2</span>
                        </div>
                    </div>
                    <h3 class="font-semibold">Tạo & Cấu Hình</h3>
                    <p class="text-sm text-gray-600 mt-2">Tạo và cấu hình địa điểm doanh nghiệp trên Google Maps.</p>
                </div>
                
                <div class="flex flex-col items-center text-center">
                    <div class="flex justify-center mb-4">
                        <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center">
                            <span class="font-bold text-indigo-600">3</span>
                        </div>
                    </div>
                    <h3 class="font-semibold">Xác Minh</h3>
                    <p class="text-sm text-gray-600 mt-2">Tiến hành xác minh địa điểm theo quy định của Google.</p>
                </div>
                
                <div class="flex flex-col items-center text-center">
                    <div class="flex justify-center mb-4">
                        <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center">
                            <span class="font-bold text-indigo-600">4</span>
                        </div>
                    </div>
                    <h3 class="font-semibold">Tối Ưu & SEO</h3>
                    <p class="text-sm text-gray-600 mt-2">Tối ưu thông tin và thực hiện các biện pháp SEO Maps.</p>
                </div>
                
                <div class="flex flex-col items-center text-center">
                    <div class="flex justify-center mb-4">
                        <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center">
                            <span class="font-bold text-indigo-600">5</span>
                        </div>
                    </div>
                    <h3 class="font-semibold">Theo Dõi & Báo Cáo</h3>
                    <p class="text-sm text-gray-600 mt-2">Theo dõi hiệu quả và gửi báo cáo chi tiết định kỳ.</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Benefits Section -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-12">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-6 text-center">Lợi Ích Của Dịch Vụ Google Maps</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="flex flex-col items-center text-center p-4">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="map-pin" class="w-8 h-8 text-blue-600"></i>
                    </div>
                    <h3 class="font-bold text-lg">Tăng Khả Năng Hiển Thị</h3>
                    <p class="text-gray-600 mt-2">Doanh nghiệp của bạn sẽ xuất hiện trong kết quả tìm kiếm trên Google Maps, giúp khách hàng dễ dàng tìm thấy bạn.</p>
                </div>
                
                <div class="flex flex-col items-center text-center p-4">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="users" class="w-8 h-8 text-blue-600"></i>
                    </div>
                    <h3 class="font-bold text-lg">Thu Hút Khách Hàng Mới</h3>
                    <p class="text-gray-600 mt-2">78% người dùng tìm kiếm thông tin địa phương trên smartphone sẽ ghé thăm cửa hàng trong vòng 24 giờ.</p>
                </div>
                
                <div class="flex flex-col items-center text-center p-4">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="star" class="w-8 h-8 text-blue-600"></i>
                    </div>
                    <h3 class="font-bold text-lg">Xây Dựng Uy Tín</h3>
                    <p class="text-gray-600 mt-2">Đánh giá và review tích cực trên Google Maps giúp xây dựng uy tín và niềm tin với khách hàng tiềm năng.</p>
                </div>
                
                <div class="flex flex-col items-center text-center p-4">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="bar-chart-2" class="w-8 h-8 text-blue-600"></i>
                    </div>
                    <h3 class="font-bold text-lg">Phân Tích Dữ Liệu</h3>
                    <p class="text-gray-600 mt-2">Tiếp cận thông tin chi tiết về cách khách hàng tìm kiếm và tương tác với doanh nghiệp của bạn.</p>
                </div>
                
                <div class="flex flex-col items-center text-center p-4">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="phone-call" class="w-8 h-8 text-blue-600"></i>
                    </div>
                    <h3 class="font-bold text-lg">Tăng Tương Tác</h3>
                    <p class="text-gray-600 mt-2">Khách hàng có thể dễ dàng liên hệ, gọi điện hoặc tìm đường đến doanh nghiệp chỉ với một cú nhấp chuột.</p>
                </div>
                
                <div class="flex flex-col items-center text-center p-4">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="award" class="w-8 h-8 text-blue-600"></i>
                    </div>
                    <h3 class="font-bold text-lg">Vượt Trội Đối Thủ</h3>
                    <p class="text-gray-600 mt-2">Địa điểm được xác minh và tối ưu sẽ được ưu tiên hiển thị, giúp bạn nổi bật hơn so với đối thủ cạnh tranh.</p>
                </div>
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
                        <span class="font-medium">Tôi có cần xác minh địa điểm trên Google Maps không?</span>
                        <i data-lucide="plus" class="w-5 h-5"></i>
                    </button>
                    <div class="px-6 py-4 bg-gray-50 border-t">
                        <p>Có, việc xác minh địa điểm trên Google Maps là cực kỳ quan trọng. Địa điểm được xác minh sẽ được Google coi là đáng tin cậy hơn, có cơ hội hiển thị cao hơn trong kết quả tìm kiếm, và bạn có thể truy cập đầy đủ các tính năng quản lý như thêm thông tin chi tiết, phản hồi đánh giá và xem số liệu thống kê.</p>
                    </div>
                </div>
                
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="flex justify-between items-center w-full px-6 py-4 text-left">
                        <span class="font-medium">Quy trình xác minh Google Maps mất bao lâu?</span>
                        <i data-lucide="plus" class="w-5 h-5"></i>
                    </button>
                    <div class="px-6 py-4 bg-gray-50 border-t">
                        <p>Thời gian xác minh Google Maps thường mất từ 5-14 ngày tùy thuộc vào phương thức xác minh (qua thư bưu điện, điện thoại hoặc email). Dịch vụ của chúng tôi sẽ hỗ trợ tối ưu quá trình này và xử lý mọi vấn đề phát sinh để đảm bảo quá trình xác minh diễn ra nhanh chóng và suôn sẻ.</p>
                    </div>
                </div>
                
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="flex justify-between items-center w-full px-6 py-4 text-left">
                        <span class="font-medium">Làm thế nào để tôi có thể tăng xếp hạng trên Google Maps?</span>
                        <i data-lucide="plus" class="w-5 h-5"></i>
                    </button>
                    <div class="px-6 py-4 bg-gray-50 border-t">
                        <p>Để tăng xếp hạng trên Google Maps, bạn cần: (1) Hoàn thiện đầy đủ thông tin doanh nghiệp, (2) Sử dụng từ khóa phù hợp trong mô tả và các dịch vụ, (3) Thu thập nhiều đánh giá tích cực, (4) Phản hồi đánh giá thường xuyên, (5) Thêm hình ảnh chất lượng cao, (6) Cập nhật thông tin thường xuyên, và (7) Liên kết Google Maps với website của bạn. Dịch vụ SEO Maps của chúng tôi sẽ thực hiện tất cả các yếu tố này một cách chuyên nghiệp.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- CTA Section -->
    <div class="bg-blue-600 text-white rounded-xl p-8 mb-12">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-4">Sẵn sàng đưa doanh nghiệp của bạn lên bản đồ?</h2>
            <p class="text-lg mb-8">Liên hệ ngay với chúng tôi để nhận tư vấn miễn phí và bắt đầu tối ưu hiện diện doanh nghiệp của bạn trên Google Maps.</p>
            <div class="flex flex-col md:flex-row justify-center gap-4">
                <button class="bg-white text-blue-600 font-bold px-6 py-3 rounded-lg hover:bg-gray-100">Gọi ngay: 0987 654 321</button>
                <button class="bg-blue-500 text-white font-bold px-6 py-3 rounded-lg hover:bg-blue-400 border border-white">Yêu cầu báo giá</button>
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