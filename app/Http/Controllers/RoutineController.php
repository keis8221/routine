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
use App\Models\Comment;
use Storage;
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
        $routines = Routine::orderBy('created_at', 'desc')->get();
        return view('routines.index',[
            'routines' => $routines
            ]
        );
    }

    /**
     * $id is 
     */
    public function show($id)
    {   
        // $routine = new Routine;
        $routine = Routine::find($id);
        $comments = $routine->comments()->orderBy('created_at', 'desc');
        // var_dump($comments);
        return view('routines.show',[
            'routine' => $routine,
            'comments' => $comments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('routines.create');
    }



    public function store(Request $request)
    {
        //Routineテーブルへの格納
        $routine = new Routine;
        $routine->user_id = Auth::user()->id;
        $routine->title = $request->routine_title;
        $routine->routine_introduction = $request->routine_introduction;
        // $routine->routine_image = $request->routine_image;

        # 画像ファイルのアップロード
        $image = $request->file('file');
        if ( app()->isLocal() || app()->runningUnitTests() ) {
            # 開発環境
            $path = $image->store('public/assets/img');
            $routine->routine_image = Storage::url($path);
        }
        else {
            # 本番環境
            $path = Storage::disk('s3')->put('/', $image, 'public');
            $routine->routine_image = Storage::disk('s3')->url($path);
        }

        $routine->save();
        $this->multiple_inputs($routine->id, json_decode($request->actions));

        return redirect()->route('routines.index');
    }

    public function multiple_inputs($routineId, $actions)
    {
        foreach((Array)$actions as $action) {
            $newAction = new Action;
            $newAction->routine_id = $routineId;
            $newAction->things = $action->things; 
            $newAction->action_introduction = $action->introduction; 
            $newAction->minutes = $action->time;
            $newAction->tool_name = $action->item_name;
            $newAction->tool_url = $action->item_url; 
            $newAction->tool_image = $action->item_image;
            $newAction->save();

        }
    }

    public function image_save($image, $model) {
        # 画像ファイルのアップロード
        // $image = $request->file('image');
        if ( app()->isLocal() || app()->runningUnitTests() ) {
            # 開発環境
            $path = $image->store('public/assets/img');
            $model->image = Storage::url($path);
        }
        else {
            # 本番環境
            $path = Storage::disk('s3')->put('/', $image, 'public');
            $model->image = Storage::disk('s3')->url($path);
        }
    }


    /**
     * 投稿へのいいね
     *
     * @param Request $request
     * @param Article $article
     * @return array
     */
    public function like(Request $request, Routine $routine): array
    {
        $routine->likes()->detach($request->user()->id);
        $routine->likes()->attach($request->user()->id);

        return [
            'id'         => $routine->id,
            'countLikes' => $routine->count_likes,
        ];
    }

    /**
     * 投稿へのいいね解除
     *
     * @param Request $request
     * @param Article $article
     * @return array
     */
    public function unlike(Request $request, Routine $routine): array
    {
        $routine->likes()->detach($request->user()->id);

        return [
            'id'         => $routine->id,
            'countLikes' => $routine->count_likes,
        ];
    }

    public function hasfavorite($id)
    {
        $routine = Routine::find($id);
        $result =$routine->idLikedBy(Auth::id());
        // if ($routine->users()->where('user_id', Auth::id())->exists()) {
        //     $result = true;
        // } else {
        //     $result = false;
        // }
        return response()->json($result);
    }
    
}
