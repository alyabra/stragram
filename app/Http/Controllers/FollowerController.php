<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    //
    public function store(User $user)
    {
        // no entendi el attach
        $user->followers()->attach( auth()->user()->id);

        return back();
    }
    public function destroy(User $user)
    {
        // no entendi el attach
        $user->followers()->detach( auth()->user()->id);

        return back();
    }
    
}
