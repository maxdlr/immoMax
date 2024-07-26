<?php

namespace App\Service;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class SecurityManager
{
    public static function redirectIfNotAdmin(): RedirectResponse|true
    {
        if (!Auth::check() || Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }
        return true;
    }
}
