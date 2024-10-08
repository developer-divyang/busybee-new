@extends('layouts.admin') 

@section('content')  
					<input type="hidden" id="headerdata" value="{{ __("VERIFICATION") }}">
					<div class="content-area">
						<div class="mr-breadcrumb">
							<div class="row">
								<div class="col-lg-12">
										<h4 class="heading">{{ __("Order Verifications") }}</h4>
										<ul class="links">
											<li>
												<a href="{{ route('admin.dashboard') }}">{{ __("Dashboard") }} </a>
											</li>
											<li><a href="javascript:;">{{ __('Order Verifications') }}</a></li>
											<li>
												<a href="{{ route('admin-vr-index','all') }}">{{ __("All Verifications") }}</a>
											</li>
										</ul>
								</div>
							</div>
						</div>
						<div class="product-area">
							<div class="row">
								<div class="col-lg-12">
									<div class="heading-area">
										<h4 class="title">
											{{ __('Allow Verification To Add Product') }} :
										</h4>
										<div class="action-list">
											<select class="process new-select {{ $gs->verify_product == 1 ? 'drop-success' : 'drop-danger' }}">
											  <option data-val="1" value="{{route('admin-gs-status',['verify_product',1])}}" {{ $gs->verify_product == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
											  <option data-val="0" value="{{route('admin-gs-status',['verify_product',0])}}" {{ $gs->verify_product == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
											</select>
										  </div>
									</div>


									<div class="mr-table allproduct">
										@include('alerts.admin.form-success') 
										<div class="table-responsive">
												<table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
													<thead>
														<tr>
		                                                  <th>{{ __("Customer Name") }}</th>
		                                                  <th>{{ __("Customer Email") }}</th>
		                                                  <th>{{ __("Descriptions") }}</th>
		                                                  <th>{{ __("Status") }}</th>
		                                                  <th>{{ __("Options") }}</th>
														</tr>
													</thead>
												</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

{{-- ADD / EDIT MODAL --}}

			<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
										
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
												<div class="submit-loader">
														<img  src="{{asset('assets/images/'.$gs->admin_loader)}}" alt="">
												</div>
											<div class="modal-header">
											<h5 class="modal-title"></h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											</div>
											<div class="modal-body">

											</div>
											<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __("Close") }}</button>
											</div>
						</div>
					</div>

			</div>

{{-- ADD / EDIT MODAL ENDS --}}

{{-- DELETE MODAL --}}

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

	<div class="modal-header d-block text-center">
		<h4 class="modal-title d-inline-block">{{ __("Confirm Delete") }}</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
	</div>

      <!-- Modal body -->
      <div class="modal-body">
            <p class="text-center">{{__("You are about to delete this Verification.")}}</p>
            <p class="text-center">{{ __("Do you want to proceed?") }}</p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-default" data-dismiss="modal">{{ __("Cancel") }}</button>
            			<form action="" class="d-inline delete-form" method="POST">
				<input type="hidden" name="_method" value="delete" />
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
			</form>
      </div>

    </div>
  </div>
</div>

{{-- DELETE MODAL ENDS --}}


{{-- STATUS MODAL --}}

<div class="modal fade" id="status-modal" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

    <div class="modal-header d-block text-center">
        <h4 class="modal-title d-inline-block">{{ __("Update Status") }}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>

      <!-- Modal body -->
      <div class="modal-body">
            <p class="text-center">{{ __("You are about to change the status.") }}</p>
            <p class="text-center">{{ __("Do you want to proceed?") }}</p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-default" data-dismiss="modal">{{ __("Cancel") }}</button>
            <a class="btn btn-success btn-ok">{{ __("Update") }}</a>
      </div>

    </div>
  </div>
</div>

{{-- STATUS MODAL ENDS --}}


{{-- GALLERY MODAL --}}

<div class="modal fade" id="setgallery" tabindex="-1" role="dialog" aria-labelledby="setgallery" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">{{ __('Attachments') }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">

					<div class="top-area">
							<div class="row">
								<div class="col-sm-12 d-inline-block">

										<h5> {{__('Details')}}: <small id="detail"></small></h5>
								</div>

							</div>
						</div>

				<div class="gallery-images">
					<div class="selected-image">
						<div class="row">


						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">


								<div class="col-sm-6 text-right">
									<a id="verify-btn"  href="javascript:;"  class="btn btn-success f-btn" > <i class="fas fa-check"></i> {{ __("Verify") }}</a>
								</div>
								<div class="col-sm-6">
									<a id="decline-btn" href="javascript:;"  class="btn btn-danger f-btn" > <i class="fas fa-times"></i> {{ __("Decline") }}</a>
								</div>


			</div>

			</div>
		</div>
	</div>


{{-- GALLERY MODAL ENDS --}}


@endsection    

@section('scripts')

{{-- DATA TABLE --}}

    <script type="text/javascript">

(function($) {
		"use strict";

		var table = $('#geniustable').DataTable({
			   ordering: false,
               processing: true,
               serverSide: true,
               ajax: '{{ route('admin-vr-datatables','all') }}',
               columns: [
                        { data: 'name', name: 'name' },
                        { data: 'email', name: 'email' },
                        { data: 'text', name: 'text' },
                        { data: 'status', searchable: false, orderable: false},
            			{ data: 'action', searchable: false, orderable: false }
                     ],
               language : {
                	processing: '<img src="{{asset('assets/images/'.$gs->admin_loader)}}">'
                },
				drawCallback : function( settings ) {
	    				$('.select').niceSelect();	

				}
            });

			$('.new-select').niceSelect();	

			  // Droplinks Start
			  $(document).on('change','.new-select',function () {

					var link = $(this).val();
					var data = $(this).find(':selected').attr('data-val');
					if(data == 0)
					{
					$(this).next(".nice-select.process.new-select").removeClass("drop-success").addClass("drop-danger");
					}
					else{
					$(this).next(".nice-select.process.new-select").removeClass("drop-danger").addClass("drop-success");
					}
					$.get(link);
					$.notify("Status Updated Successfully.","success");
				});

})(jQuery);

    </script>

{{-- DATA TABLE --}}


<script type="text/javascript">
	
	// Gallery Section Update
	
	
    $(function($) {
		"use strict";

		$(document).on("click", ".set-gallery" , function(){
			var pid = $(this).find('input[type=hidden]').val();
			$('#pid').val(pid);
			$('.selected-image .row').html('');
				$.ajax({
						type: "GET",
						url:"{{ route('admin-vr-show') }}",
						data:{id:pid},
						success:function(data){
						$('#detail').html(data[2]);
						$('#verify-btn').attr('href',data[3]);
						$('#decline-btn').attr('href',data[4]);
						  if(data[0] == 0)
						  {
							$('.selected-image .row').addClass('justify-content-center');
							  $('.selected-image .row').html('<h3>{{ __("No Images Found.") }}</h3>');
						   }
						  else {
							$('.selected-image .row').removeClass('justify-content-center');
							  $('.selected-image .row h3').remove();      
							  var arr = $.map(data[1], function(el) {
							  return el });
	
							  for(var k in arr)
							  {
							$('.selected-image .row').append('<div class="col-sm-6">'+
											'<div class="img gallery-img">'+
												'<a class="img-popup" href="'+'{{asset('assets/images/attachments').'/'}}'+arr[k]+'">'+
												'<img  src="'+'{{asset('assets/images/attachments').'/'}}'+arr[k]+'" alt="gallery image">'+
												'</a>'+
											'</div>'+
										  '</div>');
							  }                         
						   }
	 
							$('.img-popup').magnificPopup({
							type: 'image'
						  });
	
						 $(document).off('focusin');
	
						}
	
	
					  });
		  });
	
	
	$('.f-btn').on('click',function(e){
		e.preventDefault();
		$.ajax({
		   type:"GET",
		   url:$(this).attr('href'),
		   success:function(data)
		   {
	
			if(admin_loader == 1)
			  {
				$('.submit-loader').hide();
			  }
	
				$('#setgallery').modal('toggle');
				$('.alert-danger').hide();
				$('.alert-success').show();
				$('.alert-success p').html(data[0]);
				$('#geniustable').DataTable().ajax.reload();
		   }
		  });
	});
	
	// Gallery Section Update Ends	
	
})(jQuery);

	</script>

@endsection   
