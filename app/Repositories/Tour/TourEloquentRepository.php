<?php
namespace App\Repositories\Tour;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Tour;
use App\Repositories\EloquentRepository;

class TourEloquentRepository extends EloquentRepository implements TourRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Tour::class;
    }

    public function paginate($limit)
    {
        return parent::paginate($limit);
    }

    public function getPackageList(Tour $tour)
    {
        return $tour->packages->pluck('name', 'discount');
    }

    public function find($id)
    {
        return parent::find($id);
    }

    public function getActivities(Tour $tour)
    {
        return $tour->activities;
    }

    public function getPackages(Tour $tour)
    {
        return $tour->packages;
    }

    public function getRatingAverage(Tour $tour)
    {
        return $tour->ratings->avg('value');
    }

    public function getReviewTotal(Tour $tour)
    {
        return $tour->reviews->count('id');
    }

    public function getReviews(Tour $tour)
    {
        return $tour->reviews;
    }

    public function rate(User $user, $id, $arrtribute)
    {
        return $user->ratings()->create([
            'value' => $arrtribute,
            'tour_id' => $id,
        ]);
    }

    public function review(User $user, array $review)
    {
        return $user->reviews()->create($review);
    }

    public function showLatestTour()
    {
        return Tour::latest('start_date')
            ->paginate(config('setting.perpage'));
    }

    public function showBestTour()
    {
        return Tour::join('ratings', 'ratings.tour_id', '=', 'tours.id')
            ->select(DB::raw('avg(value) as average, tours.*'))
            ->groupBy('tours.id')
            ->orderBy('average', 'desc')
            ->paginate(config('setting.perpage'));
    }

    public function showPopularTour()
    {
        return Tour::withCount('bookings')
            ->orderBy('bookings_count', 'desc')
            ->paginate(config('setting.perpage'));
    }

    public function search($filters, $name_itinerary)
    {
        return Tour::search($filters, '>=')
            ->search('name', 'like', '%' . $name_itinerary . '%')
            ->orSearch('itinerary', 'like', '%' . $name_itinerary . '%')
            ->paginate(config('setting.perpage'));
    }
}
