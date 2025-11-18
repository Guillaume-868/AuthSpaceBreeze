<?php

use Illuminate\Support\Facades\App;

if (!function_exists('nav_items')) {
    function nav_items(): array
    {
        return [
            [
                'label' => __('nav.home'),
                'route' => route('home'),
            ],
            [
                'label' => __('nav.destination'),
                'route' => route('planets.index'),
            ],
            [
                'label' => __('nav.crew'),
                'route' => route('crews.index'),
            ],
            [
                'label' => __('nav.technologies'),
                'route' => route('starships.index'),
            ],
        ];
    }
}