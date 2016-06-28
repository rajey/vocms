<table class="table table-responsive table-condensed table-bordered">
  <tr>
    <th>#</th>
    <th>Plate Number</th>
    <th>Axel Configuration</th>
    <th>
      Permitted GVM(tonnes)
    </th>
    <th>Actions</th>
  </tr>

  <?php $i = 1;?>
  @foreach($trucks as $truck)
  <tr>
    <td>{{$i}}.</td>
    <td>{{$truck->plate_number}}</td>
    <td>{{$truck->configuration->configuration}}</td>
    <td>{{$truck->configuration->gross_mass}}</td>
    <td>
      <a href="#" class="btn app-btn btn-xs" data-toggle="modal" data-target="#truck-{{$truck->id}}" data-backdrop="static" data-keyboard="false">
        <i class="fa fa-edit"></i>
      </a>
      @include('truck.edit')
    </td>
  </tr>
  <?php $i++;?>
  @endforeach
</table>
