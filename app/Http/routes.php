<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
if(App::environment('local')) {
    $url = 'suprise.local';
}else if(App::environment('bymail')) {
    $url = 'suprise';
}else if(App::environment('tester')) {
    $url = 'hellokiki.info';
}else if(App::environment('dev')) {
    $url = 'dev.surpriselab.com.tw';
}else if(App::environment('production')) {
    $url = 'surpriselab.com.tw';
}else {
    $url = '';
}
/*
Route::get('/', function () {
    return view('welcome');
});
*/
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

// 管理
Route::group(['domain' => 'master.'.$url,'middleware' => ['web']], function() {
    // deploy 
    Route::post('/deploy/suprise', 'DeployController@supriseDeploy'); 

    /*backstage login*/
    Route::get('login','LoginController@index'); //連結資料，基本的連結 response
    Route::post('login','LoginController@session'); //接收post資料
    Route::get('logout','LoginController@logout'); //登出

    /*backstage*/
    Route::resource('news','NewsController'); //resource 是指依照原始規則走
    Route::resource('email','EmailController');
    Route::resource('admin','AdminController');

    Route::get('acts','BackendController@acts');
    Route::get('act','BackendController@act');
    Route::post('actstore','BackendController@actstore');
    Route::delete('{aid}/actdelete','BackendController@actdelete');

    Route::get('act/{aid}/orders','BackendController@orders');
    Route::get('act/{aid}/order/{oid}','BackendController@order');
    Route::post('orderstore','BackendController@orderstore');

    Route::get('orderlist','BackendController@orderlist');
    Route::get('printdaily','BackendController@printdaily');

    Route::get('contacts','BackendController@contacts');
    Route::get('contact/{cid}','BackendController@contact');
    Route::post('contactstore','BackendController@contactstore');
    Route::delete('contact/{cid}/delete','BackendController@deleteContact');

    Route::get('/welcome','TFO\BackController@Welcome');

    Route::group(['prefix' => 'TableForOne'], function(){
        // 場次
        Route::get('rooms','TFO\BackController@Rooms');
        Route::get('room/{id}/edit','TFO\BackController@RoomEdit');
        Route::post('room/{id}/update','TFO\BackController@RoomUpdate');
        Route::delete('room/{id}/delete','TFO\BackController@RoomDelete');
        Route::post('rooms','TFO\BackController@Rooms');

        // 訂單
        Route::get('orders/{id}','TFO\BackController@Orders');
        Route::get('order/{id}/edit','TFO\BackController@OrderEdit');
        Route::post('order/{id}/update','TFO\BackController@OrderUpdate');
        Route::delete('order/{id}/delete','TFO\BackController@OrderDelete');
        Route::get('order/{pro_id}/appointment','TFO\BackController@Appointment');  // 後臺預約
        Route::post('order/{pro_id}/appointmentUpdate','TFO\BackController@AppointmentUpdate');

        // 聯絡我們
        Route::get('contacts','TFO\BackController@Contacts');
        Route::get('contact/{id}/edit','TFO\BackController@ContactEdit');
        Route::post('contact/{id}/update','TFO\BackController@ContactUpdate');
        Route::delete('contact/{id}/delete','TFO\BackController@ContactDelete');

        // Gift
        Route::get('gifts','TFO\BackController@Gifts');
        Route::get('gift/{id}/edit','TFO\BackController@GiftEdit');
        Route::post('gift/{id}/update','TFO\BackController@GiftUpdate');
        Route::delete('gift/{id}/delete','TFO\BackController@GiftDelete');

        Route::post('gift/{id}/sendUpdate','TFO\BackController@sendUpdate');
        Route::get('GiftsToCsv','TFO\BackController@GiftsToCsv');
        Route::get('GiftsCoverToCsv','TFO\BackController@GiftsCoverToCsv');

        // 報表列印
        Route::get('print','TFO\BackController@Print');
        Route::get('table','TFO\BackController@Table');
    });

    // Dark2
    Route::group(['prefix' => 'dark2'], function(){

        // 聯絡我們
        Route::get('contacts','Dark2\BackController@Contacts');
        Route::get('contact/{id}/edit','Dark2\BackController@ContactEdit');
        Route::post('contact/{id}/update','Dark2\BackController@ContactUpdate');
        Route::delete('contact/{id}/delete','Dark2\BackController@ContactDelete');

        // backme data
        Route::get('backmes','Dark2\BackController@BackMes');
        Route::get('backme/{id}','Dark2\BackController@BackMe');
        Route::delete('backme/{id}/delete','Dark2\BackController@BackMeDelete');
        Route::post('backmes/{id}/sentcoupon','Dark2\BackController@SentCouponCode');
        Route::post('backmes/{id}/sendUpdate','Dark2\BackController@sendUpdate');
        Route::post('backmes/{id}/sendManageUpdate','Dark2\BackController@sendManageUpdate');
        Route::post('backmes/{id}/infoUpdate','Dark2\BackController@infoUpdate');
        Route::post('backmes/CanelCoupon','Dark2\BackController@CanelCoupon');
        Route::get('backmenouse/xls','Dark2\BackController@NotUseXls');
        Route::post('uploadxlsx','Dark2\BackController@UploadXlsx2Db');

        // coupon
        Route::get('coupons','Dark2\BackController@Coupons');
        Route::get('coupon/{id}','Dark2\BackController@Coupon');
        Route::delete('coupon/{id}/delete','Dark2\BackController@CouponDelete');

        // 營業日
        Route::get('pros','Dark2\BackController@Pros');
        Route::get('pro/{id}/edit','Dark2\BackController@ProEdit');
        Route::post('pro/{id}/update','Dark2\BackController@ProUpdate');
        Route::delete('pro/{id}/delete','Dark2\BackController@ProDelete');
        Route::post('pros','Dark2\BackController@Pros');
        Route::post('pros/output/only','Dark2\BackController@ProOutputSite');

        // 訂單
        Route::get('orders/{id}','Dark2\BackController@Orders');
        Route::get('order/{id}/edit','Dark2\BackController@OrderEdit');
        Route::post('order/{id}/update','Dark2\BackController@OrderUpdate');
        Route::delete('order/{id}/delete','Dark2\BackController@OrderDelete');
        Route::get('order/{pro_id}/appointment','Dark2\BackController@Appointment');  // 後臺預約
        Route::post('order/{pro_id}/appointmentUpdate','Dark2\BackController@AppointmentUpdate');

        // 報表列印
        Route::get('print','Dark2\BackController@Print');
        Route::get('table','Dark2\BackController@Table');
        Route::get('xls/data/output','Dark2\BackController@XlsDataOuput');
        Route::get('xls/emaildata/output','Dark2\BackController@XlsEmailDataOuput');
        Route::post('order/{id}/resent','Dark2\BackController@beSentOrderMail');


        //Route::get('gg','Dark2\BackController@gg');

        //Route::get('test','Dark2\BackController@Xls2Db');
        //Route::get('cup','Dark2\BackController@Db2Coupon');
        //Route::get('');
    });
    // 無光晚餐 S3
    Route::group(['prefix' => 'dark3'], function(){
        Route::get('backmes','dark3\BackController@BackMes');
        Route::post('backmes','dark3\BackController@BackMes');
        Route::get('backme/{id}','dark3\BackController@BackMe');
        Route::delete('backme/{id}/delete','dark3\BackController@BackMeDelete');
        Route::post('backmes/{id}/sentcoupon','dark3\BackController@SentCouponCode');
        Route::post('backmes/{id}/sendUpdate','dark3\BackController@sendUpdate');
        Route::post('backmes/{id}/sendManageUpdate','dark3\BackController@sendManageUpdate');
        Route::post('backmes/{id}/infoUpdate','dark3\BackController@infoUpdate');
        Route::post('backmes/CanelCoupon','dark3\BackController@CanelCoupon');
        Route::get('backmenouse/xls','dark3\BackController@NotUseXls');
        Route::post('uploadxlsx','dark3\BackController@UploadXlsx2Db');

        // coupon
        Route::get('coupons','dark3\BackController@Coupons');
        Route::get('coupon/{id}','dark3\BackController@Coupon');
        Route::delete('coupon/{id}/delete','dark3\BackController@CouponDelete');

        // 營業日
        Route::get('pros','dark3\BackController@Pros');
        Route::get('pro/{id}/edit','dark3\BackController@ProEdit');
        Route::post('pro/{id}/update','dark3\BackController@ProUpdate');
        Route::delete('pro/{id}/delete','dark3\BackController@ProDelete');
        Route::post('pros','dark3\BackController@Pros');
        Route::post('pros/output/only','dark3\BackController@ProOutputSite');

        // 訂單
        Route::get('orders/{id}','dark3\OrderController@Orders');
        Route::get('order/{id}/edit','dark3\OrderController@OrderEdit');
        Route::post('order/{id}/update','dark3\OrderController@OrderUpdate');
        Route::delete('order/{id}/delete','dark3\OrderController@OrderDelete');
        Route::get('order/{pro_id}/appointment','dark3\OrderController@Appointment');  // 後臺預約
        Route::post('order/{pro_id}/appointmentUpdate','dark3\OrderController@AppointmentUpdate');

        // 報表列印
        Route::get('print','dark3\OrderController@Print');
        Route::get('table','dark3\OrderController@Table');
        Route::get('xls/data/output','dark3\OrderController@XlsDataOuput');
        Route::get('xls/emaildata/output','dark3\OrderController@XlsEmailDataOuput');
        Route::post('order/{id}/resent','dark3\OrderController@beSentOrderMail');

        // 發票相關
        Route::post('order/inv/single/open','dark3\InvController@singleInvOpne');
        Route::post('order/inv/mult/open','dark3\InvController@muInvOpen');
        Route::post('order/inv/cancal','dark3\InvController@InvClose');

        // 主揪相關
        Route::post('getMasterData', 'dark3\MasterController@getMasterAndSend');
        Route::post('postReSendMail', 'dark3\MasterController@postReSendMail');
        Route::post('postReSendSMS', 'dark3\MasterController@postReSendSMS');
        Route::get('getMasterList','dark3\MasterController@getMasterList');
        Route::post('postMaster/{id}/store','dark3\MasterController@postMasterStore');
        Route::delete('postMaster/{id}/delete','dark3\MasterController@postMasterDelete');

        // 特殊場次設定
        Route::get('special/setting', 'dark3\SpecialController@getSpecialSetting');
        Route::get('discount/setting', 'dark3\SpecialController@getDiscountSetting');
        Route::post('setting/store', 'dark3\SpecialController@postSettingStore');
    });

    // 落日轉運站 S3
    Route::group(['prefix' => 'terminal'], function(){
        Route::get('backmes','terminal\BackController@BackMes');
        Route::post('backmes','terminal\BackController@BackMes');
        Route::get('backme/{id}','terminal\BackController@BackMe');
        Route::delete('backme/{id}/delete','terminal\BackController@BackMeDelete');
        Route::post('backmes/{id}/sentcoupon','terminal\BackController@SentCouponCode');
        Route::post('backmes/{id}/sendUpdate','terminal\BackController@sendUpdate');
        Route::post('backmes/{id}/sendManageUpdate','terminal\BackController@sendManageUpdate');
        Route::post('backmes/{id}/infoUpdate','terminal\BackController@infoUpdate');
        Route::post('backmes/CanelCoupon','terminal\BackController@CanelCoupon');
        Route::get('backmenouse/xls','terminal\BackController@NotUseXls');
        Route::post('uploadxlsx','terminal\BackController@UploadXlsx2Db');

        // coupon
        Route::get('coupons','terminal\BackController@Coupons');
        Route::get('coupon/{id}','terminal\BackController@Coupon');
        Route::delete('coupon/{id}/delete','terminal\BackController@CouponDelete');

        // 營業日
        Route::get('pros','terminal\BackController@Pros');
        Route::get('pro/{id}/edit','terminal\BackController@ProEdit');
        Route::post('pro/{id}/update','terminal\BackController@ProUpdate');
        Route::delete('pro/{id}/delete','terminal\BackController@ProDelete');
        Route::post('pros','terminal\BackController@Pros');
        Route::post('pros/output/only','terminal\BackController@ProOutputSite');

        // 訂單
        Route::get('orders/{id}','terminal\OrderController@Orders');
        Route::get('order/{id}/edit','terminal\OrderController@OrderEdit');
        Route::post('order/{id}/update','terminal\OrderController@OrderUpdate');
        Route::delete('order/{id}/delete','terminal\OrderController@OrderDelete');
        Route::get('order/{pro_id}/appointment','terminal\OrderController@Appointment');  // 後臺預約
        Route::post('order/{pro_id}/appointmentUpdate','terminal\OrderController@AppointmentUpdate');

        // 報表列印
        Route::get('print','terminal\OrderController@Print');
        Route::get('table','terminal\OrderController@Table');
        Route::get('xls/data/output','terminal\OrderController@XlsDataOuput');
        Route::get('xls/emaildata/output','terminal\OrderController@XlsEmailDataOuput');
        Route::post('order/{id}/resent','terminal\OrderController@beSentOrderMail');

        // 發票相關
        Route::post('order/inv/single/open','terminal\InvController@singleInvOpne');
        Route::post('order/inv/mult/open','terminal\InvController@muInvOpen');
        Route::post('order/inv/cancal','terminal\InvController@InvClose');

        // 主揪相關
        Route::post('getMasterData', 'terminal\MasterController@getMasterAndSend');
        Route::post('postReSendMail', 'terminal\MasterController@postReSendMail');
        Route::post('postReSendSMS', 'terminal\MasterController@postReSendSMS');
        Route::get('getMasterList','terminal\MasterController@getMasterList');
        Route::post('postMaster/{id}/store','terminal\MasterController@postMasterStore');
        Route::delete('postMaster/{id}/delete','terminal\MasterController@postMasterDelete');

        // 特殊場次設定
        Route::get('special/setting', 'terminal\SpecialController@getSpecialSetting');
        Route::get('discount/setting', 'terminal\SpecialController@getDiscountSetting');
        Route::post('setting/store', 'terminal\SpecialController@postSettingStore');
    });



    // 微醺大飯店 S1
    Route::group(['prefix' => 'thegreattipsy'], function(){
        Route::get('backmes','tgt\BackController@BackMes');
        Route::get('backme/{id}','tgt\BackController@BackMe');
        Route::delete('backme/{id}/delete','tgt\BackController@BackMeDelete');
        Route::post('backmes/{id}/sentcoupon','tgt\BackController@SentCouponCode');
        Route::post('backmes/{id}/sendUpdate','tgt\BackController@sendUpdate');
        Route::post('backmes/{id}/sendManageUpdate','tgt\BackController@sendManageUpdate');
        Route::post('backmes/{id}/infoUpdate','tgt\BackController@infoUpdate');
        Route::post('backmes/CanelCoupon','tgt\BackController@CanelCoupon');
        Route::get('backmenouse/xls','tgt\BackController@NotUseXls');
        Route::post('uploadxlsx','tgt\BackController@UploadXlsx2Db');

        // coupon
        Route::get('coupons','tgt\BackController@Coupons');
        Route::get('coupon/{id}','tgt\BackController@Coupon');
        Route::delete('coupon/{id}/delete','tgt\BackController@CouponDelete');

        // 營業日
        Route::get('pros','tgt\BackController@Pros');
        Route::get('pro/{id}/edit','tgt\BackController@ProEdit');
        Route::post('pro/{id}/update','tgt\BackController@ProUpdate');
        Route::delete('pro/{id}/delete','tgt\BackController@ProDelete');
        Route::post('pros','tgt\BackController@Pros');
        Route::post('pros/output/only','tgt\BackController@ProOutputSite');

        // 訂單
        Route::get('orders/{id}','tgt\BackController@Orders');
        Route::get('order/{id}/edit','tgt\BackController@OrderEdit');
        Route::post('order/{id}/update','tgt\BackController@OrderUpdate');
        Route::delete('order/{id}/delete','tgt\BackController@OrderDelete');
        Route::get('order/{pro_id}/appointment','tgt\BackController@Appointment');  // 後臺預約
        Route::post('order/{pro_id}/appointmentUpdate','tgt\BackController@AppointmentUpdate');

        // 報表列印
        Route::get('print','tgt\BackController@Print');
        Route::get('table','tgt\BackController@Table');
        Route::get('xls/data/output','tgt\BackController@XlsDataOuput');
        Route::get('xls/emaildata/output','tgt\BackController@XlsEmailDataOuput');
        Route::post('order/{id}/resent','tgt\BackController@beSentOrderMail');
    });
    // 微醺大飯店 S2
    Route::group(['prefix' => 'thegreattipsyS2'], function(){
        Route::get('backmes','tgt2\BackController@BackMes');
        Route::post('backmes','tgt2\BackController@BackMes');
        Route::get('backme/{id}','tgt2\BackController@BackMe');
        Route::delete('backme/{id}/delete','tgt2\BackController@BackMeDelete');
        Route::post('backmes/{id}/sentcoupon','tgt2\BackController@SentCouponCode');
        Route::post('backmes/{id}/sendUpdate','tgt2\BackController@sendUpdate');
        Route::post('backmes/{id}/sendManageUpdate','tgt2\BackController@sendManageUpdate');
        Route::post('backmes/{id}/infoUpdate','tgt2\BackController@infoUpdate');
        Route::post('backmes/CanelCoupon','tgt2\BackController@CanelCoupon');
        Route::get('backmenouse/xls','tgt2\BackController@NotUseXls');
        Route::post('uploadxlsx','tgt2\BackController@UploadXlsx2Db');

        // coupon
        Route::get('coupons','tgt2\BackController@Coupons');
        Route::get('coupon/{id}','tgt2\BackController@Coupon');
        Route::delete('coupon/{id}/delete','tgt2\BackController@CouponDelete');

        // 營業日
        Route::get('pros','tgt2\BackController@Pros');
        Route::get('pro/{id}/edit','tgt2\BackController@ProEdit');
        Route::post('pro/{id}/update','tgt2\BackController@ProUpdate');
        Route::delete('pro/{id}/delete','tgt2\BackController@ProDelete');
        Route::post('pros','tgt2\BackController@Pros');
        Route::post('pros/output/only','tgt2\BackController@ProOutputSite');

        // 訂單
        Route::get('orders/{id}','tgt2\BackController@Orders');
        Route::get('order/{id}/edit','tgt2\BackController@OrderEdit');
        Route::post('order/{id}/update','tgt2\BackController@OrderUpdate');
        Route::delete('order/{id}/delete','tgt2\BackController@OrderDelete');
        Route::get('order/{pro_id}/appointment','tgt2\BackController@Appointment');  // 後臺預約
        Route::post('order/{pro_id}/appointmentUpdate','tgt2\BackController@AppointmentUpdate');

        // 報表列印
        Route::get('print','tgt2\BackController@Print');
        Route::get('table','tgt2\BackController@Table');
        Route::get('xls/data/output','tgt2\BackController@XlsDataOuput');
        Route::get('xls/emaildata/output','tgt2\BackController@XlsEmailDataOuput');
        Route::post('order/{id}/resent','tgt2\BackController@beSentOrderMail');

        // 發票相關
        Route::post('order/inv/single/open','tgt2\InvController@singleInvOpne');
        Route::post('order/inv/mult/open','tgt2\InvController@muInvOpen');
        Route::post('order/inv/cancal','tgt2\InvController@InvClose');

        // 主揪相關
        Route::post('getMasterData', 'tgt2\MasterController@getMasterAndSend');
        Route::post('postReSendMail', 'tgt2\MasterController@postReSendMail');
        Route::post('postReSendSMS', 'tgt2\MasterController@postReSendSMS');
        Route::get('getMasterList','tgt2\MasterController@getMasterList');
        // Route::get('getMaster/{id}/edit','tgt2\MasterController@postReSendMail');
        Route::post('postMaster/{id}/store','tgt2\MasterController@postMasterStore');
        Route::delete('postMaster/{id}/delete','tgt2\MasterController@postMasterDelete');

        // 特殊場次設定
        Route::get('special/setting', 'tgt2\SpecialController@getSpecialSetting');
        Route::get('discount/setting', 'tgt2\SpecialController@getDiscountSetting');
        Route::post('setting/store', 'tgt2\SpecialController@postSettingStore');


    });


    Route::group(['prefix' => 'clubtomorrow'], function(){
        // SMS
        Route::get('sms','clubT\BackController@sms');
        Route::post('sms','clubT\BackController@sms');
        // 其他功能
        Route::get('backmes','clubT\BackController@BackMes');
        Route::post('backmes','clubT\BackController@BackMes');
        Route::get('backme/{id}','clubT\BackController@BackMe');
        Route::delete('backme/{id}/delete','clubT\BackController@BackMeDelete');
        Route::post('backmes/{id}/sentcoupon','clubT\BackController@SentCouponCode');
        Route::post('backmes/{id}/sendUpdate','clubT\BackController@sendUpdate');
        Route::post('backmes/{id}/sendManageUpdate','clubT\BackController@sendManageUpdate');
        Route::post('backmes/{id}/infoUpdate','clubT\BackController@infoUpdate');
        Route::post('backmes/CanelCoupon','clubT\BackController@CanelCoupon');
        Route::get('backmenouse/xls','clubT\BackController@NotUseXls');
        Route::post('uploadxlsx','clubT\BackController@UploadXlsx2Db');

        // coupon
        Route::get('coupons','clubT\BackController@Coupons');
        Route::get('coupon/{id}','clubT\BackController@Coupon');
        Route::delete('coupon/{id}/delete','clubT\BackController@CouponDelete');

        // 營業日
        Route::get('pros','clubT\BackController@Pros');
        Route::get('pro/{id}/edit','clubT\BackController@ProEdit');
        Route::post('pro/{id}/update','clubT\BackController@ProUpdate');
        Route::delete('pro/{id}/delete','clubT\BackController@ProDelete');
        Route::post('pros','clubT\BackController@Pros');
        Route::post('pros/output/only','clubT\BackController@ProOutputSite');

        // 訂單
        Route::get('orders/{id}','clubT\BackController@Orders');
        Route::get('order/{id}/edit','clubT\BackController@OrderEdit');
        Route::post('order/{id}/update','clubT\BackController@OrderUpdate');
        Route::delete('order/{id}/delete','clubT\BackController@OrderDelete');
        Route::get('order/{pro_id}/appointment','clubT\BackController@Appointment');  // 後臺預約
        Route::post('order/{pro_id}/appointmentUpdate','clubT\BackController@AppointmentUpdate');

        // 報表列印
        Route::get('print','clubT\BackController@Print');
        Route::get('table','clubT\BackController@Table');
        Route::get('xls/data/output','clubT\BackController@XlsDataOuput');
        Route::get('xls/emaildata/output','clubT\BackController@XlsEmailDataOuput');
        Route::post('order/{id}/resent','clubT\BackController@beSentOrderMail');
        Route::post('order/{id}/resent12','clubT\BackController@beSentOrderMail12');

        // 發票相關
        Route::post('order/inv/single/open','clubT\InvController@singleInvOpne');
        Route::post('order/inv/mult/open','clubT\InvController@muInvOpen');
        Route::post('order/inv/cancal','clubT\InvController@InvClose');
    });

    Route::group(['prefix' => 'surprise'], function(){
        Route::get('wishs','SurpriseLabHome\BackController@wishs');
        Route::get('wish/{id}/modify','SurpriseLabHome\BackController@wish');
        Route::post('wish/{id}/store','SurpriseLabHome\BackController@storeWish');
    });
});


