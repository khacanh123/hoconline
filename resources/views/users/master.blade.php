<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <meta name="description" content="{{$description}}">
    <meta name="author" content="{{$author}}">
    <meta name="keyword" content="{{$keyword}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link href="http://127.0.0.1:8000/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
    <!-- Custom styles for this template -->
    <link href="http://127.0.0.1:8000/css/shop-homepage.css" rel="stylesheet">
</head>
<body>
    @include('users.layout.Navbar')
    <div class="container-fluid" style="width:98%">
        <div class="row">
            <div class="col-lg-3">
                @include('users.layout.sildebar')
            </div>
            <div class="col-lg-9">
                @stack('slideshow')
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="http://127.0.0.1:8000/vendor/jquery/jquery.min.js"></script>
  <script src="http://127.0.0.1:8000/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  @stack('modal')
</body>
</html>