/**
 * Custom Rich Text Editor
 * Sử dụng contentEditable và tích hợp File Manager để chèn hình ảnh
 * Không phụ thuộc vào thư viện bên ngoài
 */

window.RichTextEditor = {
    // Lưu trữ các editor instances
    instances: {},
    
    // Cấu hình mặc định
    defaultConfig: {
        height: 400,
        placeholder: 'Nhập nội dung...',
        toolbar: [
            'bold', 'italic', 'underline', '|',
            'h1', 'h2', 'h3', '|',
            'link', 'unlink', '|',
            'ul', 'ol', '|',
            'image', 'insertImageFromFileManager', '|',
            'align-left', 'align-center', 'align-right', '|',
            'undo', 'redo', '|',
            'source'
        ],
        imageUploadUrl: '/admin/filemanager/upload'
    },

    // Khởi tạo editor
    init: function(selector, customConfig = {}) {
        const config = { ...this.defaultConfig, ...customConfig };
        const elements = document.querySelectorAll(selector);
        
        elements.forEach(textarea => {
            this.createEditor(textarea, config);
        });
    },

    // Tạo editor instance
    createEditor: function(textarea, config) {
        const editorId = textarea.id || 'editor_' + Math.random().toString(36).substr(2, 9);
        textarea.id = editorId;

        // Tạo container cho editor
        const container = document.createElement('div');
        container.className = 'custom-rich-editor';
        container.style.border = '1px solid #ddd';
        container.style.borderRadius = '4px';
        container.style.backgroundColor = '#fff';

        // Tạo toolbar
        const toolbar = this.createToolbar(editorId, config);
        container.appendChild(toolbar);

        // Tạo content editable area
        const editor = document.createElement('div');
        editor.className = 'editor-content';
        editor.contentEditable = true;
        editor.style.minHeight = config.height + 'px';
        editor.style.padding = '12px';
        editor.style.outline = 'none';
        editor.style.fontSize = '14px';
        editor.style.lineHeight = '1.6';
        editor.innerHTML = textarea.value || '';
        
        if (config.placeholder) {
            editor.setAttribute('data-placeholder', config.placeholder);
        }

        container.appendChild(editor);

        // Ẩn textarea gốc
        textarea.style.display = 'none';
        textarea.parentNode.insertBefore(container, textarea);

        // Lưu instance
        this.instances[editorId] = {
            container: container,
            toolbar: toolbar,
            editor: editor,
            textarea: textarea,
            config: config
        };

        // Thêm event listeners
        this.addEventListeners(editorId);

        return editorId;
    },

    // Tạo toolbar
    createToolbar: function(editorId, config) {
        const toolbar = document.createElement('div');
        toolbar.className = 'editor-toolbar';
        toolbar.style.padding = '8px';
        toolbar.style.borderBottom = '1px solid #ddd';
        toolbar.style.backgroundColor = '#f8f9fa';
        toolbar.style.display = 'flex';
        toolbar.style.flexWrap = 'wrap';
        toolbar.style.gap = '4px';

        config.toolbar.forEach(item => {
            if (item === '|') {
                const separator = document.createElement('div');
                separator.style.width = '1px';
                separator.style.height = '24px';
                separator.style.backgroundColor = '#ddd';
                separator.style.margin = '0 4px';
                toolbar.appendChild(separator);
            } else {
                const button = this.createButton(item, editorId);
                toolbar.appendChild(button);
            }
        });

        return toolbar;
    },

    // Tạo button cho toolbar
    createButton: function(command, editorId) {
        const button = document.createElement('button');
        button.type = 'button';
        button.className = 'editor-btn';
        button.style.padding = '6px 8px';
        button.style.border = '1px solid #ddd';
        button.style.backgroundColor = '#fff';
        button.style.borderRadius = '3px';
        button.style.cursor = 'pointer';
        button.style.fontSize = '12px';

        const buttonConfig = this.getButtonConfig(command);
        button.innerHTML = buttonConfig.icon;
        button.title = buttonConfig.title;

        button.addEventListener('click', (e) => {
            e.preventDefault();
            this.executeCommand(command, editorId);
        });

        button.addEventListener('mouseenter', () => {
            button.style.backgroundColor = '#f0f0f0';
        });

        button.addEventListener('mouseleave', () => {
            button.style.backgroundColor = '#fff';
        });

        return button;
    },

    // Cấu hình buttons
    getButtonConfig: function(command) {
        const configs = {
            'bold': { icon: '<b>B</b>', title: 'Bold' },
            'italic': { icon: '<i>I</i>', title: 'Italic' },
            'underline': { icon: '<u>U</u>', title: 'Underline' },
            'h1': { icon: 'H1', title: 'Heading 1' },
            'h2': { icon: 'H2', title: 'Heading 2' },
            'h3': { icon: 'H3', title: 'Heading 3' },
            'link': { icon: '🔗', title: 'Insert Link' },
            'unlink': { icon: '⛓️‍💥', title: 'Remove Link' },
            'ul': { icon: '• List', title: 'Bullet List' },
            'ol': { icon: '1. List', title: 'Number List' },
            'image': { icon: '🖼️', title: 'Insert Image' },
            'insertImageFromFileManager': { icon: '📁', title: 'Chọn ảnh từ File Manager' },
            'align-left': { icon: '⬅️', title: 'Align Left' },
            'align-center': { icon: '⬆️', title: 'Align Center' },
            'align-right': { icon: '➡️', title: 'Align Right' },
            'undo': { icon: '↶', title: 'Undo' },
            'redo': { icon: '↷', title: 'Redo' },
            'source': { icon: '</>', title: 'Source Code' }
        };
        
        return configs[command] || { icon: command, title: command };
    },

    // Thực thi commands
    executeCommand: function(command, editorId) {
        const instance = this.instances[editorId];
        if (!instance) return;

        const editor = instance.editor;
        editor.focus();

        switch(command) {
            case 'bold':
                document.execCommand('bold', false, null);
                break;
            case 'italic':
                document.execCommand('italic', false, null);
                break;
            case 'underline':
                document.execCommand('underline', false, null);
                break;
            case 'h1':
                document.execCommand('formatBlock', false, '<h1>');
                break;
            case 'h2':
                document.execCommand('formatBlock', false, '<h2>');
                break;
            case 'h3':
                document.execCommand('formatBlock', false, '<h3>');
                break;
            case 'link':
                this.insertLink(editorId);
                break;
            case 'unlink':
                document.execCommand('unlink', false, null);
                break;
            case 'ul':
                document.execCommand('insertUnorderedList', false, null);
                break;
            case 'ol':
                document.execCommand('insertOrderedList', false, null);
                break;
            case 'image':
                this.insertImage(editorId);
                break;
            case 'insertImageFromFileManager':
                this.openFileManager(editorId);
                break;
            case 'align-left':
                document.execCommand('justifyLeft', false, null);
                break;
            case 'align-center':
                document.execCommand('justifyCenter', false, null);
                break;
            case 'align-right':
                document.execCommand('justifyRight', false, null);
                break;
            case 'undo':
                document.execCommand('undo', false, null);
                break;
            case 'redo':
                document.execCommand('redo', false, null);
                break;
            case 'source':
                this.toggleSource(editorId);
                break;
        }

        this.updateContent(editorId);
    },

    // Chèn link
    insertLink: function(editorId) {
        const url = prompt('Nhập URL:');
        if (url) {
            document.execCommand('createLink', false, url);
        }
    },

    // Chèn ảnh từ URL
    insertImage: function(editorId) {
        const url = prompt('Nhập URL ảnh:');
        if (url) {
            document.execCommand('insertImage', false, url);
        }
    },

    // Toggle source code view
    toggleSource: function(editorId) {
        const instance = this.instances[editorId];
        if (!instance) return;

        const editor = instance.editor;
        const isSourceMode = editor.getAttribute('data-source-mode') === 'true';

        if (isSourceMode) {
            // Chuyển về visual mode
            editor.innerHTML = editor.textContent;
            editor.contentEditable = true;
            editor.style.fontFamily = 'inherit';
            editor.setAttribute('data-source-mode', 'false');
        } else {
            // Chuyển sang source mode
            editor.textContent = editor.innerHTML;
            editor.contentEditable = true;
            editor.style.fontFamily = 'monospace';
            editor.setAttribute('data-source-mode', 'true');
        }
    },

    // Thêm event listeners
    addEventListeners: function(editorId) {
        const instance = this.instances[editorId];
        if (!instance) return;

        const editor = instance.editor;
        const textarea = instance.textarea;

        // Cập nhật textarea khi content thay đổi
        editor.addEventListener('input', () => {
            this.updateContent(editorId);
        });

        // Xử lý placeholder
        this.updatePlaceholder(editorId);
        editor.addEventListener('focus', () => {
            this.updatePlaceholder(editorId);
        });
        editor.addEventListener('blur', () => {
            this.updatePlaceholder(editorId);
        });

        // Xử lý paste
        editor.addEventListener('paste', (e) => {
            e.preventDefault();
            const text = (e.originalEvent || e).clipboardData.getData('text/plain');
            document.execCommand('insertText', false, text);
        });
    },

    // Cập nhật nội dung textarea
    updateContent: function(editorId) {
        const instance = this.instances[editorId];
        if (!instance) return;

        const editor = instance.editor;
        const textarea = instance.textarea;
        textarea.value = editor.innerHTML;
        
        // Dispatch change event
        const event = new Event('change', { bubbles: true });
        textarea.dispatchEvent(event);
    },

    // Cập nhật placeholder
    updatePlaceholder: function(editorId) {
        const instance = this.instances[editorId];
        if (!instance) return;

        const editor = instance.editor;
        const hasContent = editor.textContent.trim().length > 0;
        
        if (hasContent) {
            editor.removeAttribute('data-show-placeholder');
        } else {
            editor.setAttribute('data-show-placeholder', 'true');
        }
    },

    // Mở File Manager
    openFileManager: function(editorId) {
        const modal = document.createElement('div');
        modal.className = 'file-manager-modal';
        modal.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        `;

        const content = document.createElement('div');
        content.style.cssText = `
            background: white;
            width: 80%;
            height: 80%;
            border-radius: 8px;
            position: relative;
        `;

        const iframe = document.createElement('iframe');
        iframe.src = '/admin/filemanager?mode=select';
        iframe.style.cssText = `
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 8px;
        `;

        const closeBtn = document.createElement('button');
        closeBtn.innerHTML = '✕';
        closeBtn.style.cssText = `
            position: absolute;
            top: 10px;
            right: 10px;
            background: #dc3545;
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            cursor: pointer;
            z-index: 1;
        `;

        closeBtn.onclick = () => {
            document.body.removeChild(modal);
        };

        content.appendChild(iframe);
        content.appendChild(closeBtn);
        modal.appendChild(content);
        document.body.appendChild(modal);

        // Lắng nghe message từ file manager
        window.addEventListener('message', (event) => {
            if (event.data.action === 'selectFile') {
                const imagePath = event.data.file;
                const instance = this.instances[editorId];
                if (instance) {
                    const editor = instance.editor;
                    editor.focus();
                    document.execCommand('insertImage', false, imagePath);
                    this.updateContent(editorId);
                }
                document.body.removeChild(modal);
            }
        }, { once: true });
    },

    // Lấy nội dung editor
    getContent: function(editorId) {
        const instance = this.instances[editorId];
        return instance ? instance.editor.innerHTML : '';
    },

    // Đặt nội dung editor
    setContent: function(editorId, content) {
        const instance = this.instances[editorId];
        if (instance) {
            instance.editor.innerHTML = content;
            this.updateContent(editorId);
            this.updatePlaceholder(editorId);
        }
    },

    // Hủy editor
    destroy: function(editorId) {
        const instance = this.instances[editorId];
        if (instance) {
            const textarea = instance.textarea;
            textarea.style.display = 'block';
            instance.container.parentNode.removeChild(instance.container);
            delete this.instances[editorId];
        }
    }
};

// Auto-initialize khi DOM ready
document.addEventListener('DOMContentLoaded', function() {
    // Tự động khởi tạo cho các textarea có class 'rich-text-editor'
    const textareas = document.querySelectorAll('textarea.rich-text-editor');
    if (textareas.length > 0) {
        window.RichTextEditor.init('textarea.rich-text-editor');
    }
});
