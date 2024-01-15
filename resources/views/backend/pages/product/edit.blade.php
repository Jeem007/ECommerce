@extends ('backend.layout.template')

@section('page-title')
<title>Update Product Information || ECommerce Platform</title>
@endsection

@section('body-css')

@endsection

@section('body-content')
<div class="page-content">
<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Update Product Information</h5>
					  <hr>

                    <form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                       <div class="form-body mt-4">
					    <div class="row">
					    <div class="col-lg-8">
                           <div class="border border-3 p-4 rounded">
                                
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Product Title</label>
                                        <input type="text" class="form-control" name="title" id="title" value="{{$product->title}}" placeholder="Enter product title" autocomplete="off" autofocus required="">
                                    </div>

                                    <div class="mb-3">
                                        <label for="short_desc" class="form-label">Short Description</label>
                                        <textarea class="form-control" id="short_desc" name="short_desc" rows="3">{{$product->short_desc}}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="long_desc" class="form-label">Description</label>
                                        <textarea class="form-control" id="long_desc" name="long_desc" rows="3">{{$product->long_desc}}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="inputProductDescription" class="form-label">Product Images</label>
                                        <input id="image-uploadify" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple="" style="display: none;"><div class="imageuploadify well"><div class="imageuploadify-overlay"><i class="fa fa-picture-o"></i></div><div class="imageuploadify-images-list text-center"><i class="bx bxs-cloud-upload"></i><span class="imageuploadify-message">Drag&amp;Drop Your File(s)Here To Upload</span><button type="button" class="btn btn-default">or select file to upload</button></div></div>
                                    </div>
                            </div>
						   
                        </div>



						   <div class="col-lg-4">
							<div class="border border-3 p-4 rounded">
                              <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="regular_price" class="form-label">Regular Price [ BDT ]</label>
                                            <input type="number" name= "regular_price"  value="{{ $product->regular_price }}"class="form-control" id="regular_price" placeholder="00.00"  min="0" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="offer_price" class="form-label">Offer Price [ BDT ]</label>
                                            <input type="number" name= "offer_price"  value="{{$product->offer_price}}"class="form-control" id="offer_price" placeholder="00.00"  min="0" >
                                        </div>

										
                                        <div class="col-md-6">
                                            <label for="quantity" class="form-label">Stock Quantity</label>
                                            <input type="number" min="0" name= "quantity"  value="{{$product->quantity}}"class="form-control" id="quantity" placeholder="00.00" required>
                                        </div>

										<div class="col-md-6">
											<label for="featured" class="form-label">Feature Status</label>
											<select class="form-select" name="is_featured" id="featured">
												<option selected="" disabled>Please Select the Featured Status</option>
												<option value="1" @if( $product->is_featured == 1) selected @endif >On Sell</option>
												<option value="0" @if( $product->is_featured == 0) selected @endif >Regular Price</option>
											</select>
										</div>



										<div class="col-12">
											<label for="inputProductType" class="form-label">Select the Brand</label>
											<select class="form-select" name="brand_id" id="brand_id">
												<option selected="" disabled>Please Select the Brand</option>
												@foreach ($brands as $brand)
												<option value="{{$brand->id}}" 
                                                
                                                @if($brand->id == $product->brand_id) selected @endif
                                                >{{$brand->name}}</option>
												@endforeach
											</select>
										</div>

										<div class="col-12">
											<label for="inputProductType" class="form-label">Select the Category</label>
											<select class="form-select" name="category_id" id="category_id">
												<option selected="" disabled>Please Select the Category</option>
												@foreach ($pcategories as $pcat)
												<option value="{{$pcat->id}}">{{$pcat->name}}</option>
														@foreach(App\Models\Category::orderBy('name','asc')->where('is_parent',$pcat->id)->get() as $cCat)
														<option value="{{$cCat->id}}"
                                                        @if($cCat->id == $product->category_id) selected @endif
                                                        >-- {{$cCat->name}}</option>
														@endforeach
												@endforeach
											</select>
										</div>

										
									

										
										<div class="col-12">
											<label for="status" class="form-label">Product Status</label>
											<select class="form-select" name="status" id="status">
												<option selected="" disabled>Please Select the Product Status</option>
												<option value="1" @if( $product->status == 1) selected @endif>Active</option>
												<option value="0" @if( $product->status == 0) selected @endif>Inactive</option>
											</select>
										</div>

                                        
										<div class="col-12">
											<div class="d-grid">
												<button type="submit" class="btn btn-primary">Update Product Information</button>
											</div>
										</div>



							  </div> 
						  </div>
						  </div>
					   </div><!--end row-->
					</div>
                    </form>

				  </div>
			  </div>
</div>
</div>
@endsection

@section('body-script')
    
@endsection