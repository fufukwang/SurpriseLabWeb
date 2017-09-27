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
    $url = 'suprise.dev';
}else if(App::environment('tester')) {
    $url = 'hellokiki.info';
}else if(App::environment('production')) {
    $url = 'surpriselab.com.tw';
}else {
    $url = '';
}

Route::get('/', function () {
    return view('welcome');
});

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

        // 報表列印
        Route::get('print','TFO\BackController@Print');
        Route::get('table','TFO\BackController@Table');
    });
});


Route::group(['middleware' => ['web']], function () {
    /*surprise*/
    Route::resource('/','SurpriseController');
    Route::get('/about','SurpriseController@about');
    Route::get('/complete','SurpriseController@complete');
    Route::get('/fail','SurpriseController@fail');
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
        Route::get('reservation.html','TFO\TurnPageController@reservation');
        Route::get('gift.html','TFO\TurnPageController@gift');

        Route::group(['prefix' => 'm'], function(){
            Route::get('index.html','TFO\TurnPageController@mhome');
            Route::get('/',function(){ return redirect("/tableforone/m/index.html"); });
            Route::get('about.html','TFO\TurnPageController@mabout');
            Route::get('menu.html','TFO\TurnPageController@mmenu');
            Route::get('rules.html','TFO\TurnPageController@mrules');
            Route::get('contact.html','TFO\TurnPageController@mcontact');
            Route::get('qa.html','TFO\TurnPageController@mqa');
            Route::get('reservation.html','TFO\TurnPageController@mreservation');
            Route::get('gift.html','TFO\TurnPageController@mgift');

            Route::get('ECPaySuccess','TFO\FrontController@ECPaySuccess');
            Route::get('ECPayFail',function(){ return view('TFO.m.ECPayFail'); });
        });

        Route::group(['prefix' => 'en'], function(){
            Route::get('index.html',function(){ App::setLocale('en'); return view('TFO.front.home'); });
            Route::get('/',function(){ App::setLocale('en'); return redirect("/tableforone/index.html"); });
            Route::get('about.html',function(){ App::setLocale('en'); return view('TFO.front.about'); });
            Route::get('menu.html',function(){ App::setLocale('en'); return view('TFO.front.menu'); });
            Route::get('rules.html',function(){ App::setLocale('en'); return view('TFO.front.rules'); });
            Route::get('contact.html',function(){ App::setLocale('en'); return view('TFO.front.contact'); });
            Route::get('qa.html',function(){ App::setLocale('en'); return view('TFO.front.qa'); });
            Route::get('reservation.html',function(){ App::setLocale('en'); return view('TFO.front.reservation'); });
            Route::get('gift.html',function(){ App::setLocale('en'); return view('TFO.front.gift'); });

            Route::get('ECPaySuccess','TFO\FrontController@ECPaySuccess');
            Route::get('ECPayFail',function(){ App::setLocale('en'); return view('TFO.front.ECPayFail'); });
        });

        Route::group(['prefix' => 'm.en'], function(){
            Route::get('index.html',function(){ App::setLocale('en'); return view('TFO.m.home'); });
            Route::get('/',function(){ App::setLocale('en'); return redirect("/tableforone/index.html"); });
            Route::get('about.html',function(){ App::setLocale('en'); return view('TFO.m.about'); });
            Route::get('menu.html',function(){ App::setLocale('en'); return view('TFO.m.menu'); });
            Route::get('rules.html',function(){ App::setLocale('en'); return view('TFO.m.rules'); });
            Route::get('contact.html',function(){ App::setLocale('en'); return view('TFO.m.contact'); });
            Route::get('qa.html',function(){ App::setLocale('en'); return view('TFO.m.qa'); });
            Route::get('reservation.html',function(){ App::setLocale('en'); return view('TFO.m.reservation'); });
            Route::get('gift.html',function(){ App::setLocale('en'); return view('TFO.m.gift'); });

            Route::get('ECPaySuccess','TFO\FrontController@ECPaySuccess');
            Route::get('ECPayFail',function(){ App::setLocale('en'); return view('TFO.m.ECPayFail'); });
        });

        Route::post('getRoomData','TFO\FrontController@getRoomData');
        Route::post('frontcontactstore','TFO\FrontController@ContentStore');
        Route::post('generateOrder','TFO\FrontController@generateOrder');
        Route::post('ECPayBackCallBack','TFO\FrontController@EcPayBackCallBack');

        Route::post('ECPaySuccess','TFO\FrontController@ECPaySuccess');
        //Route::get('ECPaySuccess','TFO\FrontController@ECPaySuccess');
        Route::get('ECPayFail',function(){ return view('TFO.front.ECPayFail'); });


    });
});



