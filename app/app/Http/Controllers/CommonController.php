<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    public static function execCurl($headers, $url)
    {
        // curlのセッションを初期化
        $ch = curl_init();

        // オプションを設定
        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers,
        ];
        curl_setopt_array($ch, $options);

        // 実行
        $response = curl_exec($ch);
        $json = json_decode($response, true); // 文字列からjsonへ変換

        curl_close($ch);

        return $json;
    }
}
