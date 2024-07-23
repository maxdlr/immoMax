<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Service\ControllerSettings;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ReflectionClass;

#[ControllerSettings(model: Media::class)]
class MediaController extends Controller
{
    private string $model;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    public function adminIndex(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $media = $this->model::all();
        return view('media.adminIndex', compact('media'));
    }

    public function adminCreate(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $media = Media::all();

        return view('media.adminCreate', compact('media'));
    }

    public function adminStore(Request $request): RedirectResponse
    {
        if ($request->hasFile('media') && $request->file('media')->isValid()) {
            $newMedia = $request->file('media');
            $newPath = $newMedia->store('images');
            $newSize = $newMedia->getSize();
            $newAlt = fake()->word();

            $media = new Media();
            $media->path = 'storage/' . $newPath;
            $media->size = $newSize;
            $media->alt = $newAlt;
            $media->save();
            return redirect()->route('admin_media_index')->with('success', 'Media created successfully.');
        }

        return redirect()->refresh()->with('error', 'Media not created.');
    }

    public function adminShow(Media $media): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('media.adminShow', compact('media'));
    }

    public function adminEdit(Media $media): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('media.adminEdit', compact('media'));
    }

    public function adminUpdate(Request $request, Media $media): RedirectResponse
    {
        try {
            if ($request->hasFile('media') && $request->file('media')->isValid()) {
                $newMedia = $request->file('media');
                $newPath = $newMedia->store('images');
                $newSize = $newMedia->getSize();
                $newAlt = fake()->word();

                $media->path = Storage::url($newPath);
                $media->size = $newSize;
                $media->alt = $newAlt;
                $media->update();
                return redirect()->route('admin_media_index')->with('success', 'Media created successfully.');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return redirect()->route('admin_media_index');
    }

    public function adminDestroy(Media $media): RedirectResponse
    {
        $media->delete();
        return redirect()->route('admin_media_index')->with('success', 'Media deleted successfully.');
    }

    private function getModel(): string
    {
        $reflection = new ReflectionClass($this);
        $attribute = $reflection->getAttributes()[0];
        return $attribute->getArguments()['model'];
    }
}

