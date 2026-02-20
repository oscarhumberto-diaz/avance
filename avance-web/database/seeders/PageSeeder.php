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
