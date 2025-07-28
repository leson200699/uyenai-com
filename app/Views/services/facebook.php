<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Dịch vụ Facebook</h1>
    
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-4">Giải pháp Marketing Facebook toàn diện</h2>
            <p class="mb-4 text-gray-600">Chúng tôi cung cấp các dịch vụ Facebook chuyên sâu, từ tăng tương tác, chạy quảng cáo hiệu quả đến quản lý Fanpage chuyên nghiệp, giúp bạn xây dựng thương hiệu và tiếp cận khách hàng tiềm năng.</p>
        </div>
    </div>
    
    <!-- Tăng Like/Follow -->
    <div class="mb-10">
        <h2 class="text-2xl font-semibold mb-6">Bảng giá dịch vụ Tăng Like/Follow</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($likeServices as $service): ?>
            <?php $features = json_decode($service['features'], true); ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:border-indigo-300 transition-all">
                <div class="p-6 border-b bg-gray-50">
                    <h3 class="text-xl font-bold text-center"><?= $service['name'] ?></h3>
                    <div class="flex justify-center my-4">
                        <span class="text-3xl font-bold"><?= number_format($service['price'], 0, ',', '.') ?>đ</span>
                    </div>
                </div>
                <div class="p-6">
                    <ul class="space-y-3">
                        <?php if (is_array($features)): ?>
                            <?php foreach ($features as $key => $value): ?>
                                <li class="flex items-center">
                                    <i data-lucide="check-circle-2" class="w-5 h-5 text-green-500 mr-2"></i>
                                    <span class="font-medium"><?= ucfirst($key) ?>:</span>
                                    <span class="ml-2"><?= $value ?></span>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                    <form action="<?= site_url('cart/add') ?>" method="post" class="mt-6">
                        <?= csrf_field() ?>
                        <input type="hidden" name="service_id" value="<?= $service['id'] ?>">
                        <button type="submit" class="w-full py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                            Thêm vào giỏ hàng
                        </button>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <!-- Dịch vụ Quảng cáo -->
    <div class="mb-10">
        <h2 class="text-2xl font-semibold mb-6">Dịch vụ Quảng cáo Facebook</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php foreach ($adsServices as $service): ?>
            <?php $features = json_decode($service['features'], true); ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 flex flex-col">
                <div class="p-6 border-b bg-gray-50">
                    <h3 class="text-xl font-bold"><?= $service['name'] ?></h3>
                    <div class="mt-2">
                        <span class="text-2xl font-bold"><?= number_format($service['price'], 0, ',', '.') ?>đ</span>
                        <span class="text-gray-500">/tháng</span>
                    </div>
                </div>
                <div class="p-6 flex-grow">
                    <p class="text-gray-600 mb-4"><?= $service['description'] ?></p>
                    <ul class="space-y-2 mb-6">
                        <?php if (is_array($features)): ?>
                            <?php foreach ($features as $feature): ?>
                                <li class="flex items-start">
                                    <i data-lucide="check" class="w-5 h-5 text-green-500 mr-2 flex-shrink-0 mt-1"></i>
                                    <span><?= esc($feature) ?></span>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="p-6 bg-gray-50">
                    <form action="<?= site_url('cart/add') ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="service_id" value="<?= $service['id'] ?>">
                        <button type="submit" class="w-full py-2 bg-indigo-600 text-white font-bold rounded-lg hover:bg-indigo-700 transition-colors flex items-center justify-center">
                            Đăng ký ngay
                        </button>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Dịch vụ Quản lý Fanpage -->
    <div class="mb-10">
        <h2 class="text-2xl font-semibold mb-6">Dịch vụ Quản lý Fanpage</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php foreach ($managementServices as $service): ?>
            <?php $features = json_decode($service['features'], true); ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 flex flex-col">
                <div class="p-6 border-b bg-gray-50">
                    <h3 class="text-xl font-bold"><?= $service['name'] ?></h3>
                    <div class="mt-2">
                        <span class="text-2xl font-bold"><?= number_format($service['price'], 0, ',', '.') ?>đ</span>
                        <span class="text-gray-500">/tháng</span>
                    </div>
                </div>
                <div class="p-6 flex-grow">
                     <p class="text-gray-600 mb-4"><?= $service['description'] ?></p>
                    <ul class="space-y-2 mb-6">
                        <?php if (is_array($features)): ?>
                            <?php foreach ($features as $feature): ?>
                                <li class="flex items-start">
                                    <i data-lucide="check" class="w-5 h-5 text-green-500 mr-2 flex-shrink-0 mt-1"></i>
                                    <span><?= esc($feature) ?></span>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="p-6 bg-gray-50">
                    <form action="<?= site_url('cart/add') ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="service_id" value="<?= $service['id'] ?>">
                        <button type="submit" class="w-full py-2 bg-indigo-600 text-white font-bold rounded-lg hover:bg-indigo-700 transition-colors flex items-center justify-center">
                            Đăng ký ngay
                        </button>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 