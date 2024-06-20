<?php

namespace App\Livewire;

use App\Models\Post;
use DOMDocument;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewPost extends Component
{
    use WithFileUploads;
    public $blogname;
    public $blogdesc;
    public $catagory;
    public $titleimage;
    public $content;

    protected $rules = [
        'blogname' => 'required',
        'blogdesc' => 'required',
        'catagory' => 'required',
        'titleimage' => 'required',
        'content' => 'required',
    ];

    public function savedata(){

        $this->validate();
         $post = new Post();
         $post->name = $this->blogname;
         $post->description = $this->blogdesc;
         $post->catagory_id = $this->catagory;
         $post->slug = Str::slug($this->blogname);
         $post->auther = Auth::user()->id;

         $dom  = new DOMDocument();
         $dom->loadHTML($this->content,9);
         $images = $dom->getElementsByTagName('img');
         foreach($images as $key => $img){
            $data = base64_decode(explode(',',explode(';',$img->getAttribute('src'))[1])[1]);
            $image_name = "/upload/" . time() . $key.".png";
            file_put_contents(public_path().$image_name,$data);
            $img->removeAttribute('src');
            $img->setAttribute('src',$image_name);

         }
         $post->content = $dom->saveHTML();
         $imagename = $this->titleimage->store('photos','public');
         $post->image = $imagename;
         $post->save();

         session()->forget('mes');
         $this->dispatch('reset');
         session()->put('mes','Blog Created');
         $this->reset(['blogname','blogdesc','catagory','titleimage','content']);

    }
    public function render()
    {
        return view('livewire.new-post');
    }
}
