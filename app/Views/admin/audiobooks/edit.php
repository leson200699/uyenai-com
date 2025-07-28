<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>Sửa Sách Nói<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow border">
    <h1 class="text-2xl font-bold mb-6">Sửa Sách Nói</h1>

    <?php if (session()->getFlashdata('message')): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline"><?= session()->getFlashdata('message') ?></span>
        </div>
    <?php endif; ?>

    <form action="/admin/audiobooks/update/<?= $audiobook['id'] ?>" method="post" class="space-y-5">
        <?= csrf_field() ?>
        <input type="hidden" name="audiobook_id" value="<?= $audiobook['id'] ?>">

        <div>
            <label class="block font-medium mb-1">Tiêu đề sách <span class="text-red-500">*</span></label>
            <input type="text" name="title" class="form-input w-full" value="<?= esc($audiobook['title']) ?>" required>
        </div>
        <div>
            <label class="block font-medium mb-1">Tác giả</label>
            <input type="text" name="author" class="form-input w-full" value="<?= esc($audiobook['author']) ?>">
        </div>
        <div>
            <label class="block font-medium mb-1">Mô tả</label>
            <textarea name="description" class="form-input w-full" rows="4"><?= esc($audiobook['description']) ?></textarea>
        </div>
        <div>
            <label class="block font-medium mb-1">URL Ảnh bìa</label>
            <input type="text" name="cover_image" class="form-input w-full" value="<?= esc($audiobook['cover_image']) ?>">
        </div>

        <hr class="my-6">

        <!-- Chapters Management -->
        <div id="chapters-container" class="space-y-4">
            <h2 class="text-xl font-bold">Các chương</h2>
            <?php foreach ($chapters as $index => $chapter): ?>
                <div id="chapter-<?= $index ?>" class="p-4 border rounded-lg bg-gray-50 relative">
                    <input type="hidden" name="chapters[<?= $index ?>][id]" value="<?= $chapter['id'] ?>">
                    <button type="button" class="absolute top-2 right-2 text-red-500 hover:text-red-700 remove-chapter-btn">&times;</button>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Tiêu đề chương</label>
                            <input type="text" name="chapters[<?= $index ?>][title]" class="form-input w-full" value="<?= esc($chapter['title']) ?>" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">URL Audio</label>
                            <input type="text" name="chapters[<?= $index ?>][audio_file]" class="form-input w-full" value="<?= esc($chapter['audio_file']) ?>" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Thứ tự</label>
                            <input type="number" name="chapters[<?= $index ?>][chapter_order]" class="form-input w-full" value="<?= esc($chapter['chapter_order']) ?>">
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <button type="button" id="add-chapter-btn" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Thêm chương</button>

        <hr class="my-6">

        <div>
            <label class="block font-medium mb-1">Trạng thái</label>
            <select name="status" class="form-input w-full">
                <option value="1" <?= $audiobook['status'] ? 'selected' : '' ?>>Hiện</option>
                <option value="0" <?= !$audiobook['status'] ? 'selected' : '' ?>>Ẩn</option>
            </select>
        </div>
        <div class="flex gap-2">
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Cập nhật sách nói</button>
            <a href="/admin/audiobooks" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Quay lại</a>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const chaptersContainer = document.getElementById('chapters-container');
    const addChapterBtn = document.getElementById('add-chapter-btn');
    let chapterIndex = <?= count($chapters) ?>;

    function addChapterRow(title = '', audioUrl = '', order = 0) {
        const chapterId = `chapter-${chapterIndex}`;
        const html = `
            <div id="${chapterId}" class="p-4 border rounded-lg bg-gray-50 relative">
                <button type="button" class="absolute top-2 right-2 text-red-500 hover:text-red-700 remove-chapter-btn">&times;</button>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Tiêu đề chương</label>
                        <input type="text" name="chapters[${chapterIndex}][title]" class="form-input w-full" value="${title}" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">URL Audio</label>
                        <input type="text" name="chapters[${chapterIndex}][audio_file]" class="form-input w-full" value="${audioUrl}" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Thứ tự</label>
                        <input type="number" name="chapters[${chapterIndex}][chapter_order]" class="form-input w-full" value="${order}">
                    </div>
                </div>
            </div>
        `;
        chaptersContainer.insertAdjacentHTML('beforeend', html);
        chapterIndex++;
    }

    addChapterBtn.addEventListener('click', function () {
        addChapterRow('', '', chapterIndex);
    });

    chaptersContainer.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-chapter-btn')) {
            e.target.closest('[id^="chapter-"]').remove();
        }
    });
});
</script>
<?= $this->endSection() ?> 