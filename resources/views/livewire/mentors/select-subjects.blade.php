<div class="p-4 flex flex-col relative z-10">

    <h1 class="font-semibold w-full text-center text-xl">Seleccionar Asignaturas</h1>
    <hr class="border-2 border-mmgreen">
    {{-- <label class="font-semibold">Cuéntanos acerca de ti (About Me)</label>
    <textarea wire:model="aboutMe" class="border bg-slate-200 rounded-lg px-3 py-2" rows="5">Puedes contarnos tu experiencia siendo mentor/tutor, tus logros académicos, etc...</textarea> --}}

    <div class="mt-4 flex gap-12 w-full">
        {{-- Select Discipline --}}
        <div class="w-1/2 flex flex-col">

            <div class="flex flex-col">
                <label class="font-semibold">Seleccionar disciplina para seleccionar asignaturas disponibles</label>
                <div class="flex w-full gap-4">
                    <select wire:model.live="disciplineId" class="border bg-slate-200 rounded-lg px-3 py-2 w-full">
                        @foreach ($disciplines as $discipline)
                            <option value="{{ $discipline->id }}">{{ $discipline->name }}</option>
                        @endforeach
                    </select>
                    <button class="bg-mmblue text-white rounded-lg border-2 px-2">
                        Sugerir
                    </button>
                </div>
                <p class="font-semibold text-red-700 text-right mt-1">El botón de sugerir hará que se envíe una
                    solicitud a a los admins para añadir esa disciplina, mostrar modal con un input y un botón de
                    fachada nada más.</p>
            </div>
            {{-- Buscador --}}
            <input wire:model.live="searchSubject" type="text" class="px-3 py-2 bg-slate-200 border rounded-lg mt-4"
                placeholder="Buscar asignaturas..." />
            @foreach ($subjects as $subject)
                <div class="flex items-center gap-2 mt-2">
                    <input type="radio" wire:model="subjectId" wire:key="{{ $disciplineId . '-' . $subject->id }}"
                        value="{{ $subject->id }}" class="w-4 h-4">
                    <label>{{ $subject->name }}</label>
                </div>
            @endforeach

            <button wire:click="selectSubject" class="bg-mmblue text-white border rounded-lg p-2 mt-2">
                Seleccionar</button>

        </div>
        {{-- Select Discipline --}}
        <div class="w-1/2 flex flex-col gap-4">

            <h2>Asignaturas Seleccionadas:</h2>


            @foreach ($selectedSubjects as $subject)
                <div class="bg-slate-100 border rounded-lg px-4 py-3 flex flex-col"
                    wire:key="subjects-{{ $subject->id }}">
                    <div class="flex justify-between w-full mb-4">
                        <div class="flex flex-col">
                            <span><b>Disciplina:</b> {{ $subject->discipline->name }}</span>
                            <span><b>Asignatura:</b> {{ $subject->name }}</span>
                        </div>
                        <div class="flex items-start">
                            <button wire:click="deselectSubject({{ $subject->id }})"
                                class="text-red-700 font-bold">X</button>
                        </div>
                    </div>

                    <button id="show-btn-{{ $subject->id }}" wire:click="$js.toggleInput({{ $subject->id }})"
                        class="bg-mmblue rounded-lg text-white px-4 py-2 self-start">
                        + Añadir tema
                    </button>

                    <div id="topic-input-{{ $subject->id }}" class="hidden mt-3 border-t pt-3">
                        <label class="text-red-700 mb-2 block">* input para añadir temas...</label>
                        <div class="flex w-full gap-4">
                            <input id="topic-field-{{ $subject->id }}" type="text"
                                class="bg-slate-200 border rounded-lg px-2 py-1 w-full"
                                placeholder="Nombre del tema...">
                            <button wire:click="$js.saveTopic({{ $subject->id }})"
                                class="bg-green-600 rounded-lg text-white px-3 py-1">✓</button>
                        </div>
                    </div>

                    @if (!empty($topics[$subject->id]))
                        <hr class="border border-zinc-400 w-full mt-2">
                        <h3 class="font-semibold text-lg">Temas:</h3>
                        @foreach ($topics[$subject->id] ?? [] as $topic)
                            <span class="px-2 py-1 bg-green-200 rounded mt-1">- {{ $topic }}</span>
                        @endforeach
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <button wire:click="saveMentorSubjects" class="bg-mmgreen text-white font-semibold px-4 py-3 rounded-lg mt-4">Botón
        para guardar todo</button>
</div>

@script
    <script>
        // Acciones JS con contexto del componente (tienen $wire disponible)
        $js('toggleInput', (id) => {
            document.getElementById(`show-btn-${id}`).classList.add('hidden');
            document.getElementById(`topic-input-${id}`).classList.remove('hidden');
            document.getElementById(`topic-field-${id}`).value = '';
        });

        $js('saveTopic', async (id) => {
            const input = document.getElementById(`topic-field-${id}`);
            const name = input.value.trim();
            if (!name) return;

            await $wire.call('addTopicFromJs', id, name);

            input.value = '';
            document.getElementById(`topic-input-${id}`).classList.add('hidden');
            document.getElementById(`show-btn-${id}`).classList.remove('hidden');
        });
    </script>
@endscript
