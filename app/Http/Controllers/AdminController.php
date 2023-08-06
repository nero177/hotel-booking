<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class AdminController extends Controller
{
    public function index(){
        $bookings = Booking::get();
        return view('admin.index', compact('bookings'));
    }
}
