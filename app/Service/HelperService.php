<?php
namespace App\Service;
use Mail;
use Log;
use Exception;
use App\model\tgt2\SendMail;

class HelperService {
	// create_at to timeago
	public function toW3CTime(){
		return \Carbon\Carbon::now()->toW3cString();
	}

	// 送出 SMS
	public function sent_single_sms($phone_number,$message,$token = ''){
		try{
            if($token == '') $token = env('SMS_API_TOKEN');
            $phone_number = str_replace('+8860', '0', $phone_number); // 台灣國碼改成 0
            $phone_number = str_replace('+886', '0', $phone_number); // 台灣國碼改成 0
            $phone_number = str_replace('+', '', $phone_number);  // 刪除 + 號
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST','https://api.smartdove.net/index.php?r=smsApi/SendOneSms', [
              'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded'
              ],
              'form_params' => [
                'token'        => $token,
                'phone_number' => $phone_number,
                'content'      => $message,
                //'campaign_id'  =>
                //'response_url' =>
              ]
            ]);
            Log::info($response->getBody());
            // return json_decode($response->getBody(),true);
        } catch (Exception $e){
            Log::error($e);
        }
	    
	}

	// 送出 EMAIL
	public function sent_single_email(){
		config(['mail.driver' => 'mailgun']);
		Mail::send('thegreattipsy.email.order',$mailer,function($m) use ($mailer){
            $m->from('thegreattipsy@surpriselab.com.tw', '明日俱樂部');
            $m->sender('thegreattipsy@surpriselab.com.tw', '明日俱樂部');
            $m->replyTo('thegreattipsy@surpriselab.com.tw', '明日俱樂部');

            $m->to($mailer['email'], $mailer['name']);
            $m->subject('明日俱樂部-訂單完成信件!');
        });
	}

	// 建立 亂數編號
	public function GenerateGiftCodeSN($coupon){
        $random = 8;$SN = '';
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        for($i=1;$i<=$random;$i++){
            $b = $characters[rand(0, strlen($characters)-1)];
            $SN .= $b;
        }
        if($coupon->where('code',$SN)->count()>0){
            $this->GenerateGiftCodeSN();
        } else {
            return $SN;
        }
    }

    // paris 信件寄送
    public function SendEmailParisByTemplateName($data){
        try{
            if(strpos($data['email'],'@yahoo') || strpos($data['email'],'@hotmail')) {
                config(['mail.host' => 'smtp.gmail.com']);
                config(['mail.username' => env('MAIL_PARIS_USER')]);
                config(['mail.password' => env('MAIL_PARIS_PASS')]);
            } else {
                config(['mail.host' => env('MAIL_HOST')]);
                config(['mail.username' => env('MAIL_USERNAME')]);
                config(['mail.password' => env('MAIL_PASSWORD')]);
            }
            Mail::queue('paris.email.'.$data['template'],$data,function($m) use ($data){
                $m->from('lebaldeparis@surpriselab.com.tw', '巴黎舞會');
                $m->sender('lebaldeparis@surpriselab.com.tw', '巴黎舞會');
                $m->replyTo('lebaldeparis@surpriselab.com.tw', '巴黎舞會');
                $m->to($data['email'], $data['name']);
                switch ($data['template']) {
                    case 'order':
                        $m->subject('【 巴黎舞會 】訂位確認信件');
                        break;
                    case 'D2':
                        $m->subject('【巴黎舞會】有誰，你想帶著一起赴約呢？');
                        break;
                    case 'D7':
                        $m->subject('《巴黎舞會 Le Bal de Paris》即將展開，行前你需要知道的九件事');
                        break;
                    case 'undone':
                        $m->subject('【巴黎舞會】慶祝重要日子，還差一步....你完成下訂了嗎？');
                        break;
                    case 'coupon':
                        $m->subject('【巴黎舞會】劃位序號信件');
                        break;
                }
                    
            });
            // 送件紀錄
            \App\model\paris\SendMail::insert([
                'email'    => $data['email'],
                'order_id' => $data['id'],
                'type'     => $data['template'],
            ]);
            return true;
        } catch (Exception $e){
            Log::error($e);
            return false;
        }
    }
    // paris 簡訊寄送
    public function SendSmsParisByTemplateName($smsData){
        try{
            $token = env('PARIS_SMS');
            switch ($smsData['template']) {
                case 'order':
                    $this->sent_single_sms($smsData['phone'],"親愛的賓客，《巴黎舞會》訂位確認信已寄出，請務必查看！若未收到，請至垃圾信匣或促銷內容尋找。\n\n巴黎午夜，不見不散。",$token);
                    break;
                case 'D7':
                    $this->sent_single_sms($smsData['phone'],"親愛的賓客，你好。《巴黎舞會》邀請函已寄至你的信箱，請盡速前往查看。\n內含邀請資訊及舞會地點，非常期待你的蒞臨。",$token);
                    break;
                case 'DX':
                    $this->sent_single_sms($smsData['phone'],"巴黎舞會",$token);
                    break;
            }
            return true;
        } catch (Exception $e) {
            Log::error($e);
            return false;
        }
    }
    // terTP 信件寄送
    public function SendEmailterTPByTemplateName($data){
        try{
            if($data['template'] == 'D5'){
                return false;
            }
            if(strpos($data['email'],'@yahoo') || strpos($data['email'],'@hotmail')) {
                config(['mail.host' => 'smtp.gmail.com']);
                config(['mail.username' => env('MAIL_TERTP_USER')]);
                config(['mail.password' => env('MAIL_TERTP_PASS')]);
            } else {
                config(['mail.host' => env('MAIL_HOST')]);
                config(['mail.username' => env('MAIL_USERNAME')]);
                config(['mail.password' => env('MAIL_PASSWORD')]);
            }
            Mail::queue('terTP.email.'.$data['template'],$data,function($m) use ($data){
                $m->from('mindthegap@surpriselab.com.tw', '落日轉運站-台北站');
                $m->sender('mindthegap@surpriselab.com.tw', '落日轉運站-台北站');
                $m->replyTo('mindthegap@surpriselab.com.tw', '落日轉運站-台北站');
                $m->to($data['email'], $data['name']);
                switch ($data['template']) {
                    case 'order':
                        $m->subject('【落日月台】 訂位確認信');
                        break;
                    case 'D7':
                        $m->subject('【落日月台】旅程即將啟程，行前您需要知道的十件事');
                        break;
                    case 'D5':
                        $event_time = strtotime(date('Y-m-d').' '.$data['time'].':00');
                        $base_time = strtotime(date('Y-m-d').' 17:00:00');
                        // 時間判斷
                        if($event_time<$base_time){
                            $m->subject('【落日月台】在太陽落下之前，一場秘密冒險等著你。');
                        } elseif($event_time>=$base_time){
                            $m->subject('【落日月台】在月亮升起之後，一場秘密冒險等著你。');
                        }
                        break;
                    case 'D3':
                        $m->subject('【落日月台】啟程前，你會需要這個。');
                        break;
                    case 'undone':
                        $m->subject('terTP....你完成下訂了嗎？');
                        break;
                    case 'coupon':
                        $m->subject('【落日月台】劃位序號信件');
                        break;
                }
                    
            });
            // 送件紀錄
            \App\model\terTP\SendMail::insert([
                'email'    => $data['email'],
                'order_id' => $data['id'],
                'type'     => $data['template'],
            ]);
            return true;
        } catch (Exception $e){
            Log::error($e);
            return false;
        }
    }
    // terTP 簡訊寄送
    public function SendSmsterTPByTemplateName($smsData){
        try{
            $token = env('TERMINAL_SMS');// env('PARIS_SMS');
            switch ($smsData['template']) {
                case 'order':
                    $this->sent_single_sms($smsData['phone'],"【落日月台】親愛的旅客，訂位確認信已寄出，請務必前往查看，如未收到，請至垃圾信匣或促銷內容尋找。
願你留心腳步，Mind the gap。",$token);
                    break;
                    /*
                case 'D7':
                    $this->sent_single_sms($smsData['phone'],"臨。",$token);
                    break;
                    */
                case 'DX':
                    // $this->sent_single_sms($smsData['phone'],"【落日月台】親愛的旅客，請於今日預訂場次前20分鐘報到，遲到將無法入場。歡迎參考松菸路線指引➠https://bit.ly/4aoreaT",$token);
                    $this->sent_single_sms($smsData['phone'],"【落日月台】今日場次的旅客需於20分鐘前報到，恕無法提前與代為取票，遲到將無法入場。路線指引歡迎查看落日月台IG精選限動「如何前往月台」。",$token);
                    break;
            }
            return true;
        } catch (Exception $e) {
            Log::error($e);
            return false;
        }
    }

    // dark3 信件寄送
    public function SendEmailByTemplateName($data){
        try{
            // 暫停發送 D7 信件
            if($data['template'] == 'undone') return false;
            // 5/22 (含)的訂單不受到 7 & 14 的信件
            // 0425 (含)的訂單不收到 7 & 14 的信件
            //if($data['template'] == 'D7' || $data['template'] == 'D14'){
            // 0429 修改開放 D7 信件
            if($data['template'] == 'D14'){
                if(isset($data['mday']) && $data['mday']>='2024-04-25'){
                    return false;
                }
            }
            /*
            if($data['template'] == 'order'){
                if(isset($data['mday']) && $data['mday']>='2023-05-22'){
                    $data['template'] = 'order_0522';
                }
            }
            */
            // 230629 暫停發送 D14信件 // dt-mail 中重新啟用
            // if($data['template'] == 'D14'){ return false; }
            if(strpos($data['email'],'@yahoo') || strpos($data['email'],'@hotmail')) {
                config(['mail.host' => 'smtp.gmail.com']);
                config(['mail.username' => env('MAIL_DARK_USER')]);
                config(['mail.password' => env('MAIL_DARK_PASS')]);
            } else {
                config(['mail.host' => env('MAIL_HOST')]);
                config(['mail.username' => env('MAIL_USERNAME')]);
                config(['mail.password' => env('MAIL_PASSWORD')]);
            }
            Mail::queue('dininginthedark3.email.'.$data['template'],$data,function($m) use ($data){
                $m->from('dininginthedark@surpriselab.com.tw', '無光晚餐 Dining In The Dark');
                $m->sender('dininginthedark@surpriselab.com.tw', '無光晚餐 Dining In The Dark');
                $m->replyTo('dininginthedark@surpriselab.com.tw', '無光晚餐 Dining In The Dark');

                // $m->cc(['dininginthedark@surpriselab.com.tw']);
                $m->to($data['email'], $data['name']);
                switch ($data['template']) {
                    case 'couponp2':
                        $m->subject('【無光晚餐】劃位序號信件-雙人套票');
                        break;
                    case 'couponp4':
                        $m->subject('【無光晚餐】劃位序號信件-雙菜單套票');
                        break;
                    case 'order':
                        $m->subject('【無光晚餐】訂位確認信件');
                        break;
                    case 'order_0522':
                        $m->subject('【無光晚餐】訂位確認信件');
                        break;
                    case 'D14':
                        $m->subject('【無光晚餐來信】');
                        break;
                    case 'D7':
                        $m->subject('【無光晚餐】你需要先知道的注意事項 8 Tips for Dining in the Dark');
                        break;
                    case 'undone':
                        $m->subject('【無光晚餐】慶祝重要日子，還差一步....你完成下訂了嗎？');
                        break;
                }
                    
            });
            return true;
        } catch (Exception $e){
            Log::error($e);
            return false;
        }
    }

    // dark3 sms
    public function SendSmsByTemplateName($smsData){
        try{
            // 5/22 (含)的訂單不受到 7 & 14 的信件
            // 0425 (含)的訂單不收到 7 & 14 的簡訊
            /*
            if($smsData['template'] == 'D7'){
                if(isset($data['mday']) && $data['mday']>='2024-04-25'){
                    return false;
                }
            }
            */
            switch ($smsData['template']) {
                case 'order':
                    $requestUrl = 'https://api-ssl.bitly.com/v4/shorten';

                    $header = [
                        'Authorization' => 'Bearer ' . env('BITLY_TOKEN'),
                        'Content-Type'  => 'application/json',
                    ];

                    $data = array_filter([
                        'long_url' => 'https://calendar.google.com/calendar/event?action=TEMPLATE&text=無光晚餐%20Dining%20In%20The%20Dark&dates='.$smsData['gday'].'&location=106台北市大安區仁愛路四段345巷4弄3號&details=&sf=true',
                    ]);

                    try {
                        $request = new \GuzzleHttp\Psr7\Request('POST', $requestUrl, $header, json_encode($data));
                        $client = new \GuzzleHttp\Client();
                        $response = $client->send($request);
                    } catch (\GuzzleHttp\Exception\RequestException $e) {
                        Log::error($e->getMessage());
                    }

                    $statusCode = $response->getStatusCode();
                    $content = $response->getBody()->getContents();

                    $data = json_decode($content, true);
                    $url = '';
                    if (isset($data['link'])) {
                        $url = $data['link'];
                    }

                    if (isset($data['data']['link'])) {
                        $url = $data['data']['link'];
                    }
                    $this->sent_single_sms($smsData['phone'],"【無光晚餐】訂位確認信已寄出\n若未收到，請至垃圾信匣或促銷內容尋找。\n\n加入行事曆：".$url);
                    break;
                case 'D7':
                    // $this->sent_single_sms($smsData['phone'],"【無光晚餐】\n\n行前提醒信已寄至您的信箱，請前往查看。 若未收到，請至垃圾信匣或促銷內容分類尋找。\n\n期待在黑暗中相見\n\n無光晚餐團隊");
                    // $this->sent_single_sms($smsData['phone'],"【無光晚餐預約】嘿，準備好迎接黑暗了嗎？見面之前，請記得到信箱檢查行前提醒信。另提醒為防疫等需求，請依行前確認信中告知時間抵達。期待與你在無光中相見。");
                    $this->sent_single_sms($smsData['phone'],"【無光晚餐】嘿，準備好迎接黑暗了嗎？來訊提醒您有預約無光晚餐。請於訂位時間前準時抵達，「遲到」將無法入場。期待與你在無光中相見。");
                    break;
                case 'DX':
                    // $this->sent_single_sms($smsData['phone'],"【無光晚餐】\n\n您好，來訊提醒您今日有預約無光晚餐。\n\n期待在黑暗中相見\n\n無光晚餐團隊");
                    // $this->sent_single_sms($smsData['phone'],"【無光晚餐】嘿，準備好迎接黑暗了嗎？來訊提醒您今日有預約無光晚餐。請依訂位確認信中告知時間抵達，「遲到」將無法入場。期待與你在無光中相見。");
                    // $this->sent_single_sms($smsData['phone'],"【無光晚餐】嘿，準備好迎接黑暗了嗎？來訊提醒您今日有預約無光晚餐。請依訂位確認信中告知時間抵達，「遲到」將無法入場。若有緊急狀況，請主動致電 02-87739661 與我們聯繫。期待與你在無光中相見。");
                    $this->sent_single_sms($smsData['phone'],"嘿，準備好迎接黑暗了嗎？來訊提醒您今日有預約無光晚餐。請依行前提醒信中告知時間抵達，「遲到」將無法入場。若有緊急狀況，請主動致電02-87739661與我們聯繫。期待與你在無光中相見。");
                    break;


            }
            return true;
        } catch (Exception $e) {
            Log::error($e);
            return false;
        }
    }
    // dark3 行前信寄送


    // terminal 信件寄送
    public function SendTerminalEmailByTemplateName($data){
        try{
            if($data['template'] == 'D10'){
                $overDay = \App\model\terminal\pro::select('day')->whereIn('id',\DB::table('terminal_pro_order')->select('pro_id')->where('order_id',$data['id']))
                    ->where('day','>=','2023-09-22')->count();
                if($overDay>0){ return false;}
            }
            if(strpos($data['email'],'@yahoo') || strpos($data['email'],'@hotmail')) {
                config(['mail.host' => 'smtp.gmail.com']);
                config(['mail.username' => env('MAIL_TERMINAL_USER')]);
                config(['mail.password' => env('MAIL_TERMINAL_PASS')]);
            } else {
                config(['mail.host' => env('MAIL_HOST')]);
                config(['mail.username' => env('MAIL_USERNAME')]);
                config(['mail.password' => env('MAIL_PASSWORD')]);
            }
            Mail::send('terminal.email.'.$data['template'],$data,function($m) use ($data){
                $m->from('terminal@surpriselab.com.tw', '落日轉運站 Sunset Terminal');
                $m->sender('terminal@surpriselab.com.tw', '落日轉運站 Sunset Terminal');
                $m->replyTo('terminal@surpriselab.com.tw', '落日轉運站 Sunset Terminal');

                // $m->cc(['terminal@surpriselab.com.tw']);
                $m->to($data['email'], $data['name']);
                switch ($data['template']) {
                    case 'D7.train':
                    case 'D7.boat':
                    case 'D7.A':
                    case 'D7.B':
                        $m->subject('【落日轉運站】旅程即將啟程，行前您需要知道的十件事');
                        break;
                    case 'D7.flight':
                        $m->subject('【落日轉運站】旅程即將啟程，行前您需要知道的九件事');
                        break;
                    case 'D10':
                        $m->subject('【落日轉運站】準備好了嗎？踏上通往落日的任性之旅');
                        break;
                    case 'undone':
                        $m->subject('【落日轉運站】即將啟航…你的車票和機票完成下訂了嗎？');
                        break;
                }
                    
            });
            return true;
        } catch (Exception $e){
            Log::error($e);
            return false;
        }
    }
    // terminal sms
    public function TerminalSendSMS($smsData){
        try{
            switch ($smsData['template']) {
                case 'DX':
                    $this->sent_single_sms($smsData['phone'],"【落日轉運站】旅程即將啟程，行前溫馨提醒\n乘客您好，很高興今日能邀請您踏上落日轉運站的旅程：)\n乘務員提醒您，旅途中禁止攜帶任何外食、飲品，請於旅程開始前食用完畢。\n\n同時請務必於訂位確認信中指定時間（約班次時間30分鐘前）抵達劃位取票。若您晚於班次時間抵達則恕不入場。\n\n期待您的搭乘，我們稍後轉運站見囉！");
                    break;
            }
            return true;
        } catch (Exception $e) {
            Log::error($e);
            return false;
        }
    }






    // 行前提醒信件寄送
    public function SendPreviewEmail($toData = []){
    	try{
    		if(strpos($toData['email'],'@yahoo')) {
                config(['mail.host' => 'smtp.gmail.com']);
                config(['mail.username' => env('MAIL_TGT_USER')]);
                config(['mail.password' => env('MAIL_TGT_PASS')]);
            } else {
            	config(['mail.host' => env('MAIL_HOST')]);
                config(['mail.username' => env('MAIL_USERNAME')]);
                config(['mail.password' => env('MAIL_PASSWORD')]);
            }
            try {
                Mail::send('thegreattipsy.email.preview'.$toData['type'],$toData,function($m) use ($toData){
                    $m->from('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');
                    $m->sender('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');
                    $m->replyTo('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');

                    $m->to($toData['email'], $toData['name']);
                    switch ($toData['type']) {
                    	case 'D21':
                    		$m->subject('還記得你即將前來開幕酒會嗎？');
                    		break;
                    	case 'D14':
                    		$m->subject('準備好以適合的樣貌前往過去了嗎？');
                            // $m->attach(storage_path('mp3/D21.mp3'), ['as' => 'voice.mp3', 'mime' => 'audio/mp3']);
                    		break;
                    	case 'D10':
                            $day = str_replace('-', '', $toData['day']);
                            $day = substr($day, 4,10);
                    		$m->subject('十三項您需要知道的行前注意事項 / '.$day);
                    		break;
                    	case 'D05':
                    		$m->subject('微醺大飯店的神秘空間');
                    		break;
                        case 'DX':
                            $m->subject('開幕酒會邀請函');
                            break;
                        case 'Name':
                            $m->subject('姓名修改通知');
                            break;
                    }
                    
                });
                // 送件紀錄
                SendMail::insert([
                	'email'    => $toData['email'],
                	'order_id' => $toData['id'],
                    'type'     => $toData['type'],
                ]);
                return true;
            } catch (Exception $e){
                Log::error($e);
                return false;
            }
    	} catch (Exception $e){
            Log::error($e);
            return false;
        }
    }


}