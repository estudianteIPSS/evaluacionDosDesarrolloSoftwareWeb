@extends('layouts.app')

@section('content')

<div class="space-y-8">

    <div>
        <h1 class="text-3xl font-bold">
            Tech Solutions
        </h1>

        <p class="mt-2 text-gray-600">
            Sistema de gestión de proyectos.
        </p>
    </div>

    <div class="max-w-md rounded-xl bg-white p-6 shadow">
        <h2 class="mb-6 text-xl font-semibold">
            Componentes
        </h2>

        <div class="space-y-4">

            <x-molecules.form-field
                name="demo"
                label="Campo de prueba"
            />

            <div class="flex gap-3">
                <x-atoms.button>
                    Guardar
                </x-atoms.button>

                <x-atoms.button variant="secondary">
                    Cancelar
                </x-atoms.button>

                <x-atoms.button variant="danger">
                    Eliminar
                </x-atoms.button>
            </div>

        </div>
    </div>

</div>

@endsection