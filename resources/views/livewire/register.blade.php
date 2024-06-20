<div>
<div wire:ignore.self class="modal fade" id="registermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Register Form</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form wire:submit.prevent='register'>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" wire:model.lazy='name' id="name" class="form-control id="exampleInputEmail1" placeholder="Enter Name">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="text" wire:model.lazy='email' class="form-control" id="email"  placeholder="Enter Email">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" wire:model.lazy='password' class="form-control" id="password" placeholder="Password">
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" wire:model.lazy='confirm_password' class="form-control" id="confirm_password" placeholder="Confirm Password">
                    @error('confirm_password') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                  <button type="submit" class="btn btn-primary p-2">Register</button>
                </form>
              <a href="" class="float-right"  data-toggle="modal" data-dismiss="modal" data-target="#loginmodal">Already have an account? Login here</a>
          </div>
        </div>
      </div>
  </div>
<!-- alert box -->
<div wire:ignore.self  class="modal fade" id="alertbox" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
  @script
  <script>
    $wire.on('closemodal', () => {
        $('#registermodal').modal("hide");
        $('#alertbox').modal("show");

    });
</script>
@endscript
