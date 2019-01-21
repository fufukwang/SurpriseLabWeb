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
});


Route::group(['middleware' => ['web']], function () {
    Route::get('/',function(){ return view('landingPage.home'); });
    /*surprise*/
    //Route::resource('/','SurpriseController');
    Route::get('/about','SurpriseController@about');
    Route::get('/complete','SurpriseController@complete');
    Route::get('/fail','SurpriseController@fail');
    
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

/*
        Route::get('about.html',function(){ return view('Dark2.frontend.home'); });
        Route::get('experience.html',function(){ return view('Dark2.frontend.exeprience'); });
        Route::get('rules.html',function(){ return view('Dark2.frontend.rules0616'); });
        Route::get('contact.html',function(){ return view('Dark2.frontend.contact'); });
        Route::get('index.html',function(){ return view('Dark2.frontend.home'); });
        Route::get('/',function(){ return view('Dark2.frontend.home'); });
*/
/*
        Route::get('chef.html',function(){ return view('Dark2.frontend.chef'); });
        Route::get('people.html',function(){ return view('Dark2.frontend.people'); });
        Route::get('press.html',function(){ return view('Dark2.frontend.press'); });
        Route::get('pre-sale.html',function(){ return view('Dark2.frontend.pre-order'); });
        Route::get('food.html',function(){ return view('Dark2.frontend.food'); });
*/


        Route::get('reservation.html',function(){ return view('Dark2.frontend.reservation'); });
        Route::get('GetAjaxData','Dark2\HomeController@GetAjaxData');
        Route::post('ReOrderData','Dark2\HomeController@ReOrderData');
        Route::post('contactstore','Dark2\HomeController@contactstore');
    });
    /*
    Route::post('/frontcontactstore','FrontendController@contactstore');
    // 動態取得資料
    Route::get('GetAjaxData','FrontendController@GetAjaxData');

    // 存入資料
    Route::post('contact','HomeController@contact');
    Route::post('storeres','HomeController@storeres');
    Route::post('checkres','HomeController@checkres');
*/

    Route::group(['prefix' => 'thegreattipsy'], function(){
        Route::get('index.html',function(){ return view('thegreattipsy.frontend.home'); });
        Route::get('/',function(){ return view('thegreattipsy.frontend.home'); });
        Route::get('rules.html',function(){ return view('thegreattipsy.frontend.rules'); });
        // 劃位
        Route::get('booking.html',function(){ return view('thegreattipsy.frontend.booking'); });
        Route::get('GetAjaxData','tgt\FrontController@GetAjaxData');
        Route::post('ReOrderData','tgt\FrontController@ReOrderData');
    });


});



