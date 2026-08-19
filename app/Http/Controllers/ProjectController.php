<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Listar los proyectos del usuario autenticado.
     */
    public function index(): JsonResponse
    {
        $projects = Project::where(
            'created_by',
            auth('api')->id()
        )->get();

        return response()->json($projects);
    }

    /**
     * Crear un proyecto.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'fecha_inicio' => ['required', 'date'],
            'estado' => ['required', 'string', 'max:255'],
            'responsable' => ['required', 'string', 'max:255'],
            'monto' => ['required', 'numeric', 'min:0'],
        ]);

        // El usuario viene del JWT, no del cliente.
        $validated['created_by'] = auth('api')->id();

        $project = Project::create($validated);

        return response()->json($project, 201);
    }

    /**
     * Obtener un proyecto por ID.
     */
    public function show(Project $project): JsonResponse
    {
        $this->authorizeProject($project);

        return response()->json($project);
    }

    /**
     * Actualizar un proyecto.
     */
    public function update(
        Request $request,
        Project $project
    ): JsonResponse {
        $this->authorizeProject($project);

        $validated = $request->validate([
            'nombre' => ['sometimes', 'required', 'string', 'max:255'],
            'fecha_inicio' => ['sometimes', 'required', 'date'],
            'estado' => ['sometimes', 'required', 'string', 'max:100'],
            'responsable' => ['sometimes', 'required', 'string', 'max:255'],
            'monto' => ['sometimes', 'required', 'numeric', 'min:0'],
        ]);

        $project->update($validated);

        return response()->json($project);
    }

    /**
     * Eliminar un proyecto.
     */
    public function destroy(Project $project): JsonResponse
    {
        $this->authorizeProject($project);

        $project->delete();

        return response()->json([
            'message' => 'Proyecto eliminado correctamente.',
        ]);
    }

    /**
     * Verificar que el proyecto pertenezca al usuario autenticado.
     */
    private function authorizeProject(Project $project): void
    {
        abort_unless(
            (int) $project->created_by === (int) auth('api')->id(),
            403,
            'No tienes permiso para acceder a este proyecto.'
        );
    }
}