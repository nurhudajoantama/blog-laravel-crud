<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>

    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <!-- Custom styles for this template -->
    <link href="{{URL::asset('css/auth-page.css')}}" rel="stylesheet">
</head>

<body class="text-center">
    <main class="form-signin w-100 m-auto">
        @section('content')

        @show
    </main>
</body>

</html>