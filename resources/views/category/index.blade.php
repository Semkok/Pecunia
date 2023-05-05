<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Welcome back!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/sass/app.scss', 'resources/js/app.js','resources/css/opmaak1.css'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class=" w-screen h-screen overflow-x-hidden overflow-y-hidden">
<!-- Right Side Of Navbar --><!-- Authentication Links -->
<div class="flex flex-nowrap flex-row p-3 h-20 w-screen justify-between align-items-center flex-auto bg-blue-900 gap-10"><!--navbar-->
    <img src="images/logo.png" class="flex h-12" alt="logo">
    <div class="flex flex-wrap flex-row">
        @auth
            <div class="h-10 w-22 mr-3 inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-blue-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 max-[926px]:w-10 max-[926px]:text-xs " data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
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
    <div class=" flex-col justify-center items-center h-screen w-25  max-[926px]:w-30 bg-red-800 overflow-auto"> <!-- red-->
        <div class="px-4 py-1.5 rounded-md shadow-lg bg-gradient-to-r from-orange-600 to-orange-700 font-medium text-gray-100 block transition duration-300">
            <a href="{{route('category.create')}}">Make a new category</a>
        </div>
        <!-- Message for category deletion -->
        @if(session()->has('message'))
            <div class="bg-red-900 text-xl text-white w-100 h-10 p-2 ">
                Warning {{ session()->get('message') }}
            </div>
        @endif

        @foreach( $categories as $item)
            <div class="bg-blue-500 w-35 h-25 p-3 border-solid border-2 border-sky-500 ax-[926px]:text-xs">
                <div class="bg-green-500 text-xl max-[926px]:text-xs rounded-t-lg">
                Category name:    {{$item->name}}
                </div>
                <div class="bg-red-600 hover:bg-red-600 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
            <form action="{{route('category.destroy', $item->id)}}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit">Delete</button>
            </form>
                </div>
                <div class="bg-yellow-300 hover:bg-yellow-300 text-white font-bold py-2 px-4 border-b-4 border-yellow-700 hover:border-yellow-500 rounded">
                <a href="{{route('category.edit', $item->id)}}"> Edit</a>
                </div>
            </div>
        @endforeach

    </div>


    <div class="h-screen w-75 flex justify-center max-[926px]:w-70 bg-white p-3"> <!-- white-->
        <div class="w-50 h-50">
        <canvas class="" id="piechart-category"></canvas>
        <p>Categories with a transaction amount  {{$transactions->sum('amount')}} </p>

        <script>
            const data = {
                labels: [
                    @foreach($categories as $category) '{{$category->name}} ({{ number_format($category->transactions->sum('amount') / ($transactions->sum('amount') / 100),2) }}%)',@endforeach
                ],
                datasets: [{
                    label: '',
                    data: [
                        @foreach($categories as $category)
                            {{$category->transactions->sum('amount')}},
                        @endforeach
                    ],
                    backgroundColor: [
                        'rgb(140, 200, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(10, 210, 40)',
                        'rgb(160, 10, 235)',
                        'rgb(40, 12, 235)',
                        'rgb(230, 162, 10)',
                        'rgb(190, 163, 240)',
                        'rgb(100, 100, 200)',
                        'rgb(190, 90, 40)',
                        'rgb(230, 1, 0)',
                        'rgb(240, 12, 235)',
                        'rgb(99, 162, 120)',
                    ],
                    hoverOffset: 4
                }]
            };
            const config = {
                type: 'pie',
                data: data,
            };
            let ctx = document.getElementById('piechart-category');
            const myChart = new Chart(ctx, config);
        </script>




    </div>

    </div>
</div>
</body>
</html>
