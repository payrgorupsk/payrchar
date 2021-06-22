<?php

namespace App\Http\Controllers\Friends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Friend;
use Auth;
use File;
use DB;

class FriendsController extends Controller
{
    public function findFriends(Request $request) {
        $friends = User::inRandomOrder()->paginate(10);

        return response($friends);
    }

    public function viewFriendPage(Request $request)
    {
        $data['menu'] = 'people-you-may-know';
        $data['users'] = $users = User::where('id', '!=', Auth::user()->id)->where(function($query) {
                            DB::table('friends')->where('requested_by', Auth::user()->id)
                            ->orWhere('requested_to', Auth::user()->id)
                            ->where('is_friend', '!=', 1);
                        })->select(['id', 'first_name', 'last_name', 'profile_image', 'cover_photo', 'profile_slug'])
                        ->inRandomOrder()
                        ->paginate(12);

        if ($request->ajax()) {
            return response($users);
        }

        return view('people_you_may_know.index', $data);
    }

    public function changeProfilePic(Request $request)
    {
        if ($request->hasFile('image')) {
            $user = User::where('id', Auth::user()->id)->first(['id', 'profile_image']);
            if (!empty($user->profile_image) && file_exists('public/uploads/'.$user->profile_image)) {
                File::delete('public/uploads/'.$user->profile_image);
            }
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = time().'.'.$extension;
            $request->image->move(public_path('uploads'), $fileNameToStore);

            $user->profile_image = $fileNameToStore;
            $user->save();

            return response(['status' => 'success']);
        } else {
            return response(['status' => 'failed']);
        }
    }

    public function addNewFriend(Request $request)
    {
        $user = User::where('id', $request->id)->first(['id']);
        if (!empty($user)) {
            $friend = new Friend;
    
            $friend->requested_by = Auth::user()->id;
            $friend->requested_to = $user->id;
            $friend->is_friend = 0;
            $friend->is_follow = 1;

            $friend->save();

            return response(['status'=>'success']);
        } else {
            return response(['status'=>'false']);
        }
    }
}
