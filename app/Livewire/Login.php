<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];
    public function login(){

        $this->validate();
        $user = Auth::attempt(['email'=>$this->email,'password'=>$this->password]);
        if($user){
            session()->flash('message','Login Success');
            $this->dispatch('closemodal');
            $this->reset(['email','password']);
            if(Auth::check()){
                if(Auth::user()->user_type == 1){
                    return redirect('admin/dashboard');
                }
                else{
                    return redirect('/');
                }
            }
        }
        else{
            session()->flash('message','Login Failed');
        }




    }
    public function render()
    {
        return view('livewire.login');
    }
}
