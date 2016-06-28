<div class="panel panel-default">
  <div class="panel-body">
    <form class="" method="post" id="create-configuration">
			<fieldset>
				<legend>Add New Configuration</legend>
				<div class="form-group" id="configuration">
					{!! Form::label('configuration', 'Configuration:', ['class' => 'control-label'])!!}
					{!! Form::text('configuration', null, ['class' => 'form-control input-sm'])!!}
				</div>

				<div class="form-group" id="configuration-error"></div>

				<div class="form-group" id="gvm">
					{!! Form::label('gvm', 'Permissible GVM(tonnes):', ['class' => 'control-label'])!!}
					{!! Form::number('gvm', null, ['min' => 10, 'max' => 100, 'class' => 'form-control input-sm'])!!}
				</div>

				<div class="form-group" id="gvm-error"></div>

				<div class="form-group">
						{!! Form::submit('SUBMIT', ['class' => 'btn btn-primary']) !!}
						{!! Form::reset('CLEAR', ['class' => 'btn btn-warning']) !!}
				</div>
			</fieldset>
    </form>
  </div>
</div>
