<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>Sửa Tin Tức<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Sửa Tin Tức</h1>
        <a href="<?= site_url('admin/news') ?>" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors">
            <i class="fas fa-arrow-left mr-2"></i>Quay lại
        </a>
    </div>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="<?= site_url('admin/news/update/' . $news['id']) ?>" method="post">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Tiêu đề *</label>
                        <input type="text" 
                               name="title" 
                               id="title" 
                               value="<?= old('title', $news['title']) ?>"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" 
                               required>
                    </div>

                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Nội dung *</label>
                        <textarea name="content" 
                                  id="content" 
                                  rows="20"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 rich-text-editor" 
                                  required><?= old('content', $news['content']) ?></textarea>
                        <div class="mt-2">
                            <button type="button" 
                                    id="insertImageBtn"
                                    data-editor-target="content"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm transition-colors">
                                <i class="fas fa-image mr-1"></i>Chèn hình ảnh từ File Manager
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Danh mục *</label>
                        <select name="category_id" 
                                id="category_id" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" 
                                required>
                            <option value="">Chọn danh mục</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['id'] ?>" <?= (old('category_id', $news['category_id']) == $category['id']) ? 'selected' : '' ?>>
                                    <?= esc($category['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Hình ảnh</label>
                        <input type="hidden" id="image_path" name="image_path" value="<?= old('image_path', $news['image']) ?>">

                        <div class="space-y-3">
                            <button type="button"
                                    id="selectImageBtn"
                                    data-filemanager-trigger
                                    data-filemanager-target="image_path"
                                    data-filemanager-preview="imagePreview"
                                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors w-full">
                                <i class="fas fa-image mr-2"></i>Chọn hình ảnh từ File Manager
                            </button>

                            <div id="imagePreviewContainer" class="<?= empty($news['image']) ? 'hidden' : '' ?>">
                                <img id="imagePreview"
                                     src="<?= esc($news['image']) ?>"
                                     alt="Preview"
                                     class="w-full h-32 object-cover rounded border"
                                     style="<?= empty($news['image']) ? 'display: none;' : '' ?>">
                                <button type="button"
                                        onclick="window.fileManagerIntegration.removeFile('imagePreview', 'image_path', 'selectImageBtn')"
                                        data-remove-target="imagePreview"
                                        class="mt-2 text-red-600 hover:text-red-800 text-sm"
                                        style="<?= empty($news['image']) ? 'display: none;' : 'display: inline-block;' ?>">
                                    <i class="fas fa-times mr-1"></i>Xóa hình ảnh
                                </button>
                            </div>
                        </div>
                        <p class="text-sm text-gray-500 mt-1">Click để chọn hình ảnh từ File Manager</p>
                    </div>

                    <div>
                        <label class="flex items-center">
                            <input type="checkbox" 
                                   name="is_hot" 
                                   id="is_hot" 
                                   value="1"
                                   <?= (old('is_hot', $news['is_hot'])) ? 'checked' : '' ?>
                                   class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <span class="ml-2 text-sm font-medium text-gray-700">Tin nổi bật</span>
                        </label>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition-colors">
                            <i class="fas fa-save mr-2"></i>Cập nhật tin tức
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
// Handle image preview for main image field
document.getElementById('image_path').addEventListener('change', function() {
    const container = document.getElementById('imagePreviewContainer');
    const removeBtn = document.querySelector('[data-remove-target="imagePreview"]');

    if (this.value) {
        container.classList.remove('hidden');
        removeBtn.style.display = 'inline-block';
    } else {
        container.classList.add('hidden');
        removeBtn.style.display = 'none';
    }
});
</script>
<?= $this->endSection() ?>
