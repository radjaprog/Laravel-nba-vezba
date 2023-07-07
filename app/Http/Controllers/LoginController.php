<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getLoginView()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        // $validated = [
        //    'email' => 'blabla'
        //    'password' => '123'
        //]

        // $validated['email'] vraca 'blabla'

        $user = User::query()
            ->where('email', $credentials['email'])
            ->first();
        // select * from users where email = ?

        // ako nije verifikovan
        if (!$user->is_verified) {
            // posalji error da nije verifikovan
            return view('auth.verification_email_sent', compact('user'));
        }

        // ako jeste, uloguj ga i posalji na / rutu

        auth()->attempt($credentials);

        return redirect('/');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('login');
    }
}
