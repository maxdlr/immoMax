<?php

namespace App\Http\Controllers;

use App\Models\Lodging;
use App\Models\LodgingType;
use App\Service\ControllerSettings;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Reflection;
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

    public function adminIndex(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $lodgings = $this->model::all();
        return view('lodging.adminIndex', compact('lodgings'));
    }

    public function adminCreate(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $lodgingTypes = LodgingType::all();

        return view('lodging.adminCreate', compact('lodgingTypes'));
    }

    public function adminStore(Request $request): RedirectResponse
    {
        $request->validate($this->model::getPropertyFormValidation());
        $lodging = new Lodging();
        foreach ($this->model::getProperties() as $property) {
            $lodging->$property = $request->input($property);
        }
        $lodging->save();
        return redirect()->route('admin_lodging_index')->with('success', 'Lodging created successfully.');
    }

    public function adminShow(Lodging $lodging): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('lodging.adminShow', compact('lodging'));
    }

    public function show(Lodging $lodging): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('lodging.show', compact('lodging'));
    }

    public function adminEdit(Lodging $lodging): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $lodgingTypes = LodgingType::all();

        return view('lodging.adminEdit', compact('lodging', ['lodgingTypes']));
    }

    public function adminUpdate(Request $request, Lodging $lodging): RedirectResponse
    {
        $validated = $request->validate($this->model::getPropertyFormValidation());

        $lodging->update($validated);
        return redirect()->route('admin_lodging_index')->with('success', 'Lodging updated successfully.');
    }

    public function adminDestroy(Lodging $lodging): RedirectResponse
    {
        $lodging->delete();
        return redirect()->route('admin_lodging_index')->with('success', 'Lodging deleted successfully.');
    }

    private function getModel(): string
    {
        $reflection = new ReflectionClass($this);
        $attribute = $reflection->getAttributes()[0];
        return $attribute->getArguments()['model'];
    }
}

