<?php

namespace App\Http\Controllers;

use App\Comment;
use App\CommentReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentRepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        $replies = $comment->comment_replies;
        return view('admin.comments.replies.show', compact('comment', 'replies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data = $request->all();
        $comment_reply = CommentReply::findOrFail($id);
        $comment_reply->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment_reply = CommentReply::findOrFail($id);
        $comment_reply->delete();
        return redirect()->back();
    }

    /**
     * Store the comment replies to the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeReply(Request $request)
    {
        $user = Auth::user();
        $data = [
            'comment_id' => $request->comment_id,
            'is_active' => 0,
            'author' => $user->name,
            'photo' => $user->avatar->filename,
            'email' => $user->email,
            'body' => $request->body
        ];
        CommentReply::create($data);
        return redirect()->back();
    }

}
