<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Page Title -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
            Dịch vụ Thiết kế <span class="text-indigo-600">Sáng tạo</span>
        </h1>
        <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
            Chúng tôi biến ý tưởng của bạn thành những sản phẩm thiết kế ấn tượng, chuyên nghiệp và hiệu quả.
        </p>
    </div>

    <!-- Services Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
        <?php foreach ($designServices as $service): ?>
            <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col transform hover:-translate-y-1 transition-transform duration-300">
                <div class="h-48 bg-cover bg-center" style="background-image: url('<?= esc($service['image']) ?>');"></div>
                <div class="p-6 flex-grow flex flex-col">
                    <h3 class="text-xl font-bold text-gray-900"><?= esc($service['name']) ?></h3>
                    <p class="mt-2 text-sm text-gray-600 flex-grow"><?= esc($service['description']) ?></p>
                    
                    <?php $features = json_decode($service['features'], true); ?>
                    <?php if (is_array($features)): ?>
                        <ul class="mt-4 space-y-2 text-sm">
                            <?php foreach ($features as $feature): ?>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span class="text-gray-700"><?= esc($feature) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    
                    <div class="mt-6 pt-4 border-t border-gray-200">
                        <p class="text-3xl font-bold text-indigo-600 text-center"><?= number_format($service['price'], 0, ',', '.') ?> VNĐ</p>
                        <form action="/cart/add" method="post" class="mt-4">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $service['id'] ?>">
                            <input type="hidden" name="name" value="<?= esc($service['name']) ?>">
                            <input type="hidden" name="price" value="<?= $service['price'] ?>">
                            <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-indigo-700 transition-colors duration-300 flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                Thêm vào giỏ
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Portfolio Section -->
    <div class="text-center mb-12">
        <h2 class="text-3xl font-extrabold text-gray-900">Dự án đã thực hiện</h2>
        <p class="mt-3 max-w-md mx-auto text-base text-gray-500">Nguồn cảm hứng từ những sản phẩm chúng tôi đã tạo ra.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php if (!empty($projects)): ?>
            <?php foreach ($projects as $project): ?>
                <div class="group relative bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="h-64 bg-gray-200">
                        <img src="<?= esc($project['image']) ?>" alt="<?= esc($project['name']) ?>" class="w-full h-full object-cover">
                    </div>
                    <div class="absolute inset-0 bg-black bg-opacity-60 flex flex-col justify-end p-6 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="text-sm font-semibold text-indigo-300"><?= esc($project['category']) ?></span>
                        <h3 class="mt-1 text-xl font-bold text-white"><?= esc($project['name']) ?></h3>
                        <p class="mt-2 text-sm text-gray-300"><?= esc($project['description']) ?></p>
                        <a href="<?= esc($project['url']) ?>" class="mt-4 inline-block text-white font-semibold border-b-2 border-indigo-400 self-start hover:border-white transition-colors duration-300">Xem chi tiết &rarr;</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center text-gray-500 col-span-full">Chưa có dự án nào để hiển thị.</p>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<style>
    .project-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .project-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
    .bg-primary-soft {
        background-color: rgba(var(--bs-primary-rgb), 0.1);
    }
</style>
<?= $this->endSection() ?> 