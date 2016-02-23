@extends('profile')
@section('content')
<!-- Page Content -->
<div class="container" ng-controller = "matchCtr" ng-init="getMatch()">
    <ul class="list-group"  ng-repeat="mach in myMach">
      
        <li class="list-group-item"><img ng-src="<%'upload/'+ mach.id+ '/'+ mach.avatar %>" widht="125px" height="135"/><span class="test"> <% mach.name%> <img src="img/green.png" widht="12px" height="12px"/></span><span class="bootom-list">write message</span></li>

    </ul>
</div>
<!-- /.container -->
@stop