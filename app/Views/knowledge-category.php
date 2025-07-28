<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <!-- Breadcrumbs -->
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3 text-sm font-medium text-gray-500">
            <li>
                <a href="/knowledge" class="hover:text-indigo-600">Kiến thức</a>
            </li>
            <li>
                <div class="flex items-center">
                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                    <span class="ml-1 md:ml-2 text-gray-800"><?= $category_name ?? 'Hosting & VPS' ?></span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Category Header -->
    <div class="mb-8">
        <div class="flex items-center gap-4">
            <div class="bg-indigo-100 text-indigo-600 p-3 rounded-lg">
                <i data-lucide="server" class="w-8 h-8"></i>
            </div>
            <div>
                <h1 class="text-3xl font-bold text-gray-800"><?= $category_name ?? 'Hosting & VPS' ?></h1>
                <p class="text-gray-600 mt-1">Tất cả các bài viết hướng dẫn về quản lý, cài đặt và tối ưu hosting, máy chủ ảo.</p>
            </div>
        </div>
    </div>

    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Main Content -->
        <div class="lg:w-2/3">
            <!-- Filter/Sort Bar -->
            <div class="bg-white rounded-xl border shadow-sm p-4 mb-6 flex flex-col sm:flex-row justify-between items-center gap-3">
                <h2 class="text-lg font-semibold text-gray-800">Tất cả bài viết</h2>
                <div class="flex items-center gap-2">
                    <label for="sort" class="text-sm text-gray-600">Sắp xếp:</label>
                    <select id="sort" class="border-gray-300 rounded-md text-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option>Mới nhất</option>
                        <option>Phổ biến nhất</option>
                        <option>A-Z</option>
                    </select>
                </div>
            </div>

            <!-- Articles List -->
            <div class="bg-white rounded-xl border shadow-sm mb-6">
                <ul class="divide-y divide-gray-200">
                    <li class="hover:bg-gray-50">
                        <a href="#" class="block p-6">
                            <h3 class="font-semibold text-lg text-gray-800 hover:text-indigo-600">Hướng dẫn trỏ tên miền về Hosting và cài đặt WordPress trong 5 phút</h3>
                            <p class="text-sm text-gray-600 mt-2">Bài viết này sẽ hướng dẫn bạn chi tiết từng bước để trỏ tên miền đã đăng ký về gói hosting của bạn, sau đó tiến hành cài đặt website WordPress một cách nhanh chóng...</p>
                            <div class="flex items-center text-xs text-gray-500 mt-3 gap-4">
                                <span class="flex items-center gap-1">
                                    <i data-lucide="calendar" class="w-3 h-3"></i>
                                    <span>12/07/2025</span>
                                </span>
                                <span class="flex items-center gap-1">
                                    <i data-lucide="eye" class="w-3 h-3"></i>
                                    <span>1,240 lượt xem</span>
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="hover:bg-gray-50">
                        <a href="#" class="block p-6">
                            <h3 class="font-semibold text-lg text-gray-800 hover:text-indigo-600">Phân biệt giữa Hosting, VPS và Server vật lý: Khi nào nên dùng loại nào?</h3>
                            <p class="text-sm text-gray-600 mt-2">Hiểu rõ sự khác biệt giữa các loại dịch vụ lưu trữ sẽ giúp bạn đưa ra lựa chọn đúng đắn, tiết kiệm chi phí và đảm bảo hiệu năng cho website của mình...</p>
                            <div class="flex items-center text-xs text-gray-500 mt-3 gap-4">
                                <span class="flex items-center gap-1">
                                    <i data-lucide="calendar" class="w-3 h-3"></i>
                                    <span>10/07/2025</span>
                                </span>
                                <span class="flex items-center gap-1">
                                    <i data-lucide="eye" class="w-3 h-3"></i>
                                    <span>1,850 lượt xem</span>
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="hover:bg-gray-50">
                        <a href="#" class="block p-6">
                            <h3 class="font-semibold text-lg text-gray-800 hover:text-indigo-600">Làm thế nào để cài đặt chứng chỉ SSL miễn phí cho website trên Hosting?</h3>
                            <p class="text-sm text-gray-600 mt-2">Bảo mật website với HTTPS là yêu cầu bắt buộc. Hướng dẫn này chỉ bạn cách kích hoạt SSL miễn phí Let's Encrypt có sẵn trên cPanel của hosting...</p>
                            <div class="flex items-center text-xs text-gray-500 mt-3 gap-4">
                                <span class="flex items-center gap-1">
                                    <i data-lucide="calendar" class="w-3 h-3"></i>
                                    <span>08/07/2025</span>
                                </span>
                                <span class="flex items-center gap-1">
                                    <i data-lucide="eye" class="w-3 h-3"></i>
                                    <span>2,310 lượt xem</span>
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="hover:bg-gray-50">
                        <a href="#" class="block p-6">
                            <h3 class="font-semibold text-lg text-gray-800 hover:text-indigo-600">Hướng dẫn sử dụng File Manager trong cPanel để quản lý tệp tin</h3>
                            <p class="text-sm text-gray-600 mt-2">Tìm hiểu cách upload, download, chỉnh sửa và nén/giải nén file trực tiếp trên hosting của bạn mà không cần dùng đến FTP...</p>
                            <div class="flex items-center text-xs text-gray-500 mt-3 gap-4">
                                <span class="flex items-center gap-1">
                                    <i data-lucide="calendar" class="w-3 h-3"></i>
                                    <span>05/07/2025</span>
                                </span>
                                <span class="flex items-center gap-1">
                                    <i data-lucide="eye" class="w-3 h-3"></i>
                                    <span>1,760 lượt xem</span>
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="hover:bg-gray-50">
                        <a href="#" class="block p-6">
                            <h3 class="font-semibold text-lg text-gray-800 hover:text-indigo-600">5 cách tăng tốc độ website trên shared hosting</h3>
                            <p class="text-sm text-gray-600 mt-2">Tối ưu hóa hiệu suất website trên hosting chia sẻ với các kỹ thuật tiên tiến như caching, CDN, nén file và tối ưu database...</p>
                            <div class="flex items-center text-xs text-gray-500 mt-3 gap-4">
                                <span class="flex items-center gap-1">
                                    <i data-lucide="calendar" class="w-3 h-3"></i>
                                    <span>01/07/2025</span>
                                </span>
                                <span class="flex items-center gap-1">
                                    <i data-lucide="eye" class="w-3 h-3"></i>
                                    <span>2,430 lượt xem</span>
                                </span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Pagination -->
            <div class="mt-8 flex justify-center">
                <nav class="flex rounded-md shadow-sm">
                    <a href="#" class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50">Trước</a>
                    <a href="#" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-indigo-600">1</a>
                    <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border-t border-b border-gray-300 hover:bg-gray-50">2</a>
                    <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50">Sau</a>
                </nav>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:w-1/3">
            <!-- Related Categories -->
            <div class="bg-white rounded-xl border shadow-sm p-6 mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Danh mục liên quan</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="flex items-center gap-2 text-indigo-600 hover:underline">
                            <i data-lucide="server" class="w-4 h-4"></i>
                            <span>Hosting & VPS</span>
                            <span class="text-xs text-gray-500 ml-auto">(24)</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 text-gray-700 hover:text-indigo-600">
                            <i data-lucide="globe" class="w-4 h-4"></i>
                            <span>Tên miền</span>
                            <span class="text-xs text-gray-500 ml-auto">(18)</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 text-gray-700 hover:text-indigo-600">
                            <i data-lucide="shield" class="w-4 h-4"></i>
                            <span>Bảo mật website</span>
                            <span class="text-xs text-gray-500 ml-auto">(15)</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 text-gray-700 hover:text-indigo-600">
                            <i data-lucide="mail" class="w-4 h-4"></i>
                            <span>Email</span>
                            <span class="text-xs text-gray-500 ml-auto">(12)</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Featured Articles -->
            <div class="bg-white rounded-xl border shadow-sm p-6 mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Bài viết nổi bật</h3>
                <ul class="space-y-4">
                    <li>
                        <a href="#" class="flex gap-3 hover:bg-gray-50 p-2 rounded-lg">
                            <div class="flex-shrink-0 bg-blue-100 rounded-lg w-16 h-16 flex items-center justify-center">
                                <i data-lucide="file-text" class="w-8 h-8 text-blue-600"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-800 hover:text-indigo-600 text-sm">Hướng dẫn backup và restore website trên cPanel</h4>
                                <p class="text-xs text-gray-500 mt-1">2,850 lượt xem</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex gap-3 hover:bg-gray-50 p-2 rounded-lg">
                            <div class="flex-shrink-0 bg-green-100 rounded-lg w-16 h-16 flex items-center justify-center">
                                <i data-lucide="file-text" class="w-8 h-8 text-green-600"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-800 hover:text-indigo-600 text-sm">Tối ưu hiệu suất PHP và MySQL trên hosting</h4>
                                <p class="text-xs text-gray-500 mt-1">2,680 lượt xem</p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Tags -->
            <div class="bg-white rounded-xl border shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Thẻ phổ biến</h3>
                <div class="flex flex-wrap gap-2">
                    <a href="#" class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full hover:bg-gray-200">WordPress</a>
                    <a href="#" class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full hover:bg-gray-200">cPanel</a>
                    <a href="#" class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full hover:bg-gray-200">SSL</a>
                    <a href="#" class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full hover:bg-gray-200">Tên miền</a>
                    <a href="#" class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full hover:bg-gray-200">Linux</a>
                    <a href="#" class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full hover:bg-gray-200">Database</a>
                    <a href="#" class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full hover:bg-gray-200">PHP</a>
                    <a href="#" class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full hover:bg-gray-200">Bảo mật</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 