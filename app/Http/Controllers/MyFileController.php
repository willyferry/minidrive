<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MyFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myFiles = File::where('user_id', auth()->user()->id)->get();
        return view('panel.my-files.index', compact('myFiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.my-files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'type' => 'required',
            'file' => 'required|max:2048',
        ]);

        $file_url = Str::random(40) . '.' . $request->file->getClientOriginalExtension();
        $request->file->storeAs('files', $file_url);

        File::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name) . '-' . Str::random(5),
            'file_url' => $file_url,
            'description' => $request->description,
            'is_public' => $request->type === 'public' ? true : false,
            'user_id' => auth()->user()->id,
            'password' => $request->password
        ]);

        return redirect()->route('my-files.index')->with('success', 'File uploaded successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $myFile = File::where('user_id', auth()->user()->id)->where('id', $id)->firstOrFail();
        return view('panel.my-files.edit', compact('myFile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $myFile = File::where('user_id', auth()->user()->id)->where('id', $id)->firstOrFail();
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:files,slug,' . $myFile->id,
            'description' => 'required',
            'type' => 'required',
        ]);

        $file_url = $myFile->file_url;

        if ($request->hasFile('file')) {
            Storage::delete('files/' . $myFile->file_url);
            $file_url = Str::random(40) . '.' . $request->file->getClientOriginalExtension();
            $request->file->storeAs('files', $file_url);
        }

        $myFile->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'file_url' => $file_url,
            'description' => $request->description,
            'is_public' => $request->type === 'public' ? true : false,
            'user_id' => auth()->user()->id,
            'password' => $request->password
        ]);

        return redirect()->back()->with('success', 'File updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $myFile = File::where('user_id', auth()->user()->id)->where('id', $id)->firstOrFail();
        Storage::delete('files/' . $myFile->file_url);
        $myFile->delete();

        return redirect()->back()->with('success', 'File deleted successfully');
    }
}
