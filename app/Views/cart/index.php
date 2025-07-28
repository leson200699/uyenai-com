<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Giỏ Hàng</h1>
        <p class="text-gray-600 mt-1">Quản lý sản phẩm và dịch vụ trong giỏ hàng của bạn</p>
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
    
    <?php if (session()->getFlashdata('warning')): ?>
    <div class="mb-4 p-4 bg-yellow-50 border border-yellow-200 rounded-lg flex items-start">
        <i data-lucide="alert-triangle" class="w-5 h-5 text-yellow-500 mr-3 flex-shrink-0"></i>
        <p class="text-yellow-700"><?= session()->getFlashdata('warning') ?></p>
    </div>
    <?php endif; ?>
    
    <?php 
    // Kiểm tra xem giỏ hàng có trống không - hỗ trợ cả cấu trúc mới và cũ
    $isEmpty = true;
    
    if (is_array($cartItems)) {
        // Cấu trúc mới - mảng các mục
        $isEmpty = empty($cartItems);
    } else {
        // Cấu trúc cũ - mảng với các danh mục
        $isEmpty = empty($cartItems['items']);
    }
    
    if ($isEmpty): 
    ?>
    <!-- Giỏ hàng trống -->
    <div class="bg-white rounded-xl shadow-sm p-8 text-center">
        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i data-lucide="shopping-cart" class="w-10 h-10 text-gray-400"></i>
        </div>
        <h2 class="text-xl font-bold text-gray-900 mb-2">Giỏ hàng trống</h2>
        <p class="text-gray-600 mb-6">Bạn chưa có sản phẩm hoặc dịch vụ nào trong giỏ hàng</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="<?= site_url('products') ?>" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
            <i data-lucide="shopping-bag" class="w-5 h-5 mr-2"></i>
                Xem sản phẩm
            </a>
            <a href="<?= site_url('ai-accounts') ?>" class="inline-flex items-center px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                <i data-lucide="sparkles" class="w-5 h-5 mr-2"></i>
                Xem tài khoản AI
            </a>
            <a href="<?= site_url('services') ?>" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                <i data-lucide="server" class="w-5 h-5 mr-2"></i>
                Xem dịch vụ
            </a>
        </div>
    </div>
    
    <?php else: ?>
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Cart Items -->
        <div class="lg:col-span-2 space-y-6">

            <!-- Existing Domain Notice -->
            <?php if (!empty($cartItems['existingDomain'])): ?>
            <div class="p-4 bg-blue-50 border border-blue-200 rounded-lg flex items-start">
                <i data-lucide="globe" class="w-5 h-5 text-blue-500 mr-3 flex-shrink-0 mt-1"></i>
                <div>
                    <h3 class="font-semibold text-blue-800">Sử dụng tên miền đã có</h3>
                    <p class="text-blue-700">Bạn đã cung cấp tên miền: <strong class="font-bold"><?= esc($cartItems['existingDomain']) ?></strong>. Chúng tôi sẽ cấu hình website mới của bạn với tên miền này.</p>
                </div>
            </div>
            <?php endif; ?>
            
            <?php
            // Hiển thị giỏ hàng đã được chuẩn hóa
            $products = $cartItems['products'] ?? [];
            $servicesByCategory = $cartItems['servicesByCategory'] ?? [];
            $categoryNames = $cartItems['categoryNames'] ?? [];
            ?>

            <!-- Sản phẩm -->
            <?php if (!empty($products)): ?>
            <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
                <div class="p-4 bg-gray-50 border-b">
                    <h2 class="font-bold text-lg text-gray-900">Sản phẩm (<?= count($products) ?>)</h2>
                </div>
                
                <div class="divide-y">
                    <?php foreach ($products as $id => $item): ?>
                    <div class="p-4">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center">
                            <!-- Hình ảnh -->
                            <div class="flex-shrink-0 mb-3 sm:mb-0">
                                <img src="<?= $item['image'] ?? 'https://placehold.co/300x300/e2e8f0/1e293b?text=Product' ?>" alt="<?= $item['name'] ?>" class="w-20 h-20 object-cover rounded-lg">
                                </div>
                                
                                <!-- Thông tin -->
                                <div class="flex-grow sm:ml-4">
                                    <h3 class="font-medium text-gray-900"><?= $item['name'] ?></h3>
                                    <p class="text-indigo-600 font-bold mt-1"><?= number_format($item['price']) ?>đ</p>
                                    
                                    <div class="flex items-center mt-3">
                                        <form action="<?= site_url('cart/update') ?>" method="post" class="flex items-center quantity-form">
                                            <?= csrf_field() ?>
                                            <span class="text-sm text-gray-600 mr-2">Số lượng:</span>
                                        <div class="flex items-center border rounded-lg">
                                            <button type="button" class="decrement-btn px-3 py-1 text-gray-600 hover:bg-gray-100">
                                                <i data-lucide="minus" class="w-4 h-4"></i>
                                            </button>
                                            <input type="number" name="updates[<?= $id ?>][quantity]" value="<?= $item['quantity'] ?>" min="1" class="w-12 border-0 text-center focus:ring-0 product-quantity" data-id="<?= $id ?>" data-price="<?= $item['price'] ?>">
                                            <button type="button" class="increment-btn px-3 py-1 text-gray-600 hover:bg-gray-100">
                                                <i data-lucide="plus" class="w-4 h-4"></i>
                                            </button>
                                        </div>
                                            <button type="submit" class="ml-2 px-3 py-1 text-sm text-blue-700 hover:bg-blue-50 rounded-lg border border-blue-300">
                                                <i data-lucide="check" class="w-4 h-4"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                
                                <!-- Giá và action buttons -->
                                <div class="mt-3 sm:mt-0 ml-auto sm:ml-4 flex flex-col items-end">
                                    <p class="font-bold text-lg text-indigo-600 item-subtotal" data-id="<?= $id ?>"><?= number_format($item['subtotal']) ?>đ</p>
                                    
                                    <form action="<?= site_url('cart/remove') ?>" method="post" class="mt-2">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="id" value="<?= $id ?>">
                                        <button type="submit" class="text-red-600 hover:text-red-800 flex items-center text-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                                            <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                                            Xóa
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Dịch vụ -->
            <?php if (!empty($servicesByCategory)): ?>
            <?php foreach ($servicesByCategory as $category => $services): ?>
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
                    <div class="p-4 
                        <?php switch($category):
                            case 'seo': echo 'bg-indigo-50 border-b border-indigo-100'; break;
                            case 'email-marketing': echo 'bg-blue-50 border-b border-blue-100'; break;
                            case 'maps': echo 'bg-green-50 border-b border-green-100'; break;
                            case 'hosting': echo 'bg-orange-50 border-b border-orange-100'; break;
                            case 'domain': echo 'bg-amber-50 border-b border-amber-100'; break;
                            case 'vps': echo 'bg-purple-50 border-b border-purple-100'; break;
                            default: echo 'bg-gray-50 border-b border-gray-100';
                        endswitch; ?>">
                        <h2 class="font-bold text-lg 
                        <?php switch($category):
                            case 'seo': echo 'text-indigo-800'; break;
                            case 'email-marketing': echo 'text-blue-800'; break;
                            case 'maps': echo 'text-green-800'; break;
                            case 'hosting': echo 'text-orange-800'; break;
                            case 'domain': echo 'text-amber-800'; break;
                            case 'vps': echo 'text-purple-800'; break;
                            default: echo 'text-gray-800';
                        endswitch; ?>">
                    <?= $categoryNames[$category] ?? ucfirst($category) ?> (<?= count($services) ?>)</h2>
                    </div>
                    
                    <div class="divide-y">
                        <?php foreach ($services as $id => $item): ?>
                        <div class="p-4">
                            <div class="flex flex-col sm:flex-row items-start">
                                <!-- Hình ảnh -->
                                <div class="flex-shrink-0 mb-3 sm:mb-0">
                                    <img src="<?= $item['image'] ?>" alt="<?= $item['name'] ?>" class="w-20 h-20 object-cover rounded-lg">
                                </div>
                                
                                <!-- Thông tin -->
                                <div class="flex-grow sm:ml-4">
                                    <div class="flex items-center flex-wrap gap-2">
                                        <h3 class="font-medium text-gray-900"><?= $item['name'] ?></h3>
                                        <span class="px-2 py-0.5 
                                        <?php switch($category):
                                            case 'seo': echo 'bg-indigo-100 text-indigo-800'; break;
                                            case 'email-marketing': echo 'bg-blue-100 text-blue-800'; break;
                                            case 'maps': echo 'bg-green-100 text-green-800'; break;
                                            case 'hosting': echo 'bg-orange-100 text-orange-800'; break;
                                            case 'domain': echo 'bg-amber-100 text-amber-800'; break;
                                            case 'vps': echo 'bg-purple-100 text-purple-800'; break;
                                            default: echo 'bg-gray-100 text-gray-800';
                                        endswitch; ?> text-xs font-medium rounded-full">
                                        <?= $categoryNames[$category] ?? ucfirst($category) ?>
                                        </span>
                                    </div>
                                    
                                    <p class="
                                    <?php switch($category):
                                        case 'seo': echo 'text-indigo-600'; break;
                                        case 'email-marketing': echo 'text-blue-600'; break;
                                        case 'maps': echo 'text-green-600'; break;
                                        case 'hosting': echo 'text-orange-600'; break;
                                        case 'domain': echo 'text-amber-600'; break;
                                        case 'vps': echo 'text-purple-600'; break;
                                        default: echo 'text-gray-600';
                                    endswitch; ?> font-bold mt-1"><?= number_format($item['price']) ?>đ/tháng</p>
                                    
                                    <p class="text-sm text-gray-600 mt-1"><?= esc($item['description'] ?? '') ?></p>
                                    <?php if (isset($item['features']) && is_array($item['features']) && !empty($item['features'])): ?>
                                        <div class="text-xs text-gray-600 mt-2 space-y-1">
                                            <?php foreach ($item['features'] as $key => $value): ?>
                                                <div class="flex items-start">
                                                    <i data-lucide="check" class="w-3.5 h-3.5 text-green-500 mr-1.5 flex-shrink-0 mt-0.5"></i>
                                                    <span>
                                                        <?php if (!is_numeric($key)): ?>
                                                            <strong class="font-medium"><?= esc(ucfirst(str_replace('_', ' ', $key))) ?>:</strong>
                                                        <?php endif; ?>
                                                        <?php if (is_array($value)): ?>
                                                            <?= esc(implode(', ', $value)) ?>
                                                        <?php else: ?>
                                                            <?= esc($value) ?>
                                                        <?php endif; ?>
                                                    </span>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <form action="<?= site_url('cart/update') ?>" method="post" class="mt-3 flex items-center">
                                        <?= csrf_field() ?>
                                        <span class="text-sm text-gray-600 mr-2">Thời hạn:</span>
                                        <div class="flex items-center">
                                            <select name="updates[<?= $id ?>][quantity]" class="border-gray-300 rounded-md text-sm focus:ring-blue-500 focus:border-blue-500 service-duration" data-id="<?= $id ?>" data-price="<?= $item['price'] ?>">
                                                <option value="1" <?= $item['duration'] == 1 ? 'selected' : '' ?>>1 tháng</option>
                                                <option value="3" <?= $item['duration'] == 3 ? 'selected' : '' ?>>3 tháng</option>
                                                <option value="6" <?= $item['duration'] == 6 ? 'selected' : '' ?>>6 tháng</option>
                                                <option value="12" <?= $item['duration'] == 12 ? 'selected' : '' ?>>12 tháng</option>
                                            </select>
                                            <button type="submit" class="ml-2 px-3 py-1 text-sm 
                                            <?php switch($category):
                                                case 'seo': echo 'text-indigo-700 hover:bg-indigo-50 border-indigo-300'; break;
                                                case 'email-marketing': echo 'text-blue-700 hover:bg-blue-50 border-blue-300'; break;
                                                case 'maps': echo 'text-green-700 hover:bg-green-50 border-green-300'; break;
                                                case 'hosting': echo 'text-orange-700 hover:bg-orange-50 border-orange-300'; break;
                                                case 'domain': echo 'text-amber-700 hover:bg-amber-50 border-amber-300'; break;
                                                case 'vps': echo 'text-purple-700 hover:bg-purple-50 border-purple-300'; break;
                                                default: echo 'text-gray-700 hover:bg-gray-50 border-gray-300';
                                            endswitch; ?> rounded-lg border">
                                                <i data-lucide="check" class="w-4 h-4"></i>
                            </button>
                                        </div>
                                    </form>
                                </div>
                                
                                <!-- Giá và action buttons -->
                                <div class="mt-3 sm:mt-0 ml-auto sm:ml-4 flex flex-col items-end">
                                    <p class="font-bold text-lg 
                                    <?php switch($category):
                                        case 'seo': echo 'text-indigo-600'; break;
                                        case 'email-marketing': echo 'text-blue-600'; break;
                                        case 'maps': echo 'text-green-600'; break;
                                        case 'hosting': echo 'text-orange-600'; break;
                                        case 'domain': echo 'text-amber-600'; break;
                                        case 'vps': echo 'text-purple-600'; break;
                                        default: echo 'text-gray-600';
                                    endswitch; ?> item-subtotal" data-id="<?= $id ?>"><?= number_format($item['subtotal']) ?>đ</p>
                                    <p class="text-sm text-gray-500 mt-1"><?= $item['durationText'] ?></p>
                                    
                                    <form action="<?= site_url('cart/remove') ?>" method="post" class="mt-2">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="id" value="<?= $id ?>">
                                        <button type="submit" class="text-red-600 hover:text-red-800 flex items-center text-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa dịch vụ này?')">
                                            <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                                            Xóa
                            </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            
            <!-- Các nút thao tác -->
            <div class="flex items-center justify-between">
                <form action="<?= site_url('cart/clear') ?>" method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa toàn bộ giỏ hàng?')">
                    <?= csrf_field() ?>
                    <button type="submit" class="px-4 py-2 text-sm font-medium border border-red-200 rounded-lg text-red-700 bg-red-50 hover:bg-red-100 flex items-center transition">
                        <i data-lucide="trash" class="w-4 h-4 mr-1"></i>
                        Xóa giỏ hàng
                    </button>
                </form>
                
                <div class="flex space-x-3">
                    <a href="<?= site_url('products') ?>" class="px-4 py-2 text-sm font-medium border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 flex items-center transition">
                        <i data-lucide="shopping-bag" class="w-4 h-4 mr-1"></i>
                        Tiếp tục mua sắm
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Order Summary -->
        <div>
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200 sticky top-24">
                <h2 class="font-bold text-xl text-gray-900 border-b pb-4">Tóm tắt đơn hàng</h2>
                
                <div class="py-4 space-y-3">
                    <!-- Tóm tắt sản phẩm nếu có -->
                    <?php if(!empty($cartItems['products'])): ?>
                    <div class="flex justify-between items-center pb-2">
                        <span class="font-medium text-gray-800">Sản phẩm (<?= count($cartItems['products']) ?>)</span>
                        <?php 
                        $productsTotal = 0;
                        foreach ($cartItems['products'] as $product) {
                            $productsTotal += $product['subtotal'];
                        }
                        ?>
                        <span class="product-total text-gray-900"><?= number_format($productsTotal) ?>đ</span>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Tóm tắt dịch vụ theo danh mục nếu có -->
                    <?php if(!empty($cartItems['servicesByCategory'])): ?>
                    <?php 
                    // Tổng tiền dịch vụ
                    $servicesTotal = 0; 
                    
                    foreach ($cartItems['servicesByCategory'] as $category => $services): 
                    // Tính tổng tiền theo danh mục
                    $categoryTotal = 0;
                    foreach ($services as $service) {
                        $categoryTotal += $service['subtotal'];
                        $servicesTotal += $service['subtotal'];
                    }
                    ?>
                    <div class="flex justify-between items-center">
                        <span class="font-medium 
                        <?php switch($category):
                            case 'seo': echo 'text-indigo-800'; break;
                            case 'email-marketing': echo 'text-blue-800'; break;
                            case 'maps': echo 'text-green-800'; break;
                            case 'hosting': echo 'text-orange-800'; break;
                            case 'domain': echo 'text-amber-800'; break;
                            case 'vps': echo 'text-purple-800'; break;
                            default: echo 'text-gray-800';
                        endswitch; ?>"><?= $cartItems['categoryNames'][$category] ?? ucfirst($category) ?> (<?= count($services) ?>)</span>
                        <span class="text-gray-900"><?= number_format($categoryTotal) ?>đ</span>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    
                    <div class="flex justify-between border-t pt-2">
                        <span class="text-gray-600">Tạm tính</span>
                        <?php 
                        $totalPrice = ($productsTotal ?? 0) + ($servicesTotal ?? 0);
                        ?>
                        <span class="font-medium cart-subtotal"><?= number_format($totalPrice) ?>đ</span>
                    </div>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-600">Giảm giá</span>
                        <span class="font-medium">0đ</span>
                    </div>
                    
                    <div class="flex justify-between pt-3 border-t">
                        <span class="font-bold text-lg">Tổng cộng</span>
                        <span class="font-bold text-lg text-indigo-600 cart-total"><?= number_format($totalPrice) ?>đ</span>
                    </div>
                </div>
                
                <div class="pt-4 border-t">
                    <a href="<?= site_url('checkout') ?>" class="w-full block py-3 text-center bg-indigo-600 text-white font-bold rounded-lg hover:bg-indigo-700 transition flex items-center justify-center">
                        <i data-lucide="credit-card" class="w-5 h-5 mr-2"></i>
                        Thanh toán ngay
                    </a>
                </div>
                
                <!-- Thông tin thanh toán -->
                <div class="mt-4 p-4 bg-blue-50 rounded-lg border border-blue-100">
                    <h3 class="text-sm font-semibold text-blue-800 mb-2 flex items-center">
                        <i data-lucide="info" class="w-4 h-4 mr-1"></i>
                        Thông tin thanh toán
                    </h3>
                    <ul class="text-xs text-blue-700 space-y-1">
                        <li class="flex items-start">
                            <i data-lucide="check" class="w-3.5 h-3.5 text-blue-500 mr-1 mt-0.5 flex-shrink-0"></i>
                            <span>Sản phẩm: Thanh toán một lần, sở hữu vĩnh viễn</span>
                        </li>
                        <li class="flex items-start">
                            <i data-lucide="check" class="w-3.5 h-3.5 text-blue-500 mr-1 mt-0.5 flex-shrink-0"></i>
                            <span>Dịch vụ: Thanh toán theo thời hạn đăng ký</span>
                        </li>
                        <li class="flex items-start">
                            <i data-lucide="check" class="w-3.5 h-3.5 text-blue-500 mr-1 mt-0.5 flex-shrink-0"></i>
                            <span>Thanh toán từ số dư tài khoản hoặc ngân hàng</span>
                        </li>
                        <li class="flex items-start">
                            <i data-lucide="check" class="w-3.5 h-3.5 text-blue-500 mr-1 mt-0.5 flex-shrink-0"></i>
                            <span>Hỗ trợ sau bán hàng 24/7</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <?php endif; ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Xử lý buttons tăng/giảm số lượng sản phẩm
        document.querySelectorAll('.increment-btn').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.parentNode.querySelector('input');
                input.value = parseInt(input.value) + 1;
                updateProductPrice(input);
            });
        });
        
        document.querySelectorAll('.decrement-btn').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.parentNode.querySelector('input');
                const currentValue = parseInt(input.value);
                if (currentValue > 1) {
                    input.value = currentValue - 1;
                    updateProductPrice(input);
                    // Auto-submit form on change
                    this.closest('form').submit();
                }
            });
        });
        
        // Cập nhật giá khi thay đổi số lượng sản phẩm
        document.querySelectorAll('.product-quantity').forEach(input => {
            input.addEventListener('change', function() {
                updateProductPrice(this);
                // Auto-submit form on change
                this.closest('form').submit();
            });
        });
        
        // Cập nhật giá khi thay đổi thời hạn dịch vụ
        document.querySelectorAll('.service-duration').forEach(select => {
            select.addEventListener('change', function() {
                updateServicePrice(this);
                // Auto submit khi thay đổi thời hạn
                this.closest('form').submit();
            });
        });
        
        // Hàm cập nhật giá sản phẩm
        function updateProductPrice(input) {
            const id = input.getAttribute('data-id');
            const price = parseFloat(input.getAttribute('data-price'));
            const quantity = parseInt(input.value);
            
            if (isNaN(price) || isNaN(quantity)) return;
            
            const subtotal = price * quantity;
            const subtotalElement = document.querySelector(`.item-subtotal[data-id="${id}"]`);
            
            if (subtotalElement) {
                subtotalElement.textContent = formatCurrency(subtotal) + 'đ';
                updateTotals();
            }
        }
        
        // Hàm cập nhật giá dịch vụ
        function updateServicePrice(select) {
            const id = select.getAttribute('data-id');
            const price = parseFloat(select.getAttribute('data-price'));
            const duration = parseInt(select.value);
            
            if (isNaN(price) || isNaN(duration)) return;
            
            const subtotal = price * duration;
            const subtotalElement = document.querySelector(`.item-subtotal[data-id="${id}"]`);
            
            if (subtotalElement) {
                subtotalElement.textContent = formatCurrency(subtotal) + 'đ';
                // Cập nhật text hiển thị thời hạn
                const parentElement = subtotalElement.parentNode;
                const durationText = parentElement.querySelector('p.text-sm.text-gray-500');
                if (durationText) {
                    durationText.textContent = duration + ' tháng';
                }
                
                updateTotals();
            }
        }
        
        // Hàm cập nhật tổng giá
        function updateTotals() {
            // Tính tổng các sản phẩm
            let productsTotal = 0;
            document.querySelectorAll('.product-quantity').forEach(input => {
                const price = parseFloat(input.getAttribute('data-price'));
                const quantity = parseInt(input.value);
                if (!isNaN(price) && !isNaN(quantity)) {
                    productsTotal += price * quantity;
                }
            });
            
            // Tính tổng các dịch vụ theo danh mục
            let serviceCategories = {};
            let servicesTotal = 0;
            
            document.querySelectorAll('.service-duration').forEach(select => {
                const price = parseFloat(select.getAttribute('data-price'));
                const duration = parseInt(select.value);
                if (!isNaN(price) && !isNaN(duration)) {
                    servicesTotal += price * duration;
                    
                    // Cập nhật tổng theo danh mục (nếu có thể)
                    const categoryElement = select.closest('.bg-white.rounded-xl').querySelector('h2');
                    if (categoryElement) {
                        const categoryName = categoryElement.textContent.trim().split(' (')[0];
                        if (!serviceCategories[categoryName]) {
                            serviceCategories[categoryName] = 0;
                        }
                        serviceCategories[categoryName] += price * duration;
                    }
                }
            });
            
            const total = productsTotal + servicesTotal;
            
            // Cập nhật hiển thị
            const productTotalElement = document.querySelector('.product-total');
            if (productTotalElement) {
                productTotalElement.textContent = formatCurrency(productsTotal) + 'đ';
            }
            
            // Cập nhật hiển thị tổng từng danh mục (phần này phức tạp hơn và có thể bỏ qua)
            
            const subtotalElement = document.querySelector('.cart-subtotal');
            if (subtotalElement) {
                subtotalElement.textContent = formatCurrency(total) + 'đ';
            }
            
            const totalElement = document.querySelector('.cart-total');
            if (totalElement) {
                totalElement.textContent = formatCurrency(total) + 'đ';
            }
        }
        
        // Hàm định dạng tiền tệ
        function formatCurrency(number) {
            return new Intl.NumberFormat('vi-VN').format(number);
        }
    });
</script>
<?= $this->endSection() ?> 