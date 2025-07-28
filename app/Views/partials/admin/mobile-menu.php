<!-- Mobile menu -->
<div id="mobile-menu" class="fixed inset-0 z-40 hidden">
    <div class="absolute inset-0 bg-black opacity-50" id="mobile-menu-overlay"></div>
    <div class="absolute inset-y-0 left-0 w-64 bg-white shadow-lg transform transition-transform duration-300 -translate-x-full" id="mobile-menu-content">
        <!-- Logo -->
        <div class="flex items-center justify-between h-16 px-6 border-b">
            <a href="<?= site_url('admin/dashboard') ?>" class="flex items-center gap-2 text-xl font-bold text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-indigo-600"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="M12 22c-1.657 0-3-4.477-3-10s1.343-10 3-10 3 4.477 3 10-1.343 10-3 10z"/><path d="M2 12h20"/></svg>
                <span>Admin</span>
            </a>
            <button id="mobile-menu-close" class="p-2 rounded-md text-gray-500 hover:bg-gray-100">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
        </div>
        
        <!-- Mobile Navigation -->
        <nav class="p-4 space-y-2 overflow-y-auto max-h-screen pb-20">
            <!-- Same navigation items as the sidebar -->
            <a href="<?= site_url('admin/dashboard') ?>" class="flex items-center px-4 py-2 text-sm font-semibold <?= current_url() == site_url('admin/dashboard') ? 'text-white bg-indigo-600' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                <i data-lucide="layout-dashboard" class="w-5 h-5 mr-3"></i>
                Bảng điều khiển
            </a>
            <a href="<?= site_url('admin/products') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= strpos(current_url(), site_url('admin/products')) === 0 ? 'text-white bg-indigo-600' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                <i data-lucide="package" class="w-5 h-5 mr-3"></i>
                Quản lý Sản phẩm
            </a>
            <a href="<?= site_url('admin/categories') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= strpos(current_url(), site_url('admin/categories')) === 0 ? 'text-white bg-indigo-600' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                <i data-lucide="tag" class="w-5 h-5 mr-3"></i>
                Quản lý Danh mục
            </a>
            <a href="<?= site_url('admin/orders') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= strpos(current_url(), site_url('admin/orders')) === 0 ? 'text-white bg-indigo-600' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                <i data-lucide="shopping-cart" class="w-5 h-5 mr-3"></i>
                Quản lý Đơn hàng
            </a>
            <a href="<?= site_url('admin/users') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= strpos(current_url(), site_url('admin/users')) === 0 ? 'text-white bg-indigo-600' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
                <i data-lucide="users" class="w-5 h-5 mr-3"></i>
                Quản lý Người dùng
            </a>
            <div class="pt-4">
                <hr class="border-gray-200">
            </div>
            <a href="<?= site_url('/') ?>" class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-900 rounded-lg">
                <i data-lucide="layout" class="w-5 h-5 mr-3"></i>
                Xem trang chính
            </a>
            <a href="<?= site_url('logout') ?>" class="flex items-center px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-50 rounded-lg">
                <i data-lucide="log-out" class="w-5 h-5 mr-3"></i>
                Đăng xuất
            </a>
        </nav>
    </div>
</div> 