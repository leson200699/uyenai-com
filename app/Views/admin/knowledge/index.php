<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>Quản lý Bài Viết Kiến Thức<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-900">Quản lý Bài Viết Kiến Thức</h1>
            <div class="flex space-x-2">
                <a href="<?= site_url('admin/knowledge/categories') ?>" 
                   class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-folder mr-2"></i>Quản lý Danh Mục
                </a>
                <a href="<?= site_url('admin/knowledge/create') ?>" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-plus mr-2"></i>Thêm Bài Viết
                </a>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tiêu đề</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Danh mục</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trạng thái</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ngày tạo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hành động</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php if (!empty($knowledge)): ?>
                    <?php foreach ($knowledge as $item): ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $item['id'] ?></td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                <div class="max-w-xs truncate" title="<?= esc($item['title']) ?>">
                                    <?= esc($item['title']) ?>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs">
                                    <?php
                                    $categoryName = 'Không xác định';
                                    foreach ($categories as $cat) {
                                        if ($cat['id'] == $item['category_id']) {
                                            $categoryName = $cat['name'];
                                            break;
                                        }
                                    }
                                    echo esc($categoryName);
                                    ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <?php if ($item['is_hot']): ?>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        <i class="fas fa-star mr-1"></i>Nổi bật
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        Thường
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <?= date('d/m/Y H:i', strtotime($item['created_at'])) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="<?= site_url('/knowledge/' . $item['id']) ?>" 
                                       target="_blank"
                                       class="text-green-600 hover:text-green-900 bg-green-100 hover:bg-green-200 px-3 py-1 rounded-md transition-colors">
                                        <i class="fas fa-eye mr-1"></i>Xem
                                    </a>
                                    <a href="<?= site_url('admin/knowledge/edit/' . $item['id']) ?>" 
                                       class="text-indigo-600 hover:text-indigo-900 bg-indigo-100 hover:bg-indigo-200 px-3 py-1 rounded-md transition-colors">
                                        <i class="fas fa-edit mr-1"></i>Sửa
                                    </a>
                                    <form action="<?= site_url('admin/knowledge/delete/' . $item['id']) ?>" 
                                          method="post" style="display:inline;"
                                          onsubmit="return confirm('Bạn có chắc chắn muốn xóa bài viết này?')">
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
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                            <div class="py-8">
                                <i class="fas fa-book-open text-gray-300 text-4xl mb-4"></i>
                                <p>Chưa có bài viết kiến thức nào được tạo</p>
                                <a href="<?= site_url('admin/knowledge/create') ?>" 
                                   class="text-blue-600 hover:text-blue-800 mt-2 inline-block">
                                    Tạo bài viết đầu tiên
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