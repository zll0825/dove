<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Cache;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $redirectPath = '/ucenter/index';//登录成功的跳转
    protected $username = 'phonenumber';
    protected $loginPath = '/login';//需要登录的跳转

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255|unique:users',
            'phonenumber' => 'required|min:11|unique:users',
            //'smscode' => "same:1",
            //'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'phonenumber' => $data['phonenumber'],
            //'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function getForget(){
        return view('auth.forget');
    }

    public function postForget(Request $request){
        // 手机验证码验证
        if (Cache::has($request->phonenumber)) {
           $smscode = Cache::get($request->phonenumber);
        
           if ($smscode != $request->smscode) {
               return ['status_code' => '402', 'msg' => 'phonenumber smscode error'];
           }
        } else {
           return ['status_code' => '402', 'msg' => 'phonenumber smscode error'];
        }

        $user = User::where('phonenumber', $request->phonenumber)->first();
        $user->password = bcrypt($request->password);
        $res = $user->save();

        if ($res) {
            return ['status_code' => '200', 'msg' => 'Password Change Success'];
        } else {
            return ['status_code' => '504', 'msg' => 'Password Change Error'];
        }
    }
}
