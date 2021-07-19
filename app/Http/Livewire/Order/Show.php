<?php

namespace App\Http\Livewire\Order;

use App\Events\OrderCompleted;
use App\Jobs\ProcessGoogleDriveUploads;
use App\Notifications\OrderStarted;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Livewire\WithFileUploads;

class Show extends Component
{
    use WithFileUploads;

    public Model $order;
    public $files = [];
    public $github_issue_link;
    public $status;

    protected $rules = [
        'github_issue_link' => 'present',
        'status' => 'present|in:,todo,doing,review,completed,closed',
    ];

    public function mount()
    {
        $this->github_issue_link = $this->order->github_issue_link;
        $this->status = $this->order->status;
    }

    public function render()
    {
        return view('livewire.order.show');
    }

    public function save()
    {
        $this->validate();

        $wasGithubLinkAdded = empty($this->order->github_issue_link) &&
                              !empty($this->github_issue_link);

        $this->order->update([
            'github_issue_link' => $this->github_issue_link,
            'status' => $this->status,
        ]);

        $this->emit('order:statusChanged');

        if ($wasGithubLinkAdded) {
            $this->order->user->notify(new OrderStarted($this->order));
        }

        if ($this->status == 'completed') {
            OrderCompleted::dispatch($this->order);
        }
    }

    public function saveFiles() {
        foreach ($this->files as $file) {
            $file->storeAs('orders/' . $this->order->id, $file->getClientOriginalName());
        }

        ProcessGoogleDriveUploads::dispatch();
    }
}
