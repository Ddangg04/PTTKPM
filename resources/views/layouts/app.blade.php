<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Booking System')</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 800px; margin: auto; }
    </style>
</head>
<body>

    <div class="container">
        <h1>Hệ thống đặt phòng</h1>
        @yield('content')
    </div>

</body>
</html>
