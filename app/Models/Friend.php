<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    public function requested_by_user()
    {
        return $this->belongsTo(User::class, 'requested_by');
    }
}
