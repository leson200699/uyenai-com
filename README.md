# UyenAI.com - CodeIgniter 4 Project

🚀 **Website quản lý nội dung và dịch vụ AI với CodeIgniter 4**

## 📋 Tính năng chính

- ✅ **Quản lý tin tức** với Rich Text Editor (TinyMCE)
- ✅ **Quản lý kiến thức** với File Manager tích hợp
- ✅ **Hệ thống sách nói** (Audiobooks)
- ✅ **Quản lý sản phẩm và dịch vụ**
- ✅ **Hệ thống đặt hàng và thanh toán**
- ✅ **Dashboard quản trị viên**
- ✅ **File Manager** với khả năng chèn hình ảnh vào nội dung

## 🛠️ Công nghệ sử dụng

- **Framework:** CodeIgniter 4
- **Database:** MySQL
- **Frontend:** Bootstrap, TailwindCSS
- **Rich Text Editor:** TinyMCE
- **File Management:** Custom File Manager
- **Version Control:** Git

## 📦 Cài đặt

1. **Clone repository:**
   ```bash
   git clone https://github.com/leson200699/uyenai-com.git
   cd uyenai-com
   ```

2. **Cài đặt dependencies:**
   ```bash
   composer install
   ```

3. **Cấu hình môi trường:**
   ```bash
   cp env .env
   ```
   Chỉnh sửa file `.env` với thông tin database và cấu hình cần thiết.

4. **Chạy migrations:**
   ```bash
   php spark migrate
   ```

5. **Seed dữ liệu mẫu:**
   ```bash
   php spark db:seed InitialSeeder
   ```

6. **Khởi động server:**
   ```bash
   php spark serve
   ```

## 📁 Cấu trúc dự án

```
uyenai-com/
├── app/
│   ├── Controllers/
│   │   ├── Admin/          # Controllers quản trị
│   │   ├── Auth.php        # Xác thực người dùng
│   │   └── Home.php        # Trang chủ
│   ├── Models/             # Models cho database
│   ├── Views/
│   │   ├── admin/          # Views quản trị
│   │   ├── layouts/        # Layout templates
│   │   └── partials/       # Components tái sử dụng
│   └── Config/             # Cấu hình ứng dụng
├── public/
│   ├── js/
│   │   ├── rich-text-editor.js    # TinyMCE integration
│   │   └── filemanager.js         # File manager
│   ├── css/
│   │   └── rich-text-editor.css   # Styles cho editor
│   └── uploads/            # File uploads
└── writable/               # Cache, logs, sessions
```

## 🎯 Tính năng nổi bật

### Rich Text Editor với File Manager
- **TinyMCE Editor** cho việc soạn thảo nội dung
- **File Manager Modal** để chọn và chèn hình ảnh
- **Drag & Drop** file upload
- **Preview** hình ảnh trước khi chèn

### Hệ thống quản trị
- Dashboard tổng quan
- Quản lý tin tức và danh mục
- Quản lý kiến thức
- Quản lý sản phẩm/dịch vụ
- Quản lý đơn hàng
- File Manager

## 🔧 Requirements

PHP version 8.1 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

## 📞 Liên hệ

- **Website:** [uyenai.com](https://uyenai.com)
- **Email:** developer@uyenai.com
- **GitHub:** [@leson200699](https://github.com/leson200699)

---

⭐ **Nếu dự án này hữu ích, hãy để lại một star!** ⭐

> [!WARNING]
> - The end of life date for PHP 7.4 was November 28, 2022.
> - The end of life date for PHP 8.0 was November 26, 2023.
> - If you are still using PHP 7.4 or 8.0, you should upgrade immediately.
> - The end of life date for PHP 8.1 will be December 31, 2025.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
