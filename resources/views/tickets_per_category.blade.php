@extends('layouts.app')
@section('content');
<div class="container">
	<div class="row">
		<div class="col-md-3">
			@include('partials.aside');
		</div>
		<div class="col-md-9">
			<h1 class="text-center">Ticketcategorie: {{ $categorie->categoryName }}</h1>			
	        <div class="panel panel-default">
	        	<div class="panel-heading">
	        		<i class="fa fa-ticket">{{ $categorie->categoryName }}</i>
	        	</div>
	        	<div class="panel-body">
	        		@if ($tickets->isEmpty())
						<p>Er zijn momenteel geen tickets in deze categorie</p>
	        		@else
		        		<table class="table">
		        			<thead>
		        				<tr>
									<th>Titel</td>		        					
									<th>Auteur</th>
									<th>Laatst gewijzigd</th>
									<th>Comments</th>
		        				</tr>
		        			</thead>
		        			<tbody>
		        			@foreach ($tickets as $ticket)
								<tr>
									<td>{{ $ticket->title }}</td>		        					
									<td>{{ $ticket->user->name }}</td>
									<td>{{ $ticket->updated_at }}</td>
									<td>{{ count($ticket->comments) }}</td>
		        				</tr>
		        			@endforeach
		        			</tbody>
		        		</table>		        		
		        	@endif
	        	</div>
			</div>
		</div>
@endsection