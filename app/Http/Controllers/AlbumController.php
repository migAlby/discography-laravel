<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album:: orderBy('id','desc')->get();
        return view('albums.form', compact('albums'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'artist_name' => 'required|string|max:255',
            'album_name' => 'required|string|max:255',
            'release_year' => 'required|integer',
            'upload' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if($request->hasFile('upload')){
            $imagePath = $request->file('upload')->store('covers','public');
        }

        Album::create([
            'artist_name' => $validated['artist_name'],
            'album_name' => $validated['album_name'],
            'release_year' => $validated['release_year'],
            'cover_image' => $imagePath,
        ]);
        return redirect()->route('home');
    }

    public function destroy($id) {

        $album = Album::findOrFail($id);

        if($album->cover_imagine){
            Storage::disk('public')->delete($album->cover_image);
        }

        $album->delete();

        return redirect()->route('home');
    }








}
