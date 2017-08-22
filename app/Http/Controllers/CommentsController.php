<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function postComment(Request $request) {
		$this->validate($request, [
			'comment' => 'required'
		]);
		
		$comment = new Comment([
			'ticket_id' => 	$request->input('ticket_id'),
			'user_id' => 	Auth::user()->id,
			'comment' => 	$request->input('comment')
		]);
		$comment->save();
		return redirect()->back();
	}
}
