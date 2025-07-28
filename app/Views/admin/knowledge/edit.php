<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>Sửa Bài Viết Kiến Thức<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b">
        <h1 class="text-2xl font-bold text-gray-900">Sửa Bài Viết Kiến Thức</h1>
    </div>

    <form action="<?= site_url('admin/knowledge/update/' . $knowledge['id']) ?>" method="post" enctype="multipart/form-data" class="p-6">
        <?= csrf_field() ?>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="md:col-span-2 space-y-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Tiêu đề *</label>
                    <input type="text" 
                           id="title" 
                           name="title" 
                           value="<?= old('title', $knowledge['title']) ?>"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Nhập tiêu đề bài viết..."
                           required>
                    <?php if (isset($errors['title'])): ?>
                        <p class="text-red-500 text-sm mt-1"><?= $errors['title'] ?></p>
                    <?php endif; ?>
                </div>

                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Nội dung *</label>
                    <textarea id="content" 
                              name="content" 
                              rows="20"
                              class="rich-text-editor"
                              placeholder="Nhập nội dung bài viết..."
                              required><?= old('content', $knowledge['content']) ?></textarea>
                    <?php if (isset($errors['content'])): ?>
                        <p class="text-red-500 text-sm mt-1"><?= $errors['content'] ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Danh mục *</label>
                    <select id="category_id" 
                            name="category_id" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            required>
                        <option value="">Chọn danh mục</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['id'] ?>" 
                                <?= (old('category_id', $knowledge['category_id']) == $category['id']) ? 'selected' : '' ?>>
                                <?= esc($category['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($errors['category_id'])): ?>
                        <p class="text-red-500 text-sm mt-1"><?= $errors['category_id'] ?></p>
                    <?php endif; ?>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hình ảnh</label>
                    <input type="hidden" id="image_path" name="image_path" value="<?= esc($knowledge['image'] ?? '') ?>">
                    
                    <div class="space-y-3">
                        <button type="button" 
                                id="selectImageBtn"
                                data-filemanager-trigger
                                data-filemanager-target="image_path"
                                data-filemanager-preview="imagePreview"
                                class="<?= !empty($knowledge['image']) ? 'bg-green-500 hover:bg-green-600' : 'bg-gray-500 hover:bg-gray-600' ?> text-white px-4 py-2 rounded-lg transition-colors w-full">
                            <i class="fas fa-image mr-2"></i><?= !empty($knowledge['image']) ? 'Đã chọn: ' . basename($knowledge['image']) : 'Chọn hình ảnh từ File Manager' ?>
                        </button>
                        
                        <div id="imagePreviewContainer" class="<?= empty($knowledge['image']) ? 'hidden' : '' ?>">
                            <img id="imagePreview" 
                                 src="<?= esc($knowledge['image'] ?? '') ?>" 
                                 alt="Preview" 
                                 class="w-full h-32 object-cover rounded border"
                                 style="<?= empty($knowledge['image']) ? 'display: none;' : '' ?>">
                            <button type="button" 
                                    onclick="window.fileManagerIntegration.removeFile('imagePreview', 'image_path', 'selectImageBtn')"
                                    data-remove-target="imagePreview"
                                    class="mt-2 text-red-600 hover:text-red-800 text-sm"
                                    style="<?= empty($knowledge['image']) ? 'display: none;' : 'display: inline-block;' ?>">
                                <i class="fas fa-times mr-1"></i>Xóa hình ảnh
                            </button>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Click để chọn hình ảnh từ File Manager</p>
                    
                    <script>
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
                </div>

                <div class="flex items-center">
                    <input type="checkbox" 
                           id="is_hot" 
                           name="is_hot" 
                           value="1" 
                           <?= old('is_hot', $knowledge['is_hot']) ? 'checked' : '' ?>
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="is_hot" class="ml-2 block text-sm text-gray-900">
                        Đánh dấu là bài viết nổi bật
                    </label>
                </div>
            </div>
        </div>

        <div class="flex space-x-3 mt-8 pt-6 border-t">
            <button type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition-colors">
                <i class="fas fa-save mr-2"></i>Cập Nhật
            </button>
            <a href="<?= site_url('admin/knowledge') ?>" 
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition-colors">
                <i class="fas fa-times mr-2"></i>Hủy
            </a>
        </div>
    </form>
</div>

<script>
// Khởi tạo custom rich text editor
document.addEventListener('DOMContentLoaded', function() {
    if (window.RichTextEditor) {
        window.RichTextEditor.init('textarea.rich-text-editor');
    }
});
</script>
<?= $this->endSection() ?> 