<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assets = Asset::all();
        return view('asset.index', array(
            'assets' => $assets
        )); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        echo "vista create";
        return view('asset.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        echo "Empieza a trabajar en el store.";
        $request->validate([
            'title' => 'required|string|max:255',
            /*'video_path' => 'required|mimes:mp4,mov,avi,wmv|max:102400', // 100MB límite*/
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB límite
        ]);

        // Guardar miniatura
        $imagePath = $request->file('image')->store('thumbnails', 'public');

        // Guardar video
        //$videoPath = $request->file('video_path')->store('videos', 'public');
        $videoPath = "nonewe";

        // Guardar en la base de datos
        Asset::create([
            'title' => $request->title,
            'video_path' => $videoPath,
            'image' => $imagePath,
        ]);

        return redirect()->route('asset.index')->with('success', 'Video subido correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getImage($filename)
    {
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }
    public function getVideo($filename)
    {
        $file = Storage::disk('videos')->get($filename);
        return new Response($file, 200);
    }

}
