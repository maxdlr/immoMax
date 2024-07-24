<?php

namespace App\Http\Controllers;

use App\Models\Lodging;
use App\Models\LodgingType;
use App\Models\User;
use Illuminate\Contracts\View\View;

class AdminController
{
    public function dashboard(): View
    {
        $lodgings = Lodging::all();
        $users = User::all();

        return view('admin/dashboard', [
            'lodgings' => $lodgings,
            'users' => $users,
        ]);
    }
}
