<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <title>@yield('title')</title>

</head>

<body>

    @include('layouts.navbar')

    <div class="container py-5">
        @section('content')

        @show
    </div>

    <!-- SCRIPT -->
    <script src="{{URL::asset('js/popper.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
</body>

</html>