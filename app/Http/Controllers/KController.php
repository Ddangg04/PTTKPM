<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karaoke;

class KController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'API works!']);
    }
}