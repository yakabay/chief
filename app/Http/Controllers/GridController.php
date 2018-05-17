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
     * Return list of users
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return User::orderBy($request->sort, $request->order)->simplePaginate(12);
    }

    /**
     * Return search results
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

        return User::where('name', 'like', '%'.$request->search.'%')
                    ->orWhere('position', 'like', '%'.$request->search.'%')
                    ->orWhere('salary', 'like', '%'.$request->search.'%')
                    ->when(is_numeric($request->search), function ($query) use ($request) {
                        return $query->orWhere('employment_date', 'like', '%'.$request->search.'%');
                    })
                    ->simplePaginate(12);
    }
}
