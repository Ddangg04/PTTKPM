<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karaoke Premium</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <img src="images/avt.jpg" alt="Karaoke Logo">
        <nav>
            <ul>
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Dịch vụ</a></li>
                <li><a href="{{ route('login') }}">Đặt phòng</a></li>
                <li><a href="{{ route('user.index') }}">Tài khoản</a></li>
                <li><a href="#">Liên hệ</a></li>
            </ul>
        </nav>
    </header>

    <section class="banner">
    <div class="slider">
        <img src="images/a1.jpg" alt="Banner Karaoke 1">
        <img src="images/a2.jpg" alt="Banner Karaoke 2">
    </div>
        <h1>Trải nghiệm Karaoke Đỉnh Cao</h1>
        <p>Không gian sang trọng - Âm thanh chuyên nghiệp</p>
    </section>

    <section class="features">
        <h2>Dịch vụ nổi bật</h2>
        <ul>
            <li><img src="images/a6.jpg" alt="Phòng VIP">Phòng VIP cao cấp</li>
            <li><img src="images/a3.jpg" alt="Ánh sáng">Hệ thống chiếu sáng</li>
            <li><img src="images/a5.jpg" alt="Bài hát">Bài hát cập nhật</li>
        </ul>
    </section>

    <section class="booking">
        <h2>Đặt phòng ngay</h2>
        <p>Liên hệ ngay để nhận ưu đãi đặc biệt!</p>
        <button class="animated-button">
    <a href="{{ route('login') }}">Đặt Phòng</a>
</button>


    </section>

    <section class="contact">
        <h2>Liên hệ với chúng tôi</h2>
        <form>
            <input type="text" placeholder="Họ và tên">
            <input type="tel" placeholder="Số điện thoại">
            <textarea placeholder="Nhập nội dung liên hệ"></textarea>
            <button type="submit">Gửi</button>
        </form>
    </section>

    <footer class="footer">
        <p>&copy; 2025 Karaoke Premium. Hotline: 0123-456-789</p>
        <p><a href="#">Chính sách bảo mật</a> | <a href="#">Điều khoản sử dụng</a></p>
        <form>
            <input type="email" placeholder="Nhập email của bạn">
            <button type="submit">Đăng ký</button>
        </form>
    </footer>
</body>
</html>
