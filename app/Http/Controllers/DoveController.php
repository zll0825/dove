<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dove;

class DoveController extends Controller
{
    public function indexSale(){
        $doves = Dove::where('SaleType', 0)->orderBy('updated_at', 'desc')->paginate(2);
        return view('doves.indexsale', compact('doves'));
    }

    public function infoSale($id){
        Dove::where('DoveID',$id)->increment('ViewCount');
        $dove = $this->_getDoveInfo($id);
        return view('doves.infosale',compact('dove'));
    }

    public function indexShow(){
        $doves = Dove::where('SaleType', 2)->orderBy('updated_at', 'desc')->paginate(2);
        return view('doves.indexshow', compact('doves'));
    }

    public function infoShow($id){
        Dove::where('DoveID',$id)->increment('ViewCount');
        $dove = $this->_getDoveInfo($id);
        return view('doves.infoshow',compact('dove'));
    }
}
