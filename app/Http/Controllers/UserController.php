<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Log;
use Config;

class UserController extends Controller
{
    // private User $user;

    // public function __construct(
    //     User $user
    // ) 
    // {
    //     $this->user = $user;
    // }
    /* 投稿一覧の表示
    * @param Request $request
    * @return Application|Factory|JsonResponse|View
    */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',['user' => $user]);
    }
}
