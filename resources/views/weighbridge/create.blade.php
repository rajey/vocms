<form id="create-station">
  <fieldset>
    <legend>Add Station</legend>
    <div class="form-group" id="name">
      {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
      {!! Form::text('name', null, ['class' => 'form-control input-sm']) !!}
    </div>
    <div class="form-group" id="name-error"></div>

    <div class="form-group" id="region">
      {!! Form::label('region', 'Region', ['class' => 'control-label']) !!}
      <select name="region" class="form-control input-sm region_select">
        <option value="" selected="selected" disabled="disabled">--select--</option>
        @foreach($regions as $value)
          <option value="{{$value->id}}">{{$value->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group" id="region-error"></div>

    <div class="form-group district" id="district">
      {!! Form::label('district', 'District', ['class' => 'control-label']) !!}
      <select name="district" class="form-control input-sm" id="district_show">
        <option value="" selected="selected" disabled="disabled">--select--</option>
      </select>
    </div>
    <div class="form-group" id="district-error"></div>

    <div class="form-group">
      {!! Form::submit('ADD STATION', ['class' => 'btn btn-primary']) !!}
      {!! Form::reset('CLEAR', ['class' => 'btn btn-warning']) !!}
    </div>
  </fieldset>
</form>
