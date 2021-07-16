<?php

namespace App\Http\Livewire\Order;

use App\Notifications\OrderStarted;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Livewire\WithFileUploads;

class Show extends Component
{
    use WithFileUploads;

    public Model $order;
    public $file;
    public $github_issue_link;

    protected $rules = [
        'github_issue_link' => 'present',
    ];

    public function mount()
    {
        $this->github_issue_link = $this->order->github_issue_link;
    }

    public function render()
    {
        return view('livewire.order.show');
    }

    public function update()
    {
        $this->validate();

        $wasGithubLinkAdded = empty($this->order->github_issue_link) &&
                              !empty($this->github_issue_link);

        $this->order->update([
            'github_issue_link' => $this->github_issue_link
        ]);

        $this->emit('order:statusChanged');

        if ($wasGithubLinkAdded) {
            $this->order->user->notify(new OrderStarted($this->order));
        }
    }
}
