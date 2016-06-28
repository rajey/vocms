<div class="modal fade" id="add-company">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add company </h4>
			</div>
			{!! Form::open(['url' => 'company', 'class' => 'form form-horizontal', 'id' => 'create-company'])  !!}
				<div class="modal-body">
					<div class="app-form">
						<div class="form-group" id="name">
							{!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
							{!! Form::text('name', null, ['class' => 'form-control']) !!}
						</div>

						<div class="form-group" id="name-error"></div>

						<div class="form-group" id="box">
							{!! Form::label('box', 'Box Number', ['class' => 'control-label']) !!}
							{!! Form::text('box', null, ['class' => 'form-control']) !!}
						</div>

						<div class="form-group" id="box-error"></div>

						<div class="form-group" id="email">
							{!! Form::label('email', 'Email Address', ['class' => 'control-label']) !!}
							{!! Form::email('email', null, ['class' => 'form-control']) !!}
						</div>

						<div class="form-group" id="email-error"></div>

						<div class="form-group" id="region">
							{!! Form::label('region', 'Region', ['class' => 'control-label']) !!}
							<select name="region" class="form-control" id="region_select">
								<option value="" selected="selected" disabled="disabled">--select--</option>
								@foreach($regions as $value)
									<option value="{{$value->id}}">{{$value->name}}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group" id="region-error"></div>

						<div class="form-group" id="district">
							{!! Form::label('district', 'District', ['class' => 'control-label']) !!}
							<select name="district" class="form-control" id="district_show">
								<option value="" selected="selected" disabled="disabled">--select--</option>
							</select>
						</div>

						<div class="form-group" id="district-error"></div>

						<div class="form-group" id="phone">
							{!! Form::label('phone-number', 'Telephone Number', ['class' => 'control-label']) !!}
								<div class="input-group">
									<div class="input-group-addon">+255</div>
									{!! Form::text('phone', null, ['class' => 'form-control']) !!}
								</div>
						</div>

						<div class="form-group" id="phone-error"></div>
					</div>
				</div>

				<div class="modal-footer">
					{!! Form::submit('ADD COMPANY', ['class' => 'btn btn-primary btn-lg', 'id' => 'add-company']) !!}
					{!! Form::reset('CLEAR', ['class' => 'btn btn-warning btn-lg']) !!}
					<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">CANCEL</button>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
