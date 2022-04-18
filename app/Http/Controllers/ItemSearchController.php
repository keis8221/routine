<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use RakutenRws_Client;

class ItemSearchController extends Controller
{
    public function search(Request $request)
    {
        //楽天APIを扱うRakutenRws_Clientクラスのインスタンスを作成します
        $client = new RakutenRws_Client();

        //定数化
        define("RAKUTEN_APPLICATION_ID", config('services.rakuten.rakuten_id'));
        define("RAKUTEN_APPLICATION_SEACRET", config('services.rakuten.rakuten_key'));

        //アプリIDをセット
        $client->setApplicationId(RAKUTEN_APPLICATION_ID);

        //リクエストから検索キーワードを取り出し
        // $keyword = $request->input('keyword');
        // $keyword = $request->action_item;
        $keyword = $request->item_name;

        // IchibaItemSearch API から、指定条件で検索
        if(!empty($keyword)){ 
            $response = $client->execute('IchibaItemSearch', array(
                //入力パラメーター
                'keyword' => $keyword,
            ));
            // レスポンスが正しいかを isOk() で確認することができます
            if ($response->isOk()) {
                $items = array();
                //配列に結果を代入していきます
                foreach ($response as $item){
                    //画像サイズを変えたかったのでURLを整形します
                    $str = str_replace("_ex=128x128", "_ex=175x175", $item['mediumImageUrls'][0]['imageUrl']);
                    $items[] = array(
                        'itemName' => $item['itemName'],
                        'itemUrl' => $item['itemUrl'],
                        'mediumImageUrls' => $str,
                        'siteIcon' => "../images/rakuten_logo.png",
                    );
                }
                return response()->json($items);
            } else {
                var_dump($response);
                echo 'Error:'.$response->getMessage();
            }
        } else {
            echo 'Error:failed';
        }
        
    }
}