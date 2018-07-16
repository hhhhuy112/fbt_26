<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;

class TourController extends Controller
{
    public function index(Request $request)
    {
        $tours = Tour::paginate(config('setting.perpage'));

        if ($request->ajax()) {
            return view('home', compact('tours'));
        }

        return view('home', compact('tours'));
    }

    public function show(Tour $tour)
    {
        $activities = $tour->activities;
        $packages = $tour->packages;
        $packagesList = $tour->packages->pluck('name', 'discount');
        $average_rating = $tour->ratings->avg('value');
        $total_reviews = $tour->reviews->count('id');

        return view('tours.show', compact('tour', 'activities', 'packages', 'packagesList', 'average_rating', 'total_reviews'));
    }
}
