<?php

namespace App\Http\Controllers\Intranet;

use Inertia\Inertia;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        Inertia::setRootView('intranet');
        return Inertia::render('Intranet/Dashboard', [
            'header' => 'Dashboard'
        ]);
    }
}
