@extends('layouts.app')

@section('title', 'Eliminar proyecto')

@section('content')

<div class="mx-auto max-w-lg">

    <div class="rounded-xl border bg-white p-8 shadow-sm">

        <div class="mb-6">

            <p class="text-sm text-gray-500">
                Proyecto #{{ $project->id }}
            </p>

            <h1 class="mt-1 text-2xl font-semibold">
                Eliminar proyecto
            </h1>

        </div>

        <div class="rounded-lg bg-red-50 p-4">

            <p class="text-sm text-red-700">
                ¿Estás seguro de que deseas eliminar el proyecto
                <strong>{{ $project->nombre }}</strong>?
            </p>

            <p class="mt-2 text-sm text-red-600">
                Esta acción no se puede deshacer.
            </p>

        </div>

        <form
            method="POST"
            action="{{ route('projects.destroy', $project) }}"
            class="mt-6 flex justify-end gap-3"
        >

            @csrf
            @method('DELETE')

            <a
                href="{{ route('projects.show', $project) }}"
                class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium hover:bg-gray-50"
            >
                Cancelar
            </a>

            <button
                type="submit"
                class="rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700"
            >
                Sí, eliminar
            </button>

        </form>

    </div>

</div>

@endsection