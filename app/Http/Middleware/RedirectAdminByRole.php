<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectAdminByRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if ($user->roles()->whereIn('name', [
            'developer', 'admin', 'virtual-assistant'
        ])->exists()) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.forum');
    }
}
