@extends('livewire.home')
@section('content')
<div id="newpost" class="newpost mt-5">
    <h2>Make Your Blog</h2>
    <form wire:submit.prevent='savedata' method="POST" id="form" enctype="multipart/form-data">
        <div class="form-box">
            <label for="blogName">Blog Name</label>
            <input type="text" id="blogName" wire:model.lazy='blogname' placeholder="Blog Name">
            @error('blogname') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-box">
            <label for="blogdesc">Title Description</label>
            <textarea id="blogdesc" wire:model.lazy='blogdesc' placeholder="Blog Name"></textarea>
            @error('blogdesc') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-box">
            <label for="catagory">Catagory</label>
            <select wire:model.change='catagory' id="catagory">
                <option value="888">1</option>
                <option value="888">2</option>
            </select>
            @error('catagory') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-box" wire:ignore>
            <img style="display: none" src="" id="preview" >
        </div>
        <div class="form-box">
            <label for="titleimage">Title Image</label>
           <input type="file" wire:model='titleimage'  onchange="getImagepreview(event)">
           @error('titleimage') <span class="error">{{ $message }}</span> @enderror

        </div>
        <div class="form-box">
            <label for="titleimage">Content</label>
            <div wire:ignore >
            <textarea  wire:model='content'  id="tex" placeholder="Write here..." ></textarea>
            </div>
           @error('content') <span class="error">{{ $message }}</span> @enderror

        </div>
        <div class="form-box">
            <button type="submit" id="btn" onclick="spinner()">Save Details<div class="spinner-border spin text-light" style="visibility: hidden" role="status">
              </div></button>

        </div>

    </form>
<!-- alert box -->
<div wire:ignore.self  class="modal fade" id="newalert" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
            <i class="fa-solid fa-circle-check  text-success"></i>
            <div>
                       <h2 class="text-center">{{session('mes') }}</h2>

                </div>
        </div>
      </div>
    </div>
 </div>
   <!-- alert box end -->
</div>

<script>
     jQuery('html').animate({
        scrollTop:jQuery('#newpost').offset().top - 100
    });

    $(document).ready(function () {

        $('#tex').summernote({
            height:300,
            placeholder:'Write your Content Here',
            callbacks:{
                onChange:function(contents,$editable){
                    @this.set('content',contents);
                }
            }
        });

    });

  </script>
  @script
  <script>
    $wire.on('reset', () => {
        $('#tex').summernote('reset');
        $('.spin').css('visibility', 'hidden');
        $('#newalert').modal("show");
        $('#preview').css('display','none');
    });
</script>
@endscript
  <script>
     function spinner(){
        $('.spin').css('visibility', 'visible');

    }
    function getImagepreview(event){
    var image =  URL.createObjectURL(event.target.files[0]);
    var imag = document.getElementById("preview");
    imag.width="100";
    imag.margin="10";
    imag.src=image;
    $('#preview').css('display', 'block');

    }
</script>
@endsection

