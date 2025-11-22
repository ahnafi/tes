<x-filament-widgets::widget>
    {{-- Hapus class="w-full" dari sini --}}
    <x-filament::section heading="Kelas yang Kamu Ikuti"> 

        <div class="flex flex-row gap-5">

            @foreach ($classes as $class)
                <x-filament::card class="p-5 mt-4">

                    <h3 class="text-lg font-semibold">
                        {{ $class->course->name }}
                    </h3>

                    <p class="text-sm text-gray-600 mt-1">
                        {{ $class->course->description }}
                    </p>

                    <div class="mt-4 flex justify-end">
                        <x-filament::button
                            tag="a"
                            href="{{ route('filament.student.pages.evaluation-answer', ['evaluation_id' => $class->course->id]) }}"
                            size="sm"
                        >
                            Isi Evaluasi
                        </x-filament::button>
                    </div>
                </x-filament::card>
            @endforeach

        </div>

    </x-filament::section>
</x-filament-widgets::widget>