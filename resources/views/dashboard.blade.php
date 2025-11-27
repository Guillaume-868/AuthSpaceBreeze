<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xs sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <!-- Si Utilisateur = Admin : -->
                @role('admin')
                <a href="{{ route('admin.home') }}" class="underline text-indigo-600 m-5">Aller à l’espace admin</a>
                @endrole

                @can('posts.publish')
                <p class="m-5">Vous pouvez publier des articles.</p>
                @endcan
            </div>
        </div>
    </div>
</x-app-layout>