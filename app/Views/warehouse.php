<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Kho Sản Phẩm Của Tôi</h1>

    <!-- Tabs -->
    <div class="border-b border-gray-200 mb-6">
        <nav class="flex flex-wrap -mb-px space-x-6" aria-label="Tabs">
            <button id="tab-courses" class="py-3 px-1 border-b-2 text-sm font-medium tab-active">Khoá học</button>
            <button id="tab-audiobooks" class="py-3 px-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">Sách nói</button>
            <button id="tab-documents" class="py-3 px-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">Tài liệu</button>
            <button id="tab-accounts" class="py-3 px-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">Tài khoản</button>
        </nav>
    </div>

    <!-- Tab Content -->
    <div id="content-courses">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Course Card 1 -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm flex flex-col overflow-hidden hover:shadow-md transition-all">
                <img src="https://placehold.co/600x400/312e81/ffffff?text=AI+Marketing" class="h-40 w-full object-cover" alt="Course thumbnail">
                <div class="p-4 flex flex-col flex-grow">
                    <h3 class="font-bold text-gray-900 mb-2">Ứng dụng AI vào Marketing và Sáng tạo nội dung</h3>
                    <div class="mt-2">
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-indigo-600 h-2 rounded-full" style="width: 45%"></div>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Đã học 45%</p>
                    </div>
                    <div class="mt-2">
                        <p class="text-xs text-gray-500">Hạn truy cập: 10/07/2026</p>
                    </div>
                    <a href="/course-detail" class="mt-4 w-full px-4 py-2 font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition-all text-center">
                        Vào học
                    </a>
                </div>
            </div>

            <!-- Course Card 2 -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm flex flex-col overflow-hidden hover:shadow-md transition-all">
                <img src="https://placehold.co/600x400/047857/ffffff?text=SEO+Mastery" class="h-40 w-full object-cover" alt="Course thumbnail">
                <div class="p-4 flex flex-col flex-grow">
                    <h3 class="font-bold text-gray-900 mb-2">SEO Mastery 2025: Từ cơ bản đến chuyên sâu</h3>
                    <div class="mt-2">
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-indigo-600 h-2 rounded-full" style="width: 15%"></div>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Đã học 15%</p>
                    </div>
                    <div class="mt-2">
                        <p class="text-xs text-gray-500">Hạn truy cập: 05/12/2026</p>
                    </div>
                    <a href="/course-detail" class="mt-4 w-full px-4 py-2 font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition-all text-center">
                        Vào học
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="content-audiobooks" class="hidden">
        <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-6">
            <!-- Audiobook Card 1 -->
            <div class="bg-white rounded-xl shadow-sm flex flex-col overflow-hidden group hover:shadow-md transition-all">
                <div class="relative">
                    <img src="https://placehold.co/400x600/1e3a8a/ffffff?text=Đắc+Nhân+Tâm" class="w-full h-auto object-cover aspect-[2/3]" alt="Book cover">
                    <div class="absolute inset-0 bg-black/20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <button class="w-14 h-14 bg-white/80 rounded-full flex items-center justify-center text-indigo-600 hover:bg-white">
                            <i data-lucide="play" class="w-8 h-8 fill-current"></i>
                        </button>
                    </div>
                </div>
                <div class="p-3">
                    <h3 class="font-semibold text-gray-800 truncate">Đắc Nhân Tâm</h3>
                    <p class="text-sm text-gray-500 truncate">Dale Carnegie</p>
                </div>
            </div>
            
            <!-- Audiobook Card 2 -->
            <div class="bg-white rounded-xl shadow-sm flex flex-col overflow-hidden group hover:shadow-md transition-all">
                <div class="relative">
                    <img src="https://placehold.co/400x600/0e7490/ffffff?text=Người+Giàu+Có+Nhất+Thành+Babylon" class="w-full h-auto object-cover aspect-[2/3]" alt="Book cover">
                    <div class="absolute inset-0 bg-black/20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <button class="w-14 h-14 bg-white/80 rounded-full flex items-center justify-center text-indigo-600 hover:bg-white">
                            <i data-lucide="play" class="w-8 h-8 fill-current"></i>
                        </button>
                    </div>
                </div>
                <div class="p-3">
                    <h3 class="font-semibold text-gray-800 truncate">Người Giàu Có Nhất Thành Babylon</h3>
                    <p class="text-sm text-gray-500 truncate">George S. Clason</p>
                </div>
            </div>
        </div>
    </div>
    
    <div id="content-documents" class="hidden">
        <div class="space-y-4">
            <!-- Document Item 1 -->
            <div class="bg-white border border-gray-200 rounded-xl p-4 flex flex-col sm:flex-row items-start sm:items-center gap-4">
                <div class="flex-shrink-0 w-14 h-14 bg-red-100 text-red-600 flex items-center justify-center rounded-lg">
                    <i data-lucide="file-type-pdf" class="w-8 h-8"></i>
                </div>
                <div class="flex-grow">
                    <h4 class="font-bold text-gray-800">Bộ 500+ Mẫu Content Marketing Đa Ngành</h4>
                    <p class="text-sm text-gray-600 mt-1">Đã mua ngày: 10/07/2025</p>
                </div>
                <div class="flex-shrink-0 w-full sm:w-auto flex gap-2">
                    <button class="w-full sm:w-auto px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 flex items-center justify-center gap-2">
                        <i data-lucide="download" class="w-4 h-4"></i>
                        <span>Tải xuống</span>
                    </button>
                    <button class="w-full sm:w-auto px-4 py-2 text-sm font-medium bg-gray-100 rounded-lg hover:bg-gray-200 flex items-center justify-center gap-2">
                        <i data-lucide="eye" class="w-4 h-4"></i>
                        <span>Xem</span>
                    </button>
                </div>
            </div>
            
            <!-- Document Item 2 -->
            <div class="bg-white border border-gray-200 rounded-xl p-4 flex flex-col sm:flex-row items-start sm:items-center gap-4">
                <div class="flex-shrink-0 w-14 h-14 bg-blue-100 text-blue-600 flex items-center justify-center rounded-lg">
                    <i data-lucide="file-type-doc" class="w-8 h-8"></i>
                </div>
                <div class="flex-grow">
                    <h4 class="font-bold text-gray-800">Tài liệu đào tạo SEO từ A-Z</h4>
                    <p class="text-sm text-gray-600 mt-1">Đã mua ngày: 25/06/2025</p>
                </div>
                <div class="flex-shrink-0 w-full sm:w-auto flex gap-2">
                    <button class="w-full sm:w-auto px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 flex items-center justify-center gap-2">
                        <i data-lucide="download" class="w-4 h-4"></i>
                        <span>Tải xuống</span>
                    </button>
                    <button class="w-full sm:w-auto px-4 py-2 text-sm font-medium bg-gray-100 rounded-lg hover:bg-gray-200 flex items-center justify-center gap-2">
                        <i data-lucide="eye" class="w-4 h-4"></i>
                        <span>Xem</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div id="content-accounts" class="hidden">
        <?php if (empty($purchasedAccounts)): ?>
            <div class="text-center py-12">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="user-x" class="w-12 h-12 text-gray-400"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900">Bạn chưa sở hữu tài khoản nào</h3>
                <p class="text-gray-500 mt-2">Hãy khám phá và mua các tài khoản AI và mạng xã hội để bắt đầu.</p>
                <a href="<?= site_url('products') ?>" class="mt-4 inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                    Xem các tài khoản
                </a>
            </div>
        <?php else: ?>
            <div class="space-y-4">
                <?php foreach ($purchasedAccounts as $account): ?>
                <div class="bg-white border border-gray-200 rounded-xl p-4">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                        <div class="flex-shrink-0 w-14 h-14">
                            <img src="<?= esc($account['image']) ?>" alt="<?= esc($account['name']) ?>" class="w-full h-full object-cover rounded-lg">
                        </div>
                        <div class="flex-grow">
                            <h4 class="font-bold text-gray-800"><?= esc($account['name']) ?></h4>
                            <div class="flex flex-wrap gap-x-4 gap-y-1 mt-2">
                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium rounded bg-green-100 text-green-800">
                                    Đang hoạt động
                                </span>
                                <p class="text-sm text-gray-600">Ngày mua: <?= date('d/m/Y', strtotime($account['purchase_date'])) ?></p>
                            </div>
                        </div>
                        <div class="flex-shrink-0 w-full sm:w-auto">
                            <button class="view-account-btn w-full sm:w-auto px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 flex items-center justify-center gap-2"
                                    data-order-item-id="<?= esc($account['order_item_id']) ?>"
                                    data-account-name="<?= esc($account['name']) ?>">
                                <i data-lucide="key" class="w-4 h-4"></i>
                                <span>Xem thông tin</span>
                            </button>
                        </div>
                    </div>
                    <?php if(!empty($account['description'])): ?>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <p class="text-sm text-gray-600"><?= esc($account['description']) ?></p>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Account Details Modal -->
