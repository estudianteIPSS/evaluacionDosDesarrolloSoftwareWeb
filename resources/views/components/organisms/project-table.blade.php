@props([
    'projects',
    'ufValue',
])

<div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">

            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                        Proyecto
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                        Fecha de inicio
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                        Estado
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                        Responsable
                    </th>

                    <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wide text-gray-500">
                        Monto
                    </th>

                    <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wide text-gray-500">
                        Acciones
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">

                @forelse($projects as $project)

                    <tr class="transition hover:bg-gray-50">

                        <td class="whitespace-nowrap px-6 py-4">
                            <a
                                href="{{ route('projects.show', $project) }}"
                                class="font-medium text-gray-900 hover:text-indigo-600"
                            >
                                {{ $project->nombre }}
                            </a>
                        </td>

                        <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-600">
                            {{ $project->fecha_inicio->format('d/m/Y') }}
                        </td>

                        <td class="whitespace-nowrap px-6 py-4">
                            @php
                                $statusVariant = match ($project->estado) {
                                    'Completado' => 'success',
                                    'En desarrollo' => 'info',
                                    'Pendiente' => 'warning',
                                    'Cancelado' => 'danger',
                                    default => 'default',
                                };
                            @endphp

                            <x-atoms.badge :variant="$statusVariant">
                                {{ $project->estado }}
                            </x-atoms.badge>
                        </td>

                        <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-600">
                            {{ $project->responsable }}
                        </td>

                        <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium text-gray-900">
                            ${{ number_format($project->monto, 0, ',', '.') }}
                        </td>

                        <td class="whitespace-nowrap px-6 py-4 text-right text-sm">
                            <div class="flex justify-end gap-3">

                                <x-atoms.link
                                    :href="route('projects.show', $project)"
                                >
                                    Ver
                                </x-atoms.link>

                                <x-atoms.link
                                    :href="route('projects.edit', $project)"
                                >
                                    Editar
                                </x-atoms.link>

                            </div>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td
                            colspan="6"
                            class="px-6 py-12 text-center text-sm text-gray-500"
                        >
                            No existen proyectos registrados.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>
    </div>

</div>