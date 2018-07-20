<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBooking;
use App\Repositories\Booking\BookingRepositoryInterface;

class TourBookingController extends Controller
{
    protected $bookingRepository;

    public function __construct(BookingRepositoryInterface $bookingRepository)
    {
        $this->middleware('auth');
        $this->bookingRepository = $bookingRepository;
    }

    public function store(StoreBooking $request, $tour_id)
    {
        $booking = $request->only([
            'booking_date',
            'number_of_passengers',
            'grand_total'
        ]);
        $this->bookingRepository->storeBooking($request->user(), $tour_id, $booking);

        return redirect()->route('tour.show', $tour_id);
    }
}
