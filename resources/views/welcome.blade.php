@extends('layouts.main')

@section('content')
<div class="jumbotron">
  <h1 class="display-3">Hello, world!</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Register</a>
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
