<h3>Tickets per categorie</h3>
<div class="col-md-offset-1 col-md-11">
	<nav id="sidebar-nav">
		<ul class="nav nav-pills nav-stacked">
			@foreach($categories as $categorie)
				<li class="nav-item"><a href="{{ route('tickets_per_category', ['id' => $categorie->categoryID]) }}" class="nav-link">{{ $categorie->categoryName }} ({{ count($categorie->tickets) }})</a></li>								
			@endforeach
		</ul>
	</nav>
</div>

		
