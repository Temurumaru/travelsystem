@if (\Session::has('success'))
	<div class="alert alert-success">
		<ul>
			<li>{{ \Session::get('success') }}</li>
		</ul>
	</div>
@endif

@if (\Session::has('warning'))
	<div class="alert alert-warning">
		<ul>
			<li>{{ \Session::get('warning') }}</li>
		</ul>
	</div>
@endif

@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif