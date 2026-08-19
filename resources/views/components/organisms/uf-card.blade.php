<div class="rounded-xl bg-white p-6 shadow">

    <div class="flex items-start justify-between">

        <div>
            <p class="text-sm font-medium text-gray-500">
                Indicador económico
            </p>

            <h2 class="mt-1 text-xl font-semibold text-gray-900">
                Unidad de Fomento
            </h2>
        </div>

        <span class="rounded-full bg-blue-100 px-3 py-1 text-sm font-medium text-blue-700">
            UF
        </span>

    </div>

    <div class="mt-6">

        <p class="text-sm text-gray-500">
            Valor actual
        </p>

        @if($value !== null)

            <p class="mt-1 text-3xl font-bold text-gray-900">
                ${{ number_format($value, 2, ',', '.') }}
            </p>

        @else

            <p class="mt-1 text-lg font-medium text-gray-500">
                No disponible
            </p>

        @endif

    </div>

</div>