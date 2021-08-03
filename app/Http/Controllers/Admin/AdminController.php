<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function loginView()
    {
        return view('AdminPanel.Auth.Login');
    }

    public function loginVarify(Request $request)
    {
        if (!empty($request->email) && !empty($request->password)) {
            $admin = Admin::where('email', $request->email)->where('password', $request->password)->count();
            if ($admin == 1) {
                $request->session()->put('data', $request->input());
    
                if ($request->session()->has('data')) {
                    return redirect('/dashboard7778899');
                } else {
                    return redirect('/login7778899');
                }
            } else {
                return redirect()->back()->with('error', 'Please recheck your credentials!');
            }
        } else {
            return redirect()->back()->with('error', 'Your credentials are missing!');
        }
      }

    public function logoutAdmin()
    {
        session()->forget('data');
        return redirect('/login7778899');
    }

    public function index()
    {
        $data['users'] = User::orderBy('id', 'DESC')->paginate(25);
        return view('AdminPanel.Dashboard', $data);
    }

    public function adminViewUser(Request $request)
    {
        $data['user'] = User::where(['id' => $request->id])->first();
        return view('AdminPanel.user.index', $data);
    }

    public function seeRequest()
    {
        $data['withdrawarlReqList'] = Withdrawal::orderBy('id', 'DESC')->get();
        $data['userWalletDetails'] = Wallet::all()->take(10);
        return view('AdminPanel.withdrawal.withdrawReqToAdmin', $data);
    }

    public function AcceptPaymentReq(Request $request)
    {
        $with = Withdrawal::where(['id' => $request->id, 'status' => 'Pending'])->first();
        if (!is_null($with)) {
            $with->status = 'Success';
            $with->save();
            return back()->with('success', 'Successfully Updated');
        } else {
            return redirect()->back()->with('error', 'You Cannot Change this transaction Status!');
        }
    }
    public function DeletePaymentReq(Request $request)
    {
        $with = Withdrawal::where(['id' => $request->id, 'status' => 'Pending'])->first();
        if (!is_null($with)) {
            $wallet = Wallet::where(['user_id' => $with->user_id])->first();
            $wallet->point  = $wallet->point + $with->request_point;
            $wallet->save();
            $with->status = 'Cancelled';
            $with->save();
            return back()->with('success', 'Successfully Updated');
        } else {
            return redirect()->back()->with('error', 'You Cannot Change this transaction Status!');
        }
    }

    public function seeAllUser()
    {
        return view('AdminPanel.all_user_table');
    }

    public function EditUser(Request $request)
    {
        $userInfo = User::where('id', $request->id)->first();
        return view("AdminPanel.UserInfo", compact('userInfo'));
    }

    public function updateUserInfo(Request $request)
    {
        // add active inactive field
        $user = User::where(['id' => $request->id])->first();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if (isset($request->password) && $request->password == $request->confirm_password) {
            $user->password = Hash::make($request->password);
        }
        $user->status = isset($request->status) ? $request->status : 1;
        $user->save();
        return back()->withErrors('messageSucces', 'Record Successfully Updated!');
    }
    public function walletDetailsList()
    {
        $data['userWalletDetails'] = Wallet::all()->take(10);
        return view('AdminPanel.wallet.list', $data);
    }
}
