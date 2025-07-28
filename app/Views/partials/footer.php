<!-- Footer -->
<footer class="py-6 px-6 border-t bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-lg font-semibold mb-4">UyenAI</h3>
                <p class="text-sm text-gray-600">Cung cấp các sản phẩm và dịch vụ AI chất lượng cao.</p>
                <div class="flex items-center mt-4 space-x-3">
                    <a href="#" class="text-gray-500 hover:text-indigo-600">
                        <i data-lucide="facebook" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-indigo-600">
                        <i data-lucide="instagram" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-indigo-600">
                        <i data-lucide="twitter" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-indigo-600">
                        <i data-lucide="youtube" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Dịch vụ</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="<?= site_url('products/category/1') ?>" class="text-gray-600 hover:text-indigo-600">Tài khoản AI</a></li>
                    <li><a href="<?= site_url('products/category/2') ?>" class="text-gray-600 hover:text-indigo-600">Mạng xã hội</a></li>
                    <li><a href="<?= site_url('products/category/3') ?>" class="text-gray-600 hover:text-indigo-600">Khóa học</a></li>
                    <li><a href="<?= site_url('products/category/4') ?>" class="text-gray-600 hover:text-indigo-600">Dịch vụ Marketing</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Liên kết</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="/" class="text-gray-600 hover:text-indigo-600">Trang chủ</a></li>
                    <li><a href="<?= site_url('products') ?>" class="text-gray-600 hover:text-indigo-600">Sản phẩm</a></li>
                    <li><a href="<?= site_url('about') ?>" class="text-gray-600 hover:text-indigo-600">Về chúng tôi</a></li>
                    <li><a href="<?= site_url('contact') ?>" class="text-gray-600 hover:text-indigo-600">Liên hệ</a></li>
                    <li><a href="<?= site_url('faq') ?>" class="text-gray-600 hover:text-indigo-600">FAQ</a></li>
                    <li><a href="<?= site_url('terms') ?>" class="text-gray-600 hover:text-indigo-600">Điều khoản sử dụng</a></li>
                    <li><a href="<?= site_url('privacy') ?>" class="text-gray-600 hover:text-indigo-600">Chính sách bảo mật</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Liên hệ</h3>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-center text-gray-600"><i data-lucide="mail" class="w-4 h-4 mr-2"></i> contact@uyenai.com</li>
                    <li class="flex items-center text-gray-600"><i data-lucide="phone" class="w-4 h-4 mr-2"></i> +84 123 456 789</li>
                    <li class="flex items-center text-gray-600"><i data-lucide="map-pin" class="w-4 h-4 mr-2"></i> Hà Nội, Việt Nam</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-200 mt-8 pt-6 text-sm text-center text-gray-600">
            &copy; <?= date('Y') ?> UyenAI. All rights reserved.
        </div>
    </div>
</footer> 