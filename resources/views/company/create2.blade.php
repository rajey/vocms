<form class="" action="index.html" method="post" id="create-company">
  <fieldset>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group" id="name">
          {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
          {!! Form::text('name', null, ['class' => 'form-control input-sm']) !!}
        </div>
        <div class="form-group" id="name-error"></div>

        <div class="form-group" id="email">
          {!! Form::label('email', 'Email Address', ['class' => 'control-label']) !!}
          {!! Form::email('email', null, ['class' => 'form-control input-sm']) !!}
        </div>
        <div class="form-group" id="email-error"></div>

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
      </div>
      <div class="col-sm-6">
        <div class="form-group" id="box">
          {!! Form::label('box', 'Box Number', ['class' => 'control-label']) !!}
          {!! Form::text('box', null, ['class' => 'form-control input-sm']) !!}
        </div>
        <div class="form-group" id="box-error"></div>

        <div class="form-group" id="phone-1">
          {!! Form::label('phone-number', 'Telephone Number', ['class' => 'control-label']) !!}
            <div class="input-group">
              <div class="input-group-addon">+255</div>
              {!! Form::text('phone-1', null, ['class' => 'form-control input-sm']) !!}
            </div>
        </div>
        <div class="form-group" id="phone-1-error"></div>

        <div class="form-group district" id="district">
          {!! Form::label('district', 'District', ['class' => 'control-label']) !!}
          <select name="district" class="form-control input-sm" id="district_show">
            <option value="" selected="selected" disabled="disabled">--select--</option>
          </select>
        </div>
        <div class="form-group" id="district-error"></div>
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
