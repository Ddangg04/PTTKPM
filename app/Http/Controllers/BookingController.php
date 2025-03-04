<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
class BookingController extends Controller
{
    // Hiển thị danh sách phòng còn trống & form đặt phòng
        public function index()
    {
        $rooms = Room::where('status', 'available')->get(); // Lấy danh sách phòng trống
        $services = Service::all(); // Lấy danh sách dịch vụ
        $bookings = Booking::with('room', 'services')->get(); // Lấy danh sách đặt phòng
    
        return view('booking.index', compact('rooms', 'services', 'bookings'));
    }
    

    // Xử lý đặt phòng
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'room_id' => 'required|exists:rooms,id',
            'booking_date' => 'required|date',
            'booking_time' => 'required',
            'services' => 'nullable|array',
        ]);
    
        // Lấy danh sách tên dịch vụ theo ID
        $serviceNames = Service::whereIn('id', $request->services ?? [])->pluck('name')->toArray();
        
        Booking::create([
            'customer_name' => $request->customer_name,
            'phone' => $request->phone,
            'room_id' => $request->room_id,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'user_id' => auth()->id(),
            'services' => implode(', ', $serviceNames), // Lưu thành chuỗi văn bản
            'status' => 'pending',
        ]);
    
        // Cập nhật trạng thái phòng
        Room::findOrFail($request->room_id)->update(['status' => 'booked']);
    
        return redirect()->route('booking.index')->with('success', 'Đặt phòng thành công!');
    }
    
    public function userBookings()
    {
        $bookings = Booking::where('user_id', auth()->id())->with('room')->get();
    
        $rooms = Room::where('status', 'available')->get();
        $services = Service::all();
    
        return view('booking.index', compact('bookings', 'rooms', 'services'));
    }
    
    public function destroy($id)
{
    $booking = Booking::findOrFail($id);

    // Cập nhật trạng thái phòng về "available"
    Room::where('id', $booking->room_id)->update(['status' => 'available']);

    // Xóa đặt phòng
    $booking->delete();

    return redirect()->route('booking.index')->with('success', 'Xóa đặt phòng thành công!');
}





}

