<div class="mt-8 relative z-10">
    <h2 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
        Próximas Sesiones Agendadas
    </h2>

    @if ($appointments->isNotEmpty())
        <div class="mt-4 grid gap-6 sm:grid-cols-1 lg:grid-cols-2">
            @foreach ($appointments as $appointment)
                <div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border dark:border-gray-700">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-indigo-600 dark:text-indigo-400">
                                {{ $appointment->topic->topic ?? 'Tema no especificado' }}
                            </p>
                            <p class="text-lg font-semibold text-gray-900 dark:text-white mt-1">
                                @if (auth()->user()->hasRole('student'))
                                    Sesión con {{ $appointment->mentor->user->name }}
                                @else
                                    Sesión con {{ $appointment->student->user->name }}
                                @endif
                            </p>
                        </div>
                        <span @class([
                            'px-3 py-1 text-xs font-semibold rounded-full capitalize',
                            'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300' =>
                                $appointment->status === 'scheduled',
                            'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' =>
                                $appointment->status === 'completed',
                            'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' =>
                                $appointment->status === 'canceled',
                        ])>
                            @if ($appointment->status == 'scheduled')
                                Programada
                            @elseif($appointment->status == 'completed')
                                Completada
                            @elseif($appointment->status == 'canceled')
                                Cancelada
                            @else
                                {{ $appointment->status }}
                            @endif
                        </span>
                    </div>
                    <div class="mt-4 border-t border-gray-200 dark:border-gray-700 pt-4">
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            <span class="font-semibold">Fecha:</span>
                            {{ \Carbon\Carbon::parse($appointment->scheduled_at)->format('d/m/Y \a \l\a\s H:i') }}
                        </p>
                        @if ($appointment->notes)
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                                <span class="font-semibold">Notas:</span> {{ Str::limit($appointment->notes, 100) }}
                            </p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="mt-4 p-6 bg-white rounded-lg shadow-md text-center dark:bg-gray-800">
            <p class="text-gray-500 dark:text-gray-400">No tienes ninguna sesión próxima agendada.</p>
        </div>
    @endif
</div>
