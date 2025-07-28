<?php
    $isEdit = isset($service);
    $targetUrl = $isEdit ? site_url('admin/services/update/' . $service['id']) : site_url('admin/services/store');
    $features = old('features', $service['features'] ?? []);
    if (is_string($features)) {
        $features = json_decode($features, true) ?: [];
    }
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
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="id" class="block text-sm font-medium text-gray-700">ID Dịch vụ (slug)</label>
                <input type="text" name="id" id="id" value="<?= old('id', $service['id'] ?? '') ?>" <?= $isEdit ? 'readonly' : '' ?> required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm <?= $isEdit ? 'bg-gray-100' : '' ?>" placeholder="e.g., web-design-basic">
                <?php if(!$isEdit): ?>
                    <p class="text-xs text-gray-500 mt-1">Dùng để tạo URL, không chứa dấu cách, viết thường. Ví dụ: 'ten-mien-com'.</p>
                <?php endif; ?>
            </div>
             <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Tên Dịch vụ</label>
                <input type="text" name="name" id="name" value="<?= old('name', $service['name'] ?? '') ?>" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Mô tả</label>
            <textarea name="description" id="description" rows="4" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"><?= old('description', $service['description'] ?? '') ?></textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Giá</label>
                <input type="number" step="0.01" name="price" id="price" value="<?= old('price', $service['price'] ?? '') ?>" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="duration" class="block text-sm font-medium text-gray-700">Thời hạn</label>
                <select name="duration" id="duration" class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="month" <?= (old('duration', $service['duration'] ?? '') == 'month') ? 'selected' : '' ?>>Tháng</option>
                    <option value="year" <?= (old('duration', $service['duration'] ?? '') == 'year') ? 'selected' : '' ?>>Năm</option>
                    <option value="one-time" <?= (old('duration', $service['duration'] ?? '') == 'one-time') ? 'selected' : '' ?>>Một lần</option>
                </select>
            </div>
             <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                <select name="status" id="status" class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="active" <?= (old('status', $service['status'] ?? '') == 'active') ? 'selected' : '' ?>>Active</option>
                    <option value="inactive" <?= (old('status', $service['status'] ?? '') == 'inactive') ? 'selected' : '' ?>>Inactive</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <input list="category-list" name="category" id="category" value="<?= old('category', $service['category'] ?? '') ?>" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="e.g., hosting, vps, design">
                <datalist id="category-list">
                    <?php if (!empty($categories)): ?>
                        <?php foreach($categories as $cat): ?>
                            <option value="<?= esc($cat['category']) ?>">
                        <?php endforeach; ?>
                    <?php endif; ?>
                </datalist>
            </div>
            <div>
                <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                <input list="type-list" name="type" id="type" value="<?= old('type', $service['type'] ?? '') ?>" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="e.g., shared-hosting, vps-kvm, logo-design">
                <datalist id="type-list">
                     <?php if (!empty($types)): ?>
                        <?php foreach($types as $typ): ?>
                            <option value="<?= esc($typ['type']) ?>">
                        <?php endforeach; ?>
                    <?php endif; ?>
                </datalist>
            </div>
        </div>
        
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">URL Ảnh (tùy chọn)</label>
            <input type="text" name="image" id="image" value="<?= old('image', $service['image'] ?? '') ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="https://example.com/image.png">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Tính năng nổi bật</label>
            <div id="features-container" class="mt-2 space-y-2">
                <?php if (!empty($features)): ?>
                    <?php foreach ($features as $index => $feature): ?>
                        <div class="flex items-center">
                            <input type="text" name="features[]" value="<?= esc($feature) ?>" class="flex-grow px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm">
                            <button type="button" class="remove-feature-btn ml-2 text-red-500 hover:text-red-700">
                                <i data-lucide="x-circle" class="w-5 h-5"></i>
                            </button>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <button type="button" id="add-feature-btn" class="mt-2 text-sm text-indigo-600 hover:text-indigo-800 font-semibold">
                + Thêm tính năng
            </button>
        </div>


        <div class="flex justify-end">
            <a href="<?= site_url('admin/services') ?>" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded mr-2">Hủy</a>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                <?= $isEdit ? 'Cập nhật' : 'Lưu' ?>
            </button>
        </div>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const featuresContainer = document.getElementById('features-container');
    const addFeatureBtn = document.getElementById('add-feature-btn');

    addFeatureBtn.addEventListener('click', function() {
        const featureInput = document.createElement('div');
        featureInput.classList.add('flex', 'items-center');
        featureInput.innerHTML = `
            <input type="text" name="features[]" class="flex-grow px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm" placeholder="e.g., 10GB SSD Storage">
            <button type="button" class="remove-feature-btn ml-2 text-red-500 hover:text-red-700">
                <i data-lucide="x-circle" class="w-5 h-5"></i>
            </button>
        `;
        featuresContainer.appendChild(featureInput);
        // We need to re-initialize lucide icons if they are added dynamically
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    });

    featuresContainer.addEventListener('click', function(e) {
        // Use closest to handle clicks on the icon inside the button
        const removeButton = e.target.closest('.remove-feature-btn');
        if (removeButton) {
            removeButton.parentElement.remove();
        }
    });
});
</script> 