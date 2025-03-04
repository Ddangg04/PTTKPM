@extends('admin.layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-4">🛎️ Quản lý dịch vụ</h1>

    <a href="{{ route('admin.services.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">+ Thêm dịch vụ</a>

    <table class="w-full mt-4 border border-gray-700">
        <thead>
            <tr class="bg-gray-800">
                <th class="p-2">ID</th>
                <th class="p-2">Tên dịch vụ</th>
                <th class="p-2">Mô tả</th>
                <th class="p-2">Giá</th>
                <th class="p-2">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
                <tr class="border border-gray-700">
                    <td class="p-2">{{ $service->id }}</td>
                    <td class="p-2">{{ $service->name }}</td>
                    <td class="p-2">{{ $service->description }}</td>
                    <td class="p-2">{{ number_format($service->price) }} VND</td>
                    <td class="p-2">
                        <a href="{{ route('admin.services.edit', $service->id) }}" class="bg-blue-500 px-3 py-1 rounded">✏️ Sửa</a>
                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 px-3 py-1 rounded">🗑️ Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
