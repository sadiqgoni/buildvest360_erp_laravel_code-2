<?php

namespace App\Http\Responses;

use Filament\Auth\Http\Responses\Contracts\LoginResponse as LoginResponseContract;
use Filament\Facades\Filament;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request): RedirectResponse | Redirector
    {
        $user = Filament::auth()->user();

        if ($user?->role === 'admin') {
            return redirect()->route('filament.admin.pages.dashboard');
        }

        if ($user?->role === 'client' && filled($user->client_id)) {
            return redirect()->route('filament.client.pages.dashboard');
        }

        return redirect()->intended(Filament::getUrl());
    }
}
