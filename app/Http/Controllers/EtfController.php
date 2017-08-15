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
        return view('etf.list', compact('title'));
    }
    
    /**
     * Display Logs page.
     *
     * @return \Illuminate\Http\Response
     */
    public function logs() {
        $title = 'Logs';
        return view('etf.logs', compact('title'));
    }
    
}
