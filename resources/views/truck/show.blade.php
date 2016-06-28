@extends('layouts.app')

@section('content')
	<div class="app-content">
		<div class="row">
			<div class="col-sm-12">
				<div class="page-header app-page-header">
					<div class="row">
						<div class="col-sm-6">
							<h4>Truck list</h4>
						</div>
						<div class="col-sm-6">

						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-12">
				<table class="table table-responsive table-condensed">
					<thead>
						<tr>
							<th>S/N</th>
							<th>Plate Number</th>
							<th>Axel Configuration</th>
							<th>
								Permitted GVM in tonnes
							</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1;?>
						@foreach($trucks as $truck)
						<tr>
							<td>{{$i}}</td>
							<td>{{$truck->plate_number}}</td>
							<td>{{$truck->configuration_id}}</td>
							<td></td>
							<td><a href="#" class="btn app-btn btn-sm"><i class="fa fa-edit"></i></a></td>
						</tr>
						<?php $i++;?>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection
