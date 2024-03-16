<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.profile.index',[
            'user' => $user
        ]);
    }

    public function edit()
    {
        $user = Auth::user();
        return view('admin.profile.edit',[
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'email|required|unique:users,email,'.Auth::user()->id,
            'phone' => 'numeric|required|unique:users,phone,'.Auth::user()->id,
        ]);

        if ($validated) {
            $user = User::find(Auth::user()->id);
            $user->update($validated);
            return to_route('admin.profile.index')->with('message','Profile berhasil diupdate');
        }
    }
}
