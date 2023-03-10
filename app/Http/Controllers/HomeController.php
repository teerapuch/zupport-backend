<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cache;

// modle
use App\Models\Restaurant;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $restaurants = Restaurant::where('deleted_at', 0)->get();
        Cache::put('restaurants', $restaurants);
        return view('home');
    }
}
