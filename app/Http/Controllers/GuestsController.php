<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categorie;
use App\Ticket;

class GuestsController extends Controller
{
    public function index() {		
		$categories = Categorie::all();
		$tickets = Ticket::all();
		return view('openbaar')
			->with('categories', $categories)
			->with('tickets', $tickets);
	}	
}
