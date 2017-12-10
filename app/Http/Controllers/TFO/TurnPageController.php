<?php

namespace App\Http\Controllers\TFO;

use Illuminate\Http\Request;
use Response;


use App\Http\Controllers\Controller;
use Validator;
use Carbon\Carbon;
use DB;

class TurnPageController extends Controller
{

	public function home(){ 
		if($this->isMobile()) return redirect('/tableforone/m/index.html');
		return view('TFO.front.home'); 
	}
    public function about(){
        if($this->isMobile()) return redirect('/tableforone/m/about.html');
        return view('TFO.front.about');    
    }
    public function menu(){
        if($this->isMobile()) return redirect('/tableforone/m/menu.html');
        return view('TFO.front.menu');    
    }
    public function rules(){
        if($this->isMobile()) return redirect('/tableforone/m/rules.html');
        return view('TFO.front.rules');    
    }
    public function contact(){
        if($this->isMobile()) return redirect('/tableforone/m/contact.html');
        return view('TFO.front.contact');    
    }
    public function qa(){
        if($this->isMobile()) return redirect('/tableforone/m/qa.html');
        return view('TFO.front.qa');    
    }
    public function reservation(){
        if($this->isMobile()) return redirect('/tableforone/m/reservation.html');
        return view('TFO.front.reservation');    
    }
    public function gift(){
        if($this->isMobile()) return redirect('/tableforone/m/gift.html');
        return view('TFO.front.gift');    
    }
    public function giftcard(){
        if($this->isMobile()) return redirect('/tableforone/m/giftcard.html');
        return view('TFO.front.giftcard');    
    }
    public function redeem(){
        if($this->isMobile()) return redirect('/tableforone/m/redeem.html');
        return view('TFO.front.redeem');    
    }



    // 手機
	public function mhome(){ 
		if(!$this->isMobile()) return redirect('/tableforone/index.html');
		return view('TFO.m.home'); 
	}
    public function mabout(){
        if(!$this->isMobile()) return redirect('/tableforone/about.html');
        return view('TFO.m.about');    
    }
    public function mmenu(){
        if(!$this->isMobile()) return redirect('/tableforone/menu.html');
        return view('TFO.m.menu');    
    }
    public function mrules(){
        if(!$this->isMobile()) return redirect('/tableforone/rules.html');
        return view('TFO.m.rules');    
    }
    public function mcontact(){
        if(!$this->isMobile()) return redirect('/tableforone/contact.html');
        return view('TFO.m.contact');    
    }
    public function mqa(){
        if(!$this->isMobile()) return redirect('/tableforone/qa.html');
        return view('TFO.m.qa');    
    }
    public function mreservation(){
        if(!$this->isMobile()) return redirect('/tableforone/reservation.html');
        return view('TFO.m.reservation');    
    }
    public function mgift(){
        if(!$this->isMobile()) return redirect('/tableforone/gift.html');
        return view('TFO.m.gift');    
    }
    public function mgiftcard(){
        if(!$this->isMobile()) return redirect('/tableforone/giftcard.html');
        return view('TFO.m.giftcard');    
    }
    public function mredeem(){
        if(!$this->isMobile()) return redirect('/tableforone/redeem.html');
        return view('TFO.m.redeem');    
    }










































































	public function isMobile()
    {
        // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
        if (isset ($_SERVER['HTTP_X_WAP_PROFILE'])) {
            return TRUE;
        }
        // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
        if (isset ($_SERVER['HTTP_VIA'])) {
            return stristr($_SERVER['HTTP_VIA'], "wap") ? TRUE : FALSE;// 找不到为flase,否则为TRUE
        }
        // 判断手机发送的客户端标志,兼容性有待提高
        if (isset ($_SERVER['HTTP_USER_AGENT'])) {
            $clientkeywords = array(
                'mobile',
                'nokia',
                'sony',
                'ericsson',
                'mot',
                'samsung',
                'htc',
                'sgh',
                'lg',
                'sharp',
                'sie-',
                'philips',
                'panasonic',
                'alcatel',
                'lenovo',
                'iphone',
                'ipod',
                'ipad',
                'blackberry',
                'meizu',
                'android',
                'netfront',
                'symbian',
                'ucweb',
                'windowsce',
                'palm',
                'operamini',
                'operamobi',
                'openwave',
                'nexusone',
                'cldc',
                'midp',
                'wap'
            );
            // 从HTTP_USER_AGENT中查找手机浏览器的关键字
            if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
                return TRUE;
            }
        }
        if (isset ($_SERVER['HTTP_ACCEPT'])) { // 协议法，因为有可能不准确，放到最后判断
            // 如果只支持wml并且不支持html那一定是移动设备
            // 如果支持wml和html但是wml在html之前则是移动设备
            if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== FALSE) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === FALSE || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
                return TRUE;
            }
        }
        return FALSE;
    }
}