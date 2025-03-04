<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price'];
    public function up()
{
    Schema::create('services', function (Blueprint $table) {
        $table->id();
        $table->string('name')->unique();
        $table->text('description')->nullable();
        $table->decimal('price', 10, 2);
        $table->timestamps();
    });
}

}
