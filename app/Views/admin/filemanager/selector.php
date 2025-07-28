<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Manager - Chọn tệp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .file-item:hover {
            background-color: #f3f4f6;
        }
        .file-item.selected {
            background-color: #dbeafe;
            border-color: #3b82f6;
        }
        .file-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 10px;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto p-4">
        <!-- Navigation -->
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center space-x-2">
                <button id="backBtn" class="bg-gray-200 hover:bg-gray-300 px-3 py-1 rounded text-sm">
                    <i class="fas fa-arrow-left"></i> Trở về
                </button>
                <span class="text-sm text-gray-600">
                    <i class="fas fa-folder"></i> 
                    <span id="currentPath">/</span>
                </span>
            </div>
            <div class="flex items-center space-x-2">
                <button id="viewGridBtn" class="bg-blue-500 text-white px-3 py-1 rounded text-sm">
                    <i class="fas fa-th"></i>
                </button>
                <button id="viewListBtn" class="bg-gray-200 hover:bg-gray-300 px-3 py-1 rounded text-sm">
                    <i class="fas fa-list"></i>
                </button>
            </div>
        </div>

        <!-- Upload Area -->
        <div class="mb-4">
            <input type="file" id="fileInput" multiple accept="image/*" class="hidden">
            <button id="uploadBtn" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                <i class="fas fa-upload mr-2"></i>Tải lên hình ảnh
            </button>
        </div>

        <!-- Files Display -->
        <div id="filesContainer" class="min-h-96">
            <div id="loading" class="text-center py-8">
                <i class="fas fa-spinner fa-spin text-2xl text-gray-400"></i>
                <p class="text-gray-600 mt-2">Đang tải...</p>
            </div>
        </div>

        <!-- Selected File Info -->
        <div id="selectedInfo" class="mt-4 p-3 bg-blue-50 border border-blue-200 rounded hidden">
            <div class="flex items-center justify-between">
                <div>
                    <strong>Đã chọn:</strong> <span id="selectedFileName"></span>
                </div>
                <button id="selectBtn" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Chọn tệp này
                </button>
            </div>
        </div>
    </div>

    <script>
        let currentPath = '';
        let selectedFile = null;
        let viewMode = 'grid'; // 'grid' or 'list'

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            loadFiles('');
            setupEventListeners();
        });

        function setupEventListeners() {
            document.getElementById('backBtn').addEventListener('click', goBack);
            document.getElementById('uploadBtn').addEventListener('click', () => {
                document.getElementById('fileInput').click();
            });
            document.getElementById('fileInput').addEventListener('change', handleUpload);
            document.getElementById('viewGridBtn').addEventListener('click', () => setViewMode('grid'));
            document.getElementById('viewListBtn').addEventListener('click', () => setViewMode('list'));
            document.getElementById('selectBtn').addEventListener('click', selectFile);
        }

        function loadFiles(path) {
            document.getElementById('loading').style.display = 'block';
            document.getElementById('filesContainer').innerHTML = '<div id="loading" class="text-center py-8"><i class="fas fa-spinner fa-spin text-2xl text-gray-400"></i><p class="text-gray-600 mt-2">Đang tải...</p></div>';

            fetch(`/admin/filemanager/browse?path=${encodeURIComponent(path)}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert('Lỗi: ' + data.error);
                        return;
                    }
                    currentPath = data.path;
                    displayFiles(data.items);
                    updateCurrentPathDisplay();
                })
                .catch(error => {
                    console.error('Error loading files:', error);
                    alert('Lỗi khi tải danh sách tệp');
                });
        }

        function displayFiles(items) {
            const container = document.getElementById('filesContainer');
            const isGrid = viewMode === 'grid';
            
            if (items.length === 0) {
                container.innerHTML = '<div class="text-center py-8 text-gray-500">Thư mục trống</div>';
                return;
            }

            const containerClass = isGrid ? 'file-grid' : 'space-y-2';
            let html = `<div class="${containerClass}">`;

            items.forEach(item => {
                if (isGrid) {
                    html += createGridItem(item);
                } else {
                    html += createListItem(item);
                }
            });

            html += '</div>';
            container.innerHTML = html;

            // Add click event listeners
            container.querySelectorAll('.file-item').forEach(element => {
                element.addEventListener('click', () => {
                    const itemPath = element.dataset.path;
                    const itemType = element.dataset.type;
                    
                    if (itemType === 'folder') {
                        loadFiles(itemPath + '/');
                    } else if (itemType === 'file') {
                        selectItem(element, itemPath);
                    }
                });
            });
        }

        function createGridItem(item) {
            const isImage = item.isImage;
            const iconClass = item.type === 'folder' ? 'fas fa-folder text-yellow-500' :
                             isImage ? 'fas fa-image text-green-500' : 'fas fa-file text-gray-500';
            
            const preview = isImage ? 
                `<img src="${item.webPath}" alt="${item.name}" class="w-full h-16 object-cover rounded mb-2" loading="lazy">` :
                `<div class="w-full h-16 flex items-center justify-center bg-gray-100 rounded mb-2"><i class="${iconClass} text-2xl"></i></div>`;

            return `
                <div class="file-item border rounded p-2 cursor-pointer text-center" 
                     data-path="${item.path}" 
                     data-type="${item.type}"
                     data-web-path="${item.webPath}">
                    ${preview}
                    <div class="text-xs truncate" title="${item.name}">${item.name}</div>
                </div>
            `;
        }

        function createListItem(item) {
            const isImage = item.isImage;
            const iconClass = item.type === 'folder' ? 'fas fa-folder text-yellow-500' :
                             isImage ? 'fas fa-image text-green-500' : 'fas fa-file text-gray-500';
            
            const sizeDisplay = item.type === 'file' ? formatFileSize(item.size) : '-';

            return `
                <div class="file-item flex items-center p-3 border rounded cursor-pointer" 
                     data-path="${item.path}" 
                     data-type="${item.type}"
                     data-web-path="${item.webPath}">
                    <i class="${iconClass} mr-3"></i>
                    <div class="flex-1">
                        <div class="font-medium">${item.name}</div>
                        <div class="text-xs text-gray-500">${item.modified} • ${sizeDisplay}</div>
                    </div>
                    ${isImage ? `<img src="${item.webPath}" alt="${item.name}" class="w-12 h-12 object-cover rounded ml-2" loading="lazy">` : ''}
                </div>
            `;
        }

        function selectItem(element, path) {
            // Remove previous selection
            document.querySelectorAll('.file-item').forEach(el => el.classList.remove('selected'));
            
            // Add selection to current item
            element.classList.add('selected');
            
            // Update selected file info
            selectedFile = element.dataset.webPath;
            document.getElementById('selectedFileName').textContent = element.querySelector('.font-medium')?.textContent || path.split('/').pop();
            document.getElementById('selectedInfo').classList.remove('hidden');
            
            // Make selectedFile available to parent window
            window.selectedFile = selectedFile;
        }

        function selectFile() {
            if (selectedFile && window.parent) {
                // Send selected file to parent window
                window.parent.postMessage({
                    type: 'fileSelected',
                    file: selectedFile
                }, '*');
            }
        }

        function goBack() {
            if (currentPath === '') return;
            
            const pathParts = currentPath.split('/').filter(p => p);
            pathParts.pop();
            const newPath = pathParts.join('/');
            loadFiles(newPath ? newPath + '/' : '');
        }

        function updateCurrentPathDisplay() {
            document.getElementById('currentPath').textContent = '/' + currentPath;
        }

        function setViewMode(mode) {
            viewMode = mode;
            document.getElementById('viewGridBtn').className = mode === 'grid' ? 
                'bg-blue-500 text-white px-3 py-1 rounded text-sm' : 
                'bg-gray-200 hover:bg-gray-300 px-3 py-1 rounded text-sm';
            document.getElementById('viewListBtn').className = mode === 'list' ? 
                'bg-blue-500 text-white px-3 py-1 rounded text-sm' : 
                'bg-gray-200 hover:bg-gray-300 px-3 py-1 rounded text-sm';
            
            // Reload current view
            const container = document.getElementById('filesContainer');
            if (container.children.length > 0) {
                loadFiles(currentPath);
            }
        }

        function handleUpload(event) {
            const files = event.target.files;
            if (files.length === 0) return;

            const formData = new FormData();
            formData.append('path', currentPath);
            
            for (let i = 0; i < files.length; i++) {
                formData.append('files[]', files[i]);
            }

            fetch('/admin/filemanager/upload', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert('Lỗi: ' + data.error);
                } else {
                    alert('Tải lên thành công!');
                    loadFiles(currentPath);
                }
            })
            .catch(error => {
                console.error('Error uploading files:', error);
                alert('Lỗi khi tải lên tệp');
            });

            // Reset input
            event.target.value = '';
        }

        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }
    </script>
</body>
</html>
