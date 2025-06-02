{{-- resources/views/welcome.blade.php (o el Blade que estés usando) --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi Aplicación Laravel</title>
    <!-- Fonts / Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            /* Aquí va todo el CSS de Tailwind que ya tenías … */
        </style>
    @endif
</head>

<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
        @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                        Dashboard
                    </a>
                @else
                    {{-- Vamos a quitar el enlace estático de “Log in” y mostrar el formulario aquí mismo  --}}
                @endauth
            </nav>
        @endif
    </header>

    <div
        class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
            {{-- Panel Izquierdo con el logo (igual que antes) --}}
            <div
                class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
                <img src="{{ asset('build/assets/images/logo_dark.png') }}" alt="Logo" class="mx-auto">
            </div>

            {{-- Panel Derecho: aquí va el formulario de login --}}
            <div
                class="bg-[#fff2f2] dark:bg-[#1D0002] relative lg:-ml-px -mb-px lg:mb-0 rounded-t-lg lg:rounded-t-none lg:rounded-r-lg aspect-[335/376] lg:aspect-auto w-full lg:w-[438px] shrink-0 overflow-hidden">
                <div
                    class="absolute inset-0 rounded-t-lg lg:rounded-t-none lg:rounded-r-lg shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]">
                </div>

                {{-- Contenedor centrado para el formulario --}}
                <div class="relative z-10 h-full flex items-center justify-center px-6 lg:px-12">
                    <form method="POST" action="{{ route('login') }}" class="w-full max-w-sm space-y-6">
                        @csrf

                        <h2 class="text-xl font-semibold text-center text-[#1b1b18] dark:text-[#EDEDEC] mb-4">
                            Iniciar Sesión
                        </h2>

                        {{-- Email --}}
                        <div>
                            <label for="email" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC]">
                                Correo Electrónico
                            </label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required
                                autofocus
                                class="
      mt-1 block w-full px-3 py-2 
      bg-white dark:bg-[#1b1b18] 
      border border-[#e3e3e0] dark:border-[#3E3E3A] 
      rounded-md 
      text-black dark:text-white 
      placeholder-gray-400 dark:placeholder-gray-500
      shadow-sm 
      focus:outline-none focus:ring-2 focus:ring-blue-500
    ">

                            @error('email')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Contraseña --}}
                        <div>
                            <label for="password" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC]">
                                Contraseña
                            </label>
                            <input id="password" name="password" type="password" required
                                class="
    mt-1 block w-full px-3 py-2 
    bg-white dark:bg-[#1b1b18] 
    border border-[#e3e3e0] dark:border-[#3E3E3A] 
    rounded-md 
    text-black dark:text-white 
    placeholder-gray-400 dark:placeholder-gray-500
    shadow-sm 
    focus:outline-none focus:ring-2 focus:ring-blue-500
  ">

                            @error('password')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Recordarme (opcional) --}}
                        <div class="flex items-center">
                            <input id="remember_me" name="remember" type="checkbox"
                                class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="remember_me" class="ml-2 block text-sm text-[#1b1b18] dark:text-[#EDEDEC]">
                                Recuérdame
                            </label>
                        </div>

                        {{-- Botón de submit --}}
                        <div>
                            <button type="submit"
                                class="w-full flex justify-center py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Entrar
                            </button>
                        </div>

                        {{-- Enlace a “¿Olvidaste tu contraseña?” (si existe) --}}
                        @if (Route::has('password.request'))
                            <div class="text-center">
                                <a href="{{ route('password.request') }}"
                                    class="text-sm text-blue-600 hover:underline dark:text-blue-400">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </main>
    </div>

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>
