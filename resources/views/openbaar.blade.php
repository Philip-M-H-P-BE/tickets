@extends('layouts.app')
@section('content');
<div class="container">
	<div class="row">
		<div class="col-md-3">
			@include('partials.aside');
		</div>
		<div class="col-md-9">
			<h1 class="text-center">Support tickets ({{ count($tickets) }})</h1>			
	        <div class="panel panel-default">
	        	<div class="panel-heading">
	        		<i class="fa fa-ticket">Tickets uit alle categorieën</i>
	        	</div>
	        	<div class="panel-body">
	        		@if ($tickets->isEmpty())
						<p>Er zijn momenteel geen tickets</p>
	        		@else
		        		<table class="table">
		        			<thead>
		        				<tr>
		        					<th>Categorie</th>
		        					<th>Titel</th>
		        					<th>Laatst gewijzigd</th>
									<th>Auteur</th>
									<th>Comments</th>
		        				</tr>
		        			</thead>
		        			<tbody>
		        			@foreach ($tickets as $ticket)
								<tr>
		        					<td>
		        					@foreach ($categories as $category)
		        						@if ($category->categoryID === $ticket->category_id)
											{{ $category->categoryName }}
		        						@endif
		        					@endforeach
		        					</td>
		        					<td>
		        						<a href="{{ route('tickets.show', [$ticket->ticketID]) }}">
		        							{{ $ticket->title }}
		        						</a>
		        					</td>
		        					<td>
										{{ $ticket->updated_at }}</td>
		        					</td>
									<td>
										{{ $ticket->user->name }}
									</td>
									<td>
										{{ count($ticket->comments) }}
									</td>
		        				</tr>
		        			@endforeach
		        			</tbody>
		        		</table>		        		
		        	@endif
	        	</div>
			</div>
		</div>
	</div>
</div>
@endsection