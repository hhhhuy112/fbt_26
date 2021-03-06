<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReview;
use App\Models\Rating;
use App\Models\Review;
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
        $this->middleware('auth')->only('rate', 'review');
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
            $oldRate = Rating::where('user_id', $request->user())
                ->where('tour_id', $id)->get();
            if (!$oldRate) {
                $this->tourRepository->rate($request->user(), $id, $request->star);
            } else {
                Session::flash('error_rate', trans('message.already-rate'));
            }
        } else {
            Session::flash('error_rate', trans('message.must-book-to-rate'));
        }

        return Redirect::back();
    }

    public function review(StoreReview $request, $id)
    {
        $tour = $this->tourRepository->find($id);
        if (Gate::allows('assess', $tour)) {
            $oldReview = Review::where('user_id', $request->user())
                ->where('tour_id', $id)->get();
            if (!$oldReview) {
                $review = $request->only([
                    'content',
                ]);
                $this->tourRepository->review($request->user(), $id, $review);
            } else {
                Session::flash('error_review', trans('message.already-review'));
            }
        } else {
            Session::flash('error_review', trans('message.must-book-to-review'));
        }

        return Redirect::back();
    }

    public function showLatestTours(Request $request)
    {
        $tours = $this->tourRepository->showLatestTour();

        return view('home', compact('tours'));
    }

    public function showBestTours(Request $request)
    {
        $tours = $this->tourRepository->showBestTour();

        return view('home', compact('tours'));
    }

    public function showPopularTours(Request$request)
    {
        $tours = $this->tourRepository->showPopularTour();

        return view('home', compact('tours'));
    }

    public function search(Request $request)
    {
        $filters = $request->only([
            'duration',
            'start_date',
            'price'
        ]);
        $tours = $this->tourRepository->search($filters, $request->name_itinerary);
        if (!$tours) {
            Session::flash('no_tours', trans('message.no-results'));
        }
        return view('home', compact('tours'));
    }
}
