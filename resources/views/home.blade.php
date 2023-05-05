<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Welcome back!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/sass/app.scss', 'resources/js/app.js','resources/css/opmaak1.css'])
</head>
<body class=" w-screen h-screen overflow-x-hidden">
<!-- Right Side Of Navbar --><!-- Authentication Links -->
<div class="flex flex-nowrap flex-row p-3 h-20 w-screen justify-between align-items-center flex-auto  bg-blue-900 gap-10"><!--navbar-->
    <img src="images/logo.png" class="flex h-12" alt="logo">
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
                <div class="h-10 w-22 max-[926px]:w-10 mr-3 inline-flex items-center justify-center px-4 py-2 text-base font-medium max-[926px]:text-xs leading-6 text-white whitespace-no-wrap bg-blue-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
            <a href="/category">My Categories</a>
                </div>
                <div class="h-10 w-22 max-[926px]:w-10 mr-3 inline-flex items-center justify-center px-4 py-2 text-base font-medium max-[926px]:text-xs leading-6 text-white whitespace-no-wrap bg-blue-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
            <a href="/transaction">My Transactions</a>
                </div>
                <div class="h-10 w-22 max-[926px]:w-10 mr-3 inline-flex items-center justify-center px-4 py-2 text-base font-medium max-[926px]:text-xs leading-6 text-white whitespace-no-wrap bg-blue-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
                    <a href="/saving">My Saving goals</a>
                </div>
                    <div class="h-10 w-22 max-[926px]:w-10 mr-3 inline-flex items-center justify-center px-4 py-2 text-base font-medium max-[926px]:text-xs leading-6 text-white whitespace-no-wrap bg-green-500 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
            <a>
                {{ Auth::user()->name }}
            </a>
                    </div>
                <div class="h-10 w-22 max-[926px]:w-10 mr-3 inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-red-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
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
</div>
<div class="h-screen w-screen flex">
<div class="h-screen w-25 bg-red-800">
    <!--Vul hier content-->
</div>
<div  class="h-screen w-75 p-3 text-xl">
    Welcome to MyPecunia
</div>
</div>
</body>
</html>
