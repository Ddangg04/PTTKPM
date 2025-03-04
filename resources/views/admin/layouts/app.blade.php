<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 p-5">
            <h2 class="text-2xl font-bold mb-4">Admin Panel</h2>
            <ul>
                <li class="mb-2">
                    <a href="{{ route('admin.rooms.index') }}" class="block p-2 rounded bg-gray-700 hover:bg-gray-600">
                        🏨 Quản lý phòng
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('admin.services.index') }}" class="block p-2 rounded bg-gray-700 hover:bg-gray-600">
                        🛠️ Quản lý dịch vụ
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('admin.users.index') }}" class="block p-2 rounded bg-gray-700 hover:bg-gray-600">
                        👤 Quản lý người dùng
                    </a>
                </li>
            </ul>
        </div>

        <!-- Content -->
        <div class="flex-1 p-5">
            @yield('content')
        </div>
    </div>
</body>
</html>
