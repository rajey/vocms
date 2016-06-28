<div class="modal fade" id="{{$company->id}}" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		            <h4 class="modal-title">Company info</h4>
		    </div>
		    <div class="modal-body app-modal">
		        <p><strong>Name:</strong>&nbsp;{{$company->name}}</p>
		        <p><strong>Box Number:</strong>&nbsp;{{$company->box_number}}</p>
		        <p><strong>Region:</strong>&nbsp;{{$company->region_name}}</p>
		        <p><strong>District:</strong>&nbsp;{{$company->district_name}}</p>
		        <p><strong>Email:</strong>&nbsp;{{$company->email}}</p>
		        <p><strong>Phone Number(s)</strong>&nbsp;
		        	@foreach ($company->phone as $phone)
		                @if ($phone->company_id == $company->id)
		                    {{$phone->phone_number}}&nbsp;
		                @endif
		            @endforeach
		        </p>
		    </div>
		</div>
	</div>
</div>
