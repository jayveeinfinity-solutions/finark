<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Forum\AuditLog;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuditLogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($request->isMethod('post') ||
            $request->isMethod('put') ||
            $request->isMethod('patch') ||
            $request->isMethod('delete')) {

            AuditLog::create([
                'user_id'     => Auth::id(),
                'action'      => strtoupper($request->method()) . ' ' . $request->path(),
                'entity_type' => $request->route()?->getControllerClass() ?? null,
                'entity_id'   => $request->route()?->parameter('id') ?? null,
                'old_values'  => $request->old() ?? [],
                'new_values'  => $request->all(),
                'ip_address'  => $request->ip(),
                'user_agent'  => $request->header('User-Agent'),
            ]);
        }

        return $response;
    }
}
