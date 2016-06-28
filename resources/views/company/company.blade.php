@extends('layouts.app')

@section('content')
  <ol class="breadcrumb">
    <li><a href="{{url('/company')}}">Company</a></li>
    <li class="active">{{ucfirst($company->name)}}</li>
  </ol>
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-body" style="padding: 0;">
          <table style="margin: 0; height: 115px;">
            <tr>
              <th class="bg-success" style="padding: 10px;">
                <span><i class="fa fa-home fa-5x"></i></span>
              </th>
              <td style="padding: 10px;">
                <ul class="list-unstyled">
                  <li><h4><strong>{{ucfirst($company->name)}}</strong></h4></li>
                  <li>
                    <small>Number of Trucks: </small>
                    <strong>{{$company->truck_count}}</strong>
                  </li>
                </ul>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-body" style="padding: 0;">
          <table style="margin: 0; height: 90px;">
            <tr>
              <th class="bg-success" style="padding: 10px;">
                <i class="fa fa-map-marker fa-5x" aria-hidden="true"></i>
              </th>
              <td style="padding: 10px;">
                <ul class="list-unstyled">
                  <li>
                    <i class="fa fa-phone"></i>&nbsp;
                    @foreach($company->phone as $phone)
                      <small>{{$phone->phone_number}}</small>
                    @endforeach
                  </li>
                  <li>
                    <i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;
                    <small>{{$company->email}}</small>
                  </li>
                  <li>
                    <i class="fa fa-envelope"></i>&nbsp;
                    <small>{{$company->box_number}}</small>
                  </li>
                  <li>
                    <i class="fa fa-thumb-tack" aria-hidden="true"></i>&nbsp;
                    <small>{{$company->location['district_name']}}, {{$company->location['region_name']}}</small>
                  </li>
                </ul>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-body" style="padding: 0;">
          <table style="margin: 0; height: 90px;">
            <tr>
              <th class="bg-success" style="padding: 10px;">
                <i class="fa fa-bar-chart fa-5x" aria-hidden="true"></i>
              </th>
              <td style="padding: 10px;">
                <ul class="list-unstyled">
                  <li>
                    <span class="badge {{$statistics['status'] == 'extreme' ? 'error-badge' : 'success-badge' }}">
                      <small>{{$statistics['status']}}</small>
                    </span>
                  </li>
                  <li>
                    <small>Truck weighed:&nbsp;</small>
                    <strong>{{$statistics['weighed']}}</strong>
                  </li>
                  <li>
                    <small>Truck overloaded:&nbsp;</small>
                    <strong>{{$statistics['overloaded']}}</strong>
                  </li>
                  <li>
                    <small>% overload:&nbsp;</small>
                    <strong>{{$statistics['percentOverload']}}%</strong>
                  </li>
                </ul>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-body">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#truck-tab" aria-controls="truck-tab" role="tab" data-toggle="tab">Truck list</a></li>
        <li role="presentation"><a href="#edit" aria-controls="edit" role="tab" data-toggle="tab">Edit Company</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content" style="padding-top: 30px;">
        <div role="tabpanel" class="tab-pane active" id="truck-tab">
          <div class="row">
            <div class="col-sm-8">
              @include('truck.truck-list')
            </div>
            <div class="col-sm-4">
              <div class="panel panel-default">
                <div class="panel-body">
                  @include('truck.create')
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="edit">
          @include('company.edit')
        </div>
      </div>

    </div>
  </div>

@endsection
