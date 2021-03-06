<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Departments;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('profile')->with('user', Auth::user());
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function complete()
    {
        return view('profile-complete')->with('user', Auth::user());
    }

    public function saveComplete(Request $request) {
        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
            $request->avatar->storeAs('avatars', $avatarName);
            $user->ProfilePic = $avatarName;
        }
        if ($request->hasFile('avatar_back')) {
            $avatarBackName = $user->id.'_avatar_back'.time().'.'.request()->avatar_back->getClientOriginalExtension();
            $request->avatar_back->storeAs('avatars', $avatarBackName);
            $user->ProfilePic_back = $avatarBackName;
        }

        $user->BusinessName = 'Business-'.$request->input('name');
        $user->TagLine = $request->input('tagline');
        $user->biz_email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->country = $request->input('country');
        $user->state = $request->input('state');
        $user->zipcode = $request->input('zipcode');
        $user->biz_description = $request->input('business');

        $departments = [];
        if(isset($request->department) && !empty($request->department)) {
            foreach($request->department as $depart) {
                $department = new Departments;
                $department->Name = $depart;
                $departments[] = $department;
            }
            $user->departments()->saveMany($departments);
        }

        $user->profile_completed = 1;
        $user->save();

        return Redirect::route('invite-new');
    }

    public function update(Request $request) {
        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
            $request->avatar->storeAs('avatars', $avatarName);
            $user->ProfilePic = $avatarName;
        }
        if ($request->hasFile('avatar_back')) {
            $avatarBackName = $user->id.'_avatar_back'.time().'.'.request()->avatar_back->getClientOriginalExtension();
            $request->avatar_back->storeAs('avatars', $avatarBackName);
            $user->ProfilePic_back = $avatarBackName;
        }

        $user->BusinessName = $request->input('name');
        $user->TagLine = $request->input('tagline');
        $user->biz_email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->country = $request->input('country');
        $user->state = $request->input('state');
        $user->zipcode = $request->input('zipcode');
        $user->biz_description = $request->input('business');

        $departments = [];
        $existing_departs = [];
        foreach($user->departments as $depart) {
            $existing_departs[] = $depart->Name;
        }

        if(isset($request->department) && !empty($request->department)) {
            $requested_departs = [];
            foreach($request->department as $depart) {
                $requested_departs[] = $depart;
                if(!in_array($depart, $existing_departs)) {
                    $department = new Departments;
                    $department->Name = $depart;
                    $departments[] = $department;
                }
            }
            foreach($user->departments as $depart) {
                if(!in_array($depart->Name, $requested_departs)) {
                    $depart->delete();
                }
            }
            $user->departments()->saveMany($departments);
        }

        $user->profile_completed = 1;
        $user->save();

        return Redirect::route('Profile');
    }
}
