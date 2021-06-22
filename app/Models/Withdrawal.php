<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    protected $table    = 'withdrawals';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'request_point', 'amount'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
