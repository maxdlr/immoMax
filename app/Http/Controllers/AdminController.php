<?php

namespace App\Http\Controllers;

use App\Models\Lodging;
use App\Models\Media;
use App\Models\User;
use Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    public function dashboard(): View|RedirectResponse
    {
        if (Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }
        $lodgings = Lodging::all();
        $users = User::all();
        $media = Media::all();

        return view('admin/dashboard', [
            'lodgings' => $lodgings,
            'users' => $users,
            'media' => $media,
        ]);
    }
}
