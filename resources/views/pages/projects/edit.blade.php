@extends('layouts.app')

@section('title', 'Nuevo proyecto')

@section('content')


<x-templates.app title="Editar proyecto">

    <div class="mx-auto max-w-3xl space-y-8">

        <div>
            <h1 class="text-2xl font-semibold text-gray-900">
                Editar proyecto
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                Modifica la información del proyecto.
            </p>
        </div>

        <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">

            <x-organisms.project-form
                :project="$project"
                :action="route('projects.update', $project)"
                method="PUT"
                submit-text="Guardar cambios"
            />

        </div>

    </div>

</x-templates.app>

@endsection