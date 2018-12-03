@extends('layouts.main')

@section('content')

<form action="{{route('tag.update',$tags->id)}}" method="post">
				@method('PUT')
				@csrf
			<div class="form-group">
				<label for="nama">Nama Tag</label>
				<input  type="text" name="nama" value="{{$tags->nama}}" id="nama" class="form-control">
			</div>
				<button class="btn btn-primary" type="submit" name="submit">Update</button>
				<a href="{{route('tag.index')}}" class="btn btn-secondary" value="cancel">Cancel</a>
		</form>
@stop