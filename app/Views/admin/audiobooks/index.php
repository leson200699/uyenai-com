<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>Quản lý Sách Nói<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Quản lý Sách Nói</h1>
    <a href="/admin/audiobooks/create" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 flex items-center gap-2">
        <i data-lucide="plus-circle" class="w-5 h-5"></i> Thêm sách nói mới
    </a>
</div>
<div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-x-auto">
    <table class="min-w-full text-sm text-left">
        <thead class="text-xs text-gray-500 uppercase bg-gray-50">
            <tr>
                <th class="px-6 py-3">ID</th>
                <th class="px-6 py-3">Tiêu đề</th>
                <th class="px-6 py-3">Tác giả</th>
                <th class="px-6 py-3">Ảnh bìa</th>
                <th class="px-6 py-3">Trạng thái</th>
                <th class="px-6 py-3">Ngày tạo</th>
                <th class="px-6 py-3">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($audiobooks)): foreach ($audiobooks as $book): ?>
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">#<?= $book['id'] ?></td>
                    <td class="px-6 py-4"><?= esc($book['title']) ?></td>
                    <td class="px-6 py-4"><?= esc($book['author']) ?></td>
                    <td class="px-6 py-4"><img src="<?= $book['cover_image'] ?>" class="w-12 h-16 object-cover rounded shadow"></td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs font-medium <?= $book['status'] ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' ?> rounded-full">
                            <?= $book['status'] ? 'Hiện' : 'Ẩn' ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-500"><?= $book['created_at'] ?></td>
                    <td class="px-6 py-4 flex gap-2">
                        <a href="/admin/audiobooks/edit/<?= $book['id'] ?>" class="text-indigo-600 hover:text-indigo-900"><i data-lucide="edit" class="w-5 h-5"></i></a>
                        <a href="/admin/audiobooks/delete/<?= $book['id'] ?>" class="text-red-600 hover:text-red-900" onclick="return confirm('Xác nhận xóa?')"><i data-lucide="trash-2" class="w-5 h-5"></i></a>
                    </td>
                </tr>
            <?php endforeach; else: ?>
                <tr><td colspan="7" class="px-6 py-4 text-center text-gray-500">Chưa có sách nói nào.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?> 