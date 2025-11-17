<x-app-layout>
    <x-slot name="title">Modifier la planète : {{ $planet->name_fr }}</x-slot>

    <h1 class="text-3xl font-bold text-center mt-6">Modifier la planète : {{ $planet->name_fr }}</h1>

    <div class="flex justify-center mt-10">
        <form action="{{ route('planets.update', $planet) }}" method="POST" class="flex flex-col w-96 rounded border border-gray-300 p-6 bg-white shadow-md">
            @csrf
            @method('PUT')

            <h4 class="mt-5 text-center font-bold">🇫🇷 Français</h4>
            <input type="text" name="name_fr" value="{{ $planet->name_fr }}" required placeholder="Nom (FR)" class="mb-2 mt-4 p-2 border rounded">
            <textarea name="description_fr" placeholder="Description (FR)" class="mb-2 p-2 border rounded">{{ $planet->description_fr }}</textarea>
            <input type="text" name="distance_fr" value="{{ $planet->distance_fr }}" placeholder="Distance (FR)" class="mb-2 p-2 border rounded">
            <input type="text" name="duration_fr" value="{{ $planet->duration_fr }}" placeholder="Durée (FR)" class="mb-4 p-2 border rounded">

            <h4 class="mt-5 text-center font-bold">🇬🇧 English</h4>
            <input type="text" name="name_en" value="{{ $planet->name_en }}" required placeholder="Name (EN)" class="mb-2 mt-4 p-2 border rounded">
            <textarea name="description_en" placeholder="Description (EN)" class="mb-2 p-2 border rounded">{{ $planet->description_en }}</textarea>
            <input type="text" name="distance_en" value="{{ $planet->distance_en }}" placeholder="Distance (EN)" class="mb-2 p-2 border rounded">
            <input type="text" name="duration_en" value="{{ $planet->duration_en }}" placeholder="Duration (EN)" class="mb-4 p-2 border rounded">

            <div class="text-center mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
</x-app-layout>