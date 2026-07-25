<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionTimeout
{
    /**
     * Session timeout in minutes.
     */
    protected int $timeout = 30;

    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $lastActivity = $request->session()->get('last_activity');

        if ($lastActivity && (now()->timestamp - $lastActivity) > ($this->timeout * 60)) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')
                ->withErrors(['userid' => 'Sesi berakhir karena tidak aktif selama 30 menit.']);
        }

        // Update last activity
        $request->session()->put('last_activity', now()->timestamp);

        return $next($request);
    }
}
