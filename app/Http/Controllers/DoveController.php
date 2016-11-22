<?php

namespace App\Http\Controllers;

use App\Auction;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dove;
use App\Order;
use App\Buy;
use App\User;
use DB;

class DoveController extends Controller
{
    public function indexSale(){
        $doves = Dove::where('SaleType', 0)->orderBy('updated_at', 'desc')->paginate(8);
        $latestsales = $this->getSaleOrder();
        return view('doves.indexsale', compact('doves','latestsales'));
    }

    public function getLatest($type){
        $data = Dove::where('SaleType', $type)->orderBy('updated_at', 'desc')->take(8)->get();
        return $data;
    }

    public function getTotal($type){
        $data = Dove::where('SaleType', $type)->orderBy('ViewCount', 'desc')->take(8)->get();
        return $data;
    }

    public function getRandom($type){
        $data = Dove::where('SaleType', $type)->orderBy('ViewCount', 'desc')->lists('DoveID')->toArray();
        $data = array_values(array_unique($data));
        shuffle($data);
        $data = array_slice($data, 0, 8);
        $data = Dove::whereIn('DoveID', $data)->get();
        return $data;
    }

    public function infoSale($id){
        Dove::where('DoveID',$id)->increment('ViewCount');
        $dove = $this->_getDoveInfo($id);
        $doveid = $id;
        $latests = $this->getLatest(0);
        $totals = $this->getTotal(0);
        $recommends = $this->getRandom(0);
        return view('doves.infosale',compact('dove','doveid','latests','totals','recommends'));
    }

    public function indexShow(){
        $doves = Dove::where('SaleType', 2)->orderBy('updated_at', 'desc')->paginate(8);
        $latestsales = $this->getSaleOrder();
        return view('doves.indexshow', compact('doves','latestsales'));
    }

    public function infoShow($id){
        Dove::where('DoveID',$id)->increment('ViewCount');
        $dove = $this->_getDoveInfo($id);
        $latests = $this->getLatest(2);
        $totals = $this->getTotal(2);
        $recommends = $this->getRandom(2);
        return view('doves.infoshow',compact('dove','latests','totals','recommends'));
    }

    public function addCart(Request $request){
        $user = User::where('userid',$request->userid)->first();
        if($user->certifystate != 1){
            return ['status_code'=>'401', 'msg'=>'请交纳保证金，并前往个人中心上传凭证！'];
        }
        $dove = Dove::where('DoveID',$request->doveid)->first();
        $order = Order::where(['UserID'=>$user->userid, 'DoveID'=>$request->doveid])->first();
        if($order){
            return ['status_code'=>'404', 'msg'=>'您已经购买过了!'];
        } else {
            $data['OrderNumber'] = time().mt_rand(10000,99999);
            $data['UserID'] = $user->userid;
            $data['DoveID'] = $request->doveid;
            $data['OrderType'] = 0;
            $data['OrderPrice'] = $dove->DovePrice;
            $data['created_at'] = date('Y-m-d H:i:s', time());
            $res = Order::insert($data);
            if($res){
                return ['status_code'=>'200', 'msg'=>'加入购物车成功'];
            } else {
                return ['status_code'=>'409', 'msg'=>'提交失败！'];
            }
        }
    }

    public function purchase(Request $request){
        $user = User::where('userid',$request->userid)->first();
        if($user->certifystate != 1){
            return ['status_code'=>'401', 'msg'=>'请交纳保证金，并前往个人中心上传凭证！'];
        }
        $dove = Dove::where('DoveID',$request->doveid)->first();
        $order = Order::where(['UserID'=>$user->userid, 'DoveID'=>$request->doveid])->first();
        if($order){
            if($order->PayFlag == 0){
                $res = $order->update(['PayFlag'=>1]);
                if($res){
                    return ['status_code'=>'200', 'msg'=>'购买成功，请付款'];
                } else {
                    return ['status_code'=>'409', 'msg'=>'提交失败！'];
                }
            } else {
                return ['status_code'=>'404', 'msg'=>'您已经购买过了!'];
            }
        } else {
            $data['OrderNumber'] = time().mt_rand(10000,99999);
            $data['UserID'] = $user->userid;
            $data['DoveID'] = $request->doveid;
            $data['OrderType'] = 0;
            $data['OrderPrice'] = $dove->DovePrice;
            $data['PayFlag'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s', time());
            $res = Order::insert($data);
            if($res){
                return ['status_code'=>'200', 'msg'=>'购买成功，请付款'];
            } else {
                return ['status_code'=>'409', 'msg'=>'提交失败！'];
            }
        }
    }

    public function offerPrice(Request $request){
        $user = User::where('userid',$request->userid)->first();
        if($user->certifystate != 1){
            return ['status_code'=>'401', 'msg'=>'请交纳保证金，并前往个人中心上传凭证！'];
        }
        $status = Auction::join('T_D_DOVEINFO','T_D_DOVEINFO.DoveID','=','T_D_AUCTION.DoveID')->where('AuctionID',$request->auctionid)->pluck('SaleFlag');
        if($status == 1){
            return ['status_code'=>'408', 'msg'=>'鸽子已经被别人拍下！'];
        }
        $highprice = Buy::where(['AuctionID' => $request->auctionid, 'Status'=>1])->first();
        if($highprice){
            $addprice = DB::table('T_D_AUCTION')->where('AuctionID',$request->auctionid)->pluck('AddPrice');
            if($highprice->Offer > ($request->offer - $addprice) ){
                return ['status_code'=>'410', 'msg'=>'请正确出价，高于当前拍卖价且加价幅度大于规定加价！'];
            } else {
                $data['AuctionID'] = $request->auctionid;
                $data['UserID'] = $request->userid;
                $data['Offer'] = $request->offer;
                $data['Status'] = 1;
                $data['created_at'] = date('Y-m-d H:i:s', time());
                DB::beginTransaction();
                try {
                    Buy::insert($data);
                    $highprice->update(['Status'=>0]);
                    Auction::where(['AuctionID' => $request->auctionid])->update(['EndPrice'=>$request->offer]);
                    DB::commit();
                } catch (Exception $e){
                    DB::rollback();
                    throw $e;
                }
                if(!isset($e)){
                    return ['status_code'=>'200', 'msg'=>'出价成功'];
                } else {
                    return ['status_code'=>'409', 'msg'=>'提交失败！'];
                }
            }
        } else {
            $startprice = Auction::where('AuctionID',$request->auctionid)->pluck('StartPrice');
            if($startprice > $request->offer){
                return ['status_code'=>'410', 'msg'=>'请正确出价，高于当前拍卖价且加价幅度大于规定加价！'];
            }
            $data['AuctionID'] = $request->auctionid;
            $data['UserID'] = $request->userid;
            $data['Offer'] = $request->offer;
            $data['Status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s', time());
            $res = Buy::insert($data);
            Auction::where(['AuctionID' => $request->auctionid])->update(['EndPrice'=>$request->offer]);
            if($res){
                return ['status_code'=>'200', 'msg'=>'出价成功'];
            } else {
                return ['status_code'=>'409', 'msg'=>'提交失败！'];
            }
        }

    }
}
