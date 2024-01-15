@extends ('backend.layout.template')
<!-- page title -->
@section('page-title')
<title>Manage All Orders || ECommerce Platform</title>
@endsection
<!-- body css -->
@section('body-css')

<link href="{{asset('backend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />

@endsection


@section('body-content')
<div class="page-content">
    <div class="card radius-10 w-100">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-0">Manage All Orders</h5>
                </div>
                <div class="dropdown options ms-auto"> 
                     <a href="#" class="btn btn-primary btn btn-sm">View Trash</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if($orders->count()>0)
          
            <div class="table-responsive">
							<table class="table mb-0" id="example2">
								<thead class="table-light">
									<tr>
										<th>Order#</th>
										<th>Customer Name</th>
                                        <th>Phone Number</th>
										<th>Status</th>
										<th>Total Amount</th>
										<th>Date</th>
										<th>View Details</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
                                    <!-- Design -->
                                     <!-- <div class="badge rounded-pill text-info bg-light-info p-2 text-uppercase px-3"><i class="bx bxs-circle align-middle me-1"></i>Confirmed</div> -->
                                     <!-- <div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class="bx bxs-circle me-1"></i>FulFilled</div>  -->
                                     <!-- <div class="badge rounded-pill text-warning bg-light-warning p-2 text-uppercase px-3"><i class="bx bxs-circle align-middle me-1"></i>Partially shipped</div> -->
                                    @foreach ($orders as $order)
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<!-- <div>
													<input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
												</div> -->
												<div class="ms-2">
													<h6 class="mb-0 font-14">#{{ $order->id }}</h6>
												</div>
											</div>
										</td>
										<td>{{ $order->name }}</td>
                                        <td>{{ $order->phone }}</td>

										<td>
                                            @if( $order->status == 'Complete' )
                                            <div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class="bx bxs-circle me-1"></i>Complete</div>

                                            @elseif( $order->status == 'Processing' )
                                            <div class="badge rounded-pill text-info bg-dark p-2 text-uppercase px-3"><i class="bx bxs-circle align-middle me-1"></i>Processing</div>
                                            
                                            @elseif( $order->status == 'Pending')
                                            <div class="badge rounded-pill text-info bg-light-info p-2 text-uppercase px-3"><i class="bx bxs-circle align-middle me-1"></i>Pending</div>

                                            @elseif( $order->status == 'Canceled')
                                            <div class="badge rounded-pill text-warning bg-light-warning p-2 text-uppercase px-3"><i class="bx bxs-circle align-middle me-1"></i>Canceled</div>

                                            @elseif(  $order->status == 'Failed' )
                                            <div class="badge rounded-pill text-warning bg-light-danger p-2 text-uppercase px-3"><i class="bx bxs-circle align-middle me-1"></i>Failed</div>

                                            @endif 
                                           
                                        </td>
										<td>{{ $order->amount }} Tk</td>
										<td>{{ $order->order_date }}</td>
										<td><a href="{{route('order.show', $order->id)}}" class="btn btn-primary btn-sm radius-30 px-4">View Details</td>
										<td>
											<div class="d-flex order-actions">
												<a href="{{route('order.edit', $order->id)}}" class=""><i class="bx bxs-edit"></i></a>
												<a href="javascript:;" class="ms-3"><i class="bx bxs-trash"></i></a>
											</div>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
           
            @else
            <div class="alert alert-info">Sorry! No Order found in Database</div>
            @endif



        </div>
    </div>
</div>
@endsection



@section('body-script')
<script src="{{asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js ')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js ')}}"></script>
<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
@endsection