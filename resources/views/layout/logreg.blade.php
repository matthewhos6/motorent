<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@500&display=swap" rel="stylesheet">

    @yield('addon_style')
    @yield('addon_link')

    <style>
        .cage{
            background-color: #DBE2EF;
            margin: auto;
            width: 40%;
            padding: 20px;
            margin-top: 20px;
        }
        #brand{
            font-family: 'Cabin', sans-serif;
            font-size: 80px;
            text-decoration: none;
            color: #3F72AF;
        }
        #brand:hover{
            color: #021833;
        }
        body{
            background: linear-gradient(rgba(70, 73, 99, 0.9), rgba(70, 73, 99, 0.9)), url({{asset('pic/motor-login.jpg')}});
        }
    </style>
  </head>
  <body>
    <div class="container-fluid">
        <div class="cage rounded rounded-5 border border-5">
            <div class="text-center">
                <a id="brand" href="{{url(route('landing'))}}">MotoRent</a>
                <h1 class="fw-light" style="margin-top: 20px">@yield('judul')</h1>

                @yield('content')
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
