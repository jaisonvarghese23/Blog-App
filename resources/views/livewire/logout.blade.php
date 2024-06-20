<div>
    <div wire:ignore.self class="modal fade" id="logoutmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-right">

              </div>
              <div class="modal-body">
                  <form wire:submit.prevent='logout'>
                    <h1 class="text-center " id="exampleModalLabel">Are you sure?</h1>
                    <div class="mt-3 d-flex justify-content-center">
                        <button type="submit " class="btn btn-danger p-2 mr-3" >logout</button>
                        <button type="submit " class="btn btn-success p-2" data-dismiss="modal">cancel</button>
                    </div>
                    </form>
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
            $('#logoutmodal').modal("hide");
            $('#alertbox').modal("show");

        });
    </script>
    @endscript
