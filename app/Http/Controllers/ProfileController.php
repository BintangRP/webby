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

        $data = [];

        if ($request->email !== $user->email) {
            $data['email'] = $request->email;
        }

        if ($request->name !== $user->name) {
            $data['name'] = $request->name;
        }

        if ($request->filled('current_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
            }

            $data['password'] = Hash::make($request->password);
        }

        if (!empty($data)) {
            $user->update($data);
        }

        return back()->with('status', 'profile-updated');
    }
}
