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
	public function __construct()
	{
		setLocale(LC_ALL, 'IND');
		$level = 'peserta';
	}
	
	public function index()
	{
		return view('home')->with('level', 'peserta');
	}
}
