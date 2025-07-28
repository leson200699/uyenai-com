<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Cửa Hàng Tài Khoản AI</h1>
        <p class="text-gray-600 mt-1">Chọn và mua ngay các loại tài khoản AI mạnh mẽ nhất.</p>
    </div>
    
    <?php if (session()->getFlashdata('success')): ?>
    <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-lg flex items-start">
        <i data-lucide="check-circle" class="w-5 h-5 text-green-500 mr-3 flex-shrink-0"></i>
        <p class="text-green-700"><?= session()->getFlashdata('success') ?></p>
    </div>
    <?php endif; ?>
    
    <?php if (session()->getFlashdata('error')): ?>
    <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg flex items-start">
        <i data-lucide="alert-circle" class="w-5 h-5 text-red-500 mr-3 flex-shrink-0"></i>
        <p class="text-red-700"><?= session()->getFlashdata('error') ?></p>
    </div>
    <?php endif; ?>
    
    <!-- Trang chính -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <?php foreach ($products as $product): ?>
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm flex flex-col">
            <div class="h-40 bg-gray-100 flex items-center justify-center rounded-t-xl">
                <img src="<?= $product['image'] ?>" class="h-24 w-auto rounded-lg" alt="<?= $product['name'] ?>">
            </div>
            <div class="p-4 flex flex-col flex-grow">
                <h3 class="font-bold text-lg text-gray-900"><?= $product['name'] ?></h3>
                <p class="text-sm text-gray-600 mt-1 flex-grow"><?= $product['description'] ?></p>
                <div class="mt-4">
                    <p class="text-sm text-gray-500">Giá bán</p>
                    <p class="text-2xl font-bold text-indigo-600"><?= number_format($product['price']) ?>đ</p>
                </div>
                
                <div class="mt-4 flex flex-col">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm text-gray-600">Còn <?= $product['stock'] ?> tài khoản</span>
                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded">Có sẵn</span>
                    </div>
                    
                    <form action="<?= site_url('cart/add') ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        <input type="hidden" name="type" value="product">
                        <button type="submit" class="w-full px-4 py-2 font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition-all flex items-center justify-center">
                            <i data-lucide="shopping-cart" class="w-5 h-5 mr-2"></i>
                            Thêm vào giỏ hàng
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    
    <!-- Thông tin bổ sung -->
    <div class="mt-12 bg-white border border-gray-200 rounded-xl shadow-sm p-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Thông tin về tài khoản AI</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h3 class="font-semibold text-lg text-gray-800 mb-2">Hướng dẫn sử dụng</h3>
                <ul class="list-disc pl-5 space-y-2 text-gray-600">
                    <li>Sau khi thanh toán, bạn sẽ nhận được thông tin đăng nhập qua email.</li>
                    <li>Tài khoản được bảo hành theo thời gian ghi trên sản phẩm (thông thường là 1 tháng).</li>
                    <li>Hỗ trợ kỹ thuật 24/7 qua email hoặc chat trực tuyến.</li>
                    <li>Hướng dẫn chi tiết cách sử dụng các tính năng được gửi kèm.</li>
                </ul>
            </div>
            <div>
                <h3 class="font-semibold text-lg text-gray-800 mb-2">Chính sách bảo hành</h3>
                <ul class="list-disc pl-5 space-y-2 text-gray-600">
                    <li>Bảo hành 1:1 trong thời gian bảo hành nếu tài khoản có vấn đề.</li>
                    <li>Hỗ trợ đổi tài khoản mới nếu không thể khắc phục sự cố.</li>
                    <li>Cam kết hoàn tiền nếu không hài lòng trong 3 ngày đầu tiên.</li>
                    <li>Tư vấn kỹ thuật miễn phí trong suốt thời gian sử dụng.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 