<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;

class TreeController extends Controller
{
    /**
     * Show first two levels of hierarchy
     *
     * @return \Illuminate\Http\Response
     */
    public function default()
    {
        return UserResource::collection(User::all());
    }
}
