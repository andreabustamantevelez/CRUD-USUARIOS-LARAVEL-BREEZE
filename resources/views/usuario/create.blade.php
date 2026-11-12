<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Registrar nuevo usuario
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h3 class="text-lg font-semibold mb-6">
                        Formulario de registro de usuario
                    </h3>

                    {{-- Mostrar errores de validación --}}
                    @if ($errors->any())
                        <div class="mb-4 rounded-md bg-red-100 p-4 text-red-800">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('usuarios.store') }}">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            {{-- Username --}}
                            <div>
                                <label for="username" class="block font-medium text-sm mb-2">
                                    Nombre de usuario
                                </label>

                                <input
                                    type="text"
                                    name="username"
                                    id="username"
                                    value="{{ old('username') }}"
                                    maxlength="50"
                                    required
                                    class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm">

                                @error('username')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Contraseña --}}
                            <div>
                                <label for="password" class="block font-medium text-sm mb-2">
                                    Contraseña
                                </label>

                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    required
                                    class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm">

                                @error('password')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Rol --}}
                            <div>
                                <label for="rol" class="block font-medium text-sm mb-2">
                                    Rol
                                </label>

                                <select
                                    name="rol"
                                    id="rol"
                                    required
                                    class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm">

                                    <option value="">Seleccione un rol</option>

                                    <option value="admin" {{ old('rol') == 'admin' ? 'selected' : '' }}>
                                        Administrador
                                    </option>

                                    <option value="vendedor" {{ old('rol') == 'vendedor' ? 'selected' : '' }}>
                                        Vendedor
                                    </option>

                                    <option value="supervisor" {{ old('rol') == 'supervisor' ? 'selected' : '' }}>
                                        Supervisor
                                    </option>
                                </select>

                                @error('rol')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Estado --}}
                            <div>
                                <label for="activo" class="block font-medium text-sm mb-2">
                                    Estado
                                </label>

                                <select
                                    name="activo"
                                    id="activo"
                                    required
                                    class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm">

                                    <option value="1" {{ old('activo', '1') == '1' ? 'selected' : '' }}>
                                        Activo
                                    </option>

                                    <option value="0" {{ old('activo') === '0' ? 'selected' : '' }}>
                                        Inactivo
                                    </option>
                                </select>

                                @error('activo')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Fecha de creación --}}
                            <div>
                                <label for="fecha_creacion" class="block font-medium text-sm mb-2">
                                    Fecha de creación
                                </label>

                                <input
                                    type="date"
                                    name="fecha_creacion"
                                    id="fecha_creacion"
                                    value="{{ old('fecha_creacion', date('Y-m-d')) }}"
                                    required
                                    class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm">

                                @error('fecha_creacion')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Empresa --}}
                            <div>
                                <label for="id_empresa" class="block font-medium text-sm mb-2">
                                    Empresa
                                </label>

                                <select
                                    name="id_empresa"
                                    id="id_empresa"
                                    required
                                    class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm">

                                    <option value="">Seleccione una empresa</option>

                                    @foreach ($empresas as $empresa)
                                        <option
                                            value="{{ $empresa->id_empresa }}"
                                            {{ old('id_empresa') == $empresa->id_empresa ? 'selected' : '' }}>
                                            {{ $empresa->nombre }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('id_empresa')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        {{-- Botones --}}
                        <div class="flex items-center gap-3 mt-8">

                            <button
                                type="submit"
                                class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-md">
                                Guardar usuario
                            </button>

                            <a
                                href="{{ route('usuarios.index') }}"
                                class="px-5 py-2 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-md">
                                Cancelar
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>
