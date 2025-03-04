<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt phòng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: black;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 900px;
            background: rgba(0, 0, 0, 0.9);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0, 255, 200, 0.8);
            margin-bottom: 20px;
        }
        .row {
            display: flex;
            align-items: center;
        }
        .info-section {
            flex: 1;
            padding-right: 20px;
            text-align: center;
        }
        .info-section img {
            width: 100%;
            border-radius: 10px;
        }
        .booking-card {
            flex: 1;
            padding-left: 20px;
        }
        .form-control, .form-select {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            border: none;
            border-radius: 10px;
        }
        .form-control::placeholder {
            color: #00FFC2;
        }
        .form-control:focus, .form-select:focus {
            background: rgba(255, 255, 255, 0.3);
            color: white;
            box-shadow: none;
        }
        .btn-custom {
            background: #00FFC2;
            color: black;
            font-weight: bold;
            border-radius: 10px;
        }
        .btn-custom:hover {
            background: #00cc99;
        }
        .booking-list {
            width: 100%;
        }
    </style>
</head>
<body>

    <!-- Phần đặt phòng -->
    <div class="container">
        <div class="row">
            <div class="info-section">
                <h2 class="text-neon">Karaoke Premium</h2>
                <p>Trải nghiệm phòng hát cao cấp với dịch vụ chuyên nghiệp.</p>
                <img src="images/a1.jpg" alt="Hình ảnh phòng">
            </div>
            <div class="booking-card">
                <h4>📅 Đặt phòng</h4>

                @if (session('success'))
                    <p class="alert alert-success">{{ session('success') }}</p>
                @endif

                <form action="{{ route('booking.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <input type="text" name="customer_name" class="form-control" placeholder="👤 Nhập tên người đặt" required>
                    </div>

                    <div class="mb-3">
                        <input type="tel" name="phone" class="form-control" placeholder="📞 Nhập số điện thoại" required>
                    </div>

                    <div class="mb-3">
                        <select name="room_id" class="form-select" required>
                            <option selected disabled>🏨 Chọn phòng</option>
                            @foreach ($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <input type="date" name="booking_date" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <input type="time" name="booking_time" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">🛎 Dịch vụ đi kèm:</label>
                        <div class="row">
                            @foreach ($services as $service)
                                <div class="col-6">
                                    <div class="form-check">
                                        <input type="checkbox" name="services[]" value="{{ $service->id }}" class="form-check-input">
                                        <label class="form-check-label">{{ $service->name }} - {{ number_format($service->price, 0) }} VNĐ</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <button type="submit" class="btn btn-custom w-100">✅ Đặt phòng ngay</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Danh sách phòng đã đặt -->
    <div class="container booking-list">
        <h2>Danh sách phòng đã đặt</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Phòng</th>
                    <th>Ngày đặt</th>
                    <th>Dịch vụ</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($bookings) && count($bookings) > 0)
                @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->room->name }}</td>
                    <td>{{ $booking->booking_date }}</td>
                    <td>{{ $booking->services }}</td> {{-- Hiển thị đúng tên dịch vụ --}}
                    <td>
                        <form action="{{ route('booking.destroy', $booking->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @else
                    <tr><td colspan="4">Bạn chưa đặt phòng nào.</td></tr>
                @endif
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
