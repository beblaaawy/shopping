@if(session()->exists('success'))
<div class="alert alert-success">
	{{ session()->get('success') }}
</div>
@endif

@if(session()->exists('errors'))
<div class="alert alert-danger">
	@foreach(session()->get('errors') as $errors)
		@foreach($errors as $error)
			<div>{{ $error }}</div>
		@endforeach
	@endforeach
</div>
@endif

@if(session()->exists('error'))
<div class="alert alert-danger">
	{{ session()->get('error') }}
</div>
@endif