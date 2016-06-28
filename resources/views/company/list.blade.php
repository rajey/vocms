<table class="table table-bordered table-condensed">
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Office</th>
      <th class="text-center"># of trucks</th>
      <th class="text-center">Status</th>
      <th class="text-center">Actions</th>
    </tr>
    <?php $i = 1; ?>
    @foreach($companies as $company)
      <tr>
        <td>{{$i}}.</td>
        <td>{{$company->name}}</td>
        <td>{{$company->location['district_name']}}, {{$company->location['region_name']}}</td>
        <td class="text-center">{{$company->truck_count}}</td>
        <td class="text-center">
          <span class="badge {{$company['status'] == 'active' ? 'success-badge' : 'error-badge' }}">
            <small>{{$company->status}}</small>
          </span>
        </td>
        <td class="text-center"><a href="{{url('/company/'.$company->id)}}" class="btn btn-xs"><i class="fa fa-eye"></i></a></td>
      </tr>
      <?php $i++; ?>
    @endforeach
</table>
<div class="block-center">{!!$companies->links()!!}</div>
