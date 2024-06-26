<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Tweet\CreateRequest;
use App\Models\Tweet;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request)
    {
        // Tweetモデルのインスタンスを生成
        $tweet = new Tweet;
        // リクエストから取得したツイート内容をcontentプロパティに代入
        $tweet->content = $request->tweet();
        // ツイートを保存
        $tweet->save();
        // ツイート一覧画面にリダイレクト
        return redirect()->route('tweet.index');
    }
}
