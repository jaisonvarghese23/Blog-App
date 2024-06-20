<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use function PHPUnit\Framework\returnSelf;

class Logout extends Component
{
    public function logout(){
        Auth::logout();
        session()->flash('message','Logout Sucesfully');
        $this->dispatch('closemodal');
        return redirect()->route('home');

    }
    public function render()
    {
        return view('livewire.logout');
    }
}
