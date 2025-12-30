<?php
 
namespace App\Http\Controllers\Auth;
 
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\AuthUserRequest;
 
class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function index() {
        return Inertia::render('Auth/SignIn');
    }

    public function auth(AuthUserRequest $request)
    {
        if(User::where('email', $request->email)->where('active', 1)->count() <= 0) {
            return back()->withErrors([
                'email' => 'The provided email had no access on admin panel.',
            ])->onlyInput('email');
        }
        
        if (Auth::attempt($request->validated())) {
             return back()->withErrors([
                'auth' => 'The provided credentials do not match our records.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    public function deauth(Request $request) {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
 
        return redirect('/');
    }
}