@extends('profile')
@section('content')
<!-- Page Content -->
<div class="container wrapper" ng-controller = "myCtrl">

    <div class="row">
        <div class="col-md-4" >

            <div class="image-upload">
                <label for="file-input">
                    <div ng-if="image"><img ng-src="<% image %>" class="img-responsive" widht="200px" height="210px"  alt="Cinque Terre"></div>
                    <div ng-if="!image"> <img src="img/f.jpg" widht="200px" height="210px" /></div>
                </label>
                <input id="file-input" type="file" file-model='file' onchange="angular.element(this).scope().uploadFile()" />               
            </div>

        </div>
        <div class="col-md-8" id="tab-container">
            <ul class="nav nav-tabs" >
                 <li ng-repeat="tab in tabs" 
                ng-class="{active:isActiveTab(tab.url)}" 
                ng-click="onClickTab(tab)"><a><% tab.title %></a></li>
               
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
    
     <ng-include src="currentTab"></ng-include>
    
</div>
<!-- /.container -->
@stop