@extends ('backend.layout.template')

@section('page-title')
<title>Update Division Information || ECommerce Platform</title>
@endsection

@section('body-css')

@endsection

@section('body-content')
<div class="page-content">
<div class="page-content">
    <div class="card radius-10 w-100">
        <div class="card-header">
            <div class="d-flex align-items-center">
            <div>
                    <h5 class="mb-0">Update Division Information</h5>
                </div>
                <div class="dropdown options ms-auto">
                    <div class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bx bx-dots-horizontal-rounded"></i>
                    </div>
                    <ul class="dropdown-menu" style="">
                        <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                        <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                        <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('division.update',$division->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-4"> 
                        <div class="mb-3">
                            <label>Division Name</label>
                            <input type="text" name="name" placeholder="Division Name" value="{{$division->name}}" class="form-control" required autocomplete="off" />
                        </div>
                        <div class="mb-3">
                            <label>Division Priority Number</label>
                            <input type="number" name="priority_num" placeholder="Division Priority Number" value="{{$division->priority_num}}" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>Active Status</label>
                            <select class="form-select mb-3" aria-label="Default select example" name="status">
                                <option selected="" disabled>Division Status</option>
                                <option value="1" @if ($division->status==1) selected @endif>Active</option>
                                <option value="0" @if ($division->status==0) selected @endif>Inactive</option>
                            </select>

                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary px-5">Save Changes</button>
                            </div>

                    </div>

                    
                 


                </div>
            </form>

        </div>
    </div>
</div>
</div>
@endsection

@section('body-script')
    
@endsection