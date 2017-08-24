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

Route::group(['middleware' => ['web']], function () {

    /*surprise*/
    Route::resource('/','SurpriseController');
    Route::get('/about','SurpriseController@about');
    Route::get('/complete','SurpriseController@complete');
    Route::get('/fail','SurpriseController@fail');
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

    //Route::get('test3',function(){ return view('backstage.order.list'); });
    //Route::get('test4',function(){ return view('backstage.order.edit'); });

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
    
});