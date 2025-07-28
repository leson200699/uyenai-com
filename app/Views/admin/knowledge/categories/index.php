<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>Quản lý Danh Mục Kiến Thức<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-900">Quản lý Danh Mục Kiến Thức</h1>
            <a href="<?= site_url('admin/knowledge/categories/create') ?>" 
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors">
                <i class="fas fa-plus mr-2"></i>Thêm Danh Mục
            </a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tên Danh Mục</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ngày tạo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hành Động</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $category['id'] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= esc($category['name']) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <?= date('d/m/Y H:i', strtotime($category['created_at'])) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="<?= site_url('admin/knowledge/categories/edit/' . $category['id']) ?>" 
                                       class="text-indigo-600 hover:text-indigo-900 bg-indigo-100 hover:bg-indigo-200 px-3 py-1 rounded-md transition-colors">
                                        <i class="fas fa-edit mr-1"></i>Sửa
                                    </a>
                                    <form action="<?= site_url('admin/knowledge/categories/delete/' . $category['id']) ?>" 
                                          method="post" style="display:inline;"
                                          onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">
                                        <button type="submit" 
                                                class="text-red-600 hover:text-red-900 bg-red-100 hover:bg-red-200 px-3 py-1 rounded-md transition-colors">
                                            <i class="fas fa-trash mr-1"></i>Xóa
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                            <div class="py-8">
                                <i class="fas fa-folder-open text-gray-300 text-4xl mb-4"></i>
                                <p>Chưa có danh mục nào được tạo</p>
                                <a href="<?= site_url('admin/knowledge/categories/create') ?>" 
                                   class="text-blue-600 hover:text-blue-800 mt-2 inline-block">
                                    Tạo danh mục đầu tiên
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?> 