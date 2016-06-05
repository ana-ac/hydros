@if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Whoops!</strong> Ha ocurrido un problema...<br><br>
		<ul>
			@foreach ($errors as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif