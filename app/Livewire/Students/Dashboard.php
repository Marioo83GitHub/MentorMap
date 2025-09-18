<?php

namespace App\Livewire\Students;

use Auth;
use Carbon\Carbon;
use Livewire\Component;

class Dashboard extends Component {

    // En tu componente Livewire
    public function mount() {
        $user = Auth::user();
        $appointments = $user->student->appointments()
            ->with(['mentor.user', 'topic', 'mentorship'])
            ->get();

        // Transformar los datos al formato de FullCalendar
        $calendarEvents = $appointments->map(function ($appointment) {
            // Calcular la fecha de fin basada en la duración
            $startDate = Carbon::parse($appointment->scheduled_at);
            $endDate = $startDate->copy()->addMinutes(intval($appointment->duration) * 60);


            if ($startDate->format('H') == 12) {
                $time = 'm';
            } elseif ($startDate->format('H') > 12) {
                $time = 'pm';
            } else {
                $time = 'am';
            }

            $title = ($appointment->topic ? $appointment->topic->name . ' - ': '')  . $appointment->mentor->user->name;

            $subject = $appointment->topic ? $appointment->topic->subject->name : 'Sesión';

            return [
                'id' => $appointment->id,
                'title' => $time . ' - ' . $title,
                // 'title' => ($appointment->topic->name ? $appointment->topic->name : 'Sesión') . ' - ' . $appointment->mentor->user->name,
                'start' => $appointment->scheduled_at,
                'end' => $endDate->toISOString(),
                'color' => $this->getStatusColor($appointment->status),
                'extendedProps' => [
                    'mentor' => $appointment->mentor->user->name,
                    'topic' => $appointment->topic ? $appointment->topic->name : 'No definido',
                    'status' => $appointment->status,
                    'duration' => $appointment->duration,
                    'notes' => $appointment->notes,
                    'mentorship_id' => $appointment->mentorship_id,
                    'mentor_present' => $appointment->mentor_present,
                    'student_present' => $appointment->student_present,
                    'type' => 'session',
                    'appointment_id' => $appointment->id,



                    'subject' => $subject,
                    // 'subject' => $appointment->topic->subject->name  . ($appointment->topic->name ?  ' - ' . $appointment->topic->name : ''),
                    'duration' => $appointment->duration . ($appointment->duration == 1 ? ' hora' : ' horas'),
                ]
            ];
        });

        $this->js("loadSessionsData(" . json_encode($calendarEvents) . ")");
    }

    // Método auxiliar para asignar colores por estatus
    private function getStatusColor($status) {
        $colors = [
            'scheduled' => '#1a44d5',    // Azul para programadas
            'completed' => '#16a34a',    // Verde para completadas
            'cancelled' => '#dc2626',    // Rojo para canceladas
            'in_progress' => '#ca8a04',  // Amarillo para en progreso
            'pending' => '#6b7280',      // Gris para pendientes
            // Agrega más estados según necesites
        ];

        return $colors[$status] ?? '#6b7280'; // Color por defecto
    }

    // Método auxiliar para obtener colores por tema (opcional)
    // private function getTopicColor($topicName) {
    //     $colors = [
    //         'Matemáticas' => '#1a44d5',
    //         'Física' => '#dc2626',
    //         'Química' => '#16a34a',
    //         'Biología' => '#ca8a04',
    //         'Historia' => '#9333ea',
    //         'Literatura' => '#c2410c',
    //         'Programación' => '#0891b2',
    //         'Inglés' => '#be185d',
    //         // Agrega más temas según necesites
    //     ];

    //     return $colors[$topicName] ?? '#6b7280';
    // }

    public function render() {
        return view('livewire.students.dashboard');
    }
}
