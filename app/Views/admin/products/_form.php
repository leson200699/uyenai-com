<?php
    $isEdit = isset($product);
    $targetUrl = $isEdit ? site_url('admin/products/update/' . $product['id']) : site_url('admin/products/store');
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

<form action="<?= $targetUrl ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="space-y-6">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Tên sản phẩm</label>
            <input type="text" name="name" id="name" value="<?= old('name', $product['name'] ?? '') ?>" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Mô tả</label>
            <textarea name="description" id="description" rows="4" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"><?= old('description', $product['description'] ?? '') ?></textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Giá</label>
                <input type="number" name="price" id="price" value="<?= old('price', $product['price'] ?? '') ?>" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Danh mục</label>
                <select name="category_id" id="category_id" required class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Chọn danh mục</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>" 
                                data-name="<?= esc($category['name']) ?>"
                                <?= (old('category_id', $product['category_id'] ?? '') == $category['id']) ? 'selected' : '' ?>>
                            <?= esc($category['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        
        <div id="account-instances-wrapper" class="hidden">
            <label for="account_instances" class="block text-sm font-medium text-gray-700">
                Danh sách tài khoản (mỗi tài khoản một dòng)
            </label>
            <p class="text-xs text-gray-500 mb-2">Dữ liệu tài khoản cần có định dạng JSON, ví dụ: {"username": "user1", "password": "pw1"}. Khi thêm mới, số lượng tồn kho sẽ được tự động tính. Khi sửa, số lượng thêm vào sẽ được cộng dồn.</p>
            <textarea name="account_instances" id="account_instances" rows="10" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder='{"username": "user1", "password": "pw1"}\n{"username": "user2", "password": "pw2"}'></textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="stock" class="block text-sm font-medium text-gray-700">Tồn kho</label>
                <input type="number" name="stock" id="stock" value="<?= old('stock', $product['stock'] ?? '0') ?>" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                 <p class="text-xs text-gray-500 mt-1">Đối với sản phẩm "Tài khoản AI", trường này sẽ được tự động cập nhật và không thể chỉnh sửa.</p>
            </div>
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                <select name="status" id="status" class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="active" <?= (old('status', $product['status'] ?? '') == 'active') ? 'selected' : '' ?>>Active</option>
                    <option value="inactive" <?= (old('status', $product['status'] ?? '') == 'inactive') ? 'selected' : '' ?>>Inactive</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Ảnh đại diện sản phẩm</label>
            <input type="hidden" id="image_path" name="image" value="<?= old('image', $product['image'] ?? '') ?>">
            <div class="space-y-3">
                <button type="button"
                        id="selectImageBtn"
                        data-filemanager-trigger
                        data-filemanager-target="image_path"
                        data-filemanager-preview="imagePreview"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition-colors flex items-center gap-2">
                    <i data-lucide="image" class="w-4 h-4"></i> Chọn hình ảnh từ File Manager
                </button>
                <div id="imagePreviewContainer" class="<?= old('image', $product['image'] ?? '') ? '' : 'hidden' ?>">
                    <?php $img = old('image', $product['image'] ?? ''); if ($img): ?>
                        <img id="imagePreview" src="<?= strpos($img, 'http') === 0 ? $img : base_url('uploads/products/' . $img) ?>" alt="Ảnh sản phẩm" class="h-20 w-20 object-cover rounded border">
                    <?php else: ?>
                        <img id="imagePreview" src="" alt="Ảnh sản phẩm" class="h-20 w-20 object-cover rounded border hidden">
                    <?php endif; ?>
                    <button type="button"
                            onclick="window.fileManagerIntegration.removeFile('imagePreview', 'image_path', 'selectImageBtn')"
                            data-remove-target="imagePreview"
                            class="mt-2 text-red-600 hover:text-red-800 text-sm">
                        <i class="fas fa-times mr-1"></i>Xóa hình ảnh
                    </button>
                </div>
            </div>
            <p class="text-xs text-gray-500 mt-1">Click để chọn hình ảnh từ File Manager</p>
            <script>
                document.getElementById('image_path').addEventListener('change', function() {
                    const container = document.getElementById('imagePreviewContainer');
                    const removeBtn = document.querySelector('[data-remove-target="imagePreview"]');
                    const img = document.getElementById('imagePreview');
                    if (this.value) {
                        container.classList.remove('hidden');
                        removeBtn.style.display = 'inline-block';
                        img.src = this.value;
                        img.classList.remove('hidden');
                    } else {
                        container.classList.add('hidden');
                        removeBtn.style.display = 'none';
                        img.src = '';
                        img.classList.add('hidden');
                    }
                });
            </script>
        </div>

        <div class="flex justify-end">
            <a href="<?= site_url('admin/products') ?>" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded mr-2">Hủy</a>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                <?= $isEdit ? 'Cập nhật' : 'Lưu' ?>
            </button>
        </div>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const categorySelect = document.getElementById('category_id');
    const accountInstancesWrapper = document.getElementById('account-instances-wrapper');
    const stockInput = document.getElementById('stock');
    // Không cần logic imageInput/imagePreview cũ, đã thay bằng chuẩn knowledge

    function toggleAccountInstances() {
        const selectedOption = categorySelect.options[categorySelect.selectedIndex];
        const categoryName = selectedOption ? selectedOption.dataset.name : '';
        if (categoryName === 'Tài khoản AI') {
            accountInstancesWrapper.classList.remove('hidden');
            stockInput.readOnly = true;
        } else {
            accountInstancesWrapper.classList.add('hidden');
            stockInput.readOnly = false;
        }
    }

    categorySelect.addEventListener('change', toggleAccountInstances);
    toggleAccountInstances();

    lucide.createIcons();
});
</script>