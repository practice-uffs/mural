<?php

namespace App\Http\Livewire;

use App\Events\OrderCommented;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    public string $content;
    public Model $commentable;

    public function mount()
    {
        $this->resetInput();
    }

    public function render()
    {
        return view('livewire.comments.main', [
            'items' => $this->commentable->comments()->paginate(20)
        ]);
    }

    public function resetInput()
    {
        $this->commentable->load([
            'comments.user'
        ]);
        
        $this->content = '';
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

    public function markAsRead($id) {
        $id = (int) $id;

        if ($id <= 0 || $this->commentable->read_until_comment_id > $id) {
            return;
        }

        $this->commentable->update([
            'read_until_comment_id' => (int) $id
        ]);
    }
}
