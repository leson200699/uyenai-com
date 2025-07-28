<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <div>
            <h2 class="text-2xl font-semibold leading-tight"><?= esc($title ?? 'Chỉnh sửa Dịch vụ') ?></h2>
        </div>

        <div class="mt-8">
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <?= $this->include('admin/services/_form') ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 