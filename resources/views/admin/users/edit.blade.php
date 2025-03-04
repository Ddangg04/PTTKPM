@extends('admin.layouts.app')

@section('content')
<div class="p-6 bg-gray-900 text-white">
    <h1 class="text-3xl font-bold mb-4">✏️ Chỉnh sửa Người Dùng</h1>

    <!-- Form cập nhật người dùng -->
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="bg-gray-800 p-6 rounded-lg">
        @csrf
        @method('PUT')

        <!-- Tên -->
        <div class="mb-4">
            <label for="name" class="block text-gray-300">Tên:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                class="w-full p-2 rounded bg-gray-700 text-white border border-gray-600">
        </div>

        <!-- Số điện thoại -->
        <div class="mb-4">
            <label for="phone" class="block text-gray-300">Số điện thoại:</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"
                class="w-full p-2 rounded bg-gray-700 text-white border border-gray-600">
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-gray-300">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                class="w-full p-2 rounded bg-gray-700 text-white border border-gray-600">
        </div>

        <!-- Mật khẩu (Có thể để trống nếu không đổi) -->
        <div class="mb-4">
            <label for="password" class="block text-gray-300">Mật khẩu (để trống nếu không đổi):</label>
            <input type="password" id="password" name="password"
                class="w-full p-2 rounded bg-gray-700 text-white border border-gray-600">
        </div>

        <!-- Xác nhận mật khẩu -->
        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-300">Xác nhận mật khẩu:</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                class="w-full p-2 rounded bg-gray-700 text-white border border-gray-600">
        </div>

        <!-- Nút Lưu -->
        <div class="flex justify-between">
            <button type="submit" class="bg-blue-500 px-4 py-2 rounded text-white">💾 Lưu Thay Đổi</button>
            <a href="{{ route('admin.users.index') }}" class="bg-gray-500 px-4 py-2 rounded text-white">❌ Hủy</a>
        </div>
    </form>
</div>
@endsection
