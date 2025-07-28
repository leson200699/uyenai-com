<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?><?= esc($audiobook['title']) ?> - Sách Nói<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex flex-col items-center justify-center">
    <div class="w-full max-w-lg mx-auto">
        <!-- Book Cover -->
        <div class="mb-6">
            <img id="coverImage" src="<?= esc($audiobook['cover_image'], 'attr') ?>" class="w-64 h-auto object-cover rounded-xl shadow-2xl mx-auto" alt="Bìa sách <?= esc($audiobook['title']) ?>">
        </div>
        
        <!-- Book Info -->
        <div class="text-center mb-6">
            <h1 id="bookTitle" class="text-3xl font-bold text-gray-900"><?= esc($audiobook['title']) ?></h1>
            <p id="bookAuthor" class="text-lg text-gray-600 mt-1"><?= esc($audiobook['author']) ?></p>
            <p id="currentChapter" class="text-sm text-gray-500 mt-2"></p>
        </div>

        <!-- Audio Player -->
        <div class="bg-white p-4 rounded-xl shadow-lg w-full">
             <audio id="audioPlayer" controls class="w-full">
                <!-- Nguồn sẽ được đặt bằng JavaScript -->
            </audio>
        </div>
    </div>
    
    <!-- Chapters List -->
    <div class="w-full max-w-2xl mx-auto mt-8 bg-white rounded-xl shadow-sm border p-4">
        <h3 class="font-semibold mb-3">Mục lục</h3>
        <div id="chaptersList" class="space-y-2 max-h-60 overflow-y-auto">
            <?php if (!empty($chapters)): ?>
                <?php foreach ($chapters as $index => $chapter): ?>
                    <a href="#" class="chapter-item block p-3 rounded-lg border-l-4 border-transparent hover:bg-gray-50"
                       data-src="<?= esc($chapter['audio_file']) ?>"
                       data-title="<?= esc($chapter['title']) ?>">
                        <h4 class="font-semibold text-sm text-gray-700">Chương <?= $index + 1 ?>: <?= esc($chapter['title']) ?></h4>
                        <?php if(!empty($chapter['duration'])): ?>
                            <p class="text-xs text-gray-500"><?= esc($chapter['duration']) ?></p>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                 <p class="text-gray-500">Sách này chưa có chương nào.</p>
            <?php endif; ?>
        </div>
    </div>

     <!-- Description -->
    <div class="w-full max-w-2xl mx-auto mt-8 bg-white rounded-xl shadow-sm border p-6">
        <h3 class="font-semibold mb-3 text-xl">Giới thiệu sách</h3>
        <div class="text-gray-700 prose max-w-none">
            <?= $audiobook['description'] ?>
        </div>
    </div>
</div>

