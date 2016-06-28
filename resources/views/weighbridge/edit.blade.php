<div class="modal fade" id="station-{{$station->id}}">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Weighbgridge station</h4>
			</div>
			<div class="modal-body">
				{!! Form::open(['class' => 'edit-station'])  !!}
					<input name="id" value="{{$station->id}}" type="hidden">
					<div class="form-group" id="name-{{$station->id}}">
						{!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
						{!! Form::text('name', $station->name, ['class' => 'form-control input-sm']) !!}
					</div>
					<div class="form-group" id="name-error-{{$station->id}}"></div>

					<div class="form-group" id="region-{{$station->id}}">
						{!! Form::label('region', 'Region', ['class' => 'control-label']) !!}
						<select class="form-control input-sm region_select" name="region">
							<option value="" selected="selected" disabled="disabled">--select--</option>
							@foreach($regions as $region)
								<option value="{{$region->id}}" {{($region->id == $station->location->region_id) ? 'selected="selected"': '' }}>{{$region->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group" id="region-error-{{$station->id}}"></div>

					<div class="form-group district" id="district-{{$station->id}}">
						{!! Form::label('district', 'District', ['class' => 'control-label']) !!}
						<select name="district" class="form-control input-sm" id="district_show_{{$station->id}}">
							<option value="{{$station->location->district_id}}" selected="selected">{{$station->location->district_name}}</option>
						</select>
					</div>
					<div class="form-group" id="district-error-{{$station->id}}"></div>

					<div class="form-group">
						{!! Form::submit('EDIT STATION', ['class' => 'btn btn-primary btn-sm']) !!}
						{!! Form::reset('CLEAR', ['class' => 'btn btn-warning btn-sm']) !!}
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
