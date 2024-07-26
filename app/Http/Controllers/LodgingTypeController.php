<?php

namespace App\Http\Controllers;

use App\Models\LodgingType;
use App\Service\ControllerSettings;
use Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use ReflectionClass;

#[ControllerSettings(model: LodgingType::class)]
class LodgingTypeController extends Controller
{
    private string $model;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    public function adminIndex(): RedirectResponse|View
    {
        if (!Auth::check() || Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }

        $lodgingTypes = $this->model::all();
        return view('lodgingType.adminIndex', compact('lodgingTypes'));
    }

    public function adminCreate(): RedirectResponse|View
    {
        if (!Auth::check() || Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }

        return view('lodgingType.adminCreate');
    }

    public function adminStore(Request $request): RedirectResponse|View
    {
        if (!Auth::check() || Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }

        $request->validate($this->model::getPropertyFormValidation());
        $lodgingType = new LodgingType();
        foreach ($this->model::getProperties() as $property) {
            $lodgingType->$property = $request->input($property);
        }
        $lodgingType->save();
        return redirect()->route('admin_lodgingType_index')->with('success', 'LodgingType created successfully.');
    }

    public function adminShow(LodgingType $lodgingType): RedirectResponse|View
    {
        if (!Auth::check() || Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }

        return view('lodgingType.adminShow', compact('lodgingType'));
    }

    public function adminEdit(LodgingType $lodgingType): RedirectResponse|View
    {
        if (!Auth::check() || Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }

        return view('lodgingType.adminEdit', compact('lodgingType'));
    }

    public function adminUpdate(Request $request, LodgingType $lodgingType): RedirectResponse|View
    {
        if (!Auth::check() || Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }

        $validated = $request->validate($this->model::getPropertyFormValidation());

        $lodgingType->update($validated);
        return redirect()->route('admin_lodgingType_index')->with('success', 'LodgingType updated successfully.');
    }

    public function adminDestroy(LodgingType $lodgingType): RedirectResponse|View
    {
        if (!Auth::check() || Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }

        $lodgingType->delete();
        return redirect()->route('admin_lodgingType_index')->with('success', 'LodgingType deleted successfully.');
    }

    private function getModel(): string
    {
        $reflection = new ReflectionClass($this);
        $attribute = $reflection->getAttributes()[0];
        return $attribute->getArguments()['model'];
    }
}

