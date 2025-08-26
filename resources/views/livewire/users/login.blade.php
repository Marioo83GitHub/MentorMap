<div class="flex flex-col p-4">
    <label for="username">Correo Electrónico</label>
    <input wire:model="email" type="text" class="p-1 bg-slate-200 border border-slate-600 w-max">
    <label for="password">Contraseña</label>
    <input wire:model="password" type="password" class="p-1 bg-slate-200 border border-slate-600 w-max">
    <p>¿Nuevo? Regístrate <a href="{{ route('signup') }}" class="underline text-blue-700">aquí!</a> </p>
</div>
