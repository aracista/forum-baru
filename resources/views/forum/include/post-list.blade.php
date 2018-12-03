<div class="card">
  <h5 class="card-header">Hot Threads</h5>
    @foreach($forum as $forum)
        <div class="list-group">
            <a href="{{route('forum.show',$forum->slug)}}" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{$forum->title}}</h5>
                    <small>by aracista {{$forum->created_at->diffForHumans()}}</small>
                </div>
                    <p class="mb-1">{{$forum->post}}</p>
                    <br>
                    @foreach($forum->tag as $tag)
                <span class="badge badge-pill badge-primary">{{$tag->nama}}</span>
                    @endforeach
            </a>
        </div>
    @endforeach
</div>