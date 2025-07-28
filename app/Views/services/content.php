<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= $title ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-4">Dịch Vụ Viết Nội Dung Sáng Tạo</h1>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto">
            Chúng tôi biến ý tưởng thành những con chữ có sức mạnh, giúp thương hiệu của bạn kết nối, thu hút và chinh phục khách hàng mục tiêu.
        </p>
    </div>
    
    <!-- Content Website Section -->
    <div class="mb-16">
        <div class="bg-indigo-50 rounded-lg p-8 mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Nội Dung Website Chuyên Nghiệp</h2>
            <p class="text-gray-600">Xây dựng nền tảng vững chắc cho website của bạn với các bài viết chuẩn SEO, cung cấp giá trị cho người đọc và tăng hạng trên Google.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach($websiteServices as $service): ?>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col transform transition hover:scale-105 border border-gray-200">
                    <div class="p-6 flex-grow">
                        <h3 class="text-xl font-bold text-gray-900 mb-3"><?= esc($service['name']) ?></h3>
                        <p class="text-gray-600 mb-4 flex-grow"><?= esc($service['description']) ?></p>
                        <ul class="space-y-3 mb-6">
                            <?php $features = json_decode($service['features'], true); ?>
                            <?php if(is_array($features)): foreach($features as $feature): ?>
                            <li class="flex items-start">
                                <i data-lucide="check-circle-2" class="w-5 h-5 text-green-500 mr-2 mt-1 flex-shrink-0"></i>
                                <span><?= esc($feature) ?></span>
                </li>
                            <?php endforeach; endif; ?>
            </ul>
        </div>
                    <div class="p-6 bg-gray-50 border-t">
                        <div class="text-center mb-4">
                            <span class="text-3xl font-extrabold text-indigo-600"><?= number_format($service['price'], 0, ',', '.') ?>đ</span>
                            <span class="text-gray-500">/ bài</span>
                        </div>
                        <form action="<?= site_url('cart/add') ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="service_id" value="<?= esc($service['id']) ?>">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="w-full py-3 bg-indigo-600 text-white font-bold rounded-lg hover:bg-indigo-700 transition-colors">Đặt Bài Viết</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
                        </div>
                    </div>

    <!-- Content Facebook Section -->
    <div class="mb-16">
        <div class="bg-green-50 rounded-lg p-8 mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Chăm Sóc Fanpage Toàn Diện</h2>
            <p class="text-gray-600">Biến Fanpage của bạn thành một cộng đồng sôi động, tăng tương tác và thúc đẩy doanh số bán hàng hiệu quả.</p>
                </div>
                
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach($facebookServices as $service): ?>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col transform transition hover:scale-105 border border-gray-200">
                    <div class="p-6 flex-grow">
                        <h3 class="text-xl font-bold text-gray-900 mb-3"><?= esc($service['name']) ?></h3>
                        <p class="text-gray-600 mb-4 flex-grow"><?= esc($service['description']) ?></p>
                        <ul class="space-y-3 mb-6">
                            <?php $features = json_decode($service['features'], true); ?>
                            <?php if(is_array($features)): foreach($features as $feature): ?>
                            <li class="flex items-start">
                                <i data-lucide="check-circle-2" class="w-5 h-5 text-green-500 mr-2 mt-1 flex-shrink-0"></i>
                                <span><?= esc($feature) ?></span>
                            </li>
                            <?php endforeach; endif; ?>
                        </ul>
                    </div>
                    <div class="p-6 bg-gray-50 border-t">
                        <div class="text-center mb-4">
                            <span class="text-3xl font-extrabold text-indigo-600"><?= number_format($service['price'], 0, ',', '.') ?>đ</span>
                            <span class="text-gray-500">/ tháng</span>
                        </div>
                        <form action="<?= site_url('cart/add') ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="service_id" value="<?= esc($service['id']) ?>">
                            <button type="submit" class="w-full py-3 bg-indigo-600 text-white font-bold rounded-lg hover:bg-indigo-700 transition-colors">Đăng Ký Gói</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <!-- FAQ Section remains the same -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-12">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-6">Câu hỏi thường gặp</h2>
            <div class="space-y-4">
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="faq-button flex justify-between items-center w-full px-6 py-4 text-left font-semibold">
                        <span>Nội dung chuẩn SEO là gì?</span>
                        <i data-lucide="plus" class="w-5 h-5"></i>
                    </button>
                    <div class="faq-content hidden px-6 py-4 bg-gray-50 border-t">
                        <p>Nội dung chuẩn SEO là bài viết được tối ưu để thân thiện với các công cụ tìm kiếm như Google...</p>
                    </div>
                </div>
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="faq-button flex justify-between items-center w-full px-6 py-4 text-left font-semibold">
                        <span>Tôi cần chuẩn bị gì để đặt hàng dịch vụ content?</span>
                        <i data-lucide="plus" class="w-5 h-5"></i>
                    </button>
                    <div class="faq-content hidden px-6 py-4 bg-gray-50 border-t">
                        <p>Để đặt hàng dịch vụ viết nội dung hiệu quả, bạn nên chuẩn bị: (1) Thông tin về đối tượng khách hàng mục tiêu...</p>
                    </div>
                </div>
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="faq-button flex justify-between items-center w-full px-6 py-4 text-left font-semibold">
                        <span>Tôi có thể yêu cầu chỉnh sửa bài viết không?</span>
                        <i data-lucide="plus" class="w-5 h-5"></i>
                    </button>
                    <div class="faq-content hidden px-6 py-4 bg-gray-50 border-t">
                        <p>Có, bạn có thể yêu cầu chỉnh sửa bài viết. Chúng tôi cung cấp 2 lần chỉnh sửa miễn phí...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.faq-button').forEach(button => {
        button.addEventListener('click', () => {
            const content = button.nextElementSibling;
            const icon = button.querySelector('[data-lucide]');
            
            content.classList.toggle('hidden');
            if (content.classList.contains('hidden')) {
                icon.setAttribute('data-lucide', 'plus');
            } else {
                icon.setAttribute('data-lucide', 'minus');
            }
            lucide.createIcons();
        });
    });
});
</script> 
<?= $this->endSection() ?> 