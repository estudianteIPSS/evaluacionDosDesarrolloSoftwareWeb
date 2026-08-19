<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Gestión de Proyectos')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-100 text-gray-900">

    <header class="border-b bg-white">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">

            <a
                href="{{ route('projects.index') }}"
                class="text-xl font-semibold"
            >
                Gestión de Proyectos
            </a>

            @auth
                <div class="flex items-center gap-6">

                    <a
                        href="{{ route('projects.index') }}"
                        class="text-sm hover:underline"
                    >
                        Proyectos
                    </a>

                    <a
                        href="{{ route('projects.create') }}"
                        class="text-sm hover:underline"
                    >
                        Nuevo proyecto
                    </a>

                    <span class="text-sm text-gray-600">
                        {{ auth()->user()->name }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button
                            type="submit"
                            class="text-sm text-red-600 hover:underline"
                        >
                            Cerrar sesión
                        </button>
                    </form>

                </div>
            @endauth

        </nav>
    </header>

    <main class="mx-auto max-w-7xl px-6 py-8">

        @if (session('success'))
            <div class="mb-6 rounded-lg bg-green-100 px-4 py-3 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 rounded-lg bg-red-100 px-4 py-3 text-red-800">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')

    </main>

</body>
</html>