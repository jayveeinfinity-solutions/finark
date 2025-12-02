<?php

namespace App\Http\Middleware;

use Inertia\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'auth' => Auth::user() ? [
                'user' => [
                    'id' => Auth::user()->id,
                    'name' => Auth::user()->name,
                    'roles' => [
                        'id' => Auth::user()->roles[0]->id,
                        'name' => Auth::user()->roles[0]->name
                    ]
                ]
            ] : NULL,
            'r2Endpoint' => config('r2.endpoint')
        ];
    }
}
