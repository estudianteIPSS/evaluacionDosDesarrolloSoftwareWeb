<nav class="flex items-center gap-6 text-sm">

    <a
        href="{{ route('projects.index') }}"
        class="text-gray-600 transition hover:text-gray-900"
    >
        Proyectos
    </a>

    <a
        href="{{ route('projects.create') }}"
        class="text-gray-600 transition hover:text-gray-900"
    >
        Nuevo proyecto
    </a>

    @auth

        <span class="border-l border-gray-200 pl-6 text-gray-500">
            {{ auth()->user()->name }}
        </span>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button
                type="submit"
                class="text-red-600 transition hover:text-red-700"
            >
                Cerrar sesión
            </button>
        </form>

    @endauth

</nav>