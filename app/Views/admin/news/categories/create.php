<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>Thêm Danh Mục Tin Tức<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow">
    <div class="flex items-center gap-2 mb-6">
        <i data-lucide="plus-circle" class="w-7 h-7 text-indigo-600"></i>
        <h1 class="text-2xl font-bold">Thêm Danh Mục Tin Tức</h1>
    </div>

    <?php if(session()->getFlashdata('errors')): ?>
        <div class="mb-4 p-4 bg-red-100 border border-red-200 text-red-700 rounded-lg">
            <ul class="list-disc list-inside">
                <?php foreach(session()->getFlashdata('errors') as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('admin/news/categories/store') ?>" method="post" autocomplete="off">
        <div class="mb-6">
            <label for="name" class="block mb-2 font-medium text-gray-700">Tên Danh Mục <span class="text-red-500">*</span></label>
            <div class="relative">
                <input type="text" name="name" id="name" class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg w-full focus:ring-2 focus:ring-indigo-400 focus:outline-none transition" required autofocus>
                <span class="absolute left-3 top-2.5 text-gray-400"><i data-lucide="tag" class="w-5 h-5"></i></span>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <button type="submit" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg shadow transition font-semibold">
                <i data-lucide="save" class="w-5 h-5"></i> Lưu
            </button>
            <a href="<?= site_url('admin/news/categories') ?>" class="inline-flex items-center gap-2 bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg transition">
                <i data-lucide="arrow-left" class="w-5 h-5"></i> Quay lại
            </a>
        </div>
    </form>
</div>

<?= $this->section('scripts') ?>
<script>
    // Focus input khi load trang
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('name').focus();
        lucide.createIcons();
    });
</script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>
