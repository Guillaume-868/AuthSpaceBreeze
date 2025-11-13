<x-app-layout>
    <x-slot name="title">
        Ajouter une planète
    </x-slot>

    <h1 class="flex justify-center mt-6 text-4xl font-bold">
        Ajouter une planète
    </h1>

    <div class="flex justify-center">
        <form 
            action="{{ route($type . '.store') }}" 
            method="POST" 
            class="flex-col w-100 rounded-sm mt-20 border-radius border border-black p-4"
        >
            @csrf
         
            <!-- 🇬🇧 Partie anglaise -->
            <h4 class="mt-5 text-center font-bold">🇬🇧 English</h4>

                <input type="text" name="name_en" placeholder="Name (EN)" required class="form-control mb-2 mt-4">
                <input type="text" name="subtitle_en" placeholder="Subtitle (EN)" class="form-control mb-2">
                <input type="text" name="distance_en" placeholder="Distance (EN)" class="form-control mb-2">
                <input type="text" name="duration_en" placeholder="Duration (EN)" class="form-control mb-4">
                <textarea name="description_en" placeholder="Description (EN)" class="form-control mb-2 w-80"></textarea>

            <div class="text-center">
                <button 
                    type="submit" 
                    class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2"
                >
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</x-app-layout>