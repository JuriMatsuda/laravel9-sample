<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    public function index(Request $request)
    {

        Log::debug('確認したい値');
        $req = $request->all();
        // $req = $request;
        // request = params

        // dd($req['hoge']); // ここで止まる
        // dump($req['hoge']);
        // dump($req['fuga']);
        // die(); // ここで止まる

        // Log::debug($req['hogee']);
        // Log::debug($req['fuga']);


        $str = $req['hoge'] . '_' . $req['fuga'];

        return $str;
    }

    public function testApi()
    {
        // DBから取得した値
        // $arr = [
        //     'hoge' => 'ほげほげ'
        // ];
        $arr = 'ほげほげ';

        // 外部APIから取得した値
        $result = [
            'one' => 1,
            'two' => 2,
            'three' => 3,
            'four' => [
                'four-one' => 4.1,
                'four-two' => 4.2,
            ]
        ];

        // var_dump($arr);
        // dump($result);
        ddd($result);

        // $res = array_merge($arr, $result);
        $result = Arr::add($result, 'hoge', $arr);

        // Log::debug($result);
        die();

        // 外部API叩く

        return response()->json($result);
    }

}
