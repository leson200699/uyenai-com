<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Public Routes
$routes->get('/', 'Home::index');
$routes->get('about', 'Home::about');
$routes->get('contact', 'Home::contact');
$routes->post('contact', 'Home::submitContact');
$routes->get('faq', 'Home::faq');
$routes->get('terms', 'Home::terms');
$routes->get('privacy', 'Home::privacy');
$routes->get('/help', 'Home::help');
$routes->get('/knowledge', 'Home::knowledge');
$routes->get('/academy', 'Home::academy');
$routes->get('/hosting-manage', 'Home::hostingManage');
$routes->get('/invoice', 'Home::invoice');
$routes->get('/course-detail', 'Home::courseDetail');
$routes->get('/courses', 'Home::courses');
$routes->get('/warehouse', 'Home::warehouse');
$routes->get('/knowledge/(:num)', 'Home::knowledgeDetail/$1');
$routes->get('/knowledge/category/(:any)', 'Home::knowledgeCategory/$1');
$routes->get('/knowledge/category', 'Home::knowledgeCategory');
$routes->get('/order-history', 'Home::orderHistory');
$routes->get('/deposit', 'Home::deposit');
$routes->get('/news', 'Home::news');
$routes->get('/news/(:num)', 'Home::newsDetail/$1');
$routes->get('/product', 'Home::product');
$routes->get('/service', 'Home::generalService');
$routes->get('/user-profile', 'Home::userProfile');
$routes->get('/vps/(:segment)', 'Home::vpsManage/$1');
$routes->get('/vps', 'Home::vpsManage');
$routes->get('/web-demo', 'Home::webDemo');

// API Routes - Không yêu cầu CSRF
$routes->group('api', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('new-csrf', 'ApiController::getNewCsrf');
    $routes->post('check-whois', 'ApiController::checkWhois');
});

// Các route cũ (giữ lại để tương thích)
$routes->post('check_whois', 'Services::check_whois');
$routes->post('services/check_whois', 'Services::check_whois');
$routes->get('new-csrf', 'Ajax::getNewCsrf');

// Ajax Routes
$routes->post('ajax/search', 'Ajax::search');
$routes->get('ajax/get_account_details', 'Ajax::get_account_details');

// Services Routes
$routes->get('services', 'Services::index');
$routes->get('services/web', 'Services::web');
$routes->get('services/hosting', 'Services::hosting');
$routes->get('services/domain', 'Services::domain');
$routes->get('services/seo', 'Services::seo');
$routes->get('services/facebook', 'Services::facebook');
$routes->get('services/zalo', 'Services::zalo');
$routes->get('services/tiktok', 'Services::tiktok');
$routes->get('services/mobile-app', 'Services::mobileApp');
$routes->get('services/email-marketing', 'Services::emailMarketing');
$routes->get('services/kol', 'Services::kol');
$routes->get('services/content', 'Services::contentWriting');
$routes->get('services/vps', 'Services::vps');
$routes->get('services/maps', 'Services::maps');
$routes->get('services/ads', 'Services::ads');
$routes->get('services/zalo-app', 'Services::zaloApp');
$routes->get('services/zalo-zns', 'Services::zaloZns');
$routes->get('services/design', 'Services::design');
$routes->get('services/email', 'Services::email');
$routes->get('services/soft', 'Services::soft');
$routes->get('services/ssl', 'Services::ssl');

// Product Routes - Publicly accessible
$routes->get('products', 'Products::index');
$routes->get('products/category/(:num)', 'Products::category/$1');
$routes->get('products/view/(:num)', 'Products::view/$1');
$routes->get('products/search', 'Products::search');
$routes->get('ai-accounts', 'Products::aiAccounts');

// Auth Routes
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::processLogin');
$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::processRegister');
$routes->get('logout', 'Auth::logout');

// Cart Routes - Public for viewing, but checkout requires login
$routes->get('cart', 'Cart::index');
$routes->post('cart/add', 'Cart::add');
$routes->post('cart/addMultiple', 'Cart::addMultiple');
$routes->post('cart/add-web-service', 'Cart::addWebService');
$routes->post('cart/add-domain', 'Cart::addDomain');
$routes->post('cart/update', 'Cart::update');
$routes->get('cart/remove/(:segment)', 'Cart::removeItem/$1');
$routes->post('cart/remove', 'Cart::remove');
$routes->post('cart/clear', 'Cart::clear');
$routes->get('cart/count', 'Cart::getCount');

// Protected Routes (require login)
$routes->group('', ['filter' => 'auth'], function($routes) {
    // User Dashboard
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('profile', 'Auth::profile');
    $routes->post('profile', 'Auth::updateProfile');
    $routes->get('deposit', 'Dashboard::deposit');
    $routes->post('deposit', 'Dashboard::processDeposit');
    $routes->get('transactions', 'Dashboard::transactions');
    
    // Order Routes - These require login
    $routes->get('orders', 'Orders::index');
    $routes->get('orders/view/(:num)', 'Orders::view/$1');
    $routes->get('checkout', 'Orders::create');
    $routes->post('checkout', 'Orders::store');
    $routes->post('orders/cancel/(:num)', 'Orders::cancel/$1');
});

// Audiobooks frontend - đảm bảo routes này có mức ưu tiên cao nhất để không bị ghi đè

$routes->get('audiobooks', 'Audiobooks::index');
$routes->get('audiobooks/detail/(:num)', 'Audiobooks::detail/$1');

