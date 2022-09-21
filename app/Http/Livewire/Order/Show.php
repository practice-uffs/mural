<?php

namespace App\Http\Livewire\Order;

use App\Jobs\ProcessGoogleDriveUploads;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\Github;

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
        $previousGithubIssueLink = substr($this->order->github_issue_link,0, strlen($this->github_issue_link));
        $this->validate();

        $this->order->update([
            'github_issue_link' => $this->github_issue_link,
            'status' => $this->status,
        ]);


        if ($this->github_issue_link){
            $this->changeGithubLabel();
            if(!$previousGithubIssueLink){
                $this->createGDriveFolderComment();
            }
        }

        $this->emit('order:statusChanged');
    }

    public function changeGithubLabel()
    {
        $tail = substr($this->github_issue_link, strpos($this->github_issue_link, 'github.com/'));
        $array = preg_split("/[\/]/",$tail);
        $org = $array[1];
        $repo = $array[2];
        $issue = $array[4];

        $gwc = app()->make(Github::class);

        switch($this->status)
        {
            case NULL:
                $gwc->setMuralLabel($org, $repo, $issue);
                break;
            case 'todo':
                $gwc->setMuralLabel($org, $repo, $issue, 'mural:fila');
                break;
            case 'doing':
                $gwc->setMuralLabel($org, $repo, $issue, 'mural:andamento');
                break;
            case 'review':
                $gwc->setMuralLabel($org, $repo, $issue, 'mural:revisão');
                break;
            case 'completed':
                $gwc->setMuralLabel($org, $repo, $issue, 'mural:completo');
                break;
            case 'closed':
                $gwc->setMuralLabel($org, $repo, $issue, 'mural:cancelado');
                break;
            default:
        }
    }

    public function createGDriveFolderComment()
    {
        $tail = substr($this->github_issue_link, strpos($this->github_issue_link, 'github.com/'));
        $array = preg_split("/[\/]/", $tail);
        $org = $array[1];
        $repo = $array[2];
        $issue = $array[4];
        $content = "mural: ".env('APP_URL')."/servico/".$this->order->id;

        $gwc = app()->make(Github::class);
        $gwc->commentIssue($org, $repo, $issue, $content);
    }

    public function saveFiles() {
        foreach ($this->files as $file) {
            $file->storeAs('orders/' . $this->order->id, $file->getClientOriginalName());
        }

        ProcessGoogleDriveUploads::dispatch();
    }
}
