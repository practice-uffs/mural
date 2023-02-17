<?php

namespace App\Http\Livewire\Admin;

use App\Models\Feedback;
use Livewire\Component;
use Carbon\Carbon;


class Feedbacks extends Component
{
    protected $feedbacks;
    public int $paginationAmount = 50;

    public function mount()
    {
        $this->excludeEmpty();
        $this->findFeedbacks();
    }


    public function findFeedbacks()
    {
        $query = Feedback::with('user');

        $query->orderBy('created_at', 'desc');

        $this->feedbacks = $query->paginate($this->paginationAmount);
    }

    protected function excludeEmpty(){
        Feedback::select('*')->where('comment','')->delete();
    }
    


    public function render()
    {
        return view('livewire.admin.feedbacks', [
            'feedbacks' => $this->feedbacks
        ]);
    }
}