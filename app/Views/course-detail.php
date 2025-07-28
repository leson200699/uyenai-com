<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <!-- Course Header -->
    <div class="bg-white rounded-xl shadow-sm border mb-6 p-6">
        <div class="flex flex-col lg:flex-row gap-6">
            <div class="lg:w-1/3">
                <div class="aspect-video bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center">
                    <div class="text-center text-white">
                        <i data-lucide="play-circle" class="w-16 h-16 mx-auto mb-2"></i>
                        <p class="text-sm">Video Preview</p>
                    </div>
                </div>
            </div>
            <div class="lg:w-2/3">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">Ứng dụng AI vào Marketing và Sáng tạo nội dung</h1>
                <p class="text-gray-600 mb-4">Khám phá cách sử dụng AI để tối ưu hóa chiến dịch marketing và tạo ra nội dung chất lượng cao một cách hiệu quả.</p>
                
                <div class="flex flex-wrap gap-4 mb-6">
                    <div class="flex items-center gap-2">
                        <i data-lucide="user" class="w-5 h-5 text-gray-500"></i>
                        <span class="text-sm text-gray-600">Giảng viên: Nguyễn An</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i data-lucide="clock" class="w-5 h-5 text-gray-500"></i>
                        <span class="text-sm text-gray-600">Thời lượng: 8 giờ</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i data-lucide="book-open" class="w-5 h-5 text-gray-500"></i>
                        <span class="text-sm text-gray-600">12 bài học</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i data-lucide="users" class="w-5 h-5 text-gray-500"></i>
                        <span class="text-sm text-gray-600">1,250 học viên</span>
                    </div>
                </div>
                
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-1">
                        <i data-lucide="star" class="w-5 h-5 text-yellow-500 fill-current"></i>
                        <i data-lucide="star" class="w-5 h-5 text-yellow-500 fill-current"></i>
                        <i data-lucide="star" class="w-5 h-5 text-yellow-500 fill-current"></i>
                        <i data-lucide="star" class="w-5 h-5 text-yellow-500 fill-current"></i>
                        <i data-lucide="star" class="w-5 h-5 text-yellow-500 fill-current"></i>
                        <span class="text-sm text-gray-600 ml-2">4.8 (156 đánh giá)</span>
                    </div>
                    <span class="px-3 py-1 bg-green-100 text-green-800 text-sm font-medium rounded-full">Bestseller</span>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <!-- Current Lesson -->
            <div class="bg-white rounded-xl shadow-sm border mb-6">
                <div class="aspect-video bg-black rounded-t-xl flex items-center justify-center">
                    <div class="text-center text-white">
                        <i data-lucide="play-circle" class="w-16 h-16 mx-auto mb-2"></i>
                        <p class="text-sm">Video Player</p>
                    </div>
                </div>
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Bài 1: Giới thiệu về AI và tiềm năng trong Marketing</h2>
                    <p class="text-gray-600 mb-4">Giảng viên: Nguyễn An</p>
                    
                    <div class="prose max-w-none">
                        <p class="text-gray-700 leading-relaxed mb-4">
                            Chào mừng bạn đến với khoá học "Ứng dụng AI vào Marketing và Sáng tạo nội dung". Trong bài học đầu tiên này, chúng ta sẽ cùng nhau tìm hiểu những khái niệm cơ bản nhất về Trí tuệ nhân tạo (AI), lịch sử phát triển và quan trọng hơn cả là những tiềm năng to lớn mà AI có thể mang lại cho lĩnh vực Marketing.
                        </p>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            Chúng ta sẽ khám phá cách AI đang thay đổi cách chúng ta tiếp cận khách hàng, cá nhân hóa trải nghiệm và tối ưu hóa chiến dịch. Bạn sẽ hiểu được tại sao AI không chỉ là xu hướng mà còn là công cụ thiết yếu cho bất kỳ marketer nào muốn thành công trong thời đại số.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Course Description -->
            <div class="bg-white rounded-xl shadow-sm border mb-6">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Mô tả khoá học</h3>
                    <div class="prose max-w-none text-gray-700">
                        <p class="mb-4">
                            Khoá học này sẽ giúp bạn nắm vững các công cụ AI hiện đại nhất và cách áp dụng chúng vào thực tế marketing. Từ việc tạo nội dung tự động đến phân tích dữ liệu khách hàng, bạn sẽ học được cách tối ưu hóa mọi khía cạnh của chiến dịch marketing.
                        </p>
                        <h4 class="font-semibold text-gray-800 mb-2">Bạn sẽ học được:</h4>
                        <ul class="list-disc list-inside space-y-1 mb-4">
                            <li>Cách sử dụng ChatGPT để viết nội dung marketing hiệu quả</li>
                            <li>Tạo hình ảnh quảng cáo với Midjourney và DALL-E</li>
                            <li>Phân tích dữ liệu khách hàng với AI</li>
                            <li>Tự động hóa chiến dịch marketing</li>
                            <li>Tối ưu hóa SEO với các công cụ AI</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Instructor -->
            <div class="bg-white rounded-xl shadow-sm border">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Về giảng viên</h3>
                    <div class="flex items-start gap-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-lg">NA</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Nguyễn An</h4>
                            <p class="text-gray-600 text-sm mb-2">Chuyên gia Marketing & AI</p>
                            <p class="text-gray-700 text-sm">
                                Với hơn 8 năm kinh nghiệm trong lĩnh vực Digital Marketing và 3 năm chuyên sâu về AI, 
                                Nguyễn An đã giúp hơn 500+ doanh nghiệp tối ưu hóa chiến dịch marketing với công nghệ AI.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- Course Progress -->
            <div class="bg-white rounded-xl shadow-sm border mb-6">
                <div class="p-4 border-b">
                    <h3 class="font-semibold text-gray-800">Tiến độ học tập</h3>
                    <div class="mt-3 w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-indigo-600 h-2 rounded-full" style="width: 45%"></div>
                    </div>
                    <p class="text-sm text-gray-600 mt-2">Hoàn thành 45% (3/12 bài học)</p>
                </div>
                
                <!-- Course Content -->
                <div class="p-4">
                    <h4 class="font-semibold text-gray-800 mb-3">Nội dung khoá học</h4>
                    <div class="space-y-4">
                        <!-- Chapter 1 -->
                        <div>
                            <h5 class="font-medium text-sm text-gray-700 mb-2">Chương 1: Nhập môn AI Marketing</h5>
                            <ul class="space-y-1">
                                <li>
                                    <a href="#" class="flex items-start gap-3 p-2 rounded-lg bg-indigo-50 text-indigo-700">
                                        <i data-lucide="play-circle" class="w-4 h-4 mt-0.5 flex-shrink-0"></i>
                                        <span class="flex-grow text-sm">Bài 1: Giới thiệu về AI và tiềm năng</span>
                                        <span class="text-xs text-indigo-600 flex-shrink-0">10:32</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-start gap-3 p-2 rounded-lg hover:bg-gray-50">
                                        <i data-lucide="circle" class="w-4 h-4 mt-0.5 flex-shrink-0 text-gray-400"></i>
                                        <span class="flex-grow text-sm">Bài 2: Các công cụ AI phổ biến</span>
                                        <span class="text-xs text-gray-500 flex-shrink-0">15:10</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        
                        <!-- Chapter 2 -->
                        <div>
                            <h5 class="font-medium text-sm text-gray-700 mb-2">Chương 2: Sáng tạo nội dung với AI</h5>
                            <ul class="space-y-1">
                                <li>
                                    <a href="#" class="flex items-start gap-3 p-2 rounded-lg hover:bg-gray-50">
                                        <i data-lucide="lock" class="w-4 h-4 mt-0.5 flex-shrink-0 text-gray-400"></i>
                                        <span class="flex-grow text-sm">Bài 3: Viết bài bán hàng với ChatGPT</span>
                                        <span class="text-xs text-gray-500 flex-shrink-0">22:05</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-start gap-3 p-2 rounded-lg hover:bg-gray-50">
                                        <i data-lucide="lock" class="w-4 h-4 mt-0.5 flex-shrink-0 text-gray-400"></i>
                                        <span class="flex-grow text-sm">Bài 4: Tạo ảnh quảng cáo với Midjourney</span>
                                        <span class="text-xs text-gray-500 flex-shrink-0">18:45</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Course Actions -->
            <div class="bg-white rounded-xl shadow-sm border mb-6">
                <div class="p-4">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-2xl font-bold text-gray-800">2.500.000đ</span>
                        <span class="text-sm text-gray-500 line-through">3.200.000đ</span>
                    </div>
                    <button class="w-full bg-indigo-600 text-white font-semibold py-3 px-4 rounded-lg hover:bg-indigo-700 mb-3">
                        Tiếp tục học
                    </button>
                    <button class="w-full border border-gray-300 text-gray-700 font-medium py-3 px-4 rounded-lg hover:bg-gray-50">
                        <i data-lucide="star" class="w-4 h-4 inline mr-2"></i>
                        Đánh giá khoá học
                    </button>
                </div>
            </div>

            <!-- Related Courses -->
            <div class="bg-white rounded-xl shadow-sm border">
                <div class="p-4">
                    <h4 class="font-semibold text-gray-800 mb-3">Khoá học liên quan</h4>
                    <div class="space-y-3">
                        <div class="flex gap-3">
                            <div class="w-16 h-12 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-lg flex-shrink-0"></div>
                            <div>
                                <h5 class="font-medium text-sm text-gray-800">SEO Mastery với AI</h5>
                                <p class="text-xs text-gray-500">1.800.000đ</p>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <div class="w-16 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex-shrink-0"></div>
                            <div>
                                <h5 class="font-medium text-sm text-gray-800">Content Marketing Pro</h5>
                                <p class="text-xs text-gray-500">2.200.000đ</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 