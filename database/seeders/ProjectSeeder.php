<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::create([
            'nombre' => 'Sistema de Gestión Interna',
            'fecha_inicio' => '2026-08-01',
            'estado' => 'En progreso',
            'responsable' => 'Juan Pérez',
            'monto' => 2500000,
        ]);

        Project::create([
            'nombre' => 'Plataforma Web Corporativa',
            'fecha_inicio' => '2026-08-10',
            'estado' => 'Planificado',
            'responsable' => 'María González',
            'monto' => 1800000,
        ]);

        Project::create([
            'nombre' => 'Aplicación Móvil',
            'fecha_inicio' => '2026-07-15',
            'estado' => 'Finalizado',
            'responsable' => 'Carlos Rodríguez',
            'monto' => 4200000,
        ]);
    }
}