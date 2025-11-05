<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes tâches</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#0B0D17]">

    <x-language-selector></x-language-selector>
    <div class="container mx-auto">
        <!-- <h1 class="text-2xl font-bold mb-4"></h1> -->
        {{ $slot }}
    </div>
</body>
</html>