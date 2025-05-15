
<div class="max-w-4xl mx-auto p-4 space-y-6">
    <!-- Teaser Image  -->
    <div class="relative aspect-video w-full overflow-hidden rounded shadow-lg">
        <img src="{{ asset('storage/' . $teaser->image_path) }}"
             alt="Teaser Image"
             class="w-full h-full object-cover">

        <div class="absolute bottom-0 left-0 w-full h-36 bg-gradient-to-t from-black to-transparent pointer-events-none"></div>

        <!-- Headline Overlay -->
        <h1 class="absolute bottom-6 left-6 text-white text-3xl md:text-4xl font-extrabold z-10 drop-shadow-lg">
            {{ $teaser->headline }}
        </h1>
    </div>

    <!-- Teaser Text -->
    <div class="w-full max-w-full mx-auto mt-6">
        <p class="text-gray-800 text-lg">{{ $teaser->body }}</p>
    </div>

    <div class="flex flex-col gap-4 w-full mt-6">
        <a href="{{ route('overview') }}"
           class="w-full md:w-1/3 bg-primary text-secondary font-semibold py-3 rounded-lg text-center hover:bg-primary/90 transition">
            Zurück zur Übersicht
        </a>
        <button
            wire:click="delete"
            onclick="return confirm('Are you sure you want to delete this teaser?')"
            class="w-full md:w-1/3 bg-red-600 text-white py-3 rounded-lg text-center hover:bg-red-700 transition">
            Delete Teaser
        </button>
    </div>
</div>
