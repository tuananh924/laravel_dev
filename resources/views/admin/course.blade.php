@extends('layouts.admin')
@section('header-page','List course')
@section('content')
<div class="row">
  <div class="col-md-12" ng-controller='CoursesController' ng-init="getCourse()">
      <section class="panel">
          <div class="row">
              <div class="col-md-12">
                  <header class="panel-heading">
                     List course
                  </header>
                  <table class="table table-bordered table-hover">
                      <thead>
                      <tr>
                          <th class="text-center">ID course</th>
                          <th>Name course</th>
                          <th>Created date</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr ng-repeat = "course in courses">
                          <td class="text-center"><% course.id %></td>
                          <td><% course.title_course %></td>
                          <td><% course.created_at %></td>
                      </tr>
                      </tbody>
                  </table>
              </div>
          </div>
          <div class="row">
              <div class="col-md-6 col-md-push-4">
                  <posts-pagination class="text-center"></posts-pagination>
              </div>
          </div>


      </section>
  </div>
</div>
@endsection
