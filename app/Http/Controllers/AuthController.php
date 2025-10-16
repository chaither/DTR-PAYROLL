<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('welcome');
    }
    
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        
        // Get admin credentials from config
        $adminUsername = config('admin.username');
        $adminPassword = config('admin.password');
        $adminName = config('admin.name');
        
        // Validate admin credentials
        if ($username === $adminUsername && $password === $adminPassword) {
            // Store user session
            Session::put('user', [
                'username' => $username,
                'role' => config('admin.role'),
                'name' => $adminName
            ]);
            
            return redirect()->route('dashboard');
        }
        
        return redirect()->back()->withErrors([
            'login' => 'Invalid credentials. Please check your username and password.'
        ])->withInput($request->only('username'));
    }
    
    public function dashboard()
    {
        // Check if user is logged in
        if (!Session::has('user')) {
            return redirect()->route('login');
        }
        
        return view('dashboard');
    }
    
    public function logout()
    {
        Session::forget('user');
        return redirect()->route('login');
    }
}
