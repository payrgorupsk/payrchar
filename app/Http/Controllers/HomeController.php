<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Dislike;
use App\Models\Follower;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Models\Wallet;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->wallet = new Wallet();
        $this->comment = new Comment();
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $data['menu'] = 'home';
        $followers = Follower::where(['following_id' => Auth::user()->id])->pluck('follower_id')->toArray();
        array_push($followers, Auth::user()->id);

        $posts = Post::with(['user', 'comments.user', 'likes.user', 'dislikes.user'])->whereIn('posts.user_id', $followers)->orderBy('posts.id', 'DESC')->paginate(5);

        if ($request->ajax()) {
            return response($posts);
        }
        return view('home', $data);
    }

    public function fetchComment(Request $request)
    {
        $comments = Comment::with('user:id,first_name,last_name,profile_image')->where('post_id', $request->id)->get();
        return response($comments);
    }

    public function createLike(Request $request)
    {
        $user_id = Auth::user()->id;
        $like = Like::where(['user_id' => Auth::user()->id, 'post_id' => $request->id])->first();
        $dislike = Dislike::where(['user_id' => Auth::user()->id, 'post_id' => $request->id])->first();

        $hasWallet = $this->wallet->hasWallet($user_id);

        if (empty($dislike)) {
            if (empty($like)) {
                $newLike = new Like;
    
                $newLike->user_id = Auth::user()->id;
                $newLike->post_id = $request->id;
                $newLike->save();

                if ($hasWallet == true) {
                    $walletPoint = $this->wallet->addPoint('like', $user_id);
                }

                return response(['found_dislike' => 'false']);

            } else {
                return response(['status'=>'false']);
            }
        } else {
            $dislike->delete();

            $newLike = new Like;
    
            $newLike->user_id = Auth::user()->id;
            $newLike->post_id = $request->id;
            $newLike->save();

            // if ($hasWallet == true) {
            //     $walletPoint = $this->wallet->addPoint('like', $user_id);
            // }

            return response(['found_dislike' => 'true']);
        }
    }

    public function getPostLike(Request $request)
    {
        $post = Like::where('post_id', $request->id)->count();

        return response(['postCount' => $post]);
        
    }

    public function createDislike(Request $request)
    {
        $user_id = Auth::user()->id;
        $like = Like::where(['user_id' => Auth::user()->id, 'post_id' => $request->id])->first();
        $dislike = Dislike::where(['user_id' => Auth::user()->id, 'post_id' => $request->id])->first();
        $hasWallet = $this->wallet->hasWallet($user_id);

        if (empty($like)) {
            if (empty($dislike)) {
                $newDislike = new Dislike;
    
                $newDislike->user_id = Auth::user()->id;
                $newDislike->post_id = $request->id;
                $newDislike->save();

                if ($hasWallet == true) {
                    $walletPoint = $this->wallet->addPoint('dislike', $user_id);
                }

                return response(['found_like' => 'false']);
            } else {
                return response(['status'=>'false']);
            }
        } else {
            $like->delete();

            $newDislike = new Dislike;
    
            $newDislike->user_id = Auth::user()->id;
            $newDislike->post_id = $request->id;
            $newDislike->save();

            // if ($hasWallet == true) {
            //     $walletPoint = $this->wallet->addPoint('dislike', $user_id);
            // }

            return response(['found_like' => 'true']);
        }
    }

    public function getPostDislike(Request $request)
    {
        $post = Dislike::where('post_id', $request->id)->count();

        return response(['postCount' => $post]);
        
    }

    public function viewProfile(Request $request)
    {
        $data['menu'] = 'profile';
        $data['submenu'] = 'timeline';
        $data['userProfile'] = User::where('id', Auth::user()->id)->first();
        $data['postCount'] = Post::where('id', Auth::user()->id)->count();
        $posts = Post::with(['user', 'comments.user', 'likes.user', 'dislikes.user'])->where('posts.user_id', Auth::user()->id)->orderBy('posts.id', 'DESC')->paginate(10);

        if ($request->ajax()) {
            if (count($posts) != 0) {
                return response($posts);
            } else {
                return response(['status' => 'You are at the end of your post...!!!']);
            }
        }
        return view('user.profile', $data);
    }

    public function viewProfileAbout()
    {
        $data['menu'] = 'profile';
        $data['submenu'] = 'about';
        $data['userProfile'] = User::where('id', Auth::user()->id)->first();
        $data['postCount'] = Post::where('id', Auth::user()->id)->count();

        return view('user.about', $data);
    }

    public function viewUserProfile(Request $request)
    {
        $data['menu'] = 'people-you-may-know';
        $data['submenu'] = 'about';
        $data['userProfile'] = User::where('user_name', $request->username)->first();

        return view('user.user_profile', $data);
    }

    public function createComment(Request $request)
    {
        $user_id = Auth::user()->id;
        $hasWallet = $this->wallet->hasWallet($user_id);
        $commentList = $this->comment->checkUserComment($request->id, $user_id);
        
        if (!empty($request->id) && !empty($request->comment_text)) {
            $comment = new Comment;
            $comment->comment_text = $request->comment_text;
            $comment->user_id = Auth::user()->id;
            $comment->post_id = $request->id;

            $comment->save();

            if ($hasWallet == true && $commentList == false) {
                $walletPoint = $this->wallet->addPoint('comment', $user_id);
            }

            return response([
                'status' => 'success',
                'comment_text' => $comment->comment_text,
                'commented_user_name' => Auth::user()->first_name . ' ' . Auth::user()->last_name,
                'commented_user_profile_image' => Auth::user()->profile_image
            ]);
        } else {
            return response(['status' => 'failed']);
        }
    }

    public function createPost(Request $request)
    {
        if (!empty($request->all())) {
            $post = new Post;
            $post->user_id = Auth::user()->id;
            $post->post_txt = !empty($request->post_txt) ? $request->post_txt : Null;
    
            if ($request->hasFile('post_image')) {
                $extension = $request->file('post_image')->getClientOriginalExtension();
                $fileNameToStore =time().'.'.$extension;
                $request->post_image->move(public_path('uploads'), $fileNameToStore);
                $post->post_image = $fileNameToStore;
            }

            if ($request->hasFile('post_video')) {
                $extension = $request->file('post_video')->getClientOriginalExtension();
                $fileNameToStore =time().'.'.$extension;
                $request->post_video->move(public_path('uploads'), $fileNameToStore);
                $post->post_video = $fileNameToStore;
            }
            $post->post_url = !empty($request->input_link) ? $request->input_link : Null;
            $post->save();
            return back();
        } else {
            return back();
        }
    }
}
