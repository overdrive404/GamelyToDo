<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Search extends Component
{
    public $search = '';


    public function render()
    {
        $results=[];
        $userId = auth()->user()->id;

        if (strlen($this->search) >= 1) {
            $results = Post::where('title', 'like', "%{$this->search}%")->where('user_id', $userId)->limit(10)->get();
        }

        return view('livewire.search', [
            'posts' => $results
        ]);
    }
}
