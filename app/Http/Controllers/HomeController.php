<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etf;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = 'Home';
        
        
        
        
        return view('home', compact('title'));
    }
    
    /**
     * Search ETF in database, if not exist check online.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $title = 'Home';
        
        $input = trim($request->search);
        if(!empty($input)){
            
            //print_r($request->search); exit;
            $etf = Etf::where('etf_name', $input)->first();
            if(!empty($etf)){ // Exist in DB
                
                echo '<br>id='.$etf['etf_id'];
                echo '<br>des='.$etf['description'];
                
                
                //print_r($etf); 
                exit;
            }
            else{ //Not exist in DB => Search in website
                
                
                
                
            }
            
            
            die('makach');
            
            
        }
        return view('home', compact('title'));
    }

}
