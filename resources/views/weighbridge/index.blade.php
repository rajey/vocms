@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
		<li class="active">Weighbridge Station</li>
	</ol>

	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-default">
			  <div class="panel-body">
					<h4>Weighbridge Station list</h4>
					<hr>
					<table class="table table-responsive table-condensed table-bordered">
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>regID</th>
								<th>Location</th>
								<th class="text-center">Status</th>
								<th>Actions</th>
							</tr>
							<?php $i = 1;?>
							@foreach($stations as $station)
							<tr>
								<td>{{$i}}.</td>
								<td>{{$station->name}}</td>
								<td>{{$station->station_number}}</td>
								<td>{{$station->location['district_name']}}, {{$station->location['region_name']}}</td>
								<td class="text-center">
									<span class="success-badge badge">
										<small>working</small>
									</span>
								</td>
								<td>
									<a href="#report-{{$station->id}}" data-toggle="modal" data-backdrop="static" data-keyboard="false" class="btn app-btn btn-xs">
										<i class="fa fa-bar-chart"></i>
									</a>
									&nbsp;
									@include('report.station.report')
									<a href="#station-{{$station->id}}" data-toggle="modal" data-backdrop="static" data-keyboard="false" class="btn app-btn btn-xs">
										<i class="fa fa-edit"></i>
									</a>
									@include('weighbridge.edit')
								</td>
							</tr>
							<?php $i++;?>
							@endforeach
					</table>
					<div class="block-center">{!!$stations->links()!!}</div>
			  </div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="panel panel-default">
			  <div class="panel-body">
			    @include('weighbridge.create')
			  </div>
			</div>
		</div>
	</div>
@endsection
