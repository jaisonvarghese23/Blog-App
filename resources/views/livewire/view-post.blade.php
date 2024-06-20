@extends('livewire.home')
@section('content')
<div class="viewpost p-5 d-flex align-items-center flex-column" style="margin-top: 80px">
    <h1>{{$post[0]->name}}</h1>
    <h4>{{$post[0]->description}}</h4>
    <div class="content">
       {!! $post[0]->content !!}
    </div>

</div>
@endsection
