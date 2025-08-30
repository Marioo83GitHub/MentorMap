<div class="w-full">
    <h1 class="w-full text-center font-bold">Form de Registro de Mentores</h1>
    <form wire:submit.prevent="saveMentorData" class="p-4 flex gap-4">

        <div class="flex flex-col bg-slate-200 p-4 rounded-xl w-1/2">

            <h2 class="font-bold text-lg mb-2 w-full text-center">Datos de la tabla de Usuarios</h2>

            <label class="font-semibold">Nombre</label>
            <input wire:model="name" type="text"
                class="bg-zinc-300 border border-zinc-500 rounded-lg w-max mb-4 px-2 py-1" />

            <label class="font-semibold">Apellido</label>
            <input wire:model="surname" type="text"
                class="bg-zinc-300 border border-zinc-500 rounded-lg w-max mb-4 px-2 py-1" />

            <label class="font-semibold">Sexo</label>
            <div class="flex items-center">
                <input wire:model="sex" type="radio" value="M" name="default-radio"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-1" class="ms-2 text-base dark:text-gray-300">
                    Masculino
                </label>
            </div>
            <div class="flex items-center mb-4">
                <input wire:model="sex" checked type="radio" value="F" name="default-radio"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-2" class="ms-2 text-base dark:text-gray-300">
                    Femenino
                </label>
            </div>


            <label class="font-semibold">Número de Identidad</label>
            <input wire:model="id_number" type="text"
                class="bg-zinc-300 border border-zinc-500 rounded-lg w-max mb-4 px-2 py-1" />

            <label class="font-semibold">Fecha de Nacimiento</label>
            <input wire:model="birth_date" type="date"
                class="bg-zinc-300 border border-zinc-500 rounded-lg w-max mb-4 px-2 py-1" />

            <label class="font-semibold">Foto de Perfil (Se puede subir después)</label>
            <input wire:model="photo" type="file"
                class="w-full bg-zinc-300 px-2 py-1 rounded-lg border border-zinc-500 cursor-pointer" />
        </div>

        <div class="flex flex-col bg-slate-200 p-4 rounded-xl w-1/2 justify-between">
            <div>
                <h2 class="font-bold text-lg mb-2 w-full text-center">Datos de la tabla de Mentores</h2>

                <label class="font-semibold">Acerca de mí</label>
                <textarea wire:model="about_me" type="text" class="bg-zinc-300 border border-zinc-500 rounded-lg w-full mb-4 px-2 py-1" ></textarea>

                <span class="text-red-600"> (dev note)</span>
                <p class="text-sm flex">
                    <span class="text-red-600 font-semibold mr-2">
                    *
                    </span>
                    Al final solo este se va a llenar aquí, los demás son de ubicación
                    y estadísticas de esta tabla. La ubicación se llenará en otra página,
                    y las estadísticas por defecto son 0.
                </p>
            </div>
            <div class="flex w-full justify-end">
                <button type="submit" class="w-max flex px-2 py-1 bg-mmblue text-white rounded-lg">
                    Siguiente (Ubicación, otra ruta)
                </button>
            </div>
        </div>
    </form>
</div>
