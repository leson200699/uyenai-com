<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>Quản lý Danh Mục Tin Tức<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold flex items-center gap-2">
        <i data-lucide="tag" class="w-7 h-7 text-indigo-600"></i>
        Quản lý Danh Mục Tin Tức
    </h1>
    <a href="<?= site_url('admin/news/categories/create') ?>" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow transition">
        <i data-lucide="plus" class="w-5 h-5"></i> Thêm Danh Mục
    </a>
</div>

<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4 gap-2">
    <div class="text-gray-600 text-sm">Tổng số: <span class="font-semibold"><?= count($categories) ?></span> danh mục</div>
    <div class="relative w-full md:w-64">
        <input type="text" id="searchInput" placeholder="Tìm kiếm danh mục..." class="pl-10 pr-4 py-2 border rounded-lg w-full focus:ring-2 focus:ring-indigo-400 focus:outline-none transition" onkeyup="filterCategories()">
        <span class="absolute left-3 top-2.5 text-gray-400"><i data-lucide="search" class="w-5 h-5"></i></span>
    </div>
</div>

<div class="overflow-x-auto rounded-lg shadow bg-white">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tên Danh Mục</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Hành Động</th>
            </tr>
        </thead>
        <tbody id="categoryTable">
            <?php foreach ($categories as $category): ?>
                <tr class="hover:bg-indigo-50 transition">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 font-semibold"><?= $category['id'] ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><?= $category['name'] ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <a href="<?= site_url('admin/news/categories/edit/' . $category['id']) ?>" class="inline-flex items-center gap-1 text-yellow-600 hover:text-yellow-800 font-medium px-2 py-1 rounded transition">
                            <i data-lucide="edit-3" class="w-4 h-4"></i> Sửa
                        </a>
                        <form action="<?= site_url('admin/news/categories/delete/' . $category['id']) ?>" method="post" style="display:inline;" onsubmit="return confirmDelete(event, '<?= htmlspecialchars($category['name'], ENT_QUOTES) ?>')">
                            <button type="submit" class="inline-flex items-center gap-1 text-red-600 hover:text-red-800 font-medium px-2 py-1 rounded transition">
                                <i data-lucide="trash-2" class="w-4 h-4"></i> Xóa
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->section('scripts') ?>
<script>
// Tìm kiếm nhanh trên bảng
function filterCategories() {
    const input = document.getElementById('searchInput');
    const filter = input.value.toLowerCase();
    const table = document.getElementById('categoryTable');
    const rows = table.getElementsByTagName('tr');
    for (let i = 0; i < rows.length; i++) {
        const nameCell = rows[i].getElementsByTagName('td')[1];
        if (nameCell) {
            const txtValue = nameCell.textContent || nameCell.innerText;
            rows[i].style.display = txtValue.toLowerCase().indexOf(filter) > -1 ? '' : 'none';
        }
    }
}
// Xác nhận xóa
function confirmDelete(event, name) {
    if (!confirm('Bạn có chắc chắn muốn xóa danh mục: ' + name + '?')) {
        event.preventDefault();
        return false;
    }
    return true;
}
</script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>
