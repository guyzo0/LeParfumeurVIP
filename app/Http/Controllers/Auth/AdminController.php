<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response as Status;

class AdminController extends Controller
{

    use AuthenticatesUsers;

    public function show()
    {
        return view('admin_login');
    }

    public function index() 
    {
        return view('auth.admin');
    }

    public function login(Request $request)
    {

        $credentials = $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($credential->fails()) {
            return redirect('admin_login')->with('error', 'email ou mot de passe incorrect');
        }

        if (Auth::Attempt($credentials)) {

            return redirect('admin')
        }

        return redirect('admin_login')->with('error', 'email ou mot de passe incorrect');
    }

    public function logout()
    {

        Session::flush();
        
        Auth::logout();

        return redirect('admin_login');
    
    }
}