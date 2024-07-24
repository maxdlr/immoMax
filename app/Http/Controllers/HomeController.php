<?php

namespace App\Http\Controllers;

use App\Models\Lodging;
use App\Models\LodgingType;
use App\Models\Media;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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

    public function filter(Request $request): RedirectResponse|View
    {
        $requestedLodgingTypeId = $request->get('lodgingType');
        $lodgingType = LodgingType::find($requestedLodgingTypeId);

        if ($requestedLodgingTypeId === null) {
            return redirect()->route('app_home');
        } else if ($lodgingType !== null) {
            $lodgingType = LodgingType::where(['name' => $lodgingType->name])->get()->first();
            $lodgings = $lodgingType->lodgings()->get();
            $lodgingTypes = LodgingType::all();
            $headerMedia = Media::where('type', null)->get()->first();

            return view('home/index', [
                'lodgings' => $lodgings,
                'lodgingTypes' => $lodgingTypes,
                'headerMedia' => $headerMedia,
                'currentLodgingType' => $lodgingType
            ]);
        }
    }
}
