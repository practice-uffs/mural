<?php

namespace App\Http\Livewire\Feedback;

use App\Models\Feedback;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class Show extends Component
{

    public Collection $feedback;
    public int $idFeedback;

    public function mount(){
        $this->findFeedback();
    }

    public function findFeedback(){
        $this->feedback = Feedback::with('user')->where('id',$this->idFeedback)->get();
    }

    public function render()
    {
        return view('livewire.feedback.show',[
            'feedback' => $this->feedback
    ]);
    }
}
