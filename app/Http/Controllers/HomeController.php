<?php

namespace App\Http\Controllers;

use App\Models\Lodging;
use App\Models\LodgingType;
use App\Models\Media;
use Illuminate\Contracts\View\View;

class HomeController
{
    public function home(): View
    {
        $lodgings = Lodging::all();
        $lodgingTypes = LodgingType::all();
        $headerMedia = Media::where('type', null)->get()->first();

        return view('home/index', [
            'lodgings' => $lodgings,
            'lodgingTypes' => $lodgingTypes,
            'headerMedia' => $headerMedia
        ]);
    }
}
