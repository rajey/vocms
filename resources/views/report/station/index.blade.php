@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="page-header app-page-header">
				<div class="row">
					<div class="col-sm-2">
						<a href="{{}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;BACK</a>
					</div>
					<div class="col-sm-4">
						<h4>Report 2014</h4>
					</div>
					<div class="col-sm-6">
						{!! Form::open(['class' => 'form form-inline pull-right'])!!}
							<div class="form-group">
								{!! Form::selectYear('year', 2000, date('Y'), null,['class' => 'form-control'])!!}
							</div>
							<div class="form-group">
								{!! Form::selectMonth('month', null, ['class' => 'form-control'])!!}
							</div>
						{!! Form::close()!!}
					</div>
				</div>
			</div>
		</div>
		<!---Bar chart-->
		<div class="col-sm-12">
			<div class="canvas-holder">
				<canvas id="station-chart" width="800" height="400"></canvas>
			</div>
		</div>
	</div>
@endsection()