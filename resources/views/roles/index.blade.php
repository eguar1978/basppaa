@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Gestionar Roles y Permisos</h1>

    <div class="mb-4">
        <h2 class="text-xl font-bold">Crear Nuevo Rol</h2>
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nombre del Rol</label>
                <input type="text" id="name" name="name" class="border border-gray-300 p-2 w-full" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Crear Rol</button>
        </form>
    </div>

    <div class="mb-4">
        <h2 class="text-xl font-bold">Asignar Rol a Usuario</h2>
        <form action="{{ route('roles.assign') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="user_id" class="block text-gray-700">Usuario</label>
                <select id="user_id" name="user_id" class="border border-gray-300 p-2 w-full" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="role" class="block text-gray-700">Rol</label>
                <select id="role" name="role" class="border border-gray-300 p-2 w-full" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Asignar Rol</button>
        </form>
    </div>

    <div class="mb-4">
        <h2 class="text-xl font-bold">Revocar Rol de Usuario</h2>
        <form action="{{ route('roles.revoke') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="user_id" class="block text-gray-700">Usuario</label>
                <select id="user_id" name="user_id" class="border border-gray-300 p-2 w-full" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="role" class="block text-gray-700">Rol</label>
                <select id="role" name="role" class="border border-gray-300 p-2 w-full" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Revocar Rol</button>
        </form>
    </div>

    <div class="mb-4">
        <h2 class="text-xl font-bold">Asignar Permiso a Rol</h2>
        <form action="{{ route('roles.give-permission') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="role" class="block text-gray-700">Rol</label>
                <select id="role" name="role" class="border border-gray-300 p-2 w-full" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="permission" class="block text-gray-700">Permiso</label>
                <select id="permission" name="permission" class="border border-gray-300 p-2 w-full" required>
                    @foreach($permissions as $permission)
                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Asignar Permiso</button>
        </form>
    </div>

    <div class="mb-4">
        <h2 class="text-xl font-bold">Revocar Permiso de Rol</h2>
        <form action="{{ route('roles.revoke-permission') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="role" class="block text-gray-700">Rol</label>
                <select id="role" name="role" class="border border-gray-300 p-2 w-full" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="permission" class="block text-gray-700">Permiso</label>
                <select id="permission" name="permission" class="border border-gray-300 p-2 w-full" required>
                    @foreach($permissions as $permission)
                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Revocar Permiso</button>
        </form>
    </div>
</div>
@endsection
