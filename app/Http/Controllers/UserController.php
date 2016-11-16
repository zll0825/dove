<?php

namespace App\Http\Controllers;

use App\Buy;
use App\User;
use App\Order;
use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    public function index(){
        return view('ucenter.index');
    }

    public function myauction(Request $request){
        $user = $request->user();
        $auctions = Buy::join('T_D_AUCTION','T_D_AUCTION.AuctionID','=','T_U_BUY.AuctionID')->join('T_D_DOVEINFO','T_D_DOVEINFO.DoveID','=','T_D_AUCTION.DoveID')->where('UserID', $user->userid)->orderBy('T_U_BUY.created_at','desc')->get();
        //dd($auctions);
        return view('ucenter.myauction',compact('auctions'));
    }

    public function myorder(Request $request){
        $user = $request->user();
        $orders = Order::join('T_D_DOVEINFO','T_D_DOVEINFO.DoveID','=','T_U_Order.DoveID')->where('UserID', $user->userid)->orderBy('T_U_Order.created_at','desc')->get();
        return view('ucenter.myorder',compact('orders'));
    }

    public function mymsg(Request $request){
        $user = $request->user();
        $UserID = $user->userid;


        $sysmsgs = DB::table('T_M_MESSAGE')->where('RecID', 0)->lists('TextID');
        foreach ($sysmsgs as $v) {
            $tmp = DB::table('T_M_MESSAGE')->where(['TextID'=>$v, 'RecID'=>$UserID])->count();
            if($tmp == 0){
                DB::table('T_M_MESSAGE')->insert(['TextID'=>$v, 'RecID'=>$UserID, 'SendID'=>0, 'Status'=>0]);
            }
        }
        $messages = DB::table('T_M_MESSAGE')->join('T_M_MESSAGETEXT','T_M_MESSAGETEXT.TextID','=','T_M_MESSAGE.TextID')->where('RecID', $UserID)->where('Status','<>', 2)->orderBy('T_M_MESSAGE.TextID','desc')->paginate(6);
        //dd($messages);
        return view('ucenter.mymsg',compact('messages'));
    }


    /**
     * 更改消息状态为已读
     *
     * @return mixed
     */
    public function readMessage(Request $request)
    {
        $TextID = $request->TextID;
        $UserID = $request->userid;
        $TextID = is_array($TextID)? $TextID : array($TextID);
        DB::table('T_M_MESSAGE')->where(['RecID'=>$UserID])->whereIn('TextID',$TextID)->update(['Status'=>1]);
        $readcounts = DB::table('T_M_MESSAGE')->where(['RecID'=>$UserID,'Status'=>0])->count();
        return ['status_code'=>'200','msg'=>'信息已读', 'readcounts'=>$readcounts];
    }

    /**
     * 更改消息状态为删除
     *
     * @return mixed
     */
    public function delMessage(Request $request)
    {
        $TextID = $request->TextID;
        $UserID = $request->userid;
        $TextID = is_array($TextID)? $TextID : array($TextID);
        DB::table('T_M_MESSAGE')->where(['RecID'=>$UserID])->whereIn('TextID',$TextID)->update(['Status'=>2]);
        return ['status_code'=>'200','msg'=>'信息已删除'];
    }

    public function chUserName(Request $request){
        $user = User::where('userid',$request->userid)->first();
        $tmp = User::where('username', $request->username)->count();
        if($tmp != 0) {
            return ['status_code'=>'419', 'msg'=>'昵称已存在！'];
        }
        $res = $user->update(['username' => $request->username]);
        if($res){
            return ['status_code'=>'200', 'msg'=>'昵称修改成功！'];
        } else {
            return ['status_code'=>'409', 'msg'=>'昵称修改失败！'];
        }
    }

    public function chUserPicture(Request $request){
        $user = User::where('userid',$request->userid)->first();
        $res = $user->update(['userpicture' => $request->userpicture]);
        if($res){
            return ['status_code'=>'200', 'msg'=>'头像修改成功！'];
        } else {
            return ['status_code'=>'409', 'msg'=>'头像修改失败！'];
        }
    }

    public function chPWD(Request $request){
        // 手机验证码验证
        if (Cache::has($request->phonenumber)) {
            $smscode = Cache::get($request->phonenumber);
            if ($smscode != $request->smscode) {
                return ['status_code' => '404', 'msg' => 'phonenumber smscode error'];
            }
        } else {
            return ['status_code' => '404', 'msg' => 'phonenumber smscode error'];
        }
        $user = User::where('userid',$request->userid)->first();
        $res = $user->update(['password' => bcrypt($request->password)]);
        if($res){
            return ['status_code'=>'200', 'msg'=>'昵称修改成功！'];
        } else {
            return ['status_code'=>'409', 'msg'=>'密码修改失败！'];
        }
    }

    public function confirm(Request $request){
        $user = User::where('userid',$request->userid)->first();
        $user->depositpicture = $request->depositpicture;
        $user->idcardpicture = $request->idcardpicture;
        $user->certifystate = 0;
        $res = $user->save();
        if($res){
            return ['status_code'=>'200', 'msg'=>'保证金提交成功！'];
        } else {
            return ['status_code'=>'409', 'msg'=>'提交失败！'];
        }
    }

    public function uploadPay(Request $request){
        $user = User::where('userid',$request->userid)->first();
        $order = Order::where(['UserID'=>$user->userid, 'DoveID'=>$request->doveid, 'AuctionID'=>$request->auctionid])->first();
        if(!$order){
            return ['status_code'=>'404', 'msg'=>'您还没买!'];
        } else {
            $res = $order->update(['PayFlag'=>2,'PayPicture'=>$request->paypicture]);
            if($res){
                return ['status_code'=>'200', 'msg'=>'付款凭证上传成功'];
            } else {
                return ['status_code'=>'409', 'msg'=>'提交失败！'];
            }
        }
    }

    public function receive(Request $request){
        $user = User::where('userid',$request->userid)->first();
        $order = Order::where(['UserID'=>$user->userid, 'DoveID'=>$request->doveid, 'AuctionID'=>$request->auctionid])->first();
        if(!$order){
            return ['status_code'=>'404', 'msg'=>'您还没买!'];
        } else {
            $res = $order->update(['PayFlag'=>6]);
            if($res){
                return ['status_code'=>'200', 'msg'=>'付款凭证上传成功'];
            } else {
                return ['status_code'=>'409', 'msg'=>'提交失败！'];
            }
        }
    }
}
