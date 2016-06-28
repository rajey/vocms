<div class="modal fade" id="truck-{{$truck->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="">Edit Truck</h4>
      </div>
      <div class="modal-body">
        <form class="edit-truck" id="edit-truck-{{$truck->id}}">
          {{ csrf_field() }}
          <input type="hidden" name="id" value="{{$truck->id}}">
          <div class="form-group" id="plate_number-{{$truck->id}}">
            {!! Form::label('plate number', 'Plate #:', ['class' => 'control-label']) !!}
            {!! Form::text('plate_number', $truck->plate_number, ['class' => 'form-control input-sm', 'id' => 'name']) !!}
          </div>
          <div class="form-group" id="plate_number-error-{{$truck->id}}"></div>

          <div class="form-group" id="configuration-{{$truck->id}}">
            {!! Form::label('configuration', 'Axle Configuration:', ['class' => 'control-label']) !!}
            <select name="configuration" class="form-control input-sm">
              @foreach($configuration as $value)
                <option value="{{$value->id}}" {{($value->id == $truck->configuration->id) ? 'selected="selected"': '' }}>{{$value->configuration}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group" id="configuration-error-{{$truck->id}}"></div>

          <div class="form-group" id="tag_id-{{$truck->id}}">
            {!! Form::label('tag_id', 'Tag ID:', ['class' => 'control-label']) !!}
            {!! Form::text('tag_id', $truck->tag_id, ['class' => 'form-control input-sm']) !!}
          </div>
          <div class="form-group" id="tag_id-error-{{$truck->id}}"></div>

          <div class="form-group">
            {!! Form::submit('ADD TRUCK', ['class' => 'btn btn-primary']) !!}
            {!! Form::reset('CLEAR', ['class' => 'btn btn-warning']) !!}
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
