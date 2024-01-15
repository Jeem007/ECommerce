@extends ('backend.layout.template')
<!-- page title -->
@section('page-title')
<title>Manage Trash Products || ECommerce Platform</title>
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
                    <h5 class="mb-0">Trash Products</h5>
                </div>
                <div class="dropdown options ms-auto"> 
                     <a href="{{route('product.manage')}}" class="btn btn-primary btn btn-sm">View Products</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if($products->count()>0)
            <div class="table-responsive">
            <table class="table table-striped table-bordered" id="example2">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#SL.</th>
                        <th scope="col">Image</th>
                        <th scope="col">Product Title</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Category</th>
                        <th scope="col">Regular Price</th>
                        <th scope="col">Offer Price</th>
                        <th scope="col">Stock Quantity</th>
                        <th scope="col">Is Featured</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=1;
                    @endphp

                    @foreach($products as $product)
                    <tr>

                        <td>{{$i}}</td>
                        <td>
                            Image
                        </td>
                        <td>{{$product->title}}</td>
                        <td>{{$product->Brand->name}}</td>
                        <td>{{$product->Category->name}}</td>
                        <td>{{$product->regular_price}}</td>
                        <td>@if(!is_null($product->offer_price))
                            {{$product->offer_price}} BDT
                            @else
                            N/A
                            @endif
                        </td>
                        <td>{{$product->quantity}}</td>
                        <td>
                        @if($product->is_featured==1)
                            <span class="badge bg-warning">On Sale </span>
                            @elseif($product->is_featured==0)
                            <span class="badge bg-primary"> Regular</span>
                            @endif

                        </td>              
                        <td>
                            @if($product->status==1)
                            <span class="badge bg-primary">Active </span>
                            @elseif($product->status==0)
                            <span class="badge bg-warning"> Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-bar">
                                <ul>
                                    <li>
                                        <a href="{{route('product.edit' ,$product->id )}}">
                                            <i class="lni lni-pencil-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#deleteProduct{{$product->id}}">
                                            <i class="lni lni-trash"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteProduct{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure you want to delete this Product?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                            <div class="action-bar">
                                                <ul>
                                                    <li>
                                                        <form action="{{route('product.destroy', $product->id)}}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Yes</button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                    <button type="submit" class="btn btn-primary"
                                            data-bs-dismiss="modal">Cancel</button>  
                                                    </li>
                                                </ul>
                                            </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                    </tr>

                      
                        @php $i++; @endphp
                    @endforeach
                </tbody>
            </table>

            </div>
           
            @else
            <div class="alert alert-info">Sorry! No Data found in Database</div>
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