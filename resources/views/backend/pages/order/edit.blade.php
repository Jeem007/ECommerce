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
                    <h5 class="mb-0">Manage Order</h5>
                </div>
                <div class="dropdown options ms-auto"> 
                     <a href="{{route('order.manage')}}" class="btn btn-primary btn btn-sm">All Orders</a>
                </div>
            </div>
        </div>
        <div class="card-body">
           <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="order-details-box">
                        <div class="middle">
                        <h3>Order ID: #{{ $order->id }}</h3>
                        <p class="od">Date: {{ $order->order_date}} </p>
                        <p class="od">Status: 
                        @if( $order->status == 'Complete' )
                        <span class="badge bg-success"> Complete </span>
                        @elseif( $order->status == 'Processing' )
                        <span class="badge bg-dark"> Processing </span>
                        @elseif( $order->status == 'Pending')
                        <span class="badge bg-info"> Pending </span>
                        @elseif( $order->status == 'Canceled')
                        <span class="badge bg-warning"> Canceled </span>
                        @elseif(  $order->status == 'Failed' )
                        <span class="badge bg-danger"> Failed </span>
                        @endif
                        </p>
                        </div>           
                    </div>
                </div>
                <div class="col-lg-4">
                <div class="order-details-box">
                    <h3>Customer Details</h3>
                    <p>Name: {{ $order->name }}</p>
                    <p>Email: {{ $order->email }}</p>
                    <p>Phone: {{ $order->phone }}</p>
                    <p>Address: {{ $order->address_line1 }}, {{ $order->address_line2 }} </p>
                    <p>{{ $order->Division->name }}, {{ $order->District->name }}, {{ $order->zipCode }}</p>
                </div>
                </div>
                <div class="col-lg-4">
                <div class="order-details-box">
                <div class="middle">
                    <h3> Order Amount </h3>
                    <p class="od"> Amount: <strong>{{$order->amount}} {{$order->currency}} </strong>  </p>
                    <p class="od">Transaction ID: <strong>
                        @if(!is_null($order->transaction_id))
                        {{$order->transaction_id}}
                        @else
                        Cash On Delivery
                        @endif
                    </strong>
                     </p>
                </div>
                </div>
                </div>


            </div>
           </div>

           <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8" style="margin-top: 20px;">
                    <div class="order-details-box">
                        <h3>Product Details</h3>
                        <div class="table-responsive">
							<table class="table mb-0" id="example2">
								<thead class="table-light">
									<tr>
										<th>#Serial</th>
										<th>Product Title</th>
                                        <th>Quantity</th>
										<th>Unit Price</th>
                                        <th>SKU Code</th>

									</tr>
								</thead>
							<tbody>
                                @php $sl = 1; @endphp
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $sl }}</td>
                                    <td>{{ $product->Product->title }}</td>
                                    <td> {{ $product->quantity }} Pcs </td>
                                    <td> {{ $product->unit_price }} BDT </td>
                                    <td> -- </td>
                                </tr>
                                @php $sl++; @endphp
                                @endforeach
                                <tr>
                                    <td colspan="3"> <strong> Total Amount </strong></td>
                                    <td> <strong> {{ $order->amount }} BDT</strong></td>
                                </tr>

                            </tbody> 
                    </table>
                    </div>

                        

                    </div>

                    </div>
                    <div class="col-lg-4" style="margin-top: 20px;">
                    <div class="order-details-box">
                        <h3>Order Status</h3>
                        <form action="{{route('order.update',$order->id)}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Order Status</label>
                                <select name="status" class="form-control">
                                    <option >Update the Order Status</option> 
                                    <option value="Complete"
                                    @if ($order->status == "Complete") selected @endif
                                    >Complete</option>
                                    <option value="Processing"
                                    @if ($order->status == "Processing") selected @endif
                                    >Processing</option>
                                    <option value="Pending"
                                    @if ($order->status == "Pending") selected @endif
                                    >Pending</option>
                                    <option value="Canceled"
                                    @if ($order->status == "Canceled") selected @endif
                                    >Canceled</option>
                                    <option value="Failed"
                                    @if ($order->status == "Failed") selected @endif
                                    >Failed</option>
                                    
                                </select>

                            </div>
                            <div class="mb-3">
                                <input type="submit" name="submit" value="Save Changes" class="btn btn-primary btn-sm radius-30 px-4">

                            </div>

                        </form>


                    </div>
                        
                    </div>

                </div>

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