<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Dove;
use App\News;
use App\Order;
use App\Buy;
use App\Auction;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //获取资讯
    protected  function _getContent($label,$number){
        $data = News::where(['NewsLabel' => $label, 'Flag' =>1])->take($number)->get();
        return $data;
    }

    //获取鸽子详情
    protected function _getDoveInfo($id){
        $data = Dove::where('DoveID', $id)->first();
        return $data;
    }
    //获取竞拍鸽子详情
    protected function _getAuctionDoveInfo($id){
        $data = Dove::join('T_D_AUCTION','T_D_DOVEINFO.DoveID','=','T_D_AUCTION.DoveID')->where('T_D_DOVEINFO.DoveID', $id)->first();
        return $data;
    }

    protected function getAuctionInfo($id){
        $data = Auction::join('T_D_THEMEAUCTION','T_D_AUCTION.AuctionID','=','T_D_THEMEAUCTION.AuctionID')->join('T_D_DOVEINFO','T_D_DOVEINFO.DoveID','=','T_D_AUCTION.DoveID')->join('T_D_THEME','T_D_THEME.ThemeID','=','T_D_THEMEAUCTION.ThemeID')->where('T_D_AUCTION.AuctionID', $id)->get();
        return $data;
    }

    protected function getAuctionProcess($id){
        $data = Buy::join('users','users.userid','=','T_U_BUY.UserID')->where('AuctionID',$id)->orderBy('BuyID','desc')->get();
        return $data;
    }

    protected function getHighPrice($id){
        $data = Buy::where(['AuctionID'=>$id,'Status'=>1])->pluck('Offer');
        $data = @$data?$data:0;
        return $data;
    }

    //获取出价次数
    protected function getBuyCount($id){
        $count = Buy::where('AuctionID', $id)->count();
        return $count;
    }

    protected function getSaleOrder(){
        $data = Order::join('users','T_U_ORDER.UserID','=','users.userid')
            ->join('T_D_DOVEINFO', 'T_D_DOVEINFO.DoveID', '=', 'T_U_ORDER.DoveID')
            ->where(['PayFlag'=>3,'OrderType'=>0])
            ->orderBy('OrderID','desc')
            ->take(8)
            ->get();
        return $data;
    }

    protected function getAuctionOrder(){
        $data = Order::join('users','T_U_ORDER.UserID','=','users.userid')
            ->join('T_D_AUCTION','T_D_AUCTION.AuctionID','=','T_U_ORDER.AuctionID')
            ->join('T_D_THEMEAUCTION', 'T_D_AUCTION.AuctionID', '=', 'T_D_THEMEAUCTION.AuctionID')
            ->join('T_D_THEME', 'T_D_THEME.ThemeID', '=', 'T_D_THEMEAUCTION.ThemeID')
            ->join('T_D_DOVEINFO', 'T_D_DOVEINFO.DoveID', '=', 'T_D_AUCTION.DoveID')
            ->where(['PayFlag'=>3,'OrderType'=>1])
            ->orderBy('OrderID','desc')
            ->take(8)
            ->get();
        return $data;
    }

    // 发送短信
    protected function _sendSms($mobile, $message, $action)
    {
        require(base_path().'/vendor/alidayu/TopSdk.php');
        date_default_timezone_set('Asia/Shanghai');

        $c = new \TopClient;
        $c->appkey = '23517133';//需要加引号
        $c->secretKey = '38b702a10ac294017640f8a0acd238e3';
        $c->format = 'xml';
        $req = new \AlibabaAliqinFcSmsNumSendRequest;
        $req->setExtend("");//暂时不填
        $req->setSmsType("normal");//默认可用
        $req->setSmsFreeSignName("长城鸽业");//设置短信免费符号名(需在阿里认证中有记录的)
        $req->setSmsParam("{\"code\":\"{$message}\"}");//设置短信参数
        $req->setRecNum($mobile);//设置接受手机号
        if($action == 'register'){
            $req->setSmsTemplateCode("SMS_25320201");//设置模板
        } elseif($action == 'login') {
            $req->setSmsTemplateCode("SMS_25300172");//设置模板
        }
        $resp = $c->execute($req);//执行

        if($resp->result->success)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * 随机产生六位数
     *
     * @param int $len
     * @param string $format
     * @return string
     */
    protected function _randStr($len = 6, $format = 'ALL'){
        switch ($format) {
            case 'ALL':
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-@#~';
                break;
            case 'CHAR':
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-@#~';
                break;
            case 'NUMBER':
                $chars = '0123456789';
                break;
            default :
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-@#~';
                break;
        }
        mt_srand((double)microtime() * 1000000 * getmypid());
        $password = "";
        while (strlen($password) < $len)
            $password .= substr($chars, (mt_rand() % strlen($chars)), 1);
        return $password;
    }
}
