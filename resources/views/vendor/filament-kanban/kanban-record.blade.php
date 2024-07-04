<div
    id="{{ $record->getKey() }}"
    wire:click="recordClicked('{{ $record->getKey() }}', {{ @json_encode($record) }})"
    class="record bg-white dark:bg-gray-700 rounded-lg px-4 py-2 cursor-grab font-medium text-gray-600 dark:text-gray-200"
    @if($record->timestamps && now()->diffInSeconds($record->{$record::UPDATED_AT}) < 3)
        x-data
        x-init="
            $el.classList.add('animate-pulse-twice', 'bg-primary-100', 'dark:bg-primary-800')
            $el.classList.remove('bg-white', 'dark:bg-gray-700')
            setTimeout(() => {
                $el.classList.remove('bg-primary-100', 'dark:bg-primary-800')
                $el.classList.add('bg-white', 'dark:bg-gray-700')
            }, 3000)
        "
    @endif
>


    <div class="flex justify-between">
        <div>
            <span> {{ $record->{static::$recordTitleAttribute} }} </span>

            @if($record['urgent'] > 0)
             @for($i = 0; $i<$record['urgent']; $i++)
                @if($record['urgent'] == 1)
                    <x-heroicon-s-star class='inline-block w-4 h-4' style="color: yellow;" />
                @elseif($record['urgent'] == 2)
                <x-heroicon-s-star class='inline-block w-4 h-4' style="color: orange;" />
                @elseif($record['urgent'] == 3)
                <x-heroicon-s-star class='inline-block w-4 h-4' style="color: red;" />
                @endif
            @endfor
            @endif



        </div>

        <div class="text-sm text-gray-400">{{ $record->user->name }}</div>

    </div>
</div>
