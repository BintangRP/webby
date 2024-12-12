<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(ProfileUpdateRequest $request)
    {
        $user = Auth::user();

        if ($request->email !== $user->email) {
            $user->email = $request->email;
        }

        if ($request->name !== $user->name) {
            $user->name = $request->name;
        }

        if ($request->filled('current_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
            }

            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('status', 'profile-updated');
    }
}
