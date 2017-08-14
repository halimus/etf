<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EtfController extends Controller {
    
    /**
     * Display ETF page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = 'ETFs';
        return view('etf', compact('title'));
    }
    
    
}
