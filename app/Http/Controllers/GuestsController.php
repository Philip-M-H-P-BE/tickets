<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categorie;
use App\Ticket;
use App\Comment;

class GuestsController extends Controller
{
    public function index() {		
		$categories = Categorie::with('tickets')->get();
		$tickets = Ticket::with('comments')->orderBy('updated_at', 'desc')->get();
		return view('openbaar')
			->with('categories', $categories)
			->with('tickets', $tickets);
	}	
}
