<div class="header" style="position:fixed;top:0;background-color:black;">
   <div class="logo">
        <p>Blog<span>App</span></p>
   </div>
   <div class="nav-links">
        <ul>
            <li class="links"><a class="@if (Request::url() == 'http://127.0.0.1:8000') active @endif" href="/" wire:navigate>Home</a></li>
            @if (Auth::check())
            <li class="links "><a class="@if (Request::segment(1)== 'NewPost') active @endif" href="/NewPost" wire:navigate>New Post</a></li>
            <li class="links"><a class="@if (Request::segment(1)== 'Posts' || Request::url() == 'http://127.0.0.1:8000/Posts' ) active @endif"  href="/Posts" wire:navigate>My Posts</a></li>
            <li class="links"><a class="@if (Request::segment(1)== 'logout') active @endif"  href="" data-toggle="modal" data-target="#logoutmodal">Logout</a></li>
            @else
            <li class="links"><a  href=""  data-toggle="modal" data-target="#loginmodal">Login/Register </a></li>
            @endif
        </ul>
   </div>
</div>


