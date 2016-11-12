<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\News;

class NewsController extends Controller
{
    public function index(){
        $homes = News::where(['NewsLabel'=>'gyzj','Flag'=>1])->orderBy('NewsID', 'desc')->skip(1)->take(5)->get();
        $home = News::where(['NewsLabel'=>'gyzj','Flag'=>1])->orderBy('NewsID', 'desc')->take(1)->first();
        $newss = News::where(['NewsLabel'=>'sgzx','Flag'=>1])->orderBy('NewsID', 'desc')->paginate(6);
        return view('news.index',compact('homes','home','newss'));
    }

    public function info($id){
        $news = $this->getDetail($id);
        $pre  = News::select('NewsID','NewsTitle')->where('NewsID','<',$id)->where('Flag', 1)->where('NewsLabel','sgzx')->orderBy('NewsID','desc')->first();
        $next = News::select('NewsID','NewsTitle')->where('NewsID','>',$id)->where('Flag', 1)->where('NewsLabel','sgzx')->orderBy('NewsID','asc')->first();
        $homes = News::where(['NewsLabel'=>'gyzj','Flag'=>1])->orderBy('NewsID', 'desc')->skip(1)->take(5)->get();
        $home = News::where(['NewsLabel'=>'gyzj','Flag'=>1])->orderBy('NewsID', 'desc')->take(1)->first();
        return view('news.info',compact('news','pre','next','homes','home'));
    }

    public function homeIndex(){
        $homes = News::where(['NewsLabel'=>'gyzj','Flag'=>1])->orderBy('NewsID', 'desc')->paginate(6);
        $newss = News::where(['NewsLabel'=>'sgzx','Flag'=>1])->orderBy('NewsID', 'desc')->skip(1)->take(5)->get();
        $news = News::where(['NewsLabel'=>'sgzx','Flag'=>1])->orderBy('NewsID', 'desc')->take(1)->first();
        return view('news.home',compact('homes','newss','news'));
    }

    public function homeInfo($id){
        $news = $this->getDetail($id);
        $pre  = News::select('NewsID','NewsTitle')->where('NewsID','<',$id)->where('Flag', 1)->where('NewsLabel','gyzj')->orderBy('NewsID','desc')->first();
        $next = News::select('NewsID','NewsTitle')->where('NewsID','>',$id)->where('Flag', 1)->where('NewsLabel','gyzj')->orderBy('NewsID','asc')->first();
        $newss = News::where(['NewsLabel'=>'sgzx','Flag'=>1])->orderBy('NewsID', 'desc')->skip(1)->take(5)->get();
        $news = News::where(['NewsLabel'=>'sgzx','Flag'=>1])->orderBy('NewsID', 'desc')->take(1)->first();
        return view('news.homeinfo',compact('news','pre','next','newss','news'));
    }

    public function getDetail($id){
        $data = News::where(['NewsID'=>$id,'Flag'=>1])->first();
        return $data;
    }
}
