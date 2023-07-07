<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Mail\UserVerificationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function getRegisterView()
    {
        return view('auth.register');
    }

    public function verify($id)
    {

        User::where('id', $id)->update(['is_verified' => true]);
        // User::find($id) !== User::where('id', $id)


        // $user = User::findOrFail($id);
        // $user->is_verified = true;
        // $user->save();

        return redirect('login');
    }

    public function store(CreateUserRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password'])
        ]);

        $this->sendVerificationEmail($user);

        return view('auth.verification_email_sent', compact('user'));
    }

    public function sendVerificationEmail(User $user)
    {
        Mail::to($user)->send(new UserVerificationMail($user));
    }

    public function ResendVerificationEmail(User $user)
    {
        $this->sendVerificationEmail($user);

        return view('auth.verification_email_sent', compact('user'));
    }
}
