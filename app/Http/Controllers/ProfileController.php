<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show_profile()
    {
        $user = Auth::user();
        return view('pages.profile.index', compact('user'));
    }
    
    public function show_profile_admin()
    {
        $user = Auth::user();
        return view('admin.profile.profileadmin', compact('user'));
    }

    public function edit_profile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            
        ]);

        $user = Auth::user();
        $user->update([
            'name' => $request->name,
        ]);

        return Redirect::back()->with('success','Update Profile Success!');
    }
}
