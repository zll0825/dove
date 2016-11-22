<?php

namespace App\Http\Controllers;

use App\Auction;
use App\Theme;
use App\Buy;
use App\Dove;
use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuctionController extends Controller
{
    public function index(){
        $notices = $this->_getContent('tz',6);
        $themes = Theme::where('EndFlag', '0')->orderBy('ThemeID','desc')->lists('ThemeID');
        $auctions = Auction::join('T_D_THEMEAUCTION','T_D_AUCTION.AuctionID','=','T_D_THEMEAUCTION.AuctionID')->join('T_D_DOVEINFO','T_D_DOVEINFO.DoveID','=','T_D_AUCTION.DoveID')->join('T_D_THEME','T_D_THEME.ThemeID','=','T_D_THEMEAUCTION.ThemeID')->whereIn('T_D_THEMEAUCTION.ThemeID',$themes)->where('T_D_AUCTION.Status',0)->orderBy('T_D_AUCTION.AuctionID','desc')->take(8)->get();
        foreach ($auctions as $v){
            $v->OfferCount = $this->getBuyCount($v->AuctionID);
            $v->EndDays = round((strtotime($v->EndTime)-time())/3600/24);
            $v->EndTime = substr($v->EndTime, 0, 10);
            $v->HighPrice = $this->getHighPrice($v->AuctionID);
        }

        $latests = Auction::join('T_D_THEMEAUCTION','T_D_AUCTION.AuctionID','=','T_D_THEMEAUCTION.AuctionID')->join('T_D_DOVEINFO','T_D_DOVEINFO.DoveID','=','T_D_AUCTION.DoveID')->join('T_D_THEME','T_D_THEME.ThemeID','=','T_D_THEMEAUCTION.ThemeID')->whereIn('T_D_THEMEAUCTION.ThemeID',$themes)->where('T_D_AUCTION.Status',0)->orderBy('T_D_AUCTION.AuctionID','desc')->take(2)->get();
        foreach ($latests as $v){
            $v->OfferCount = $this->getBuyCount($v->AuctionID);
            $v->EndDays = round((strtotime($v->EndTime)-time())/3600/24);
            $v->EndTime = substr($v->EndTime, 0, 10);
            $v->HighPrice = $this->getHighPrice($v->AuctionID);
        }
        return view('auction.index', compact('auctions','latests','notices'));
    }

    public function intro($id){
        $theme = Theme::where('ThemeID', $id)->first();
        $auctions = DB::table('T_D_THEMEAUCTION')->where(['ThemeID'=>$id])->lists('AuctionID');
        $auctions = Auction::join('T_D_THEMEAUCTION','T_D_AUCTION.AuctionID','=','T_D_THEMEAUCTION.AuctionID')->join('T_D_DOVEINFO','T_D_DOVEINFO.DoveID','=','T_D_AUCTION.DoveID')->join('T_D_THEME','T_D_THEME.ThemeID','=','T_D_THEMEAUCTION.ThemeID')->whereIn('T_D_AUCTION.AuctionID',$auctions)->where('T_D_AUCTION.Status',0)->orderBy('T_D_AUCTION.AuctionID','desc')->get();
        $latestthemes = Theme::where('EndFlag',0)->orderBy('ThemeID','desc')->get();
        foreach ($auctions as $v){
            $v->OfferCount = $this->getBuyCount($v->AuctionID);
            $v->EndDays = round((strtotime($v->EndTime)-time())/3600/24);
            $v->EndTime = substr($v->EndTime, 0, 10);
            $v->HighPrice = $this->getHighPrice($v->AuctionID);
        }
        if(!$latestthemes){
            $latestthemes = '';
        }
        return view('auction.intro',compact('theme','auctions','latestthemes'));
    }

    public function info($id){
        $auction = $this->getAuctionInfo($id)[0];
        Dove::where('DoveID',$auction->DoveID)->increment('ViewCount');
        $auction->EndDays = round((strtotime($auction->EndTime)-time())/3600/24);
        $auction->OfferCount = $this->getBuyCount($auction->AuctionID);

        $processs = $this->getAuctionProcess($id);
        $highprice = $this->getHighPrice($id);
        return view('auction.info', compact('auction','processs','highprice'));
    }
}
