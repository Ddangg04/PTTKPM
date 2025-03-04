@extends('admin.layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-4">🏨 Danh sách phòng</h1>

    {{-- Hiển thị thông báo thành công hoặc lỗi --}}
    @if (session('success'))
        <div class="bg-green-500 text-white p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="bg-red-500 text-white p-2 mb-4 rounded">
            {{ session('error') }}
        </div>
    @endif

    {{-- Nút thêm phòng --}}
    <a href="{{ route('admin.rooms.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
        + Thêm phòng
    </a>

    {{-- Bảng danh sách phòng --}}
    <table class="w-full mt-4 border border-gray-700">
        <thead>
            <tr class="bg-gray-800 text-white">
                <th class="p-2">ID</th>
                <th class="p-2">Tên phòng</th>
                <th class="p-2">Loại phòng</th>
                <th class="p-2">Giá</th>
                <th class="p-2">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr class="border border-gray-700 text-center hover:bg-gray-700 transition">
                    <td class="p-2">{{ $room->id }}</td>
                    <td class="p-2">{{ $room->name }}</td>
                    <td class="p-2">{{ $room->roomType->name }}</td>
                    <td class="p-2">{{ number_format($room->price, 0, ',', '.') }} VND</td>
                    <td class="p-2">
                        {{-- Nút sửa --}}
                        <a href="{{ route('admin.rooms.edit', $room->id) }}" 
                           class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                            ✏️ Sửa
                        </a>

                        {{-- Nút xóa có xác nhận --}}
                        <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" class="inline"
                              onsubmit="return confirm('Bạn có chắc chắn muốn xóa phòng này?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                🗑️ Xóa
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
