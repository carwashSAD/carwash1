@extends('layouts.master')

@section('content')

	<form id="Car_Brand" >  			
  		<div class="panel panel-primary">
  			<div class="panel-heading">
  				Car Brands 
  				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalAdd">Add</button>
  			</div>
  			<div class="panel-body">

  			  	<table id="table" class="table table-bordered table-responsive">

  			  		<thead>
                        <tr>
                          <th>Car Brand Id</th>
                          <th>Car Brand Name</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      	@foreach($carbrands as $cbrands)
                      		@if($cbrands->status == 1)
                      	<tr>
                      		<td>{{ $cbrands->strCarBrandId }}</td>
                      		<td>{{ $cbrands->strCarBrandDesc }}</td>
                      		<td>
								<button id="btn_edit" type="button" class="btn btn-info" data-toggle="modal" href="#edit{{ $cbrands->strCarBrandId }}">Edit</button>
                      			<button id="btn_delete" type="button" class="btn btn-info" data-toggle="modal" href="#delete{{ $cbrands->strCarBrandId }}">Delete</button>
                      		
									<!-- Modal dummy -->
									<div id="delete" class="modal fade" role="dialog">
									  <div class="modal-dialog">

									    <!-- Modal content-->
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal">&times;</button>
									        <h4 class="modal-title" style="color:black">DELETE</h4>
									      </div>
									      <div class="modal-body">
									      	<p>
									      	<form id="delete" action="/cartypeabc" method="post">
									        <div class="form-group" style="color:black">
									        	<label>Car Type Id </label>
											    <input id="car_type_id_del" name="car_type_id_del" class="form-control" type="text" readonly>
											    <label>Car Type Name </label>
											    <input id="car_type_name_del" name="car_type_name_del" class="form-control" type="text" readonly>
										  	</div>
									      </div>
									      <div class="modal-footer">
									        <button type="submit" class="btn btn-danger">Confirm</button>
									        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
									      </div>
									  	</form>
									    </div>
									  </div>
									</div><!-- Modal dummy -->	

                      				<!-- Modal Delete -->
									<div id="delete{{ $cbrands->strCarBrandId }}" class="modal fade" role="dialog">
									  <div class="modal-dialog">

									    <!-- Modal content-->
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal">&times;</button>
									        <h4 class="modal-title" style="color:black">DELETE</h4>
									      </div>
									      <div class="modal-body">
									      	<form id="delete" action="/carbrandDel" method="post">
									        <div class="form-group"style="color:black">
									        	<label>Car Brand Id </label>
											    <input value="{{$cbrands->strCarBrandId}}" id="car_brand_id_del" name="car_brand_id_del" class="form-control" type="text" readonly>
												<label>Car Brand Name </label>
											    <input value="{{ $cbrands->strCarBrandDesc }}" id="car_brand_name_del" name="car_brand_name_del" class="form-control" type="text" readonly>
											</div>
									      </div>
									      <div class="modal-footer">
									        <button type="submit" class="btn btn-danger">Confirm</button>
									        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
									      </div>
									  	</form>
									    </div>
									  </div>
									</div><!-- Modal Delete -->

									<!-- Modal Edit -->
									<div id="edit{{ $cbrands->strCarBrandId }}" class="modal fade" role="dialog">
									  <div class="modal-dialog">
									  	
									    <!-- Modal content-->
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal">&times;</button>
									        <h4 class="modal-title" style="color:black">EDIT</h4>
									      </div>
									      <div class="modal-body">
									      	<form id="update" action="/carbrandUp" method="post">
										        <div class="form-group" style="color:black">
										        	<label>Car Brand Id </label>
												    <input value="{{$cbrands->strCarBrandId}}" name="car_brand_id_edit" id="car_brand_id_edit" class="form-control" type="text" readonly>
												    
													<label>Car Brand Name </label>
												    <input value="{{ $cbrands->strCarBrandDesc }}" name="car_brand_name_edit" id="car_brand_name_edit" class="form-control" type="text" required>
												</div>
									      </div>
									      <div class="modal-footer">
									        <button type="submit" class="btn btn-primary">Save</button>
									        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
									      </div>
									      </form>
									    </div>
									    
									  </div>
									</div><!-- Modal Edit -->

									
                      		</td>
                      	</tr>
                      		@endif
                        @endforeach
                      </tbody>
  			  	</table>

  			  	<!-- Modal Add -->
										<div id="modalAdd" class="modal fade" role="dialog">
										  <div class="modal-dialog">

										    <!-- Modal content-->
										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal">&times;</button>
										        <h4 class="modal-title" style="color:black">ADD</h4>
										      </div>
										      <div class="modal-body">
										      	<form action="/carbrandAdd" method="post">
										        <div class="form-group" style="color:black">										        	 	
										        	<label>Car Brand Id </label>
												    <input value="{{$newID}}" id="car_brand_id_add" name="car_brand_id_add" class="form-control" type="text" required>
													<label>Car Brand Name </label>
												    <input id="car_brand_name_add" name="car_brand_name_add" class="form-control" type="text" required>
												</div>
										      </div>
										      <div class="modal-footer">
										        <button type="submit" class="btn btn-info">Add</button>
										        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
										      </div>
										  	</form>
										    </div>
										  </div>
										</div><!-- Modal Add -->

			</div>
  			<div class="panel-footer">

  			</div>
  		</div>
    </form>

@stop