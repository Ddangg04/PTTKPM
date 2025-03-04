<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập / Đăng Ký Karaoke</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="css/style-LG.css">
</head>
<body>
    <div class="container">
        <h1 class="logo">Karaoke Premium</h1>

        <div class="tabs">
            <button class="tab-btn active" onclick="switchTab('login')">Đăng nhập</button>
            <button class="tab-btn" onclick="switchTab('register')">Đăng ký</button>
        </div>

        <!-- Form Đăng Nhập -->
        <div id="login-form" class="form active">
            <h2>Đăng nhập vào tài khoản của bạn</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <input type="email" name="email" placeholder="Email của bạn" required>
                <input type="password" name="password" placeholder="Mật khẩu" required>
                <a href="#" class="forgot-password">Quên mật khẩu?</a>
                <button type="submit" class="login-btn">Đăng nhập</button>
            </form>
        </div>

        <!-- Form Đăng Ký -->
        <div id="register-form" class="form">
            <h2>Tạo tài khoản mới</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Tên đầy đủ" required>
                <input type="email" name="email" placeholder="Email của bạn" required>
                <input type="password" name="password" placeholder="Mật khẩu" required>
                <input type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu" required>
                <button type="submit" class="register-btn">Đăng ký</button>
            </form>
        </div>
    </div>

    <div class="wave"></div>

    <script>
        function switchTab(tab) {
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.form').forEach(form => form.classList.remove('active'));

            document.getElementById(tab + '-form').classList.add('active');
            document.querySelector(`button[onclick="switchTab('${tab}')"]`).classList.add('active');
            document.querySelector(".login-btn").addEventListener("click", function(event) {
        event.preventDefault(); // Ngăn chặn form submit mặc định

        let form = event.target.closest("form");
        let formData = new FormData(form);

        fetch(form.action, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.redirect) {
                window.location.href = data.redirect;
            } else {
                alert(data.error || "Đăng nhập thất bại!");
            }
        })
        .catch(error => console.error("Lỗi:", error));
    });
        }
    </script>
</body>
</html>
