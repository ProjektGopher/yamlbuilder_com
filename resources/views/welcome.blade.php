<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none">
<div class="flex flex-col">
    <div class="min-h-screen flex items-center justify-center">
        <div class="flex flex-col justify-around h-full">
            <div>
                <h1 class="text-gray-600 text-center font-light tracking-wider text-5xl mb-6">
                    YAML Builder
                </h1>
                <ul class="list-reset">
                    <li class="inline pr-8">
                        <a href="#" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Documentation">Documentation</a>
                    </li>
                    <li class="inline pr-8">
                        <a href="" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Validate">Validate YAML</a>
                    </li>
                    <li class="inline pr-8">
                        <a href="" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Examples">Examples</a>
                    </li>
                    <li class="inline pr-8">
                        <a href="" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Drivers">Available Drivers</a>
                    </li>
                    <li class="inline pr-8">
                        <a href="https://github.com/ProjektGopher/yamlbuilder_com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="GitHub">GitHub</a>
                    </li>
                </ul>
            </div>
            <div class="text-gray-500 text-center font-light text-sm mt-6">
                This open source project is hosted and maintained by Projekt Gopher Multimedia
            </div>
        </div>
    </div>
</div>
</body>
</html>
