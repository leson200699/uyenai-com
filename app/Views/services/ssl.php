<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Chứng chỉ Bảo mật SSL</h1>
    
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-4">Bảo vệ Website và Tăng Uy Tín</h2>
            <p class="mb-4 text-gray-600">Chứng chỉ SSL (Secure Sockets Layer) mã hóa dữ liệu giữa máy chủ và trình duyệt của người dùng, đảm bảo mọi thông tin trao đổi đều được bảo mật. Điều này không chỉ bảo vệ khách hàng của bạn mà còn là một yếu tố quan trọng giúp tăng thứ hạng trên Google.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 my-8">
                <div class="flex flex-col items-center p-4 bg-green-50 rounded-lg">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="lock" class="w-8 h-8 text-green-600"></i>
                                </div>
                    <h3 class="text-lg font-semibold mb-2">Mã hóa mạnh mẽ</h3>
                    <p class="text-center text-gray-600">Bảo vệ dữ liệu nhạy cảm của khách hàng.</p>
                    </div>

                <div class="flex flex-col items-center p-4 bg-green-50 rounded-lg">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="shield-check" class="w-8 h-8 text-green-600"></i>
                                </div>
                    <h3 class="text-lg font-semibold mb-2">Tăng uy tín</h3>
                    <p class="text-center text-gray-600">Biểu tượng ổ khóa an toàn tạo niềm tin cho người dùng.</p>
                    </div>

                <div class="flex flex-col items-center p-4 bg-green-50 rounded-lg">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="trending-up" class="w-8 h-8 text-green-600"></i>
                                </div>
                    <h3 class="text-lg font-semibold mb-2">Cải thiện SEO</h3>
                    <p class="text-center text-gray-600">Google ưu tiên xếp hạng các website có SSL.</p>
                        </div>
                    </div>
                </div>
            </div>

    <!-- Pricing Plans -->
    <div class="mb-10">
        <h2 class="text-2xl font-semibold mb-6">Bảng giá Chứng chỉ SSL</h2>
        
        <?php if (!empty($services)): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($services as $index => $service): ?>
                                <?php
                                $features = json_decode($service['features'], true);
                $isPopular = $index === 1; 
                                ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden border <?= $isPopular ? 'border-2 border-green-500' : 'border-gray-200 hover:border-green-300' ?> transition-all flex flex-col">
                <?php if ($isPopular): ?>
                <div class="bg-green-500 text-white text-xs font-bold px-3 py-1 text-center">
                    PHỔ BIẾN
                                </div>
                                <?php endif; ?>
                <div class="p-6 border-b <?= $isPopular ? 'bg-green-50' : 'bg-gray-50' ?> text-center">
                    <h3 class="text-xl font-bold"><?= esc($service['name']) ?></h3>
                    <div class="my-4">
                        <span class="text-3xl font-bold"><?= number_format($service['price'], 0, ',', '.') ?>đ</span>
                        <span class="text-gray-500 self-end ml-1">/năm</span>
                            </div>
                </div>
                <div class="p-6 flex-grow flex flex-col">
                    <ul class="space-y-3 mb-6">
                        <?php if (!empty($features) && is_array($features)): ?>
                            <?php foreach ($features as $feature): ?>
                            <li class="flex items-start">
                                <i data-lucide="check" class="w-5 h-5 text-green-500 mr-2 flex-shrink-0 mt-1"></i>
                                <span><?= esc($feature) ?></span>
                            </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                    <form action="<?= site_url('cart/add') ?>" method="post" class="mt-auto">
                        <?= csrf_field() ?>
                        <input type="hidden" name="service_id" value="<?= esc($service['id']) ?>">
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="type" value="service">
                        
                        <button type="submit" class="w-full py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                            Thêm vào giỏ hàng
                        </button>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
            <div class="text-center py-12 px-6 bg-gray-50 rounded-lg">
                <i data-lucide="info" class="w-16 h-16 mx-auto text-gray-400"></i>
                <h3 class="mt-4 text-lg font-semibold text-gray-700">Chưa có dịch vụ SSL</h3>
                <p class="mt-2 text-gray-500">Hiện tại chúng tôi chưa cung cấp dịch vụ SSL. Vui lòng quay lại sau.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const faqButtons = document.querySelectorAll('dl dt button');
        faqButtons.forEach(button => {
            button.addEventListener('click', () => {
                const answer = button.parentElement.nextElementSibling;
                const icon = button.querySelector('i');

                if (answer.classList.contains('hidden')) {
                    answer.classList.remove('hidden');
                    icon.classList.add('rotate-180');
                } else {
                    answer.classList.add('hidden');
                    icon.classList.remove('rotate-180');
                }
            });
            // Initially hide all answers
            button.parentElement.nextElementSibling.classList.add('hidden');
        });
    });
</script>
<?= $this->endSection() ?>