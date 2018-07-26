<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use App\Http\Controllers\Controller;
use App\Repositories\Booking\BookingRepositoryInterface;
use Illuminate\Support\Facades\Redirect;

class BookingController extends Controller
{
    protected $bookingRespository;

    public function __construct(BookingRepositoryInterface $bookingRepository)
    {
        $this->bookingRespository = $bookingRepository;
    }

    public function index()
    {
        $bookings = $this->bookingRespository->getAll();

        return view('admin.bookings.index', compact('bookings'));
    }

    public function destroy(Booking $booking)
    {
        $this->bookingRespository->destroy($booking);

        return Redirect::back();
    }
}
