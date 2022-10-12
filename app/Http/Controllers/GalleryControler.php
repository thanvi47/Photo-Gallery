<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class GalleryControler extends Controller
{
    public function create()
    {
        return view('image.create');
    }
    public function upload( Request $request){

        foreach ($request->file('files') as $file){
            $name=$file->hashName();
            $file->move(public_path().'/images',$name);
            $file= new Image();
            $file->album_id=$request->album_id;
            $file->image=$name;
            $file->save();
            return response()->json(['success'=>'Images Uploaded Successfully']);
        }

    }
}
