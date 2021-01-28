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
	public function sent_single_sms($phone_number,$message){
		try{
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













    // 行前提醒信件寄送
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
                    $m->from('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');
                    $m->sender('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');
                    $m->replyTo('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');

                    $m->to($toData['email'], $toData['name']);
                    switch ($toData['type']) {
                    	case 'D21':
                    		$m->subject('【微醺大飯店：1980s】 還記得你即將前來開幕酒會嗎？');
                    		break;
                    	case 'D14':
                    		$m->subject('【微醺大飯店：1980s】 準備好以適合的樣貌前往過去了嗎？');
                            // $m->attach(storage_path('mp3/D21.mp3'), ['as' => 'voice.mp3', 'mime' => 'audio/mp3']);
                    		break;
                    	case 'D10':
                            $day = str_replace('-', '', $toData['day']);
                            $day = substr($day, 4,10);
                    		$m->subject('【微醺大飯店：1980s】 十三項您需要知道的行前注意事項 / '.$day);
                    		break;
                    	case 'D05':
                    		$m->subject('【微醺大飯店：1980s】 ');
                    		break;
                        case 'DX':
                            $m->subject('【微醺大飯店：1980s】 開幕酒會邀請函');
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