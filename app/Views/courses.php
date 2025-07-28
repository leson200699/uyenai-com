<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= esc($title) ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900"><?= esc($title) ?></h1>
        <p class="text-gray-600 mt-1">Nâng cao kỹ năng, cập nhật kiến thức với các khoá học chất lượng.</p>
    </div>

    <!-- Category Filters -->
    <?php if (!empty($categories)): ?>
    <div class="flex flex-wrap gap-2 mb-6">
        <a href="<?= site_url('courses') ?>" class="px-4 py-2 text-sm font-semibold rounded-full <?= !$category || $category['name'] !== 'Online Courses' ? 'bg-indigo-600 text-white' : 'bg-white text-gray-600 hover:bg-gray-50' ?>">
            Tất cả
        </a>
        <?php foreach ($categories as $cat): ?>
             <?php if ($cat['name'] === 'Online Courses'): ?>
                <a href="<?= site_url('products/category/' . $cat['id']) ?>" class="px-4 py-2 text-sm font-medium border rounded-full <?= $category && $category['id'] === $cat['id'] ? 'bg-indigo-600 text-white' : 'bg-white text-gray-600 hover:bg-gray-50' ?>">
                    <?= esc($cat['name']) ?>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <!-- Courses Grid -->
    <?php if (empty($products)): ?>
        <div class="text-center py-12">
            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i data-lucide="book-x" class="w-12 h-12 text-gray-400"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900">Chưa có khóa học</h3>
            <p class="text-gray-500 mt-2">Hiện tại chưa có khóa học nào trong danh mục này. Vui lòng quay lại sau.</p>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php foreach ($products as $product): ?>
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm flex flex-col overflow-hidden hover:shadow-md transition-shadow">
                <a href="<?= site_url('products/view/' . $product['id']) ?>" class="block">
                    <img src="<?= $product['image'] ?? 'https://placehold.co/600x400/312e81/ffffff?text=Course' ?>" class="h-40 w-full object-cover" alt="<?= esc($product['name']) ?>">
                </a>
                <div class="p-4 flex flex-col flex-grow">
                    <h3 class="font-bold text-gray-900 flex-grow line-clamp-2">
                        <a href="<?= site_url('products/view/' . $product['id']) ?>" class="hover:text-indigo-600">
                            <?= esc($product['name']) ?>
                        </a>
                    </h3>
                    <div class="mt-4 flex justify-between items-center">
                        <div>
                            <p class="text-xl font-bold text-indigo-600"><?= number_format($product['price']) ?>đ</p>
                        </div>
                    </div>
                    <form action="<?= site_url('cart/add') ?>" method="post" class="mt-4">
                        <?= csrf_field() ?>
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="w-full px-4 py-2 font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition-all text-center">
                            Thêm vào giỏ hàng
                        </button>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?> 