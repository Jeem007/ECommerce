@extends ('backend.layout.template')
<!-- page title -->
@section('page-title')
<title>Trash Catagories || ECommerce Platform</title>
@endsection
<!-- body css -->
@section('body-css')

@endsection


@section('body-content')
<div class="page-content">
    <div class="card radius-10 w-100">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-0">Trash Catagories</h5>
                </div>
                <div class="dropdown options ms-auto"> 
                     <a href="{{route('category.manage')}}" class="btn btn-primary btn btn-sm">Active Categories</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if($categories->count()>0)
            <div class="table-responsive">
            <table class="table table-striped table-bordered" id="example2">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#SL.</th>
                        <th scope="col">Categories Name</th>
                        <th scope="col">Parent / Child</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- @php
                    $i=1;
                    @endphp -->
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                            @if($category->is_parent==0)
                                <span class="badge bg-primary">Parent Category</span>
                            
                            @else 
                            {{$category->parent->name}}
                            <span class="badge bg-secondary">Child Category</span>
                            @endif
                        </td>
                        <td>@if(!is_null($category->image))
                            <img src="{{asset('images/category/' .$category->image)}}" width="50">
                            @else
                                N/A
                            
                            @endif
                        </td>
                        <td>
                            @if($category->status==1)
                            <span class="badge bg-primary">Active </span>
                            @elseif($category->status==0)
                            <span class="badge bg-warning"> Inactive</span>
                            @endif
                            
                            
                        </td>
                        <td>
                            <div class="action-bar">
                                <ul>
                                    <li>
                                        <a href="{{route('category.edit' ,$category->id )}}">
                                            <i class="lni lni-pencil-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#deleteCategory{{$category->id}}">
                                            <i class="lni lni-trash"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteCategory{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure you want to delete this Category?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                            <div class="action-bar">
                                                <ul>
                                                    <li>
                                                        <form action="{{route('category.destroy', $category->id)}}" method="POST">
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