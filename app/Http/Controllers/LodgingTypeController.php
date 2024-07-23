<?php

namespace App\Http\Controllers;

use App\Models\LodgingType;
use App\Service\ControllerSettings;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Reflection;
use ReflectionClass;

#[ControllerSettings(model: LodgingType::class)]
class LodgingTypeController extends Controller
{
    private string $model;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    public function adminIndex(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $lodgingTypes = $this->model::all();
        return view('lodgingType.adminIndex', compact('lodgingTypes'));
    }

    public function adminCreate(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('lodgingType.adminCreate');
    }

    public function adminStore(Request $request): RedirectResponse
    {
        $request->validate($this->model::getPropertyFormValidation());
        $lodgingType = new LodgingType();
        foreach ($this->model::getProperties() as $property) {
            $lodgingType->$property = $request->input($property);
        }
        $lodgingType->save();
        return redirect()->route('admin_lodgingType_index')->with('success', 'LodgingType created successfully.');
    }

    public function adminShow(LodgingType $lodgingType): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('lodgingType.adminShow', compact('lodgingType'));
    }

    public function adminEdit(LodgingType $lodgingType): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('lodgingType.adminEdit', compact('lodgingType'));
    }

    public function adminUpdate(Request $request, LodgingType $lodgingType): RedirectResponse
    {
        $validated = $request->validate($this->model::getPropertyFormValidation());

        $lodgingType->update($validated);
        return redirect()->route('admin_lodgingType_index')->with('success', 'LodgingType updated successfully.');
    }

    public function adminDestroy(LodgingType $lodgingType): RedirectResponse
    {
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

