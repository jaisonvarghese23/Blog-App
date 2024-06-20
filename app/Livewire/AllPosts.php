<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class AllPosts extends Component
{
    use WithPagination;
    public function render()
    {
        $posts = Post::paginate(9);
        return view('livewire.all-posts',compact('posts'));
    }
}
