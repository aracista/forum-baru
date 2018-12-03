@extends('layouts.main')

@section('content')
<div class="jumbotron">
  <h1 class="display-3">Hello</h1>
  <p class="lead">ini forum-foruman buat ngetes hosting</p>
  <hr class="my-4">
  <p>jgn ngarep fitur lebih ......</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Register</a>
  </p>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="{{route('forum.create')}}" type="button" class="btn btn-success btn-block">Buat pertanyaan</a><br>
        @include('forum.include.tag')
    </div>
    <div class="col-md-8">
        @include('forum.include.post-list')
        <div class="text-center">
          {{!! $forum->links() !!}}
        </div>

</div>
</div>
    


    

@endsection
