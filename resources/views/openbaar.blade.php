@extends('layouts.eigenapp')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h2>Alle tickets</h2>
				<h2>Per categorie</h2>
				<div class="row">
					<div class="col-md-offset-3 col-md-9">
						<nav id="sidebar-nav">
							<ul class="nav nav-pills nav-stacked">
								@foreach($categories as $categorie)
									<li class="nav-item"><a href="#" class="nav-link">{{ $categorie->categoryName }}</a></li>								
								@endforeach
							</ul>
						</nav>
					</div>
				</div>
			</div>
			<div class="col-md-8">
			</div>
		</div>
	</div>
@endsection