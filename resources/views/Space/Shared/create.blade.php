<x-app-layout>
    <x-slot name="title">
        {{ $type === 'planets' 
            ? "Ajouter une planète" 
            : ($type === 'crews' 
                ? "Ajouter un membre d'équipage" 
                : "Ajouter une Technologie") 
        }}
    </x-slot>

    <h1 class="flex justify-center mt-6 text-4xl font-bold">
        {{ $type === 'planets' 
            ? "Ajouter une planète" 
            : ($type === 'crews' 
                ? "Ajouter un membre d'équipage" 
                : "Ajouter une Technologie") 
        }}
    </h1>

    <div class="flex justify-center">
        <form
            action="{{ route($type . '.store') }}"
            method="POST"
            class="flex-col w-100 rounded-sm mt-20 border-radius border border-black p-4">
            @csrf

            <!-- 🇫🇷 Partie française -->
            <h4 class="mt-5 text-center font-bold">🇫🇷 Français</h4>

            @if ($type === 'planets')
                <input type="text" name="name_fr" placeholder="Nom (FR)"
                    value="{{ $errors->has('name_fr') ? '' : old('name_fr') }}" required class="form-control mb-2 mt-4">
                <input type="text" name="subtitle_fr" placeholder="Sous-titre (FR)"
                    value="{{ $errors->has('subtitle_fr') ? '' : old('subtitle_fr') }}" class="form-control mb-2">
                <input type="text" name="distance_fr" placeholder="Distance (FR)"
                    value="{{ $errors->has('distance_fr') ? '' : old('distance_fr') }}" class="form-control mb-2">
                <input type="text" name="duration_fr" placeholder="Durée (FR)"
                    value="{{ $errors->has('duration_fr') ? '' : old('duration_fr') }}" class="form-control mb-4">
                <textarea name="description_fr" placeholder="Description (FR)" class="form-control mb-2 w-80">{{ $errors->has('description_fr') ? '' : old('description_fr') }}</textarea>
            @elseif ($type === 'crews')
                <input type="text" name="fonction_fr" placeholder="Fonction (FR)"
                    value="{{ $errors->has('fonction_fr') ? '' : old('fonction_fr') }}" required class="form-control mb-2 mt-4">
                <textarea name="description_fr" placeholder="Description (FR)" class="form-control mb-2 w-80">{{ $errors->has('description_fr') ? '' : old('description_fr') }}</textarea>
                <input type="text" name="meet_fr" placeholder="Rencontre (FR)"
                    value="{{ $errors->has('meet_fr') ? '' : old('meet_fr') }}" class="form-control mb-4">
            @else
                <input type="text" name="starships_fr" placeholder="Vaisseau (FR)"
                    value="{{ $errors->has('starships_fr') ? '' : old('starships_fr') }}" required class="form-control mb-2 mt-4">
                <input type="text" name="subtitle_fr" placeholder="Sous-titre (FR)"
                    value="{{ $errors->has('subtitle_fr') ? '' : old('subtitle_fr') }}" class="form-control mb-2">
                <textarea name="description_fr" placeholder="Description (FR)" class="form-control mb-2 w-80">{{ $errors->has('description_fr') ? '' : old('description_fr') }}</textarea>
            @endif

            <!-- 🇬🇧 Partie anglaise -->
            <h4 class="mt-5 text-center font-bold">🇬🇧 English</h4>

            @if ($type === 'planets')
                <input type="text" name="name_en" placeholder="Name (EN)"
                    value="{{ $errors->has('name_en') ? '' : old('name_en') }}" required class="form-control mb-2 mt-4">
                <input type="text" name="subtitle_en" placeholder="Subtitle (EN)"
                    value="{{ $errors->has('subtitle_en') ? '' : old('subtitle_en') }}" class="form-control mb-2">
                <input type="text" name="distance_en" placeholder="Distance (EN)"
                    value="{{ $errors->has('distance_en') ? '' : old('distance_en') }}" class="form-control mb-2">
                <input type="text" name="duration_en" placeholder="Duration (EN)"
                    value="{{ $errors->has('duration_en') ? '' : old('duration_en') }}" class="form-control mb-4">
                <textarea name="description_en" placeholder="Description (EN)" class="form-control mb-2 w-80">{{ $errors->has('description_en') ? '' : old('description_en') }}</textarea>
            @elseif ($type === 'crews')
                <input type="text" name="fonction_en" placeholder="Role (EN)"
                    value="{{ $errors->has('fonction_en') ? '' : old('fonction_en') }}" required class="form-control mb-2 mt-4">
                <textarea name="description_en" placeholder="Description (EN)" class="form-control mb-2 w-80">{{ $errors->has('description_en') ? '' : old('description_en') }}</textarea>
                <input type="text" name="meet_en" placeholder="Meet (EN)"
                    value="{{ $errors->has('meet_en') ? '' : old('meet_en') }}" class="form-control mb-4">
            @else
                <input type="text" name="starships_en" placeholder="Starships (EN)"
                    value="{{ $errors->has('starships_en') ? '' : old('starships_en') }}" required class="form-control mb-2 mt-4">
                <input type="text" name="subtitle_en" placeholder="Subtitle (EN)"
                    value="{{ $errors->has('subtitle_en') ? '' : old('subtitle_en') }}" class="form-control mb-2">
                <textarea name="description_en" placeholder="Description (EN)" class="form-control mb-2 w-80">{{ $errors->has('description_en') ? '' : old('description_en') }}</textarea>
            @endif

            <div class="text-center">
                <button
                    type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</x-app-layout>