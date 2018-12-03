<ul class="list-group">
    @foreach($tag as $tag)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{$tag->nama}}
                <!-- <span class="badge badge-primary badge-pill">14</span> -->
            </li>
    @endforeach
</ul>