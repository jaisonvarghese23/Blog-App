<div>
    <div wire:ignore.self class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Login Form</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div>
                    @if(session()->has('message'))
                        <div class="alert alert-danger">
                            {{session('message') }}
                        </div>
                    @endif
                    </div>
                <form wire:submit.prevent='login' method="POST">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" wire:model='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" wire:model='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror

                    </div>
                    <div class="form-group form-check">
                      <input type="checkbox" wire:model='remeberme' class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>

                    </div>
                    <button type="submit" class="btn btn-primary p-2">Login</button>
                  </form>
                <a href="" class="float-right"  data-toggle="modal" data-dismiss="modal" data-target="#registermodal">Don't have an account? register here</a>
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
        $('#loginmodal').modal("hide");
        $('#alertbox').modal("show");

    });
</script>
@endscript
