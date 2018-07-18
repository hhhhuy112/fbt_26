<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBooking;

class TourBookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(StoreBooking $request, $tour_id)
    {
        $booking = $request->only([
            'booking_date',
            'number_of_passengers',
            'grand_total'
        ]);
        $booking['tour_id'] = $tour_id;
        $request->user()->bookings()->create($booking);

        return redirect()->route('tour.index');
    }
}
