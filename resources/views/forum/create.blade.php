@extends('layouts.main')

@section('content')

<div class="row">
  <div class="col-md-8">
    <div class="card card-body bg-secondary">
      <form action="{{route('forum.store')}}" method="POST" role="form">
        @csrf
        <fieldset>
          <legend class="text-center">Buat Pertanyaan</legend>
          <div class="form-group">
            <label for="title">Title :</label>
            <input type="text" class="form-control" placeholder="Enter title" name="title">
          </div>
          <div class="form-group">
            <label for="title">Tag :</label>
            <select class="tag form-control" multiple="multiple" name="tags[]">
              @foreach($tags as $tag)
              <option value="{{$tag->id}}">{{$tag->nama}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="post">Post :</label>
            <textarea class="form-control" rows="3" placeholder="tulis pertanyaan" name="post"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
      </form>
  </div>
  </div>


  <div class="col-md-4">
      <div class="alert alert-dismissible alert-info">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Heads up!</strong> This <a href="#" class="alert-link">alert needs your attention</a>, but it's not super important.
      </div>
  </div>
</div>
@stop
@section('script')
<script>
  $(document).ready(function (){
    $(".tag").select2({
      allowClear:true,
        placeholder: 'Search for a tag'
    });
  })
</script>
@stop