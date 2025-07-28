/**
 * File Manager Integration
 * Handles file selection from popup file manager
 */
class FileManagerIntegration {
    constructor() {
        this.currentTarget = null;
        this.bindEvents();
    }

    bindEvents() {
        // Handle clicks on file manager triggers
        document.addEventListener('click', (e) => {
            if (e.target.matches('[data-filemanager-trigger]')) {
                e.preventDefault();
                this.openFileManager(e.target);
            }
        });
    }

    openFileManager(trigger) {
        this.currentTarget = trigger;
        
        // Open file manager in popup
        const popup = window.open(
            '/admin/filemanager',
            'filemanager',
            'width=1200,height=800,scrollbars=yes,resizable=yes'
        );

        // Focus popup
        if (popup) {
            popup.focus();
        }
    }

    // This function will be called from the popup
    handleFileSelection(file) {
        if (!this.currentTarget) return;

        const targetId = this.currentTarget.dataset.filemanagerTarget;
        const previewId = this.currentTarget.dataset.filemanagerPreview;

        // Update hidden input with file path
        if (targetId) {
            const targetInput = document.getElementById(targetId);
            if (targetInput) {
                targetInput.value = file.webPath;
                
                // Trigger change event
                targetInput.dispatchEvent(new Event('change'));
            }
        }

        // Update preview image
        if (previewId && file.isImage) {
            const previewImg = document.getElementById(previewId);
            if (previewImg) {
                previewImg.src = file.webPath;
                previewImg.style.display = 'block';
                
                // Show remove button if exists
                const removeBtn = document.querySelector(`[data-remove-target="${previewId}"]`);
                if (removeBtn) {
                    removeBtn.style.display = 'inline-block';
                }
            }
        }

        // Update trigger button text/appearance
        this.updateTriggerAppearance(file);

        this.currentTarget = null;
    }

    updateTriggerAppearance(file) {
        if (!this.currentTarget) return;

        // Update button text
        const originalText = this.currentTarget.dataset.originalText || this.currentTarget.textContent;
        this.currentTarget.dataset.originalText = originalText;
        
        if (file.isImage) {
            this.currentTarget.innerHTML = `<i class="fas fa-image mr-2"></i>Đã chọn: ${file.name}`;
            this.currentTarget.classList.remove('bg-gray-500', 'hover:bg-gray-600');
            this.currentTarget.classList.add('bg-green-500', 'hover:bg-green-600');
        }
    }

    // Reset file selection
    removeFile(previewId, inputId, triggerId) {
        // Clear input
        const input = document.getElementById(inputId);
        if (input) {
            input.value = '';
        }

        // Hide preview
        const preview = document.getElementById(previewId);
        if (preview) {
            preview.style.display = 'none';
            preview.src = '';
        }

        // Reset trigger button
        const trigger = document.getElementById(triggerId);
        if (trigger) {
            const originalText = trigger.dataset.originalText || 'Chọn hình ảnh';
            trigger.innerHTML = `<i class="fas fa-image mr-2"></i>${originalText}`;
            trigger.classList.remove('bg-green-500', 'hover:bg-green-600');
            trigger.classList.add('bg-gray-500', 'hover:bg-gray-600');
        }

        // Hide remove button
        const removeBtn = document.querySelector(`[data-remove-target="${previewId}"]`);
        if (removeBtn) {
            removeBtn.style.display = 'none';
        }
    }
}

// Global function for popup to call
window.handleFileSelection = function(file) {
    if (window.fileManagerIntegration) {
        window.fileManagerIntegration.handleFileSelection(file);
    }
};

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    window.fileManagerIntegration = new FileManagerIntegration();
}); 