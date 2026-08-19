<x-templates.app title="Prueba Atomic Design">

    <div class="space-y-8">

        <div>
            <h1 class="text-2xl font-semibold">
                Prueba de Atomic Design
            </h1>

            <p class="mt-2 text-gray-600">
                Componentes base del sistema.
            </p>
        </div>

        <div class="space-y-4">

            <div>
                <x-atoms.label for="nombre">
                    Nombre
                </x-atoms.label>

                <x-atoms.input
                    id="nombre"
                    name="nombre"
                    placeholder="Ingrese un nombre"
                />
            </div>

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

            <div class="flex gap-2">
                <x-atoms.badge variant="success">
                    Activo
                </x-atoms.badge>

                <x-atoms.badge variant="warning">
                    Pendiente
                </x-atoms.badge>

                <x-atoms.badge variant="danger">
                    Cancelado
                </x-atoms.badge>
            </div>

        </div>

    </div>

</x-templates.app>