<div>
    {{-- @if(Request::segment(1) == 'Posts' OR Request::segment(1) =='viewpost' )
    <livewire:Header>
    <livewire:Login>
    <livewire:Register>
    <livewire:Logout>
    @yield('content')
    <livewire:Footer>
    @else --}}
    <livewire:Header>
    <livewire:Banner>
    <livewire:Login>
    <livewire:Register>
    <livewire:Logout>
    @yield('content')
    <livewire:Footer>

{{-- @endif --}}




</div>
