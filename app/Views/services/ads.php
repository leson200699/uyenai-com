<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    .item-selected {
        border-color: #4f46e5 !important;
        border-width: 2px !important;
        background-color: #eef2ff !important;
    }
    
    #budget-options button.item-selected {
        background-color: #4f46e5 !important;
        color: white !important;
    }
</style>
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Dịch Vụ Quảng Cáo</h1>
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Column: Options -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Step 1: Choose Platform -->
            <div>
                <h2 class="text-xl font-bold mb-4">Bước 1: Chọn Nền Tảng</h2>
                <div id="platform-options" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="border rounded-xl p-4 cursor-pointer hover:border-indigo-500 flex items-center gap-4" data-platform="Google Ads">
                        <img src="https://placehold.co/40x40/ffffff/db4437?text=G" class="w-10 h-10" alt="Google">
                        <div>
                            <h3 class="font-bold text-lg">Quảng cáo Google</h3>
                            <p class="text-sm text-gray-600">Tiếp cận khách hàng khi họ tìm kiếm.</p>
                        </div>
                    </div>
                    <div class="border rounded-xl p-4 cursor-pointer hover:border-indigo-500 flex items-center gap-4" data-platform="Facebook Ads">
                        <img src="https://placehold.co/40x40/ffffff/4267b2?text=f" class="w-10 h-10" alt="Facebook">
                        <div>
                            <h3 class="font-bold text-lg">Quảng cáo Facebook</h3>
                            <p class="text-sm text-gray-600">Nhắm mục tiêu chi tiết theo nhân khẩu học.</p>
                        </div>
    </div>
                </div>
            </div>
            
            <!-- Bảng giá dịch vụ -->
            <div>
                <h2 class="text-xl font-bold mb-4">Bảng Giá Dịch Vụ</h2>
                <div id="service-packages" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php foreach ($packages as $index => $package): ?>
                    <?php 
                        $features = json_decode($package['features'], true);
                        $isPopular = $index === 1; // Gói thứ 2 (Pro) là phổ biến nhất
                    ?>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden border <?= $isPopular ? 'border-2 border-indigo-500 transform scale-105' : 'border-gray-200 hover:border-indigo-300 transition-all' ?>" data-package="<?= $package['id'] ?>" data-price="<?= $package['price'] ?>">
                        <?php if ($isPopular): ?>
                        <div class="absolute top-0 right-0">
                            <div class="bg-indigo-500 text-white text-xs font-bold px-3 py-1 rounded-bl-lg">
                                PHỔ BIẾN
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="p-6 border-b <?= $isPopular ? 'bg-indigo-50' : 'bg-gray-50' ?>">
                            <h3 class="text-xl font-bold text-center"><?= $package['name'] ?></h3>
                            <div class="flex justify-center my-4">
                                <span class="text-3xl font-bold"><?= number_format($package['price'], 0, ',', '.') ?>đ</span>
                                <span class="text-gray-500 self-end ml-1">/<?= $package['duration'] === 'month' ? 'tháng' : 'năm' ?></span>
                            </div>
                        </div>
                        <div class="p-6">
                            <ul class="space-y-3">
                                <?php foreach ($features as $feature): ?>
                                <li class="flex items-center">
                                    <i data-lucide="check" class="w-5 h-5 text-green-500 mr-2"></i>
                                    <span><?= $feature ?></span>
                </li>
                                <?php endforeach; ?>
            </ul>
                            <button type="button" class="w-full mt-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors select-package-btn">
                                Chọn Gói Này
                            </button>
                        </div>
        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <!-- Step 2: Set Budget -->
            <div>
                <h2 class="text-xl font-bold mb-4">Bước 2: Xác Định Ngân Sách Tháng</h2>
                <div class="bg-white p-4 rounded-xl border">
                     <div id="budget-options" class="flex flex-wrap gap-2 mb-4">
                        <button class="px-4 py-2 border rounded-lg hover:border-indigo-500" data-budget="5000000">5 Triệu</button>
                        <button class="px-4 py-2 border rounded-lg hover:border-indigo-500" data-budget="10000000">10 Triệu</button>
                        <button class="px-4 py-2 border rounded-lg hover:border-indigo-500" data-budget="20000000">20 Triệu</button>
                    </div>
                     <input id="custom-budget" type="number" placeholder="Hoặc nhập số tiền khác (VND)" class="w-full mt-2 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" min="1000000" step="100000">
                </div>
            </div>
                
            <!-- Step 3: Choose Goals -->
            <div>
                <h2 class="text-xl font-bold mb-4">Bước 3: Chọn Mục Tiêu Chiến Dịch</h2>
                <div id="goal-options" class="bg-white p-4 rounded-xl border grid grid-cols-1 md:grid-cols-2 gap-4">
                    <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" class="h-5 w-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" name="goal" value="Nhận diện thương hiệu">
                        <span>Tăng nhận diện thương hiệu</span>
                    </label>
                     <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" class="h-5 w-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" name="goal" value="Lưu lượng truy cập">
                        <span>Tăng lưu lượng truy cập Website</span>
                    </label>
                     <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" class="h-5 w-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" name="goal" value="Khách hàng tiềm năng">
                        <span>Thu hút khách hàng tiềm năng</span>
                    </label>
                     <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" class="h-5 w-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" name="goal" value="Doanh số">
                        <span>Tăng doanh số bán hàng</span>
                    </label>
        </div>
    </div>
    
            <!-- Quy trình triển khai -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold mb-6">Quy Trình Triển Khai</h2>
                    
            <div class="grid grid-cols-1 md:grid-cols-6 gap-6">
                <div class="flex flex-col items-center text-center">
                    <div class="flex justify-center mb-4">
                        <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center">
                            <span class="font-bold text-indigo-600">1</span>
                        </div>
                    </div>
                    <h3 class="font-semibold">Phân Tích</h3>
                    <p class="text-sm text-gray-600 mt-2">Nghiên cứu thị trường & đối thủ cạnh tranh</p>
                </div>
                
                <div class="flex flex-col items-center text-center">
                    <div class="flex justify-center mb-4">
                        <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center">
                            <span class="font-bold text-indigo-600">2</span>
                        </div>
                    </div>
                    <h3 class="font-semibold">Chiến Lược</h3>
                    <p class="text-sm text-gray-600 mt-2">Xây dựng chiến lược quảng cáo phù hợp</p>
                </div>
                
                <div class="flex flex-col items-center text-center">
                    <div class="flex justify-center mb-4">
                        <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center">
                            <span class="font-bold text-indigo-600">3</span>
                        </div>
                    </div>
                    <h3 class="font-semibold">Thiết Kế</h3>
                    <p class="text-sm text-gray-600 mt-2">Tạo nội dung và hình ảnh quảng cáo</p>
                </div>
                
                <div class="flex flex-col items-center text-center">
                    <div class="flex justify-center mb-4">
                        <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center">
                            <span class="font-bold text-indigo-600">4</span>
                        </div>
                    </div>
                    <h3 class="font-semibold">Triển Khai</h3>
                    <p class="text-sm text-gray-600 mt-2">Thiết lập và chạy chiến dịch quảng cáo</p>
                </div>
                
                <div class="flex flex-col items-center text-center">
                    <div class="flex justify-center mb-4">
                        <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center">
                            <span class="font-bold text-indigo-600">5</span>
                        </div>
                    </div>
                    <h3 class="font-semibold">Theo Dõi</h3>
                    <p class="text-sm text-gray-600 mt-2">Giám sát và tối ưu hóa chiến dịch</p>
                </div>
                
                <div class="flex flex-col items-center text-center">
                    <div class="flex justify-center mb-4">
                        <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center">
                            <span class="font-bold text-indigo-600">6</span>
                        </div>
                    </div>
                    <h3 class="font-semibold">Báo Cáo</h3>
                    <p class="text-sm text-gray-600 mt-2">Báo cáo kết quả và đề xuất cải tiến</p>
                </div>
                </div>
            </div>
        </div>
    </div>
    
        <!-- Right Column: Cart Summary -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl border shadow-sm sticky top-24">
                <h2 class="text-xl font-bold p-4 border-b">Tóm Tắt Yêu Cầu</h2>
                <div id="cart-items" class="p-4 space-y-3 text-sm">
                    <p class="text-gray-500">Vui lòng chọn các tùy chọn.</p>
                </div>
                <div class="p-4 border-t">
                    <div class="flex justify-between font-bold text-lg">
                        <span>Tổng Chi Phí</span>
                        <span id="total-price">0đ</span>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Đã bao gồm phí quản lý. Ngân sách quảng cáo sẽ được tính riêng.</p>
                </div>
                <div class="p-4">
                    <form action="<?= site_url('cart/add') ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="service_id" id="cart-service-id" value="<?= isset($packages[0]) ? $packages[0]['id'] : 'ads-package-basic' ?>">
                        <input type="hidden" name="duration" value="1">
                        <input type="hidden" name="platform" id="cart-platform" value="">
                        <input type="hidden" name="budget" id="cart-budget" value="0">
                        <input type="hidden" name="goals" id="cart-goals" value="">
                        <input type="hidden" name="package" id="cart-package" value="">
                        <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-3 rounded-lg hover:bg-indigo-700">
                            Gửi Yêu Cầu
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    lucide.createIcons();

    // Cart logic
    const cart = {
        platform: null,
        budget: 0,
        goals: [],
        package: null,
        packagePrice: 0
    };

    const platformOptions = document.getElementById('platform-options');
    const servicePackages = document.getElementById('service-packages');
    const budgetOptions = document.getElementById('budget-options');
    const customBudgetInput = document.getElementById('custom-budget');
    const goalOptions = document.getElementById('goal-options');
    const cartItemsEl = document.getElementById('cart-items');
    const totalPriceEl = document.getElementById('total-price');
    const cartPlatformInput = document.getElementById('cart-platform');
    const cartBudgetInput = document.getElementById('cart-budget');
    const cartGoalsInput = document.getElementById('cart-goals');
    const cartPackageInput = document.getElementById('cart-package');

    function formatCurrency(amount) {
        return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(amount);
    }

    function updateCart() {
        cartItemsEl.innerHTML = '';
        let totalPrice = cart.packagePrice || 0;
        
        if (!cart.platform && cart.budget === 0 && cart.goals.length === 0 && !cart.package) {
            cartItemsEl.innerHTML = '<p class="text-gray-500">Vui lòng chọn các tùy chọn.</p>';
            totalPriceEl.textContent = formatCurrency(0);
            return;
        }

        if(cart.package) {
            cartItemsEl.innerHTML += `
                <div class="flex justify-between">
                    <span>Gói dịch vụ</span>
                    <span class="font-medium">${cart.package}</span>
                </div>`;
        }

        if(cart.platform) {
            cartItemsEl.innerHTML += `
                <div class="flex justify-between">
                    <span>Nền tảng</span>
                    <span class="font-medium">${cart.platform}</span>
                </div>`;
        }
        
        if(cart.budget > 0) {
            cartItemsEl.innerHTML += `
                <div class="flex justify-between">
                    <span>Ngân sách/tháng</span>
                    <span class="font-medium">${formatCurrency(cart.budget)}</span>
                </div>`;
        }
        
        if(cart.goals.length > 0) {
            cartItemsEl.innerHTML += `
                <div>
                    <p>Mục tiêu:</p>
                    <ul class="list-disc pl-5 mt-1 text-gray-600">
                        ${cart.goals.map(goal => `<li>${goal}</li>`).join('')}
                    </ul>
                </div>
            `;
        }

        totalPriceEl.textContent = formatCurrency(totalPrice);
        cartPlatformInput.value = cart.platform || '';
        cartBudgetInput.value = cart.budget || 0;
        cartGoalsInput.value = JSON.stringify(cart.goals || []);
        cartPackageInput.value = cart.package || '';
    }

    // Event Listeners
    platformOptions.addEventListener('click', (e) => {
        const selected = e.target.closest('[data-platform]');
        if (!selected) return;
        
        // Remove selection from all platforms
        document.querySelectorAll('[data-platform]').forEach(el => {
            el.classList.remove('item-selected');
        });
        
        // Add selection to clicked platform
        selected.classList.add('item-selected');
        
        cart.platform = selected.dataset.platform;
        updateCart();
    });
    
    // Service Package Selection
    servicePackages.addEventListener('click', (e) => {
        const button = e.target.closest('.select-package-btn');
        if (!button) return;
        
        const packageCard = button.closest('[data-package]');
        if (!packageCard) return;
        
        // Remove selection from all packages
        document.querySelectorAll('#service-packages [data-package]').forEach(el => {
            el.classList.remove('border-2', 'border-indigo-500', 'transform', 'scale-105');
            el.classList.add('border', 'border-gray-200', 'hover:border-indigo-300');
        });
        
        // Add selection to clicked package
        packageCard.classList.remove('border', 'border-gray-200', 'hover:border-indigo-300');
        packageCard.classList.add('border-2', 'border-indigo-500', 'transform', 'scale-105');
        
        // Update cart
        const packageId = packageCard.dataset.package;
        cart.package = packageCard.querySelector('h3').textContent;
        cart.packagePrice = parseInt(packageCard.dataset.price) || 0;
        
        // Cập nhật service_id
        document.getElementById('cart-service-id').value = packageId;
        
        updateCart();
    });
    
    budgetOptions.addEventListener('click', (e) => {
        const selected = e.target.closest('[data-budget]');
        if(!selected) return;
        
        // Remove selection from all budget options
        document.querySelectorAll('#budget-options button').forEach(el => {
            el.classList.remove('item-selected');
        });
        
        // Add selection to clicked budget option
        selected.classList.add('item-selected');
        
        cart.budget = parseInt(selected.dataset.budget) || 0;
        customBudgetInput.value = '';
        updateCart();
    });
    
    customBudgetInput.addEventListener('input', (e) => {
        // Remove selection from all budget options when custom input is used
        document.querySelectorAll('#budget-options button').forEach(el => {
            el.classList.remove('item-selected');
        });
        
        cart.budget = parseInt(e.target.value) || 0;
        updateCart();
    });

    goalOptions.addEventListener('change', (e) => {
        if(e.target.name === 'goal') {
            cart.goals = Array.from(document.querySelectorAll('input[name="goal"]:checked')).map(el => el.value);
            updateCart();
        }
    });

    // Initialize cart
    updateCart();

    // Thêm debug log khi submit form
    document.querySelector('form').addEventListener('submit', function(e) {
        // Log các giá trị trước khi submit
        console.log('Submitting form with values:');
        console.log('Service ID:', document.getElementById('cart-service-id').value);
        console.log('Platform:', document.getElementById('cart-platform').value);
        console.log('Budget:', document.getElementById('cart-budget').value);
        console.log('Goals:', document.getElementById('cart-goals').value);
        console.log('Package:', document.getElementById('cart-package').value);
    });
</script> 
<?= $this->endSection() ?> 