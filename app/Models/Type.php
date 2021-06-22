<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table    = 'types';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'rate'];

    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'type_id');
    }
}
