<?php

namespace App\Repositories\Booking;

use App\Models\Booking;
use App\Models\Tour;
use App\Models\User;
use App\Repositories\EloquentRepository;

class BookingEloquentRepository extends EloquentRepository implements BookingRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Booking::class;
    }

    public function find($id)
    {
        return parent::find($id);
    }

    public function update($id, array $attributes)
    {
        return parent::update($id, $attributes);
    }

    public function destroy(Booking $booking)
    {
        return $booking->forceDelete($booking->id);
    }

    public function cancel($id)
    {
        $booking = $this->find($id);
        $booking->is_canceled = config('setting.yes');
        $booking->save();

        return $booking->delete($id);
    }

    public function getBookingForUser(User $user)
    {
        return $user->bookings()->latest()->get();
    }

    public function getPackageList(Tour $tour)
    {
        return $tour->packages->pluck('name', 'discount');
    }

    public function showCancelForUser(User $user)
    {
        return Booking::onlyTrashed()
            ->where('user_id', $user->id)
            ->get();
    }

    public function restorecCancel($id)
    {
        $booking = $this->find($id);
        $booking->is_canceled = config('setting.no');
        $booking->save();

        return Booking::withTrashed()->findOrFail($id)->restore();
    }

    public function storeBooking(User $user, $id, array $booking)
    {
        $booking['tour_id'] = $id;
        return $user->bookings()->create($booking);
    }
}
