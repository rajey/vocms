<form class="" action="index.html" method="post" id="create-truck">
  <fieldset>
    <legend>Add New Truck</legend>
    <input type="hidden" name="company" value="{{$company->id}}">
    <div class="form-group" id="plate_number">
      {!! Form::label('plate number', 'Plate #:', ['class' => 'control-label']) !!}
      {!! Form::text('plate_number', null, ['class' => 'form-control input-sm', 'id' => 'name']) !!}
    </div>
    <div class="form-group" id="plate_number-error"></div>

    <div class="form-group" id="configuration">
      {!! Form::label('configuration', 'Axle Configuration:', ['class' => 'control-label']) !!}
      <select name="configuration" class="form-control input-sm">

        <option value="" disabled="disabled" selected="selected">--select--</option>

        @foreach($configuration as $config)
          <option value="{{$config->id}}">{{$config->configuration}}</option>
        @endforeach
      </select>

    </div>
    <div class="form-group" id="configuration-error"></div>

    <div class="form-group" id="tag_id">
      {!! Form::label('tag_id', 'Tag ID:', ['class' => 'control-label']) !!}
      {!! Form::text('tag_id', null, ['class' => 'form-control input-sm']) !!}
    </div>
    <div class="form-group" id="tag_id-error"></div>

    <div class="form-group">
      {!! Form::submit('ADD TRUCK', ['class' => 'btn btn-primary']) !!}
      {!! Form::reset('CLEAR', ['class' => 'btn btn-warning']) !!}
    </div>
  </fieldset>
</form>