<div id="account-modal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-md mx-4">
        <div class="flex justify-between items-center border-b pb-3 mb-4">
            <h3 id="modal-title" class="text-lg font-bold">Thông tin tài khoản</h3>
            <button id="modal-close-btn" class="text-gray-500 hover:text-gray-800">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
        </div>
        <div id="modal-content" class="space-y-3">
            <!-- Details will be loaded here -->
            <p>Đang tải...</p>
        </div>
        <div class="mt-6 text-right">
             <button id="modal-close-btn-footer" class="px-4 py-2 text-sm font-medium bg-gray-200 rounded-lg hover:bg-gray-300">
                Đóng
            </button>
        </div>
    </div>
</div>


<script>
    // Tab switching logic
    const tabs = [
        { btn: document.getElementById('tab-courses'), content: document.getElementById('content-courses') },
        { btn: document.getElementById('tab-audiobooks'), content: document.getElementById('content-audiobooks') },
        { btn: document.getElementById('tab-documents'), content: document.getElementById('content-documents') },
        { btn: document.getElementById('tab-accounts'), content: document.getElementById('content-accounts') }
    ];

    tabs.forEach(tab => {
        tab.btn.addEventListener('click', () => {
            // Deactivate all tabs
            tabs.forEach(t => {
                t.btn.classList.remove('tab-active');
                t.content.classList.add('hidden');
            });
            // Activate clicked tab
            tab.btn.classList.add('tab-active');
            tab.content.classList.remove('hidden');
        });
    });
    
    // Define tab-active class
    document.head.insertAdjacentHTML('beforeend', `
        <style>
            .tab-active {
                border-color: #4f46e5;
                color: #4f46e5;
                font-weight: 600;
            }
        </style>
    `);

    // Account Details Modal Logic
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('account-modal');
        const modalCloseBtns = [document.getElementById('modal-close-btn'), document.getElementById('modal-close-btn-footer')];
        const modalTitle = document.getElementById('modal-title');
        const modalContent = document.getElementById('modal-content');

        document.querySelectorAll('.view-account-btn').forEach(button => {
            button.addEventListener('click', function () {
                const orderItemId = this.dataset.orderItemId;
                const accountName = this.dataset.accountName;

                modalTitle.textContent = `Thông tin: ${accountName}`;
                modalContent.innerHTML = '<p>Đang tải...</p>';
                modal.classList.remove('hidden');

                fetch(`<?= site_url('ajax/get_account_details') ?>?order_item_id=${orderItemId}`, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(result => {
                    if (result.success && result.data) {
                        let contentHtml = '<dl class="divide-y">';
                        for (const [key, value] of Object.entries(result.data)) {
                            contentHtml += `
                                <div class="py-2 sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">${key.charAt(0).toUpperCase() + key.slice(1)}</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">${value}</dd>
                                </div>
                            `;
                        }
                        contentHtml += '</dl>';
                        modalContent.innerHTML = contentHtml;
                    } else {
                        modalContent.innerHTML = `<p class="text-red-500">${result.message || 'Không thể tải thông tin.'}</p>`;
                    }
                })
                .catch(() => {
                    modalContent.innerHTML = '<p class="text-red-500">Đã có lỗi xảy ra. Vui lòng thử lại.</p>';
                });
            });
        });

        modalCloseBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                modal.classList.add('hidden');
            });
        });
        
        modal.addEventListener('click', function(event) {
            if (event.target === modal) {
                 modal.classList.add('hidden');
            }
        });
    });
</script>
<?= $this->endSection() ?> 