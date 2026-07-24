<?php

namespace App\Http\Controllers;

use App\Models\LogUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'userid' => 'required|string|max:15',
            'password' => 'required|string',
        ]);

        $user = User::where('userid', $request->userid)->first();

        if (!$user || !Hash::check($request->password, $user->userpswd)) {
            // Log failed attempt
            $this->logAttempt($request->userid, $request, 'failed');

            return back()
                ->withInput($request->only('userid'))
                ->withErrors(['userid' => 'User ID atau password salah.']);
        }

        // Login user
        Auth::login($user);
        $request->session()->regenerate();
        $request->session()->put('last_activity', now()->timestamp);

        // Log success
        $this->logAttempt($request->userid, $request, 'success');

        return redirect()->intended(route('dashboard'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /**
     * Log login attempt to loguser table.
     */
    private function logAttempt(string $userid, Request $request, string $status): void
    {
        LogUser::create([
            'userid' => $userid,
            'ip_address' => $request->ip(),
            'status' => $status,
            'user_agent' => substr($request->userAgent() ?? '', 0, 255),
            'login_at' => now(),
        ]);
    }
}
