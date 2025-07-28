<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Nạp Tiền & Lịch Sử Giao Dịch</h1>
        <p class="text-gray-600 mt-1">Quản lý tài chính, nạp tiền và theo dõi giao dịch trong tài khoản của bạn.</p>
    </div>

    <div class="flex items-center bg-white rounded-xl border shadow-sm p-4 mb-6">
        <div class="flex items-center gap-3 flex-grow">
            <div class="bg-indigo-100 p-3 rounded-full">
                <i data-lucide="wallet" class="w-6 h-6 text-indigo-600"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Số dư khả dụng</p>
                <p class="text-2xl font-bold text-gray-900">1.250.000 <span class="text-gray-500 text-sm font-normal">VNĐ</span></p>
            </div>
        </div>
        <div>
            <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-indigo-700">
                Rút tiền
            </button>
        </div>
    </div>

    <!-- Deposit Section -->
    <div class="bg-white rounded-xl shadow-sm border p-6 mb-8">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Nạp tiền vào tài khoản</h2>
        
        <!-- Deposit Methods -->
        <div class="mb-6">
            <div class="flex border-b border-gray-200 mb-4">
                <button id="tab-bank" class="px-4 py-2 border-b-2 border-indigo-500 text-indigo-600 font-semibold">Chuyển khoản Ngân hàng</button>
                <button id="tab-momo" class="px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700">Ví điện tử Momo</button>
                <button id="tab-card" class="px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700">Thẻ tín dụng/ghi nợ</button>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Bank Transfer Section -->
            <div id="content-bank">
                <div class="flex items-center gap-4">
                    <img src="https://placehold.co/180x180/ffffff/000000?text=VietQR" alt="QR Code Ngân hàng" class="rounded-lg border">
                    <div class="space-y-2 text-sm">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Ngân hàng:</span>
                            <span class="font-semibold text-gray-900">MB Bank</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Chủ tài khoản:</span>
                            <span class="font-semibold text-gray-900">CONG TY TECHHUB</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Số tài khoản:</span>
                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-gray-900">0123456789</span>
                                <button class="text-indigo-600 hover:text-indigo-800" id="copy-bank-btn">
                                    <i data-lucide="copy" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Momo Section -->
            <div id="content-momo" class="hidden">
                <div class="flex items-center gap-4">
                    <img src="https://placehold.co/180x180/ffffff/d82d8b?text=Momo+QR" alt="QR Code Momo" class="rounded-lg border">
                    <div class="space-y-2 text-sm">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Ví Momo:</span>
                            <span class="font-semibold text-gray-900">CONG TY TECHHUB</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Số điện thoại:</span>
                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-gray-900">0987654321</span>
                                <button class="text-indigo-600 hover:text-indigo-800" id="copy-momo-btn">
                                    <i data-lucide="copy" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Credit Card Section -->
            <div id="content-card" class="hidden">
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Số thẻ</label>
                        <input type="text" placeholder="1234 5678 9012 3456" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Ngày hết hạn</label>
                            <input type="text" placeholder="MM/YY" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">CVV</label>
                            <input type="text" placeholder="123" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Chủ thẻ</label>
                        <input type="text" placeholder="NGUYEN VAN A" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Số tiền nạp</label>
                        <div class="relative">
                            <input type="text" placeholder="1,000,000" class="w-full p-2 pl-12 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                            <div class="absolute inset-y-0 left-0 flex items-center px-3 pointer-events-none text-gray-600 font-medium">VND</div>
                        </div>
                    </div>
                    <button type="submit" class="w-full bg-indigo-600 text-white p-2 rounded-lg font-medium hover:bg-indigo-700">
                        Thanh toán
                    </button>
                </form>
            </div>

            <!-- Deposit Instructions -->
            <div class="space-y-4">
                <h3 class="font-semibold text-gray-800">Hướng dẫn nạp tiền</h3>
                <ol class="list-decimal list-inside space-y-2 text-sm text-gray-700">
                    <li>Chuyển khoản theo thông tin bên trái.</li>
                    <li>Sử dụng chính xác <span class="font-semibold">nội dung chuyển khoản</span> bên dưới.</li>
                    <li>Số tiền sẽ được cộng vào tài khoản của bạn trong vòng <span class="font-semibold">5 phút</span>.</li>
                    <li>Nếu cần hỗ trợ, vui lòng liên hệ <span class="text-indigo-600 font-semibold">hotro@techhub.vn</span>.</li>
                </ol>

                <!-- Important Note -->
                <div class="mt-6 bg-indigo-50 border-l-4 border-indigo-500 p-4 rounded-r-lg">
                    <h4 class="font-bold text-indigo-800">QUAN TRỌNG: Nội dung chuyển khoản</h4>
                    <p class="text-indigo-700 mt-1">Để được cộng tiền tự động, vui lòng ghi chính xác nội dung sau:</p>
                    <div class="mt-2 bg-white p-3 rounded-lg flex items-center justify-between">
                        <code id="transfer-memo" class="font-mono text-lg text-indigo-900 font-bold">NAPTIEN 12345</code>
                        <button id="copy-btn" class="flex items-center gap-2 text-sm font-medium text-indigo-600 hover:text-indigo-800">
                            <i data-lucide="copy" class="w-4 h-4"></i>
                            <span>Sao chép</span>
                        </button>
                    </div>
                    <p class="text-xs text-indigo-700 mt-2">(Trong đó <b>12345</b> là ID tài khoản của bạn)</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Transaction History -->
    <div class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-800">Lịch sử giao dịch</h2>
            <a href="#" class="text-indigo-600 text-sm font-medium hover:underline flex items-center gap-1">
                <span>Xem tất cả</span>
                <i data-lucide="chevron-right" class="w-4 h-4"></i>
            </a>
        </div>
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-gray-500 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Mã GD</th>
                            <th scope="col" class="px-6 py-3">Thời gian</th>
                            <th scope="col" class="px-6 py-3">Nội dung</th>
                            <th scope="col" class="px-6 py-3">Số tiền</th>
                            <th scope="col" class="px-6 py-3">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">#TXN98765</td>
                            <td class="px-6 py-4">12/07/2025 10:30</td>
                            <td class="px-6 py-4">Nạp tiền vào tài khoản</td>
                            <td class="px-6 py-4 font-semibold text-green-600">+2.000.000đ</td>
                            <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">Thành công</span></td>
                        </tr>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">#TXN98764</td>
                            <td class="px-6 py-4">11/07/2025 15:00</td>
                            <td class="px-6 py-4">Thanh toán dịch vụ SEO Tổng Thể</td>
                            <td class="px-6 py-4 font-semibold text-red-600">-15.000.000đ</td>
                            <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">Thành công</span></td>
                        </tr>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">#TXN98763</td>
                            <td class="px-6 py-4">10/07/2025 09:15</td>
                            <td class="px-6 py-4">Mua tài khoản ChatGPT Plus</td>
                            <td class="px-6 py-4 font-semibold text-red-600">-499.000đ</td>
                            <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">Thành công</span></td>
                        </tr>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">#TXN98762</td>
                            <td class="px-6 py-4">09/07/2025 11:45</td>
                            <td class="px-6 py-4">Nạp tiền vào tài khoản</td>
                            <td class="px-6 py-4 font-semibold text-green-600">+20.000.000đ</td>
                            <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-medium text-yellow-800 bg-yellow-100 rounded-full">Đang xử lý</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Tab switching
    const tabs = [
        { btn: document.getElementById('tab-bank'), content: document.getElementById('content-bank') },
        { btn: document.getElementById('tab-momo'), content: document.getElementById('content-momo') },
        { btn: document.getElementById('tab-card'), content: document.getElementById('content-card') }
    ];

    tabs.forEach(tab => {
        tab.btn.addEventListener('click', () => {
            // Deactivate all tabs
            tabs.forEach(t => {
                t.btn.classList.remove('border-indigo-500', 'text-indigo-600', 'font-semibold');
                t.btn.classList.add('border-transparent', 'text-gray-500');
                t.content.classList.add('hidden');
            });
            // Activate clicked tab
            tab.btn.classList.remove('border-transparent', 'text-gray-500');
            tab.btn.classList.add('border-indigo-500', 'text-indigo-600', 'font-semibold');
            tab.content.classList.remove('hidden');
        });
    });

    // Copy functions
    function setupCopyButton(btnId, textToCopy, successMsg = 'Đã sao chép!') {
        const btn = document.getElementById(btnId);
        if (btn) {
            btn.addEventListener('click', () => {
                navigator.clipboard.writeText(textToCopy).then(() => {
                    const originalIcon = btn.innerHTML;
                    btn.innerHTML = `<i data-lucide="check" class="w-4 h-4 text-green-500"></i>`;
                    lucide.createIcons();
                    setTimeout(() => {
                        btn.innerHTML = originalIcon;
                        lucide.createIcons();
                    }, 2000);
                });
            });
        }
    }

    // Copy to clipboard
    const copyBtn = document.getElementById('copy-btn');
    const memoText = document.getElementById('transfer-memo').textContent;
    copyBtn.addEventListener('click', () => {
        navigator.clipboard.writeText(memoText).then(() => {
            const originalHTML = copyBtn.innerHTML;
            copyBtn.innerHTML = `
                <i data-lucide="check" class="w-4 h-4 text-green-500"></i>
                <span>Đã chép!</span>
            `;
            lucide.createIcons();
            
            setTimeout(() => {
                copyBtn.innerHTML = originalHTML;
                lucide.createIcons();
            }, 2000);
        });
    });

    // Setup other copy buttons
    setupCopyButton('copy-bank-btn', '0123456789');
    setupCopyButton('copy-momo-btn', '0987654321');
</script>
<?= $this->endSection() ?> 