<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class Comments extends Component
{
    public array $items = [];
    public string $content;
    public Model $commentable;

    public function mount()
    {
        $this->resetInput();
    }

    public function render()
    {
        return view('livewire.comments.main');
    }

    public function resetInput()
    {
        $this->commentable->load([
            'comments.user'
        ]);
        
        $this->content = '';
        $this->items = $this->commentable->comments->toArray();
    }

    public function store()
    {
        $this->validate([
            'content' => 'required',
        ]);

        $this->commentable->comments()->create([
            'user_id' => auth()->id(),
            'content' => $this->content
        ]);

        $this->resetInput();
    }
}
