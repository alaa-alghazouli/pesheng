<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Carbon\Carbon;
use Storage;
use DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class WorkController extends Controller
{

    public function index()
    {
        $works = Work::select()->paginate(12);

        return view('layouts.works',compact('works'));
    }

    public function create()
    {
        return view('layouts.works.create');
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

        Work::create([
            'title' => $request->title,
            'disc' => $request->disc,
            'img' => $url,
        ]);

        return redirect()->route('works.index')
        ->with('success','Article created successfully.');
    }

    public function show(Work $work)
    {
        $works = Work::select()->get();

        return view('layouts.works', compact('works'));
    }

    public function edit(Work $work)
    {
        return view('layouts.works.edit',compact('work'));
    }

    public function update(Request $request, Work $work)
    {

        $work->update([
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

            $work->img = $url;
            $work->save();
        }

        return redirect()->route('works.index')
        ->with('success','Article updated successfully');
    }

    public function destroy(Work $work)
    {
        $file = Work::where('id',$work->id)->pluck('img');
        $file = data_get($file, '0');
        
        Storage::disk('s3')->delete($file);

        $work->delete();

        return redirect()->route('works.index')
        ->with('success','Article deleted successfully');
    }


}
