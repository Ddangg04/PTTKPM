<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('room_id')->constrained()->onDelete('cascade');
            $table->date('booking_date');
            $table->time('booking_time');
            $table->text('service_names')->nullable(); // Lưu dịch vụ dưới dạng chuỗi văn bản
            $table->enum('status', ['pending', 'confirmed', 'canceled'])->default('pending');
            $table->timestamps();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
