<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\User;
use Illuminate\Http\Request;

class FollowControler extends Controller
{
    public function followUnfollow(Request $request){

        $followerId=User::find(auth()->user()->id);

        $followingId=User::find($request->userId);

         $followerId->following()->toggle($followingId);
        return redirect()->back();

    }
    public function profile(){

        $followings=Follower::where('follower_id',auth()->user()->id)->get();
        foreach ($followings as $following){
            $userId=$following->userfollow->id;

        $follows=(new User())->amIfollowing($userId);
        return view('profile',compact('userId','follows','followings'));

    }
        return view('profile',compact('followings'));
    }
    public function updateProfilePic(Request $request){
        $this->validate($request,[
           'image'=>'required|mimes:jpg,jpeg,png'
        ]);
        $image=$request->image->store('public/avatar');
        $authUser=auth()->user()->id;
        $user=User::Where('id',$authUser)->update(['profilePic'=>$image]);
        return redirect()->back();
    }
    public function userProfilePic($id){
        $user=User::find($id);
        return $user->profilePic;

    }
    public function updatebgPic(Request $request){
        $this->validate($request,[
           'image'=>'required|mimes:jpg,jpeg,png'
        ]);
        $image=$request->image->store('public/avatar');
        $authUser=auth()->user()->id;
        $user=User::Where('id',$authUser)->update(['bgpic'=>$image]);
        return redirect()->back();
    }
    public function userbgPic($id){
        $user=User::find($id);
        return $user->bgpic;

    }
}
