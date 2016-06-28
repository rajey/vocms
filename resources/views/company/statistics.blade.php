<div class="row">
  <div class="col-sm-3 col-xs-12">
      <h4>
        <strong>
          Report by
          <span id="month">{{monthName($statistics['time']['month'])}}</span>
          <span id="year">{{$statistics['time']['year']}}</span>

        </strong>
      </h4>
  </div>
  <div class="col-sm-9 col-xs-12">
      {!!Form::open(['class' => 'form-inline pull-right', 'id' => 'search-statistics'])!!}
        <div class="form-group">
          {!!Form::selectYear('year', 2000, date('Y'), $statistics['time']['year'],['class' => 'form-control input-sm', 'id' => 'year-select'])!!}
        </div>

        <div class="form-group">
          {!! Form::selectMonth('month', $statistics['time']['month'], ['class' => 'form-control input-sm', 'id' => 'month-select'])!!}
        </div>
        <div class="form-group">
          <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></button>
        </div>
      {!!Form::close()!!}
  </div>
</div>
<hr>
<div class="row">
  <div class="col-sm-12">
    <table class="table table-condensed table-bordered">
      <tr>
        <th>#</th>
        <th>Company Name</th>
        <th>Truck weighed</th>
        <th>Truck overloaded</th>
        <th>% overload (overall)</th>
      </tr>
      <tbody id="statistics-body">
        <?php $i = 1; ?>
        @foreach($statistics['data'] as $stat)
        <tr>
          <td>{{$i}}</td>
          <td>{{$stat['name']}}</td>
          <td>{{$stat['weighed']}}</td>
          <td>{{$stat['overloaded']}}</td>
          <td>{{$stat['percentOverload']}}%</td>
        </tr>
        <?php $i++; ?>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
