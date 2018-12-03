@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-md-3">
        <a href="{{route('forum.create')}}" type="button" class="btn btn-success btn-block">Buat pertanyaan</a><br>
        @include('forum.include.tag')
    </div>
    <div class="col-md-8">
        @include('forum.include.post-list')
        <div class="text-center">
          {!! $forum->links() !!}
        </div>
</div>

@endsection
