<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller {
    
    /**
     * Display about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = 'About';
        return view('about', compact('title'));
    }
    
}
