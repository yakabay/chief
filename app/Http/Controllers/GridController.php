<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\UserResource;

class GridController extends Controller
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
     * Return default list of users
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // return User::orderBy($request->sort, $request->order)->get();
        return User::orderBy($request->sort, $request->order)->simplePaginate(2);
    }
}
