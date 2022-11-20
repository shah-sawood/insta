<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Detail page of profile
     */
    public function index(User $user_id)
    {
        $user = $user_id;
        return view('profile.index', compact('user'));
    }

    /**
     * Edit profile
     */
    public function edit(User $user_id) {
        $user = $user_id;
        return view("profile.edit", [
            "user" => $user,
        ]);
    }
}
