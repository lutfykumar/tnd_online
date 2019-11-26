<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function profile() {
        return view('peserta.profileData')->with('level', 'peserta');
    }
}
