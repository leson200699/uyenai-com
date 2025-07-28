/**
 * Rich Text Editor với File Manager Integration
 * Sử dụng TinyMCE và tích hợp File Manager để chèn hình ảnh
 */

window.RichTextEditor = {
    // Cấu hình mặc định cho TinyMCE
    defaultConfig: {
        height: 500,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | blocks | ' +
                 'bold italic forecolor | alignleft aligncenter ' +
                 'alignright alignjustify | bullist numlist outdent indent | ' +
                 'removeformat | help | insertImageFromFileManager',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
        menubar: false,
        branding: false,
        promotion: false,
        file_picker_types: 'image',
        automatic_uploads: false
    },

    // Khởi tạo editor cho một hoặc nhiều selector
    init: function(selectors, customConfig = {}) {
        const config = { ...this.defaultConfig, ...customConfig };
        
        config.setup = function(editor) {
            // Add custom button for file manager
            editor.ui.registry.addButton('insertImageFromFileManager', {
                text: 'Chèn ảnh',
                icon: 'image',
                onAction: function() {
                    window.RichTextEditor.openFileManager(editor);
                }
            });
            
            // Call custom setup function if provided
            if (customConfig.setup) {
                customConfig.setup(editor);
            }
        };

        if (Array.isArray(selectors)) {
            selectors.forEach(selector => {
                config.selector = selector;
                tinymce.init(config);
            });
        } else {
            config.selector = selectors;
            tinymce.init(config);
        }
    },

    // Mở File Manager để chọn hình ảnh
    openFileManager: function(editor) {
        const modal = document.createElement('div');
        modal.id = 'fileManagerModal';
        modal.className = 'fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50';
        modal.innerHTML = `
            <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
                <div class="mt-3">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Chọn hình ảnh</h3>
                        <button type="button" onclick="window.RichTextEditor.closeFileManager()" class="text-gray-400 hover:text-gray-600">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <iframe src="/admin/filemanager?mode=select" 
                            width="100%" 
                            height="500" 
                            frameborder="0"
                            id="fileManagerFrame"></iframe>
                </div>
            </div>
        `;
        
        document.body.appendChild(modal);
        
        // Store editor reference
        this.currentEditor = editor;
        
        // Listen for messages from iframe
        this.messageHandler = (event) => {
            if (event.data.type === 'fileSelected') {
                const imagePath = event.data.file;
                if (editor && imagePath) {
                    // Insert image into TinyMCE
                    const imageHtml = `<img src="${imagePath}" alt="Hình ảnh" class="img-responsive" style="max-width: 100%; height: auto;">`;
                    editor.insertContent(imageHtml);
                }
                this.closeFileManager();
            }
        };
        
        window.addEventListener('message', this.messageHandler);
    },

    // Đóng File Manager modal
    closeFileManager: function() {
        const modal = document.getElementById('fileManagerModal');
        if (modal) {
            modal.remove();
        }
        
        // Remove event listener
        if (this.messageHandler) {
            window.removeEventListener('message', this.messageHandler);
            this.messageHandler = null;
        }
    },

    // Thêm nút chèn ảnh bên ngoài editor
    addInsertImageButton: function(buttonSelector, editorSelector) {
        const button = document.querySelector(buttonSelector);
        if (button) {
            button.addEventListener('click', () => {
                const editor = tinymce.get(editorSelector.replace('#', ''));
                if (editor) {
                    this.openFileManager(editor);
                }
            });
        }
    },

    // Destroy editor
    destroy: function(selector) {
        const editor = tinymce.get(selector.replace('#', ''));
        if (editor) {
            editor.destroy();
        }
    }
};

// Auto-initialize cho các trang có class 'rich-text-editor'
document.addEventListener('DOMContentLoaded', function() {
    const richTextElements = document.querySelectorAll('.rich-text-editor');
    if (richTextElements.length > 0) {
        const selectors = Array.from(richTextElements).map(el => '#' + el.id);
        window.RichTextEditor.init(selectors);
        
        // Add insert image buttons if they exist
        richTextElements.forEach(el => {
            const insertBtn = document.querySelector(`[data-editor-target="${el.id}"]`);
            if (insertBtn) {
                window.RichTextEditor.addInsertImageButton(`[data-editor-target="${el.id}"]`, '#' + el.id);
            }
        });
    }
});
