<?php
    $isEdit = isset($category);
    $targetUrl = $isEdit ? site_url('admin/categories/update/' . $category['id']) : site_url('admin/categories/store');
?>

<?php if (session()->getFlashdata('errors')): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Có lỗi xảy ra!</strong>
        <ul>
        <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="<?= $targetUrl ?>" method="post">
    <?= csrf_field() ?>
    <div class="space-y-6">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Tên danh mục</label>
            <input type="text" name="name" id="name" value="<?= old('name', $category['name'] ?? '') ?>" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Mô tả</label>
            <textarea name="description" id="description" rows="4" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"><?= old('description', $category['description'] ?? '') ?></textarea>
        </div>

        <div class="flex justify-end">
            <a href="<?= site_url('admin/categories') ?>" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded mr-2">Hủy</a>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                <?= $isEdit ? 'Cập nhật' : 'Lưu' ?>
            </button>
        </div>
    </div>
</form> 