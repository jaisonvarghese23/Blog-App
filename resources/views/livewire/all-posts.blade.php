@extends('livewire.home')
@section('content')
<livewire:LatestPosts>
    <div class="latest">
        <div class="filter">
        <h2>All Posts...</h2>
        <div>
            <label for="">Catagories:</label>
            <select name="" id="">
                <option value="">Filters</option>
                <option value="">Filters</option>
                <option value="">Filters</option>
                <option value="">Filters</option>
                <option value="">Filters</option>
                <option value="">Filters</option>
            </select>
            </div>
        </div>
        <div class="posts">
            @foreach ($posts as $post)


            <div class="card">
                <div class="card-img">
                    <img src="{{asset('storage/'.$post->image)}}" alt="">
                </div>
                <div class="heading">
                     <p>{{$post->name}}</p>
                </div>
                <div class="button">
                    <a href="{{route('viewpost',$post->slug)}}">Read More</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="float-right mr-2">{{$posts->links('vendor\livewire\simple-bootstrap',data:['scrollTo'=>false])}}</div>
    </div>
 @endsection
