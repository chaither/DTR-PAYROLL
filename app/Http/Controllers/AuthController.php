<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        
        // Validate admin credentials from config
        if ($username === $adminUsername && $password === $adminPassword) {
            // Store user session
            Session::put('user', [
                'username' => $username,
                'role' => config('admin.role'),
                'name' => $adminName
            ]);

            return redirect()->route('dashboard');
        }

        // Fallback: try database-backed authentication (email as username)
        $user = User::where('email', $username)->first();
        if ($user && Hash::check($password, $user->password)) {
            // Determine role: if this user's email matches the configured admin username/email, treat as admin
            $role = ($username === $adminUsername) ? config('admin.role') : 'user';

            Session::put('user', [
                'username' => $user->email,
                'role' => $role,
                'name' => $user->name,
                'id' => $user->id,
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
