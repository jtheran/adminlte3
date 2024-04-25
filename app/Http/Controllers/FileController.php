<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    public function index()
    {
        $files = File::all();
        return view('list-file', compact('files'));
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $path = $file->store('public/upload');

        $filename = $file->getClientOriginalName();

        File::create([
            'name' => $filename, 
            'path' => $path,
            'size' => $file->getSize(),
        ]);

        return redirect()->route('admin.file.index');
    }

    public function create()
    {
        return view("load-file");
    }

    public function destroy($id)
    {
        $file = File::find($id);
        $file->delete();
        return redirect()->route('admin.file.index');
    }

    public function show($id)
    {
        $file = File::findOrFail($id);
        return response()->download(storage_path('app/' . $file->path), $file->name);
    }
}
