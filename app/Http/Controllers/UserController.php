<?php

namespace App\Http\Controllers;

use App\Models\Lodging;
use App\Models\Role;
use App\Models\User;
use App\Service\ControllerSettings;
use Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use ReflectionClass;

#[ControllerSettings(model: User::class)]
class UserController extends Controller
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

        $users = $this->model::all();
        return view('user.adminIndex', compact('users'));
    }

    public function adminCreate(): RedirectResponse|View
    {
        if (!Auth::check() || Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }

        return view('user.adminCreate');
    }

    public function adminStore(Request $request): RedirectResponse
    {
        if (!Auth::check() || Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }

        $request->validate($this->model::getPropertyFormValidation());
        $user = new User();
        foreach ($this->model::getProperties() as $property) {
            $user->$property = $request->input($property);
        }
        $user->save();
        return redirect()->route('user.adminIndex')->with('success', 'User created successfully.');
    }

    public function adminShow(User $user): RedirectResponse|View
    {
        if (!Auth::check() || Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }

        return view('user.adminShow', compact('user'));
    }

    public function adminEdit(User $user): RedirectResponse|View
    {
        if (!Auth::check() || Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }

        $roles = Role::all();

        return view('user.adminEdit', compact('user', ['roles']));
    }

    public function adminUpdate(Request $request, User $user): RedirectResponse
    {
        if (!Auth::check() || Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }

        $inputRole = $request->input('role');

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:100',
        ]);

        $user->roles()->detach(Role::where('id', '!=', $inputRole)->get());
        $user->roles()->attach(Role::where(['id' => $inputRole])->get());
        $user->update($validated);
        return redirect()->route('admin_user_show', $user)->with('success', 'User updated successfully.');
    }

    public function adminDestroy(User $user): RedirectResponse
    {
        if (!Auth::check() || Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }

        $user->delete();
        return redirect()->route('admin_user_index')->with('success', 'User deleted successfully.');
    }

    public function addLodgingToFavorites(User $user, Lodging $lodging, Request $request): RedirectResponse
    {
        if ($user->lodgings()->where(['id' => $lodging->id])->exists()) {
            $user->lodgings()->detach($lodging);
            $message = 'Lodging removed from favorites successfully';
        } else {
            $user->lodgings()->attach($lodging);
            $message = 'Lodging added to favorites successfully';
        }

        return redirect()->back()->with('success', $message);
    }

    private function getModel(): string
    {
        $reflection = new ReflectionClass($this);
        $attribute = $reflection->getAttributes()[0];
        return $attribute->getArguments()['model'];
    }
}

