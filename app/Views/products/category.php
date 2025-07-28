<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= $category['name'] ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="mb-8">
    <div class="flex items-center gap-2 text-sm text-gray-500 mb-4">
        <a href="<?= site_url('products') ?>" class="hover:text-indigo-600">Sản phẩm</a>
        <i data-lucide="chevron-right" class="w-4 h-4"></i>
        <span><?= $category['name'] ?></span>
    </div>

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900"><?= $category['name'] ?></h1>
    </div>
    
    <?php if(!empty($category['description'])): ?>
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 mb-8">
            <p class="text-gray-600"><?= $category['description'] ?></p>
        </div>
    <?php endif; ?>

    <!-- Categories Filter -->
    <div class="mb-8">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
            <h2 class="text-lg font-semibold mb-4">Danh mục sản phẩm</h2>
            
            <div class="flex flex-wrap gap-3">
                <a href="<?= site_url('products') ?>" class="px-4 py-2 rounded-lg <?= current_url() == site_url('products') ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-800 hover:bg-gray-200' ?>">
                    Tất cả
                </a>
                
                <?php foreach($categories as $cat): ?>
                    <a href="<?= site_url('products/category/' . $cat['id']) ?>" class="px-4 py-2 rounded-lg <?= $cat['id'] == $category['id'] ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-800 hover:bg-gray-200' ?>">
                        <?= $cat['name'] ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <?php if(empty($products)): ?>
            <div class="col-span-full text-center py-12">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="package-x" class="w-12 h-12 text-gray-400"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900">Không tìm thấy sản phẩm</h3>
                <p class="text-gray-500 mt-2">Hiện tại không có sản phẩm nào trong danh mục này.</p>
            </div>
        <?php else: ?>
            <?php foreach($products as $product): ?>
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm flex flex-col">
                    <div class="h-40 bg-gray-100 flex items-center justify-center rounded-t-xl">
                        <?php if(!empty($product['image']) && file_exists(ROOTPATH . 'public/uploads/products/' . $product['image'])): ?>
                            <img src="<?= base_url('uploads/products/' . $product['image']) ?>" class="h-32 w-auto rounded-lg" alt="<?= $product['name'] ?>">
                        <?php else: ?>
                            <img src="https://placehold.co/120x120/111827/<?= str_replace('#', '', substr(md5($product['name']), 0, 6)) ?>?text=<?= substr($product['name'], 0, 3) ?>" class="rounded-lg" alt="<?= $product['name'] ?>">
                        <?php endif; ?>
                    </div>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="font-bold text-lg text-gray-900"><?= $product['name'] ?></h3>
                        <p class="text-sm text-gray-600 mt-1 flex-grow">
                            <?= substr($product['description'], 0, 80) . (strlen($product['description']) > 80 ? '...' : '') ?>
                        </p>
                        <div class="mt-4">
                            <p class="text-sm text-gray-500">Giá bán</p>
                            <p class="text-2xl font-bold text-indigo-600"><?= number_format($product['price']) ?>đ</p>
                        </div>
                        
                        <div class="mt-4 flex gap-2">
                            <a href="<?= site_url('products/view/' . $product['id']) ?>" class="flex-1 px-4 py-2 font-medium text-indigo-600 border border-indigo-600 rounded-lg hover:bg-indigo-50 transition-all text-center">
                                Chi tiết
                            </a>
                            <form action="<?= site_url('cart/add') ?>" method="POST" class="flex-1">
                                <?= csrf_field() ?>
                                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="w-full px-4 py-2 font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition-all">
                                    Mua Ngay
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?> 