
	<h2><a href="{{ route('publiclyaccessibletickets.list') }}">Alle tickets</a></h2>
	<h3>Tickets per categorie</h3>
	<div class="col-md-offset-3 col-md-9">
		<nav id="sidebar-nav">
			<ul class="nav nav-pills nav-stacked">
				@foreach($categories as $categorie)
					<li class="nav-item"><a href="#" class="nav-link">{{ $categorie->categoryName }}</a></li>								
				@endforeach
			</ul>
		</nav>
	</div>

		
