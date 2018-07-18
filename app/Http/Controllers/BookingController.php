<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Booking;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $bookings = $request->user()->bookings()->get();
        return view('bookings.index', compact('bookings'));
    }

    public function edit(Booking $booking)
    {
        $this->authorize('bookingUpdate', $booking);
        $this->authorize('matchUser', $booking);

        $tour = Tour::find($booking->tour_id);
        $packagesList = $tour->packages->pluck('name', 'discount');

        return view('bookings.edit', compact('booking', 'tour', 'packagesList'));
    }

    public function update(Request $request, Booking $booking)
    {
        $booking->update($request->all());

        return redirect()->route('booking.index');
    }

    public function destroy(Booking $booking)
    {
        $this->authorize('bookingUpdate', $booking);
        $this->authorize('matchUser', $booking);

        $booking->forceDelete();

        return redirect()->route('booking.index');
    }

    public function cancel(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $this->authorize('bookingUpdate', $booking);
        $this->authorize('matchUser', $booking);

        $booking->is_canceled = 1;
        $booking->save();
        $booking->delete();

        return redirect()->route('booking.index');
    }

    public function canceledList(Request $request)
    {
        $canceledList = Booking::onlyTrashed()
            ->where('user_id', $request->user()->id)
            ->get();

        return view('bookings.cancel', compact('canceledList'));
    }

    public function restore(Request $request, $id)
    {
        Booking::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('booking.index');
    }
}
