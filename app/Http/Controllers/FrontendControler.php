<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendControler extends Controller
{
    public function index()
    {
      $albums=Album::latest()->paginate(50);
      return view('home',compact('albums'));
    }
    public function userAlbum($id){
        $albums =Album::where('user_id',$id)->get();
        $userId=$id;
        $user=User::where('id',$id)->first();
        $userBgPic=$user->bgpic;
        if (Auth::check()) {
            $follows = (new User())->amIfollowing($userId);
            return view('user-album', compact('albums', 'userId', 'follows','userBgPic'));
        }

        return view('user-album', compact('albums','userBgPic' ));

    }
    public function albumCategory($id){
        $albums=Album::where('category_id',$id)->get();
        return view('album-category',compact('albums'));
    }
}
