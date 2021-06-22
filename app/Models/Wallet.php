<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $table    = 'wallets';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'type_id', 'point'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function hasWallet($userId)
    {
        $wallet = Wallet::where(['user_id' => $userId])->first();

        if (empty($wallet))
        {
            $walletInstance              = new Wallet();
            $walletInstance->user_id     = $userId;
            $walletInstance->type_id     = null;
            $walletInstance->point       = 0;
            $walletInstance->save();
        } 

        return true;
    }
    public function addPoint($type, $userId)
    {
        switch ($type) {
          case 'like':
            $present_amount = 1;
            break;
          case 'dislike':
            $present_amount = 1;
            break;
          case 'comment':
            $present_amount = 1;
            break;
          case 'blog':
            $present_amount = 50;
            break;
          case 'refer':
            $present_amount = 300;
            break;
          default:
            $present_amount = 0;
        }
        $wallet = Wallet::where(['user_id' => $userId])->first();
        $wallet->point = $wallet->point + $present_amount;
        $wallet->save();

        return $wallet;
    }
    function balanceCalculate($point, $currency)
    {
        $cur = strtoupper($currency);
        if ($cur == "USD") {
            $tBalance = (float) $point* 0.0001;
            return $tBalance;
        }
    }
}
