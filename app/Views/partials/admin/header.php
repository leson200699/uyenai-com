<!-- Header -->
<header class="flex items-center justify-between h-16 px-6 bg-white border-b">
    <!-- Mobile Menu Button -->
    <button id="mobile-menu-button" class="md:hidden p-2 rounded-md text-gray-500 hover:bg-gray-100">
        <i data-lucide="menu" class="w-6 h-6"></i>
    </button>
    
    <!-- Page Title -->
    <h1 class="text-xl font-semibold text-gray-800 hidden md:block"><?= $this->renderSection('page_title') ?></h1>

    <!-- User Menu -->
    <div class="flex items-center gap-4">
        <div class="relative">
            <button id="user-menu-button" class="flex items-center gap-2">
                <img src="https://placehold.co/32x32/e0e7ff/4338ca?text=<?= strtoupper(substr(session()->get('name'), 0, 1)) ?>" alt="Avatar" class="w-8 h-8 rounded-full">
                <span class="hidden lg:block text-sm font-medium"><?= session()->get('name') ?></span>
                <i data-lucide="chevron-down" class="hidden lg:block w-4 h-4 text-gray-500"></i>
            </button>
            <!-- Dropdown (hidden by default) -->
            <div id="user-menu-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                <a href="<?= site_url('profile') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Thông tin cá nhân</a>
                <hr class="my-1 border-gray-200">
                <a href="<?= site_url('logout') ?>" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Đăng xuất</a>
            </div>
        </div>
    </div>
</header> 