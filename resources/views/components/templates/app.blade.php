<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Gestión de Proyectos' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-50 text-gray-900">

    <header class="border-b border-gray-200 bg-white">
        <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-6">
            <a
                href="{{ route('projects.index') }}"
                class="text-lg font-semibold text-gray-900"
            >
                Gestión de Proyectos
            </a>

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
            </nav>
        </div>
    </header>

    <main class="mx-auto max-w-7xl px-6 py-8">
        {{ $slot }}
    </main>

</body>
</html>