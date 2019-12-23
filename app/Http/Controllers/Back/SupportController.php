<?php

namespace App\Http\Controllers\Back;

use App\Models\TndOnline\TrainingPlan;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SupportController extends Controller
{	
	public function getLocalCode(Request $request)
	{
		$training = TrainingPlan::all();
		foreach ($training as $tp) {
			if($tp->local_code == 0) {
				$training_id = $tp->id;
				$tambah = TrainingPlan::find($training_id);
				$tambah->local_code = $training_id;
				$tambah->save();
			}
		}
		return "Done";
	}
}
