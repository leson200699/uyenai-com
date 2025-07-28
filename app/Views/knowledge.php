<?php helper('text'); ?>
<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <!-- Header Section -->
    <div class="bg-white rounded-xl shadow-sm mb-8">
        <div class="p-8 text-center">
            <h1 class="text-3xl font-bold text-gray-800">Kiến Thức & Hướng Dẫn</h1>
            <p class="text-gray-600 mt-2">Kho tài nguyên hướng dẫn chi tiết và kiến thức chuyên sâu</p>
            <div class="mt-6 max-w-2xl mx-auto">
                <form method="get" action="/knowledge" class="relative">
                    <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 w-6 h-6 text-gray-400"></i>
                    <input type="text" name="search" value="<?= esc($search) ?>" placeholder="Tìm kiếm hướng dẫn (ví dụ: trỏ tên miền, cài đặt SSL...)" class="w-full pl-14 pr-4 py-4 text-lg border-2 border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <?php if (!empty($currentCategory)): ?>
                        <input type="hidden" name="category" value="<?= esc($currentCategory) ?>">
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

    <!-- Categories Section -->
    <div class="mb-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Duyệt theo danh mục</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <a href="/knowledge" class="bg-white p-6 rounded-xl border flex items-start gap-4 category-card transition-all hover:shadow-lg hover:-translate-y-1<?= empty($currentCategory) ? ' border-indigo-500' : '' ?>">
                <div class="bg-indigo-100 text-indigo-600 p-3 rounded-lg">
                    <i data-lucide="list" class="w-6 h-6"></i>
                </div>
                <div>
                    <h3 class="font-bold text-lg">Tất cả</h3>
                    <p class="text-sm text-gray-600 mt-1">Tất cả chủ đề kiến thức</p>
                </div>
            </a>
            <?php foreach ($categories as $cat): ?>
            <a href="/knowledge?category=<?= $cat['id'] ?>" class="bg-white p-6 rounded-xl border flex items-start gap-4 category-card transition-all hover:shadow-lg hover:-translate-y-1<?= ($currentCategory == $cat['id']) ? ' border-indigo-500' : '' ?>">
                <div class="bg-indigo-100 text-indigo-600 p-3 rounded-lg">
                    <i data-lucide="folder" class="w-6 h-6"></i>
                </div>
                <div>
                    <h3 class="font-bold text-lg"><?= esc($cat['name']) ?></h3>
                    <p class="text-sm text-gray-600 mt-1"><?= esc($cat['description']) ?></p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Featured Article -->
    <?php if (!empty($featuredProduct)): ?>
    <div class="mb-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Bài viết nổi bật</h2>
        <div class="bg-white rounded-xl overflow-hidden border shadow-sm flex flex-col md:flex-row">
            <img src="<?= esc($featuredProduct['image'] ?? 'https://placehold.co/600x400/e0e7ff/4338ca') ?>" alt="Article thumbnail" class="w-full md:w-1/3 h-64 object-cover">
            <div class="p-6 flex flex-col flex-grow">
                <div class="flex items-center mb-2">
                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">
                        <?php
                        $catName = '';
                        foreach ($categories as $cat) {
                            if ($cat['id'] == $featuredProduct['category_id']) {
                                $catName = $cat['name'];
                                break;
                            }
                        }
                        echo esc($catName);
                        ?>
                    </span>
                    <span class="text-gray-500 text-xs ml-auto"><?= date('d/m/Y', strtotime($featuredProduct['created_at'])) ?></span>
                </div>
                <h3 class="font-bold text-2xl mb-2"><a href="/knowledge/<?= $featuredProduct['id'] ?>" class="hover:text-indigo-700"><?= esc($featuredProduct['title']) ?></a></h3>
                <p class="text-gray-600 text-base mb-4"><?= esc(word_limiter(strip_tags($featuredProduct['content']), 40)) ?></p>
                <a href="/knowledge/<?= $featuredProduct['id'] ?>" class="text-indigo-600 font-medium hover:underline">Đọc tiếp →</a>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Latest Articles -->
    <div class="mb-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Bài viết mới nhất</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $item): ?>
                <div class="bg-white rounded-xl overflow-hidden border shadow-sm flex flex-col">
                    <img src="<?= esc($item['image'] ?? 'https://placehold.co/600x400/e0e7ff/4338ca') ?>" alt="Article thumbnail" class="w-full h-48 object-cover">
                    <div class="p-4 flex flex-col flex-grow">
                        <div class="flex items-center mb-2">
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">
                                <?php
                                $catName = '';
                                foreach ($categories as $cat) {
                                    if ($cat['id'] == $item['category_id']) {
                                        $catName = $cat['name'];
                                        break;
                                    }
                                }
                                echo esc($catName);
                                ?>
                            </span>
                            <span class="text-gray-500 text-xs ml-auto"><?= date('d/m/Y', strtotime($item['created_at'])) ?></span>
                        </div>
                        <h3 class="font-bold text-lg mb-2"><a href="/knowledge/<?= $item['id'] ?>" class="hover:text-indigo-700"><?= esc($item['title']) ?></a></h3>
                        <p class="text-gray-600 text-sm mb-4"><?= esc(word_limiter(strip_tags($item['content']), 30)) ?></p>
                        <a href="/knowledge/<?= $item['id'] ?>" class="text-indigo-600 font-medium hover:underline">Đọc tiếp →</a>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-3 text-center text-gray-500">Chưa có bài viết nào.</div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Pagination -->
    <?php if (isset($pager)): ?>
    <div class="mb-8 flex justify-center">
        <nav class="flex rounded-md shadow-sm">
            <?= $pager->links('default', 'tailwind_full') ?>
        </nav>
    </div>
    <?php endif; ?>

    <!-- Newsletter Section -->
    <div class="bg-indigo-600 rounded-xl p-8 text-center text-white mb-12">
        <h2 class="text-2xl font-bold mb-4">Đăng ký nhận bài viết mới</h2>
        <p class="mb-6 max-w-xl mx-auto">Nhận thông báo khi chúng tôi xuất bản các hướng dẫn mới và cập nhật về công nghệ mới nhất</p>
        <form class="max-w-md mx-auto">
            <div class="flex flex-col sm:flex-row gap-2">
                <input type="email" placeholder="Email của bạn" class="flex-1 px-4 py-3 rounded-lg focus:outline-none text-gray-800">
                <button type="submit" class="px-6 py-3 bg-white text-indigo-600 font-semibold rounded-lg hover:bg-gray-100">Đăng ký</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>

<style>
.category-card {
    transition: transform 0.2s, box-shadow 0.2s;
}
</style> 