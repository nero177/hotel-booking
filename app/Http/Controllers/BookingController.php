<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::get();
        return view('index', compact('bookings'));
    }

    public function store(StoreBookingRequest $request){
        $data = $request->validated();
        $booking = new Booking();

        foreach($data as $key => $value){
            $booking->$key = $value;
        }

        $booking->save();
        return redirect()->back()->with('success', 'Successfully booked');
    }

    public function delete(Request $request, $id){
        Booking::destroy($id);
        return redirect()->back()->with('success', 'Successfully deleted');
    }

    public function getBookedDates(){
        $bookedDates = Booking::select('check_on')->get();
        $dates = [];

        foreach($bookedDates as $date){
            $dates[] = $date->check_on;
        }
            
        return $dates;
    }
}