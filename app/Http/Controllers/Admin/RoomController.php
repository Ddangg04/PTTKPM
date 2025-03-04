<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Exception;

class RoomController extends Controller
{
    // Hiển thị danh sách phòng
    public function index()
    {
        $rooms = Room::with('roomType')->get();
        return view('admin.rooms.index', compact('rooms'));
    }

    // Hiển thị form thêm phòng
    public function create()
    {
        $roomTypes = RoomType::all();
        return view('admin.rooms.create', compact('roomTypes'));
    }

    // Xử lý lưu phòng vào database
    public function store(Request $request)
    {
        $request->validate([
            'room_number' => 'required|string|max:10|unique:rooms,room_number',
            'name' => 'required|string|max:255',
            'room_type_id' => 'required|exists:room_types,id',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:available,booked',
        ]);

        Room::create($request->all());

        return redirect()->route('admin.rooms.index')->with('success', 'Phòng đã được thêm!');
    }

    // Hiển thị form chỉnh sửa
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        $roomTypes = RoomType::all();
        return view('admin.rooms.edit', compact('room', 'roomTypes'));
    }

    // Xử lý cập nhật phòng
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'room_number' => 'required|string|max:50|unique:rooms,room_number,' . $id,
            'room_type_id' => 'required|exists:room_types,id',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:available,booked',
        ]);

        $room = Room::findOrFail($id);
        $room->update($request->all());

        return redirect()->route('admin.rooms.index')->with('success', 'Cập nhật phòng thành công!');
    }

    // Xóa phòng
    public function destroy($id)
    {
        try {
            $room = Room::findOrFail($id);
            $room->delete();
            return redirect()->route('admin.rooms.index')->with('success', 'Xóa phòng thành công!');
        } catch (Exception $e) {
            return redirect()->route('admin.rooms.index')->with('error', 'Không thể xóa phòng này vì nó đang được sử dụng!');
        }
    }
}
