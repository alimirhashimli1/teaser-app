<div class="max-w-4xl mx-auto p-4"   
    wire:init
    @teaser-created.window="$wire.$refresh()"
    >

    <!-- DISPLAYING TEASERS -->
    <div class="space-y-6">
        @foreach ($teasers as $teaser)
            <a href="{{ route('teasers.show', $teaser->id) }}">
                <div class="bg-white rounded-lg shadow-md p-4 mb-6">
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="w-full md:w-1/3 h-48 md:h-auto">
                            <img src="{{ asset('storage/' . $teaser->image_path) }}"
                                 alt="Teaser image"
                                 class="w-full h-full object-cover rounded-md">
                        </div>
                        <div class="w-full md:w-2/3 flex flex-col justify-start">
                            <h2 class="text-xl font-bold text-black mb-4 mt-4 md:mt-0">{{ $teaser->headline }}</h2>
                            <p class="text-base leading-relaxed text-black w-full text-start break-words">
                                {{ $teaser->body }}
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <!-- DISPLAYING TEASER FORM -->
@livewire('teaser-form', [], key('teaser-form')) 
</div>
