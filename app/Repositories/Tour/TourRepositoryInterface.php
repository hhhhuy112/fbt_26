<?php
namespace App\Repositories\Tour;

use App\Models\Tour;
use App\Models\User;

interface TourRepositoryInterface
{
    public function getPackageList(Tour $tour);

    public function getActivities(Tour $tour);

    public function getPackages(Tour $tour);

    public function getRatingAverage(Tour $tour);

    public function getReviewTotal(Tour $tour);

    public function getReviews(Tour $tour);

    public function rate(User $user, $id, $attribute);

    public function review(User $user, $id, $attribute);
}
