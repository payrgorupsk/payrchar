<?php

namespace App\Http\Controllers\Wallet;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Auth;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function __construct()
    {
        $this->wallet = new Wallet();
    }
    public function showWallet()
    {
        $data['menu'] = 'wallet';
        $data['userWallet'] = Wallet::where('user_id', Auth::user()->id)->first();
        $data['totalBalance'] = $this->wallet->balanceCalculate($data['userWallet']->point, "USD");
        // dd($totalBalance);
        return view('wallet.view', $data);
    }
}
