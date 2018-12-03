@if (session('message'))
<div class="alert alert-dismissible alert-success">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	{{session('message')}}
</div>
@endif

@if (count($errors)>0)
<div class="alert alert-dismissible alert-danger">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<ul>
	@foreach($errors->all() as $errors)
	<li>{{$errors}}</li>
	@endforeach
	</ul>
</div>
@endif