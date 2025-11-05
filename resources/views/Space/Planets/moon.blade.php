<x-header>

</x-header>

<x-layoutstar>
    <div class="flex flex-col lg:flex-row items-center justify-center gap-10 px-4 md:px-20 mb-10">
        <!-- Titre + image à gauche -->
        <div class="flex flex-col items-center w-full lg:w-1/2 gap-6">
            <h3 class="uppercase text-[#ffffff] text-center md:text-2xl md:whitespace-nowrap whitespace-nowrap md:mt-10 text-[#D0D6F9]">
            {{ $planet->subtitle }}
            </h3>
            <img src="{{ asset('images/Phone/moon.png') }}"
                alt="moon"
                class="w-40 h-40 md:w-60 md:h-60 lg:w-[445px] lg:h-[445px]  mx-auto" />
        </div>

        <!-- Colonne droite : texte -->
        <div class="w-full lg:w-1/2 text-center lg:text-left">
            <x-planets />

            <h1 class="uppercase text-white text-4xl md:text-8xl mt-10 md:mt-5 text-center lg:text-left"> {{ $planet->name }} </h1>

            <p class="text-[#D0D6F9] text-base md:text-lg lg:text-xl mt-5 max-w-xl mx-auto lg:mx-0 text-center lg:text-left">
            {{ $planet->description }}
            </p>

            <!-- Stats (distance et durée) -->
            <section class="mt-10 text-white flex flex-col md:flex-row items-center justify-center gap-10 md:gap-20 lg:justify-start text-center lg:text-left">
                <div>
                    <h3 class="uppercase mb-2 text-[#D0D6F9]">distance</h3>
                    <p class="text-white uppercase text-2xl">{{ $planet->distance }}</p>
                </div>
                <div>
                    <h3 class="uppercase mb-2 text-[#D0D6F9]">durée</h3>
                    <p class="text-white uppercase text-2xl">{{ $planet->duration }}</p>
                </div>
            </section>
        </div>
    </div>
</x-layoutstar>