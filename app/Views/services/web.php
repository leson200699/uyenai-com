<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<style>
    .package-selected {
        border-color: #4f46e5;
        box-shadow: 0 0 0 2px #4f46e5;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Thiết Kế Website</h1>
    
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-4">Dịch vụ thiết kế website chuyên nghiệp</h2>
            <p class="mb-4 text-gray-600">Chúng tôi cung cấp dịch vụ thiết kế website chất lượng cao, tối ưu trải nghiệm người dùng và đáp ứng mọi nhu cầu kinh doanh của bạn. Với đội ngũ kỹ thuật giàu kinh nghiệm, chúng tôi cam kết mang đến những sản phẩm đẹp mắt, thân thiện với SEO và dễ dàng quản lý.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 my-8">
                <div class="flex flex-col items-center p-4 bg-indigo-50 rounded-lg">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="layout" class="w-8 h-8 text-indigo-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Thiết kế hiện đại</h3>
                    <p class="text-center text-gray-600">Giao diện đẹp mắt, bắt kịp xu hướng thiết kế mới nhất</p>
                </div>
                
                <div class="flex flex-col items-center p-4 bg-indigo-50 rounded-lg">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="smartphone" class="w-8 h-8 text-indigo-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Tương thích mọi thiết bị</h3>
                    <p class="text-center text-gray-600">Tự động điều chỉnh cho desktop, tablet và điện thoại</p>
                </div>
                
                <div class="flex flex-col items-center p-4 bg-indigo-50 rounded-lg">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="search" class="w-8 h-8 text-indigo-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Tối ưu SEO</h3>
                    <p class="text-center text-gray-600">Cấu trúc chuẩn giúp website dễ dàng được tìm thấy trên Google</p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Column: Options -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Step 1: Choose Package -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold mb-4">Bước 1: Chọn Gói Website</h2>
                <div id="package-options" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <?php if (!empty($services)): ?>
                        <?php foreach ($services as $service): ?>
                            <?php if ($service['id'] !== 'ssl-certificate' && $service['id'] !== 'hosting-standard'): ?>
                            <div class="border rounded-xl p-4 cursor-pointer hover:border-indigo-500 transition-all" 
                                data-package="<?= $service['name'] ?>" 
                                data-price="<?= $service['price'] ?>"
                                data-id="<?= $service['id'] ?>">
                                <h3 class="font-bold text-lg"><?= $service['name'] ?></h3>
                                <p class="text-sm text-gray-600"><?= $service['description'] ?></p>
                                <p class="text-xl font-bold mt-2"><?= number_format($service['price']) ?>đ</p>
                                <ul class="mt-3 text-sm text-gray-600 space-y-1">
                                    <?php 
                                    $features = is_string($service['features']) ? json_decode($service['features'], true) : $service['features'];
                                    if (!empty($features) && is_array($features)):
                                        foreach (array_slice($features, 0, 3) as $feature): 
                                    ?>
                                    <li class="flex items-center">
                                        <i data-lucide="check" class="w-4 h-4 text-green-500 mr-2"></i>
                                        <?= $feature ?>
                                    </li>
                                    <?php endforeach; ?>
                                    
                                    <?php if (count($features) > 3): ?>
                                    <li class="text-indigo-600 text-xs">+ <?= count($features) - 3 ?> tính năng khác</li>
                                    <?php endif; ?>
                                    
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                    <div class="border rounded-xl p-4 cursor-pointer hover:border-indigo-500 transition-all" data-package="Cơ bản" data-price="5000000">
                        <h3 class="font-bold text-lg">Cơ bản</h3>
                        <p class="text-sm text-gray-600">Website giới thiệu công ty, dịch vụ.</p>
                        <p class="text-xl font-bold mt-2">5.000.000đ</p>
                        <ul class="mt-3 text-sm text-gray-600 space-y-1">
                            <li class="flex items-center">
                                <i data-lucide="check" class="w-4 h-4 text-green-500 mr-2"></i>
                                Tối đa 10 trang
                            </li>
                            <li class="flex items-center">
                                <i data-lucide="check" class="w-4 h-4 text-green-500 mr-2"></i>
                                Form liên hệ
                            </li>
                            <li class="flex items-center">
                                <i data-lucide="check" class="w-4 h-4 text-green-500 mr-2"></i>
                                Responsive
                            </li>
                        </ul>
                    </div>
                    <div class="border rounded-xl p-4 cursor-pointer hover:border-indigo-500 transition-all" data-package="Doanh nghiệp" data-price="12000000">
                        <h3 class="font-bold text-lg">Doanh nghiệp</h3>
                        <p class="text-sm text-gray-600">Nhiều tính năng, chuẩn SEO, chuyên nghiệp.</p>
                        <p class="text-xl font-bold mt-2">12.000.000đ</p>
                        <ul class="mt-3 text-sm text-gray-600 space-y-1">
                            <li class="flex items-center">
                                <i data-lucide="check" class="w-4 h-4 text-green-500 mr-2"></i>
                                Không giới hạn trang
                            </li>
                            <li class="flex items-center">
                                <i data-lucide="check" class="w-4 h-4 text-green-500 mr-2"></i>
                                CMS quản trị nội dung
                            </li>
                            <li class="flex items-center">
                                <i data-lucide="check" class="w-4 h-4 text-green-500 mr-2"></i>
                                Tối ưu SEO cơ bản
                            </li>
                        </ul>
                    </div>
                    <div class="border rounded-xl p-4 cursor-pointer hover:border-indigo-500 transition-all" data-package="TMĐT" data-price="20000000">
                        <h3 class="font-bold text-lg">Thương mại Điện tử</h3>
                        <p class="text-sm text-gray-600">Bán hàng online, giỏ hàng, thanh toán.</p>
                        <p class="text-xl font-bold mt-2">20.000.000đ</p>
                        <ul class="mt-3 text-sm text-gray-600 space-y-1">
                            <li class="flex items-center">
                                <i data-lucide="check" class="w-4 h-4 text-green-500 mr-2"></i>
                                Đầy đủ tính năng bán hàng
                            </li>
                            <li class="flex items-center">
                                <i data-lucide="check" class="w-4 h-4 text-green-500 mr-2"></i>
                                Cổng thanh toán
                            </li>
                            <li class="flex items-center">
                                <i data-lucide="check" class="w-4 h-4 text-green-500 mr-2"></i>
                                Báo cáo doanh thu
                            </li>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Step 2: Chọn Tên Miền & SSL (Tùy chọn) -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold mb-4">Bước 2: Chọn Tên Miền & SSL</h2>

                <!-- Domain choice radio buttons -->
                <div class="flex gap-6 mb-4">
                    <div class="flex items-center">
                        <input id="domain-choice-new" type="radio" name="domain_choice" value="new" class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500" checked>
                        <label for="domain-choice-new" class="ml-2 block text-sm font-medium text-gray-700">Đăng ký tên miền mới</label>
                    </div>
                    <div class="flex items-center">
                        <input id="domain-choice-existing" type="radio" name="domain_choice" value="existing" class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                        <label for="domain-choice-existing" class="ml-2 block text-sm font-medium text-gray-700">Tôi đã có tên miền</label>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <!-- Block for buying new domain -->
                    <div id="new-domain-block">
                    <div class="bg-white p-4 rounded-xl border">
                        <label class="font-semibold">Mua tên miền mới</label>
                            <p class="text-sm text-gray-500 mb-2">Tìm kiếm và đăng ký tên miền cho website của bạn.</p>
                            <div class="flex">
                                <input type="text" id="domain-input" placeholder="nhaptenmien" class="flex-grow border-gray-300 rounded-l-md text-sm focus:ring-indigo-500 focus:border-indigo-500">
                                <select id="domain-extension" class="border-gray-300 border-l-0 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="com" data-price="280000">.com</option>
                                    <option value="vn" data-price="750000">.vn</option>
                                    <option value="net" data-price="320000">.net</option>
                                <option value="org" data-price="380000">.org</option>
                            </select>
                                <button type="button" id="check-domain-btn" class="bg-indigo-600 text-white px-4 py-2 rounded-r-md hover:bg-indigo-700 transition-all text-sm">Kiểm tra</button>
                        </div>
                        <div id="domain-result" class="mt-2 text-sm"></div>
                            <div id="domain-action" class="hidden mt-2 p-3 bg-green-50 rounded-md flex items-center justify-between">
                                <div>
                                    <span id="domain-full-name" class="font-bold"></span>
                                    <span id="domain-price" class="text-gray-600 ml-2"></span>
                                </div>
                                <button type="button" id="add-domain-btn" class="bg-green-600 text-white px-3 py-1 rounded-md hover:bg-green-700 transition-all text-sm">Thêm</button>
                            </div>
                        </div>
                    </div>

                    <!-- Block for using existing domain -->
                    <div id="existing-domain-block" class="hidden">
                        <div class="bg-white p-4 rounded-xl border">
                            <label for="existing-domain-input" class="font-semibold">Nhập tên miền của bạn</label>
                            <p class="text-sm text-gray-500 mb-2">Chúng tôi sẽ trỏ tên miền này về hosting sau khi cài đặt website.</p>
                            <input type="text" id="existing-domain-input" placeholder="tenmiencuaban.com" class="w-full border-gray-300 rounded-md text-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    </div>
                    
                    <!-- SSL -->
                    <div class="flex items-center justify-between p-4 border rounded-xl">
                        <div>
                            <label for="ssl-checkbox" class="font-semibold">Cài đặt chứng chỉ SSL</label>
                            <p class="text-sm text-gray-500">Bảo mật website và tăng uy tín với khách hàng.</p>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="font-bold text-indigo-600">350,000đ/năm</span>
                            <input type="checkbox" id="ssl-checkbox" data-price="350000" class="h-5 w-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 3: Chọn Gói Hosting (Tùy chọn) -->
            <?php if (!empty($hostingServices)) : ?>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold mb-4">Bước 3: Chọn Gói Hosting (Tùy chọn)</h2>
                <div id="hosting-package-options" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                    <!-- No Hosting Option -->
                    <div class="border rounded-xl p-4 cursor-pointer hover:border-indigo-500 transition-all package-selected flex flex-col justify-center text-center h-full" data-id="none" data-price="0">
                        <h3 class="font-semibold text-lg">Không Sử Dụng</h3>
                        <p class="text-sm text-gray-500 mt-1">Tôi đã có hosting.</p>
                    </div>
                    <!-- Hosting Packages -->
                    <?php foreach ($hostingServices as $hosting) : ?>
                    <div class="border rounded-xl p-4 cursor-pointer hover:border-indigo-500 transition-all text-center flex flex-col h-full" data-id="<?= esc($hosting['id']) ?>" data-price="<?= esc($hosting['price']) ?>">
                        <h3 class="font-semibold text-lg"><?= esc($hosting['name']) ?></h3>
                        <p class="text-2xl font-bold text-indigo-600 my-3"><?= number_format($hosting['price']) ?>đ<span class="text-sm font-normal text-gray-500">/tháng</span></p>
                        <div class="text-sm text-gray-600 space-y-1 mt-auto">
                            <?php
                                $features = json_decode($hosting['features'], true);
                                if ($features):
                            ?>
                                <?php if(isset($features['storage'])): ?><div class="flex items-center justify-center"><i data-lucide="hard-drive" class="w-4 h-4 mr-2 text-gray-400"></i><span><?= esc($features['storage']) ?></span></div><?php endif; ?>
                                <?php if(isset($features['bandwidth'])): ?><div class="flex items-center justify-center"><i data-lucide="arrow-down-up" class="w-4 h-4 mr-2 text-gray-400"></i><span><?= esc($features['bandwidth']) ?></span></div><?php endif; ?>
                                <?php if(isset($features['email_accounts'])): ?><div class="flex items-center justify-center"><i data-lucide="mail" class="w-4 h-4 mr-2 text-gray-400"></i><span><?= esc($features['email_accounts']) ?> Email</span></div><?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="flex items-center gap-4 mt-6">
                    <label for="hosting-duration" class="text-sm font-medium">Thời hạn:</label>
                    <select id="hosting-duration" class="border-gray-300 rounded-md text-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="1">1 tháng</option>
                        <option value="3">3 tháng</option>
                        <option value="6">6 tháng</option>
                        <option value="12" selected>12 tháng</option>
                    </select>
                </div>
            </div>
            <?php endif; ?>

            <!-- Step 4: Nâng Cấp VPS (Tùy chọn) -->
            <?php if (!empty($vpsServices)) : ?>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold mb-4">Bước 4: Nâng Cấp VPS (Tùy chọn)</h2>
                <div id="vps-package-options" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                    <!-- No VPS Option -->
                    <div class="border rounded-xl p-4 cursor-pointer hover:border-indigo-500 transition-all package-selected flex flex-col justify-center text-center h-full" data-id="none" data-price="0">
                        <h3 class="font-semibold text-lg">Không Nâng Cấp</h3>
                        <p class="text-sm text-gray-500 mt-1">Cấu hình mặc định là đủ.</p>
                    </div>
                    <!-- VPS Packages -->
                    <?php foreach ($vpsServices as $vps) : ?>
                        <div class="border rounded-xl p-4 cursor-pointer hover:border-indigo-500 transition-all text-center flex flex-col h-full" data-id="<?= esc($vps['id']) ?>" data-price="<?= esc($vps['price']) ?>">
                            <h3 class="font-semibold text-lg"><?= esc($vps['name']) ?></h3>
                            <p class="text-2xl font-bold text-indigo-600 my-3"><?= number_format($vps['price']) ?>đ<span class="text-sm font-normal text-gray-500">/tháng</span></p>
                            <div class="text-sm text-gray-600 space-y-1 mt-auto">
                                <?php
                                    $features = json_decode($vps['features'], true);
                                    if ($features):
                                ?>
                                    <?php if(isset($features['cpu'])): ?><div class="flex items-center justify-center"><i data-lucide="cpu" class="w-4 h-4 mr-2 text-gray-400"></i><span><?= esc($features['cpu']) ?></span></div><?php endif; ?>
                                    <?php if(isset($features['ram'])): ?><div class="flex items-center justify-center"><i data-lucide="memory-stick" class="w-4 h-4 mr-2 text-gray-400"></i><span><?= esc($features['ram']) ?></span></div><?php endif; ?>
                                    <?php if(isset($features['storage'])): ?><div class="flex items-center justify-center"><i data-lucide="hard-drive" class="w-4 h-4 mr-2 text-gray-400"></i><span><?= esc($features['storage']) ?></span></div><?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="flex items-center gap-4 mt-6">
                    <label for="vps-duration" class="text-sm font-medium">Thời hạn:</label>
                    <select id="vps-duration" class="border-gray-300 rounded-md text-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="1">1 tháng</option>
                        <option value="3">3 tháng</option>
                        <option value="6">6 tháng</option>
                        <option value="12" selected>12 tháng</option>
                    </select>
                </div>
            </div>
            <?php endif; ?>

        </div>

        <!-- Right Column: Cart Summary -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl border shadow-sm sticky top-24">
                <h2 class="text-xl font-bold p-4 border-b">Tóm Tắt Đơn Hàng</h2>
                <div id="cart-items" class="p-4 space-y-3 text-sm">
                    <p class="text-gray-500">Vui lòng chọn một gói website để bắt đầu.</p>
                </div>
                <div class="p-4 border-t">
                    <div class="flex justify-between font-bold text-lg">
                        <span>Tổng cộng</span>
                        <span id="total-price">0đ</span>
                    </div>
                </div>
                <div class="p-4">
                    <button id="add-to-cart-btn" class="w-full bg-indigo-600 text-white font-bold py-3 rounded-lg hover:bg-indigo-700 disabled:bg-indigo-300 disabled:cursor-not-allowed">
                        Thêm Vào Giỏ Hàng
                    </button>
                </div>
                
                <!-- Hidden form for submission -->
                <form id="web-order-form" action="<?= site_url('cart/add-web-service') ?>" method="post" class="hidden">
                    <?= csrf_field() ?>
                    <input type="hidden" name="service_id" id="form-service-id">
                    <input type="hidden" name="add_ssl" id="form-add-ssl" value="0">
                    <input type="hidden" name="hosting_id" id="form-hosting-id" value="none">
                    <input type="hidden" name="hosting_duration" id="form-hosting-duration" value="12">
                    <input type="hidden" name="vps_id" id="form-vps-id" value="none">
                    <input type="hidden" name="vps_duration" id="form-vps-duration" value="12">
                    <input type="hidden" name="existing_domain" id="form-existing-domain">
                </form>
            </div>
        </div>
    </div>
    
    <!-- Quy trình làm việc -->
    <div class="mt-12 bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-6">Quy trình thiết kế website</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                <div class="bg-gray-50 p-4 rounded-lg text-center">
                    <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center mx-auto mb-3">
                        <span class="font-bold text-indigo-700">1</span>
                    </div>
                    <h3 class="font-semibold mb-2">Khảo sát yêu cầu</h3>
                    <p class="text-sm text-gray-600">Tìm hiểu nhu cầu và mong muốn của khách hàng</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg text-center">
                    <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center mx-auto mb-3">
                        <span class="font-bold text-indigo-700">2</span>
                    </div>
                    <h3 class="font-semibold mb-2">Lên kế hoạch</h3>
                    <p class="text-sm text-gray-600">Phân tích và lập kế hoạch phát triển website</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg text-center">
                    <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center mx-auto mb-3">
                        <span class="font-bold text-indigo-700">3</span>
                    </div>
                    <h3 class="font-semibold mb-2">Thiết kế giao diện</h3>
                    <p class="text-sm text-gray-600">Thiết kế UI/UX đẹp mắt và thân thiện</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg text-center">
                    <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center mx-auto mb-3">
                        <span class="font-bold text-indigo-700">4</span>
                    </div>
                    <h3 class="font-semibold mb-2">Lập trình</h3>
                    <p class="text-sm text-gray-600">Phát triển website với các công nghệ hiện đại</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg text-center">
                    <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center mx-auto mb-3">
                        <span class="font-bold text-indigo-700">5</span>
                    </div>
                    <h3 class="font-semibold mb-2">Bàn giao & Hỗ trợ</h3>
                    <p class="text-sm text-gray-600">Bàn giao và hỗ trợ kỹ thuật sau triển khai</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- FAQ -->
    <div class="mt-12 bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-6">Câu hỏi thường gặp</h2>
            
            <div class="space-y-4">
                <div class="border rounded-lg overflow-hidden">
                    <button class="flex justify-between items-center w-full p-4 text-left font-semibold hover:bg-gray-50 focus:outline-none">
                        <span>Thời gian hoàn thành một website mất bao lâu?</span>
                        <i data-lucide="chevron-down" class="w-5 h-5"></i>
                    </button>
                    <div class="p-4 bg-gray-50 border-t">
                        <p>Thời gian hoàn thành phụ thuộc vào độ phức tạp của dự án. Thông thường, một website cơ bản mất từ 5-10 ngày, website doanh nghiệp mất 15-20 ngày, và website thương mại điện tử mất từ 25-45 ngày.</p>
                    </div>
                </div>
                
                <div class="border rounded-lg overflow-hidden">
                    <button class="flex justify-between items-center w-full p-4 text-left font-semibold hover:bg-gray-50 focus:outline-none">
                        <span>Tôi có thể tự quản lý nội dung website sau khi hoàn thành không?</span>
                        <i data-lucide="chevron-down" class="w-5 h-5"></i>
                    </button>
                    <div class="p-4 bg-gray-50 border-t">
                        <p>Có, chúng tôi sẽ xây dựng website với hệ thống quản trị nội dung (CMS) giúp bạn dễ dàng cập nhật và quản lý nội dung mà không cần kiến thức kỹ thuật. Chúng tôi cũng sẽ hướng dẫn chi tiết cách sử dụng.</p>
                    </div>
                </div>
                
                <div class="border rounded-lg overflow-hidden">
                    <button class="flex justify-between items-center w-full p-4 text-left font-semibold hover:bg-gray-50 focus:outline-none">
                        <span>Website có tương thích với điện thoại di động không?</span>
                        <i data-lucide="chevron-down" class="w-5 h-5"></i>
                    </button>
                    <div class="p-4 bg-gray-50 border-t">
                        <p>Tất cả website chúng tôi thiết kế đều được tối ưu hóa cho điện thoại di động (responsive design), đảm bảo hiển thị tốt trên mọi kích thước màn hình.</p>
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
    lucide.createIcons();
    
    // CSRF token management
    let csrfToken = '<?= csrf_hash() ?>';

    // Package selection state
    let selectedPackage = null;
    let selectedHosting = { id: 'none', price: 0 };
    let selectedVps = { id: 'none', price: 0 };
    
    const sslCheckbox = document.getElementById('ssl-checkbox');
    const hostingDurationSelect = document.getElementById('hosting-duration');
    const vpsDurationSelect = document.getElementById('vps-duration');

    // Main form and cart summary elements
    const webOrderForm = document.getElementById('web-order-form');
    const addToCartBtn = document.getElementById('add-to-cart-btn');
    const cartItems = document.getElementById('cart-items');
    const totalPriceElement = document.getElementById('total-price');

    // Domain interaction elements
    const checkDomainBtn = document.getElementById('check-domain-btn');
    const domainInput = document.getElementById('domain-input');
    const domainResult = document.getElementById('domain-result');
    const domainAction = document.getElementById('domain-action');
    const addDomainBtn = document.getElementById('add-domain-btn');
    const domainExtension = document.getElementById('domain-extension');
    const domainChoiceNew = document.getElementById('domain-choice-new');
    const domainChoiceExisting = document.getElementById('domain-choice-existing');
    const newDomainBlock = document.getElementById('new-domain-block');
    const existingDomainBlock = document.getElementById('existing-domain-block');
    const existingDomainInput = document.getElementById('existing-domain-input');

    // --- Domain Choice Logic ---
    domainChoiceNew.addEventListener('change', () => {
        if (domainChoiceNew.checked) {
            newDomainBlock.classList.remove('hidden');
            existingDomainBlock.classList.add('hidden');
        }
    });

    domainChoiceExisting.addEventListener('change', () => {
        if (domainChoiceExisting.checked) {
            newDomainBlock.classList.add('hidden');
            existingDomainBlock.classList.remove('hidden');
        }
    });

    // --- Package Selection Logic ---
    function handlePackageSelection(containerSelector, onSelectCallback) {
        const container = document.querySelector(containerSelector);
        if (!container) return;
        
        container.addEventListener('click', function(e) {
            const card = e.target.closest('.cursor-pointer');
            if (!card) return;

            // Remove selection from siblings
            card.parentElement.querySelectorAll('.package-selected').forEach(selected => {
                selected.classList.remove('package-selected');
                selected.classList.add('hover:border-indigo-500');
            });
            
            // Apply selection to current card
            card.classList.add('package-selected');
            card.classList.remove('hover:border-indigo-500');

            const data = {
                id: card.dataset.id,
                price: parseFloat(card.dataset.price),
                name: card.querySelector('h3').textContent
            };
            
            onSelectCallback(data);
            updateCart();
            lucide.createIcons(); // Re-render icons if selection changes UI
        });
    }

    handlePackageSelection('#package-options', data => selectedPackage = data);
    handlePackageSelection('#hosting-package-options', data => selectedHosting = data);
    handlePackageSelection('#vps-package-options', data => selectedVps = data);

    // --- Event Listeners for options ---
    sslCheckbox.addEventListener('change', updateCart);
    hostingDurationSelect.addEventListener('change', updateCart);
    vpsDurationSelect.addEventListener('change', updateCart);
    
    // --- Main Cart Update Function ---
    function updateCart() {
        let allItemsHtml = '';
        let totalPrice = 0;
        
        // Clear previous dynamic items from the main display to prevent duplication
        const existingDynamicItems = cartItems.querySelectorAll('.dynamic-item');
        existingDynamicItems.forEach(item => item.remove());

        // 1. Re-render dynamic items from our temporary storage
        const tempContainer = document.getElementById('temp-dynamic-items');
        tempContainer.querySelectorAll('.dynamic-item').forEach(item => {
            allItemsHtml += item.outerHTML;
            totalPrice += parseFloat(item.dataset.price);
        });
        
        // 2. Render currently selected (but not yet submitted) items
        if (selectedPackage) {
            allItemsHtml += `<div class="flex justify-between"><span>Gói Web: ${selectedPackage.name}</span><span>${formatPrice(selectedPackage.price)}</span></div>`;
            totalPrice += selectedPackage.price;
        }
        
        if (sslCheckbox.checked) {
            const sslPrice = parseFloat(sslCheckbox.dataset.price);
            allItemsHtml += `<div class="flex justify-between"><span>Chứng chỉ SSL</span><span>${formatPrice(sslPrice)}/năm</span></div>`;
            totalPrice += sslPrice;
        }
        
        if (selectedHosting && selectedHosting.id !== 'none') {
            const duration = parseInt(hostingDurationSelect.value);
            const totalHostingPrice = selectedHosting.price * duration;
            allItemsHtml += `<div class="flex justify-between"><span>Hosting: ${selectedHosting.name} (${duration} tháng)</span><span>${formatPrice(totalHostingPrice)}</span></div>`;
            totalPrice += totalHostingPrice;
        }
        
        if (selectedVps && selectedVps.id !== 'none') {
            const duration = parseInt(vpsDurationSelect.value);
            const totalVpsPrice = selectedVps.price * duration;
            allItemsHtml += `<div class="flex justify-between"><span>VPS: ${selectedVps.name} (${duration} tháng)</span><span>${formatPrice(totalVpsPrice)}</span></div>`;
            totalPrice += totalVpsPrice;
        }

        if (allItemsHtml === '') {
             cartItems.innerHTML = '<p class="text-gray-500">Vui lòng chọn một gói dịch vụ để bắt đầu.</p>';
        } else {
            cartItems.innerHTML = allItemsHtml;
        }

        totalPriceElement.textContent = formatPrice(totalPrice);
        addToCartBtn.disabled = !selectedPackage;
    }
    
    function formatPrice(price) {
        return new Intl.NumberFormat('vi-VN').format(price) + 'đ';
    }
    
    // --- Domain Logic ---
    checkDomainBtn.addEventListener('click', function() {
        const domain = domainInput.value.trim();
        const extension = domainExtension.value;
        if (!domain) {
            domainResult.innerHTML = '<span class="text-red-500">Vui lòng nhập tên miền!</span>';
            return;
        }
        const fullDomain = `${domain}.${extension}`;
        domainResult.innerHTML = '<span class="text-gray-500">Đang kiểm tra...</span>';
        domainAction.classList.add('hidden');

        // Gọi API thực tế
        fetch('<?= site_url('services/check_whois') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'X-Requested-With': 'XMLHttpRequest',
                '<?= csrf_header() ?>': csrfToken
            },
            body: `domain=${encodeURIComponent(fullDomain)}`
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'available') {
                domainResult.innerHTML = '<span class="text-green-500">✓ Tên miền khả dụng!</span>';
                domainAction.classList.remove('hidden');
                const selectedOption = domainExtension.options[domainExtension.selectedIndex];
                const price = selectedOption.getAttribute('data-price');
                document.getElementById('domain-full-name').textContent = fullDomain;
                document.getElementById('domain-price').textContent = `(${formatPrice(price)}/năm)`;
            } else if (data.status === 'unavailable') {
                domainResult.innerHTML = '<span class="text-red-500">✗ Tên miền đã được đăng ký.</span>';
            } else {
                domainResult.innerHTML = `<span class="text-yellow-600">${data.message || 'Không thể kiểm tra tên miền.'}</span>`;
            }
            // Làm mới CSRF nếu có
            fetch('<?= site_url('new-csrf') ?>', { headers: { 'X-Requested-With': 'XMLHttpRequest' }})
                .then(res => res.json())
                .then(csrf => { csrfToken = csrf.csrf_hash; });
        })
        .catch(() => {
            domainResult.innerHTML = '<span class="text-red-500">Lỗi kết nối. Vui lòng thử lại.</span>';
        });
    });
    
    addDomainBtn.addEventListener('click', function() {
        this.disabled = true;
        this.textContent = 'Đang thêm...';

        const domain = domainInput.value.trim();
        const extension = domainExtension.value;
        const selectedOption = domainExtension.options[domainExtension.selectedIndex];
        const price = selectedOption.getAttribute('data-price');
        const fullDomain = `${domain}.${extension}`;
        
        const formData = new FormData();
        formData.append('<?= csrf_token() ?>', csrfToken);
        formData.append('domain', fullDomain);
        formData.append('service_id', `domain-${extension}`);
        formData.append('price', price);
        
        fetch('<?= site_url('cart/add-domain') ?>', {
            method: 'POST',
            body: formData,
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                csrfToken = data.new_csrf; // Update CSRF token

                // Add to summary UI as a "dynamic item"
                    const domainItem = document.createElement('div');
                domainItem.className = 'flex justify-between dynamic-item';
                domainItem.dataset.price = price;
                domainItem.innerHTML = `<span>Tên miền ${fullDomain}</span><span>${formatPrice(price)}/năm</span>`;
                    
                // We don't append directly. We let updateCart handle rendering.
                // To do this, we add a temporary placeholder element that updateCart can read.
                const tempContainer = document.getElementById('temp-dynamic-items');
                tempContainer.appendChild(domainItem);
                
                updateCart(); // Recalculate and re-render everything

                domainAction.classList.add('hidden');
                domainInput.value = '';
                domainResult.innerHTML = `<span class="text-green-500">Đã thêm ${fullDomain}!</span>`;

            } else {
                alert(data.message || 'Lỗi khi thêm tên miền.');
                if (data.new_csrf) csrfToken = data.new_csrf;
            }
        }).catch(() => {
            alert('Lỗi kết nối. Vui lòng thử lại.');
        }).finally(() => {
            this.disabled = false;
            this.textContent = 'Thêm';
        });
    });

    // --- Main Form Submission ---
    addToCartBtn.addEventListener('click', function(e) {
        e.preventDefault(); // Prevent default form submission
        this.disabled = true;
        this.textContent = 'Đang xử lý...';
        
        if (!selectedPackage) {
            alert('Vui lòng chọn một gói website để tiếp tục.');
            this.disabled = false;
            this.textContent = 'Thêm Vào Giỏ Hàng';
            return;
        }

        // Populate form with IDs and durations
        document.getElementById('form-service-id').value = selectedPackage.id;
        document.getElementById('form-add-ssl').value = sslCheckbox.checked ? 1 : 0;
        document.getElementById('form-hosting-id').value = selectedHosting.id;
        document.getElementById('form-hosting-duration').value = hostingDurationSelect.value;
        document.getElementById('form-vps-id').value = selectedVps.id;
        document.getElementById('form-vps-duration').value = vpsDurationSelect.value;
        
        if (domainChoiceExisting.checked) {
            document.getElementById('form-existing-domain').value = existingDomainInput.value.trim();
        } else {
            document.getElementById('form-existing-domain').value = '';
        }
        
        // Update the CSRF token in the form just before submitting
        webOrderForm.querySelector('input[name="<?= csrf_token() ?>"]').value = csrfToken;
        
        webOrderForm.submit();
    });

    // Initial cart state
    updateCart();
});
</script>
<div id="temp-dynamic-items" class="hidden"></div>
<?= $this->endSection() ?> 