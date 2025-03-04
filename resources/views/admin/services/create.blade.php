@extends('admin.layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-4">➕ Thêm dịch vụ</h1>

    <form action="{{ route('admin.services.store') }}" method="POST" class="bg-gray-800 p-5 rounded">
        @csrf

        <div class="mb-3">
            <label class="block mb-1">Tên dịch vụ:</label>
            <input type="text" name="name" class="w-full p-2 rounded bg-gray-700 text-white" required>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Mô tả:</label>
            <textarea name="description" class="w-full p-2 rounded bg-gray-700 text-white"></textarea>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Giá (VNĐ):</label>
            <input type="number" name="price" class="w-full p-2 rounded bg-gray-700 text-white" required>
        </div>

        <button type="submit" class="bg-green-500 px-4 py-2 rounded">💾 Lưu</button>
        <a href="{{ route('admin.services.index') }}" class="bg-gray-500 px-4 py-2 rounded">🔙 Quay lại</a>
    </form>
@endsection
