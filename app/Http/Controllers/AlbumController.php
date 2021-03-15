<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Album;
use Carbon\Carbon;
use Storage;
use DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AlbumController extends Controller
{

    public function index()
    {
        $albums = Album::select()->paginate(12);

        return view('layouts.albums',compact('albums'));
    }

    public function create()
    {
        return view('layouts.albums.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'disc' => 'required',
            'img' => 'required'
        ]);

        $file = $request->file('img');
        $time = Carbon::Now();
        $dir = date_format($time,'Y').'/'.date_format($time,'m');
        $fileName = uniqid().'.'.$file->getClientOriginalExtension();

        $path = $file->storePublicly($dir, 's3');
        $url = Storage::disk('s3')->url($path);

        Album::create([
            'title' => $request->title,
            'disc' => $request->disc,
            'img' => $url,
        ]);

        return redirect()->route('albums.index')
        ->with('success','Album created successfully.');
    }

    public function show(Album $album)
    {
        $albums = Album::select()->get();

        return view('layouts.albums', compact('albums'));
    }

    public function edit(Album $album)
    {
        return view('layouts.albums.edit',compact('album'));
    }

    public function update(Request $request, Album $album)
    {

        $album->update([
            'title' => $request->title,
            'disc' => $request->disc,
        ]);

        if($request->file('img'))
        {
            $file = $request->file('img');
            $time = Carbon::Now();
            $dir = date_format($time,'Y').'/'.date_format($time,'m');
            $fileName = uniqid().'.'.$file->getClientOriginalExtension();

            $path = $file->storePublicly($dir, 's3');
            $url = Storage::disk('s3')->url($path);
            
            $album->img = $url;
            $album->save();
        }

        return redirect()->route('albums.index')
        ->with('success','Album updated successfully');
    }

    public function destroy(Album $album)
    {
        $file = Album::where('id',$album->id)->pluck('img');
        $file = data_get($file, '0');
        
        Storage::disk('s3')->delete($file);

        $album->delete();

        return redirect()->route('albums.index')
        ->with('success','Album deleted successfully');
    }


}
