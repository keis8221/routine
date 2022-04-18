<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * ユーザーの投稿に、コメントを投稿
     *
     * @param CommentRequest $request
     * @return RedirectResponse
     */
    public function store(CommentRequest $request): RedirectResponse
    {
        // 二重送信対策
        $request->session()->regenerateToken();
        
        $commentdata = [
            'comment' => $request->comment,
            'routine_id' => $request->routine_id,
            'user_id' => Auth::user()->id
        ];
        $comment = new Comment;
        $comment->fill($commentdata)->save();

        return back();
    }
}
