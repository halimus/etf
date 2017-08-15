<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpController extends Controller {
    
    /**
     * Display about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function about() {
        $title = 'About';
        return view('help.about', compact('title'));
    }
    
    /**
     * Display about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function help() {
        $title = 'Help';
        return view('help.home', compact('title'));
    }
}
