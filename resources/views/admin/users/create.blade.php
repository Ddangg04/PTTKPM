@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-6 bg-gray-900 text-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold mb-6 flex items-center">
        <svg class="w-6 h-6 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
        Thêm Người Dùng
    </h2>

    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300">Tên</label>
            <input type="text" name="name" class="w-full p-2 mt-1 bg-gray-800 text-white rounded border border-gray-600 focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300">Số điện thoại</label>
            <input type="text" name="phone" class="w-full p-2 mt-1 bg-gray-800 text-white rounded border border-gray-600 focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300">Email</label>
            <input type="email" name="email" class="w-full p-2 mt-1 bg-gray-800 text-white rounded border border-gray-600 focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300">Mật khẩu</label>
            <input type="password" name="password" class="w-full p-2 mt-1 bg-gray-800 text-white rounded border border-gray-600 focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="flex justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                💾 Lưu Thay Đổi
            </button>
            <a href="{{ route('admin.users.index') }}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                ❌ Hủy
            </a>
        </div>
    </form>
</div>
@endsection
