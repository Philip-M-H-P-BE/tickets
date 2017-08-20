@extends('layouts.app')
@section('content');
<div class="container">
	<div class="row">
		<div class="col-md-4">
			@include('partials.aside');
		</div>
		<div class="col-md-8">
			<h1 class="text-center">Support tickets</h1>			
	        <div class="panel panel-default">
	        	<div class="panel-heading">
	        		<i class="fa fa-ticket"> Tickets</i>
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
		        						<a href="#">
		        							{{ $ticket->title }}
		        						</a>
		        					</td>
		        					<td>
										{{ $ticket->updated_at }}</td>
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