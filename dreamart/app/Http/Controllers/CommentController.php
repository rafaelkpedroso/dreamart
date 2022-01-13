<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;


class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->videoid = $request->post('videoid');
        $comment->author = $request->user()->id;
        $comment->text = $request->post('text');
        $comment->save();
        return json_encode($comment);
    }

    public function like($id)
    {
        $comment = Comment::find($id);
        $comment->likes = $comment->likes+1;
        $comment->update();
    }

    public function dislike($id)
    {
        $comment = Comment::find($id);
        $comment->dislikes = $comment->dislikes+1;
        $comment->update();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        $comment->text = $request->post('text');
        $comment->update();

        return redirect()->back();
    }

    public function destroy( $id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect()->back();
    }

}
