<div class="modal fade" id="report-{{$station->id}}">
	<div class="modal-dialog" style="width: 1000px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<div class="row">
					<div class="col-sm-7">
						<h4>Weighbridge report for year <span id="year-{{$station->id}}"></span></h4>
					</div>
					<div class="col-sm-4">
						{!! Form::open(['class' => 'form-inline pull-right'])!!}
							<input type="hidden" name="id" value="{{$station->id}}">
							<div class="form-group">
									<label for="year" class="control-label">Search Report: </label>
								  {!! Form::selectYear('year', 2000, date('Y'), Carbon\Carbon::now()->year,['class' => 'form-control input-sm year-select'])!!}
							</div>
						{!! Form::close()!!}
					</div>
				</div>
			</div>
			<div class="modal-body">
					<div class="text-center" id="wait-{{$station->id}}"></div>
					<canvas width="970" height="400"></canvas>
			</div>
		</div>
	</div>
</div>
