<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SigninController extends Controller
{
    public function getsignin()
    {
        return view('user.signin');
    }
    public function postsignin(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|min:6|confirmed',
        ], [
            'name.required' => 'Пожалуйста, укажите ваше имя.',
            'name.unique' => 'Это имя уже занято.',
            'email.required' => 'Пожалуйста, укажите вашу электронную почту.',
            'email.email' => 'Пожалуйста, укажите корректный адрес электронной почты.',
            'email.unique' => 'Этот адрес электронной почты уже занят.',
            'password.required' => 'Пожалуйста, введите пароль.',
            'password.min' => 'Пароль должен содержать не менее :min символов.',
            'password.confirmed' => 'Пароли не совпадают.',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->back();
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required', 'string'],
            'password' => ['required'],
        ], [
            'name.required' => 'Пожалуйста, укажите ваше имя.',
            'password.required' => 'Пожалуйста, введите пароль.',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'name' => 'Неверное имя пользователя или пароль.',
        ]);
    }
}
