<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>Thêm Danh Mục Kiến Thức<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b">
        <h1 class="text-2xl font-bold text-gray-900">Thêm Danh Mục Kiến Thức</h1>
    </div>

    <form action="<?= site_url('admin/knowledge/categories/store') ?>" method="post" class="p-6">
        <?= csrf_field() ?>
        
        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Tên Danh Mục</label>
            <input type="text" 
                   id="name" 
                   name="name" 
                   value="<?= old('name') ?>"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   placeholder="Nhập tên danh mục..."
                   required>
            <?php if (isset($errors['name'])): ?>
                <p class="text-red-500 text-sm mt-1"><?= $errors['name'] ?></p>
            <?php endif; ?>
        </div>

        <div class="flex space-x-3">
            <button type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition-colors">
                <i class="fas fa-save mr-2"></i>Lưu Danh Mục
            </button>
            <a href="<?= site_url('admin/knowledge/categories') ?>" 
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition-colors">
                <i class="fas fa-times mr-2"></i>Hủy
            </a>
        </div>
    </form>
</div>
<?= $this->endSection() ?> 