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

    public function create()
    {
        return view('tours.create');
    }
}
