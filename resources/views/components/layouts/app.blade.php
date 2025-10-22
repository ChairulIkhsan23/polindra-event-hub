<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polindra Event Hub</title>
    @vite(['resource/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <div class="container mx-auto p-6">
        {{ $slot ?? '' }}
    </div>
    @livewireScripts
</body>
</html>