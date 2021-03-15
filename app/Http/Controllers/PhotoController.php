<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Carbon\Carbon;
use Storage;
use DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PhotoController extends Controller
{

    public function index()
    {
        return redirect()->route('albums.index');
    }

    public function create($album_id)
    {

        return view('layouts.photos.create',compact('album_id'));
    }

    public function store(Request $request)
    {
        $request->validate
        ([
            'title' => 'required',
            'disc' => 'required',
            'album_id' => 'required',
            'img' => 'required'
        ]);


        $file = $request->file('img');
        $time = Carbon::Now();
        $dir = date_format($time,'Y').'/'.date_format($time,'m');
        $fileName = uniqid().'.'.$file->getClientOriginalExtension();

        $path = $file->storePublicly($dir, 's3');
        $url = Storage::disk('s3')->url($path);

        Photo::create([
            'title' => $request->title,
            'disc' => $request->disc,
            'album_id' => $request->album_id,
            'img' => $url,
        ]);

        return redirect()->route('photos.show', [$request->album_id])
        ->with('success','Photo created successfully.');
    }

    public function show($album_id)
    {
        $photos = DB::table('photos')->where('album_id',$album_id)->get();

        return view('layouts.photos',compact('photos','album_id'));
    }

    public function edit(Photo $photo)
    {
        return view('layouts.photos.edit',compact('photo'));
    }

    public function update(Request $request, Photo $photo)
    {

        $photo->update([
            'title' => $request->title,
            'disc' => $request->disc,
        ]);;

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
        return redirect()->route('photos.show', $request->album_id)
        ->with('success','Photo updated successfully');

    }

    public function destroy(Photo $photo)
    {
        $file = Photo::where('album_id',$photo->album_id)->pluck('img');
        $file = data_get($file, '0');
        
        Storage::disk('s3')->delete($file);

        $photo->delete();

        return redirect()->back()
        ->with('success','Photo deleted successfully');
    }
}
