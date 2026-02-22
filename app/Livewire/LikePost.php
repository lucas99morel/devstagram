<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LikePost extends Component{
    public $post;
    public $isLiked;

    public function mount($post){
        $this->isLiked = $post->checkLike(Auth::user());
    }

    public function like(){
        if(!$this->isLiked){
            $this->post->likes()->create([
                'user_id' => Auth::user()->id
            ]);
        }
        else{
            Auth::user()->likes()->where('post_id',$this->post->id)->delete();
        }

        $this->isLiked = !$this->isLiked;
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
