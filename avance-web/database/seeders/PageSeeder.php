<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        Page::query()->delete();

        Page::updateOrCreate(
            ['slug' => 'inicio'],
            [
                'title' => 'Inicio',
                'excerpt' => 'Página principal de AVANCE.',
                'body' => 'Bienvenidos a AVANCE.',
                'status' => 'published',
                'published_at' => now(),
                'order' => 1,
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'que-es-avance'],
            [
                'title' => 'Qué es AVANCE',
                'excerpt' => 'Conoce nuestra misión y propósito.',
                'body' => 'AVANCE es una iniciativa para fortalecer procesos formativos y materiales.',
                'status' => 'published',
                'published_at' => now(),
                'order' => 2,
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
                'order' => 3,
            ]
        );

        $materiales = Page::updateOrCreate(
            ['slug' => 'materiales'],
            [
                'title' => 'Materiales',
                'excerpt' => 'Explora recursos disponibles.',
                'body' => 'Repositorio de materiales y recursos descargables.',
                'status' => 'published',
                'published_at' => now(),
                'order' => 4,
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'contacto'],
            [
                'title' => 'Contacto',
                'excerpt' => 'Canales de contacto y soporte.',
                'body' => 'Escríbenos para más información sobre AVANCE.',
                'status' => 'published',
                'published_at' => now(),
                'order' => 5,
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'principios-metodologicos'],
            [
                'title' => 'Principios metodológicos',
                'excerpt' => 'Página hija de Principios.',
                'body' => 'Detalle ampliado de los principios metodológicos de AVANCE.',
                'status' => 'published',
                'published_at' => now(),
                'parent_id' => $principios->id,
                'order' => 1,
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'materiales-didacticos'],
            [
                'title' => 'Materiales didácticos',
                'excerpt' => 'Página hija de Materiales.',
                'body' => 'Materiales didácticos disponibles para descarga.',
                'status' => 'published',
                'published_at' => now(),
                'parent_id' => $materiales->id,
                'order' => 1,
            ]
        );
    }
}
