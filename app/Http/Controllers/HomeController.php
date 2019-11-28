<?php

namespace App\Http\Controllers;

use App\Models\TndOnline\TrainingHasil;
use App\Models\TndOnline\TrainingSchedule;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $sche = TrainingSchedule::where('broadcast', true)->get();
	    $today = Carbon::now();
	    $model = User::find(Auth::id());
	    $hasil = TrainingHasil::where('peserta_id', Auth::id())->get();
	    return view('home', compact('model', 'sche', 'hasil', 'today'))->with('level', 'peserta');
    }
}
