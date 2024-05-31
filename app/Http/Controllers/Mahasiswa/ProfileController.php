<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('mahasiswa.profile.index',[
            'user' => $user
        ]);
    }

    public function edit()
    {
        $user = Auth::user();
        return view('mahasiswa.profile.edit',[
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'nim' => 'required|unique:users,nim,'.Auth::user()->id,
            'major' => 'required',
            'study_program' => 'required',
            'class' => 'required',
            'username' => 'required|unique:users,username,'.Auth::user()->id,
            // 'email' => 'email|required|unique:users,email,'.Auth::user()->id,
            // 'phone' => 'numeric|required|unique:users,phone,'.Auth::user()->id,
            // 'gender' => 'required',
        ]);

        if ($validated) {
            $user = User::find(Auth::user()->id);
            $user->update($validated);
            return to_route('mahasiswa.profile.index')->with('success','Profile berhasil diupdate');
        }
    }

    public function changePassword()
    {
        return view('mahasiswa.profile.change-password');
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'old_password' => 'required|min:6',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|min:6',
        ]);

        if ($validated) {
            $userPassword = Hash::check($request->old_password, Auth::user()->password);
            if ($userPassword) {
                if ($request->new_password == $request->confirm_password) {
                    $user = User::find(Auth::user()->id)->update([
                        'password' => Hash::make($request->new_password)
                    ]);

                    return to_route('mahasiswa.dashboard')->with('success','Password berhasil diubah');
                }
                return back()->with('error','Password baru anda tidak cocok');
            }
            return back()->with('error','Password yang anda masukkan salah');
        }
    }
}
