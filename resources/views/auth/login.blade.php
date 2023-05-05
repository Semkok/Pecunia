<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/x-icon" href="/images/logo.png">
    <title>geldzaken</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/opmaak1.css'])
</head>
<body class="bg-gradient-to-r from-sky-500 to-indigo-500 p-0 m-0 h-screen w-screen">
<div class="flex flex-nowrap flex-row p-5 h-20 w-screen justify-between align-items-center flex-auto bg-blue-900 gap-10"><!--navbar-->
    <img src="images/logo.png" class="flex h-12" alt="logo">
    <div class="flex flex-nowrap flex-row">
        <a href="/" class="inline-flex h-10 w-22 mr-3 items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-blue-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 max-[926px]:w-10 max-[926px]:text-xs" data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
            Home
        </a>
        <a href="/about" class="h-10 w-22 mr-3 inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-blue-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 max-[926px]:w-10 max-[926px]:text-xs" data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
            About
        </a>

        @auth
            <div class="h-10 w-22 mr-3 inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-blue-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 max-[926px]:w-10 max-[926px]:text-xs" data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
                <a href="{{ url('/home') }}">Home</a>
            </div>
        @elseguest
            <div class="h-10 w-22 mr-3 inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-blue-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 max-[926px]:w-10 max-[926px]:text-xs" data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
                <a href="{{ route('login') }}">Log in</a>
            </div>

            <div class="h-10 w-22 mr-3 inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-blue-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 max-[926px]:w-10 max-[926px]:text-xs" data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"> Register</a>
                @endif
            </div>
        @endauth
    </div>
</div> <!--End of navbar-->
<div class=" flex-row w-screen h-80">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>
