@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Add New Flavor</h1>
    <form action="{{ route('flavors.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" id="name" name="name" class="border border-gray-300 p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <textarea id="description" name="description" class="border border-gray-300 p-2 w-full"></textarea>
        </div>
        <div class="mb-4">
            <label for="stock" class="block text-gray-700">Initial Stock</label>
            <input type="number" id="stock" name="stock" class="border border-gray-300 p-2 w-full" required min="0">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Flavor</button>
    </form>
</div>
@endsection
