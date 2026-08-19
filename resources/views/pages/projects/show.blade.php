@extends('layouts.app')

@section('title', $project->nombre)

@section('content')

<div class="mx-auto max-w-4xl">

    <div class="mb-8 flex items-start justify-between gap-4">

        <div>
            <p class="text-sm text-gray-500">
                Proyecto #{{ $project->id }}
            </p>

            <h1 class="mt-1 text-3xl font-semibold">
                {{ $project->nombre }}
            </h1>
        </div>

        <div class="flex gap-3">

            <a
                href="{{ route('projects.edit', $project) }}"
                class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium hover:bg-gray-50"
            >
                Editar
            </a>

            <a
                href="{{ route('projects.delete', $project) }}"
                class="rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700"
            >
                Eliminar
            </a>

        </div>

    </div>

    @if (session('success'))
        <div class="mb-6 rounded-lg bg-green-50 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="rounded-xl border bg-white shadow-sm">

        <div class="grid gap-px bg-gray-200 sm:grid-cols-2">

            <div class="bg-white p-6">
                <p class="text-sm text-gray-500">
                    Estado
                </p>

                <div class="mt-2">
                    {{ $project->estado }}
                </div>
            </div>

            <div class="bg-white p-6">
                <p class="text-sm text-gray-500">
                    Responsable
                </p>

                <p class="mt-2 font-medium">
                    {{ $project->responsable }}
                </p>
            </div>

            <div class="bg-white p-6">
                <p class="text-sm text-gray-500">
                    Fecha de inicio
                </p>

                <p class="mt-2 font-medium">
                    {{ $project->fecha_inicio->format('d/m/Y') }}
                </p>
            </div>

            <div class="bg-white p-6">
                <p class="text-sm text-gray-500">
                    Monto
                </p>

                <p class="mt-2 font-medium">
                    ${{ number_format($project->monto, 0, ',', '.') }}
                </p>
            </div>

        </div>

    </div>

    <div class="mt-6">

        <a
            href="{{ route('projects.index') }}"
            class="text-sm font-medium hover:underline"
        >
            ← Volver a proyectos
        </a>

    </div>

</div>

@endsection