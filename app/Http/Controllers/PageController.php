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
     * Show grid view
     *
     * @return \Illuminate\Http\Response
     */
    public function grid()
    {
        $users = \App\User::paginate(12);

        return view('grid', compact('users'));
    }
}
