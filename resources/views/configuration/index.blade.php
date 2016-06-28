@extends('layouts.app')

@section('content')
	<ol class="breadcrumb">
		<li class="active">Axle configuration</li>
	</ol>
	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-default">
			  <div class="panel-body">
			    <h4>Axle configuration list</h4>
					<hr>
					<table class="table table-responsive table-bordered table-condensed">
							<tr>
								<th>#</th>
								<th class="">configuration</th>
								<th class="">Permissible GVM (in tonnes)</th>
								<th>Actions</th>
							</tr>

							<?php $i = 1;?>
							@foreach($configuration as $config)

							<tr>
								<td>{{$i}}.</td>
								<td class="">{{$config->configuration}}</td>
								<td class="">{{$config->gross_mass}}</td>
								<td>
									<a href="#" class="btn app-btn btn-xs" data-toggle="modal" data-target="#config-{{$config->id}}" data-backdrop="static" data-keyboard="false">
										<i class="fa fa-edit"></i>
									</a>
									@include('configuration.edit')
								</td>
							</tr>
							<?php $i++;?>
							@endforeach
					</table>
					<!--pagination-->
					<div class="block-center">{!!$configuration->links()!!}</div>
			  </div>
			</div>
	</div>
	<div class="col-sm-4">
			@include('configuration.create')
	</div>
</div>


@endsection
