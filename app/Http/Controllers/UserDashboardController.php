<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
    // Ensure the user is authenticated
    if (auth()->check()) 
    {
        $user = auth()->user();
        
        // Additional user details can be fetched here if needed
        $userDetails = [
            'name' => $user->name,
            'email' => $user->email,
            'created_at' => $user->created_at->format('d M Y'),
            'role' => $user->roles,
            'last_login' => $user->last_login ? $user->last_login->format('d M Y H:i') : 'Never'
        ];
       $settings = Setting::first();
        return view('user.dashboard', compact('userDetails','settings'));
    } 
    else {
        // Redirect to login if the user is not authenticated
        return redirect()->route('login')->with('error', 'You must be logged in to access the dashboard.');
    }
    }
}
