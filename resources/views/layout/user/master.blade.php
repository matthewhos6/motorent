<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@500&display=swap" rel="stylesheet">
    <style>
        .navbar-brand{
            font-family: 'Cabin', sans-serif;
        }
        .page-header {
            height: 400px;
            margin-bottom: 90px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: linear-gradient(rgba(37, 39, 58, 0.9), rgba(37, 39, 58, 0.9)), url({{asset('pic/motor-wallpaper.jpg')}});
            background-attachment: fixed;
        }
        .rent-item h4 {
            transition: .5s;
        }

        .rent-item:hover h4,
        .rent-item.active h4 {
            color: var(--light);
        }
    </style>
    @yield('addon_style')
    @yield('addon_link')
</head>
<body>
    <div class="container-fluid">
        @include('layout.user.navbar')
    </div>
    @yield('content')
    <section class="testimonials text-center mt-5 pb-5 pt-5" style="background-color: rgba(37, 39, 58, 0.9);color:white">
        <div class="container">
            <div class="row">
                <div class="col-6" style="text-align: left">
                    <h1>Contact Us</h1>
                    <img src="{{asset('pic/location.png')}}" width="30px"> Jalan Ngagel Jaya Tengah 73 - 77, Surabaya, Indonesia <br>
                    <img src="{{asset('pic/email.png')}}" width="25px"> motorent@gmail.com <br>
                    <img src="{{asset('pic/call.png')}}" width="20px"> +62 8634 362632 <br>
                </div>
                <div class="col-6">
                    <h1>Follow Us</h1>
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><img src="{{asset('pic/facebook.png')}}" width="30px"></a>
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><img src="{{asset('pic/ig.png')}}" width="30px"></a>
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><img src="{{asset('pic/twitter.png')}}" width="30px"></a>
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><img src="{{asset('pic/linkedin.png')}}" width="30px"></a>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>
</html>
