<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RealEstate;

class ProfileController extends Controller
{
    public function edit(){ 
        return view('profile.edit');
    }

    public function update(Request $request) {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required',
            'id_number' => 'required',
            'email' => 'required',

        ]);

        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->id_number = $request->input('id_number');
        $user->email = $request->input('email');

        $user->save();

        //return redirect()->route('profile')->with('success', 'تم الحفظ بنجاح');
        session()->flash('success', 'تم الحفظ بنجاح');

        return redirect()->route('profile');
    }

    public function show() {
        $user = auth()->user();
        $realEstates = $user->realEstates; // Retrieve the real estates related to the user
    
        return view('profile', compact('user', 'realEstates'));
    }
    
}
