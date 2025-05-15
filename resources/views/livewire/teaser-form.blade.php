<div class="max-w-full mx-auto p-6 bg-white rounded-lg shadow-lg relative">
    <div class="w-full rounded-t-lg px-4 py-3 bg-primary text-center">
        <span class="text-secondary font-semibold text-lg">Inhalte hochladen</span>
    </div>

    {{-- Success Message --}}
    @if (session()->has('message'))
        <div 
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 4000)"
            x-show="show"
            x-transition
            class="bg-green-500 text-white p-2 rounded mb-4 mt-4"
        >
            {{ session('message') }}
        </div>
    @endif

    {{-- General Error Message --}}
    @if ($errors->any())
        <div 
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 4000)"
            x-show="show"
            x-transition
            class="bg-red-500 text-white p-2 rounded mb-4 mt-4"
        >
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form wire:submit.prevent="submit" class="pt-6 pb-4 px-2 md:px-4">
        <div class="flex flex-col md:flex-row gap-6">
            <div class="flex-1 flex flex-col gap-4">
                <!-- Headline -->
                <div>
                    <label for="headline" class="text-sm font-semibold text-gray-700">Überschrift</label>
                    <input type="text" id="headline" wire:model="headline"
                        class="mt-1 p-2 border rounded w-full" placeholder="Enter a headline">
                    @error('headline') 
                        <span 
                            x-data="{ show: true }"
                            x-init="setTimeout(() => show = false, 4000)"
                            x-show="show"
                            x-transition
                            class="text-red-500 text-sm"
                        >{{ $message }}</span> 
                    @enderror
                </div>
                <!-- Text -->
                <div>
                    <label for="body" class="text-sm font-semibold text-gray-700">Text</label>
                    <textarea id="body" wire:model="body"
                        class="mt-1 p-2 border rounded w-full" placeholder="Enter body text"></textarea>
                    @error('body') 
                        <span 
                            x-data="{ show: true }"
                            x-init="setTimeout(() => show = false, 4000)"
                            x-show="show"
                            x-transition
                            class="text-red-500 text-sm"
                        >{{ $message }}</span> 
                    @enderror
                </div>
            </div>
            <!-- Image -->
            <div class="flex-1 flex flex-col items-center md:items-end">
                <label class="w-full">
                    <span class="text-sm font-semibold text-gray-700">Bild hochladen</span>
                    <input type="file" id="image" wire:model="image" class="hidden" />
                    <label for="image" class="flex flex-col items-center justify-center w-full mt-2 px-4 py-3 bg-green-100 rounded-2xl cursor-pointer border-2 border-dashed border-green-200 hover:bg-green-200 transition">
                        <svg class="w-6 h-6 text-primary mb-1" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5" />
                        </svg>
                        <span class="flex-1 text-primary font-semibold text-sm text-center mb-1">Datei hochladen</span>
                        @if ($image)
                            <img src="{{ $image->temporaryUrl() }}"
                                 class="h-16 w-16 object-cover rounded border border-gray-300 shadow mt-2"
                                 alt="Preview">
                        @endif
                    </label>
                </label>
                <span class="mt-2 text-xs text-gray-500 w-full text-center hidden md:block">oder Drag and Drop</span>
                @error('image') 
                    <span 
                        x-data="{ show: true }"
                        x-init="setTimeout(() => show = false, 4000)"
                        x-show="show"
                        x-transition
                        class="text-red-500 text-sm"
                    >{{ $message }}</span> 
                @enderror
            </div>
        </div>

        <div class="flex justify-end mt-8">
            <button type="submit" class="w-full md:w-auto px-4 py-2 bg-primary text-white rounded hover:bg-green-700">
                Inhalte ausspielen
            </button>
        </div>
    </form>
</div>
