<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> - UyenAI</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Plyr CSS -->
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    
    <!-- Rich Text Content Styles -->
    <link rel="stylesheet" href="/css/rich-text-editor.css">

    <!-- Lucide Icons -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6; /* Light gray background */
        }
        /* Custom scrollbar for webkit browsers */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #d1d5db;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #9ca3af;
        }
        .submenu-icon {
            transition: transform 0.2s;
        }
        .submenu-open .submenu-icon {
            transform: rotate(90deg);
        }
        
        /* Sidebar Transitions */
        .sidebar {
            transition: width 0.3s ease-in-out;
        }
        .sidebar.collapsed {
            width: 5rem;
        }
        .sidebar.collapsed .sidebar-text {
            display: none;
        }
        .sidebar.collapsed .sidebar-logo-text {
            display: none;
        }
        .sidebar.collapsed .submenu-icon {
            display: none;
        }
        .sidebar.collapsed nav a, 
        .sidebar.collapsed nav button {
            justify-content: center;
        }
        .sidebar.collapsed nav a i, 
        .sidebar.collapsed nav button i {
            margin-right: 0;
        }
        
        .main-content {
            transition: margin-left 0.3s ease-in-out;
        }
        
        @media (min-width: 768px) {
            .main-content.expanded {
                margin-left: 5rem;
            }
        }

        /* SweetAlert2 Customizations for vertical centering and backdrop blur */
        body.swal2-shown > [aria-hidden="true"] {
            filter: blur(5px);
            transition: filter 0.1s linear;
        }

        .swal2-container {
            display: grid !important;
            place-items: center !important;
        }
    </style>
    
    <?= $this->renderSection('styles') ?>
</head>
<body class="text-gray-800">

