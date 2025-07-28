<!-- Sidebar -->
<aside class="hidden md:flex flex-col w-64 bg-white border-r sidebar">
    <!-- Logo and Toggle Button -->
    <div class="flex items-center justify-between h-16 border-b px-4">
        <a href="/" class="flex items-center gap-2 text-2xl font-bold text-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-indigo-600"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="M12 22c-1.657 0-3-4.477-3-10s1.343-10 3-10 3 4.477 3 10-1.343 10-3 10z"/><path d="M2 12h20"/></svg>
            <span class="text-gray-800 sidebar-logo-text">UyenAI</span>
        </a>
        <button id="sidebar-toggle" class="p-1 rounded text-gray-500 hover:bg-gray-100" title="Thu nhỏ menu">
            <i data-lucide="panel-left-close" class="w-5 h-5"></i>
        </button>
    </div>
    <!-- Navigation -->
    <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
        <!-- Public Navigation Links -->
        <a href="/" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == base_url() ? 'bg-indigo-600 text-white' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
            <i data-lucide="home" class="w-5 h-5 mr-3"></i>
            <span class="sidebar-text">Trang chủ</span>
        </a>
        
        <!-- AI Accounts - Highlighted Menu -->
        <a href="<?= site_url('ai-accounts') ?>" class="flex items-center px-4 py-2 text-sm font-medium bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-lg my-2 hover:from-indigo-600 hover:to-purple-700">
            <i data-lucide="sparkles" class="w-5 h-5 mr-3"></i>
            <span class="sidebar-text font-semibold">Tài khoản AI</span>
            <span class="ml-auto inline-flex items-center justify-center px-2 py-0.5 text-xs font-medium rounded bg-white text-indigo-800">Hot</span>
        </a>
        
        <!-- Products Section -->
        <div>
            <button id="submenu-products-toggle" class="w-full flex items-center justify-between px-4 py-2 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-100 hover:text-gray-900">
                <span class="flex items-center">
                    <i data-lucide="shopping-bag" class="w-5 h-5 mr-3"></i>
                    <span class="sidebar-text">Sản phẩm</span>
                </span>
                <i data-lucide="chevron-right" class="w-5 h-5 submenu-icon"></i>
            </button>
            <div id="submenu-products" class="hidden mt-1 space-y-1 pl-4">
                <!-- AI Accounts -->
                <a href="<?= site_url('ai-accounts') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('ai-accounts') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="sparkles" class="w-5 h-5 mr-3 text-indigo-500"></i>
                    <span class="font-semibold text-indigo-600">Tài khoản AI</span>
                </a>
                
                <!-- Social Media -->
                <a href="<?= site_url('products/category/2') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= strpos(current_url(), site_url('products/category/2')) === 0 ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="users" class="w-5 h-5 mr-3"></i>
                    Mạng xã hội
                </a>
                
                <!-- Courses -->
                <a href="<?= site_url('products/category/3') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= strpos(current_url(), site_url('products/category/3')) === 0 ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="book-open" class="w-5 h-5 mr-3"></i>
                    Khóa học
                </a>
                
                <!-- Marketing Services -->
                <a href="<?= site_url('products/category/4') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= strpos(current_url(), site_url('products/category/4')) === 0 ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="megaphone" class="w-5 h-5 mr-3"></i>
                    Dịch vụ Marketing
                </a>
                
                <!-- Domains & Hosting -->
                <a href="<?= site_url('products/category/9') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= strpos(current_url(), site_url('products/category/9')) === 0 ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="globe" class="w-5 h-5 mr-3 text-cyan-600"></i>
                    Domains & Hosting
                </a>
                
                <!-- Website & Themes -->
                <a href="<?= site_url('products/category/10') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= strpos(current_url(), site_url('products/category/10')) === 0 ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="layout" class="w-5 h-5 mr-3 text-violet-600"></i>
                    Website & Themes
                </a>
                
                <!-- Marketing Tools -->
                <a href="<?= site_url('products/category/11') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= strpos(current_url(), site_url('products/category/11')) === 0 ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="bar-chart" class="w-5 h-5 mr-3 text-green-600"></i>
                    Marketing Tools
                </a>
                
                <!-- Digital Content -->
                <a href="<?= site_url('products/category/12') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= strpos(current_url(), site_url('products/category/12')) === 0 ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="file-text" class="w-5 h-5 mr-3 text-blue-600"></i>
                    Digital Content
                </a>
                
                <!-- All Products -->
                <a href="<?= site_url('products') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('products') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="shopping-cart" class="w-5 h-5 mr-3"></i>
                    Tất cả sản phẩm
                </a>
            </div>
        </div>
        
        <!-- Professional Services Section -->
        <div>
            <button id="submenu-services-toggle" class="w-full flex items-center justify-between px-4 py-2 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-100 hover:text-gray-900">
                <span class="flex items-center">
                    <i data-lucide="briefcase" class="w-5 h-5 mr-3"></i>
                    <span class="sidebar-text">Dịch vụ SAAS</span>
                </span>
                <i data-lucide="chevron-right" class="w-5 h-5 submenu-icon"></i>
            </button>
            <div id="submenu-services" class="hidden mt-1 space-y-1 pl-4">
                <!-- All Services -->
                <a href="<?= site_url('services') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('services') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="list" class="w-5 h-5 mr-3"></i>
                    Tất cả dịch vụ
                </a>
                
                <!-- Web & Hosting Services Group -->
                <a href="<?= site_url('services/web') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('services/web') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="layout" class="w-5 h-5 mr-3"></i>
                    Thiết kế Website
                </a>
                
                <a href="<?= site_url('services/hosting') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('services/hosting') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="server" class="w-5 h-5 mr-3"></i>
                    Dịch vụ Hosting
                </a>
                
                <a href="<?= site_url('services/domain') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('services/domain') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="globe" class="w-5 h-5 mr-3"></i>
                    Đăng ký Domain
                </a>

                <a href="<?= site_url('services/ssl') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('services/ssl') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="shield-check" class="w-5 h-5 mr-3"></i>
                    Chứng chỉ SSL
                </a>
                
                <a href="<?= site_url('services/vps') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('services/vps') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="server" class="w-5 h-5 mr-3"></i>
                    Dịch vụ VPS
                </a>
                
                <!-- Development Services Group -->
                <a href="<?= site_url('services/design') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('services/design') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="pencil-ruler" class="w-5 h-5 mr-3"></i>
                    Thiết kế Đồ họa
                </a>
                
                <a href="<?= site_url('services/soft') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('services/soft') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="app-window" class="w-5 h-5 mr-3"></i>
                    Phần Mềm Quản Lý
                </a>
                
                <a href="<?= site_url('services/mobile-app') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('services/mobile-app') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="smartphone" class="w-5 h-5 mr-3"></i>
                    Phát Triển Mobile App
                </a>
                
                <!-- Email Services -->
                <a href="<?= site_url('services/email') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('services/email') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="at-sign" class="w-5 h-5 mr-3"></i>
                    Email Doanh Nghiệp
                </a>
            </div>
        </div>
        
        <!-- Marketing Services Section -->
        <div>
            <button id="submenu-marketing-toggle" class="w-full flex items-center justify-between px-4 py-2 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-100 hover:text-gray-900">
                <span class="flex items-center">
                    <i data-lucide="trending-up" class="w-5 h-5 mr-3"></i>
                    <span class="sidebar-text">Dịch vụ Marketing</span>
                </span>
                <i data-lucide="chevron-right" class="w-5 h-5 submenu-icon"></i>
            </button>
            <div id="submenu-marketing" class="hidden mt-1 space-y-1 pl-4">
                <!-- SEO & Content Marketing -->
                <a href="<?= site_url('services/seo') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('services/seo') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="search" class="w-5 h-5 mr-3"></i>
                    Dịch Vụ SEO
                </a>
                
                <a href="<?= site_url('services/maps') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('services/maps') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="map-pin" class="w-5 h-5 mr-3"></i>
                    Google Maps
                </a>
                
                <a href="<?= site_url('services/content') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('services/content') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="file-text" class="w-5 h-5 mr-3"></i>
                    Viết nội dung
                </a>
                
                <!-- Social Media Marketing -->
                <a href="<?= site_url('services/facebook') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('services/facebook') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="facebook" class="w-5 h-5 mr-3"></i>
                    Facebook Marketing
                </a>
                
                <a href="<?= site_url('services/zalo') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('services/zalo') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="message-circle" class="w-5 h-5 mr-3"></i>
                    Zalo Marketing
                </a>
                
                <a href="<?= site_url('services/zalo-app') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('services/zalo-app') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="layout-grid" class="w-5 h-5 mr-3"></i>
                    Zalo Mini App
                </a>
                
                <a href="<?= site_url('services/zalo-zns') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('services/zalo-zns') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="mail" class="w-5 h-5 mr-3"></i>
                    Zalo ZNS
                </a>
                
                <a href="<?= site_url('services/tiktok') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('services/tiktok') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="video" class="w-5 h-5 mr-3"></i>
                    TikTok Marketing
                </a>
                
                <a href="<?= site_url('services/email-marketing') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('services/email-marketing') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="mail" class="w-5 h-5 mr-3"></i>
                    Email Marketing
                </a>
                
                <!-- KOL/KOC Services -->
                <a href="<?= site_url('services/kol') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('services/kol') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="star" class="w-5 h-5 mr-3"></i>
                    Booking KOL/KOC
                </a>
                
                <!-- Advertising Services -->
                <a href="<?= site_url('services/ads') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('services/ads') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="megaphone" class="w-5 h-5 mr-3"></i>
                    Dịch vụ Quảng Cáo
                </a>
                
                <!-- Demo Resources -->
                <a href="<?= site_url('web-demo') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('web-demo') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="layout" class="w-5 h-5 mr-3"></i>
                    Kho Giao Diện Mẫu
                </a>
            </div>
        </div>
        
        <?php if(session()->get('isLoggedIn')): ?>
            <!-- User Section when logged in -->
            <div>
                <button id="submenu-account-toggle" class="w-full flex items-center justify-between px-4 py-2 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-100 hover:text-gray-900">
                    <span class="flex items-center">
                        <i data-lucide="user" class="w-5 h-5 mr-3"></i>
                        <span class="sidebar-text">Tài khoản</span>
                    </span>
                    <i data-lucide="chevron-right" class="w-5 h-5 submenu-icon"></i>
                </button>
                <div id="submenu-account" class="hidden mt-1 space-y-1 pl-4">
                    <a href="<?= site_url('dashboard') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('dashboard') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                        <i data-lucide="layout-dashboard" class="w-5 h-5 mr-3"></i>
                        Bảng điều khiển
                    </a>
                    
                    <a href="<?= site_url('warehouse') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('warehouse') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                        <i data-lucide="package" class="w-5 h-5 mr-3"></i>
                        Kho sản phẩm của tôi
                    </a>
                    
                    <a href="<?= site_url('orders') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= strpos(current_url(), site_url('orders')) === 0 ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                        <i data-lucide="shopping-bag" class="w-5 h-5 mr-3"></i>
                        Đơn hàng của tôi
                    </a>
                    
                    <a href="<?= site_url('order-history') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('order-history') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                        <i data-lucide="history" class="w-5 h-5 mr-3"></i>
                        Lịch sử đơn hàng
                    </a>
                    
                    <a href="<?= site_url('transactions') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('transactions') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                        <i data-lucide="clock" class="w-5 h-5 mr-3"></i>
                        Lịch sử giao dịch
                    </a>
                    
                    <a href="<?= site_url('deposit') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('deposit') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                        <i data-lucide="wallet" class="w-5 h-5 mr-3"></i>
                        Nạp tiền
                    </a>
                    
                    <a href="<?= site_url('user-profile') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('user-profile') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                        <i data-lucide="user" class="w-5 h-5 mr-3"></i>
                        Thông tin cá nhân
                    </a>
                    
                    <?php if(session()->get('role') == 'admin'): ?>
                        <a href="<?= site_url('admin/dashboard') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('admin/dashboard') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                            <i data-lucide="gauge" class="w-5 h-5 mr-3"></i>
                            Quản lý hệ thống
                        </a>
                    <?php endif; ?>
                    
                    <a href="<?= site_url('logout') ?>" class="flex items-center px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-50 rounded-lg">
                        <i data-lucide="log-out" class="w-5 h-5 mr-3"></i>
                        Đăng xuất
                    </a>
                </div>
            </div>
        <?php else: ?>
            <!-- Auth links -->
            <div class="space-y-1">
                <a href="<?= site_url('login') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('login') ? 'bg-indigo-600 text-white' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="log-in" class="w-5 h-5 mr-3"></i>
                    Đăng nhập
                </a>
                
                <a href="<?= site_url('register') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('register') ? 'bg-indigo-600 text-white' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="user-plus" class="w-5 h-5 mr-3"></i>
                    Đăng ký
                </a>
            </div>
        <?php endif; ?>
        
        <!-- Resources Section -->
        <div>
            <button id="submenu-help-toggle" class="w-full flex items-center justify-between px-4 py-2 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-100 hover:text-gray-900">
                <span class="flex items-center">
                    <i data-lucide="help-circle" class="w-5 h-5 mr-3"></i>
                    <span class="sidebar-text">Tài nguyên & Hỗ trợ</span>
                </span>
                <i data-lucide="chevron-right" class="w-5 h-5 submenu-icon"></i>
            </button>
            <div id="submenu-help" class="hidden mt-1 space-y-1 pl-4">
                <a href="<?= site_url('help') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('help') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="life-buoy" class="w-5 h-5 mr-3"></i>
                    Trung tâm hỗ trợ
                </a>
                
                <a href="<?= site_url('knowledge') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('knowledge') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="book-open" class="w-5 h-5 mr-3"></i>
                    Kiến thức & Hướng dẫn
                </a>
                
                <a href="<?= site_url('academy') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('academy') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="file-text" class="w-5 h-5 mr-3"></i>
                    Kho Tài Liệu
                </a>
                
                <a href="<?= site_url('news') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('news') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="newspaper" class="w-5 h-5 mr-3"></i>
                    Blog & Tin tức
                </a>
                
                <a href="<?= site_url('courses') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('courses') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="graduation-cap" class="w-5 h-5 mr-3"></i>
                    Khoá học online
                </a>
                
                <a href="<?= site_url('audiobooks') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('audiobooks') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="headphones" class="w-5 h-5 mr-3"></i>
                    Kho sách nói
                </a>
                
                <a href="<?= site_url('about') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('about') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="info" class="w-5 h-5 mr-3"></i>
                    Giới thiệu
                </a>
                
                <a href="<?= site_url('contact') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('contact') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="message-square" class="w-5 h-5 mr-3"></i>
                    Liên hệ
                </a>
                
                <a href="<?= site_url('faq') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= current_url() == site_url('faq') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                    <i data-lucide="help-circle" class="w-5 h-5 mr-3"></i>
                    FAQ
                </a>
            </div>
        </div>
    </nav>
</aside> 