<x-app-layout>
    <x-slot name="title">
        {{ $title }} : 
        {{ $item->name_fr ?? $item->fonction_fr ?? 'Élément' }}
    </x-slot>

    <h1 class="text-3xl font-bold text-center mt-6">
        {{ $title }} : 
        {{ $item->name_fr ?? $item->fonction_fr ?? 'Élément' }}
    </h1>

    <div class="flex justify-center mt-10">
        <form action="{{ route($updateRoute, $item) }}" method="POST"
            class="flex flex-col w-96 rounded border border-gray-300 p-6 bg-white shadow-md">
            @csrf
            @method('PUT')

            <!-- 🇫🇷 Section Français -->
            <h4 class="mt-5 text-center font-bold">🇫🇷 Français</h4>

            @if ($type === 'planets')
                <input type="text" name="name_fr" value="{{ $item->name_fr }}" required placeholder="Nom (FR)" class="mb-2 mt-4 p-2 border rounded">
                <input type="text" name="subtitle_fr" value="{{ $item->subtitle_fr }}" placeholder="Sous-titre (FR)" class="mb-2 p-2 border rounded">
                <textarea name="description_fr" placeholder="Description (FR)" class="mb-2 p-2 border rounded">{{ $item->description_fr }}</textarea>
                <input type="text" name="distance_fr" value="{{ $item->distance_fr ?? '' }}" placeholder="Distance (FR)" class="mb-2 p-2 border rounded">
                <input type="text" name="duration_fr" value="{{ $item->duration_fr ?? '' }}" placeholder="Durée (FR)" class="mb-4 p-2 border rounded">

            @elseif ($type === 'crews')
                <input type="text" name="fonction_fr" value="{{ $item->fonction_fr }}" required placeholder="Fonction (FR)" class="mb-2 mt-4 p-2 border rounded">
                <textarea name="description_fr" placeholder="Description (FR)" class="mb-2 p-2 border rounded">{{ $item->description_fr }}</textarea>
                <input type="text" name="meet_fr" value="{{ $item->meet_fr ?? '' }}" placeholder="Rencontre (FR)" class="mb-4 p-2 border rounded">
            @endif

            <!-- 🇬🇧 Section Anglais -->
            <h4 class="mt-5 text-center font-bold">🇬🇧 English</h4>

            @if ($type === 'planets')
                <input type="text" name="name_en" value="{{ $item->name_en }}" required placeholder="Name (EN)" class="mb-2 mt-4 p-2 border rounded">
                <input type="text" name="subtitle_en" value="{{ $item->subtitle_en }}" placeholder="Subtitle (EN)" class="mb-2 p-2 border rounded">
                <textarea name="description_en" placeholder="Description (EN)" class="mb-2 p-2 border rounded">{{ $item->description_en }}</textarea>
                <input type="text" name="distance_en" value="{{ $item->distance_en ?? '' }}" placeholder="Distance (EN)" class="mb-2 p-2 border rounded">
                <input type="text" name="duration_en" value="{{ $item->duration_en ?? '' }}" placeholder="Duration (EN)" class="mb-4 p-2 border rounded">

            @elseif ($type === 'crews')
                <input type="text" name="fonction_en" value="{{ $item->fonction_en }}" required placeholder="Role (EN)" class="mb-2 mt-4 p-2 border rounded">
                <textarea name="description_en" placeholder="Description (EN)" class="mb-2 p-2 border rounded">{{ $item->description_en }}</textarea>
                <input type="text" name="meet_en" value="{{ $item->meet_en ?? '' }}" placeholder="Meet (EN)" class="mb-4 p-2 border rounded">
            @endif

            <div class="text-center mt-4">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
</x-app-layout>