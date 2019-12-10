<?php

namespace App\Http\Controllers\Back;

use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile() {
        return view('peserta.profileData')->with('level', 'peserta');
    }
	
	public function doPassword(Request $request)
	{
		$this->validate($request,[
			'old_password' => 'required',
			'password' => 'required|confirmed',
		]);
		
		$hashedPassword = Auth::user()->password;
		if (Hash::check($request->old_password,$hashedPassword))
		{
			if (!Hash::check($request->password,$hashedPassword))
			{
				$user = User::find(Auth::id());
				$user->password = Hash::make($request->password);
				$user->pw = $request->password;
				$user->save();
				
				Toastr::success('Password Successfully Changed', 'Success', ["positionClass" => "toast-top-right"]);
				return redirect()->back();
			} else {
				Toastr::error('New password cannot be the same as old password', 'Error', ["positionClass" => "toast-top-right"]);
				return redirect()->back();
			}
		} else {
			Toastr::error('Current password not match', 'Error', ["positionClass" => "toast-top-right"]);
			return redirect()->back();
		}
	}
}
