<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class ViewPost extends Component
{
     public $id;
    public function mount($id){
        $this->id = $id;
    }
    public function render()
    {
        $post = Post::where('slug',$this->id )->get();
        return view('livewire.view-post',compact('post'));
    }
}
