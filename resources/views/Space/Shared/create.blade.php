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
            <input type="text" name="name_fr" placeholder="Nom (FR)" required class="form-control mb-2 mt-4">
            <input type="text" name="subtitle_fr" placeholder="Sous-titre (FR)" class="form-control mb-2">
            <input type="text" name="distance_fr" placeholder="Distance (FR)" class="form-control mb-2">
            <input type="text" name="duration_fr" placeholder="Durée (FR)" class="form-control mb-4">
            <textarea name="description_fr" placeholder="Description (FR)" class="form-control mb-2 w-80"></textarea>
            @elseif ($type === 'crews')
            <input type="text" name="fonction_fr" placeholder="Fonction (FR)" required class="form-control mb-2 mt-4">
            <textarea name="description_fr" placeholder="Description (FR)" class="form-control mb-2 w-80"></textarea>
            <input type="text" name="meet_fr" placeholder="Rencontre (FR)" class="form-control mb-4">
            @else
            <input type="text" name="starships_fr" placeholder="Vaisseau (FR)" required class="form-control mb-2 mt-4">
            <input type="text" name="subtitle_fr" placeholder="Sous-titre (FR)" class="form-control mb-2">
            <textarea name="description_fr" placeholder="Description (FR)" class="form-control mb-2 w-80"></textarea>
            @endif

            <!-- 🇬🇧 Partie anglaise -->
            <h4 class="mt-5 text-center font-bold">🇬🇧 English</h4>

            @if ($type === 'planets')
            <input type="text" name="name_en" placeholder="Name (EN)" required class="form-control mb-2 mt-4">
            <input type="text" name="subtitle_en" placeholder="Subtitle (EN)" class="form-control mb-2">
            <input type="text" name="distance_en" placeholder="Distance (EN)" class="form-control mb-2">
            <input type="text" name="duration_en" placeholder="Duration (EN)" class="form-control mb-4">
            <textarea name="description_en" placeholder="Description (EN)" class="form-control mb-2 w-80"></textarea>
            @elseif ($type === 'crews')
            <input type="text" name="fonction_en" placeholder="Role (EN)" required class="form-control mb-2 mt-4">
            <textarea name="description_en" placeholder="Description (EN)" class="form-control mb-2 w-80"></textarea>
            <input type="text" name="meet_en" placeholder="Meet (EN)" class="form-control mb-4">
            @else
            <input type="text" name="starships_en" placeholder="Starships (EN)" required class="form-control mb-2 mt-4">
            <input type="text" name="subtitle_en" placeholder="Subtitle (EN)" class="form-control mb-2">
            <textarea name="description_en" placeholder="Description (EN)" class="form-control mb-2 w-80"></textarea>
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