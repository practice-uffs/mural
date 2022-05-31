<?php

namespace App\Http\Livewire\Order;

use App\Jobs\ProcessGoogleDriveUploads;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Controllers\API\GithubWebhookController;

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

        $this->order->update([
            'github_issue_link' => $this->github_issue_link,
            'status' => $this->status,
        ]);

        $this->changeGithubLabel();

        $this->emit('order:statusChanged');
    }

    public function changeGithubLabel()
    {
        $tail = substr($this->github_issue_link, strpos($this->github_issue_link, 'github.com/'));
        $array = preg_split("/[\/]/",$tail);
        $org = $array[1];
        $repo = $array[2];
        $issue = $array[4];

        switch($this->status)
        {
            case 'todo':
                GithubWebhookController::class;
                break;
            case 'doing':

                break;
            case 'review':

                break;
            case 'completed':

                break;
            case 'closed':

                break;
            default:

        }
    }

    public function saveFiles() {
        foreach ($this->files as $file) {
            $file->storeAs('orders/' . $this->order->id, $file->getClientOriginalName());
        }

        ProcessGoogleDriveUploads::dispatch();
    }
}
