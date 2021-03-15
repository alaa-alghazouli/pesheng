<?php

namespace App\Http\Controllers;

use App\Models\subWork;
use Carbon\Carbon;
use Storage;
use DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SubWorkController extends Controller
{

    public function index()
    {
        return redirect()->route('works.index');
    }

    public function create($work_id)
    {

        return view('layouts.subWorks.create',compact('work_id'));
    }

    public function store(Request $request)
    {
        $request->validate
        ([
            'img' => 'required'
        ]);


        $file = $request->file('img');
        $time = Carbon::Now();
        $dir = date_format($time,'Y').'/'.date_format($time,'m');
        $fileName = uniqid().'.'.$file->getClientOriginalExtension();

        $path = $file->storePublicly($dir, 's3');
        $url = Storage::disk('s3')->url($path);

        SubWork::create([
            'title' => $request->title,
            'disc' => $request->disc,
            'work_id' => $request->work_id,
            'img' => $url,
        ]);

        return redirect()->route('subWorks.show', [$request->work_id])
        ->with('success','Article created successfully.');
    }

    public function show($work_id)
    {
        $subWorks = DB::table('sub_works')->where('work_id','=',$work_id)->get();

        $vid = DB::table('sub_works')->where('work_id',$work_id)->get()->take(1);

        return view('layouts.subWorks',compact('subWorks','work_id','vid'));
    }

    public function edit(SubWork $subWork)
    {
        return view('layouts.subWorks.edit',compact('subWork'));
    }

    public function update(Request $request, SubWork $subWork)
    {

        $subWork->update([
            'title' => $request->title,
            'disc' => $request->disc,
            'vid' => $request->vid,
        ]);;

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
        return redirect()->route('subWorks.show', $request->work_id)
        ->with('success','Article updated successfully');

    }

    public function destroy(SubWork $subWork)
    {
        $file = SubWork::where('work_id',$subWork->work_id)->pluck('img');
        $file = data_get($file, '0');
        
        Storage::disk('s3')->delete($file);

        $subWork->delete();

        return redirect()->back()
        ->with('success','Article deleted successfully');
    }
}
