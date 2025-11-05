<!-- Drapeaux / Flags -->
@php
    $locales = [
        'en' => 'gb',
        'fr' => 'fr',
        'de' => 'de',
        'dz' => 'dz'
        
    ];
    $currentLocale = app()->getLocale();
    $currentFlag = $locales[$currentLocale] ?? 'gb';
@endphp

<!-- Conteneur principal -->
<div id="lang-filter">
    <!-- Bouton langue -->
    <button
        id="lang-toggle"
        class="fixed right-4 top-4 z-50 flex items-center justify-center w-10 h-10 border border-gray-300 hover:border-blue-400 transition bg-white rounded mt-20 md:mt-30 lg:mt-50 lg:mr-10"
        aria-haspopup="true"
        aria-expanded="false"
    >
        <img id="current-flag" src="https://flagcdn.com/w40/{{ $currentFlag }}.png" alt="{{ $currentLocale }}" class="w-6 h-4">
    </button>

    <!-- Menu déroulant -->
    <div
        id="lang-menu"
        class="fixed right-4 top-16 mt-2 w-10 rounded-md shadow-lg bg-[#0B0D17] ring-1 ring-black ring-opacity-5 hidden z-50 border-white mt-20 md:mt-30 lg:mt-50 lg:mr-10"
    >
        <div class="py-1 flex flex-col items-center">
            @foreach ($locales as $locale => $flag)
                @if ($locale !== $currentLocale)
                    <button
                        class="lang-option w-full px-2 py-1 hover:bg-gray-100"
                        data-locale="{{ $locale }}"
                        data-flag="{{ $flag }}"
                    >
                        <img src="https://flagcdn.com/w40/{{ $flag }}.png" alt="{{ $locale }}" class="w-6 h-4">
                    </button>
                @endif
            @endforeach
        </div>
    </div>
</div>

<!-- CSRF -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Script unique -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('lang-toggle');
    const menu = document.getElementById('lang-menu');
    const options = document.querySelectorAll('.lang-option');
    const currentFlag = document.getElementById('current-flag');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Toggle du menu
    toggle.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });

    // Clic en dehors du menu = fermeture
    document.addEventListener('click', (e) => {
        if (!document.getElementById('lang-filter').contains(e.target)) {
            menu.classList.add('hidden');
        }
    });

    // Gestion des clics sur les langues
    options.forEach(button => {
        button.addEventListener('click', async (e) => {
            e.preventDefault();

            const selectedLocale = button.getAttribute('data-locale');
            const flag = button.getAttribute('data-flag');

            // Mise à jour immédiate de l'icône
            currentFlag.src = `https://flagcdn.com/w40/${flag}.png`;
            currentFlag.alt = selectedLocale;
            menu.classList.add('hidden');

            // Envoi AJAX pour changer la langue côté serveur
            try {
                const response = await fetch("{{ route('locale.change') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ locale: selectedLocale })
                });

                if (response.ok) {
                    location.reload(); // recharge la page pour appliquer la langue
                } else {
                    console.error('Erreur lors du changement de langue');
                }
            } catch (error) {
                console.error('Erreur réseau :', error);
            }
        });
    });
});
</script>