<x-app-layout>
    <x-slot name="title">Liste des planètes</x-slot>

    <h1 class="text-3xl font-bold mb-6 mt-10 ml-10">🌍 Liste des planètes</h1>

    <!-- Bouton d’ajout -->
    <a href="{{ route('planets.create') }}"
       class="ml-10 bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded mb-4 inline-block">
        + Ajouter une planète
    </a>

    <!-- Table en français -->
    <div class="overflow-x-auto mt-10 px-10">
        <h2 class="text-2xl font-semibold mb-4 text-center">🇫🇷 Planètes (Français)</h2>

        <table class="min-w-full bg-white border border-gray-200 shadow-md rounded text-center">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border-b">Nom</th>
                    <th class="py-2 px-4 border-b">Sous-titre</th>
                    <th class="py-2 px-4 border-b">Distance</th>
                    <th class="py-2 px-4 border-b">Durée</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($planets as $planet)
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4 border-b">{{ $planet->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $planet->subtitle}}</td>
                        <td class="py-2 px-4 border-b">{{ $planet->distance}}</td>
                        <td class="py-2 px-4 border-b">{{ $planet->duration}}</td>
                        <td class="py-2 px-4 border-b space-x-2">
                            <a href="{{ route('planets.edit', $planet) }}"
                               class="bg-yellow-400 hover:bg-yellow-500 text-white py-1 px-4 rounded inline-block w-24 text-center">
                                Modifier
                            </a>

                            <form action="{{ route('planets.destroy', $planet) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white py-1 px-4 rounded inline-block w-24 text-center">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Table en anglais -->
    <div class="overflow-x-auto mt-20 px-10 mb-10">
        <h2 class="text-2xl font-semibold mb-4 text-center">🇬🇧 Planets (English)</h2>

        <table class="min-w-full bg-white border border-gray-200 shadow-md rounded text-center">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Subtitle</th>
                    <th class="py-2 px-4 border-b">Distance</th>
                    <th class="py-2 px-4 border-b">Duration</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($planets as $planet)
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4 border-b">{{ $planet->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $planet->subtitle}}</td>
                        <td class="py-2 px-4 border-b">{{ $planet->distance}}</td>
                        <td class="py-2 px-4 border-b">{{ $planet->duration}}</td>
                        <td class="py-2 px-4 border-b space-x-2">
                            <a href="{{ route('planets.edit', $planet) }}"
                               class="bg-yellow-400 hover:bg-yellow-500 text-white py-1 px-4 rounded inline-block w-24 text-center">
                                Edit
                            </a>

                            <form action="{{ route('planets.destroy', $planet) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white py-1 px-4 rounded inline-block w-24 text-center">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>