@extends('layouts.app')
@section('content')
  <ol class="breadcrumb">
    <li class="active">Company</li>
  </ol>
  <div class="panel panel-default">
    <div class="panel-body">
      <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#list" aria-controls="list" role="tab" data-toggle="tab">Company list</a></li>
          <li role="presentation"><a href="#statistic" id="statistics-button" aria-controls="statistic" role="tab" data-toggle="tab">Statistics</a></li>
          <li role="presentation"><a href="#add" aria-controls="add" role="tab" data-toggle="tab">Add Company</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content" style="padding-top: 30px;">
          <div role="tabpanel" class="tab-pane active" id="list">
            @include('company.list')
          </div>
          <div role="tabpanel" class="tab-pane" id="statistic">
            @include('company.statistics')
          </div>
          <div role="tabpanel" class="tab-pane" id="add">
            @include('company.create2')
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
