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
            <li><a href="/knowledge" class="hover:text-indigo-600">Kiến thức</a></li>
            <li><span class="mx-2">/</span></li>
            <li><span class="text-gray-900"><?= esc($knowledge['title']) ?></span></li>
        </ol>
    </nav>

    <!-- Article Header -->
    <header class="mb-8">
        <div class="mb-4">
            <span class="text-sm font-semibold text-blue-600 bg-blue-100 px-3 py-1 rounded-full">
                <?= esc($category['name'] ?? 'Kiến thức') ?>
            </span>
        </div>
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4"><?= esc($knowledge['title']) ?></h1>
        <div class="flex items-center gap-4 text-sm text-gray-500">
            <div class="flex items-center gap-2">
                <i data-lucide="user" class="w-4 h-4"></i>
                <span>Hướng dẫn viên</span>
            </div>
            <span class="mx-1">&middot;</span>
            <div class="flex items-center gap-2">
                <i data-lucide="calendar" class="w-4 h-4"></i>
                <span><?= date('d/m/Y H:i', strtotime($knowledge['created_at'])) ?></span>
            </div>
            <?php if ($knowledge['is_hot']): ?>
                <span class="mx-1">&middot;</span>
                <span class="text-orange-600 font-semibold flex items-center gap-1">
                    <i data-lucide="star" class="w-4 h-4"></i>
                    Nổi bật
                </span>
            <?php endif; ?>
        </div>
    </header>

    <!-- Article Image -->
    <?php if (!empty($knowledge['image'])): ?>
    <div class="mb-8">
        <img src="<?= esc($knowledge['image']) ?>" 
             class="w-full h-64 md:h-96 object-cover rounded-xl" 
             alt="<?= esc($knowledge['title']) ?>">
    </div>
    <?php else: ?>
    <div class="mb-8">
        <div class="w-full h-64 md:h-96 bg-gradient-to-br from-blue-100 to-indigo-200 rounded-xl flex items-center justify-center">
            <div class="text-center">
                <i data-lucide="book-open" class="w-16 h-16 text-blue-600 mx-auto mb-4"></i>
                <p class="text-blue-800 font-medium">Hướng dẫn & Kiến thức</p>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Article Content -->
    <article class="prose prose-lg max-w-none mb-12">
        <div class="text-gray-700 leading-relaxed rich-text-content">
            <?= $knowledge['content'] ?>
        </div>
    </article>

    <!-- Article Footer -->
    <footer class="border-t pt-8 mb-12">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-500">Chia sẻ:</span>
                <div class="flex gap-2">
                    <a href="#" class="text-gray-400 hover:text-blue-600 p-2 rounded-lg hover:bg-gray-100">
                        <i data-lucide="share-2" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-green-600 p-2 rounded-lg hover:bg-gray-100">
                        <i data-lucide="link" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>
            <a href="/knowledge" class="text-indigo-600 hover:text-indigo-700 font-medium flex items-center gap-2">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                Quay lại danh sách
            </a>
        </div>
    </footer>

    <!-- Related Articles -->
    <?php if (!empty($relatedKnowledge)): ?>
    <section class="border-t pt-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Bài viết liên quan</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($relatedKnowledge as $related): ?>
            <div class="bg-white rounded-xl shadow-sm overflow-hidden flex flex-col group border hover:shadow-md transition-shadow">
                <a href="/knowledge/<?= $related['id'] ?>" class="block overflow-hidden">
                    <?php if (!empty($related['image'])): ?>
                        <img src="<?= esc($related['image']) ?>" 
                             class="w-full h-32 object-cover group-hover:scale-105 transition-transform duration-300" 
                             alt="<?= esc($related['title']) ?>">
                    <?php else: ?>
                        <div class="w-full h-32 bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center group-hover:from-blue-100 group-hover:to-indigo-200 transition-colors duration-300">
                            <i data-lucide="file-text" class="w-8 h-8 text-blue-600"></i>
                        </div>
                    <?php endif; ?>
                </a>
                <div class="p-4 flex flex-col flex-grow">
                    <h3 class="text-lg font-bold text-gray-900 flex-grow">
                        <a href="/knowledge/<?= $related['id'] ?>" class="hover:text-indigo-700">
                            <?= esc($related['title']) ?>
                        </a>
                    </h3>
                    <p class="mt-2 text-gray-600 text-sm line-clamp-2">
                        <?= esc(word_limiter(strip_tags($related['content']), 20)) ?>
                    </p>
                    <div class="mt-3 text-sm text-gray-500 flex items-center gap-2">
                        <i data-lucide="calendar" class="w-3 h-3"></i>
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