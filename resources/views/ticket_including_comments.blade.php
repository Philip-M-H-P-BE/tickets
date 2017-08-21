@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
	        <div class="panel panel-default">
	        	<div class="panel-heading">
	        		{{ $ticket->title }}
	        	</div>
				<div class="panel-body">
	        		<div class="ticket-info">
	        			<p>{{ $ticket->message }}</p>
						<div class="row clearfix">
							<div class="col-md-4 col-md-offset-1">
								<p>Categorie:</p>
							</div>
							<div class="col-md-4 col-md-offset-1 pull-right">
								<p>{{ $category->categoryName }}</p>
							</div>
						</div>
						<div class="row clearfix">
							<div class="col-md-4 col-md-offset-1">
								<p>Aangemaakt:</p>
							</div>
							<div class="col-md-4 col-md-offset-1 pull-right">
								<p>{{ $ticket->created_at }}</p>
							</div>
						</div>
						<div class="row clearfix">
							<div class="col-md-4 col-md-offset-1">
								<p>Laatst gewijzigd:</p>
							</div>
							<div class="col-md-4 col-md-offset-1 pull-right">
								<p>{{ $ticket->updated_at }}</p>
							</div>
						</div>
	        		</div>
					<hr>
					<div>
					@if($ticket->user_id == auth()->id())
                        <div class="panel-footer clearfix">                            
							<div class="row">
                                <div class="col-md-4 col-md-offset-2">
									<form action="{{ route('tickets.edit', ['id' => $ticket->ticketID]) }}" method="GET">
										{{ csrf_field() }}
										<button type="submit" class="btn btn-warning">
											<i class="fa fa-pencil" aria-hidden="true">Update
										</button>
									</form>
								</div>                                                                               
								<div class="col-md-4 col-md-offset-2 pull-right">
									<form action="{{-- --}}" method="POST">
										{{ csrf_field() }}
                                        {{ method_field('DELETE') }}
										<button type="submit" class="btn btn-danger" id="deleteButton">
											<i class="fa fa-trash-o" aria-hidden="true"></i>Verwijderen
										</button>
									</form>
                                </div>
							</div>
						</div>
                    @endif
					</div>
	        		<hr>
	        		<div class="comments">
	        			@foreach ($comments as $comment)
	        				<div class="panel panel-@if($ticket->user->id === $comment->user_id){{"default"}}@else{{"success"}}@endif">
	        					<div class="panel panel-heading">
	        						{{ $comment->user->name }}
	        						<span class="pull-right">{{ $comment->created_at->format('Y-m-d') }}</span>
	        					</div>
	        					<div class="panel panel-body">
	        						{{ $comment->comment }}		
	        					</div>
	        				</div>
	        			@endforeach
	        		</div>

	        		<div class="comment-form">
		        		<form action="{{ url('comment') }}" method="POST" class="form">
		        			{!! csrf_field() !!}

		        			<input type="hidden" name="ticket_id" value="{{ $ticket->ticketID }}">

		        			<div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                <textarea rows="10" id="comment" class="form-control" name="comment"></textarea>

                                @if ($errors->has('comment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
	                        </div>

	                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
	                        </div>
		        		</form>
	        	</div>
	        </div>
	    </div>
	</div>
@endsection

