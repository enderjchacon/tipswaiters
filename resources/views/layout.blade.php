<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('tittle') - Sistema de Propinas</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <!--HEADER -->
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-light light-blue lighten-4">
                    <a class="navbar-brand" href="#">@yield('tittle') </a>                
                    <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1"
                            aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="dark-blue-text">
                                <i class="fas fa-bars fa-1x"></i>
                            </span>
                    </button>
                
                    <div class="collapse navbar-collapse" id="navbarSupportedContent1">               
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('Waiters.index') }}">Meseros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('Tips.index') }}">Propinas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('status.index') }}">Estatus</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cohorts.index') }}">Cortes</a>
                        </li>
                    </ul>     
                    </div>            
                </nav>
            </div>
        </div>
        <!--HEADER -->
        <!--CONTENT -->
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                @yield('content')
            </div>
            <div class="col-1"></div>
        </div>
        <!--CONTENT -->
        <!--FOOTER -->
        <footer class="page-footer font-small blue pt-4">
            <div class="row">
                <div class="col text-center text-md-left">
                    <div class="footer-copyright text-center py-3">© 2019</div>
                </div>
            </div>
        </footer>
        <!--FOOTER -->
    </div>
</body>
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js"></script>
</html>