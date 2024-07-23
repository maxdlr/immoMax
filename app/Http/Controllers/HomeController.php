<?php

namespace App\Http\Controllers;

use App\Models\Lodging;
use App\Models\LodgingType;
use Illuminate\Contracts\View\View;

class HomeController
{
    public function home(): View
    {
        $lodgings = Lodging::all();
        $lodgingTypes = LodgingType::all();

        return view('home/index', [
            'lodgings' => $lodgings,
            'lodgingTypes' => $lodgingTypes,
        ]);
    }
}
