<?php

namespace App\Livewire;

use App\Models\Teaser;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;

class TeaserForm extends Component
{
    use WithFileUploads; 

    public $headline;
    public $body;
    public $image;

    protected $rules = [
        'headline' => 'required|string|max:255',
        'body' => 'required|string|max:500',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
    ];

    public function submit()
    {

          if (!auth()->check()) {
        abort(403); 
    }

        $this->validate();

       $imagePath = $this->image->store('livewire/public/teasers', 'public');
        
        Teaser::create([
            'user_id' => auth()->id(),
            'headline' => $this->headline,
            'body' => $this->body,
            'image_path' => $imagePath,
        ]);

        $this->reset(['headline', 'body', 'image']);
        

        session()->flash('message', 'Teaser created successfully!');
        $this->dispatch('teaserCreated');
        
        return redirect(request()->header('Referer'));


    }

    public function render()
    {
        return view('livewire.teaser-form');
    }
}
