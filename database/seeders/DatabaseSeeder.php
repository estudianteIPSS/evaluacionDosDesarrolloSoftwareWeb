<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'root',
            'email' => 'admi@tech.com',
            'password' => 'desarrollo_software_1',
        ]);

        Project::create([
            'nombre' => 'Sistema de Gestión de Proyectos',
            'fecha_inicio' => '2026-08-18',
            'estado' => 'En desarrollo',
            'responsable' => 'Eduardo',
            'monto' => 1500000,
            'created_by' => $user->id,
        ]);

        Project::create([
            'nombre' => 'Plataforma Web Corporativa',
            'fecha_inicio' => '2026-08-20',
            'estado' => 'Pendiente',
            'responsable' => 'Eduardo',
            'monto' => 2800000,
            'created_by' => $user->id,
        ]);

        Project::create([
            'nombre' => 'Aplicación de Control de Inventario',
            'fecha_inicio' => '2026-08-25',
            'estado' => 'En desarrollo',
            'responsable' => 'Eduardo',
            'monto' => 3200000,
            'created_by' => $user->id,
        ]);
    }
}
