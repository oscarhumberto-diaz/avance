<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        Page::query()->delete();

        $inicio = Page::updateOrCreate(
            ['slug' => 'inicio'],
            [
                'title' => 'Ahora Vamos a Aumentar Nuestro Crecimiento Espiritual',
                'excerpt' => 'Mateo 28:19',
                'body' => 'Bienvenidos a este espacio. Aquí encontrarás recursos para crecer, servir y caminar juntos en la misión.',
                'status' => 'published',
                'published_at' => now(),
                'order' => 1,
            ]
        );

        $principios = Page::updateOrCreate(
            ['slug' => 'principios'],
            [
                'title' => 'Principios',
                'excerpt' => 'Principios que guían nuestro trabajo.',
                'body' => 'Nuestros principios están orientados al servicio, la transparencia y el impacto.',
                'status' => 'published',
                'published_at' => now(),
                'order' => 2,
            ]
        );

        $calendario = Page::updateOrCreate(
            ['slug' => 'calendario'],
            [
                'title' => 'Calendario',
                'excerpt' => 'Conoce nuestras próximas actividades.',
                'body' => 'Consulta fechas y eventos importantes para la comunidad.',
                'status' => 'published',
                'published_at' => now(),
                'order' => 3,
            ]
        );

        $inscripcion = Page::updateOrCreate(
            ['slug' => 'inscripcion'],
            [
                'title' => 'Inscripción',
                'excerpt' => 'Únete a las actividades formativas.',
                'body' => 'Completa tu inscripción para participar en los procesos de formación.',
                'status' => 'published',
                'published_at' => now(),
                'order' => 4,
            ]
        );

        $testimonios = Page::updateOrCreate(
            ['slug' => 'testimonios'],
            [
                'title' => 'Testimonios',
                'excerpt' => 'Historias de transformación y fe.',
                'body' => 'Comparte y conoce experiencias que fortalecen nuestra comunidad.',
                'status' => 'published',
                'published_at' => now(),
                'order' => 5,
            ]
        );

        $contacto = Page::updateOrCreate(
            ['slug' => 'contacto'],
            [
                'title' => 'Contacto',
                'excerpt' => 'Canales de contacto y soporte.',
                'body' => 'Escríbenos para más información sobre AVANCE.',
                'status' => 'published',
                'published_at' => now(),
                'order' => 6,
            ]
        );


        $queEsAvance = Page::updateOrCreate(
            ['slug' => 'que-es-avance'],
            [
                'title' => '¿Qué es AVANCE?',
                'excerpt' => 'Conoce la identidad y el proceso que guía nuestro ministerio.',
                'body' => 'AVANCE es un proceso integral de formación y discipulado con enfoque bíblico, comunitario y misional.',
                'status' => 'published',
                'published_at' => now(),
                'order' => 7,
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'que-es-avance-acrostico-a1'],
            [
                'title' => 'A - Adoración',
                'body' => 'Vivimos para exaltar a Dios en toda área de la vida.',
                'status' => 'published',
                'published_at' => now(),
                'parent_id' => $queEsAvance->id,
                'order' => 1,
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'que-es-avance-acrostico-v'],
            [
                'title' => 'V - Vida',
                'body' => 'Promovemos una vida transformada por el evangelio.',
                'status' => 'published',
                'published_at' => now(),
                'parent_id' => $queEsAvance->id,
                'order' => 2,
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'que-es-avance-acrostico-a2'],
            [
                'title' => 'A - Acompañamiento',
                'body' => 'Caminamos juntos en discipulado y cuidado pastoral.',
                'status' => 'published',
                'published_at' => now(),
                'parent_id' => $queEsAvance->id,
                'order' => 3,
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'que-es-avance-acrostico-n'],
            [
                'title' => 'N - Nutrición',
                'body' => 'Fortalecemos la fe con enseñanza bíblica y práctica.',
                'status' => 'published',
                'published_at' => now(),
                'parent_id' => $queEsAvance->id,
                'order' => 4,
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'que-es-avance-acrostico-c'],
            [
                'title' => 'C - Comunidad',
                'body' => 'Servimos en unidad y desarrollamos relaciones saludables.',
                'status' => 'published',
                'published_at' => now(),
                'parent_id' => $queEsAvance->id,
                'order' => 5,
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'que-es-avance-acrostico-e'],
            [
                'title' => 'E - Envío',
                'body' => 'Formamos discípulos que impactan su entorno con misión.',
                'status' => 'published',
                'published_at' => now(),
                'parent_id' => $queEsAvance->id,
                'order' => 6,
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'que-es-avance-mision-vision'],
            [
                'title' => 'Visión',
                'body' => 'Ver una generación de discípulos maduros que reflejen a Cristo en su familia, iglesia y sociedad.',
                'status' => 'published',
                'published_at' => now(),
                'parent_id' => $queEsAvance->id,
                'order' => 7,
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'que-es-avance-mision-mision'],
            [
                'title' => 'Misión',
                'body' => 'Guiar personas en un proceso de crecimiento espiritual intencional: preparar, sembrar, cuidar y cosechar.',
                'status' => 'published',
                'published_at' => now(),
                'parent_id' => $queEsAvance->id,
                'order' => 8,
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'que-es-avance-objetivo-1'],
            [
                'title' => 'Objetivo 1',
                'body' => 'Consolidar fundamentos bíblicos en cada participante.',
                'status' => 'published',
                'published_at' => now(),
                'parent_id' => $queEsAvance->id,
                'order' => 9,
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'que-es-avance-objetivo-2'],
            [
                'title' => 'Objetivo 2',
                'body' => 'Desarrollar hábitos espirituales y compromiso comunitario.',
                'status' => 'published',
                'published_at' => now(),
                'parent_id' => $queEsAvance->id,
                'order' => 10,
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'que-es-avance-objetivo-3'],
            [
                'title' => 'Objetivo 3',
                'body' => 'Multiplicar líderes con enfoque de servicio y misión.',
                'status' => 'published',
                'published_at' => now(),
                'parent_id' => $queEsAvance->id,
                'order' => 11,
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'que-es-avance-diagrama-preparar'],
            [
                'title' => 'Preparar',
                'body' => 'Acondicionamos el corazón y la mente para recibir la Palabra.',
                'status' => 'published',
                'published_at' => now(),
                'parent_id' => $queEsAvance->id,
                'order' => 12,
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'que-es-avance-diagrama-sembrar'],
            [
                'title' => 'Sembrar',
                'body' => 'Compartimos verdad bíblica mediante enseñanza y ejemplo.',
                'status' => 'published',
                'published_at' => now(),
                'parent_id' => $queEsAvance->id,
                'order' => 13,
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'que-es-avance-diagrama-cuidar'],
            [
                'title' => 'Cuidar',
                'body' => 'Acompañamos procesos personales con seguimiento y oración.',
                'status' => 'published',
                'published_at' => now(),
                'parent_id' => $queEsAvance->id,
                'order' => 14,
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'que-es-avance-diagrama-cosechar'],
            [
                'title' => 'Cosechar',
                'body' => 'Celebramos frutos de transformación y enviamos a servir.',
                'status' => 'published',
                'published_at' => now(),
                'parent_id' => $queEsAvance->id,
                'order' => 15,
            ]
        );


        Page::updateOrCreate(
            ['slug' => 'inicio-versiculo-destacado'],
            [
                'title' => 'Versículo destacado',
                'excerpt' => 'Mateo 28:19',
                'body' => 'Por tanto, id, y haced discípulos a todas las naciones, bautizándolos en el nombre del Padre, y del Hijo, y del Espíritu Santo.',
                'status' => 'published',
                'published_at' => now(),
                'parent_id' => $inicio->id,
                'order' => 1,
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'inicio-btn-calendario'],
            [
                'title' => 'calendario',
                'excerpt' => $calendario->slug,
                'body' => null,
                'status' => 'published',
                'published_at' => now(),
                'parent_id' => $inicio->id,
                'order' => 2,
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'inicio-btn-principios'],
            [
                'title' => 'principios',
                'excerpt' => $principios->slug,
                'body' => null,
                'status' => 'published',
                'published_at' => now(),
                'parent_id' => $inicio->id,
                'order' => 3,
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'inicio-btn-inscripcion'],
            [
                'title' => 'inscripción',
                'excerpt' => $inscripcion->slug,
                'body' => null,
                'status' => 'published',
                'published_at' => now(),
                'parent_id' => $inicio->id,
                'order' => 4,
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'inicio-btn-testimonios'],
            [
                'title' => 'testimonios',
                'excerpt' => $testimonios->slug,
                'body' => null,
                'status' => 'published',
                'published_at' => now(),
                'parent_id' => $inicio->id,
                'order' => 5,
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'inicio-btn-contacto'],
            [
                'title' => 'contacto',
                'excerpt' => $contacto->slug,
                'body' => null,
                'status' => 'published',
                'published_at' => now(),
                'parent_id' => $inicio->id,
                'order' => 6,
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'inicio-banner-final'],
            [
                'title' => 'Banner final',
                'excerpt' => 'Hechos 1:8',
                'body' => 'Pero recibiréis poder, cuando haya venido sobre vosotros el Espíritu Santo, y me seréis testigos.',
                'status' => 'published',
                'published_at' => now(),
                'parent_id' => $inicio->id,
                'order' => 7,
            ]
        );
    }
}
