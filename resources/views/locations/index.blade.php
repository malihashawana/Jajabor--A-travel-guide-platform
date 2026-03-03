@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold mb-8 text-center">Explore Locations</h1>

    <!-- Search Bar -->
    <form method="GET" action="{{ route('locations.index') }}" class="flex justify-center mb-8">
        <input 
            type="text" 
            name="search" 
            value="{{ request('search') }}" 
            placeholder="Search for a location..." 
            class="border border-gray-300 p-3 rounded-lg w-2/3 md:w-1/3"
        >
        <button 
            type="submit" 
            class="bg-blue-500 text-white p-3 rounded-lg ml-2"
        >
            Search
        </button>
    </form>

    <!-- Locations List -->
    @if ($locations->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($locations as $location)
        <div 
            class="relative bg-cover bg-center rounded-lg shadow-lg overflow-hidden" 
            style="background-image: url('{{ $location->image_url }}'); height: 300px;"
        >
            <!-- Overlay -->
            <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-end p-4">
                <h2 class="text-white text-2xl font-semibold mb-2">{{ $location->name }}</h2>
                <p class="text-gray-300">{{ $location->description }}</p>
                <a 
                    href="{{ route('locations.show', $location->id) }}" 
                    class="mt-4 bg-white text-blue-600 font-semibold py-2 px-4 rounded-lg self-start"
                >
                    View Details
                </a>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <p class="text-center text-gray-600">No locations found.</p>
    @endif
</div>
@endsection