<style>
    .chapter-active {
        background-color: #eef2ff;
        border-color: #6366f1;
    }
    .chapter-active h4 {
        color: #4338ca;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const audioPlayer = document.getElementById('audioPlayer');
    const chaptersList = document.getElementById('chaptersList');
    const currentChapterDisplay = document.getElementById('currentChapter');
    const chapterItems = chaptersList.querySelectorAll('.chapter-item');
    const audiobookId = <?= $audiobook['id'] ?>;
    const storageKey = `audiobookProgress_${audiobookId}`;
    const isLoggedIn = <?= json_encode($isLoggedIn) ?>;
    
    // Khởi tạo trình phát Plyr một lần
    const player = new Plyr(audioPlayer, {
        // Tùy chọn để đảm bảo sự kiện hoạt động
        listeners: 'canplay,play,pause,timeupdate,seeked,ended'
    });
    window.player = player; // Dành cho debug

    let hls; // Giữ instance của Hls.js

    function loadChapter(chapterElement, autoplay = true, startTime = 0) {
        // Cập nhật giao diện
        chapterItems.forEach(item => item.classList.remove('chapter-active'));
        chapterElement.classList.add('chapter-active');

        const audioSrc = chapterElement.dataset.src;
        const chapterTitle = chapterElement.dataset.title;
        currentChapterDisplay.textContent = 'Đang nghe: ' + chapterTitle;

        // Hủy instance HLS cũ nếu có
        if (hls) {
            hls.destroy();
        }

        // Xử lý nguồn phát mới
        if (audioSrc.includes('.m3u8')) {
            if (Hls.isSupported()) {
                hls = new Hls();
                hls.loadSource(audioSrc);
                hls.attachMedia(audioPlayer);
            } else {
                 player.source = { type: 'audio', title: chapterTitle, sources: [{ src: audioSrc, type: 'application/x-mpegURL' }] };
            }
        } else {
            player.source = { type: 'audio', title: chapterTitle, sources: [{ src: audioSrc }] };
        }

        // Tua đến thời gian đã lưu khi media sẵn sàng
        player.once('canplay', () => {
            if (startTime > 0 && isLoggedIn) { // Chỉ tua nếu đã đăng nhập
                player.currentTime = startTime;
            }
            if (autoplay) {
                player.play();
            }
        });
    }
    
    function saveProgress() {
        // Chỉ lưu tiến trình cho người dùng đã đăng nhập
        if (!isLoggedIn) return;

        const activeChapter = chaptersList.querySelector('.chapter-active');
        // Chỉ lưu nếu có chương đang active và thời gian lớn hơn 0
        if (!activeChapter || player.currentTime <= 0) return;

        const progress = {
            chapterSrc: activeChapter.dataset.src,
            time: player.currentTime,
        };
        localStorage.setItem(storageKey, JSON.stringify(progress));
    }

    // Gán sự kiện click cho mỗi chương
    chapterItems.forEach((item, index) => {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            
            // Nếu chưa đăng nhập và click vào chương 2 trở đi
            if (isLoggedIn !== true && index > 0) {
                // Sử dụng SweetAlert2 để thông báo với phong cách UX/UI cải tiến
                Swal.fire({
                    title: 'Yêu Cầu Đăng Nhập',
                    text: "Vui lòng đăng nhập để nghe toàn bộ nội dung sách nói.",
                    showCancelButton: true,
                    confirmButtonText: 'Đăng nhập',
                    cancelButtonText: 'Để sau',
                    width: 400,
                    padding: '2em',
                    customClass: {
                        popup: 'rounded-2xl shadow-lg',
                        title: 'text-xl font-bold text-gray-800 mb-2',
                        htmlContainer: 'text-gray-600 leading-relaxed mb-6',
                        actions: 'w-full grid grid-cols-2 gap-4', // Cân đối 2 nút
                        confirmButton: 'w-full px-5 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors',
                        cancelButton: 'w-full px-5 py-2.5 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 transition-colors'
                    },
                    buttonsStyling: false,
                    reverseButtons: true // Đảo vị trí nút để nút chính sang phải
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/login'; // Chuyển hướng đến trang đăng nhập
                    }
                });
                return; // Dừng không phát nhạc
            }

            loadChapter(this, true); // Tải và phát khi click
        });
    });

    // === QUẢN LÝ TIẾN TRÌNH NGHE ===
    // Lưu tiến trình khi dừng, tua, hoặc kết thúc
    player.on('pause', saveProgress);
    player.on('seeked', saveProgress);
    player.on('ended', () => {
        // Khi hết chương, xóa tiến trình để chương sau bắt đầu từ đầu
        localStorage.removeItem(storageKey);
    });
    
    // Lưu tiến trình định kỳ trong khi phát
    let lastUpdateTime = 0;
    player.on('timeupdate', () => {
        const now = Date.now();
        // Cập nhật sau mỗi 5 giây
        if (now - lastUpdateTime > 5000) {
            saveProgress();
            lastUpdateTime = now;
        }
    });

    // Đảm bảo lưu lần cuối khi rời trang
    window.addEventListener('beforeunload', saveProgress);
    
    // Khôi phục tiến trình khi tải trang
    function restoreProgress() {
        // Chỉ khôi phục cho người dùng đã đăng nhập
        if (!isLoggedIn) {
             if (chapterItems.length > 0) {
                loadChapter(chapterItems[0], false);
            } else {
                currentChapterDisplay.textContent = "Chưa có chương nào để phát."
            }
            return;
        }

        const savedProgress = JSON.parse(localStorage.getItem(storageKey));

        if (savedProgress && savedProgress.chapterSrc) {
            const chapterToLoad = Array.from(chapterItems).find(item => item.dataset.src === savedProgress.chapterSrc);
            
            if (chapterToLoad) {
                // Tải chương đã lưu, không tự động phát, và tua đến đúng vị trí
                loadChapter(chapterToLoad, false, savedProgress.time);
                return; // Đã khôi phục, thoát khỏi hàm
            }
        }

        // Nếu không có tiến trình lưu hoặc chương không tìm thấy, tải chương đầu tiên
        if (chapterItems.length > 0) {
            loadChapter(chapterItems[0], false);
        } else {
            currentChapterDisplay.textContent = "Chưa có chương nào để phát."
        }
    }

    restoreProgress();
});
</script>

<?= $this->endSection() ?>