<div class="flex h-screen bg-gray-100">
    <!-- Include Sidebar -->
    <?= $this->include('partials/sidebar') ?>

    <!-- ===== Main Content ===== -->
    <div class="flex flex-col flex-1 overflow-y-auto main-content">
        <!-- Include Header -->
        <?= $this->include('partials/header') ?>

        <!-- Content -->
        <main class="p-6">
            <?php if(session()->getFlashdata('success')): ?>
                <div class="mb-4 p-4 bg-green-100 border border-green-200 text-green-700 rounded-lg">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
            
            <?php if(session()->getFlashdata('error')): ?>
                <div class="mb-4 p-4 bg-red-100 border border-red-200 text-red-700 rounded-lg">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            
            <?php if(session()->getFlashdata('errors')): ?>
                <div class="mb-4 p-4 bg-red-100 border border-red-200 text-red-700 rounded-lg">
                    <ul class="list-disc list-inside">
                        <?php foreach(session()->getFlashdata('errors') as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            
            <?= $this->renderSection('content') ?>
        </main>
        
        <!-- Include Footer -->
        <?= $this->include('partials/footer') ?>
    </div>
</div>

<!-- Include Mobile Menu -->
<?= $this->include('partials/mobile-menu') ?>

<!-- JavaScript -->
<script>
    // Initialize Lucide Icons
    document.addEventListener('DOMContentLoaded', function () {
        lucide.createIcons();
        
        // User menu dropdown toggle
        const userMenuButton = document.getElementById('user-menu-button');
        const userMenuDropdown = document.getElementById('user-menu-dropdown');
        
        if (userMenuButton && userMenuDropdown) {
            userMenuButton.addEventListener('click', function() {
                userMenuDropdown.classList.toggle('hidden');
            });
            
            // Close dropdown when clicking outside
            document.addEventListener('click', function(event) {
                if (!userMenuButton.contains(event.target) && !userMenuDropdown.contains(event.target)) {
                    userMenuDropdown.classList.add('hidden');
                }
            });
        }
        
        // Mobile menu
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuContent = document.getElementById('mobile-menu-content');
        const mobileMenuClose = document.getElementById('mobile-menu-close');
        const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
        
        if (mobileMenuButton && mobileMenu && mobileMenuContent && mobileMenuClose && mobileMenuOverlay) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.remove('hidden');
                setTimeout(() => {
                    mobileMenuContent.classList.remove('-translate-x-full');
                }, 10);
            });
            
            const closeMobileMenu = function() {
                mobileMenuContent.classList.add('-translate-x-full');
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                }, 300);
            };
            
            mobileMenuClose.addEventListener('click', closeMobileMenu);
            mobileMenuOverlay.addEventListener('click', closeMobileMenu);
        }
        
        // Sidebar Submenu toggles
        function setupSubmenuToggle(toggleId, submenuId) {
            const toggleButton = document.getElementById(toggleId);
            const submenu = document.getElementById(submenuId);
            if (toggleButton && submenu) {
                toggleButton.addEventListener('click', () => {
                    // Đóng tất cả các submenu trước khi mở submenu hiện tại
                    const allSubmenus = document.querySelectorAll('.sidebar nav > div > div');
                    const allToggles = document.querySelectorAll('.sidebar nav > div > button');
                    
                    // Nếu submenu này đang mở, chỉ đóng nó lại
                    if (!submenu.classList.contains('hidden')) {
                        submenu.classList.add('hidden');
                        toggleButton.classList.remove('submenu-open');
                        toggleButton.classList.remove('bg-blue-600');
                        toggleButton.classList.remove('text-white');
                        return;
                    }
                    
                    // Đóng tất cả các submenu và reset style
                    allSubmenus.forEach(menu => {
                        if (menu.id !== submenuId) {
                            menu.classList.add('hidden');
                        }
                    });
                    
                    // Reset style cho tất cả các toggle button
                    allToggles.forEach(toggle => {
                        if (toggle.id !== toggleId) {
                            toggle.classList.remove('submenu-open');
                            toggle.classList.remove('bg-blue-600');
                            toggle.classList.remove('text-white');
                        }
                    });
                    
                    // Mở submenu hiện tại và áp dụng style
                    submenu.classList.toggle('hidden');
                    toggleButton.classList.toggle('submenu-open');
                    
                    // Thêm style cho active toggle
                    toggleButton.classList.add('bg-blue-600');
                    toggleButton.classList.add('text-white');
                });
            }
        }
        
        // Setup sidebar submenu toggles
        setupSubmenuToggle('submenu-products-toggle', 'submenu-products');
        setupSubmenuToggle('submenu-services-toggle', 'submenu-services');
        setupSubmenuToggle('submenu-marketing-toggle', 'submenu-marketing');
        setupSubmenuToggle('submenu-account-toggle', 'submenu-account');
        setupSubmenuToggle('submenu-help-toggle', 'submenu-help');
        
        // Setup mobile submenu toggles
        setupSubmenuToggle('mobile-submenu-products-toggle', 'mobile-submenu-products');
        setupSubmenuToggle('mobile-submenu-services-toggle', 'mobile-submenu-services');
        setupSubmenuToggle('mobile-submenu-marketing-toggle', 'mobile-submenu-marketing');
        setupSubmenuToggle('mobile-submenu-account-toggle', 'mobile-submenu-account');
        setupSubmenuToggle('mobile-submenu-help-toggle', 'mobile-submenu-help');
        
        // Sử dụng hàm để mở menu theo URL và đóng các menu khác
        function openMenuByUrl() {
            // Lấy tất cả menu và toggle button
            const allSubmenus = {
                products: document.getElementById('submenu-products'),
                services: document.getElementById('submenu-services'),
                marketing: document.getElementById('submenu-marketing'),
                account: document.getElementById('submenu-account'),
                help: document.getElementById('submenu-help')
            };
            
            const allToggles = {
                products: document.getElementById('submenu-products-toggle'),
                services: document.getElementById('submenu-services-toggle'),
                marketing: document.getElementById('submenu-marketing-toggle'),
                account: document.getElementById('submenu-account-toggle'),
                help: document.getElementById('submenu-help-toggle')
            };
            
            // Đóng tất cả các menu trước
            for (const key in allSubmenus) {
                if (allSubmenus[key]) {
                    allSubmenus[key].classList.add('hidden');
                }
            }
            
            // Reset style cho tất cả toggle
            for (const key in allToggles) {
                if (allToggles[key]) {
                    allToggles[key].classList.remove('submenu-open');
                    allToggles[key].classList.remove('bg-blue-600');
                    allToggles[key].classList.remove('text-white');
                }
            }
            
            // Xác định menu nào cần mở dựa vào URL
            let activeMenu = null;
            
            // Kiểm tra URL và đặt activeMenu tương ứng
            if (window.location.href.includes('/services/web') || 
                window.location.href.includes('/services/hosting') || 
                window.location.href.includes('/services/domain') || 
                window.location.href.includes('/services/ssl') || 
                window.location.href.includes('/services/vps') || 
                window.location.href.includes('/services/design') || 
                window.location.href.includes('/services/soft') || 
                window.location.href.includes('/services/mobile-app') || 
                window.location.href.includes('/services/email')) {
                activeMenu = 'services';
            } 
            else if (window.location.href.includes('/services/facebook') || 
                window.location.href.includes('/services/zalo') || 
                window.location.href.includes('/services/seo') || 
                window.location.href.includes('/services/tiktok') || 
                window.location.href.includes('/services/content') || 
                window.location.href.includes('/services/email-marketing') || 
                window.location.href.includes('/services/ads') || 
                window.location.href.includes('/services/kol') || 
                window.location.href.includes('/services/maps') ||
                window.location.href.includes('/web-demo')) {
                activeMenu = 'marketing';
            }
            else if (window.location.href.includes('/products') || window.location.href.includes('/ai-accounts')) {
                activeMenu = 'products';
            }
            else if (window.location.href.includes('/knowledge') || 
                window.location.href.includes('/academy') || 
                window.location.href.includes('/help') || 
                window.location.href.includes('/news') || 
                window.location.href.includes('/courses') || 
                window.location.href.includes('/audiobooks') || 
                window.location.href.includes('/about') || 
                window.location.href.includes('/contact') || 
                window.location.href.includes('/faq')) {
                activeMenu = 'help';
            }
            else if (window.location.href.includes('/dashboard') || 
                window.location.href.includes('/orders') || 
                window.location.href.includes('/warehouse') || 
                window.location.href.includes('/user-profile') ||
                window.location.href.includes('/deposit') ||
                window.location.href.includes('/transactions')) {
                activeMenu = 'account';
            }
            
            // Nếu không có menu nào được xác định là active (ví dụ: trang chủ),
            // mặc định mở menu Dịch vụ SAAS
            if (!activeMenu) {
                activeMenu = 'services';
            }
            
            // Mở menu active nếu có
            if (activeMenu && allSubmenus[activeMenu] && allToggles[activeMenu]) {
                allSubmenus[activeMenu].classList.remove('hidden');
                allToggles[activeMenu].classList.add('submenu-open');
                allToggles[activeMenu].classList.add('bg-blue-600');
                allToggles[activeMenu].classList.add('text-white');
            }
        }
        
        // Gọi hàm khi trang tải xong
        openMenuByUrl();
        
        // Sidebar collapse functionality
        const sidebarToggleBtn = document.getElementById('sidebar-toggle');
        const sidebar = document.querySelector('.sidebar');
        const mainContent = document.querySelector('.main-content');
        
        if (sidebarToggleBtn && sidebar && mainContent) {
            sidebarToggleBtn.addEventListener('click', () => {
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('expanded');
                
                // Store the sidebar state in localStorage
                const isSidebarCollapsed = sidebar.classList.contains('collapsed');
                localStorage.setItem('sidebarCollapsed', isSidebarCollapsed);
            });
            
            // Restore sidebar state from localStorage on page load
            const sidebarState = localStorage.getItem('sidebarCollapsed');
            if (sidebarState === 'true') {
                sidebar.classList.add('collapsed');
                mainContent.classList.add('expanded');
            }
        }
    });
    
    // Ajax search functionality
    const searchInput = document.getElementById('ajax-search');
    const searchResults = document.getElementById('search-results');
    const searchResultsList = document.getElementById('search-results-list');
    const searchLoading = document.getElementById('search-loading');
    const searchNoResults = document.getElementById('search-no-results');
    
    let searchTimeout;
    
    if (searchInput && searchResults) {
        // Show results on focus
        searchInput.addEventListener('focus', () => {
            if (searchInput.value.length > 1) {
                searchResults.classList.remove('hidden');
            }
        });
        
        // Hide results when clicking outside
        document.addEventListener('click', (e) => {
            if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
                searchResults.classList.add('hidden');
            }
        });
        
        // Handle search input
        searchInput.addEventListener('input', function() {
            const keyword = this.value.trim();
            
            // Clear previous timeout
            if (searchTimeout) {
                clearTimeout(searchTimeout);
            }
            
            if (keyword.length <= 1) {
                searchResults.classList.add('hidden');
                return;
            }
            
            // Show loading
            searchResults.classList.remove('hidden');
            searchLoading.style.display = 'block';
            searchResultsList.innerHTML = '';
            searchNoResults.style.display = 'none';
            
            // Set timeout to prevent too many requests
            searchTimeout = setTimeout(() => {
                fetch('<?= site_url('ajax/search') ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: `keyword=${encodeURIComponent(keyword)}`
                })
                .then(response => response.json())
                .then(data => {
                    searchLoading.style.display = 'none';
                    
                    if (data.success && data.results.length > 0) {
                        searchResultsList.innerHTML = '';
                        
                        // Group results by type
                        const groupedResults = data.results.reduce((groups, item) => {
                            const group = groups[item.type] || [];
                            group.push(item);
                            groups[item.type] = group;
                            return groups;
                        }, {});
                        
                        // Display each type of result
                        for (const [type, items] of Object.entries(groupedResults)) {
                            const typeName = type === 'product' ? 'Sản phẩm' : 'Dịch vụ';
                            
                            const typeHeader = document.createElement('div');
                            typeHeader.className = 'px-4 py-2 bg-gray-50 text-xs font-semibold text-gray-600 uppercase';
                            typeHeader.textContent = typeName;
                            searchResultsList.appendChild(typeHeader);
                            
                            items.forEach(item => {
                                const resultItem = document.createElement('a');
                                resultItem.href = item.url;
                                resultItem.className = 'flex items-center px-4 py-3 hover:bg-gray-50 border-b border-gray-100';
                                
                                resultItem.innerHTML = `
                                    <img src="${item.image}" alt="${item.title}" class="w-8 h-8 rounded object-cover mr-3">
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">${item.title}</div>
                                        <div class="text-xs text-gray-500">${typeName}</div>
                                    </div>
                                `;
                                
                                searchResultsList.appendChild(resultItem);
                            });
                        }
                        
                        searchNoResults.style.display = 'none';
                    } else {
                        searchResultsList.innerHTML = '';
                        searchNoResults.style.display = 'block';
                    }
                })
                .catch(error => {
                    console.error('Search error:', error);
                    searchLoading.style.display = 'none';
                    searchNoResults.style.display = 'block';
                });
            }, 300);
        });
    }
</script>

<!-- Plyr JS and Hls.js -->
<script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
<script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>

<?= $this->renderSection('scripts') ?>
</body>
</html> 