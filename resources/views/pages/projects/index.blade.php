@extends('layouts.app')

@section('title', 'Proyectos')

@section('content')

<x-templates.app title="Proyectos">

    <div class="space-y-8">

        {{-- Encabezado --}}
        <div class="flex items-center justify-between">

            <div>
                <h1 class="text-2xl font-semibold text-gray-900">
                    Proyectos
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Administración de los proyectos registrados.
                </p>
            </div>

            <x-atoms.button
                type="button"
                onclick="window.location='{{ route('projects.create') }}'"
            >
                Nuevo proyecto
            </x-atoms.button>

        </div>

        {{-- Valor de la UF --}}
        <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-gray-500">
                        Valor de la UF
                    </p>

                    <p class="mt-1 text-2xl font-semibold text-gray-900">
                        ${{ number_format($ufValue, 2, ',', '.') }}
                    </p>

                    <p class="mt-1 text-xs text-gray-500">
                        Valor correspondiente al día de hoy
                    </p>
                </div>

            </div>

        </div>

        {{-- Mensaje --}}
        @if(session('success'))

            <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                {{ session('success') }}
            </div>

        @endif

        {{-- Tabla de proyectos --}}
        <x-organisms.project-table
            :projects="$projects"
        />

    </div>

</x-templates.app>

@endsection