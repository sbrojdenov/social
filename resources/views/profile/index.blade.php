@extends('profile')
@section('content')
<!-- Page Content -->
<div class="container" >

    <div class="row">
        <div class="col-md-4" ng-controller = "myCtrl">
<!--        <img ng-src="<% image %>" class="img-responsive"  alt="Cinque Terre">-->
            <div class="image-upload">
                <label for="file-input">
                    <img src="img/f.jpg" widht="200px" height="210px" />
                </label>
                <input id="file-input" type="file" file-model='file' onchange="angular.element(this).scope().uploadFile()" />               
            </div>
<!--            <button id="avatar-button" ng-click="uploadFile()"><span>Upload me</span></button>-->
        </div>
        <div class="col-md-8" id="tab-container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">About</a></li>
                <li><a data-toggle="tab" href="#menu1">Photos</a></li>
                <li><a data-toggle="tab" href="#menu2">Match</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <strong>About</strong>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-5" id="about-info">

            <ul>
                <li><a href="#"><span class="glyphicon glyphicon-heart-empty"></span> <span class="active-profile">General</span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-education"></span> Work and education</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-eye-open"></span> Another</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-home"></span> Another</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-scale"></span> Another</a></li>
            </ul>
        </div>

        <div class="col-md-7">
            <form role="form" name="myform">

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" name="email"  ng-model="email" ng-value="info.email" required ng-minlength="4" ng-maxlength="15" class="form-control"  ng-class="myform.email.$valid ? 'green:' : 'red'" id="name">
                </div>

                <div class="form-group">
                    <label for="name">Password *</label>
                    <input type="<% inputType %>" name="password" ng-model="password" required ng-minlength="5" ng-maxlength="17" ng-value="info.password" class="form-control"  ng-class="myform.password.$valid ? 'green:' : 'red'" id="name" >
                </div>
                <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" name="name" ng-model="name" ng-value="info.name" ng-minlength="3" ng-maxlength="20" class="form-control" required  ng-class="myform.name.$valid ? 'green:' : 'red'" id="name">
                </div>


                <div class="form-group">
                    <label for="last">Birthday *</label>
                    <div class='input-group date'>
                        <datepicker  date-format="dd/MM/yyyy">
                            <input name="birthday" ng-model="date"  ng-class="myform.birthday.$valid ? 'green:' : 'red'"  type='text' ng-value="info.birthday" required class="form-control" />
                        </datepicker>
                        <span class="input-group-addon">
                            <span  class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
<!-- /.container -->
@stop