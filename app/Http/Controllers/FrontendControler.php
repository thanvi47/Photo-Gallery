<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class FrontendControler extends Controller
{
    public function index()
    {
      $albums=Album::latest()->paginate(50);
      return view('home',compact('albums'));
    }
}
