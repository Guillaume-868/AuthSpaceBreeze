<x-app-layout>
    <x-slot name="title">{{ $title }}</x-slot>

    <h1 class="text-3xl font-bold mb-6 mt-10 ml-10">{{ $title }}</h1>

    <!-- Bouton d’ajout -->
    <a href="{{ route($createRoute) }}"
        class="ml-10 bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded mb-4 inline-block">
        + Add {{ $type === 'planets' ? 'Planet' : ($type === 'crews' ? 'Crew' : 'Item') }}
    </a>

    <!-- Tableau anglais uniquement -->
    <div class="overflow-x-auto mt-16 px-10 mb-10">
        <h2 class="text-2xl font-semibold mb-4 text-center">
            🇬🇧 
            @if ($type === 'planets')
                Planets (English)
            @elseif ($type === 'crews')
                Crews (English)
            @elseif ($type === 'technologies')
                Technologies (English)
            @else
                Items (English)
            @endif
        </h2>

        <table class="min-w-full bg-white border border-gray-200 shadow-md rounded text-center">
            <thead class="bg-gray-100">
                <tr>
                    @foreach ($fields['en'] as $field => $label)
                        <th class="py-2 px-4 border-b">{{ $label }}</th>
                    @endforeach
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr class="hover:bg-gray-50">
                        @foreach ($fields['en'] as $field => $label)
                            <td class="py-2 px-4 border-b">{{ $item->$field }}</td>
                        @endforeach
                        <td class="py-2 px-4 border-b space-x-2">
                            <a href="{{ route($editRoute, $item) }}"
                                class="bg-yellow-400 hover:bg-yellow-500 text-white py-1 px-4 rounded inline-block w-24 text-center">
                                Edit
                            </a>

                            <form action="{{ route($deleteRoute, $item) }}" method="POST" class="inline-block">
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