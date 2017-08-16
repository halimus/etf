<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
//use Session;

class ProfileController extends Controller {

    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile_form() {
        $title = 'Profile';
        $user = Auth::user();
        return view('profile.info', compact('title', 'user'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_profile(Request $request) {
        $title = 'Profile';
        return view('profile.info', compact('title'));     
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function password_form() {
        $title = 'Change password';
        $user = Auth::user();
        return view('profile.password', compact('title', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_password(Request $request) {
        $title = 'Change password';
        return view('profile.password', compact('title'));     
    }

}
