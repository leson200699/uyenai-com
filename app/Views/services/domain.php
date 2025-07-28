<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Đăng Ký Tên Miền</h1>
    
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-4">Chọn tên miền phù hợp với thương hiệu của bạn</h2>
            <p class="mb-4 text-gray-600">Tên miền là địa chỉ trực tuyến và thương hiệu của bạn trên Internet. Chúng tôi cung cấp đa dạng các loại tên miền với giá cạnh tranh và dịch vụ chất lượng.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 my-8">
                <div class="flex flex-col items-center p-4 bg-orange-50 rounded-lg">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="search" class="w-8 h-8 text-orange-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Tìm kiếm miễn phí</h3>
                    <p class="text-center text-gray-600">Kiểm tra và tìm kiếm tên miền phù hợp miễn phí</p>
                </div>
                
                <div class="flex flex-col items-center p-4 bg-orange-50 rounded-lg">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="shield" class="w-8 h-8 text-orange-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Bảo vệ thông tin</h3>
                    <p class="text-center text-gray-600">Bảo vệ thông tin cá nhân với dịch vụ WHOIS Protection</p>
                </div>
                
                <div class="flex flex-col items-center p-4 bg-orange-50 rounded-lg">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="settings" class="w-8 h-8 text-orange-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Quản lý DNS</h3>
                    <p class="text-center text-gray-600">Quản lý DNS dễ dàng với bảng điều khiển trực quan</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Domain Search -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-6">Tìm kiếm tên miền</h2>
            <div class="max-w-3xl mx-auto">
                <form id="domain-search-form" class="flex flex-col md:flex-row gap-2">
                    <?= csrf_field() ?>
                    <div class="flex-grow">
                        <input type="text" name="domain" id="domain-input" placeholder="Nhập tên miền bạn muốn đăng ký (ví dụ: example.com)" class="w-full px-4 py-3 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none">
                    </div>
                    <button type="submit" id="check-domain-btn" class="px-6 py-3 bg-orange-600 text-white font-semibold rounded-r-lg hover:bg-orange-700 transition-colors">
                        Kiểm tra
                    </button>
                </form>
                <div id="domain-result" class="mt-4"></div>
                <div class="mt-2 text-sm text-gray-500 flex flex-wrap gap-2">
                    <span>Đuôi phổ biến:</span>
                    <a href="#" class="text-orange-600 hover:underline">.com</a>
                    <a href="#" class="text-orange-600 hover:underline">.vn</a>
                    <a href="#" class="text-orange-600 hover:underline">.net</a>
                    <a href="#" class="text-orange-600 hover:underline">.org</a>
                    <a href="#" class="text-orange-600 hover:underline">.info</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Domain Pricing -->
    <div class="mb-8">
        <h2 class="text-2xl font-semibold mb-6">Bảng giá tên miền</h2>
        
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-gray-100 text-gray-800">
                            <th class="py-3 px-4 text-left">Tên miền</th>
                            <th class="py-3 px-4 text-right">Đăng ký mới</th>
                            <th class="py-3 px-4 text-right">Gia hạn</th>
                            <th class="py-3 px-4 text-right">Chuyển đổi</th>
                            <th class="py-3 px-4 text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($services as $service): ?>
                        <?php 
                            $features = json_decode($service['features'], true);
                            $domainName = str_replace('Tên Miền ', '', $service['name']);
                        ?>
                        <tr class="border-t border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-4 font-semibold"><?= $domainName ?></td>
                            <td class="py-3 px-4 text-right"><?= number_format($service['price'], 0, ',', '.') ?>đ/<?= $service['duration'] === 'year' ? 'năm' : 'tháng' ?></td>
                            <td class="py-3 px-4 text-right"><?= number_format($service['price'], 0, ',', '.') ?>đ/<?= $service['duration'] === 'year' ? 'năm' : 'tháng' ?></td>
                            <td class="py-3 px-4 text-right"><?= number_format($service['price'] * 0.9, 0, ',', '.') ?>đ</td>
                            <td class="py-3 px-4 text-center">
                                <form action="<?= site_url('cart/add') ?>" method="post">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="service_id" value="<?= $service['id'] ?>">
                                    <input type="hidden" name="type" value="service">
                                    <select name="duration" class="mr-2 px-2 py-1 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-orange-500">
                                        <option value="1">1 năm</option>
                                        <option value="2">2 năm</option>
                                        <option value="3">3 năm</option>
                                        <option value="5">5 năm</option>
                                    </select>
                                    <button type="submit" class="px-3 py-1 bg-orange-600 text-white text-sm rounded hover:bg-orange-700">
                                        Thêm vào giỏ hàng
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <p class="text-center text-gray-500 mt-4">Tất cả giá đã bao gồm VAT. Chi phí WHOIS Protection thêm 200.000đ/năm.</p>
    </div>
    
    <!-- Features -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-6">Tính năng đi kèm</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-orange-100 text-orange-600">
                            <i data-lucide="settings" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Quản lý DNS linh hoạt</h3>
                        <p class="mt-1 text-gray-600">Dễ dàng quản lý các bản ghi DNS với bảng điều khiển trực quan và trợ giúp kỹ thuật.</p>
                    </div>
                </div>
                
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-orange-100 text-orange-600">
                            <i data-lucide="lock" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Domain Lock</h3>
                        <p class="mt-1 text-gray-600">Bảo vệ tên miền khỏi các thay đổi trái phép với tính năng khóa tên miền.</p>
                    </div>
                </div>
                
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-orange-100 text-orange-600">
                            <i data-lucide="refresh-cw" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Tự động gia hạn</h3>
                        <p class="mt-1 text-gray-600">Đảm bảo tên miền của bạn luôn hoạt động với tính năng tự động gia hạn.</p>
                    </div>
                </div>
                
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-orange-100 text-orange-600">
                            <i data-lucide="shield" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">WHOIS Protection</h3>
                        <p class="mt-1 text-gray-600">Bảo vệ thông tin cá nhân khỏi các công cụ khai thác dữ liệu và spam.</p>
                    </div>
                </div>
                
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-orange-100 text-orange-600">
                            <i data-lucide="arrow-right" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Domain Forwarding</h3>
                        <p class="mt-1 text-gray-600">Dễ dàng chuyển hướng tên miền đến một website khác hoặc trang mạng xã hội.</p>
                    </div>
                </div>
                
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-orange-100 text-orange-600">
                            <i data-lucide="headphones" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Hỗ trợ kỹ thuật 24/7</h3>
                        <p class="mt-1 text-gray-600">Đội ngũ kỹ thuật chuyên nghiệp hỗ trợ 24/7 qua ticket, email và hotline.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- FAQ -->
    <div class="mb-12">
        <h2 class="text-2xl font-semibold mb-6">Câu hỏi thường gặp</h2>
        
        <div class="space-y-4">
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button class="w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100">
                    <span class="font-medium text-gray-800">Tên miền là gì?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-gray-500"></i>
                </button>
                <div class="p-4 border-t border-gray-200">
                    <p class="text-gray-600">Tên miền là địa chỉ trực tuyến của website, giúp người dùng dễ dàng truy cập vào trang web thay vì phải nhớ địa chỉ IP phức tạp. Ví dụ: example.com là một tên miền.</p>
                </div>
            </div>
            
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button class="w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100">
                    <span class="font-medium text-gray-800">Làm thế nào để chọn tên miền phù hợp?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-gray-500"></i>
                </button>
                <div class="p-4 border-t border-gray-200">
                    <p class="text-gray-600">Một tên miền tốt nên ngắn gọn, dễ nhớ, liên quan đến thương hiệu hoặc hoạt động kinh doanh của bạn. Nên tránh các ký tự đặc biệt và số nếu có thể, và ưu tiên đuôi tên miền phổ biến như .com hoặc tên miền quốc gia (.vn) phù hợp với thị trường mục tiêu.</p>
                </div>
            </div>
            
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button class="w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100">
                    <span class="font-medium text-gray-800">Tôi có thể chuyển tên miền từ nhà cung cấp khác sang không?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-gray-500"></i>
                </button>
                <div class="p-4 border-t border-gray-200">
                    <p class="text-gray-600">Có, bạn có thể chuyển tên miền từ nhà cung cấp khác sang dịch vụ của chúng tôi. Quy trình chuyển đổi thường mất từ 5-7 ngày và chúng tôi sẽ hỗ trợ bạn trong suốt quá trình này. Tên miền cần được đăng ký ít nhất 60 ngày và không bị khóa để có thể chuyển đổi.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Lucide Icons
    lucide.createIcons();
    
    const domainSearchForm = document.getElementById('domain-search-form');
    const domainInput = document.getElementById('domain-input');
    const checkDomainBtn = document.getElementById('check-domain-btn');
    const domainResultContainer = document.getElementById('domain-result');

    domainSearchForm.addEventListener('submit', function(event) {
        event.preventDefault();
        
        const domainName = domainInput.value.trim();
        
        if (domainName === '') {
            domainResultContainer.innerHTML = `<p class="text-red-500">Vui lòng nhập tên miền để kiểm tra.</p>`;
            return;
        }
        
        checkDomainBtn.disabled = true;
        checkDomainBtn.innerHTML = `
            <div class="flex items-center justify-center">
                <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-white mr-2"></div>
                <span>Đang kiểm tra...</span>
            </div>
        `;
        domainResultContainer.innerHTML = '';

        const formData = new FormData(domainSearchForm);

        fetch('<?= site_url('api/check-whois') ?>', {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: new URLSearchParams(formData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'available') {
                domainResultContainer.innerHTML = `
                    <div class="p-4 bg-green-100 border border-green-200 text-green-700 rounded-lg">
                        <p class="font-semibold"><i data-lucide="check-circle" class="inline-block w-5 h-5"></i> Chúc mừng!</p>
                        <p>Tên miền <strong class="font-bold">${domainName}</strong> ${data.message.toLowerCase()}</p>
                    </div>
                `;
            } else if (data.status === 'unavailable') {
                domainResultContainer.innerHTML = `
                    <div class="p-4 bg-red-100 border border-red-200 text-red-700 rounded-lg">
                        <p class="font-semibold"><i data-lucide="x-circle" class="inline-block w-5 h-5"></i> Rất tiếc!</p>
                        <p>Tên miền <strong class="font-bold">${domainName}</strong> ${data.message.toLowerCase()}</p>
                    </div>
                `;
            } else {
                domainResultContainer.innerHTML = `
                    <div class="p-4 bg-yellow-100 border border-yellow-200 text-yellow-700 rounded-lg">
                        <p class="font-semibold"><i data-lucide="alert-triangle" class="inline-block w-5 h-5"></i> Lỗi</p>
                        <p>${data.message || data.error}</p>
                    </div>
                `;
            }
            lucide.createIcons();
        })
        .catch(error => {
            console.error('Error:', error);
            domainResultContainer.innerHTML = `
                <div class="p-4 bg-red-100 border border-red-200 text-red-700 rounded-lg">
                    <p class="font-semibold">Lỗi kết nối</p>
                    <p>Không thể gửi yêu cầu. Vui lòng thử lại sau.</p>
                </div>
            `;
        })
        .finally(() => {
            checkDomainBtn.disabled = false;
            checkDomainBtn.innerHTML = 'Kiểm tra';
            // Refresh CSRF token
            fetch('<?= site_url('api/new-csrf') ?>', { headers: { 'X-Requested-With': 'XMLHttpRequest' }})
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        document.querySelector('input[name="<?= csrf_token() ?>"]').value = data.csrf_hash;
                    }
                });
        });
    });
    
    // FAQ accordion functionality
    const faqButtons = document.querySelectorAll('.border.rounded-lg.overflow-hidden button');
    
    faqButtons.forEach(button => {
        button.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const isVisible = !content.classList.contains('hidden');
            
            if (isVisible) {
                content.classList.add('hidden');
                this.querySelector('i').classList.remove('rotate-180');
            } else {
                content.classList.remove('hidden');
                this.querySelector('i').classList.add('rotate-180');
            }
        });
    });
});
</script>
<?= $this->endSection() ?> 