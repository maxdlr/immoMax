<?php

namespace App\Http\Controllers;

use App\Models\Lodging;
use App\Models\LodgingType;
use Illuminate\Contracts\View\View;

class AdminController
{
    public function dashboard(): View
    {
        $lodgings = Lodging::all();
        $lodgingTypes = LodgingType::all();

        return view('admin/dashboard', [
            'lodgings' => $lodgings,
            'lodgingTypes' => $lodgingTypes,
        ]);
    }
}
