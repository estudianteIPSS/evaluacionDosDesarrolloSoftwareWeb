@props([
    'project' => null,
    'action',
    'method' => 'POST',
    'submitText' => 'Guardar proyecto',
])

<form
    action="{{ $action }}"
    method="POST"
    class="space-y-6"
>
    @csrf

    @if($method !== 'POST')
        @method($method)
    @endif

    <div class="grid gap-6 md:grid-cols-2">

        <x-molecules.form-field
            label="Nombre del proyecto"
            name="nombre"
            :value="$project?->nombre"
            placeholder="Ej: Sistema de gestión"
        />

        <x-molecules.form-field
            label="Fecha de inicio"
            name="fecha_inicio"
            type="date"
            :value="$project?->fecha_inicio?->format('Y-m-d')"
        />

        <x-molecules.form-field
            label="Estado"
            name="estado"
            :value="$project?->estado"
            placeholder="Ej: En desarrollo"
        />

        <x-molecules.form-field
            label="Responsable"
            name="responsable"
            :value="$project?->responsable"
            placeholder="Nombre del responsable"
        />

        <x-molecules.form-field
            label="Monto"
            name="monto"
            type="number"
            :value="$project?->monto"
            placeholder="0"
        />

    </div>

    <div class="flex items-center justify-end gap-3 border-t border-gray-200 pt-6">

        <x-atoms.link
            :href="route('projects.index')"
            class="px-4 py-2"
        >
            Cancelar
        </x-atoms.link>

        <x-atoms.button type="submit">
            {{ $submitText }}
        </x-atoms.button>

    </div>

</form>