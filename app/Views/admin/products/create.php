<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <div>
            <h2 class="text-2xl font-semibold leading-tight">Thêm Sản phẩm mới</h2>
        </div>

        <div class="mt-8">
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <?= $this->include('admin/products/_form') ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 