<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ URL::asset('assets/css/summernote.css') }}">

    <style>
        body {
            font-family: 'Lato';
            background: url(https://images.unsplash.com/photo-1470104240373-bc1812eddc9f?dpr=1&auto=format&crop=entropy&fit=crop&w=1199&h=799&q=80&cs=tinysrgb);
            background-repeat: no-repeat;
            background-size: cover;
        }

        .fa-btn {
            margin-right: 6px;
        }


        /**
        navbar
        */
        .navbar-default {
            background-color: #222;
            border-color: #222;
            border-radius: 0;
        }
        .navbar-default .navbar-nav>li>a, .navbar-default .navbar-brand {
            color: #eaeaea;
            font-weight: 300;
        }
        .navbar-default .navbar-nav>li>a:focus, .navbar-default .navbar-nav>li>a:hover {
            color: #d2d2d2;
        }
        .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover {
            background: white;
        }
        .dropdown-menu {
            border:0;
        }
        .navbar-default .navbar-brand:focus, .navbar-default .navbar-brand:hover {
            color:white;
        }

        /**
        pages
        */
        .header_page {
            padding: 5px 0 20px;
        }
        .header_page h1 {
            font-weight: 300;
            margin-top:0;
        }

        .page > .container {
            background: rgba(255,255,255,0.7);
            padding: 30px 15px;
        }

        /**
        posts
        */
        article.post {
            padding: 10px 10px 20px;
            margin: 10px 0;
            background: rgba(255,255,255,0.3);
        }
        .post h3{
            font-weight: 300;
        }
        .delete_post {
            outline: none;
            color:red;
            line-height: 0;
        }

        /**
        pagination
        */
        .pagination>li>a, .pagination>li>span {
            background: rgba(255,255,255,.5);
            border-radius: 0 !important;
        }

        /**
        forms
        */
        label {
            font-weight: 300;
        }
        input.form-control, textarea.form-control {
            border-radius: 0;
            padding: 20px 10px;
            box-shadow: none;
            border: 0;
        }
        textarea.form-control {
            padding:0;
        }
        input[type="file"] {
            padding: 7px;
        }

        input.form-control:focus, textarea.form-control:focus {
            border: 0;
            box-shadow: none;
        }
        button.btn.btn-default {
            border-bottom: 0;
            border-radius: 0;
            font-weight: 300;
        }

    </style>

</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Albert Ramos
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                @if (!Auth::guest())
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/panel') }}">Home</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Posts <span class="caret"></span>
                        </a>


                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/posts_list') }}"><i class="fa fa-btn fa-list-ul"></i>All</a></li>
                            <li><a href="{{ url('/post/new') }}"><i class="fa fa-btn fa-plus"></i>New</a></li>
                        </ul>
                    </li>
                </ul>
                @endif

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (!Auth::guest())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="page">
        @yield('content')
    </div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script type="text/javascript" src="{{ URL::asset('assets/js/summernote.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300,
                tabsize: 2
            });
        });
    </script>
</body>
</html>
