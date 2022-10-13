<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Album;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getAlbums()
    {
        $albums = Album::with('category')->where('user_id', auth()->user()->id)->get();
        return $albums;
    }

    public function index()
    {
        return view('album.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('album.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|',
            'description'=>'required',
            'category_id'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png'

        ]);
        $imageName = $request->image->hashName();
        $request->image->move(public_path('album'),$imageName);

        $album = Album::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'category_id'=> $request->category_id,
            'slug'=>Str::slug($request->name),
            'user_id'=>auth()->user()->id,
            'image'=>$imageName


        ]);
        $id = $album->id;
        return response()->json(['id'=>$id]);
//
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewAlbum($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Album::with('category')->findOrFail($id);
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

        $findAlbum = Album::findOrFail($id);
        $photo = $findAlbum->image;
        if($request->hasFile('image')){
            $file= $request->file('image');
            $photo= $file->hashName();
            $file->move('./album',$photo);
        }
        $album=Album::findOrFail($id);
        $album->name=$request->name;
        $album->description=$request->description;
        $album->category_id=$request->category_id;
        $album->image=$photo;

        $success = $album->save();
        if($success){
            return response()->json($this->getAlbums());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album=Album::findOrFail($id)->delete();
        if ($album){
            return response()->json($this->getAlbums());
        }
    }
}
