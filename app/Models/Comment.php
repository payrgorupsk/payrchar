<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function checkUserComment($postId, $userId)
    {
        $commentList = Comment::where(['post_id' => $postId, 'user_id' => $userId])->get();
        if (count($commentList) > 0) {
            return true;
        } else {
            return false;
        }
    }

}
