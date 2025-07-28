<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= esc($title) ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900"><?= esc($title) ?></h1>
        <p class="text-gray-600 mt-1">Truy cập kho tàng kiến thức, biểu mẫu và tài nguyên độc quyền.</p>
    </div>
    
    <!-- Search Section -->
    <div class="bg-white rounded-lg shadow-sm border p-6 mb-6">
        <div class="max-w-3xl mx-auto">
            <div class="relative">
                <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 w-6 h-6 text-gray-400"></i>
                <input type="text" placeholder="Tìm kiếm tài liệu, ebook, biểu mẫu..." class="w-full pl-12 pr-4 py-3 text-lg border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
        </div>
    </div>
    
    <!-- Category Filters -->
    <?php if (!empty($categories)): ?>
    <div class="mb-6">
        <div class="flex flex-wrap gap-2">
            <a href="<?= site_url('academy') ?>" class="px-4 py-2 text-sm font-medium border rounded-full <?= !$category || $category['name'] !== 'Academy' ? 'bg-indigo-600 text-white' : 'bg-white text-gray-600 hover:bg-gray-50' ?>">Tất cả</a>
            <?php foreach ($categories as $cat): ?>
                <?php if ($cat['name'] === 'Academy'): // Assuming we only want to show sub-categories or a specific filter set ?>
                    <a href="<?= site_url('products/category/' . $cat['id']) ?>" class="px-4 py-2 text-sm font-medium border rounded-full <?= $category && $category['id'] === $cat['id'] ? 'bg-indigo-600 text-white' : 'bg-white text-gray-600 hover:bg-gray-50' ?>">
                        <?= esc($cat['name']) ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- All Resources -->
    <div>
        <h2 class="text-2xl font-bold mb-4">Danh Sách Tài Liệu</h2>
        <?php if (empty($products)): ?>
            <div class="text-center py-12">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="folder-x" class="w-12 h-12 text-gray-400"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900">Chưa có tài liệu</h3>
                <p class="text-gray-500 mt-2">Hiện tại chưa có tài liệu nào trong danh mục này. Vui lòng quay lại sau.</p>
            </div>
        <?php else: ?>
            <div class="space-y-4">
                <?php foreach ($products as $product): ?>
                <div class="bg-white border border-gray-200 rounded-xl p-4 flex flex-col sm:flex-row items-start sm:items-center gap-4">
                    <div class="flex-shrink-0 w-16 h-16 bg-red-100 text-red-600 flex items-center justify-center rounded-lg">
                        <i data-lucide="file-type-2" class="w-8 h-8"></i>
                    </div>
                    <div class="flex-grow">
                        <h4 class="font-bold text-gray-800"><?= esc($product['name']) ?></h4>
                        <p class="text-sm text-gray-600 mt-1"><?= esc($product['description']) ?></p>
                    </div>
                    <div class="flex-shrink-0 text-center sm:text-right w-full sm:w-auto">
                        <?php if ($product['price'] > 0): ?>
                            <p class="text-lg font-bold text-indigo-600"><?= number_format($product['price']) ?>đ</p>
                            <form action="<?= site_url('cart/add') ?>" method="post" class="mt-1">
                                <?= csrf_field() ?>
                                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="w-full sm:w-auto px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
                                    Mua ngay
                                </button>
                            </form>
                        <?php else: ?>
                            <p class="text-lg font-bold text-green-600">Miễn phí</p>
                            <a href="#" class="mt-1 inline-block w-full sm:w-auto px-4 py-2 text-sm font-semibold text-white bg-green-600 rounded-lg hover:bg-green-700">
                                Tải xuống
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?> 