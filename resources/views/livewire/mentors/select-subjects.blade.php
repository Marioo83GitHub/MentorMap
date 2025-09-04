<div class="p-4 flex flex-col">

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
                <div class="bg-slate-100 border rounded-lg px-4 py-3 flex flex-col">
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
                    <label class="text-red-700">* Este input es para añadir topics a las asignaturas</label>
                    <div class="flex w-full gap-4">
                        <input wire:model="topicToSave"type="text" class="bg-slate-200 border rounded-lg px-2 py-1 w-full">
                        <button wire:click="addTopic({{ $subject->id }})"
                            class="bg-mmblue rounded-lg text-white px-2 py-1">+</button>
                    </div>
                    <div class="flex flex-col gap-1">

                    </div>
                </div>
            @endforeach

        </div>
    </div>



    {{-- Formulario, redactar about me y seleccionar Disciplines, Subjects y Topics (esto lo pondrá el). <br><br>
    Además de seleccionar tarifa por Subject (asignatura). <br><br>
    Luego de este, será lo de Verificación del DNI y Cartera Digital. --}}
</div>
