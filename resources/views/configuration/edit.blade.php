<div class="modal fade" id="config-{{$config->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" style="width: 300px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h5 class="modal-title" id="">Edit Configuration</h5>
      </div>
      <div class="modal-body">
				{!! Form::model($config, ['class' => 'edit-configuration', 'id' => 'edit-configuration-{{$config->id}}'])  !!}
					<input name="id" value="{{$config->id}}" type="hidden">

					<div class="form-group" id="configuration-{{$config->id}}">
						{!! Form::label('configuration', 'Axle Configuration:', ['class' => 'control-label']) !!}
            <input type="hidden" name="configuration" value="{{$config->configuration}}">
						<span class="form-control-static">{{$config->configuration}}</span>
					</div>

					<div class="form-group" id="gvm-{{$config->id}}">
						{!! Form::label('gvm', 'Permissible GVM (tonnes)', ['class' => 'control-label']) !!}
						<input type="number" min="10" max="100" name="gvm" value="{{$config->gross_mass}}" class="form-control input-sm">
					</div>
					<div class="form-group" id="gvm-error-{{$config->id}}"></div>

					<div class="form-group">
						{!! Form::submit('Edit Configuration', ['class' => 'btn btn-primary btn-sm']) !!}
						{!! Form::reset('Clear', ['class' => 'btn btn-warning btn-sm']) !!}
					</div>
				{!! Form::close() !!}
				</div>
      </div>
    </div>
</div>
