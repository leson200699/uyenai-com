<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= esc($title ?? 'Kho Giao Diện Mẫu') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Kho Giao Diện Mẫu</h1>
        <p class="text-gray-600 mt-1">Khám phá các mẫu website chuyên nghiệp và hiện đại cho doanh nghiệp của bạn</p>
    </div>

    <!-- Filters -->
    <?php if (!empty($categories)): ?>
    <div class="mb-8 flex flex-wrap gap-2">
        <a href="<?= site_url('web-demo') ?>" class="px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-full">Tất cả</a>
        <?php foreach ($categories as $category): ?>
            <a href="<?= site_url('products/category/' . $category['id']) ?>" class="px-4 py-2 text-sm font-medium text-gray-600 bg-white border rounded-full hover:bg-gray-50">
                <?= esc($category['name']) ?>
            </a>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <!-- Featured Template -->
    <?php if (!empty($featuredProduct)): ?>
    <div class="mb-10 bg-gradient-to-r from-indigo-500 to-indigo-700 rounded-2xl overflow-hidden shadow-lg">
        <div class="flex flex-col md:flex-row items-center">
            <div class="p-8 md:w-1/2">
                <span class="inline-block px-3 py-1 bg-white text-indigo-700 rounded-full text-sm font-medium">Nổi bật</span>
                <h2 class="mt-4 text-3xl font-bold text-white"><?= esc($featuredProduct['name']) ?></h2>
                <p class="mt-2 text-indigo-100"><?= esc($featuredProduct['description']) ?></p>
                <div class="mt-6 flex flex-col sm:flex-row gap-3">
                    <a href="<?= site_url('products/view/' . $featuredProduct['id']) ?>" class="px-6 py-3 bg-white text-indigo-700 font-semibold rounded-lg hover:bg-indigo-50 transition flex items-center justify-center">
                        <i data-lucide="eye" class="w-5 h-5 mr-2"></i>
                        Xem chi tiết
                    </a>
                    <form action="<?= site_url('cart/add') ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="product_id" value="<?= $featuredProduct['id'] ?>">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="w-full px-6 py-3 bg-transparent text-white border border-white font-medium rounded-lg hover:bg-indigo-700 transition flex items-center justify-center">
                            <i data-lucide="shopping-cart" class="w-5 h-5 mr-2"></i>
                            Chọn mẫu này
                        </button>
                    </form>
                </div>
            </div>
            <div class="md:w-1/2 p-4 flex justify-center">
                <img src="<?= esc($featuredProduct['image']) ?>" class="max-w-full h-auto rounded-xl shadow-xl" alt="<?= esc($featuredProduct['name']) ?>">
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Template Grid -->
    <?php if (!empty($products)): ?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-10">
        <?php foreach ($products as $product): ?>
        <div class="bg-white rounded-xl shadow-sm border overflow-hidden group template-card">
            <div class="relative">
                <img src="<?= esc($product['image']) ?>" class="w-full h-52 object-cover">
                <div class="absolute inset-0 bg-black/50 flex items-center justify-center gap-4 opacity-0 group-hover:opacity-100 transition-opacity">
                    <a href="<?= site_url('products/view/' . $product['id']) ?>" class="px-4 py-2 text-sm font-bold text-gray-800 bg-white rounded-lg hover:bg-gray-200">Xem chi tiết</a>
                    <form action="<?= site_url('cart/add') ?>" method="post">
                         <?= csrf_field() ?>
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="px-4 py-2 text-sm font-bold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">Chọn mẫu này</button>
                    </form>
                </div>
            </div>
            <div class="p-4">
                <div class="flex justify-between items-center mb-2">
                    <h3 class="font-bold text-lg"><?= esc($product['name']) ?></h3>
                    <span class="text-indigo-600 font-bold"><?= number_format($product['price']) ?>đ</span>
                </div>
                <?php
                $productCategory = 'Chung';
                foreach ($categories as $cat) {
                    if ($cat['id'] == $product['category_id']) {
                        $productCategory = $cat['name'];
                        break;
                    }
                }
                ?>
                <div class="flex items-center text-sm text-gray-500 mb-3">
                    <i data-lucide="tag" class="w-4 h-4 mr-1"></i>
                    <span><?= esc($productCategory) ?></span>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
        <div class="text-center py-16">
            <i data-lucide="layout-template" class="w-16 h-16 text-gray-300 mx-auto mb-4"></i>
            <h2 class="text-xl font-semibold text-gray-700">Chưa có giao diện mẫu</h2>
            <p class="text-gray-500 mt-2">Chúng tôi đang cập nhật kho giao diện. Vui lòng quay lại sau.</p>
        </div>
    <?php endif; ?>
    
    <!-- Contact CTA -->
    <div class="bg-white border border-gray-200 rounded-xl p-6 md:p-8 text-center shadow-sm">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Không tìm thấy mẫu phù hợp?</h2>
        <p class="text-gray-600 mb-6 max-w-xl mx-auto">Chúng tôi cung cấp dịch vụ thiết kế website tùy chỉnh theo yêu cầu riêng của bạn. Liên hệ với chúng tôi để nhận tư vấn miễn phí.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="<?= site_url('contact') ?>" class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition flex items-center justify-center">
                <i data-lucide="message-circle" class="w-5 h-5 mr-2"></i>
                Tư vấn miễn phí
            </a>
            <a href="tel:YOUR_PHONE_NUMBER" class="px-6 py-3 bg-white border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition flex items-center justify-center">
                <i data-lucide="phone" class="w-5 h-5 mr-2"></i>
                Gọi ngay
            </a>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 