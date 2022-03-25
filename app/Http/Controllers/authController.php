<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class authController extends Controller
{
    public function index()
    {
        $data = [
            'title' => "Login Hospital App"
        ];
        return view("user.auth.login", $data);
    }

    public function join()
    {
        $data = [
            'title' => "Daftar Hospital App"
        ];

        return view("user.auth.daftar", $data);
    }

    public function handle_daftar(Request $request)
    {
        $this->validate($request, [
            'email'   => ['required', 'string', 'max:100', 'email', 'unique:users'],
            'fullname'    => ['required', 'string', 'max:100'],
            'password' => ['required', 'min:8'],
            'konfirmasi' => ['required', 'min:8', 'required_with:konfirmasi', 'same:konfirmasi']
        ]);
        $save =  $this->create($request->all());
        event(new Registered($save));
        Auth::loginUsingId($save->id_user);
        return redirect("/");
    }

    public function create($data)
    {
        return User::create([
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'fullname'     => $data['fullname']
        ]);
    }

    public function handle_login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')
                ->withSuccess('Kamu Berhasil Masuk');
        }
        return redirect("login")->withError('Maaf! email atau password salah');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
