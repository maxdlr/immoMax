<?php

namespace App\Http\Controllers;

use App\Models\City;
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
        $cities = City::all();
        $headerMedia = Media::where('type', null)->get()->first();

        return view('home/index', [
            'lodgings' => $lodgings,
            'lodgingTypes' => $lodgingTypes,
            'cities' => $cities,
            'headerMedia' => $headerMedia
        ]);
    }

    public function filter(Request $request): RedirectResponse|View
    {
        $lodgingTypes = LodgingType::all();
        $cities = City::all();
        $headerMedia = Media::where('type', null)->get()->first();

        $inputs = array_diff_key($request->input(), ['_token' => '']);
        $isFilteredVoter = [];
        $filterObjects = [];
        $allLodgings = Lodging::all();

        foreach ($inputs as $key => $input) {
            $isFilteredVoter[] = $input !== null;
            $filterFQCN = 'App\Models\\' . ucfirst($key);
            $filterObject = $filterFQCN::find($input);

            if ($filterObject !== null) {
                $filterObjects[$key] = $filterObject;
            }
        }

        $lodgings = $allLodgings->filter(function (Lodging $lodging) use ($filterObjects) {
            $matchVoter = [];
            foreach ($filterObjects as $key => $filterObject) {
                $matchVoter[] = $lodging->$key()->get()->contains($filterObject);
            }
            return !in_array(false, $matchVoter);
        });

        if (!in_array(true, $isFilteredVoter)) {
            return redirect()->route('app_home');
        }

        return view('home/index', [
            'lodgings' => $lodgings,
            'lodgingTypes' => $lodgingTypes,
            'cities' => $cities,
            'headerMedia' => $headerMedia,
            'currentFilters' => $filterObjects,
            'isFiltered' => in_array(true, $isFilteredVoter)
        ]);
    }
}
