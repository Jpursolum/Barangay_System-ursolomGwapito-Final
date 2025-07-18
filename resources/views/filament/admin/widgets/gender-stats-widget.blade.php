<x-filament::widget>
    <x-filament::card>
        <div class="grid md:grid-cols-2 gap-6">
            {{-- Male Stat --}}
            <a 
                href="{{ route('filament.admin.resources.brgy-inhabitants.index', [
                    'tableFilters' => [
                        'sex' => ['value' => 'Male']
                    ]
                ]) }}"
                class="bg-blue-50 dark:bg-blue-900/20 p-6 rounded-2xl shadow text-center hover:scale-105 transition-all duration-200"
            >
                <div class="flex flex-col items-center">
                    <x-heroicon-s-user class="w-10 h-10 text-blue-600 mb-3" />
                    <div class="text-3xl font-extrabold text-blue-600">
                        {{ $maleCount ?? 0 }}
                    </div>
                    <div class="text-base font-medium text-gray-600 dark:text-gray-300">
                        Total Males
                    </div>
                </div>
            </a>

            {{-- Female Stat --}}
            <a 
                href="{{ route('filament.admin.resources.brgy-inhabitants.index', [
                    'tableFilters' => [
                        'sex' => ['value' => 'Female']
                    ]
                ]) }}"
                class="bg-pink-50 dark:bg-pink-900/20 p-6 rounded-2xl shadow text-center hover:scale-105 transition-all duration-200"
            >
                <div class="flex flex-col items-center">
                    <x-heroicon-s-user-group class="w-10 h-10 text-pink-500 mb-3" />
                    <div class="text-3xl font-extrabold text-pink-500">
                        {{ $femaleCount ?? 0 }}
                    </div>
                    <div class="text-base font-medium text-gray-600 dark:text-gray-300">
                        Total Females
                    </div>
                </div>
            </a>
        </div>
    </x-filament::card>
</x-filament::widget>
