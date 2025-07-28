<?php helper('text'); ?>
<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-4xl mx-auto">
    <!-- Breadcrumb -->
    <nav class="mb-6">
        <ol class="flex items-center space-x-2 text-sm text-gray-500">
            <li><a href="/" class="hover:text-indigo-600">Trang chủ</a></li>
            <li><span class="mx-2">/</span></li>
            <li><a href="/news" class="hover:text-indigo-600">Tin tức</a></li>
            <li><span class="mx-2">/</span></li>
            <li><span class="text-gray-900"><?= esc($news['title']) ?></span></li>
        </ol>
    </nav>

    <!-- Article Header -->
    <header class="mb-8">
        <div class="mb-4">
            <span class="text-sm font-semibold text-indigo-600 bg-indigo-100 px-3 py-1 rounded-full">
                <?= esc($category['name'] ?? 'Tin tức') ?>
            </span>
        </div>
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4"><?= esc($news['title']) ?></h1>
        <div class="flex items-center gap-4 text-sm text-gray-500">
            <div class="flex items-center gap-2">
                <img src="https://placehold.co/32x32/e0e7ff/4338ca?text=A" class="w-8 h-8 rounded-full">
                <span>Tác giả</span>
            </div>
            <span class="mx-1">&middot;</span>
            <span><?= date('d/m/Y H:i', strtotime($news['created_at'])) ?></span>
            <?php if ($news['is_hot']): ?>
                <span class="mx-1">&middot;</span>
                <span class="text-red-600 font-semibold">Tin nóng</span>
            <?php endif; ?>
        </div>
    </header>

    <!-- Article Image -->
    <?php if (!empty($news['image'])): ?>
    <div class="mb-8">
        <img src="<?= esc($news['image']) ?>"
             class="w-full h-64 md:h-96 object-cover rounded-xl"
             alt="<?= esc($news['title']) ?>">
    </div>
    <?php else: ?>
    <div class="mb-8">
        <div class="w-full h-64 md:h-96 bg-gradient-to-br from-blue-100 to-indigo-200 rounded-xl flex items-center justify-center">
            <div class="text-center">
                <i data-lucide="newspaper" class="w-16 h-16 text-blue-600 mx-auto mb-4"></i>
                <p class="text-blue-800 font-medium">Tin Tức & Blog</p>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Article Content -->
    <article class="prose prose-lg max-w-none mb-12">
        <div class="text-gray-700 leading-relaxed rich-text-content">
            <?= $news['content'] ?>
        </div>
    </article>

    <!-- Article Footer -->
    <footer class="border-t pt-8 mb-12">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-500">Chia sẻ:</span>
                <div class="flex gap-2">
                    <a href="#" class="text-gray-400 hover:text-blue-600">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84"></path>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-600">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <a href="/news" class="text-indigo-600 hover:text-indigo-700 font-medium">
                ← Quay lại danh sách
            </a>
        </div>
    </footer>

    <!-- Related Articles -->
    <?php if (!empty($relatedNews)): ?>
    <section class="border-t pt-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Bài viết liên quan</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($relatedNews as $related): ?>
            <div class="bg-white rounded-xl shadow-sm overflow-hidden flex flex-col group">
                <a href="/news/<?= $related['id'] ?>" class="block overflow-hidden">
                    <?php if (!empty($related['image'])): ?>
                        <img src="<?= esc($related['image']) ?>" 
                             class="w-full h-32 object-cover group-hover:scale-105 transition-transform duration-300" 
                             alt="<?= esc($related['title']) ?>">
                    <?php else: ?>
                        <img src="https://placehold.co/400x250/047857/ffffff?text=Tin+Tức" 
                             class="w-full h-32 object-cover group-hover:scale-105 transition-transform duration-300" 
                             alt="Related post">
                    <?php endif; ?>
                </a>
                <div class="p-4 flex flex-col flex-grow">
                    <h3 class="text-lg font-bold text-gray-900 flex-grow">
                        <a href="/news/<?= $related['id'] ?>" class="hover:text-indigo-700">
                            <?= esc($related['title']) ?>
                        </a>
                    </h3>
                    <p class="mt-2 text-gray-600 text-sm line-clamp-2">
                        <?= esc(word_limiter(strip_tags($related['content']), 20)) ?>
                    </p>
                    <div class="mt-3 text-sm text-gray-500">
                        <?= date('d/m/Y', strtotime($related['created_at'])) ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>
</div>
<?= $this->endSection() ?> 