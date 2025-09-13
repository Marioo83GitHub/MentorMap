<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $topicsBySubject = [
            // Matemáticas
            'Álgebra' => ['Ecuaciones Lineales', 'Matrices y Determinantes', 'Polinomios', 'Sistemas de Ecuaciones'],
            'Geometría' => ['Ángulos y Triángulos', 'Teorema de Pitágoras', 'Áreas y Volúmenes', 'Geometría Analítica'],
            'Cálculo' => ['Límites y Continuidad', 'Derivadas y sus aplicaciones', 'Integrales indefinidas', 'Integrales definidas'],
            'Estadística' => ['Medidas de tendencia central', 'Probabilidad básica', 'Distribuciones de frecuencia'],

            // Ciencias
            'Física' => ['Cinemática', 'Leyes de Newton', 'Energía y Trabajo', 'Termodinámica'],
            'Química' => ['La Tabla Periódica', 'Enlaces Químicos', 'Estequiometría', 'Química Orgánica básica'],
            'Biología' => ['La Célula', 'Genética y Herencia', 'Ecosistemas', 'Anatomía Humana'],

            // Arte
            'Dibujo' => ['Técnicas de Sombreado', 'Perspectiva y Punto de Fuga', 'Dibujo de Figura Humana'],
            'Pintura' => ['Teoría del Color', 'Técnicas de Acuarela', 'Pintura al Óleo'],
            'Música' => ['Teoría Musical Básica', 'Lectura de Partituras', 'Armonía y Acordes'],

            // Programación
            'Programación Web' => ['Fundamentos de HTML', 'Estilos con CSS', 'Interactividad con JavaScript', 'Introducción a PHP y Laravel'],
            'Python' => ['Sintaxis Básica', 'Estructuras de Datos', 'Programación Orientada a Objetos con Python', 'Manipulación de Archivos'],
            'Java' => ['Conceptos básicos de Java', 'POO en Java', 'Colecciones y Genéricos', 'Manejo de Excepciones'],
            'Desarrollo Móvil' => ['Introducción a Kotlin (Android)', 'Introducción a Swift (iOS)', 'Componentes de UI', 'Consumo de APIs'],
            'Bases de Datos' => ['Modelo Entidad-Relación', 'Consultas SQL (SELECT, JOIN)', 'Normalización', 'Transacciones'],

            // Idiomas
            'Inglés' => ['Tiempos Verbales (Presente, Pasado, Futuro)', 'Verbos Modales', 'Vocabulario Esencial (Nivel A1-B1)', 'Formulación de Preguntas'],
            'Francés' => ['Le présent de l\'indicatif', 'Les articles définis et indéfinis', 'Vocabulaire de base'],
            'Alemán' => ['Konjugation von Verben', 'Die Fälle: Nominativ, Akkusativ', 'Grundwortschatz'],
        ];

        // Recorremos cada materia y sus temas
        foreach ($topicsBySubject as $subjectName => $topics) {
            // Buscamos la materia en la base de datos
            $subject = Subject::where('name', $subjectName)->first();

            // Si la materia existe, creamos sus temas asociados
            if ($subject) {
                foreach ($topics as $topicName) {
                    // Creamos el tema, ligado solo a la materia (subject_id)
                    Topic::firstOrCreate([
                        'subject_id' => $subject->id,
                        'topic' => $topicName,
                        // No especificamos 'mentor_id', por lo que será NULL
                    ]);
                }
            }
        }
    }
}