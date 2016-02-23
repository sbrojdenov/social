<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Bootstrap Core CSS -->
        <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="{{URL::asset('css/shop-homepage.css')}}" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body ng-app="profileApp">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="container-fluid">
                    <div id="image" class="navbar-header">
                        <a class="navbar-brand" href="#"><img src="" /></a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><img src="img/m.jpg" width="60px" heigh="20px" class="img-circle" alt="Cinque Terre"></li>
                        <li class="small-text"><a href="#">Stefan</a></li>                        
                    </ul>                  
                    <ul class="nav navbar-nav navbar-right">
                        <li class="small-text"><a href="/match">Match 10</a></li>
                        <li class="small-text"><a href="#"><span class="glyphicon glyphicon-user"></span>  Logout</a> </li> 
                    </ul>
                </div>
            </div>

        </div>
        <!-- /.container -->
    </nav>
    @yield('content');
    <footer class="footer">
        <div class="container">
            <p class="text-muted">Place sticky footer content here.</p>
        </div>
    </footer>
    <!-- /.container -->
    <!-- jQuery -->


    <script src="js/jquery.js"></script>
   <script src="{{URL::asset('chat/socket.io.js')}}"></script>
    <script>
           var socket = io.connect('localhost:3000');
    </script>
    <script>

</script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular-route.min.js"></script>
    <script src='bower_components/angular-file-model/angular-file-model.js'></script>
    <script src="{{URL::asset('js/profile.js')}}"></script>
    <script src="{{URL::asset('js/controller/about.js')}}"></script>
     <script src="{{URL::asset('js/controller/match.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

