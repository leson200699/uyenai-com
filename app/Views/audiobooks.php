<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?>Kho Sách Nói<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-900">Kho Sách Nói</h1>
    <p class="text-gray-600 mt-1">Lắng nghe tri thức, phát triển bản thân mọi lúc mọi nơi.</p>
</div>
<!-- Filters (có thể bổ sung filter động sau) -->
<div class="flex flex-wrap gap-2 mb-6">
    <button class="px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-full">Mới nhất</button>
    <button class="px-4 py-2 text-sm font-medium text-gray-600 bg-white border rounded-full hover:bg-gray-50">Kinh doanh</button>
    <button class="px-4 py-2 text-sm font-medium text-gray-600 bg-white border rounded-full hover:bg-gray-50">Tâm lý học</button>
    <button class="px-4 py-2 text-sm font-medium text-gray-600 bg-white border rounded-full hover:bg-gray-50">Kỹ năng mềm</button>
    <button class="px-4 py-2 text-sm font-medium text-gray-600 bg-white border rounded-full hover:bg-gray-50">Văn học</button>
</div>
<!-- Audiobooks Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
    <?php if (!empty($audiobooks)): foreach ($audiobooks as $book): ?>
        <div class="bg-white rounded-xl shadow-sm flex flex-col overflow-hidden group">
            <div class="relative">
                <img src="<?= $book['cover_image'] ?>" class="w-full h-auto object-cover" alt="<?= esc($book['title']) ?>">
                <div class="absolute inset-0 bg-black/20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <a href="/audiobooks/detail/<?= $book['id'] ?>" class="w-14 h-14 bg-white/80 rounded-full flex items-center justify-center text-indigo-600 hover:bg-white">
                        <i data-lucide="play" class="w-8 h-8 fill-current"></i>
                    </a>
                </div>
            </div>
            <div class="p-3">
                <h3 class="font-semibold text-gray-800 truncate" title="<?= esc($book['title']) ?>"><?= esc($book['title']) ?></h3>
                <p class="text-sm text-gray-500 truncate"><?= esc($book['author']) ?></p>
            </div>
        </div>
    <?php endforeach; else: ?>
        <div class="col-span-5 text-center text-gray-500">Chưa có sách nói nào.</div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?> 