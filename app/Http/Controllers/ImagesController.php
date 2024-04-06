<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Nette\Utils\Image;

class ImagesController extends Controller
{
    public function index() {
        return view('image');
    }

    public function upload(Request $request) {
        $request->validate([
            'files' => 'required',
            'files.*' => 'required|mimes:jpeg,png,svg|max:2048',
        ]);

        $files = [];
        if ($request->file('files')){
            foreach($request->file('files') as $key => $file)
            {
                $fileName = time().rand(1,99).'.'.$file->extension();
                $file->move(public_path('uploads'), $fileName);
                $files[]['name'] = $fileName;
            }
        }

        foreach ($files as $key => $file) {
            Images::create($file);
        }

        dd('123');

        return back()
            ->with('success','You have successfully upload file.');

    }
}
