@extends('admin.layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-4">✏ Chỉnh sửa phòng</h1>

    <form action="{{ route('admin.rooms.update', $room->id) }}" method="POST" class="bg-gray-800 p-5 rounded">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="block mb-1">Tên phòng:</label>
            <input type="text" name="name" value="{{ $room->name }}" class="w-full p-2 rounded bg-gray-700 text-white" required>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Số phòng:</label>
            <input type="text" name="room_number" value="{{ $room->room_number }}" class="w-full p-2 rounded bg-gray-700 text-white" required>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Loại phòng:</label>
            <select name="room_type_id" class="w-full p-2 rounded bg-gray-700 text-white" required>
                @foreach ($roomTypes as $type)
                    <option value="{{ $type->id }}" {{ $room->room_type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Giá phòng (VNĐ):</label>
            <input type="number" name="price" value="{{ $room->price }}" class="w-full p-2 rounded bg-gray-700 text-white" required>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Trạng thái:</label>
            <select name="status" class="w-full p-2 rounded bg-gray-700 text-white" required>
                <option value="available" {{ $room->status == 'available' ? 'selected' : '' }}>Còn trống</option>
                <option value="booked" {{ $room->status == 'booked' ? 'selected' : '' }}>Đã đặt</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 px-4 py-2 rounded">💾 Cập nhật</button>
        <a href="{{ route('admin.rooms.index') }}" class="bg-gray-500 px-4 py-2 rounded">🔙 Quay lại</a>
    </form>
@endsection
