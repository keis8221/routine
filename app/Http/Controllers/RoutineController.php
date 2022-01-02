<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Routine;
use App\Models\Action;
use Log;
use Config;


class RoutineController extends Controller
{
    private function getRoute() {
        return 'routines.index';
    }

    /* 投稿一覧の表示
    * @param Request $request
    * @return Application|Factory|JsonResponse|View
    */
   public function index(Request $request)
   {
       $user = new User;
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
       return view(
           'routines.index',['user' => $user]
       );
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routine = new Routine;
        $routine->user_id = Auth::user()->id;

        $action = new Action;
        $action->routine_id = $routine->id;
        return view('routines.create', [
            'routine' => $routine,
            'action' => $action
        ]);
    }

    public function store(Request $request)
    {
        //Routineテーブルへの格納
        $routine = new Routine;
        $routine->user_id = Auth::user()->id;
        $routine->title = $request->routine_title;
        $routine->routine_introduction = $request->routine_introduction;
        $routine->save();
        $this->multiple_inputs($routine->id, $request->actions);

        try{
            if ($routine) {
                return redirect()->route($this->getRoute())->with('success', Config::get('const.SUCCESS_CREATE_MESSAGE'));
            } else {
                return redirect()->route($this->getRoute())->with('error', Config::get('const.FAILED_CREATE_MESSAGE'));
            }
        } catch (Exception $e) {
            // Create is failed
            return redirect()->route($this->getRoute())->with('error', Config::get('const.FAILED_CREATE_MESSAGE'));
        }
    }

    public function multiple_inputs($routinId, $actions)
    {
        foreach((Array)$actions as $action) {
            $newAction = new Action;
            $newAction->routine_id = $routinId;
            $newAction->things = $action['things']; 
            $newAction->action_introduction = $action['introduction']; 
            $newAction->minutes = $action['time'];
            $newAction->tool_name = $action['item_name'];
            $newAction->tool_url = $action['item_url']; 
            $newAction->tool_image = $action['item_image'];
            $newAction->save();
        
    }
    }
}
