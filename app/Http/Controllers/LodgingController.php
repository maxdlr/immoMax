<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Lodging;
use App\Models\LodgingType;
use App\Models\Media;
use App\Service\ControllerSettings;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ReflectionClass;

#[ControllerSettings(model: Lodging::class)]
class LodgingController extends Controller
{
    private string $model;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $lodgings = $this->model::all();
        return view('lodging.index', compact('lodgings'));
    }

    public function adminIndex(): RedirectResponse|View
    {
        if (Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }
        $lodgings = $this->model::all();
        return view('lodging.adminIndex', compact('lodgings'));
    }

    public function adminCreate(): RedirectResponse|View
    {
        if (Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }

        $lodgingTypes = LodgingType::all();
        $cities = City::all();
        $transactionTypes = City::all();

        return view('lodging.adminCreate', compact('lodgingTypes', ['cities', 'transactionTypes']));
    }

    public function adminStore(Request $request): RedirectResponse
    {
        if (Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }

        $request->validate($this->model::getPropertyFormValidation());
        $lodging = new Lodging();
        foreach ($this->model::getProperties() as $property) {
            $lodging->$property = $request->input($property);
        }
        $lodging->save();

        $this->uploadLodgingMedia($request, $lodging);

        return redirect()->route('admin_lodging_show', $lodging)->with('success', 'Lodging created successfully.');
    }

    public function adminShow(Lodging $lodging): RedirectResponse|View
    {
        if (Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }

        return view('lodging.adminShow', compact('lodging'));
    }

    public function show(Lodging $lodging): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('lodging.show', compact('lodging'));
    }

    public function adminEdit(Lodging $lodging): RedirectResponse|View
    {
        if (Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }

        $lodgingTypes = LodgingType::all();
        $cities = City::all();
        $transactionTypes = City::all();

        return view('lodging.adminEdit', compact('lodging', ['lodgingTypes', 'cities', 'transactionTypes']));
    }

    public function adminUpdate(Request $request, Lodging $lodging): RedirectResponse
    {
        if (Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }

        $validated = $request->validate($this->model::getPropertyFormValidation());

        $lodging->update($validated);

        $this->uploadLodgingMedia($request, $lodging);

        return redirect()->route('admin_lodging_show', $lodging)->with('success', 'Lodging updated successfully.');
    }

    public function adminDestroy(Lodging $lodging): RedirectResponse
    {
        if (Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }

        if (Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }

        $lodging->delete();
        return redirect()->route('admin_lodging_index')->with('success', 'Lodging deleted successfully.');
    }

    private function getModel(): string
    {
        $reflection = new ReflectionClass($this);
        $attribute = $reflection->getAttributes()[0];
        return $attribute->getArguments()['model'];
    }

    /**
     * @param Request $request
     * @param Lodging $lodging
     * @return void
     */
    private function uploadLodgingMedia(Request $request, Lodging $lodging): void
    {
        if ($request->hasFile('medias')) {
            $uploadedMedias = $request->file('medias');

            foreach ($uploadedMedias as $uploadedMedia) {
                if ($uploadedMedia->isValid()) {
                    $newPath = $uploadedMedia->store('public/images');
                    $newSize = $uploadedMedia->getSize();
                    $newAlt = 'image of lodging ' . $lodging->title;

                    $media = new Media();
                    $media->path = Storage::url($newPath);
                    $media->size = $newSize;
                    $media->alt = $newAlt;
                    $media->type = 'LODGING';
                    $media->lodging()->associate($lodging);
                    $media->save();
                }
            }
        }
    }
}

