@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Sabores</h1>
    <a href="{{ route('flavors.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
        <i class="fas fa-plus-circle"></i> Agregar Nuevo Sabor
    </a>
    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 border-b text-left">Nombre</th>
                <th class="px-4 py-2 border-b text-left">Descripción</th>
                <th class="px-4 py-2 border-b text-left">Stock</th>
                <th class="px-4 py-2 border-b text-left">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($flavors as $flavor)
                <tr>
                    <td class="px-4 py-2 border-b">{{ $flavor->name }}</td>
                    <td class="px-4 py-2 border-b">{{ $flavor->description }}</td>
                    <td class="px-4 py-2 border-b">{{ $flavor->stock }}</td>
                    <td class="px-4 py-2 border-b flex space-x-4">
                        <!--<a href="{{ route('flavors.edit', $flavor) }}" class="text-blue-500 hover:underline"><i class="fas fa-edit"></i> Editar</a>-->
                        <a href="{{ route('flavors.addStockForm', $flavor) }}" class="text-green-500 hover:underline flex items-center space-x-1">
                            <i class="fas fa-plus-circle"></i> <span>Agregar Stock</span>
                        </a>
                        <a href="{{ route('flavors.removeStockForm', $flavor) }}" class="text-red-500 hover:underline flex items-center space-x-1">
                            <i class="fas fa-minus-circle"></i> <span>Quitar Stock</span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
