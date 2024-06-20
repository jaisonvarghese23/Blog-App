<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $confirm_password;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required',
        'confirm_password' => 'required|same:password',
    ];
    public function register(){
        $this->validate();
        User::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>Hash::make($this->password),

        ]);
        session()->flash('message','Registration Success');

        $this->dispatch('closemodal');
        $this->reset(['name','email','password','confirm_password']);

    }
    public function render()
    {
        return view('livewire.register');
    }
}
