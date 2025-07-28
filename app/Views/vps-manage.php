<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div>
    <!-- Breadcrumb -->
    <nav class="mb-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 text-sm font-medium text-gray-500">
            <li><a href="<?= site_url('services/vps') ?>" class="hover:text-indigo-600">Quản lý dịch vụ</a></li>
            <li>
                <div class="flex items-center">
                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                    <span class="ml-1 md:ml-2 text-gray-800">vps-main-server</span>
                </div>
            </li>
        </ol>
    </nav>
    
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Quản Lý VPS: vps-main-server</h1>
        <p class="text-gray-600 mt-1">Giám sát và quản lý máy chủ VPS của bạn</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column: Controls & Info -->
        <div class="lg:col-span-1 space-y-6">
            <!-- Status Card -->
            <div class="bg-white rounded-xl border shadow-sm p-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-3 h-3 rounded-full bg-green-500 mr-2"></div>
                        <span class="font-medium">Đang hoạt động</span>
                    </div>
                    <span class="text-xs text-gray-500">Cập nhật: 5 phút trước</span>
                </div>
                <div class="mt-4">
                    <div class="flex items-center justify-between mb-1 text-sm">
                        <span>Uptime:</span>
                        <span>23 ngày, 5 giờ, 12 phút</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-1.5">
                        <div class="bg-green-500 h-1.5 rounded-full" style="width: 99.3%"></div>
                    </div>
                    <div class="mt-1 text-xs text-gray-500 text-right">Uptime 99.3%</div>
                </div>
            </div>
            
            <!-- Power Controls -->
            <div class="bg-white rounded-xl border shadow-sm p-4">
                <h3 class="text-lg font-bold mb-4">Điều khiển</h3>
                <div class="flex justify-around">
                    <button class="flex flex-col items-center gap-1 text-green-600 hover:text-green-800">
                        <i data-lucide="play-circle" class="w-8 h-8"></i><span class="text-xs font-medium">Start</span>
                    </button>
                    <button class="flex flex-col items-center gap-1 text-red-600 hover:text-red-800">
                        <i data-lucide="stop-circle" class="w-8 h-8"></i><span class="text-xs font-medium">Stop</span>
                    </button>
                    <button class="flex flex-col items-center gap-1 text-orange-600 hover:text-orange-800">
                        <i data-lucide="refresh-cw" class="w-8 h-8"></i><span class="text-xs font-medium">Reboot</span>
                    </button>
                </div>
            </div>
            
            <!-- Service Details -->
            <div class="bg-white rounded-xl border shadow-sm">
                <h3 class="text-lg font-bold p-4 border-b">Chi Tiết VPS</h3>
                <div class="p-4 space-y-3 text-sm">
                    <div class="flex justify-between"><span>Nhãn:</span><span class="font-medium">vps-main-server</span></div>
                    <div class="flex justify-between"><span>Trạng thái:</span><span class="font-medium text-green-600">Đang hoạt động</span></div>
                    <div class="flex justify-between"><span>Địa chỉ IP:</span><span class="font-medium">103.22.11.46</span></div>
                    <div class="flex justify-between"><span>Hệ điều hành:</span><span class="font-medium">Ubuntu 22.04</span></div>
                    <div class="flex justify-between"><span>CPU:</span><span class="font-medium">2 vCPU</span></div>
                    <div class="flex justify-between"><span>RAM:</span><span class="font-medium">4 GB</span></div>
                    <div class="flex justify-between"><span>Dung lượng:</span><span class="font-medium">50 GB SSD</span></div>
                    <div class="flex justify-between"><span>Băng thông:</span><span class="font-medium">Không giới hạn</span></div>
                    <div class="flex justify-between"><span>Ngày hết hạn:</span><span class="font-medium text-orange-600">25/07/2025</span></div>
                </div>
                <div class="p-4 border-t">
                    <button class="w-full bg-orange-500 text-white font-bold py-2 rounded-lg hover:bg-orange-600">Gia Hạn Dịch Vụ</button>
                </div>
            </div>
        </div>

        <!-- Right Column: Graphs & Actions -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Usage Graphs -->
            <div class="bg-white rounded-xl shadow-sm border p-6">
                <h3 class="text-lg font-bold mb-4">Biểu đồ tài nguyên (24h)</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="h-64">
                        <canvas id="cpuChart"></canvas>
                    </div>
                    <div class="h-64">
                        <canvas id="ramChart"></canvas>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div class="h-64">
                        <canvas id="diskChart"></canvas>
                    </div>
                    <div class="h-64">
                        <canvas id="networkChart"></canvas>
                    </div>
                </div>
            </div>
            
            <!-- Actions -->
            <div class="bg-white rounded-xl shadow-sm border p-6">
                <h3 class="text-lg font-bold mb-4">Thao tác quản lý</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <a href="#" class="flex flex-col items-center gap-2 p-3 rounded-lg hover:bg-gray-100 border">
                        <i data-lucide="terminal" class="w-6 h-6 text-gray-600"></i><span class="text-xs font-medium text-center">Console</span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-2 p-3 rounded-lg hover:bg-gray-100 border">
                        <i data-lucide="shield" class="w-6 h-6 text-gray-600"></i><span class="text-xs font-medium text-center">Firewall</span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-2 p-3 rounded-lg hover:bg-gray-100 border">
                        <i data-lucide="hard-drive-upload" class="w-6 h-6 text-gray-600"></i><span class="text-xs font-medium text-center">Backups</span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-2 p-3 rounded-lg hover:bg-gray-100 border">
                        <i data-lucide="replace" class="w-6 h-6 text-gray-600"></i><span class="text-xs font-medium text-center">Cài lại OS</span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-2 p-3 rounded-lg hover:bg-gray-100 border">
                        <i data-lucide="settings" class="w-6 h-6 text-gray-600"></i><span class="text-xs font-medium text-center">Cấu hình</span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-2 p-3 rounded-lg hover:bg-gray-100 border">
                        <i data-lucide="activity" class="w-6 h-6 text-gray-600"></i><span class="text-xs font-medium text-center">Giám sát</span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-2 p-3 rounded-lg hover:bg-gray-100 border">
                        <i data-lucide="file-text" class="w-6 h-6 text-gray-600"></i><span class="text-xs font-medium text-center">Logs</span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-2 p-3 rounded-lg hover:bg-gray-100 border">
                        <i data-lucide="help-circle" class="w-6 h-6 text-gray-600"></i><span class="text-xs font-medium text-center">Hỗ trợ</span>
                    </a>
                </div>
            </div>
            
            <!-- Recent Activities -->
            <div class="bg-white rounded-xl shadow-sm border p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold">Hoạt động gần đây</h3>
                    <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800">Xem tất cả</a>
                </div>
                <div class="space-y-3">
                    <div class="flex items-start gap-3">
                        <div class="mt-0.5 w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                            <i data-lucide="play" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium">VPS được khởi động</p>
                            <p class="text-xs text-gray-500">25/06/2023 10:12:34</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="mt-0.5 w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                            <i data-lucide="refresh-cw" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium">Khởi động lại VPS</p>
                            <p class="text-xs text-gray-500">20/06/2023 08:23:45</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="mt-0.5 w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center text-purple-600">
                            <i data-lucide="hard-drive-upload" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium">Backup tự động thành công</p>
                            <p class="text-xs text-gray-500">19/06/2023 02:00:00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Chart.js configuration
        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    ticks: { callback: value => value + '%' }
                },
                x: {
                    display: false
                }
            },
            elements: {
                point: { radius: 0 },
                line: { tension: 0.3 }
            }
        };

        // CPU Chart
        const cpuCtx = document.getElementById('cpuChart').getContext('2d');
        new Chart(cpuCtx, {
            type: 'line',
            data: {
                labels: Array(24).fill(''),
                datasets: [{
                    label: 'CPU Usage',
                    data: Array.from({length: 24}, () => Math.floor(Math.random() * 40) + 5),
                    borderColor: 'rgb(79, 70, 229)',
                    backgroundColor: 'rgba(79, 70, 229, 0.1)',
                    fill: true,
                }]
            },
            options: { ...chartOptions, plugins: { title: { display: true, text: 'CPU Usage (%)' }, legend: { display: false } } }
        });

        // RAM Chart
        const ramCtx = document.getElementById('ramChart').getContext('2d');
        new Chart(ramCtx, {
            type: 'line',
            data: {
                labels: Array(24).fill(''),
                datasets: [{
                    label: 'RAM Usage',
                    data: Array.from({length: 24}, () => Math.floor(Math.random() * 30) + 40),
                    borderColor: 'rgb(34, 197, 94)',
                    backgroundColor: 'rgba(34, 197, 94, 0.1)',
                    fill: true,
                }]
            },
            options: { ...chartOptions, plugins: { title: { display: true, text: 'RAM Usage (%)' }, legend: { display: false } } }
        });
        
        // Disk Chart
        const diskCtx = document.getElementById('diskChart').getContext('2d');
        new Chart(diskCtx, {
            type: 'line',
            data: {
                labels: Array(24).fill(''),
                datasets: [{
                    label: 'Disk Usage',
                    data: Array.from({length: 24}, () => Math.floor(Math.random() * 5) + 60),
                    borderColor: 'rgb(245, 158, 11)',
                    backgroundColor: 'rgba(245, 158, 11, 0.1)',
                    fill: true,
                }]
            },
            options: { ...chartOptions, plugins: { title: { display: true, text: 'Disk Usage (%)' }, legend: { display: false } } }
        });
        
        // Network Chart
        const networkCtx = document.getElementById('networkChart').getContext('2d');
        new Chart(networkCtx, {
            type: 'line',
            data: {
                labels: Array(24).fill(''),
                datasets: [{
                    label: 'Network In',
                    data: Array.from({length: 24}, () => Math.floor(Math.random() * 50) + 10),
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    fill: true,
                },
                {
                    label: 'Network Out',
                    data: Array.from({length: 24}, () => Math.floor(Math.random() * 30) + 5),
                    borderColor: 'rgb(236, 72, 153)',
                    backgroundColor: 'rgba(236, 72, 153, 0.1)',
                    fill: true,
                }]
            },
            options: { 
                ...chartOptions, 
                plugins: { 
                    title: { display: true, text: 'Network Traffic (Mbps)' }, 
                    legend: { display: true, position: 'top' } 
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { callback: value => value + ' Mbps' }
                    },
                    x: {
                        display: false
                    }
                }
            }
        });
    });
</script>
<?= $this->endSection() ?> 