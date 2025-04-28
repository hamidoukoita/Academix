<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Http\RedirectResponse;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request): RedirectResponse
    {
        $user = Auth::user();

        switch ($user->role) {
            case 'admin':
                return redirect('/admin');
            case 'enseignant':
                return redirect('/enseignant');
            case 'etudiant':
            default:
                return redirect('/etudiant');
        }
    }
}
