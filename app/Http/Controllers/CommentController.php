<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;


class CommentController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()

    {
        
        $comment = new Comment;
        $comment->content = request()->content;
        $comment->article_id = request()->article_id;
       
        $comment->user_id = request()->user()->id;
        $comment->save();


        return back();
    }


    public function delete($id)
    {
        $comment = Comment::find($id);


        if($comment->user_id == auth()->user()->id) {
            $comment->delete();
            return back();
        } else {
            return back()->with('error', 'Unauthorize');
        }


        return back();
    }

}

