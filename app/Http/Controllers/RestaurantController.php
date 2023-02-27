<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Cache;
use Input;
use Session;
use Redirect;

// model
use App\Models\User;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::where('deleted_at', 0)->get();
        $restaurants = Restaurant::where('deleted_at', 0)->get();
        Cache::put('restaurants', $restaurants);
        return view('restaurant.index');
        //return view('restaurant.index')->with('restaurants', $restaurants);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // store
        $restaurant = new Restaurant;
        $restaurant->title = $request->input('title');
        $restaurant->location = $request->input('location');
        $restaurant->opening = $request->input('opening');
        $restaurant->dayoff = $request->input('dayoff');
        $restaurant->tel = $request->input('tel');
        $restaurant->parking = $request->input('parking');
        $restaurant->website = $request->input('website');
        $restaurant->save();
        // redirect
        Session::flash('success', 'Successfully created restaurant!');
        return Redirect::to('restaurant');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function lists()
    {
        $result = Cache::remember('restaurants', 60, function () {
            return Restaurant::get(); // get all form table to cache
        });

        return $result;
    }
}
