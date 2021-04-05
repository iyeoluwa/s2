<div x-data="{isUploading:false, progress:0}">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <form wire:submit.prevent="submit">
        <div class="flex w-full flex-col lg:flex-row">
            <div class="flex w-full p-4  my-2 lg:w-4/12">
                <div @click="$refs.imageInput.click()" class="cursor-pointer w-48 h-48 bg-gray-200 rounded border-black border border-dashed flex justify-center items-center text-center">Upload Image</div>
                <input x-ref="imageInput" type="file" wire:model="image" class="hidden"/>
            </div>

            <div class="w-full flex flex-col lg:6/12">

                <div class="w-full flex flex-col p-4  my-2">
                     <x-label for="title" :value="__('Series Title')" />
                    <x-input type="text" wire:model="title" required autofocus />
                    @error('title') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="w-full flex flex-col p-4  my-2">
                    <x-label for="speakers" :value="__('Speakers')" />
                    <x-input type="text" wire:model="speakers" required />
                    @error('speakers') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="w-full flex flex-col p-4  my-2">
                     <x-label for="description" :value="__('Description')" />
                    <x-text-area wire:model="description" class="h-40" style="resize: none;" placeholder="Write a brief decsription of the series..."/>
                    @error('description') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="w-full lg:w-4/12  p-4  my-2">
                  <x-button class="rounded-none" >
                      {{__('Add series')}}
                  </x-button>
                </div>
            </div>
        </div>
    </form>

</div>
