<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Welcome back!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/sass/app.scss', 'resources/js/app.js','resources/css/opmaak1.css'])
</head>
<body class=" w-screen h-screen overflow-x-hidden overflow-y-hidden">
<!-- Right Side Of Navbar --><!-- Authentication Links -->
<div class="flex flex-nowrap flex-row p-3 h-20 w-screen justify-between align-items-center flex-auto bg-blue-900 gap-10"><!--navbar-->
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
            <div class="h-10 w-22 mr-3 inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-blue-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 max-[926px]:w-10 max-[926px]:text-xs " data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
                <a href="/category">My Categories</a>
            </div>
            <div class="h-10 w-22 mr-3 inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-blue-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 max-[926px]:w-10 max-[926px]:text-xs " data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
                <a href="/transaction">My Transactions</a>
            </div>
                <div class="h-10 w-22 mr-3 inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-blue-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 max-[926px]:w-10 max-[926px]:text-xs " data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
                    <a href="/saving">My Saving goals</a>
                </div>
            <div class="h-10 w-22 mr-3 inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-green-500 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 max-[926px]:w-10 max-[926px]:text-xs " data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
                <a>
                    {{ Auth::user()->name }}
                </a>
            </div>
            <div class="h-10 w-22 mr-3 inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-red-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 max-[926px]:w-10 max-[926px]:text-xs " data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
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
    <div class=" flex-col justify-center items-center h-screen w-100 bg-red-800 overflow-auto">
        <!-- Total amount-->
        <div class="px-4 py-1.5 rounded-md shadow-lg bg-gradient-to-r from-green-600 to-green-700 font-medium text-gray-100 block transition duration-300">
            <a href="{{route('transaction.create')}}">Make a new transaction</a>
        </div>
            <div class="text-white text-xl">
          Your total amount is:  &euro; {{$transaction->sum('amount')}}
            </div>

        <!-- Message for transaction deletion -->
        @if(session()->has('message'))
            <div class="bg-red-900 text-xl text-white w-100 h-10 p-2 ">
                Warning {{ session()->get('message') }}
            </div>
        @endif
        @foreach($transaction as $item)
            <div class="bg-blue-500 w-30 h-25 p-3 border-solid border-2 border-sky-500">
                <div class="bg-green-500 text-xl rounded-t-lg">
                        Category: {{$item->category->name}}<br>
                        Amount: &euro;  {{$item->amount}}<br>
                        Description: {{$item->description}}
                </div>
                <div class="bg-yellow-300 hover:bg-yellow-300 text-white font-bold py-2 px-4 border-b-4 border-yellow-700 hover:border-yellow-500 rounded">
                <a href="{{route('transaction.edit', $item->id)}}"> Edit</a>
                </div>
                <div class="bg-red-600 hover:bg-red-600 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
                <form action="{{route('transaction.destroy', $item->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
                </div>
            </div>
        @endforeach
        <div class="bg-red-800  w-30 h-25 p-3  ">
        </div>
    </div>

</div>
</body>
</html>

