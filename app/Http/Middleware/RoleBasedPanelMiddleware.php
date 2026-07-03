<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleBasedPanelMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user) {
            return $next($request);
        }

        $panelId = Filament::getCurrentPanel()?->getId();

        if (! $panelId) {
            return $next($request);
        }

        if ($user->role === 'admin' && $panelId !== 'admin') {
            return redirect()->route('filament.admin.pages.dashboard');
        }

        if ($user->role === 'client' && $panelId !== 'client') {
            return redirect()->route('filament.client.pages.dashboard');
        }

        return $next($request);
    }
}
