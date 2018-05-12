<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show main page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('grid');
    }
}
