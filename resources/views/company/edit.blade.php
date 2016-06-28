<form  class="edit-company">
  <fieldset>
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{$company->id}}">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group" id="name-{{$company->id}}">
          {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
          {!! Form::text('name', $company->name, ['class' => 'form-control input-sm']) !!}
        </div>
        <div class="form-group" id="name-error-{{$company->id}}"></div>

        <div class="form-group" id="email-{{$company->id}}">
          {!! Form::label('email', 'Email Address', ['class' => 'control-label']) !!}
          {!! Form::email('email', $company->email, ['class' => 'form-control input-sm']) !!}
        </div>
        <div class="form-group" id="email-error-{{$company->id}}"></div>

        <div class="form-group" id="region-{{$company->id}}">
          {!! Form::label('region', 'Region', ['class' => 'control-label']) !!}
          <select name="region" class="form-control input-sm region_select">
            @foreach($regions as $value)
              <option value="{{$value->id}}" {{($value->id == $company->location->region_id) ? 'selected="selected"': '' }}>{{$value->name}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group" id="region-error-{{$company->id}}"></div>

        <div class="form-group district" id="district-{{$company->id}}">
          {!! Form::label('district', 'District', ['class' => 'control-label']) !!}
          <select name="district" class="form-control input-sm" id="district_show">
            <option value="{{$company->location->district_id}}" selected="selected">{{$company->location->district_name}}</option>
          </select>
        </div>

        <div class="form-group" id="district-error-{{$company->id}}"></div>
      </div>
      <div class="col-sm-6">
        <div class="form-group" id="box-{{$company->id}}">
          {!! Form::label('box', 'Box Number', ['class' => 'control-label']) !!}
          {!! Form::text('box', $company->box_number, ['class' => 'form-control input-sm']) !!}
        </div>
        <div class="form-group" id="box-error-{{$company->id}}"></div>

        <?php $i = 1; ?>
        @foreach($company->phone as $phone)
          <input type="hidden" name="id-{{$i}}" value="{{$phone->id}}">
          <div class="form-group" id="phone-{{$i}}-{{$company->id}}">
            {!! Form::label('phone-number', 'Telephone Number '.$i, ['class' => 'control-label']) !!}
              <div class="input-group">
                <div class="input-group-addon">+255</div>
                {!! Form::text('phone-'.$i, $phone->phone_number, ['class' => 'form-control input-sm']) !!}
              </div>
          </div>
          <div class="form-group" id="phone-{{$i}}-error-{{$company->id}}"></div>
          <?php $i++; ?>
        @endforeach
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="form-group">
          {!! Form::submit('ADD COMPANY', ['class' => 'btn btn-primary', 'id' => 'add-company']) !!}
					{!! Form::reset('CLEAR', ['class' => 'btn btn-warning']) !!}
        </div>
      </div>
    </div>

  </fieldset>
</form>
