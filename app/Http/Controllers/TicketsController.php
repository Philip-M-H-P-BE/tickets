<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Categorie;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
{
	/* toon één enkel specifiek ticket met bijhorende commentaren */
	public function show($id) {
		$ticket = Ticket::where('ticketID', $id)->firstOrFail();
        $comments = $ticket->comments;
        $category = $ticket->categorie;
        return view('ticket_including_comments')
			->with('ticket', $ticket)
			->with('comments', $comments)
			->with('category', $category);
	}
	
	
	/* toon websitegebruiker zijn eigen tickets */
	public function showMyTickets() {
		$tickets = Ticket::where('user_id', Auth::user()->id)
			->orderBy('updated_at', 'desc')
			->get();
		$categories = Categorie::all();
		return view('list_my_tickets')
			->with('tickets', $tickets)
			->with('categories', $categories);
	}
	
	/* toon tickets per categorie */
    public function expandCategoryLink($id) {
		$categorie = Categorie::where('categoryID', $id)->first();
		$categories = Categorie::all();
		$tickets = Ticket::get()->where('category_id', $id);
		return view('tickets_per_category')
			->with('categories', $categories)
			->with('tickets', $tickets)
			->with('categorie', $categorie);
	}
	
	/* toon formulier voor toevoegen tickets */
	public function create() {
		$categories = Categorie::all();		
		return view('ticketformulier')->with('categories', $categories);
	}
	/* een nieuw ticket: formuliergegevens ontvangen en in databank opslaan */
	public function store(Request $request) {
        $this->validate($request, [
            'title'     => 'required',
            'category'  => 'required',
            'message'   => 'required'
        ]);
        $ticket = new Ticket([
            'title'     	=> $request->input('title'),
            'user_id'   	=> Auth::user()->id,            
            'category_id'  	=> $request->input('category'),
            'message'   	=> $request->input('message')
        ]);
        $ticket->save();
		// straks nog een redirect naar de eigen tickets toevoegen!!
		return redirect()->route('publiclyaccessibletickets.list');
    }	
}
