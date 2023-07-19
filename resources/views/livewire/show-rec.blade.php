<div class="relative flex flex-col min-w-[24rem] bg-slate-200 rounded-md shadow-md bg-clip-border m-3">
    <div class="p-6">
        <h3 class="block font-sans text-l font-semibold leading-snug tracking-normal text-gray-900 antialiased">
            {{$rec->name}}
        </h3>
        <p class="mt-3 block font-sans text-m font-normal leading-relaxed text-gray-700 antialiased">
            {{$rec->email}}, <br/>
            {{$rec->phone_number}}
        </p>
    </div>
    <div class="p-2">
        @if (count($rec->users) > 0)
            <p class="block font-sans text-m font-normal leading-relaxed text-gray-600 antialiased">
                Recommended by:
            </p>
            <div class="inline-block font-sans text-m font-normal leading-relaxed antialiased">
            @foreach ($rec->users as $user)
                <a href="#/users/{{$user->name}}" class="">
                    {{$user->name}}
                </a>
            @endforeach
            </div>
        @endif
    </div>
</div>
