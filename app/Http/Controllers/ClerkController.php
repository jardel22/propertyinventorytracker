<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;

class ClerkController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:clerk');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('bookings.clerk.calendar');
    }

    public function booking()
    {
        $bookings = Booking::all();
        return view('bookings.clerk.index')->with('bookings', $bookings);
    }

    public function showBooking($id)
    {
        {
            $bookings = Booking::orderBy('created_at', 'desc')->paginate(10);
            return view('bookings.clerk.show')->with('booking', $booking);
        }
    }

    public function createBooking()
    {
        return view('bookings.clerk.create');
        
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'time' => 'required',
            'addressLine1' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'bedrooms' => 'required',
            'garage' => 'required',
            'electricityMeterLocation' => 'required',
            'waterMeterLocation' => 'required',
            'gasMeterLocation' => 'required',
            'purchaseOrderNumber' => 'required',
            'specialInstruction' => 'required'
        ]);

        return 123;
    }
}
