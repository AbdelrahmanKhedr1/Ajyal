{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
 --}}


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Admin Dashboard Templates">
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="canonical" href="{{ URL::asset('https://www.bootstrap.gallery/') }} ">
    <meta property="og:url" content="{{ URL::asset('https://www.bootstrap.gallery/') }}">

    <meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:type" content="Website">
    <meta property="og:site_name" content="Bootstrap Gallery">
    <link rel="shortcut icon" href="{{ URL::asset('img/favicon.svg') }} " />

    <!-- Title -->
    <title>Ajyal @yield('title')</title>
    <!-- *************
   ************ Common Css Files *************
  ************ -->
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }} ">
    <!-- Main css -->
    <link rel="stylesheet" href="{{ URL::asset('fonts/style.css') }} ">

    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }} ">



</head>

<body class="authentication">

    <!-- Container start -->
    <div class="container">
        <x-auth-session-status class="mb-4" :status="session('status')" />



        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="row justify-content-md-center">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                    <div class="login-screen">
                        <div class="login-box">
                            <div  class="login-logo">
                                <img src="{{ URL::asset('img/logo.svg') }}" alt="Bootstrap Gallery">
                            </div>
                            <h5>Welcome back,<br />Please Login to your Account.</h5>
                            <a href="{{ route('auth.socialite.redirect', 'google') }}" class="btn btn-secondary">
                                <span class="icon-google">     </span>
                                Login Google
                            </a>
                            <a href="{{ route('auth.socialite.redirect', 'facebook') }}" class="btn btn-primary">
                                <span class="icon-facebook">      </span>
                                Login Facebook
                            </a>
<br>
<br>

                            <div class="form-group">
                                {{-- <input type="text" class="form-control" placeholder="Email Address" /> --}}
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="form-control" type="email" name="email"
                                    :value="old('email')" required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                {{-- <input type="password" class="form-control" placeholder="Password" /> --}}
                                <x-input-label for="password" :value="__('Password')" />

                                <x-text-input id="password" class="form-control" type="password" name="password"
                                    required autocomplete="current-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="actions mb-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="remember_me"
                                        name="remember">
                                    <label class="custom-control-label"
                                        for="remember_me">{{ __('Remember me') }}</label>
                                </div>

                                {{-- <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                                    </label> --}}


                                <button type="submit" class="btn btn-success">{{ __('Log in') }}</button>
                            </div>
                            <div class="forgot-pwd">
                                {{-- <a class="link" href="forgot-pwd.html">Forgot password?</a> --}}
                                @if (Route::has('password.request'))
                                    <a class="link" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>
                            <hr>
                            <div class="actions align-left">
                                <a href="{{route('register')}}" class="btn btn-info ml-0">Create an Account</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!-- Container end -->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="{{ URL::asset('js/jquery.min.js') }} "></script>
		<script src="{{ URL::asset('js/bootstrap.bundle.min.js') }} "></script>
		<script src="{{ URL::asset('js/moment.js') }} "></script>


		<!-- *************
			************ Vendor Js Files *************
		************* -->
		<!-- Slimscroll JS -->
		<script src="{{ URL::asset('vendor/slimscroll/slimscroll.min.js') }} "></script>
		<script src="{{ URL::asset('vendor/slimscroll/custom-scrollbar.js') }} "></script>


		<!-- Main JS -->
		<script src="{{ URL::asset('js/main.js') }} "></script>
</body>

</html>
