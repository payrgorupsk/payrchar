<?php

namespace App\Http\Controllers\Wallet;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use App\Models\Withdrawal;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class WalletController extends Controller
{
    public $wallet;

    public function __construct()
    {
        $this->wallet = new Wallet();
    }
    public function showWallet(Request $request)
    {
        $data['menu'] = 'wallet';
        $userId = Auth::user()->id;
        $data['userWallet'] = $this->wallet->hasWallet($userId);
        $data['totalBalance'] = $this->wallet->balanceCalculate($data['userWallet']->point, "USD");
        if ($request->isMethod('POST')) {

            if ($request->p_amount) {
                $amount = $request->p_amount;
            } elseif ($request->m_amount) {
                $amount = $request->m_amount;
            } elseif ($request->b_amount) {
                $amount = $request->b_amount;
            }
            
            $point = $amount * 10000;

            if ($point < 2500) {
                return redirect('/wallet/show')->with('error', "Request less Amount");
            }
            
            if ($data['totalBalance'] < $amount) {
                return redirect('/wallet/show')->with('error', "Wallet don't have enough Balance");
            }

            $uuid = Str::uuid()->toString();
            $withdrawal = new Withdrawal;
            $withdrawal->user_id = Auth::user()->id;
            $withdrawal->request_point = $point;
            $withdrawal->amount = $amount;
            $withdrawal->withdraw_with = $request->type;
            $withdrawal->uuid = $uuid;
            $withdrawal->status = 'Pending';
            $withdrawal->save();

            $this->wallet->updateWallet($userId, $point);

            return redirect('/wallet/show')->with('success', 'Withdrawal Resquest Successful');

        }

        $data['requestWithdraw'] =  Withdrawal::where('user_id', $userId)->orderBy('id', 'DESC')->paginate(10);

        return view('wallet.view', $data);
    }
}
