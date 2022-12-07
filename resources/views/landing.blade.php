<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>MotoRent</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@500&display=swap" rel="stylesheet">

        <style>
                    #brand{
            font-family: 'Cabin', sans-serif;
            font-size: 30px;
        }
        #btnLogin{
            background-color: #3F72AF;
        }
        #btnLogin:hover{
            background-color: #a0c2ec;
        }
        #btnRegister{
            text-decoration: none;
            color: #112D4E;
        }
        #btnRegister:hover{
            color: #497fbd;

        }
        /* home page user */
        </style>
    </head>
    <body>
        <nav class="navbar navbar-light bg-light static-top">
            <div class="container">
                <a class="navbar-brand" href="{{url(route('landing'))}}" id="brand">MotoRent</a>
                <a class="btn" href="{{url('/login')}}" style="font-size: 20px">Login</a>
            </div>
        </nav>
        <header class="masthead" style="background-image: url('{{asset('pic/bg.jpg')}}');">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="text-center text-white rounded rounded-5 p-3 shadow">
                            <h1 class="mb-5 fw-light fs-1">Selamat datang di MotoRent , Situs peminjaman motor pertama di Indonesia yang fully-online , mau meminjam motor ?
                                <span>
                                    <a href="{{url('/register')}}" id="btnRegister">Bergabunglah bersama kami</a>
                                </span>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src=""></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>

