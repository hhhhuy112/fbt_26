<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReview;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Tour;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Repositories\Tour\TourRepositoryInterface;

class TourController extends Controller
{
    protected $tourRepository;

    public function __construct(TourRepositoryInterface $tourRepository)
    {
        $this->tourRepository = $tourRepository;
    }

    public function index(Request $request)
    {
        $tours = $this->tourRepository->paginate(config('setting.perpage'));

        if ($request->ajax()) {
            return view('home', compact('tours'));
        }

        return view('home', compact('tours'));
    }

    public function show(Tour $tour)
    {
        $activities = $this->tourRepository->getActivities($tour);
        $packages = $this->tourRepository->getPackages($tour);
        $packagesList = $this->tourRepository->getPackageList($tour);
        $average_rating = $this->tourRepository->getRatingAverage($tour);
        $total_reviews = $this->tourRepository->getReviewTotal($tour);
        $reviews = $this->tourRepository->getReviews($tour);

        return view('tours.show', compact('tour', 'activities', 'packages', 'packagesList', 'average_rating', 'total_reviews', 'reviews'));
    }

    public function rate(Request $request, $id)
    {
        $tour = $this->tourRepository->find($id);
        if (Gate::allows('assess', $tour)) {
            $this->tourRepository->rate($request->user(), $id, $request->star);
        } else {
            Session::flash('error_rate', 'You must book this tour to rate');
        }

        return Redirect::back();
    }

    public function review(StoreReview $request, $id)
    {
        $tour = $this->tourRepository->find($id);
        if (Gate::allows('assess', $tour)) {
            $review = $request->only([
                'title',
                'content',
            ]);
            $this->tourRepository->review($request->user(), $id, $review);
        } else {
            Session::flash('error_review', 'You must book this tour to review');
        }

        return Redirect::back();
    }
}
