<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Dịch Vụ Booking KOL/KOC</h1>
    
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl p-8 mb-8">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-4">Tăng độ nhận diện thương hiệu với Influencer Marketing</h2>
            <p class="text-lg mb-8">Kết nối với KOLs và KOCs hàng đầu phù hợp với thương hiệu của bạn để tạo ra chiến dịch quảng cáo hiệu quả</p>
            <a href="#booking" class="inline-block bg-white text-indigo-600 font-bold px-8 py-3 rounded-lg hover:bg-gray-100 transition-colors">
                Tìm KOL phù hợp ngay
            </a>
        </div>
    </div>
    
    <!-- Stats Section -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl border shadow-sm text-center">
            <div class="text-3xl font-bold text-indigo-600 mb-2">5,000+</div>
            <p class="text-gray-600">KOL/KOC trong hệ thống</p>
        </div>
        <div class="bg-white p-6 rounded-xl border shadow-sm text-center">
            <div class="text-3xl font-bold text-indigo-600 mb-2">250+</div>
            <p class="text-gray-600">Thương hiệu đã hợp tác</p>
        </div>
        <div class="bg-white p-6 rounded-xl border shadow-sm text-center">
            <div class="text-3xl font-bold text-indigo-600 mb-2">95%</div>
            <p class="text-gray-600">Tỷ lệ hài lòng của khách hàng</p>
        </div>
    </div>
    
    <!-- Benefits -->
    <div class="bg-white p-8 rounded-xl border shadow-sm mb-8">
        <h2 class="text-2xl font-bold mb-6 text-center">Tại sao nên sử dụng dịch vụ booking KOL của chúng tôi?</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="search" class="w-8 h-8 text-indigo-600"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Lựa Chọn Đa Dạng</h3>
                <p class="text-gray-600">Hệ thống với hơn 5,000 KOL/KOC từ các lĩnh vực khác nhau, phù hợp với mọi thương hiệu</p>
            </div>
            
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="check-circle" class="w-8 h-8 text-indigo-600"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Cam Kết Chất Lượng</h3>
                <p class="text-gray-600">Mỗi KOL/KOC đều được xác minh và đánh giá kỹ lưỡng về tương tác và độ uy tín</p>
            </div>
            
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="bar-chart-2" class="w-8 h-8 text-indigo-600"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Báo Cáo Chi Tiết</h3>
                <p class="text-gray-600">Nhận báo cáo phân tích hiệu suất chiến dịch để đánh giá hiệu quả đầu tư</p>
            </div>
            
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="clock" class="w-8 h-8 text-indigo-600"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Tiết Kiệm Thời Gian</h3>
                <p class="text-gray-600">Từ tìm kiếm đến đàm phán và ký hợp đồng, chúng tôi xử lý mọi công đoạn</p>
            </div>
        </div>
    </div>
    
    <!-- KOL Categories -->
    <div class="mb-8">
        <h2 class="text-2xl font-bold mb-6">Danh mục KOL/KOC theo lĩnh vực</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <a href="#" class="flex items-center bg-white p-4 rounded-lg border hover:border-indigo-500 hover:bg-indigo-50 transition-colors">
                <div class="w-12 h-12 bg-pink-100 rounded-full flex items-center justify-center mr-4">
                    <i data-lucide="sparkles" class="w-6 h-6 text-pink-600"></i>
                </div>
                <span class="font-medium">Làm đẹp & Thời trang</span>
            </a>
            
            <a href="#" class="flex items-center bg-white p-4 rounded-lg border hover:border-indigo-500 hover:bg-indigo-50 transition-colors">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                    <i data-lucide="utensils" class="w-6 h-6 text-green-600"></i>
                </div>
                <span class="font-medium">Ẩm thực & Nấu ăn</span>
            </a>
            
            <a href="#" class="flex items-center bg-white p-4 rounded-lg border hover:border-indigo-500 hover:bg-indigo-50 transition-colors">
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                    <i data-lucide="smartphone" class="w-6 h-6 text-blue-600"></i>
                </div>
                <span class="font-medium">Công nghệ & Gadget</span>
            </a>
            
            <a href="#" class="flex items-center bg-white p-4 rounded-lg border hover:border-indigo-500 hover:bg-indigo-50 transition-colors">
                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mr-4">
                    <i data-lucide="heart" class="w-6 h-6 text-red-600"></i>
                </div>
                <span class="font-medium">Sức khỏe & Thể thao</span>
            </a>
            
            <a href="#" class="flex items-center bg-white p-4 rounded-lg border hover:border-indigo-500 hover:bg-indigo-50 transition-colors">
                <div class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center mr-4">
                    <i data-lucide="palm-tree" class="w-6 h-6 text-amber-600"></i>
                </div>
                <span class="font-medium">Du lịch & Khám phá</span>
            </a>
            
            <a href="#" class="flex items-center bg-white p-4 rounded-lg border hover:border-indigo-500 hover:bg-indigo-50 transition-colors">
                <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                    <i data-lucide="gamepad-2" class="w-6 h-6 text-purple-600"></i>
                </div>
                <span class="font-medium">Game & Giải trí</span>
            </a>
            
            <a href="#" class="flex items-center bg-white p-4 rounded-lg border hover:border-indigo-500 hover:bg-indigo-50 transition-colors">
                <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mr-4">
                    <i data-lucide="baby" class="w-6 h-6 text-orange-600"></i>
                </div>
                <span class="font-medium">Gia đình & Nuôi dạy con</span>
            </a>
            
            <a href="#" class="flex items-center bg-white p-4 rounded-lg border hover:border-indigo-500 hover:bg-indigo-50 transition-colors">
                <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center mr-4">
                    <i data-lucide="briefcase" class="w-6 h-6 text-teal-600"></i>
                </div>
                <span class="font-medium">Kinh doanh & Tài chính</span>
            </a>
        </div>
    </div>
    
    <!-- KOL Booking Section -->
    <div id="booking" class="mb-8">
        <h2 class="text-2xl font-bold mb-6">Tìm kiếm KOL/KOC phù hợp</h2>
        
        <!-- Filters -->
        <div class="mb-6 flex flex-col sm:flex-row gap-4">
            <div class="relative flex-grow">
                <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"></i>
                <input type="text" placeholder="Tìm theo tên hoặc ID..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <select class="border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                <option>Tất cả lĩnh vực</option>
                <option>Ẩm thực</option>
                <option>Làm đẹp</option>
                <option>Thời trang</option>
                <option>Công nghệ</option>
                <option>Du lịch</option>
                <option>Game</option>
                <option>Gia đình</option>
                <option>Kinh doanh</option>
            </select>
            <select class="border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                <option>Mọi mức giá</option>
                <option>Dưới 5 triệu</option>
                <option>5 - 20 triệu</option>
                <option>Trên 20 triệu</option>
            </select>
        </div>

        <!-- KOL/KOC Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Profile Card 1 -->
            <div class="bg-white rounded-xl shadow-sm border overflow-hidden flex flex-col">
                <div class="h-32 bg-gradient-to-r from-purple-400 to-indigo-500"></div>
                <div class="p-4 flex flex-col items-center flex-grow -mt-16">
                    <img src="https://placehold.co/100x100/ffffff/4338ca?text=Linh" class="w-24 h-24 rounded-full border-4 border-white shadow-md">
                    <h3 class="font-bold text-lg mt-2">Linh Barbie</h3>
                    <span class="text-sm bg-pink-100 text-pink-700 px-2 py-0.5 rounded-full mt-1">Làm đẹp</span>
                    <div class="w-full flex justify-around text-center my-4">
                        <div>
                            <p class="font-bold text-lg">18.5M</p>
                            <p class="text-xs text-gray-500">Followers</p>
                        </div>
                         <div>
                            <p class="font-bold text-lg">4.2%</p>
                            <p class="text-xs text-gray-500">Tương tác</p>
                        </div>
                    </div>
                    <button class="w-full mt-auto bg-indigo-600 text-white font-bold py-2 rounded-lg hover:bg-indigo-700">Gửi Yêu Cầu</button>
                </div>
            </div>
            
            <!-- Profile Card 2 -->
            <div class="bg-white rounded-xl shadow-sm border overflow-hidden flex flex-col">
                <div class="h-32 bg-gradient-to-r from-green-400 to-blue-500"></div>
                <div class="p-4 flex flex-col items-center flex-grow -mt-16">
                    <img src="https://placehold.co/100x100/ffffff/16a34a?text=Ninh" class="w-24 h-24 rounded-full border-4 border-white shadow-md">
                    <h3 class="font-bold text-lg mt-2">Ninh Tito</h3>
                    <span class="text-sm bg-green-100 text-green-700 px-2 py-0.5 rounded-full mt-1">Ẩm thực</span>
                    <div class="w-full flex justify-around text-center my-4">
                        <div>
                            <p class="font-bold text-lg">850K</p>
                            <p class="text-xs text-gray-500">Followers</p>
                        </div>
                         <div>
                            <p class="font-bold text-lg">5.1%</p>
                            <p class="text-xs text-gray-500">Tương tác</p>
                        </div>
                    </div>
                    <button class="w-full mt-auto bg-indigo-600 text-white font-bold py-2 rounded-lg hover:bg-indigo-700">Gửi Yêu Cầu</button>
                </div>
            </div>
            
            <!-- Profile Card 3 -->
            <div class="bg-white rounded-xl shadow-sm border overflow-hidden flex flex-col">
                <div class="h-32 bg-gradient-to-r from-blue-400 to-cyan-500"></div>
                <div class="p-4 flex flex-col items-center flex-grow -mt-16">
                    <img src="https://placehold.co/100x100/ffffff/0369a1?text=Minh" class="w-24 h-24 rounded-full border-4 border-white shadow-md">
                    <h3 class="font-bold text-lg mt-2">Minh Tuấn</h3>
                    <span class="text-sm bg-blue-100 text-blue-700 px-2 py-0.5 rounded-full mt-1">Công nghệ</span>
                    <div class="w-full flex justify-around text-center my-4">
                        <div>
                            <p class="font-bold text-lg">1.2M</p>
                            <p class="text-xs text-gray-500">Followers</p>
                        </div>
                         <div>
                            <p class="font-bold text-lg">3.8%</p>
                            <p class="text-xs text-gray-500">Tương tác</p>
                        </div>
                    </div>
                    <button class="w-full mt-auto bg-indigo-600 text-white font-bold py-2 rounded-lg hover:bg-indigo-700">Gửi Yêu Cầu</button>
                </div>
            </div>
            
            <!-- Profile Card 4 -->
            <div class="bg-white rounded-xl shadow-sm border overflow-hidden flex flex-col">
                <div class="h-32 bg-gradient-to-r from-amber-400 to-orange-500"></div>
                <div class="p-4 flex flex-col items-center flex-grow -mt-16">
                    <img src="https://placehold.co/100x100/ffffff/ea580c?text=Trang" class="w-24 h-24 rounded-full border-4 border-white shadow-md">
                    <h3 class="font-bold text-lg mt-2">Trang Du Lịch</h3>
                    <span class="text-sm bg-amber-100 text-amber-700 px-2 py-0.5 rounded-full mt-1">Du lịch</span>
                    <div class="w-full flex justify-around text-center my-4">
                        <div>
                            <p class="font-bold text-lg">650K</p>
                            <p class="text-xs text-gray-500">Followers</p>
                        </div>
                         <div>
                            <p class="font-bold text-lg">4.5%</p>
                            <p class="text-xs text-gray-500">Tương tác</p>
                        </div>
                    </div>
                    <button class="w-full mt-auto bg-indigo-600 text-white font-bold py-2 rounded-lg hover:bg-indigo-700">Gửi Yêu Cầu</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- How It Works -->
    <div class="bg-white p-8 rounded-xl border shadow-sm mb-8">
        <h2 class="text-2xl font-bold mb-8 text-center">Quy trình booking KOL/KOC</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="flex flex-col items-center text-center">
                <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4 text-xl font-bold text-indigo-600">1</div>
                <h3 class="font-bold text-lg mb-2">Tìm kiếm & Chọn KOL</h3>
                <p class="text-gray-600">Tìm kiếm và chọn KOL phù hợp với ngân sách và mục tiêu chiến dịch của bạn</p>
            </div>
            
            <div class="flex flex-col items-center text-center">
                <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4 text-xl font-bold text-indigo-600">2</div>
                <h3 class="font-bold text-lg mb-2">Gửi Yêu Cầu</h3>
                <p class="text-gray-600">Gửi yêu cầu chi tiết về sản phẩm và kỳ vọng của bạn đến KOL đã chọn</p>
            </div>
            
            <div class="flex flex-col items-center text-center">
                <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4 text-xl font-bold text-indigo-600">3</div>
                <h3 class="font-bold text-lg mb-2">Xác Nhận & Thanh Toán</h3>
                <p class="text-gray-600">Nhận xác nhận từ KOL, thống nhất chi tiết hợp tác và hoàn tất thanh toán</p>
            </div>
            
            <div class="flex flex-col items-center text-center">
                <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4 text-xl font-bold text-indigo-600">4</div>
                <h3 class="font-bold text-lg mb-2">Theo Dõi & Báo Cáo</h3>
                <p class="text-gray-600">Nhận báo cáo chi tiết về hiệu suất sau khi chiến dịch kết thúc</p>
            </div>
        </div>
    </div>
    
    <!-- Contact/Request Form -->
    <div class="bg-white rounded-xl shadow-sm border p-8 mb-8">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-2xl font-bold mb-6 text-center">Bạn cần tư vấn về dịch vụ KOL/KOC?</h2>
            <form class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Họ và tên</label>
                        <input type="text" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                        <input type="tel" id="phone" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <label for="budget" class="block text-sm font-medium text-gray-700">Ngân sách dự kiến</label>
                        <select id="budget" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option>Dưới 10 triệu</option>
                            <option>10-50 triệu</option>
                            <option>50-100 triệu</option>
                            <option>Trên 100 triệu</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700">Chi tiết yêu cầu</label>
                    <textarea id="message" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-indigo-600 text-white font-bold py-2 px-8 rounded-lg hover:bg-indigo-700">
                        Gửi Yêu Cầu
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 