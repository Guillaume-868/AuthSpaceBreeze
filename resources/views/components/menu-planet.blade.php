

<ul class="flex space-x-10 justify-center mt-10 uppercase lg:justify-start lg:mb-10">
    @foreach($listPlanets as $planet)
        <li>
            <a href="#"
               class="text-gray-200 hover:text-[#D0D6F9] no-underline border-b-4 border-transparent hover:border-[#D0D6F9] active:border-white pb-2 lg:text-2xl">
                {{ $planet->name}}
            </a>
        </li>
    @endforeach
</ul>