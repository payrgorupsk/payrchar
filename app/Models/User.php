<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    // blog section

    // user has many blogs
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function blogComments()
    {
        return $this->hasMany(BlogComment::class);
    }

    // Wallet Section
    public function wallets()
    {
        return $this->hasMany(Wallet::class, 'user_id');
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class);
    }

    public function createUserWallet($userId)
    {
        $wallet              = new Wallet();
        $wallet->user_id     = $userId;
        $wallet->type_id     = null;
        $wallet->point       = 0;
        $wallet->save();
    }

    public function friends()
    {
        return $this->hasMany(Friend::class);
    }
}
