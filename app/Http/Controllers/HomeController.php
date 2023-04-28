<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ParkingsTestimonial;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $Parking = new Parking();
        // return $Parking->Rating(1);
        return view('site.home');
    }

    public function miniReviews()
    {
        return ParkingsTestimonial::where('completed', 1)->orderBy('id','desc')->limit(3)->get();
    }
}
