<?php

namespace App\Http\Controllers;

use App\Dove;
use App\Auction;
use App\Order;
use App\Theme;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        $notices = $this->_getContent('tz',6);
        $infomations = $this->_getContent('sgzx',6);
        $homes = $this->_getContent('gyzj',6);
        $auctions = $this->getAuction();
        $sales = $this->getSale();
        $recommends = $this->getRecommend();
        $latestauctions = $this->getAuctionOrder();
        foreach ($latestauctions as $v){
            $v->OfferCount = $this->getBuyCount($v->AuctionID);
            $v->EndDays = round((strtotime($v->EndTime)-time())/3600/24);
            $v->EndTime = substr($v->EndTime, 0, 10);
            $v->HighPrice = $this->getHighPrice($v->AuctionID);
        }
        $latestsales = $this->getSaleOrder();
        return view('index',compact('notices','homes','infomations','auctions','sales','recommends','latestauctions','latestsales'));
    }

    public function help(){
        return view('static.help');
    }

    public function getRecommend(){
        $data = Dove::where(['RecommendFlag'=>1,'SaleType'=>2])->orderBy('DoveID','desc')->take(5)->get();
        return $data;
    }

    public function getSale(){
        $data = Dove::where(['SaleType'=>1])->orderBy('DoveID','desc')->take(8)->get();
        return $data;
    }

    public function getAuction(){
        $themes = Theme::where('EndFlag', '0')->orderBy('ThemeID','desc')->lists('ThemeID');
        $data = Auction::join('T_D_THEMEAUCTION', 'T_D_AUCTION.AuctionID', '=', 'T_D_THEMEAUCTION.AuctionID')
            ->join('T_D_DOVEINFO', 'T_D_DOVEINFO.DoveID', '=', 'T_D_AUCTION.DoveID')
            ->join('T_D_THEME', 'T_D_THEME.ThemeID', '=', 'T_D_THEMEAUCTION.ThemeID')
            ->whereIn('T_D_THEMEAUCTION.ThemeID', $themes)
            ->where('T_D_AUCTION.Status', 0)
            ->orderBy('T_D_AUCTION.AuctionID', 'desc')
            ->take(2)
            ->get();
        return $data;
    }
}
