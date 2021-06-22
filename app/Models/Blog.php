<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Blog extends Model
{
    protected $fillable = [
        'author_id', 'category_id', 'title', 'description', 'content', 'blog_slug', 'status'
    ];

     // returns the instance of the user who is author of that post
    public function author()
    {
    	return $this->belongsTo(User::class);
    }

    public function category()
    {
    	return $this->belongsTo(BlogCategory::class);
    }

    public static function getTime($time1 = null)
	{
	   $time = new DateTime($time1);

	   return $time->format('d M Y');
	}

    public function blogComments()
    {
        return $this->hasMany(BlogComment::class);
    }

    public function likedUsers()
    {
        return $this->belongsToMany(User::class);
    }
}
