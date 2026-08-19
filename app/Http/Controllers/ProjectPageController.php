<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\UfService;
use Illuminate\Support\Facades\Gate;

class ProjectPageController extends Controller
{
    public function index(UfService $ufService): View
    {
        $projects = Project::where('created_by', auth()->id())->get();

        $ufValue = $ufService->getTodayValue();

        return view('pages.projects.index', [
            'projects' => $projects,
            'ufValue' => $ufValue,
        ]);
    }

    public function create(): View
    {  
        return view('pages.projects.create');
    }

    public function store(Request $request): RedirectResponse
    {  
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'fecha_inicio' => ['required', 'date'],
            'estado' => ['required', 'string', 'max:100'],
            'responsable' => ['required', 'string', 'max:255'],
            'monto' => ['required', 'numeric', 'min:0'],
        ]);

        $validated['created_by'] = auth()->id();

        Project::create($validated);

        return redirect()
            ->route('projects.index')
            ->with('success', 'Proyecto creado correctamente.');
    }

    public function show(Project $project): View
    {   
        Gate::authorize('view', $project);

        return view('pages.projects.show', compact('project'));
    }

    public function edit(Project $project): View
    {   
        Gate::authorize('update', $project);

        return view('pages.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project): RedirectResponse
    {   
        Gate::authorize('update', $project);

        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'fecha_inicio' => ['required', 'date'],
            'estado' => ['required', 'string', 'max:100'],
            'responsable' => ['required', 'string', 'max:255'],
            'monto' => ['required', 'numeric', 'min:0'],
        ]);

        $project->update($validated);

        return redirect()
            ->route('projects.show', $project)
            ->with('success', 'Proyecto actualizado correctamente.');
    }

    public function delete(Project $project): View
    {   
        Gate::authorize('delete', $project);

        return view('pages.projects.delete', compact('project'));
    }

    public function destroy(Project $project): RedirectResponse
    {   
        Gate::authorize('delete', $project);

        $project->delete();

        return redirect()
            ->route('projects.index')
            ->with('success', 'Proyecto eliminado correctamente.');
    }
}