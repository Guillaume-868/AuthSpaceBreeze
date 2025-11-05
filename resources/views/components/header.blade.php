<!-- HEADER -->
<header class="">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <!-- Logo -->
        <div class="text-xl font-bold text-blue-600">
            <a href="/"><img src="{{asset('images/Phone/ellipseDifference.png')}}" alt="Logo" class="h-10"></a>
        </div>

        <!-- Navigation -->
        <section class="flex items-center justify-center mb-20 lg:mt-20">
            <nav class=" flex hidden md:block absolute top-0 right-0 bg-[#0B0D27] backdrop-blur-sm px-8 py-5 items-center justify-center lg:mt-10">
                <ul class="flex gap-6 pt-3 pb-3 pl-10 pr-5 bg-[#0B0D27] backdrop-blur-sm items-center justify-center lg:gap-20">
                    @foreach(nav_items() as $index => $item)
                    <li class="uppercase text-gray-200 hover:text-[#D0D6F9] border-b-4 border-transparent hover:border-[#D0D6F9] active:border-white pb-2 md:text-lg lg:text-2xl">
                        <a href="{{ $item['route'] }}" class="block">
                            {{ str_pad($index, 2, '0', STR_PAD_LEFT) }} {{ $item['label'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </nav>
        </section>
        <!-- Bouton Menu Mobile (burger) -->
        <div class="md:hidden">
            <button id="btnMenu" class="text-white focus:outline-none">
                <!-- Icône burger -->
                <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Menu Mobile (caché par défaut) -->
    <div id="mobileMenu" class="md:hidden hidden fixed top-0 right-0 w-80 h-full bg-[#0B0D17]/50  z-80 px-4 pb-50 flex-col flex items-start justify-center backdrop-blur-sm">

        <!-- ❌ Bouton de fermeture -->
        <button id="closeMenuBtn" class="absolute top-4 right-4 text-white text-5xl hover:text-red-400">
            &times;
        </button>
        <ul>
            @foreach(nav_items() as $index => $item)
            <li class="block py-2 text-[#D0D6F9] hover:text-white pl-4 mb-2">
                <a href="{{ $item['route'] }}" class="block">
                    {{ str_pad($index, 2, '0', STR_PAD_LEFT) }} {{ $item['label'] }}
                </a>
            </li>
            @endforeach

        </ul>
    </div>
</header>