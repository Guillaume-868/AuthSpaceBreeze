<x-header></x-header>

<x-layoutstar>

    <!-- Titre -->
    <div class="flex flex-row gap-4 bg-[#0B0D17] px-4 py-2 justify-center md:justify-start mb-10 lg:ml-20">
        <x-nb03 />
        <h3 class="uppercase text-[#ffffff] md:text-left text-lg md:text-2xl mt-5 "> {{ $technology->launcher }}</h3>
    </div>

    <!-- ✅ Layout principal : flex-col en mobile, flex-row en lg -->
    <div class="flex flex-col lg:flex-row items-center justify-between gap-10">

        <!-- ✅ Image : mobile/tablette uniquement -->
        <div class="w-full mt-10 lg:hidden">
            <img src="{{ asset('images/Phone/launcher.png') }}" alt="moon"
                class="w-full h-auto">
        </div>


        <div class="mt-6 lg:h-screen lg:flex lg:items-center lg:hidden">
            <x-numberslinks />
        </div>

        <!-- ✅ Texte + Numberslinks -->
        <section class="flex flex-col lg:flex-row justify-center items-start text-center lg:text-left overflow-y-auto gap-10">

            <!-- ✅ Numberslinks desktop -->
            <div class="hidden lg:flex lg:flex-col lg:justify-center  lg:ml-20 lg:mr-20">
                <x-numberslinks />
            </div>

            <!-- ✅ Bloc texte -->
            <div class="flex flex-col justify-center items-center lg:items-start text-center lg:text-left">
                <span class="text-[#D0D6F9] uppercase text-2xl"> {{ $technology->starships }} </span>
                <h1 class="text-white uppercase text-4xl mt-2"> {{ $technology->subtitle }}</h1>
                <p class="text-[#D0D6F9] text-center lg:text-left mt-10 mb-10 lg:max-w-xl">
                {{ $technology->description }}
                </p>
            </div>

        </section>

        <!-- ✅ Image version PC -->
        <div class="hidden lg:flex items-center justify-center">
            <img src="{{ asset('images/Deskstop/lanceur.png') }}" alt="launcher"
                class="w-full h-auto max-w-md">
        </div>

    </div>

</x-layoutstar>