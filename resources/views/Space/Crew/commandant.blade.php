<x-header></x-header>

<x-layoutstar>
    <div class="max-w-screen-xl mx-auto px-4"> <!-- ✅ Conteneur central aligné -->

        <!-- ✅ Titre -->
        <div class="order-1 md:order-1 lg:order-1 w-full md:mt-10">
            <div class="flex flex-row items-center gap-4 bg-[#0B0D17] py-2 justify-center md:justify-start mb-10 lg:mb-20 w-full lg:hidden">
                <x-nb02 />
                <h3 class="uppercase text-white text-center md:text-left text-lg md:text-2xl lg:hidden ">
                {{ $crew->meet }}
                </h3>
            </div>
        </div>

        <!-- ✅ Bloc principal responsive -->
        <div class="flex flex-col md:flex-col-reverse lg:flex-row-reverse items-center justify-center gap-10">



            <!-- Texte -->
            <section class="flex flex-col justify-center items-center md:items-center lg:items-start text-center lg:text-left overflow-y-auto order-3 lg:order-1">
                <div class="hidden lg:block lg:flex lg:gap-5 lg:mb-30">
                    <x-nb02 />
                    <h3 class="uppercase text-white text-left text-lg md:text-2xl hidden lg:block">
                    {{ $crew->meet }}
                    </h3>
                </div>
               
                <span class="text-gray-700 uppercase text-lg md:text-2xl">{{ $crew->fonction }}</span>
                <h1 class="text-white uppercase text-lg md:text-2xl">douglas hurley</h1>
                <p class="text-[#D0D6F9] mt-10 text-lg md:text-2xl lg:max-w-xl">
                    {{ $crew->description }}
                </p>

                <!-- Roundlink (PC) -->
                <div class="hidden lg:block mt-40">
                    <x-roundlink></x-roundlink>
                </div>
            </section>

            <!-- Image + Roundlink Mobile/Tablette -->
            <section>
                <!-- Roundlink tablette -->
                <div class="hidden md:block mt-6 mb-10 lg:hidden">
                    <x-roundlink></x-roundlink>
                </div>

                <!-- Image mobile / tablette -->
                <div class="flex flex-col items-center justify-center lg:hidden">
                    <img src="{{ asset('images/Phone/leaderdouglass.png') }}" alt="commander" class="w-80 h-60 md:w-80 h-80 mx-auto">
                </div>

                <!-- Image PC -->
                <div class="hidden lg:flex flex-col items-center justify-center">
                    <img src="{{ asset('images/Deskstop/leaderdouglass.png') }}" alt="commander" class="mx-auto">
                </div>

                <!-- Roundlink mobile -->
                <div class="block mt-6 lg:hidden md:hidden">
                    <x-roundlink></x-roundlink>
                </div>
            </section>

        </div>
    </div>
</x-layoutstar>