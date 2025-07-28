<!-- Sidebar -->
<aside class="hidden md:flex flex-col w-64 bg-white border-r">
    <!-- Logo -->
    <div class="flex items-center justify-center h-16 border-b">
         <a href="<?= site_url('admin/dashboard') ?>" class="flex items-center gap-2 text-2xl font-bold text-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-indigo-600"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="M12 22c-1.657 0-3-4.477-3-10s1.343-10 3-10 3 4.477 3 10-1.343 10-3 10z"/><path d="M2 12h20"/></svg>
            <span class="text-gray-800">Admin</span>
        </a>
    </div>
    <!-- Navigation -->
    <nav class="flex-1 p-4 space-y-2">
        <a href="<?= site_url('admin/dashboard') ?>" class="flex items-center px-4 py-2 text-sm font-semibold <?= current_url() == site_url('admin/dashboard') ? 'text-white bg-indigo-600' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
            <i data-lucide="layout-dashboard" class="w-5 h-5 mr-3"></i>
            Bảng điều khiển
        </a>
        <a href="<?= site_url('admin/news') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= strpos(current_url(), site_url('admin/news')) === 0 ? 'text-white bg-indigo-600' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
            <i data-lucide="newspaper" class="w-5 h-5 mr-3"></i>
            Quản lý Tin Tức
        </a>
        <a href="<?= site_url('admin/news/categories') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= strpos(current_url(), site_url('admin/news/categories')) === 0 ? 'text-white bg-indigo-600' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
            <i data-lucide="tag" class="w-5 h-5 mr-3"></i>
            Quản lý Danh Mục Tin Tức
        </a>
        <a href="<?= site_url('admin/knowledge') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= strpos(current_url(), site_url('admin/knowledge')) === 0 ? 'text-white bg-indigo-600' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
            <i data-lucide="graduation-cap" class="w-5 h-5 mr-3"></i>
            Quản lý Kiến Thức
        </a>
        <a href="<?= site_url('admin/knowledge/categories') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= strpos(current_url(), site_url('admin/knowledge/categories')) === 0 ? 'text-white bg-indigo-600' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
            <i data-lucide="folder" class="w-5 h-5 mr-3"></i>
            Quản lý Danh Mục Kiến Thức
        </a>
        <a href="<?= site_url('admin/products') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= strpos(current_url(), site_url('admin/products')) === 0 ? 'text-white bg-indigo-600' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
            <i data-lucide="package" class="w-5 h-5 mr-3"></i>
            Quản lý Sản phẩm
        </a>
        <a href="<?= site_url('admin/orders') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= strpos(current_url(), site_url('admin/orders')) === 0 ? 'text-white bg-indigo-600' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
            <i data-lucide="shopping-cart" class="w-5 h-5 mr-3"></i>
            Quản lý Đơn hàng
        </a>
        <a href="<?= site_url('admin/services') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= strpos(current_url(), site_url('admin/services')) === 0 ? 'text-white bg-indigo-600' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
            <i data-lucide="wrench" class="w-5 h-5 mr-3"></i>
            Quản lý Dịch vụ
        </a>
        <a href="<?= site_url('admin/users') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= strpos(current_url(), site_url('admin/users')) === 0 ? 'text-white bg-indigo-600' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
            <i data-lucide="users" class="w-5 h-5 mr-3"></i>
            Quản lý Người dùng
        </a>
        <a href="<?= site_url('admin/audiobooks') ?>" class="flex items-center px-4 py-2 text-sm font-medium <?= strpos(current_url(), site_url('admin/audiobooks')) === 0 ? 'text-white bg-indigo-600' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?> rounded-lg">
            <i data-lucide="book-open" class="w-5 h-5 mr-3"></i>
            Quản lý Sách nói
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
</aside> 