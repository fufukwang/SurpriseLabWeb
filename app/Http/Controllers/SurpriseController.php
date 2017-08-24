<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use MC;
use App\Http\Requests;
use App\model\email;
use App\Http\Controllers\Controller;

class SurpriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('surprise.index');
    }

    public function about()
    {
        return view('surprise.about');
    }

    public function complete()
    {
        return view('surprise.complete');
    }

    public function fail()
    {
        return view('surprise.fail');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $email = new email;
        $email->name = $input['name'];
        $email->email = $input['email'];

        //傳送資料給mailchimp
        $data = array(
            'email_address' => $input['email']
        );
        $result = MC::checksub('5ac409d48f',$data);
        $json = json_decode($result,true);
        if($json['status']==404){
            $data = array(
                'email_address' => $input['email'],
                'status'        => 'subscribed',
                'merge_fields'  => array(
                    'FNAME' => $input['name']
                )
            );
            //訂閱的動作
            $rr = MC::subscribe('5ac409d48f',$data);
            $email->save();
        }else{
            return redirect('/fail');
        }

        //dd($result); 印出結果

        return redirect('/complete');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
