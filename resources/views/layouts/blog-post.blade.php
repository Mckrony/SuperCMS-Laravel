<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Posts</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <link href="{{asset('css/libs.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/Front') }}">Geekadelphia</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ url('/about') }}">About</a>
                </li>
                <li>
                    <a href="{{ url('/services') }}">Services</a>
                </li>

                @if (Auth::guest())
                    <li>
                        <a href="{{ url('/login') }}">Login</a>
                    </li>
                    <li>
                        <a href="{{ url('/register') }}">Register</a>
                    </li>
                @else
                    <li>
                        <a href="{{ url('/logouts') }}">Logout</a>
                    </li>
                    @if(session('key') == '1')
                        <li>
                            <a href="{{ url('/admin') }}"> <img height="30" width="50" title="Admin Access Panel" src="{{ asset('images/admin.png')}}" class="img-fluid" alt="Responsive image"></a>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8">

            <!-- Blog Post -->



            @yield('content')



        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Blog Search Well -->


            <!-- Blog Categories Well -->
        @yield('category')

            <!-- Side Widget Well -->


        </div>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->


</div>
<!-- /.container -->

<!-- jQuery -->
<script src="{{asset('js/libs.js')}}"></script>
@yield('scripts')
</body>

</html>
