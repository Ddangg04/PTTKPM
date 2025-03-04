@extends('admin.layouts.app')

@section('content')
<div class="p-6 bg-gray-900 text-white">
    <h1 class="text-3xl font-bold mb-4">👤 Quản lý Người Dùng</h1>

    <!-- Nút Thêm Người Dùng -->
    <a href="{{ route('admin.users.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">+ Thêm Người Dùng</a>

    <!-- Bảng danh sách người dùng -->
    <table class="w-full mt-4 border border-gray-700">
        <thead>
            <tr class="bg-gray-800">
                <th class="p-2">Tên</th>
                <th class="p-2">Số điện thoại</th>
                <th class="p-2">Email</th>
                <th class="p-2">Mật khẩu</th> <!-- Thêm cột mật khẩu -->
                <th class="p-2">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="border border-gray-700">
                <td class="p-2">{{ $user->name }}</td>
                <td class="p-2">{{ $user->phone }}</td>
                <td class="p-2">{{ $user->email }}</td>
                <td class="p-2">
                    <span class="text-gray-400">••••••••</span> 
                    <button onclick="togglePassword('{{ $user->id }}')" class="text-yellow-400 ml-2">👁️</button>
                    <span id="password-{{ $user->id }}" class="hidden">{{ $user->password }}</span>
                </td>
                <td class="p-2">
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="bg-blue-500 px-3 py-1 rounded">✏️ Sửa</a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 px-3 py-1 rounded">🗑️ Xóa</button>
                    </form>
                </td>
            </tr>

            <!-- Hiển thị danh sách phòng đã đặt -->
            @if ($user->bookings->count() > 0)
            <tr>
                <td colspan="5" class="bg-gray-800 p-4">
                    <strong>🛏️ Phòng đã đặt:</strong>
                    <ul class="mt-2">
                        @foreach ($user->bookings as $booking)
                        <li class="border-b border-gray-700 py-2">
                            <span class="text-yellow-400">Phòng: {{ $booking->room->name }}</span> | 
                            Ngày đặt: {{ $booking->booking_date }}

                            <!-- Nút Sửa & Xóa phòng đã đặt -->
                            <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="text-blue-400 ml-4">✏️ Sửa</a>
                            <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 ml-2">🗑️ Xóa</button>
                            </form>
                        </li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            @endif

            @endforeach
        </tbody>
    </table>
</div>

<!-- Script hiển thị mật khẩu -->
<script>
    function togglePassword(userId) {
        let passwordSpan = document.getElementById("password-" + userId);
        if (passwordSpan.classList.contains("hidden")) {
            passwordSpan.classList.remove("hidden");
        } else {
            passwordSpan.classList.add("hidden");
        }
    }
</script>

@endsection
