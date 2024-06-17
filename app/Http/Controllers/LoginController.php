<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function add(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if (
            Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ], $request->input('remember'))
        ) {

            return redirect()->route('DoNoiThat.index');
        }

        Session::flash('error', 'Email hoặc Password không đúng');
        return redirect()->back();
    }
    public function register(Request $request)
    {
        // Set the Quyen property for the new user
        $user = $request->only(['name', 'email']);


        $user['role'] = $request->input('role', 0);
        $pass = $request->input('password');
        $user['password'] = bcrypt($pass);
        $user['created_at'] = date("Y-m-d");


        // Create a new user
        Users::create($user);

        return redirect()->back();
    }
}