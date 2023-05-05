<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Chart.js with Laravel 9</title>
</head>
<body>

<div class="flex-row justify-content-end w-screen h-screen">
<div  style="width: 1400px; margin: auto;">
    <canvas id="myChart"></canvas>
</div>
</div>

@vite(['resources/js/app.js', './resources/css/opmaak1.css'])
</body>
</html>
