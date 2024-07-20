@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Historial de Stock</h1>
    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 border-b text-left">Fecha</th>
                <th class="px-4 py-2 border-b text-left">Sabor</th>
                <th class="px-4 py-2 border-b text-left">Cambio</th>
                <th class="px-4 py-2 border-b text-left">Tipo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($history as $record)
                <tr>
                    <td class="px-4 py-2 border-b">{{ $record->created_at }}</td>
                    <td class="px-4 py-2 border-b">{{ $record->flavor->name }}</td>
                    <td class="px-4 py-2 border-b">{{ $record->change }}</td>
                    <td class="px-4 py-2 border-b">{{ $record->type == 'add' ? 'Agregar' : 'Quitar' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
