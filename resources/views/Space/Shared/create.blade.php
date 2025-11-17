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
                value="{{ old('name_fr') }}" required class="form-control mb-2 mt-4">
            @error('name_fr') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror


            <input type="text" name="distance_fr" placeholder="Distance (FR)"
                value="{{ old('distance_fr') }}" class="form-control mb-2">
            @error('distance_fr') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror


            <input type="text" name="duration_fr" placeholder="Durée (FR)"
                value="{{ old('duration_fr') }}" class="form-control mb-4">
            @error('duration_fr') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror


            <textarea name="description_fr" placeholder="Description (FR)" class="form-control mb-2 w-80">{{ old('description_fr') }}</textarea>
            @error('description_fr') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror



            @elseif ($type === 'crews')

            <input type="text" name="fonction_fr" placeholder="Fonction (FR)"
                value="{{ old('fonction_fr') }}" required class="form-control mb-2 mt-4">
                @error('fonction_fr') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

            <textarea name="description_fr" placeholder="Description (FR)" class="form-control mb-2 w-80">{{ old('description_fr') }}</textarea>
            @error('description_fr') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

            @else

            <input type="text" name="starships_fr" placeholder="Vaisseau (FR)"
                value="{{ old('starships_fr') }}" required class="form-control mb-2 mt-4">
                @error('starships_fr') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror


            <textarea name="description_fr" placeholder="Description (FR)" class="form-control mb-2 w-80">{{ old('description_fr') }}</textarea>
            @error('description_fr') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            

            @endif

            <!-- 🇬🇧 Partie anglaise -->
            <h4 class="mt-5 text-center font-bold">🇬🇧 English</h4>

            @if ($type === 'planets')

            <input type="text" name="name_en" placeholder="Name (EN)"
                value="{{ old('name_en') }}" required class="form-control mb-2 mt-4">
            @error('name_en') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror


            <input type="text" name="distance_en" placeholder="Distance (EN)"
                value="{{ old('distance_en') }}" class="form-control mb-2">
            @error('distance_en') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror


            <input type="text" name="duration_en" placeholder="Duration (EN)"
                value="{{ old('duration_en') }}" class="form-control mb-4">
            @error('duration_en') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror


            <textarea name="description_en" placeholder="Description (EN)" class="form-control mb-2 w-80">{{ old('description_en') }}</textarea>
            @error('description_en') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror


            @elseif ($type === 'crews')

            <input type="text" name="fonction_en" placeholder="Role (EN)"
                value="{{ old('fonction_en') }}" required class="form-control mb-2 mt-4">
                @error('fonction_en') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror


            <textarea name="description_en" placeholder="Description (EN)" class="form-control mb-2 w-80">{{ old('description_en') }}</textarea>
            @error('description_en') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

            @else

            <input type="text" name="starships_en" placeholder="Starships (EN)"
                value="{{ old('starships_en') }}" required class="form-control mb-2 mt-4">
                @error('starships_en') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

            <textarea name="description_en" placeholder="Description (EN)" class="form-control mb-2 w-80">{{ old('description_en') }}</textarea>
            @error('description_en') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror


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