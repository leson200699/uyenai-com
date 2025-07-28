<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <form id="seo-order-form" action="<?= site_url('cart/addMultiple') ?>" method="post">
        <?= csrf_field() ?>
        <div id="form-service-ids"></div> <!-- Container for hidden inputs -->

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column: Options -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Step 1: Provide Information -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-bold mb-1">Bước 1: Cung Cấp Thông Tin</h2>
                    <p class="text-gray-500 mb-4">Chúng tôi cần các thông tin này để tiến hành phân tích và triển khai.</p>
                    <div class="space-y-4">
                        <div>
                            <label for="website_url" class="block text-sm font-medium text-gray-700 mb-1">Website của bạn <span class="text-red-500">*</span></label>
                            <input type="url" name="website_url" id="website_url" class="w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" placeholder="https://example.com" required>
                        </div>
                        <div>
                            <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Ghi chú hoặc Từ khóa mục tiêu</label>
                            <textarea name="notes" id="notes" rows="4" class="w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" placeholder="Ví dụ: Tập trung vào các từ khóa về 'dịch vụ marketing', 'giải pháp bán hàng'..."></textarea>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Choose Package -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-bold mb-1">Bước 2: Chọn Gói Dịch Vụ SEO (Có thể chọn nhiều)</h2>
                    <p class="text-gray-500 mb-4">Lựa chọn giải pháp phù hợp nhất với mục tiêu của bạn.</p>
                    <div id="package-options" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <?php if(!empty($services)): ?>
                            <?php foreach ($services as $service) : ?>
                                <div class="border rounded-xl p-6 cursor-pointer hover:border-indigo-500 transition-all flex flex-col package-card" data-id="<?= esc($service['id']) ?>" data-price="<?= esc($service['price']) ?>" data-name="<?= esc($service['name']) ?>">
                                    <h3 class="font-bold text-xl"><?= esc($service['name']) ?></h3>
                                    <p class="text-sm text-gray-600 mt-2 flex-grow"><?= esc($service['description']) ?></p>
                                    <p class="text-3xl font-bold my-4"><?= number_format($service['price']) ?>đ<span class="text-base font-normal text-gray-500">/tháng</span></p>
                                    <?php
                                        $features = json_decode($service['features'], true);
                                        if ($features) :
                                            echo '<ul class="space-y-2 text-sm text-left">';
                                            $count = 0;
                                            foreach ($features as $feature) {
                                                if ($count < 3) {
                                                    echo '<li class="flex items-center"><i data-lucide="check" class="w-4 h-4 mr-2 text-green-500"></i><span>' . esc($feature) . '</span></li>';
                                                }
                                                $count++;
                                            }
                                            if (count($features) > 3) {
                                                echo '<li class="text-indigo-600 font-semibold mt-2">+ ' . (count($features) - 3) . ' tính năng khác</li>';
                                            }
                                            echo '</ul>';
                                        endif;
                                    ?>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Right Column: Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-24">
                    <h2 class="text-xl font-bold border-b pb-4">Tóm Tắt Đơn Hàng</h2>
                    <div id="cart-summary" class="py-4 space-y-3">
                        <p class="text-gray-500">Vui lòng chọn một gói dịch vụ để bắt đầu.</p>
                    </div>
                    <div id="total-section" class="border-t pt-4 hidden">
                        <div class="flex justify-between font-bold text-lg">
                            <span>Tổng cộng</span>
                            <span id="total-price" class="text-indigo-600">0đ</span>
                        </div>
                        <button id="add-to-cart-btn" type="submit" class="w-full mt-4 py-3 text-center bg-indigo-600 text-white font-bold rounded-lg hover:bg-indigo-700 transition disabled:bg-gray-400" disabled>
                            Thêm Vào Giỏ Hàng
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<style>
.package-selected {
    border-color: #4f46e5;
    box-shadow: 0 0 0 2px #c7d2fe;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    lucide.createIcons();

    const packageOptions = document.getElementById('package-options');
    const cartSummary = document.getElementById('cart-summary');
    const totalSection = document.getElementById('total-section');
    const totalPriceEl = document.getElementById('total-price');
    const addToCartBtn = document.getElementById('add-to-cart-btn');
    const formServiceIdsContainer = document.getElementById('form-service-ids');
    const seoOrderForm = document.getElementById('seo-order-form');

    let selectedPackages = [];

    packageOptions.addEventListener('click', function(e) {
        const card = e.target.closest('.package-card');
        if (!card) return;

        const packageId = card.dataset.id;
        const packageData = {
            id: packageId,
            name: card.dataset.name,
            price: parseFloat(card.dataset.price)
        };

        const index = selectedPackages.findIndex(p => p.id === packageId);

        if (index > -1) {
            // Deselect
            selectedPackages.splice(index, 1);
            card.classList.remove('package-selected');
        } else {
            // Select
            selectedPackages.push(packageData);
            card.classList.add('package-selected');
        }
        
        updateSummary();
    });

    function updateSummary() {
        if (selectedPackages.length > 0) {
            let summaryHtml = '';
            let total = 0;
            
            selectedPackages.forEach(pkg => {
                summaryHtml += `
                    <div class="flex justify-between">
                        <span class="font-medium">${pkg.name}</span>
                        <span>${formatPrice(pkg.price)}đ</span>
                    </div>
                `;
                total += pkg.price;
            });
            
            cartSummary.innerHTML = summaryHtml;
            totalPriceEl.textContent = formatPrice(total) + 'đ';
            totalSection.classList.remove('hidden');
            addToCartBtn.disabled = false;
        } else {
            cartSummary.innerHTML = '<p class="text-gray-500">Vui lòng chọn một gói dịch vụ để bắt đầu.</p>';
            totalSection.classList.add('hidden');
            addToCartBtn.disabled = true;
        }
    }

    seoOrderForm.addEventListener('submit', function() {
        // Clear previous hidden inputs
        formServiceIdsContainer.innerHTML = '';
        
        // Create a hidden input for each selected service ID
        selectedPackages.forEach(pkg => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'service_ids[]';
            input.value = pkg.id;
            formServiceIdsContainer.appendChild(input);
        });
    });

    function formatPrice(price) {
        return new Intl.NumberFormat('vi-VN').format(price);
    }
});
</script>
<?= $this->endSection() ?> 