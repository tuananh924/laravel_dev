@extends('layouts.admin')
@section('header-page','List course')
@section('content')
<div class="row">
    <div class="col-md-12" ng-controller="combining">
        <section class="panel">
            <header class="panel-heading">
                Combining AngularJs and ReactJs
                <input type="text" class="form-control" ng-model='framwork'>
                <hr/>
                <fast-ng framework='framework'></fast-ng>
                <hr/>
                <h2>Redering with traditional Angular with <% framework %> </h2>
            </header>
        </section>
    </div>
</div>
@endsection
