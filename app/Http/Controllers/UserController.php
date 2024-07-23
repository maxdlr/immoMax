<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Service\ControllerSettings;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Reflection;
use ReflectionClass;

#[ControllerSettings(model: User::class)]
class UserController extends Controller
{
    private string $model;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $users = $this->model::all();
        return view('user.index', compact('users'));
    }

    public function adminIndex(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $users = $this->model::all();
        return view('user.adminIndex', compact('users'));
    }

    public function adminCreate(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('user.adminCreate');
    }

    public function adminStore(Request $request): RedirectResponse
    {
        $request->validate($this->model::getPropertyFormValidation());
        $user = new User();
        foreach ($this->model::getProperties() as $property) {
            $user->$property = $request->input($property);
        }
        $user->save();
        return redirect()->route('user.adminIndex')->with('success', 'User created successfully.');
    }

    public function adminShow(User $user): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('user.adminShow', compact('user'));
    }

    public function adminEdit(User $user): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('user.adminEdit', compact('user'));
    }

    public function adminUpdate(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'roomCount' => 'required|integer',
            'surface' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $user->update($validated);
        return redirect()->route('admin_user_adminIndex')->with('success', 'User updated successfully.');
    }

    public function adminDestroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('admin_user_adminIndex')->with('success', 'User deleted successfully.');
    }

    private function getModel(): string
    {
        $reflection = new ReflectionClass($this);
        $attribute = $reflection->getAttributes()[0];
        return $attribute->getArguments()['model'];
    }
}

