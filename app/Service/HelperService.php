<?php
namespace App\Service;
use Mail;
use Exception;

class HelperService {
	// create_at to timeago
	public function toW3CTime(){
		return \Carbon\Carbon::now()->toW3cString();
	}

	// 送出 SMS
	public function sent_single_sms($phone_number,$message){
		//$message = "[ 嘿！你有一則來自《明日俱樂部》的訊息 ]\n\n一切即將開始 - 進入以下連結，你將與《明日俱樂部》正式連接：https://bit.ly/316nSWM \n\n記住，連結將在期限內自動銷毀，請把握時間。";
		//$message = "[你有一則來自《明日俱樂部》的新訊息]\n\n你的進入申請已送出。\n請立刻點擊以下連結，與《明日俱樂部》正式連接。\n連結將在期限內自動銷毀，請把握時間：http://bit.ly/316nSWM";
		//$message = "[嘿！你有一則來自《明日俱樂部》的新訊息。]\n\n通往另一個世界的大門，將在以下連結內開啟。\n連結將在期限內自動銷毀，請把握時間：https://pse.is/JH4R4";
	    $client = new \GuzzleHttp\Client();
	    $response = $client->request('POST','https://api.smartdove.net/index.php?r=smsApi/SendOneSms', [
	      'headers' => [
	        'Content-Type' => 'application/x-www-form-urlencoded'
	      ],
	      'form_params' => [
	        'token'        => env('SMS_API_TOKEN'),
	        'phone_number' => $phone_number,
	        'content'      => $message,
	        //'campaign_id'  =>
	        //'response_url' =>
	      ]
	    ]);
	    return json_decode($response->getBody(),true);
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













    // 21 天
    public function SendPreviewEmail($toData = []){
    	try{
    		if(strpos($toData['email'],'@yahoo') || strpos($toData['email'],'@hotmail')) {
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
                    $m->from('thegreattipsy@surpriselab.com.tw', '微醺大飯店');
                    $m->sender('thegreattipsy@surpriselab.com.tw', '微醺大飯店');
                    $m->replyTo('thegreattipsy@surpriselab.com.tw', '微醺大飯店');

                    $m->to($toData['email'], $toData['name']);
                    switch ($toData['type']) {
                    	case 'D21':
                    		$m->subject('21');
                    		$m->attach($pathToFile, ['as' => $display, 'mime' => 'audio/mp3']);
                    		break;
                    	case 'D14':
                    		$m->subject('14');
                    		break;
                    	case 'D10':
                    		$m->subject('10');
                    		break;
                    	case 'D05':
                    		$m->subject('05');
                    		break;
                    	case 'D01':
                    		$m->subject('01');
                    		$m->attach($pathToFile, ['as' => $display, 'mime' => 'audio/mp3']);
                    		break;
                    }
                    
                });
                // 送件紀錄
                
            } catch (Exception $e){
                Log::error($e);
            }
    	} catch (Exception $e){
            Log::error($e);
        }
    }


}