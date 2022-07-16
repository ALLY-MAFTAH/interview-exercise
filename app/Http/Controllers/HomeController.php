<?php

namespace App\Http\Controllers;

use App\Models\Expectancy;
use Illuminate\Http\Request;

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
        return view('home');
    }

    public function expectancy()
    {
        $expectancies = Expectancy::paginate(15);

        $ex = new ExpectancyController();
        $years = $ex->getYears();
        return response()->json([
            'expectancies' => $expectancies,
            'years' => $years
        ]);
    }
}
