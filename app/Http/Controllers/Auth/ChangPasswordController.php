<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class ChangPasswordController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function changePassword(Request $request)
    {
        return view("auth.changePassword");
    }

    public function updatePassword(Request $request)
    {
        $data = $request->validate([
            'oldPassword' => 'min:8|required',
            // 'newPassword' => 'min:8|required_with:newPassword_confirm|same:newPassword_confirm',
            // 'newPassword' => 'min:8|required_with:newPassword_confirm|different:oldPassword|same:newPassword_confirm',
            'newPassword' => 'min:8|required_with:newPassword_confirm|differant:oldPassword|same:newPassword_confirm',
            'newPassword_confirm' => 'min:8|required'
        ]);

        $hashedPassword = Auth::user()->password;
        $userId = Auth::user()->id;

        if (\Hash::check($data['oldPassword'], $hashedPassword)) {

            User::where('id', $userId)->update([
                'password' => Hash::make($data['newPassword']),
                'updated_at' => now()
            ]);

            Auth::logout();
            return redirect('login');

        } else {
            return back()->withErrors([
                'oldPassword' => 'Password is not match Data.',
            ]);
        }
    }

}
