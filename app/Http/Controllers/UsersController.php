<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class UsersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = 'Users';
        //$users = User::all();
        $users = User::all()->sortByDesc("created_at");
        return view('users.list', compact('title', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $title = 'Users';
        return view('users.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $input = $request->all();
        $rules = $this->validation_rules();
        $validator = Validator::make($input, $rules);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $input['password'] = bcrypt($request['password']);
        $input['created_at'] =  \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        
        if(User::create($input)){
            Session::flash('notif_type', 'success');
            Session::flash('notif', 'User created successfully!');
            return redirect("users/create");
        }
        else{
            throw new Exception('Error in saving data!');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = User::findOrFail($id);
        if (!$user) {
            Session::flash('notif_type', 'danger');
            Session::flash('notif', 'Could not find the user!');
            return redirect("users/$id/edit");
        }
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $title = 'Users';
        $user = User::findOrFail($id);
        return view('users.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        if (!$user) {
            Session::flash('notif_type', 'danger');
            Session::flash('notif', 'Could not find the user!');
            return redirect("users/$id/edit");
        }
        
        $check_password = isset($request['reset_password']) ? : false;
        $rules = $this->validation_rules($id, $check_password);
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } 
       
        $input = array();
        $input['name'] = $request['name']; 
        $input['username'] = $request['username']; 
        $input['email']    = $request['email'];   
        $input['updated_at'] =  \Carbon\Carbon::now()->format('Y-m-d H:i:s'); 
        $updated = $user->update($input);
        
        if($check_password){
            User::where('user_id', $id)->update(
              ['password' => bcrypt($request['password'])]      
            );
        }
        
        Session::flash('notif_type', 'success');
        Session::flash('notif', 'User updated successfully!');
        return redirect("users/$id/edit");    
             
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //$user = User::findOrFail($id);
        $user = User::find($id);
        if (!$user) {
            Session::flash('notif_type', 'danger');
            Session::flash('notif', 'Could not find the user!');
            return redirect("users");
        }
        if($user->user_id !=1){ // you cannot delete admin
            $user->delete();
            Session::flash('flash_message', 'User has been deleted!');
            //Session::flash('flash_message_important', true);
            //Session::flash('error', 'The old password is incorect')
        }
        return redirect('users');
    }
    
    /**
     * validation rules for user
     * @param type $user_id
     * @param type $check_password
     * @return string
     */
    private function validation_rules($user_id = null, $check_password=false){
        $rules = [
            'name' => 'required|max:25',
        ];
  
        if(!empty($user_id)){
            $rules['username'] = 'required|max:25|unique:users,username, ' . $user_id . ',user_id';
            $rules['email'] = 'required|email|max:45|unique:users,email, ' . $user_id . ',user_id'; 
        }
        else{
            $rules['username'] = 'required|max:25|unique:users';  
            $rules['email'] = 'required|email|max:45|unique:users';
            $rules['password'] = 'required|min:4|confirmed';
            $rules['password_confirmation'] = 'required';
        }
        
        if($check_password){
            $rules['password'] = 'required|min:4|confirmed';
            $rules['password_confirmation'] = 'required';
        }
        
        return $rules;
    }
    
    

}
