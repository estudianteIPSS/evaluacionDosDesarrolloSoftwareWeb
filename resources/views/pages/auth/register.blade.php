<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Registrarse</title>
</head>

<body class="min-h-screen bg-gray-100 flex items-center justify-center">

    <main class="w-full max-w-md bg-white rounded-lg shadow p-8">

        <h1 class="text-2xl font-semibold mb-6">
            Crear cuenta
        </h1>

        @if ($errors->any())
            <div class="mb-4 rounded bg-red-100 p-4 text-red-700">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.store') }}" class="space-y-4">

            @csrf

            <div>
                <label for="name" class="block mb-1">
                    Nombre
                </label>

                <input
                    id="name"
                    name="name"
                    type="text"
                    value="{{ old('name') }}"
                    required
                    class="w-full rounded border px-3 py-2"
                >
            </div>

            <div>
                <label for="email" class="block mb-1">
                    Correo electrónico
                </label>

                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    required
                    class="w-full rounded border px-3 py-2"
                >
            </div>

            <div>
                <label for="password" class="block mb-1">
                    Contraseña
                </label>

                <input
                    id="password"
                    name="password"
                    type="password"
                    required
                    class="w-full rounded border px-3 py-2"
                >
            </div>

            <div>
                <label for="password_confirmation" class="block mb-1">
                    Confirmar contraseña
                </label>

                <input
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    required
                    class="w-full rounded border px-3 py-2"
                >
            </div>

            <button
                type="submit"
                class="w-full rounded bg-black px-4 py-2 text-white"
            >
                Registrarse
            </button>

        </form>

        <p class="mt-6 text-sm">
            ¿Ya tienes una cuenta?
            <a href="{{ route('login') }}" class="underline">
                Iniciar sesión
            </a>
        </p>

    </main>

</body>
</html>