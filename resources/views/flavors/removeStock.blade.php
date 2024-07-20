@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Remove Stock from {{ $flavor->name }}</h1>
    <form action="{{ route('flavors.removeStock', $flavor) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="stock" class="block text-gray-700">Stock to Remove</label>
            <input type="number" id="stock" name="stock" class="border border-gray-300 p-2 w-full" required min="1" max="{{ $flavor->stock }}">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Remove Stock</button>
    </form>
</div>
@endsection
