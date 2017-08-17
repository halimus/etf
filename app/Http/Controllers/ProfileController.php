<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
        $user = Auth::user();
        
        $rules = $this->rules_profile($user->user_id);
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } 
        
        $user->update($request->all());
        
        Session::flash('notif_type', 'success');
        Session::flash('notif', 'Your profile has been updated!'); 
        return redirect('profile');    
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
        
        $user = Auth::user();
        
        $rules = array(
            'current_password' => 'required',
            'password' => 'required|min:4|confirmed',
            //'password' => 'required|alphaNum|between:6,15|confirmed',
            'password_confirmation' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        //$current_password = Request::get('current_password');
        $current_password = $request->get('current_password');
        
        if (!Hash::check($current_password, $user->password)) {
            Session::flash('notif_type', 'danger');
            Session::flash('notif', 'The Old Password is incorect!');
        }
        else{
            $new_password = bcrypt($request->get('password')); 
            $user->update(['password' => $new_password]);
            
            Session::flash('notif_type', 'success');
            Session::flash('notif', 'Password has been updated!');
        }
        
        return redirect('change_password');
        //return view('profile.password', compact('title'));  
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules_profile($user_id) {
        return [
            'name' => 'required|min:3|max:15',
            //'username' => 'required|max:25|unique:users';  
            'email' => 'required|email|max:45|unique:users,email, ' . $user_id . ',user_id'
        ];
    }
    
    /**
     * 
     * @param Request $request
     */
    public function switch_chart(Request $request) {
        $user = Auth::user();
 
        $user->update(['chart_id' => $request->get('chart_id')]);
        
        Session::flash('notif_type', 'success');
        Session::flash('notif', 'The Chart has been switched!');
        
        return redirect('help');
            
    }
    
}


           