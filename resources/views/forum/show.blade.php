@extends('layouts.main')

@section('content')
<div class="show-header">
	<h1>{{$forum->title}}</h1>
	<div>
		<a href="{{route('forum.create')}}" class="btn btn-primary float-right">Buat Pertanyaan</a>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-8">
		<div class="card text-white bg-dark mb-3">
		  <div class="card-header">
		  	@foreach($forum->tag as $tag)
		    	<span class="badge badge-pill badge-primary">{{$tag->nama}}</span>
		    	@endforeach</div>
		  <div class="card-body">
		    <p class="card-title">
		    	{{$forum->post}}
		    </p>
		    <p class="card-text float-right">By &nbsp;<a href="#">{{$forum->user->name}} &nbsp;</a>{{$forum->created_at->diffForHumans()}}</p>
		  </div>
		</div>
		<hr>
             @foreach($forum->comments as $comment)
			<div class="card border-primary mb-3">
			  <div class="card-body">
			    <h5 class="card-title">{{$comment->isi_komentar}}</h5>
			    <small class="card-text float-right">{{$comment->user->name}}</small>
			  </div>
			</div>
            @endforeach

            <hr>
            <form action="{{route('buatKomentar.store',$forum->id)}}" method="post">
            	@csrf
            	<div class="from-group">
            	<input type="text" name="isi_komentar" class="form-control" placeholder="tulis komentar.....">
            	</div>
            	<br>
            	<button class="btn btn-success" type="submit">Submit</button>
            
            </form>

	</div>


	<div class="col-md-4">
		@if(auth()->user()->id== $forum->user_id)
		<a href="{{route('forum.edit', $forum->slug)}}" class="btn btn-success btn-block">Edit</a>
		<br>
		<form action="{{route('forum.destroy', $forum->slug)}}" method="post" accept-charset="utf-8">
			@method('DELETE')
			@csrf
			<input type="submit" value="Hapus" class="btn btn-danger btn-block">
		</form>
		@endif
		<br>
		<div class="alert alert-dismissible alert-warning">
        	<button type="button" class="close" data-dismiss="alert">&times;</button>
          	<strong>Heads up!</strong> This <a href="#" class="alert-link">alert needs your attention</a>, but it's not super important.
      </div>
	</div>
</div>

@endsection
