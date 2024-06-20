@extends('livewire.home')
@section('content')
<div  class="myposts" id='newpost'>
    <div class="latest mt-3">
        <div class="filter mt-5">
        <h2>All Posts...</h2>
        <div>
            <label for="">Search post</label>
            <input type="search" wire:model.live='search'  class="p-2" name="search" id="">
           <button wire:click='show'>show</button>
            </div>
        </div>
        <div class="posts" >
            @foreach ($posts as $post)
            <div class="card" >
                <div class="card-img">
                    <img src="{{asset('storage/'.$post->image)}}" alt="profile Image" id=preview>
                </div>
                <div class="heading">
                    <h3 class="ml-2">{{$post->name}}</h3>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="button">
                        <a href="{{route('viewpost',$post->slug)}}">Read More</a>
                    </div>
                    <div class="button">
                        <a href="" style="background: none"><i class="fa-solid fa-pen-to-square text-warning fs-2 mr-1"></i></a>
                        <a wire:click.prevent='deletepostconfirmation({{$post->id}})' style="background: none"><i class="fa-regular fa-trash-can text-danger"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- alert box -->
 <div wire:ignore  class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-right">

          </div>
          <div class="modal-body">
              <form >
                <h1 class="text-center " id="exampleModalLabel">Are you sure?</h1>
                <div class="mt-3 d-flex justify-content-center">
                    <button type="submit " wire:click.prevent='deletepost' class="btn btn-danger p-2 mr-3" >Delete</button>
                    <button type="submit "  class="btn btn-success p-2" data-dismiss="modal">cancel</button>
                </div>
                </form>
          </div>
        </div>
    </div>
 </div>
   <!-- alert box end -->
    <!-- alert box -->
    <div wire:ignore.self  class="modal fade" id="alertboxdelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body text-center">
                <i class="fa-solid fa-circle-check  text-success"></i>
                <div>
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{session('message') }}
                        </div>
                    @endif
                    </div>
            </div>
          </div>
        </div>
     </div>
       <!-- alert box end -->
</div>

@endsection
{{-- <script>
     jQuery('html').animate({
        scrollTop:jQuery('#newpost').offset().top - 100
     });
</script> --}}
@script
<script>
  $wire.on('show-delete-modal', () => {
      $('#delete-modal').modal("show");

  });
  $wire.on('hide-delete-modal', () => {
      $('#delete-modal').modal("hide");
      $('#alertboxdelete').modal("show");


  });

</script>
@endscript
