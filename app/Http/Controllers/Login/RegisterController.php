<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user   = new User();
    }
    public function register(Request $request)
    {
        $rules = array(
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|min:8',
            'email' => 'nullable|email|unique:users,email',
            'phone' => 'nullable|numeric|min:11|unique:users,phone'
        );
        $fieldNames = array(
            'first_name' => __("First name"),
            'last_name' => __("Last name"),
            'password' => __("Password"),
            'email' => __('Email'),
            'phone' => 'Phone'
        );

        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($fieldNames);

        if ($validator->fails()) {
            if (empty($request->email) && empty($request->phone)) {
                $data['signUpClass'] = 'sign-up-mode';
                $data['emptyPhoneAndEmail'] = 'Please register using either phone or email...';
            }

            $data['signUpClass'] = 'sign-up-mode';
            $data['menu'] = 'register';
            return view('auth.login', $data)->withErrors($validator);
        }

        $user = new User;
        $user->user_name = $request->first_name . $request->last_name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = !empty($request->email) ? $request->email : NULL;
        $user->phone = !empty($request->phone) ? $request->phone : NULL;
        $user->password = Hash::make($request->password);
        $user->profile_slug = Str::slug($request->first_name.$request->last_name.time(), '-');
        $user->refer_code = uniqid();
        $user->gender = 1;
        $user->save();

        $this->user->createUserWallet($user->id);

        return redirect('/login');
    }
}