<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Log;
use Config;

class RoutineController extends Controller
{
    /* 投稿一覧の表示
    * @param Request $request
    * @return Application|Factory|JsonResponse|View
    */
   public function index(Request $request)
   {
    //    // ユーザー投稿を検索で検索
    //    $freeWord = $request->input('free_word');

    //    $articles = Article::searchByFreeWord($freeWord)
    //        ->orderBy('created_at', 'desc')
    //        ->paginate(10);

    //    if ($request->ajax()) {
    //        return response()->json([
    //            'html' => view('articles.list', ['articles' => $articles])->render(),
    //            'next' => $articles->appends($request->only('free_word'))->nextPageUrl()
    //        ]);
    //    }

    //    // ユーザーの早起き達成日数ランキングを取得
    //    $rankedUsers = $this->userService->ranking(5);

    //    // メインタグを取得
    //    $mainTags = $this->tagRepository->getMainTags();

       return view(
           'routines.index'
       );
   }
}