Route::group(['middleware' => ['web']], function () {
    if(env('APP_ENV') != 'production'){
        Route::get('/',function(){  return redirect("/tw"); });
        Route::group(['prefix' => 'tw'], function(){
            Route::get('/',function(){ return view('SurpriseLabHome.home'); });
            Route::get('/index.html',function(){ return view('SurpriseLabHome.home'); });
            Route::get('/project.html',function(){ return view('SurpriseLabHome.project'); });
            Route::get('/team.html',function(){ return view('SurpriseLabHome.team'); });
            Route::get('/terms.html',function(){ return view('SurpriseLabHome.terms'); });
            Route::get('/ticket.html','SurpriseLabHome\FrontController@getTicket');
            Route::get('/project/{name?}','SurpriseLabHome\FrontController@projects');
        });
        Route::post('/storeWish','SurpriseLabHome\FrontController@storeWish');
    } else {
        Route::get('/',function(){ return view('landingPage.home'); });
        /*surprise*/
        //Route::resource('/','SurpriseController');
        Route::get('/about','SurpriseController@about');
        Route::get('/complete','SurpriseController@complete');
        Route::get('/fail','SurpriseController@fail');
    }
    
    Route::get('dininginthedark/{everything?}', function ($everything = null) {
        return redirect(config('setting.dark2.path'))->send();
    });
    /* frontend */
    Route::group(['prefix' => 'dininginthedark'], function(){
        Route::get('about.html',function(){ return view('frontend.about'); });
        Route::get('chef.html',function(){ return view('frontend.chef'); });
        Route::get('rules.html',function(){ return view('frontend.rules'); });
        Route::get('contact.html',function(){ return view('frontend.contact'); });
        Route::get('index.html',function(){ return view('frontend.home'); });
        Route::get('/',function(){ return view('frontend.home'); });
        Route::get('reservation.html',function(){ return view('frontend.reservation'); });
        Route::get('people.html',function(){ return view('frontend.people'); });
        Route::get('event.html',function(){ return view('frontend.event'); });
        Route::get('event-landing.html',function(){ return view('frontend.event-landing'); });
        Route::get('press.html',function(){ return view('frontend.press'); });
        Route::get('event_{page}.html',function(Request $request,$page){ return view('frontend.event-'.$page); });
        Route::post('ReOrderData','FrontendController@ReOrderData');
        Route::post('getPayDone','FrontendController@getPayDone');
//Route::get('test',function(){ return view('frontend.payfail'); });
        Route::group(['prefix' => 'en'], function(){
            Route::get('about.html',function(){ App::setLocale('en'); return view('frontend.about'); });
            Route::get('chef.html',function(){ App::setLocale('en'); return view('frontend.chef'); });
            Route::get('rules.html',function(){ App::setLocale('en'); return view('frontend.rules'); });
            Route::get('contact.html',function(){ App::setLocale('en'); return view('frontend.contact'); });
            Route::get('index.html',function(){ App::setLocale('en'); return view('frontend.home'); });
            Route::get('/',function(){ App::setLocale('en'); return view('frontend.home'); });
            Route::get('reservation.html',function(){ App::setLocale('en'); return view('frontend.reservation'); });
            Route::get('people.html',function(){ App::setLocale('en'); return view('frontend.people'); });
            Route::get('press.html',function(){ App::setLocale('en'); return view('frontend.press'); });
            Route::get('event.html',function(){ App::setLocale('en'); return view('frontend.event'); });
            Route::get('event-landing.html',function(){ App::setLocale('en'); return view('frontend.event-landing'); });
            Route::get('event_{page}.html',function(Request $request,$page){ return view('frontend.event-'.$page); });
        });
    });
    
    Route::post('/frontcontactstore','FrontendController@contactstore');
    // 動態取得資料
    Route::get('GetAjaxData','FrontendController@GetAjaxData');

    // 存入資料
    Route::post('contact','HomeController@contact');
    Route::post('storeres','HomeController@storeres');
    Route::post('checkres','HomeController@checkres');
    


    // Table For One
    Route::group(['prefix' => 'tableforone'], function(){
        Route::get('index.html','TFO\TurnPageController@home');
        Route::get('/',function(){ return redirect("/tableforone/index.html"); });
        Route::get('about.html','TFO\TurnPageController@about');
        Route::get('menu.html','TFO\TurnPageController@menu');
        Route::get('rules.html','TFO\TurnPageController@rules');
        Route::get('contact.html','TFO\TurnPageController@contact');
        Route::get('qa.html','TFO\TurnPageController@qa');
        Route::get('reservation.html',function(){ return redirect("/tableforone/index.html"); });
        Route::get('gift.html',function(){ return redirect("/tableforone/index.html"); });
        Route::get('giftcard.html',function(){ return redirect("/tableforone/index.html"); });
        Route::get('redeem.html','TFO\TurnPageController@redeem');



        Route::group(['prefix' => 'm'], function(){
            Route::get('index.html','TFO\TurnPageController@mhome');
            Route::get('/',function(){ return redirect("/tableforone/m/index.html"); });
            Route::get('about.html','TFO\TurnPageController@mabout');
            Route::get('menu.html','TFO\TurnPageController@mmenu');
            Route::get('rules.html','TFO\TurnPageController@mrules');
            Route::get('contact.html','TFO\TurnPageController@mcontact');
            Route::get('qa.html','TFO\TurnPageController@mqa');
            Route::get('reservation.html',function(){ return redirect("/tableforone/index.html"); });
            Route::get('gift.html',function(){ return redirect("/tableforone/index.html"); });
            Route::get('giftcard.html',function(){ return redirect("/tableforone/index.html"); });
            Route::get('redeem.html','TFO\TurnPageController@mredeem');

            Route::get('ECPaySuccess','TFO\FrontController@ECPaySuccess');
            Route::get('ECPayFail',function(){ return view('TFO.m.ECPayFail'); });


            Route::post('CashPay','TFO\FrontController@CashPay');
            Route::get('CashPay','TFO\FrontController@CashPay');




        });

        Route::group(['prefix' => 'en'], function(){
            Route::get('index.html',function(){ App::setLocale('en'); return view('TFO.front.home'); });
            Route::get('/',function(){ App::setLocale('en'); return redirect("/tableforone/index.html"); });
            Route::get('about.html',function(){ App::setLocale('en'); return view('TFO.front.about'); });
            Route::get('menu.html',function(){ App::setLocale('en'); return view('TFO.front.menu'); });
            Route::get('rules.html',function(){ App::setLocale('en'); return view('TFO.front.rules'); });
            Route::get('contact.html',function(){ App::setLocale('en'); return view('TFO.front.contact'); });
            Route::get('qa.html',function(){ App::setLocale('en'); return view('TFO.front.qa'); });
            //Route::get('reservation.html',function(){ App::setLocale('en'); return view('TFO.front.reservation'); });
            //Route::get('gift.html',function(){ App::setLocale('en'); return view('TFO.front.gift'); });
            //Route::get('giftcard.html',function(){ App::setLocale('en'); return view('TFO.front.giftcard'); });
            Route::get('redeem.html',function(){ App::setLocale('en'); return view('TFO.front.redeem'); });

            Route::get('ECPaySuccess','TFO\FrontController@ECPaySuccess');
            Route::get('ECPayFail',function(){ App::setLocale('en'); return view('TFO.front.ECPayFail'); });

            Route::post('CashPay','TFO\FrontController@CashPay');
            Route::get('CashPay','TFO\FrontController@CashPay');
        });

        Route::group(['prefix' => 'm.en'], function(){
            Route::get('index.html',function(){ App::setLocale('en'); return view('TFO.m.home'); });
            Route::get('/',function(){ App::setLocale('en'); return redirect("/tableforone/index.html"); });
            Route::get('about.html',function(){ App::setLocale('en'); return view('TFO.m.about'); });
            Route::get('menu.html',function(){ App::setLocale('en'); return view('TFO.m.menu'); });
            Route::get('rules.html',function(){ App::setLocale('en'); return view('TFO.m.rules'); });
            Route::get('contact.html',function(){ App::setLocale('en'); return view('TFO.m.contact'); });
            Route::get('qa.html',function(){ App::setLocale('en'); return view('TFO.m.qa'); });
            //Route::get('reservation.html',function(){ App::setLocale('en'); return view('TFO.m.reservation'); });
            //Route::get('gift.html',function(){ App::setLocale('en'); return view('TFO.m.gift'); });
            //Route::get('giftcard.html',function(){ App::setLocale('en'); return view('TFO.m.giftcard'); });
            Route::get('redeem.html',function(){ App::setLocale('en'); return view('TFO.m.redeem'); });

            Route::get('ECPaySuccess','TFO\FrontController@ECPaySuccess');
            Route::get('ECPayFail',function(){ App::setLocale('en'); return view('TFO.m.ECPayFail'); });
            Route::post('CashPay','TFO\FrontController@CashPay');
            Route::get('CashPay','TFO\FrontController@CashPay');
        });

        Route::post('getRoomData','TFO\FrontController@getRoomData');
        Route::post('frontcontactstore','TFO\FrontController@ContentStore');
        Route::post('generateOrder','TFO\FrontController@generateOrder');
        Route::post('ECPayBackCallBack','TFO\FrontController@EcPayBackCallBack');

        Route::post('ECPaySuccess','TFO\FrontController@ECPaySuccess');
        //Route::get('ECPaySuccess','TFO\FrontController@ECPaySuccess');
        Route::get('ECPayFail',function(){ return view('TFO.front.ECPayFail'); });

        Route::post('CashPay','TFO\FrontController@CashPay');
        Route::get('CashPay','TFO\FrontController@CashPay');

        // 禮物卡
        Route::post('generateGiftCardOrder','TFO\FrontController@generateGiftCardOrder');
        Route::post('EcPayGiftCardBackCallBack','TFO\FrontController@EcPayGiftCardBackCallBack');
        Route::post('EcPayGiftCardBack','TFO\FrontController@EcPayGiftCardBack');
        
        Route::post('checkGiftCardStatus','TFO\FrontController@checkGiftCardStatus');
        Route::post('checkAndGenerateOrder','TFO\FrontController@checkAndGenerateOrder');
    });


    Route::get('dininginthedark2/{everything?}', function ($everything = null) {
        return redirect(config('setting.dark2.path'))->send();
    });
    // dark2
    Route::group(['prefix' => config('setting.dark2.path')], function(){
        Route::get('about.html',function(){ return view('Dark2.frontendone.about'); });
        Route::get('experience.html',function(){ return view('Dark2.frontendone.experience'); });
        Route::get('rules.html',function(){ return view('Dark2.frontendone.rules'); });
        Route::get('contact.html',function(){ return view('Dark2.frontendone.contact'); });
        Route::get('index.html',function(){ return view('Dark2.frontendone.home'); });
        Route::get('/',function(){ return view('Dark2.frontendone.home'); });

        
        Route::get('chef.html',function() { return redirect('/dininginthedark2/about.html')->send(); });
        Route::get('people.html',function() { return redirect('/dininginthedark2/about.html')->send(); });
        Route::get('press.html',function() { return redirect('/dininginthedark2/about.html')->send(); });
        Route::get('pre-sale.html',function() { return redirect('/dininginthedark2/about.html')->send(); });
        Route::get('food.html',function() { return redirect('/dininginthedark2/about.html')->send(); });


        Route::get('reservation.html',function(){ return view('Dark2.frontend.reservation'); });
        Route::get('GetAjaxData','Dark2\HomeController@GetAjaxData');
        Route::post('ReOrderData','Dark2\HomeController@ReOrderData');
        Route::post('contactstore','Dark2\HomeController@contactstore');
    });

    // dark s3
    Route::group(['prefix' => 'dininginthedark3'], function(){
        Route::get('index.html',function(){ return view('dininginthedark3.frontend.home'); });
        Route::get('/',function(){ return view('dininginthedark3.frontend.home'); });
        Route::get('rules.html',function(){ return view('dininginthedark3.frontend.rules'); });
        // 劃位
        Route::get('booking.html',function(){ return view('dininginthedark3.frontend.booking'); });
        Route::get('booking_pay.html',function(){ return view('dininginthedark3.frontend.booking_pay'); });
        // 藍新金流路由
        Route::post('Neweb.OrderPay', 'dark3\NewPayController@postOrderByNeweb'); // 存訂單
        Route::post('Neweb.ReturnResult', 'dark3\NewPayController@postReturnByNeweb'); // 回傳內容
        Route::post('Neweb.BackReturn', 'dark3\NewPayController@postBackReturn'); // 背景回傳
/*
        // 特別場
        Route::get('booking_special.html', 'dark3\SpecialController@getHome'); // 特別場
        Route::post('Special.OrderPay', 'dark3\SpecialController@postOrderByNeweb'); // 存訂單
        
        Route::get('master','dark3\MasterController@getTeamMaster');
        Route::post('Team/SlaveStore', 'dark3\MasterController@postTeamSlave');
*/
        Route::get('GetAjaxData','dark3\FrontController@GetAjaxData');
        Route::post('PostAjaxData','dark3\FrontController@PostAjaxData');
        Route::post('ReOrderData','dark3\FrontController@ReOrderData');
    });
if(env('APP_ENV') != 'production'){
    // terminal 落日轉運站
    Route::group(['prefix' => 'terminal'], function(){
        Route::get('/',function(){ return view('terminal.frontend.home'); });
        Route::get('/index.html',function(){ return view('terminal.frontend.home'); });
        Route::get('rules',function(){ return view('terminal.frontend.rules'); });
        // 劃位
        Route::get('booking_now',function(){ return view('terminal.frontend.booking_now'); });
        Route::get('booking',function(){ return view('terminal.frontend.booking'); });
        // 藍新金流路由
        Route::post('Neweb.OrderPay', 'dark3\NewPayController@postOrderByNeweb'); // 存訂單
        Route::post('Neweb.ReturnResult', 'dark3\NewPayController@postReturnByNeweb'); // 回傳內容
        Route::post('Neweb.BackReturn', 'dark3\NewPayController@postBackReturn'); // 背景回傳

        Route::get('GetAjaxData','dark3\FrontController@GetAjaxData');
        Route::post('PostAjaxData','dark3\FrontController@PostAjaxData');
        Route::post('ReOrderData','dark3\FrontController@ReOrderData');
    });
}
    // thegreattipsy S2
    Route::group(['prefix' => 'thegreattipsy'], function(){
        Route::get('index.html',function(){ return view('thegreattipsy.frontend.home'); });
        Route::get('/',function(){ return view('thegreattipsy.frontend.home'); });
        Route::get('rules.html',function(){ return view('thegreattipsy.frontend.rules'); });
        // 劃位
        Route::get('booking.html',function(){ return view('thegreattipsy.frontend.booking'); });
        /*
        if(env('APP_ENV') != 'production'){
            Route::get('booking_pay.html',function(){ return view('thegreattipsy.frontend.booking_pay'); });
        }
        */
        Route::get('booking_pay.html',function(){ return view('thegreattipsy.frontend.booking_pay'); });
        // 藍新金流路由
        Route::post('Neweb.OrderPay', 'tgt2\NewPayController@postOrderByNeweb'); // 存訂單
        Route::post('Neweb.ReturnResult', 'tgt2\NewPayController@postReturnByNeweb'); // 回傳內容
        Route::post('Neweb.BackReturn', 'tgt2\NewPayController@postBackReturn'); // 背景回傳

        Route::get('booking_credit_card.html',function(){ 
            //return redirect("/thegreattipsy/index.html");
            /*
            $now = \Carbon\Carbon::now('Asia/Taipei')->timestamp;
            if($now>1566576000){
                return redirect("/thegreattipsy/index.html");
            } else {
                return view('thegreattipsy.frontend.booking_credit_card');     
            }
            */

            return redirect("/thegreattipsy/index.html");
        });
        // 特別場
        Route::get('booking_special.html', 'tgt2\SpecialController@getHome'); // 特別場
        Route::post('Special.OrderPay', 'tgt2\SpecialController@postOrderByNeweb'); // 存訂單
        
        if(env('APP_ENV') != 'production'){
            

            Route::get('departure_call',function(){ return view('thegreattipsy.frontend.departure_call'); });
        }
        Route::get('master','tgt2\MasterController@getTeamMaster'/*function(){ return view('thegreattipsy.frontend.master'); }*/);
        Route::post('Team/SlaveStore', 'tgt2\MasterController@postTeamSlave');
        // 姓名修改
        Route::get('nameFix','tgt2\MasterController@getNameFix');
        Route::post('Team/NameFix', 'tgt2\MasterController@postNameFix');

        Route::get('GetAjaxData','tgt2\FrontController@GetAjaxData');
        Route::post('ReOrderData','tgt2\FrontController@ReOrderData');
    });
    // thegreattipsy 2019
    Route::group(['prefix' => 'thegreattipsy2019'], function(){
        Route::get('index.html',function(){ return view('thegreattipsy2019.frontend.home'); });
        Route::get('/',function(){ return view('thegreattipsy2019.frontend.home'); });
        Route::get('rules.html',function(){ return view('thegreattipsy2019.frontend.rules'); });
        // 劃位
        //Route::get('booking.html',function(){ return view('thegreattipsy2019.frontend.booking'); });
        //Route::get('booking_pay.html',function(){ return view('thegreattipsy2019.frontend.booking_pay'); });
        Route::get('booking_credit_card.html',function(){  return redirect("/thegreattipsy2019/index.html"); });
        Route::get('GetAjaxData','tgt\FrontController@GetAjaxData');
        Route::post('ReOrderData','tgt\FrontController@ReOrderData');
    });

    Route::group(['prefix' => 'clubtomorrow'], function(){
        Route::get('intro.html',function(){ return view('clubtomorrow.frontend.intro'); });
        Route::get('/',function(){ return view('clubtomorrow.frontend.home'); });
        Route::get('index.html',function(){ return view('clubtomorrow.frontend.home'); });
        Route::get('rules.html',function(){ return view('clubtomorrow.frontend.rules'); });
        Route::get('radio.html',function(){ return view('clubtomorrow.frontend.radio'); });
        Route::get('buynow.html',function(){ return view('clubtomorrow.frontend.buynow'); });
        
        // 劃位
        Route::get('booking.html',function(){ return view('clubtomorrow.frontend.booking'); });
        Route::get('booking_pay.html',function(){ return view('clubtomorrow.frontend.booking_pay'); });
        // 重劃位
        Route::get('reschedule.html',function(){ return view('clubtomorrow.frontend.reschedule'); });
        Route::post('PostAjaxData','clubT\FrontController@changeActivityAjax');

        
        Route::get('GetAjaxData','clubT\FrontController@GetAjaxData');
        Route::post('ReOrderData','clubT\FrontController@ReOrderData');
        // 驗證SMS & SMS寄送
        Route::post('getting_intro_sms','clubT\FrontController@getting_intro_sms');
        // 重新聚集能量
        Route::post('receive_info','clubT\FrontController@receive_info');
    });
});



