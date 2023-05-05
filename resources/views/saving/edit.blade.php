<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Welcome back!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/sass/app.scss', 'resources/js/app.js','resources/css/opmaak1.css'])
</head>
<body class=" w-screen h-screen overflow-x-hidden">
<div class="flex flex-wrap flex-row p-3 h-20 w-screen justify-between align-items-center flex-auto bg-blue-900 gap-10">
    <img src="public/images/logo.png" class="flex h-12" alt="logo">
    <div class="flex flex-wrap flex-row">
        @auth
            <div class="h-10 w-22 mr-3 inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-blue-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
                <a href="{{ url('/home') }}">Home</a>
            </div>
        @elseguest
            <div class="h-10 w-22 mr-3 inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-blue-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
                <a href="{{ route('login') }}">Log in</a>
            </div>
            <div class="h-10 w-22 mr-3 inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-blue-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"> Register</a>
                @endif
            </div>
        @endauth
        @guest
        @else
            <!-- Button placeholder for dashboard when logged in -->
            <div class="h-10 w-22 mr-3 inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-blue-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
                <a href="/category">My Categories</a>
            </div>
            <div class="h-10 w-22 mr-3 inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-blue-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
                <a href="/transaction">My Transactions</a>
            </div>
            <div class="h-10 w-22 mr-3 inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-blue-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
                <a href="/saving">My Saving goals</a>
            </div>
            <div class="h-10 w-22 mr-3 inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-green-500 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
                <a>
                    {{ Auth::user()->name }}
                </a>
            </div>
            <div class="h-10 w-22 mr-3 inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-red-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
                <a  href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
    </div>
    @endguest
</div>
<div class="h-screen w-screen flex">
    <div class="h-screen w-25 bg-red-800">
        <div class="flex justify-start w-50 h-80 p-3">
            <div class="flex-column">
                <label class="text-sm font-medium">Saving goal</label>
                <form method="POST" action="{{ route('saving.update', ['saving' => $saving->id]) }}">
                    @csrf
                    @method('PUT')

                    <label>
                        <input class="mb-3 px-2 py-1.5
                  mb-3 mt-1 block w-80 px-2 py-1.5 border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
                  focus:outline-none
                  focus:border-sky-500
                  focus:ring-1
                  focus:ring-sky-500
                  focus:invalid:border-red-500 focus:invalid:ring-red-500" type="text" name="name" placeholder="Saving goal" value="{{ $saving->name }}">
                    </label>
                    <label class="text-sm font-medium">Money needed</label>
                        <input type="number" class="mb-3 mt-1 block w-full w-32 h-10 py-1.5 border border-gray-300 resize-none rounded-md text-sm shadow-sm placeholder-gray-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:invalid:border-red-500 focus:invalid:ring-red-500" name="target" placeholder="Amount" value="{{ $saving->target }}">
                    <label>
                        <input type="number" class="mb-3 mt-1 block w-full w-32 h-10 py-1.5 border border-gray-300 resize-none rounded-md text-sm shadow-sm placeholder-gray-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:invalid:border-red-500 focus:invalid:ring-red-500" name="current" placeholder="Current" value="{{ $saving->current }}">
                    </label>
                    <button class="px-4 py-1.5 rounded-md shadow-lg bg-gradient-to-r from-green-600 to-green-700 font-medium text-gray-100 block transition duration-300" type="submit">
                        <span id="login_process_state" class="hidden">Saving</span>
                        <span id="login_default_state">Save<span id="subtotal"></span></span>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="h-screen w-75 bg-white p-3">

    </div>
</div>
</body>
</html>
