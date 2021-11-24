<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountSettingController extends Controller
{
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();
        return view('panel.account-setting', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $password = $user->password;

        if ($request->password) {
            $password = Hash::make($request->password);
        }

        $user->update([
            'name' => $request->name,
            'password' => $password
        ]);

        return redirect()->back()->with('success', 'Account updated successfully');
    }
}
