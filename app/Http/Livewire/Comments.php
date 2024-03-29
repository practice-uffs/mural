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

    protected $paginationTheme = 'bootstrap';
    public string $content;
    public string $editedContent;
    public int $editInputVisible;
    public Model $commentable;

    public function mount()
    {
        $this->resetInput();
        $this->editedContent = "";
        $this->editInputVisible = 0;
    }

    public function setEditedContent($id) {
        $comment = $this->commentable->comments()->find($id);
        $this->editedContent = $comment['content'];
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

        $this->resetInput();
    }

    public function delete($id)
    {
        $this->commentable->comments()->where('id', $id)->delete();
    }

    public function update($id)
    {
        $this->commentable->comments()->where('id', $id)->update(['content' => $this->editedContent]);
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
