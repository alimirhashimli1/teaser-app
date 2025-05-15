<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Teaser;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TeaserShow extends Component
{
    use AuthorizesRequests;

    public Teaser $teaser;

    public function mount(Teaser $teaser)
    {
        abort_unless($teaser->user_id === auth()->id(), 403);

        $this->teaser = $teaser;
    }

     public function delete()
    {
        $this->authorize('delete', $this->teaser);

        $this->teaser->delete();

        return redirect()->route('overview');
    }

    public function render()
    {
        return view('livewire.teaser-show')->layout('layouts.app');
    }
}