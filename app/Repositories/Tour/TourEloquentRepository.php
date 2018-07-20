<?php
namespace App\Repositories\Tour;

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

    public function review(User $user, $id, $review)
    {
        $review['tour_id'] = $id;
        return $user->reviews()->create($review);
    }
}
