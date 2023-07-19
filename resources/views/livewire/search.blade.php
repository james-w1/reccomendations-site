<div>
    @if (!$selected)
        <div class="relative">
            <label name="lblSearch text-gray-800">
                Find me a
                <input
                    class="h-6 rounded-md bg-slate-100 peer"
                    type="text"
                    placeholder="..."
                    wire:model="query"
                    id="searchBox"
                    name="searchBox"
                />
                <button wire:click="clear" class="!absolute right-2 top-1 z-10 text-center align-middle font-sans text-xs hover:text-blue-800">x</button>
            </label>
        </div>

        <div class="">
            <div wire:loading.delay>
                loading...
            </div>
            <div wire:loading.delay.remove>
                <div class="flex flex-col mt-2 max-h-52 overflow-scroll">
                    @if (!empty($searchResults))
                        @foreach ($searchResults as $result)
                                <button wire:click="selectResult({{$result}})" class="flex flex-row flex-grow bg-slate-200 hover:bg-slate-300 rounded-md m-1">
                                    <div class="flex-grow text-gray-800">
                                        {{$result->type}}
                                    </div>
                                    <div class="flex-shrink text-gray-600">
                                        <span>➣  <span>
                                    </div>
                                </button>
                        @endforeach
                    @endif
                    @if ($searchResults->count() == 0)
                        <div class="flex flex-row justify-center m-1">
                            no results found...
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @else
        <div class="flex flex-col mt-2 min-w-96 max-h-52 overflow-scroll">
            <button wire:click="back" class="flex flex-grow justify-center bg-slate-200 hover:bg-slate-300 rounded-md m-1">
                <div class="text-gray-800">
                    take me back
                </div>
            </button>
        </div>
        @foreach ($selected as $rec)
            @livewire('show-rec', ['rec' => $rec])
        @endforeach
    @endif
</div>
