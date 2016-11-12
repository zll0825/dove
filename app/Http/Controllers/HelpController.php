<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use App\User;
use Redirect, Input, From;

class HelpController extends Controller
{
    public function sms(Request $request){
        if($request->act == 'register'){
            Cache::put($request->phonenumber, '111111', 20);
        }
        return response()->json(['status_code'=>'200','msg'=>'短信发送成功！']);
    }

    public function sendSms(Request $request) {
        $action = $request->action;
        $phonenumber = $request->phonenumber;
        if ($action == 'register') {
            $user = User::where('phonenumber', $request->phonenumber)->first();
            if($user) {
                return json_encode(['status_code' => '405', 'msg' => 'phonenumber is exist']);
            }
        } elseif ($action == 'login') {
            $user = User::where('phonenumber', $request->phonenumber)->first();
            if(!$user) {
                return json_encode(['status_code' => '406', 'msg' => 'phonenumber does not exist']);
            }
        } else {
            return json_encode(['status_code' => '401', 'msg' => 'lose argument action']);
        }

        // 获取验证码
        $randNum = $this->_randStr(6, 'NUMBER');

        // 发送验证码短信
        $res = $this->_sendSms($phonenumber, $randNum, $action);

        // 发送结果
        if ($res) {
            // 验证码存入缓存 10 分钟
            $expiresAt = 20;

            Cache::put($phonenumber, $randNum, $expiresAt);

            return json_encode(['status_code' => '200', 'msg' => 'Send Sms Success']);
        } else {
            return json_encode(['status_code' => '503', 'msg' => 'Send Sms Error']);
        }
    }

    //Ajax上传图片
    public function imgUpload(){
        $file = Input::file('file');
        $id = Input::get('id');
        $allowed_extensions = ["png", "jpg", "gif"];
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            return ['error' => 'You may only upload png, jpg or gif.'];
        }

        $destinationPath = 'uploads/images/';
        $extension = $file->getClientOriginalExtension();
        $fileName = str_random(10).'.'.$extension;
        $file->move($destinationPath, $fileName);
        return Response::json(
            [
                'success' => true,
                'pic' => asset($destinationPath.$fileName),
                'id' => $id
            ]
        );
    }
    //图片上传
    public function upload(){
        error_reporting(E_ALL | E_STRICT);
        // $upload_handler = new \App\UploadHandler();
        $upload_handler = new \App\UploadHandler(['upload_dir'=>base_path().'/public/uploads/images/', 'upload_url'=>'http://dove.zerdream.com/uploads/images/']);
    }


}
