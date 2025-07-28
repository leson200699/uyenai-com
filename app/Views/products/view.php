<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= $product['name'] ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
        <div class="md:flex">
            <div class="md:w-1/3 bg-gray-100 p-8 flex items-center justify-center">
                <?php if (!empty($product['image'])): ?>
                    <?php if (strpos($product['image'], 'http') === 0): ?>
                        <img src="<?= $product['image'] ?>" class="max-w-full max-h-80 rounded-lg" alt="<?= $product['name'] ?>">
                    <?php elseif (file_exists(ROOTPATH . 'public/uploads/products/' . $product['image'])): ?>
                        <img src="<?= base_url('uploads/products/' . $product['image']) ?>" class="max-w-full max-h-80 rounded-lg" alt="<?= $product['name'] ?>">
                    <?php else: ?>
                        <img src="https://placehold.co/400x400/111827/<?= str_replace('#', '', substr(md5($product['name']), 0, 6)) ?>?text=<?= substr($product['name'], 0, 3) ?>" class="max-w-full max-h-80 rounded-lg" alt="<?= $product['name'] ?>">
                    <?php endif; ?>
                <?php else: ?>
                    <img src="https://placehold.co/400x400/111827/<?= str_replace('#', '', substr(md5($product['name']), 0, 6)) ?>?text=<?= substr($product['name'], 0, 3) ?>" class="max-w-full max-h-80 rounded-lg" alt="<?= $product['name'] ?>">
                <?php endif; ?>
            </div>
            
            <div class="md:w-2/3 p-8">
                <div class="mb-4">
                    <span class="inline-block bg-indigo-100 text-indigo-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">
                        <?= $product['category_name'] ?? 'Sản phẩm' ?>
                    </span>
                </div>
                
                <h1 class="text-3xl font-bold text-gray-900 mb-4"><?= $product['name'] ?></h1>
                
                <div class="flex items-center mb-6">
                    <span class="text-3xl font-bold text-indigo-600"><?= number_format($product['price']) ?>đ</span>
                    <?php if (!empty($product['old_price']) && $product['old_price'] > $product['price']): ?>
                    <span class="ml-2 text-xl text-gray-500 line-through"><?= number_format($product['old_price']) ?>đ</span>
                    <span class="ml-2 bg-red-100 text-red-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                        -<?= round(($product['old_price'] - $product['price']) / $product['old_price'] * 100) ?>%
                    </span>
                    <?php endif; ?>
                </div>
                
                <div class="prose max-w-none mb-8">
                    <p class="text-gray-700"><?= nl2br($product['description']) ?></p>
                </div>
                
                <div class="mb-6">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">
                            <?php if ($product['stock'] > 0): ?>
                                Còn hàng: <?= $product['stock'] ?> sản phẩm
                            <?php else: ?>
                                <span class="text-red-600">Hết hàng</span>
                            <?php endif; ?>
                        </span>
                    </div>
                </div>
                
                <?php if ($product['stock'] > 0): ?>
                <form action="<?= site_url('cart/add') ?>" method="POST" class="mb-6">
                    <?= csrf_field() ?>
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                    
                    <div class="flex items-center mb-4">
                        <label for="quantity" class="mr-4 text-gray-700 font-medium">Số lượng:</label>
                        <div class="flex items-center border rounded-lg overflow-hidden">
                            <button type="button" class="px-3 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700" onclick="decrementQuantity()">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                </svg>
                            </button>
                            <input id="quantity" name="quantity" type="number" min="1" max="<?= $product['stock'] ?>" value="1" class="w-16 px-3 py-2 text-center border-x focus:outline-none">
                            <button type="button" class="px-3 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700" onclick="incrementQuantity(<?= $product['stock'] ?>)">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12M6 12h12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <div class="flex gap-4">
                        <button type="submit" class="px-6 py-3 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition-all flex-1">
                            Thêm vào giỏ hàng
                        </button>
                        <button type="button" onclick="buyNow()" class="px-6 py-3 bg-indigo-100 text-indigo-700 font-medium rounded-lg hover:bg-indigo-200 transition-all flex-1">
                            Mua ngay
                        </button>
                    </div>
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <?php if (!empty($relatedProducts)): ?>
    <div class="mb-12">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Sản phẩm liên quan</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($relatedProducts as $relatedProduct): ?>
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm flex flex-col">
                    <div class="h-40 bg-gray-100 flex items-center justify-center rounded-t-xl">
                        <?php if (!empty($relatedProduct['image'])): ?>
                            <?php if (strpos($relatedProduct['image'], 'http') === 0): ?>
                                <img src="<?= $relatedProduct['image'] ?>" class="h-32 w-auto rounded-lg" alt="<?= $relatedProduct['name'] ?>">
                            <?php elseif (file_exists(ROOTPATH . 'public/uploads/products/' . $relatedProduct['image'])): ?>
                                <img src="<?= base_url('uploads/products/' . $relatedProduct['image']) ?>" class="h-32 w-auto rounded-lg" alt="<?= $relatedProduct['name'] ?>">
                            <?php else: ?>
                                <img src="https://placehold.co/120x120/111827/<?= str_replace('#', '', substr(md5($relatedProduct['name']), 0, 6)) ?>?text=<?= substr($relatedProduct['name'], 0, 3) ?>" class="rounded-lg" alt="<?= $relatedProduct['name'] ?>">
                            <?php endif; ?>
                        <?php else: ?>
                            <img src="https://placehold.co/120x120/111827/<?= str_replace('#', '', substr(md5($relatedProduct['name']), 0, 6)) ?>?text=<?= substr($relatedProduct['name'], 0, 3) ?>" class="rounded-lg" alt="<?= $relatedProduct['name'] ?>">
                        <?php endif; ?>
                    </div>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="font-bold text-lg text-gray-900"><?= $relatedProduct['name'] ?></h3>
                        <p class="text-sm text-gray-600 mt-1 flex-grow">
                            <?= substr($relatedProduct['description'], 0, 80) . (strlen($relatedProduct['description']) > 80 ? '...' : '') ?>
                        </p>
                        <div class="mt-4">
                            <p class="text-sm text-gray-500">Giá bán</p>
                            <p class="text-2xl font-bold text-indigo-600"><?= number_format($relatedProduct['price']) ?>đ</p>
                        </div>
                        
                        <div class="mt-4 flex gap-2">
                            <a href="<?= site_url('products/view/' . $relatedProduct['id']) ?>" class="flex-1 px-4 py-2 font-medium text-indigo-600 border border-indigo-600 rounded-lg hover:bg-indigo-50 transition-all text-center">
                                Chi tiết
                            </a>
                            <form action="<?= site_url('cart/add') ?>" method="POST" class="flex-1">
                                <input type="hidden" name="product_id" value="<?= $relatedProduct['id'] ?>">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="w-full px-4 py-2 font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition-all">
                                    Mua Ngay
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
</div>

<script>
    function incrementQuantity(max) {
        const input = document.getElementById('quantity');
        const currentValue = parseInt(input.value, 10);
        if (currentValue < max) {
            input.value = currentValue + 1;
        }
    }
    
    function decrementQuantity() {
        const input = document.getElementById('quantity');
        const currentValue = parseInt(input.value, 10);
        if (currentValue > 1) {
            input.value = currentValue - 1;
        }
    }
    
    function buyNow() {
        const form = document.querySelector('form');
        form.action = '<?= site_url('cart/add') ?>?redirect=checkout';
        form.submit();
    }
</script>
<?= $this->endSection() ?> 