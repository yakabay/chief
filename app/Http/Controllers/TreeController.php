<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\UserResource;

class TreeController extends Controller
{
    /**
     * Show first two levels of hierarchy
     *
     * @return \Illuminate\Http\Response
     */
    public function default()
    {
        return UserResource::collection(User::with('children')->where('chief_id', '=', 0)->get());
    }
}
