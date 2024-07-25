<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Service\ControllerSettings;
use Auth;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ReflectionClass;

#[ControllerSettings(model: Media::class)]
class MediaController extends Controller
{
    private string $model;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    public function adminIndex(): RedirectResponse|View
    {
        if (Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }

        $media = $this->model::all();
        return view('media.adminIndex', compact('media'));
    }

    public function adminCreate(): RedirectResponse|View
    {
        if (Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }

        $media = Media::all();

        return view('media.adminCreate', compact('media'));
    }

    public function adminStore(Request $request): RedirectResponse
    {
        if (Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }

        if ($request->hasFile('media') && $request->file('media')->isValid()) {
            $newMedia = $request->file('media');
            $newPath = $newMedia->store('public/images');
            $newSize = $newMedia->getSize();
            $newAlt = fake()->words(3, true);

            $media = new Media();
            $media->path = Storage::url($newPath);
            $media->size = $newSize;
            $media->alt = $newAlt;
            $media->save();
            return redirect()->route('admin_media_edit', $media)->with('success', 'Media created successfully.');
        }

        return redirect()->route('admin_media_create')->with('error', 'Media not created.');
    }

    public function adminShow(Media $media): RedirectResponse|View
    {
        if (Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }

        return view('media.adminShow', compact('media'));
    }

    public function adminEdit(Media $media): RedirectResponse|View
    {
        if (Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }

        return view('media.adminEdit', compact('media'));
    }

    public function adminUpdate(Request $request, Media $media): RedirectResponse
    {
        if (Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }

        try {
            if ($request->hasFile('media') && $request->file('media')->isValid()) {
                $newMedia = $request->file('media');
                $newPath = $newMedia->store('public/images');
                $newSize = $newMedia->getSize();
                $newAlt = fake()->words(3, true);

                $media->path = Storage::url($newPath);
                $media->size = $newSize;
                $media->alt = $newAlt;
                $media->update();
                return redirect()->route('admin_media_edit', $media)->with('success', 'Media created successfully.');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
        return redirect()->route('admin_media_edit', $media)->with('error', 'Media not created.');
    }

    public function adminDestroy(Media $media, Request $request): RedirectResponse
    {
        if (Auth::user()->roles()->get()->first()->name !== 'ADMIN') {
            return redirect()->route('app_home')->with('error', "Can't go there, admins only");
        }

        $media->delete();

        if (Str::contains($request->headers->get('referer'), ['lodging', 'show'], true)) {
            return redirect()->back()->with('success', 'Media deleted from lodging successfully');
        }

        return redirect()->route('admin_media_index')->with('success', 'Media deleted successfully.');
    }

    private function getModel(): string
    {
        $reflection = new ReflectionClass($this);
        $attribute = $reflection->getAttributes()[0];
        return $attribute->getArguments()['model'];
    }
}

