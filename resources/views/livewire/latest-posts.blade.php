<div class="latest">
    <h2>Latest Posts...</h2>
    <div class="posts">
        @foreach ($latests as $latest)


        <div class="card">
            <div class="card-img">
                <img src="{{asset('storage/'.$latest->image)}}" alt="">
            </div>
            <div class="heading">
                 <p>{{$latest->name}}</p>
            </div>
            <div class="button">
                <a href="{{route('viewpost',$latest->slug)}}">Read More</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
