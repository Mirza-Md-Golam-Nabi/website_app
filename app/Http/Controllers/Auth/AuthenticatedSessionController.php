<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return $this->redirectToSoftwareApp();
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $token = $this->token();

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $this->logoutFromAnotherApps($token);
    }

    public function token()
    {
        $user = auth()->user();

        return encrypt(json_encode([
            'email' => $user->email,
        ]));
    }

    public function redirectToSoftwareApp()
    {
        return redirect('http://127.0.0.1:8002/auto-login?token=' . urlencode($this->token()));
    }

    public function logoutFromAnotherApps($token)
    {
        return redirect()->away('http://127.0.0.1:8002/remote-logout?token=' . urlencode($token));
    }
}
