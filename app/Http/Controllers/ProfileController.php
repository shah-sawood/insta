<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;



class ProfileController extends Controller
{

    /** 
     * Display for authenticated users only.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ((auth()->user->profile ?? '')) {
            return view('profile.show', compact('user'));
        } else {
            return view('profile.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => ['required', 'string'],
            'description' => 'required',
            'url' => ['required', 'url'],
            'image' => '',
        ]);


        $imagePath = request('image')->store('profile', 'public');

        // resize the image to a 1200x1200 box
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(200, 200);
        $image->save();

        auth()->user()->profile()->create(
            array_merge(
                $data,
                ['image' => $imagePath]
            )
        );

        return redirect()->route('profile.show', auth()->user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if (($user->profile ?? '')) {
            return view('profile.show', compact('user'));
        } else {
            return redirect()->route('profile.create');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view("profile.edit", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => ['required', 'string'],
            'description' => 'required',
            'url' => ['required', 'url'],
        ]);


        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            // resize the image to a 1200x1200 box
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(200, 200);
            $image->save();

            auth()->user()->profile->update(
                array_merge(
                    $data,
                    ['image' => $imagePath]
                )
            );
        } else {
            auth()->user()->profile()->update($data);
        }


        return redirect()->route('profile.show', auth()->user()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}