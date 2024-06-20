<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Posts extends Component
{
    public $delete_id;
    public $search;
    public function show(){
        dd($this->search);
    }
    public function deletepostconfirmation($id){
        $this->delete_id = $id ;
        $this->dispatch('show-delete-modal');
    }
    public function deletepost(){
        $post  = Post::find($this->delete_id);
        $post->delete();
        session()->flash('message','Post Deleted');
        $this->dispatch('hide-delete-modal');

    }
    public function render()
    {
          if(!empty($this->search)){
            $posts = Post::where('auther',Auth::user()->id)->where('name','like',$this->search.'%')->get();
          }
          else{
            $posts = Post::where('auther',Auth::user()->id)->latest()->get();

          }
        return view('livewire.posts',compact('posts'));
    }
}
