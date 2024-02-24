<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Admin Dashboard Templates">
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="canonical" href="{{URL::asset('https://www.bootstrap.gallery/')}} ">
    <meta property="og:url" content="{{URL::asset('https://www.bootstrap.gallery/')}}">
    <meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:type" content="Website">
    <meta property="og:site_name" content="Bootstrap Gallery">
    <link rel="shortcut icon" href="{{URL::asset('img/favicon.svg')}} " />

    <!-- Title -->
    <title>Ajyal @yield('title')</title>


    <!-- *************
   ************ Common Css Files *************
  ************ -->
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}} ">
    <!-- Icomoon Font Icons css -->
    <link rel="stylesheet" href="{{URL::asset('fonts/style.css')}} ">
    <!-- Main css -->
    <link rel="stylesheet" href="{{URL::asset('css/main.css')}} ">

    @yield('css')

    <!-- *************
   ************ Vendor Css Files *************
  ************ -->

</head>

<body>

    {{-- <!-- Loading starts -->
		<div id="loading-wrapper">
			<div class="spinner-border" role="status">
				<span class="sr-only">Loading...</span>
			</div>
		</div>
		<!-- Loading ends --> --}}

    <!-- Page wrapper start -->
    <div class="page-wrapper sidebar-mini">

        @include('layouts.sidebar')

        <!-- Page content start  -->
        <div class="page-content">
            @include('layouts.header')

            <!-- Main container start -->
            <div class="main-container">
                @yield('content')
            </div>
            <!-- Main container end -->

            @include('layouts.footer')


        </div>
        <!-- Page content end -->

    </div>
    <!-- Page wrapper end -->

    <!--**************************
   **************************
    **************************
       Required JavaScript Files
    **************************
   **************************
  **************************-->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="{{URL::asset('js/jquery.min.js')}} "></script>
    <script src="{{URL::asset('js/bootstrap.bundle.min.js')}} "></script>
    <script src="{{URL::asset('js/moment.js')}} "></script>

    <!-- Slimscroll JS -->
    <script src="{{URL::asset('vendor/slimscroll/slimscroll.min.js')}}"></script>
    <script src="{{URL::asset('vendor/slimscroll/custom-scrollbar.js')}}"></script>

    @yield('js')
    <script>
        const userID = "{{Auth::id()}}";
    </script>
    <script src="{{URL::asset('js/app.js')}}"></script>

    <!-- Main JS -->
    <script src="{{URL::asset('js/main.js')}}"></script>

</body>

</html>
