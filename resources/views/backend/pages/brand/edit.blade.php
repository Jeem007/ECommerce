@extends ('backend.layout.template')

@section('page-title')
<title>Update Brand Information || ECommerce Platform</title>
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
                    <h5 class="mb-0">Update Brand Information</h5>
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
            <form action="{{route('brand.update',$brand->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-4"> 
                        <div class="mb-3">
                            <label>Brand Name</label>
                            <input type="text" name="name" placeholder="Brand Name" value="{{$brand->name}}" class="form-control" required autocomplete="off" />
                        </div>

                        <div class="mb-3">
                            <label>Active Status</label>
                            <select class="form-select mb-3" aria-label="Default select example" name="status">
                                <option selected="" disabled>Brand Status</option>
                                <option value="1" @if ($brand->status==1) selected @endif>Active</option>
                                <option value="0" @if ($brand->status==0) selected @endif>Inactive</option>
                            </select>

                        </div>

                        <div class="mb-3">
									<label for="formFile" class="form-label">Brand Logo</label>
									<input class="form-control"  name="image" type="file" id="formFile">
                        </div>

                    </div>

                    <div class="col-lg-4">
                    <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="5" placeholder="Write Descrition....">{{$brand->description}}</textarea>
                    </div>
                    <div class="mb-3">
                    <button type="submit" class="btn btn-primary px-5">Save Changes</button>
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