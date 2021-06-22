<?php

namespace App\Http\Controllers\Album;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class AlbumController extends Controller
{
    public function showAlbum()
    {
        $data['menu'] = 'photo-album';
        $data['postImages'] = Post::with(['user', 'comments.user', 'likes.user', 'dislikes.user'])->whereNotNull('post_image')->inRandomOrder()->simplePaginate(24);
        return view('albums.images', $data);
    }

    public function showVideoAlbum()
    {
        $data['menu'] = 'video-album';
        $data['postVideos'] = Post::with(['user', 'comments.user', 'likes.user', 'dislikes.user'])->whereNotNull('post_video')->inRandomOrder()->simplePaginate(12);
        return view('albums.videos', $data);
    }
}
