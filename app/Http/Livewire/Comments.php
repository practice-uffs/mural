<?php

namespace App\Http\Livewire;

use App\Events\OrderCommented;
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

        $comment = $this->commentable->comments()->create([
            'user_id' => auth()->id(),
            'content' => $this->content
        ]);

        OrderCommented::dispatch($this->commentable, $comment);
        
        $this->resetInput();
    }
}
