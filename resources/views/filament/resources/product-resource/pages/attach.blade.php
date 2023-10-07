<x-filament-panels::page>
    {{$product->name}}
    <form wire:submit.prevent="save">
        @if ($photo)
            Photo Preview:
            <img src="{{ $photo->temporaryUrl() }}">
        @endif
        <input type="file" wire:model="photo">

        @error('photo')
            <span class="error">{{ $message }}</span>
        @enderror

        <button type="submit">Save Photo</button>
    </form>
    <hr/>
    
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    image
                </th>
                <th scope="col" class="px-6 py-3">
                    name
                </th>
                <th scope="col" class="px-6 py-3">
                    path
                </th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($product->attachs as $attach)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <img src={{asset('storage/photos/'.$attach->path)}} class="h-10"/>
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$attach->name}}
                </th>
                <td class="px-6 py-4">
                    {{$attach->path}}
                </td>
                
            </tr>
            @endforeach
          
        </tbody>
    </table>
</div>


</x-filament-panels::page>
