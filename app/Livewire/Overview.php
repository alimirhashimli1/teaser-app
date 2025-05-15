<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Teaser;

class Overview extends Component
{
    
    public function render()
    {
                $teasers = Teaser::where('user_id', auth()->id())->latest()->get();

        return view('livewire.overview', [
            'teasers' => $teasers
        ])->layout('layouts.app');;
    }
}
