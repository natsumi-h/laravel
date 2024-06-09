<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\CreateRequest;
use App\Models\Restaurant;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request)
    {
        // Tweetモデルのインスタンスを生成
        $restaurant = new Restaurant;
        // リクエストから取得したツイート内容をcontentプロパティに代入
        $restaurant->content = $request->restaurant();
        // ツイートを保存
        $restaurant->save();
        // ツイート一覧画面にリダイレクト
        return redirect()->route('restaurant.index');
    }
}
