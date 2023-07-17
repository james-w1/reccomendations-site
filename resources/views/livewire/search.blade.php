<div>
    <form
        class="space-y-2"
    >
        @csrf
        <label name="lblSearch">
            find me a
            <input
                class="h-6 rounded-md bg-slate-100"
                type="text"
                placeholder="..."
                wire:model="query"
                id="searchBox"
                name="searchBox"
            />
        </label>
    </form>

    <div class="">
        <div class="flex flex-col mt-2 -gray-400 rounded-md max-h-52 overflow-scroll">
            @if (!empty($searchResults))
                @foreach ($searchResults as $result)
                        <button class="flex flex-row flex-grow bg-slate-200 hover:bg-slate-300 rounded-md m-1">
                            <div class="flex-grow">
                                {{$result->type}}
                            </div>
                            <div class="flex-shrink">
                                ➣
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
