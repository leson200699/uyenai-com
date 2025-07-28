<!-- Header -->
<header class="flex items-center justify-between h-16 px-6 bg-white border-b sticky top-0 z-10 py-5">
    <!-- Left Section: Mobile Menu Button + Logo on mobile -->
    <div class="flex items-center">
        <!-- Mobile Menu Button -->
        <button id="mobile-menu-button" class="md:hidden p-2 rounded-md text-gray-500 hover:bg-gray-100">
            <i data-lucide="menu" class="w-6 h-6"></i>
        </button>
        
        <!-- Logo on Mobile -->
        <div class="md:hidden flex items-center ml-2">
            <a href="/" class="flex items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-indigo-600"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="M12 22c-1.657 0-3-4.477-3-10s1.343-10 3-10 3 4.477 3 10-1.343 10-3 10z"/><path d="M2 12h20"/></svg>
                <span class="font-bold text-gray-800">UyenAI</span>
            </a>
        </div>
        
        <!-- Desktop Navigation Links -->
        <div class="hidden md:flex items-center space-x-4 ml-8">
            <!-- Products Menu with Dropdown -->
            <div class="relative group">
                <button class="flex items-center text-sm font-medium <?= strpos(current_url(), site_url('products')) === 0 ? 'text-indigo-600' : 'text-gray-700 hover:text-indigo-600' ?> py-2">
                    <span>Sản phẩm</span>
                    <i data-lucide="chevron-down" class="w-4 h-4 ml-1"></i>
                </button>
                <div class="absolute left-0 top-full mt-1 w-48 bg-white border border-gray-200 rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                    <a href="<?= site_url('products') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Tất cả sản phẩm</a>
                    <a href="<?= site_url('ai-accounts') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 text-indigo-600 font-medium">
                        <i data-lucide="sparkles" class="w-4 h-4 inline mr-1"></i>Tài khoản AI
                    </a>
                    <a href="<?= site_url('products/category/2') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mạng xã hội</a>
                    <a href="<?= site_url('products/category/3') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Khóa học</a>
                    <a href="<?= site_url('products/category/4') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dịch vụ Marketing</a>
                </div>
            </div>
            
            <!-- SAAS Menu with Dropdown -->
            <div class="relative group">
                <button class="flex items-center text-sm font-medium <?= strpos(current_url(), site_url('services')) === 0 ? 'text-indigo-600' : 'text-gray-700 hover:text-indigo-600' ?> py-2">
                    <span>SAAS</span>
                    <i data-lucide="chevron-down" class="w-4 h-4 ml-1"></i>
                </button>
                <div class="absolute left-0 top-full mt-1 w-48 bg-white border border-gray-200 rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                    <a href="<?= site_url('services') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Tất cả dịch vụ</a>
                    <a href="<?= site_url('services/web') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Thiết kế Website</a>
                    <a href="<?= site_url('services/hosting') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Hosting</a>
                    <a href="<?= site_url('services/domain') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Domain</a>
                    <a href="<?= site_url('services/ssl') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Chứng chỉ SSL</a>
                    <a href="<?= site_url('vps') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Quản lý VPS</a>
                </div>
            </div>
            
            <!-- Web Demo link -->
            <a href="<?= site_url('web-demo') ?>" class="text-sm font-medium <?= current_url() == site_url('web-demo') ? 'text-indigo-600' : 'text-gray-700 hover:text-indigo-600' ?>">
                Giao diện mẫu
            </a>
            
            <!-- Blog link -->
            <a href="<?= site_url('news') ?>" class="text-sm font-medium <?= current_url() == site_url('news') ? 'text-indigo-600' : 'text-gray-700 hover:text-indigo-600' ?>">
                Blog
            </a>
        </div>
    </div>
    
    <!-- Middle Section: Search Bar -->
    <div class="hidden md:flex relative mx-4 flex-1 max-w-md">
        <div class="w-full relative">
            <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"></i>
            <input type="text" id="ajax-search" placeholder="Tìm kiếm sản phẩm, dịch vụ..." class="w-full pl-10 pr-4 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <div id="search-results" class="absolute left-0 right-0 mt-1 bg-white border border-gray-200 rounded-lg shadow-lg z-50 hidden max-h-96 overflow-y-auto">
                <div class="p-4 text-center text-gray-500" id="search-loading" style="display: none;">
                    <i data-lucide="loader" class="w-5 h-5 mx-auto animate-spin"></i>
                    <p class="mt-1 text-sm">Đang tìm kiếm...</p>
                </div>
                <div id="search-results-list"></div>
                <div class="p-4 text-center text-gray-500" id="search-no-results" style="display: none;">
                    <p class="text-sm">Không tìm thấy kết quả nào</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Section: User Menu -->
    <div class="flex items-center gap-4">
        <a href="<?= site_url('cart') ?>" class="relative p-2 text-gray-500 rounded-full hover:bg-gray-100 hover:text-gray-900">
            <i data-lucide="shopping-cart" class="w-6 h-6"></i>
            <?php $cartItems = session()->get('cart') ?? []; ?>
            <?php if(count($cartItems) > 0): ?>
                <span class="absolute -top-1 -right-1 flex items-center justify-center w-5 h-5 bg-red-500 text-white text-xs font-bold rounded-full"><?= count($cartItems) ?></span>
            <?php endif; ?>
        </a>
        
        <?php if(session()->get('isLoggedIn')): ?>
            <span class="hidden sm:block text-sm font-semibold text-indigo-600">Số dư: <?= number_format(session()->get('balance') ?? 0) ?>đ</span>
            
            <div class="relative">
                <button id="user-menu-button" class="flex items-center gap-2">
                    <img src="https://placehold.co/32x32/e0e7ff/4338ca?text=<?= strtoupper(substr(session()->get('name'), 0, 1)) ?>" alt="Avatar" class="w-8 h-8 rounded-full">
                    <span class="hidden lg:block text-sm font-medium"><?= session()->get('name') ?></span>
                    <i data-lucide="chevron-down" class="hidden lg:block w-4 h-4 text-gray-500"></i>
                </button>
                <!-- Dropdown (hidden by default) -->
                <div id="user-menu-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                    <a href="<?= site_url('dashboard') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Bảng điều khiển</a>
                    <a href="<?= site_url('user-profile') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Thông tin cá nhân</a>
                    <a href="<?= site_url('warehouse') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Kho sản phẩm</a>
                    <a href="<?= site_url('orders') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Đơn hàng của tôi</a>
                    <a href="<?= site_url('deposit') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Nạp tiền</a>
                    <?php if(session()->get('role') == 'admin'): ?>
                        <a href="<?= site_url('admin/dashboard') ?>" class="block px-4 py-2 text-sm text-indigo-600 hover:bg-gray-100">Quản lý hệ thống</a>
                    <?php endif; ?>
                    <hr class="my-1 border-gray-200">
                    <a href="<?= site_url('logout') ?>" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Đăng xuất</a>
                </div>
            </div>
        <?php else: ?>
            <a href="<?= site_url('login') ?>" class="text-sm font-medium text-gray-700 hover:text-indigo-600">Đăng nhập</a>
            <a href="<?= site_url('register') ?>" class="text-sm font-medium text-white bg-indigo-600 py-2 px-4 rounded-lg hover:bg-indigo-700 transition-all">Đăng ký</a>
        <?php endif; ?>
    </div>
</header> 