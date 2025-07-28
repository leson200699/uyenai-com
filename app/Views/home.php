<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Trang Chủ<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="mb-8">
    <!-- Hero Section -->
    <div class="bg-indigo-600 rounded-xl shadow-md overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20">
            <div class="md:flex md:items-center">
                <div class="md:w-1/2">
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white leading-tight">Sản Phẩm AI & Marketing</h1>
                    <p class="mt-4 text-lg text-indigo-100 max-w-xl">Chúng tôi cung cấp các tài khoản AI chính hãng và sản phẩm marketing chất lượng cao giúp bạn và doanh nghiệp phát triển.</p>
                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="<?= site_url('products') ?>" class="px-6 py-3 bg-white text-indigo-600 font-medium rounded-lg hover:bg-gray-100 transition-all">Mua Ngay</a>
                        <a href="<?= site_url('contact') ?>" class="px-6 py-3 bg-indigo-700 text-white font-medium rounded-lg hover:bg-indigo-800 transition-all">Liên Hệ</a>
                    </div>
                </div>
                <div class="mt-8 md:mt-0 md:w-1/2 flex justify-center">
                    <img src="https://placehold.co/600x400/4f46e5/ffffff?text=AI+Accounts" class="w-full max-w-md rounded-lg shadow-lg" alt="AI Accounts Illustration">
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Products -->
    <div class="mt-12">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Sản Phẩm Nổi Bật</h2>
            <a href="<?= site_url('products') ?>" class="text-indigo-600 font-medium hover:text-indigo-800">Xem tất cả</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php foreach ($featuredProducts as $product): ?>
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm flex flex-col">
                    <div class="h-40 bg-gray-100 flex items-center justify-center rounded-t-xl">
                        <?php if (!empty($product['image'])): ?>
                            <?php if (strpos($product['image'], 'http') === 0): ?>
                                <img src="<?= $product['image'] ?>" class="h-32 w-auto rounded-lg" alt="<?= $product['name'] ?>">
                            <?php elseif (file_exists(ROOTPATH . 'public/uploads/products/' . $product['image'])): ?>
                                <img src="<?= base_url('uploads/products/' . $product['image']) ?>" class="h-32 w-auto rounded-lg" alt="<?= $product['name'] ?>">
                            <?php else: ?>
                                <img src="https://placehold.co/120x120/111827/<?= str_replace('#', '', substr(md5($product['name']), 0, 6)) ?>?text=<?= substr($product['name'], 0, 3) ?>" class="rounded-lg" alt="<?= $product['name'] ?>">
                            <?php endif; ?>
                        <?php else: ?>
                            <img src="https://placehold.co/120x120/111827/<?= str_replace('#', '', substr(md5($product['name']), 0, 6)) ?>?text=<?= substr($product['name'], 0, 3) ?>" class="rounded-lg" alt="<?= $product['name'] ?>">
                        <?php endif; ?>
                    </div>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="font-bold text-lg text-gray-900"><?= $product['name'] ?></h3>
                        <p class="text-sm text-gray-600 mt-1 flex-grow">
                            <?= substr($product['description'], 0, 80) . (strlen($product['description']) > 80 ? '...' : '') ?>
                        </p>
                        <div class="mt-4">
                            <p class="text-sm text-gray-500">Giá bán</p>
                            <p class="text-2xl font-bold text-indigo-600"><?= number_format($product['price']) ?>đ</p>
                        </div>
                        
                        <div class="mt-4 flex gap-2">
                            <a href="<?= site_url('products/view/' . $product['id']) ?>" class="flex-1 px-4 py-2 font-medium text-indigo-600 border border-indigo-600 rounded-lg hover:bg-indigo-50 transition-all text-center">
                                Chi tiết
                            </a>
                            <form action="<?= site_url('cart/add') ?>" method="POST" class="flex-1">
                                <?= csrf_field() ?>
                                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="w-full px-4 py-2 font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition-all">
                                    Mua Ngay
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php if (empty($featuredProducts)): ?>
                <div class="col-span-full text-center py-8">
                    <p class="text-gray-500">Không có sản phẩm nào.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Featured Services -->
    <div class="mt-16">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Dịch Vụ Nổi Bật</h2>
            <a href="<?= site_url('services') ?>" class="text-blue-600 font-medium hover:text-blue-800">Xem tất cả</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php foreach ($featuredServices as $service): ?>
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm flex flex-col">
                    <div class="h-40 bg-blue-50 flex items-center justify-center rounded-t-xl">
                        <?php if (!empty($service['image'])): ?>
                            <?php if (strpos($service['image'], 'http') === 0): ?>
                                <img src="<?= $service['image'] ?>" class="h-32 w-auto rounded-lg" alt="<?= $service['name'] ?>">
                            <?php elseif (file_exists(ROOTPATH . 'public/uploads/services/' . $service['image'])): ?>
                                <img src="<?= base_url('uploads/services/' . $service['image']) ?>" class="h-32 w-auto rounded-lg" alt="<?= $service['name'] ?>">
                            <?php else: ?>
                                <img src="https://placehold.co/120x120/0284c7/ffffff?text=<?= substr($service['name'], 0, 3) ?>" class="rounded-lg" alt="<?= $service['name'] ?>">
                            <?php endif; ?>
                        <?php else: ?>
                            <img src="https://placehold.co/120x120/0284c7/ffffff?text=<?= substr($service['name'], 0, 3) ?>" class="rounded-lg" alt="<?= $service['name'] ?>">
                        <?php endif; ?>
                    </div>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="font-bold text-lg text-gray-900"><?= $service['name'] ?></h3>
                        <p class="text-sm text-gray-600 mt-1 flex-grow">
                            <?= substr($service['description'], 0, 80) . (strlen($service['description']) > 80 ? '...' : '') ?>
                        </p>
                        <div class="mt-4">
                            <p class="text-sm text-gray-500">Giá từ</p>
                            <p class="text-2xl font-bold text-blue-600"><?= number_format($service['price']) ?>đ</p>
                            <p class="text-sm text-gray-500 mt-1">
                                <?php 
                                $duration = '';
                                switch($service['duration']) {
                                    case 'month': $duration = 'tháng'; break;
                                    case 'year': $duration = 'năm'; break;
                                    case 'onetime': $duration = 'một lần'; break;
                                    default: $duration = $service['duration'];
                                }
                                ?>
                                / <?= $duration ?>
                            </p>
                        </div>
                        
                        <div class="mt-4 flex gap-2">
                            <a href="<?= site_url('services/' . $service['id']) ?>" class="flex-1 px-4 py-2 font-medium text-blue-600 border border-blue-600 rounded-lg hover:bg-blue-50 transition-all text-center">
                                Chi tiết
                            </a>
                            <a href="<?= site_url('services/' . $service['id']) ?>" class="flex-1 px-4 py-2 font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-all text-center">
                                Đăng ký
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php if (empty($featuredServices)): ?>
                <div class="col-span-full text-center py-8">
                    <p class="text-gray-500">Không có dịch vụ nào.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Categories Section -->
    <div class="mt-16">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Danh Mục Sản Phẩm</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($categories as $category): ?>
                <?php
                // Xác định icon phù hợp dựa trên tên danh mục
                $icon = 'tag'; // Icon mặc định
                $iconColor = 'text-indigo-600'; // Màu mặc định
                $bgColor = 'bg-indigo-100'; // Màu nền mặc định
                
                // Xác định icon và màu dựa trên tên danh mục (không phân biệt hoa thường)
                $categoryName = strtolower($category['name']);
                
                if (strpos($categoryName, 'ai') !== false || strpos($categoryName, 'chatgpt') !== false) {
                    $icon = 'sparkles';
                    $iconColor = 'text-indigo-600';
                    $bgColor = 'bg-indigo-100';
                } elseif (strpos($categoryName, 'account') !== false || strpos($categoryName, 'tài khoản') !== false) {
                    $icon = 'key';
                    $iconColor = 'text-amber-600';
                    $bgColor = 'bg-amber-100';
                } elseif (strpos($categoryName, 'social') !== false || strpos($categoryName, 'xã hội') !== false || strpos($categoryName, 'facebook') !== false) {
                    $icon = 'users';
                    $iconColor = 'text-blue-600';
                    $bgColor = 'bg-blue-100';
                } elseif (strpos($categoryName, 'course') !== false || strpos($categoryName, 'khóa học') !== false) {
                    $icon = 'book-open';
                    $iconColor = 'text-emerald-600';
                    $bgColor = 'bg-emerald-100';
                } elseif (strpos($categoryName, 'marketing') !== false) {
                    $icon = 'megaphone';
                    $iconColor = 'text-rose-600';
                    $bgColor = 'bg-rose-100';
                } elseif (strpos($categoryName, 'domain') !== false || strpos($categoryName, 'hosting') !== false) {
                    $icon = 'globe';
                    $iconColor = 'text-cyan-600';
                    $bgColor = 'bg-cyan-100';
                } elseif (strpos($categoryName, 'website') !== false || strpos($categoryName, 'theme') !== false) {
                    $icon = 'layout';
                    $iconColor = 'text-violet-600';
                    $bgColor = 'bg-violet-100';
                } elseif (strpos($categoryName, 'tool') !== false || strpos($categoryName, 'công cụ') !== false) {
                    $icon = 'tool';
                    $iconColor = 'text-green-600';
                    $bgColor = 'bg-green-100';
                } elseif (strpos($categoryName, 'content') !== false || strpos($categoryName, 'nội dung') !== false) {
                    $icon = 'file-text';
                    $iconColor = 'text-blue-600';
                    $bgColor = 'bg-blue-100';
                } elseif (strpos($categoryName, 'academy') !== false || strpos($categoryName, 'học viện') !== false) {
                    $icon = 'graduation-cap';
                    $iconColor = 'text-orange-600';
                    $bgColor = 'bg-orange-100';
                } elseif (strpos($categoryName, 'audio') !== false || strpos($categoryName, 'sách nói') !== false) {
                    $icon = 'headphones';
                    $iconColor = 'text-purple-600';
                    $bgColor = 'bg-purple-100';
                } elseif (strpos($categoryName, 'design') !== false || strpos($categoryName, 'thiết kế') !== false) {
                    $icon = 'pencil-ruler';
                    $iconColor = 'text-pink-600';
                    $bgColor = 'bg-pink-100';
                } elseif (strpos($categoryName, 'email') !== false) {
                    $icon = 'mail';
                    $iconColor = 'text-red-600';
                    $bgColor = 'bg-red-100';
                } elseif (strpos($categoryName, 'vps') !== false || strpos($categoryName, 'server') !== false) {
                    $icon = 'server';
                    $iconColor = 'text-slate-600';
                    $bgColor = 'bg-slate-100';
                } elseif (strpos($categoryName, 'mobile') !== false || strpos($categoryName, 'app') !== false) {
                    $icon = 'smartphone';
                    $iconColor = 'text-teal-600';
                    $bgColor = 'bg-teal-100';
                }
                
                // Hoặc xác định theo ID nếu không tìm thấy theo tên
                switch($category['id']) {
                    case 1: 
                        if ($icon === 'tag') { 
                            $icon = 'key'; 
                            $iconColor = 'text-amber-600'; 
                            $bgColor = 'bg-amber-100'; 
                        }
                        break;
                    case 2: 
                        if ($icon === 'tag') { 
                            $icon = 'users'; 
                            $iconColor = 'text-blue-600'; 
                            $bgColor = 'bg-blue-100'; 
                        }
                        break;
                    case 3: 
                        if ($icon === 'tag') { 
                            $icon = 'book-open'; 
                            $iconColor = 'text-emerald-600'; 
                            $bgColor = 'bg-emerald-100'; 
                        }
                        break;
                    case 4: 
                        if ($icon === 'tag') { 
                            $icon = 'briefcase'; 
                            $iconColor = 'text-violet-600'; 
                            $bgColor = 'bg-violet-100'; 
                        }
                        break;
                    case 5: 
                        if ($icon === 'tag') { 
                            $icon = 'zap'; 
                            $iconColor = 'text-yellow-600'; 
                            $bgColor = 'bg-yellow-100'; 
                        }
                        break;
                    case 6: 
                        if ($icon === 'tag') { 
                            $icon = 'star'; 
                            $iconColor = 'text-orange-600'; 
                            $bgColor = 'bg-orange-100'; 
                        }
                        break;
                    case 7: 
                        if ($icon === 'tag') { 
                            $icon = 'award'; 
                            $iconColor = 'text-red-600'; 
                            $bgColor = 'bg-red-100'; 
                        }
                        break;
                    case 8: 
                        if ($icon === 'tag') { 
                            $icon = 'trending-up'; 
                            $iconColor = 'text-green-600'; 
                            $bgColor = 'bg-green-100'; 
                        }
                        break;
                    case 9: 
                        if ($icon === 'tag') { 
                            $icon = 'globe'; 
                            $iconColor = 'text-cyan-600'; 
                            $bgColor = 'bg-cyan-100'; 
                        }
                        break;
                    case 10: 
                        if ($icon === 'tag') { 
                            $icon = 'layout'; 
                            $iconColor = 'text-purple-600'; 
                            $bgColor = 'bg-purple-100'; 
                        }
                        break;
                    case 11: 
                        if ($icon === 'tag') { 
                            $icon = 'bar-chart'; 
                            $iconColor = 'text-pink-600'; 
                            $bgColor = 'bg-pink-100'; 
                        }
                        break;
                    case 12: 
                        if ($icon === 'tag') { 
                            $icon = 'file-text'; 
                            $iconColor = 'text-blue-600'; 
                            $bgColor = 'bg-blue-100'; 
                        }
                        break;
                }
                ?>
                <a href="<?= site_url('products/category/' . $category['id']) ?>" class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-md transition-all">
                    <div class="flex items-center">
                        <div class="w-12 h-12 <?= $bgColor ?> rounded-lg flex items-center justify-center mr-4">
                            <i data-lucide="<?= $icon ?>" class="<?= $iconColor ?> w-6 h-6"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg text-gray-900"><?= $category['name'] ?></h3>
                            <p class="text-sm text-gray-600"><?= substr($category['description'], 0, 50) . (strlen($category['description']) > 50 ? '...' : '') ?></p>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>

            <?php if (empty($categories)): ?>
                <div class="col-span-full text-center py-8">
                    <p class="text-gray-500">Không có danh mục nào.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Why Choose Us -->
    <div class="mt-16 bg-white rounded-xl border border-gray-200 p-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">Tại Sao Chọn Chúng Tôi?</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="shield-check" class="text-indigo-600 w-8 h-8"></i>
                </div>
                <h3 class="font-semibold text-lg text-gray-900">Đảm Bảo Chất Lượng</h3>
                <p class="text-gray-600 mt-2">Chúng tôi cam kết cung cấp tài khoản chất lượng, chính hãng và có bảo hành.</p>
            </div>

            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="wallet" class="text-indigo-600 w-8 h-8"></i>
                </div>
                <h3 class="font-semibold text-lg text-gray-900">Giá Cả Hợp Lý</h3>
                <p class="text-gray-600 mt-2">Chúng tôi cung cấp sản phẩm với giá tốt nhất trên thị trường.</p>
            </div>

            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="headphones" class="text-indigo-600 w-8 h-8"></i>
                </div>
                <h3 class="font-semibold text-lg text-gray-900">Hỗ Trợ 24/7</h3>
                <p class="text-gray-600 mt-2">Đội ngũ hỗ trợ chuyên nghiệp luôn sẵn sàng giúp đỡ bạn mọi lúc.</p>
            </div>

            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="zap" class="text-indigo-600 w-8 h-8"></i>
                </div>
                <h3 class="font-semibold text-lg text-gray-900">Giao Hàng Nhanh Chóng</h3>
                <p class="text-gray-600 mt-2">Thông tin tài khoản được gửi ngay sau khi thanh toán thành công.</p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 