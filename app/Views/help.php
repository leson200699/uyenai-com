<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Trung Tâm Hỗ Trợ</h1>
    
    <div class="max-w-4xl mx-auto">
        <!-- FAQ Section -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Các câu hỏi thường gặp (FAQ)</h2>
            <div class="space-y-4">
                <details class="bg-white p-4 rounded-lg border shadow-sm">
                    <summary class="font-semibold cursor-pointer flex justify-between items-center">
                        Làm thế nào để nạp tiền vào tài khoản?
                        <i data-lucide="plus-circle" class="w-5 h-5 text-indigo-500 plus-icon"></i>
                        <i data-lucide="minus-circle" class="w-5 h-5 text-indigo-500 minus-icon"></i>
                    </summary>
                    <p class="mt-4 text-gray-600">
                        Bạn có thể nạp tiền bằng cách chuyển khoản ngân hàng hoặc qua ví Momo. Vui lòng truy cập trang "Nạp tiền & Thanh toán", chọn phương thức và làm theo hướng dẫn. Điều quan trọng là phải ghi chính xác nội dung chuyển khoản để tiền được cộng tự động.
                    </p>
                </details>
                <details class="bg-white p-4 rounded-lg border shadow-sm">
                    <summary class="font-semibold cursor-pointer flex justify-between items-center">
                        Tôi đã mua khoá học, làm sao để vào học?
                        <i data-lucide="plus-circle" class="w-5 h-5 text-indigo-500 plus-icon"></i>
                        <i data-lucide="minus-circle" class="w-5 h-5 text-indigo-500 minus-icon"></i>
                    </summary>
                    <p class="mt-4 text-gray-600">
                        Sau khi thanh toán thành công, tất cả các sản phẩm số bạn đã mua sẽ nằm trong mục "Kho của tôi". Bạn chỉ cần vào đó, chọn tab "Khoá học" và nhấn "Vào học" ở khoá học tương ứng.
                    </p>
                </details>
                <details class="bg-white p-4 rounded-lg border shadow-sm">
                    <summary class="font-semibold cursor-pointer flex justify-between items-center">
                        Chính sách bảo hành cho dịch vụ SEO là gì?
                        <i data-lucide="plus-circle" class="w-5 h-5 text-indigo-500 plus-icon"></i>
                        <i data-lucide="minus-circle" class="w-5 h-5 text-indigo-500 minus-icon"></i>
                    </summary>
                    <p class="mt-4 text-gray-600">
                        Chúng tôi cam kết duy trì thứ hạng từ khóa đã đạt được trong top theo hợp đồng. Chính sách bảo hành chi tiết sẽ được quy định rõ trong hợp đồng dịch vụ mà hai bên đã ký kết.
                    </p>
                </details>
                <details class="bg-white p-4 rounded-lg border shadow-sm">
                    <summary class="font-semibold cursor-pointer flex justify-between items-center">
                        Làm sao để liên hệ với đội ngũ hỗ trợ kỹ thuật?
                        <i data-lucide="plus-circle" class="w-5 h-5 text-indigo-500 plus-icon"></i>
                        <i data-lucide="minus-circle" class="w-5 h-5 text-indigo-500 minus-icon"></i>
                    </summary>
                    <p class="mt-4 text-gray-600">
                        Bạn có thể liên hệ với đội ngũ hỗ trợ kỹ thuật của chúng tôi thông qua form liên hệ bên dưới, gọi số hotline 1900.xxxx hoặc gửi email đến support@techhub.vn. Thời gian phản hồi thông thường là trong vòng 24 giờ làm việc.
                    </p>
                </details>
                <details class="bg-white p-4 rounded-lg border shadow-sm">
                    <summary class="font-semibold cursor-pointer flex justify-between items-center">
                        Làm thế nào để được hoàn tiền nếu không hài lòng với dịch vụ?
                        <i data-lucide="plus-circle" class="w-5 h-5 text-indigo-500 plus-icon"></i>
                        <i data-lucide="minus-circle" class="w-5 h-5 text-indigo-500 minus-icon"></i>
                    </summary>
                    <p class="mt-4 text-gray-600">
                        Chúng tôi có chính sách hoàn tiền trong vòng 7 ngày đối với các dịch vụ khóa học và sách nói. Đối với các dịch vụ khác, việc hoàn tiền sẽ được xem xét dựa trên từng trường hợp cụ thể và tuân theo các điều khoản trong hợp đồng. Vui lòng liên hệ với bộ phận chăm sóc khách hàng để được hướng dẫn chi tiết.
                    </p>
                </details>
            </div>
        </div>

        <!-- Support Form Section -->
        <div class="bg-white rounded-xl shadow-sm border p-8 mb-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Gửi Yêu Cầu Hỗ Trợ</h2>
            <form class="space-y-6">
                <div>
                    <label for="topic" class="block text-sm font-medium text-gray-700">Chủ đề cần hỗ trợ</label>
                    <select id="topic" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2">
                        <option>Vấn đề kỹ thuật</option>
                        <option>Vấn đề thanh toán / nạp tiền</option>
                        <option>Khiếu nại dịch vụ</option>
                        <option>Góp ý</option>
                        <option>Vấn đề khác</option>
                    </select>
                </div>
                <div>
                    <label for="order-id" class="block text-sm font-medium text-gray-700">Mã đơn hàng (Nếu có)</label>
                    <input type="text" id="order-id" placeholder="Ví dụ: #DH1138" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2">
                </div>
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700">Mô tả chi tiết</label>
                    <textarea id="message" rows="5" placeholder="Vui lòng mô tả rõ vấn đề bạn đang gặp phải..." class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2"></textarea>
                </div>
                <div>
                    <label for="attachment" class="block text-sm font-medium text-gray-700">Đính kèm (Ảnh chụp màn hình, video...)</label>
                    <input type="file" id="attachment" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                </div>
                <div class="text-center">
                    <button type="submit" class="w-full sm:w-auto inline-flex justify-center py-3 px-8 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Gửi Yêu Cầu
                    </button>
                </div>
            </form>
        </div>
        
        <!-- Contact Information -->
        <div class="bg-white rounded-xl shadow-sm border p-8 mb-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Thông Tin Liên Hệ</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="phone" class="w-8 h-8 text-indigo-600"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Hotline Hỗ Trợ</h3>
                    <p class="text-gray-600">1900.xxxx</p>
                    <p class="text-gray-600 text-sm">(8:00 - 22:00 tất cả các ngày)</p>
                </div>
                
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="mail" class="w-8 h-8 text-indigo-600"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Email Hỗ Trợ</h3>
                    <p class="text-gray-600">support@techhub.vn</p>
                    <p class="text-gray-600 text-sm">(Phản hồi trong 24h làm việc)</p>
                </div>
                
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                        <i data-lucide="message-circle" class="w-8 h-8 text-indigo-600"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Live Chat</h3>
                    <p class="text-gray-600">Chat trực tiếp trên website</p>
                    <p class="text-gray-600 text-sm">(9:00 - 21:00 tất cả các ngày)</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Style cho details tag
    const detailElements = document.querySelectorAll('details');
    
    detailElements.forEach(detail => {
        detail.addEventListener('toggle', function() {
            const summary = this.querySelector('summary');
            const plusIcon = summary.querySelector('.plus-icon');
            const minusIcon = summary.querySelector('.minus-icon');
            
            if (this.open) {
                plusIcon.style.display = 'none';
                minusIcon.style.display = 'block';
            } else {
                plusIcon.style.display = 'block';
                minusIcon.style.display = 'none';
            }
        });
    });
});
</script>

<style>
details > summary {
    list-style: none;
}
details > summary::-webkit-details-marker {
    display: none;
}
details[open] summary .plus-icon {
    display: none;
}
details:not([open]) summary .minus-icon {
    display: none;
}
</style> 