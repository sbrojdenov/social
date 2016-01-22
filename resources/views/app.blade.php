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
      <link href="{{URL::asset('bower_components/angularjs-datepicker/src/css/angular-datepicker.css')}}" rel="stylesheet" type="text/css" />
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   
   </head>
   <body ng-app="myApp">
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
               <a class="navbar-brand" href="#"><div ng-controller="GreetingController">
  <% greeting %>
</div></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul id="right-nav" class="nav navbar-nav">
               <li>
                  <ul class="nav navbar-nav navbar-right">
                   
                     <li class="dropdown">
                        <a href="#/" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                        <ul id="login-dp" class="dropdown-menu">
                           <li>
                              <div class="row">
                                 <div class="col-md-12">                                 
                                    <form class="form" role="form" method="post" action="/auth/login" accept-charset="UTF-8" id="login-nav">
                                         {!! csrf_field() !!}
                                       <div class="form-group">
                                          <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                          <input type="email"  name="email" value="{{ old('email') }}" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                                       </div>
                                       <div class="form-group">
                                          <label class="sr-only" for="exampleInputPassword2">Password</label>
                                          <input type="password" name="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                          <div class="help-block text-right"><a href=""><span>Forget the password ?</span></a></div>
                                       </div>
                                       <div class="form-group">
                                          <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                       </div>
                                       <div class="checkbox">
                                          <label>
                                          <input type="checkbox" name="remember"> keep me logged-in
                                          </label>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </li>
                        </ul>
                     </li>
                  </ul>
            </div>
            <!-- /.navbar-collapse -->
         </div>
         <!-- /.container -->
      </nav>
      @yield('content');
<!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>
      <!-- /.container -->
      <!-- jQuery -->
      <script src="js/jquery.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
      <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular-route.min.js"></script>
    
      
      <!-- Bootstrap Core JavaScript -->
      <script src="{{URL::asset('bower_components/ngstorage/ngStorage.js')}}"></script>
      <script src="{{URL::asset('bower_components/angularjs-datepicker/src/js/angular-datepicker.js')}}"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="{{URL::asset('js/app.js')}}"></script>
      <script src="{{URL::asset('js/controller/particial.js')}}"></script>

   </body>
</html>

