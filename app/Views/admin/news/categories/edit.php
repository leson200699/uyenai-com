<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>Sửa Danh Mục Tin Tức<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1 class="text-2xl font-bold mb-4">Sửa Danh Mục Tin Tức</h1>

<form action="<?= site_url('admin/news/categories/update/' . $category['id']) ?>" method="post">
    <div class="mb-4">
        <label for="name" class="block">Tên Danh Mục</label>
        <input type="text" name="name" id="name" class="border rounded w-full" value="<?= $category['name'] ?>" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Cập nhật</button>
</form>
<?= $this->endSection() ?>
