<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class LatestPosts extends Component
{
    public function render()
    {
        $latests = Post::take(3)->latest()->get();
        return view('livewire.latest-posts',compact('latests'));
    }
}
