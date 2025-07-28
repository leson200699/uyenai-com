<?php helper('text'); ?>
<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Blog & Tin Tức</h1>

    <!-- Featured Post -->
    <?php if (!empty($featuredNews)): ?>
    <div class="mb-12">
        <a href="/news/<?= $featuredNews['id'] ?>" class="block group">
            <div class="relative bg-gray-800 rounded-xl overflow-hidden">
                <?php if (!empty($featuredNews['image'])): ?>
                    <img src="<?= esc($featuredNews['image']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" alt="<?= esc($featuredNews['title']) ?>">
                <?php else: ?>
                    <img src="https://placehold.co/1200x600/1f2937/ffffff?text=Tin+Tức" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" alt="Featured post image">
                <?php endif; ?>
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-6 sm:p-8 text-white">
                    <span class="text-sm font-semibold bg-indigo-600 px-3 py-1 rounded-full">
                        <?= esc($categories[array_search($featuredNews['category_id'], array_column($categories, 'id'))]['name'] ?? 'Tin tức') ?>
                    </span>
                    <h2 class="text-2xl sm:text-4xl font-bold mt-4"><?= esc($featuredNews['title']) ?></h2>
                    <p class="mt-2 text-gray-300"><?= esc(word_limiter(strip_tags($featuredNews['content']), 40)) ?></p>
                    <div class="mt-4 flex items-center gap-3">
                        <img src="https://placehold.co/40x40/e0e7ff/4338ca?text=A" class="w-8 h-8 rounded-full">
                        <div>
                            <span class="text-white text-sm font-medium">Tin tức</span>
                            <p class="text-gray-400 text-xs"><?= date('d/m/Y', strtotime($featuredNews['created_at'])) ?> • <?= $featuredNews['is_hot'] ? 'Tin nóng' : '' ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <?php endif; ?>

    <!-- Search and Categories -->
    <div class="mb-8 flex flex-col md:flex-row gap-4 items-center">
        <form method="get" action="/news" class="relative w-full md:w-1/3">
            <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"></i>
            <input type="text" name="search" value="<?= esc($search) ?>" placeholder="Tìm kiếm bài viết..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <?php if (!empty($currentCategory)): ?>
                <input type="hidden" name="category" value="<?= esc($currentCategory) ?>">
            <?php endif; ?>
        </form>
        <div class="flex-grow flex gap-2 overflow-x-auto pb-2">
            <a href="/news" class="px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-full flex-shrink-0<?= empty($currentCategory) ? ' bg-indigo-600 text-white' : ' bg-white text-gray-600 border hover:bg-gray-50' ?>">Tất cả</a>
            <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $cat): ?>
                    <a href="/news?category=<?= $cat['id'] ?>" class="px-4 py-2 text-sm font-medium rounded-full flex-shrink-0<?= ($currentCategory == $cat['id']) ? ' bg-indigo-600 text-white' : ' bg-white text-gray-600 border hover:bg-gray-50' ?>">
                        <?= esc($cat['name']) ?>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Recent Posts Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
        <?php if (!empty($news)): ?>
            <?php foreach ($news as $item): ?>
                <div class="bg-white rounded-xl shadow-sm overflow-hidden flex flex-col group">
                    <a href="/news/<?= $item['id'] ?>" class="block overflow-hidden">
                        <?php if (!empty($item['image'])): ?>
                            <img src="<?= esc($item['image']) ?>" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" alt="<?= esc($item['title']) ?>">
                        <?php else: ?>
                            <img src="https://placehold.co/600x400/047857/ffffff?text=Tin+Tức" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" alt="Post image">
                        <?php endif; ?>
                    </a>
                    <div class="p-6 flex flex-col flex-grow">
                        <p class="text-sm font-semibold text-indigo-600">
                            <?= esc($categories[array_search($item['category_id'], array_column($categories, 'id'))]['name'] ?? 'Tin tức') ?>
                        </p>
                        <h3 class="mt-2 text-xl font-bold text-gray-900 flex-grow">
                            <a href="/news/<?= $item['id'] ?>" class="hover:text-indigo-700"><?= esc($item['title']) ?></a>
                        </h3>
                        <p class="mt-2 text-gray-600 text-sm line-clamp-2">
                            <?= esc(word_limiter(strip_tags($item['content']), 30)) ?>
                        </p>
                        <div class="mt-4 flex items-center gap-2 text-sm text-gray-500">
                            <img src="https://placehold.co/32x32/e0e7ff/4338ca?text=A" class="w-8 h-8 rounded-full">
                            <span>Tin tức</span>
                            <span class="mx-1">&middot;</span>
                            <span><?= date('d/m/Y', strtotime($item['created_at'])) ?></span>
                            <?php if ($item['is_hot']): ?>
                                <span class="mx-1">&middot;</span>
                                <span class="text-red-600 font-semibold flex items-center">
                                    <i class="fas fa-fire mr-1"></i>Nổi bật
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-span-3 text-center text-gray-500">Chưa có bài viết nào.</div>
        <?php endif; ?>
    </div>

    <!-- Pagination -->
    <?php if (isset($pager)): ?>
    <div class="mb-8 flex justify-center">
        <nav class="flex rounded-md shadow-sm">
            <?= $pager->links('default', 'tailwind_full') ?>
        </nav>
    </div>
    <?php endif; ?>

    <!-- Newsletter Subscription -->
    <div class="bg-indigo-600 rounded-xl shadow-lg p-8 mb-12">
        <div class="max-w-3xl mx-auto text-center">
            <h3 class="text-2xl font-bold text-white mb-4">Đăng ký nhận bản tin</h3>
            <p class="text-indigo-100 mb-6">Nhận các bài viết mới nhất và thông tin hữu ích về Digital Marketing, SEO và Công nghệ.</p>
            <form class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
                <input type="email" placeholder="Nhập email của bạn" class="flex-grow px-4 py-3 border-0 rounded-lg focus:ring-2 focus:ring-white/50 focus:outline-none">
                <button type="submit" class="px-6 py-3 bg-white text-indigo-600 font-semibold rounded-lg hover:bg-indigo-50">Đăng ký</button>
            </form>
            <p class="mt-4 text-xs text-indigo-200">Chúng tôi tôn trọng quyền riêng tư của bạn. Bạn có thể hủy đăng ký bất kỳ lúc nào.</p>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 