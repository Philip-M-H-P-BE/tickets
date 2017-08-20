<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function postCommentaar(Request $request) {
		$this->validate($request, [
			'comment' => 'required'
		]);
		
		$comment = Comment::create([
			'ticket_id' => $request->input('ticket_id'),
			'user_id' => Auth::user()->id,
			'comment' => $request->input('comment')
		]);
		
		return redirect()->back();
	}
}
