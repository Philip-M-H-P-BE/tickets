@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
	        <div class="panel panel-default">
	        	<div class="panel-heading">
	        		<i class="fa fa-ticket">Mijn Tickets</i>
	        	</div>

	        	<div class="panel-body">
	        		@if ($tickets->isEmpty())
						<p>U heeft nog geen eigen tickets op deze website.</p>
	        		@else
		        		<table class="table">
		        			<thead>
		        				<tr>
		        					<th>Category</th>
		        					<th>Title</th>
									<th>Auteur</th>
		        					<th>Last Updated</th>
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
		        						<a href="{{ route('tickets.show', ['id' => $ticket->ticketID]) }}">
		        							{{ $ticket->title }}
		        						</a>
		        					</td>
									<td>
										{{ $ticket->user->name }}
									</td>
		        					<td>
										{{ $ticket->updated_at }}
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
@endsection