// Admin Routes
$routes->group('admin', ['filter' => 'admin'], function($routes) {
    $routes->get('dashboard', 'Dashboard::adminIndex');
    
    // Admin Product Management
    $routes->get('products', 'Admin\Products::index');
    $routes->get('products/create', 'Admin\Products::create');
    $routes->post('products/store', 'Admin\Products::store');
    $routes->get('products/edit/(:num)', 'Admin\Products::edit/$1');
    $routes->post('products/update/(:num)', 'Admin\Products::update/$1');
    $routes->get('products/delete/(:num)', 'Admin\Products::delete/$1');
    
    // Admin Order Management
    $routes->get('orders', 'Admin\Orders::index');
    $routes->get('orders/view/(:num)', 'Admin\Orders::view/$1');
    $routes->post('orders/update-status/(:num)', 'Admin\Orders::updateStatus/$1');
    
    // Admin User Management
    $routes->get('users', 'Admin\Users::index');
    $routes->get('users/view/(:num)', 'Admin\Users::view/$1');
    $routes->get('users/create', 'Admin\Users::create');
    $routes->post('users/create', 'Admin\Users::store');
    $routes->get('users/edit/(:num)', 'Admin\Users::edit/$1');
    $routes->post('users/edit/(:num)', 'Admin\Users::update/$1');
    $routes->get('users/delete/(:num)', 'Admin\Users::delete/$1');
    
    // Admin Category Management
    $routes->get('categories', 'Admin\Categories::index');
    $routes->get('categories/create', 'Admin\Categories::create');
    $routes->post('categories/create', 'Admin\Categories::store');
    $routes->get('categories/edit/(:num)', 'Admin\Categories::edit/$1');
    $routes->post('categories/edit/(:num)', 'Admin\Categories::update/$1');
    $routes->get('categories/delete/(:num)', 'Admin\Categories::delete/$1');
    
    // Admin Service Management
    $routes->get('services', 'Admin\Services::index');
    $routes->get('services/create', 'Admin\Services::create');
    $routes->post('services/store', 'Admin\Services::store');
    $routes->get('services/edit/(:segment)', 'Admin\Services::edit/$1');
    $routes->post('services/update/(:segment)', 'Admin\Services::update/$1');
    $routes->get('services/delete/(:segment)', 'Admin\Services::delete/$1');

    // Admin Audiobooks Management
    $routes->get('audiobooks', 'Admin\\Audiobooks::index');
    $routes->get('audiobooks/create', 'Admin\\Audiobooks::create');
    $routes->post('audiobooks/store', 'Admin\\Audiobooks::store');
    $routes->get('audiobooks/edit/(:num)', 'Admin\\Audiobooks::edit/$1');
    $routes->post('audiobooks/update/(:num)', 'Admin\\Audiobooks::update/$1');
    $routes->get('audiobooks/delete/(:num)', 'Admin\\Audiobooks::delete/$1');

    // Routes cho quản lý tin tức
    $routes->get('news', 'Admin\News::index');
    $routes->get('news/create', 'Admin\News::create');
    $routes->post('news/store', 'Admin\News::store');
    $routes->get('news/edit/(:num)', 'Admin\News::edit/$1');
    $routes->post('news/update/(:num)', 'Admin\News::update/$1');
    $routes->post('news/delete/(:num)', 'Admin\News::delete/$1');

    // Routes cho quản lý danh mục tin tức
    $routes->get('news/categories', 'Admin\NewsCategories::index');
    $routes->get('news/categories/create', 'Admin\NewsCategories::create');
    $routes->post('news/categories/store', 'Admin\NewsCategories::store');
    $routes->get('news/categories/edit/(:num)', 'Admin\NewsCategories::edit/$1');
    $routes->post('news/categories/update/(:num)', 'Admin\NewsCategories::update/$1');
    $routes->post('news/categories/delete/(:num)', 'Admin\NewsCategories::delete/$1');

    // Routes cho quản lý kiến thức
    $routes->get('knowledge', 'Admin\Knowledge::index');
    $routes->get('knowledge/create', 'Admin\Knowledge::create');
    $routes->post('knowledge/store', 'Admin\Knowledge::store');
    $routes->get('knowledge/edit/(:num)', 'Admin\Knowledge::edit/$1');
    $routes->post('knowledge/update/(:num)', 'Admin\Knowledge::update/$1');
    $routes->post('knowledge/delete/(:num)', 'Admin\Knowledge::delete/$1');

    // Routes cho quản lý danh mục kiến thức
    $routes->get('knowledge/categories', 'Admin\KnowledgeCategories::index');
    $routes->get('knowledge/categories/create', 'Admin\KnowledgeCategories::create');
    $routes->post('knowledge/categories/store', 'Admin\KnowledgeCategories::store');
    $routes->get('knowledge/categories/edit/(:num)', 'Admin\KnowledgeCategories::edit/$1');
    $routes->post('knowledge/categories/update/(:num)', 'Admin\KnowledgeCategories::update/$1');
    $routes->post('knowledge/categories/delete/(:num)', 'Admin\KnowledgeCategories::delete/$1');

    // Routes cho File Manager
    $routes->get('filemanager', 'Admin\FileManager::index');
    $routes->get('filemanager/browse', 'Admin\FileManager::browse');
    $routes->post('filemanager/upload', 'Admin\FileManager::upload');
    $routes->post('filemanager/create-folder', 'Admin\FileManager::createFolder');
    $routes->post('filemanager/delete', 'Admin\FileManager::delete');
    $routes->post('filemanager/rename', 'Admin\FileManager::rename');
});
