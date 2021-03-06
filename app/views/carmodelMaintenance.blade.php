@extends('maintenance')

@section('contentMaintenance')

	<form id="Car_Model" >  			
  		<div class="panel" style="border:0px;">
  			<div class="panel-heading">
  				<button type="button" class="btn btn-danger btn-circle btn-lg" title="Add" data-toggle="modal" data-target="#modalAdd" style="position:absolute; left:1000px; top:30px"><i class="glyphicon glyphicon-plus"></i> </button> 
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
									        	<label>Car Type ID </label>
											    <input  id="car_type_id_del" name="car_type_id_del" class="form-control" type="text" readonly>
											    <label>Car Type Name </label>
											    <input  id="car_type_name_del" name="car_type_name_del" class="form-control" type="text" readonly>
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

				<!-- Modal Add -->
									<div id="modalAdd" class="modal fade" role="dialog">
									  <div class="modal-dialog">

									    <!-- Modal content-->
									    <div class="modal-content">
									      <div class="modal-header" style="background-color:black; color:white">
									        <button type="button" class="close" data-dismiss="modal">&times;</button>
									        <h4 class="modal-title" ><center>ADD CAR MODEL</center></h4>
									      </div>
									      <div class="modal-body">
									      	<form action="/carmodelAdd" method="post">
									        <div class="form-group" style="color:black">

									        	
											    <label>*Pick the car's type:</label>
											    <div class="input-field">
											      <select class="form-control" name="cartype_add" id="cartype_add" required >
											        <option selected disabled value="Pick a car type">Pick a type</option>
					                                @foreach($carTypes as $type)
					                                <option value="{{ $type->strCarTypeId }}">{{ $type->strCarTypeName }}</option>
					                                @endforeach
											      </select>

												<label>* Pick the car's brand:</label>
											    <div class="input-field">
											      <select class="form-control" name="carbrand_add" id="carbrand_add" required>
											        <option selected disabled value="Pick a car brand">Pick a brand</option>
					                                @foreach($carBrands as $brand)
					                                	@if($brand->status == '1')
					                                		<option value="{{ $brand->strCarBrandId }}">{{ $brand->strCarBrandDesc }}</option>
					                                	@endif
					                                @endforeach
											      </select>
											    </div>

											    <!--   <label>* Car Model ID </label> -->
											    <input value="{{$newID}}" id="car_model_id_add" name="car_model_id_add" type="text" hidden>
												
												<label>* Car Model Name </label>
											    <input id="car_model_name_add" name="car_model_name_add" class="form-control" type="text" required>
												

											    </div>

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

  			<h2 style="color:white">CAR MODELS</H2>
  			<div class="table-bordered table-responsive" style="border:0px;">

  			  	<table id="table" class="table" style="border:1px; color:white">

                        		<thead>
                        <tr>
                          
                          <th>Car Model Name</th>
                          <th>Car Brand</th>
                          <th>Car Type</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      	@foreach($carModels as $cmodel)
                      		@if($cmodel->status == 1)
                      	<tr>
                      		<td hidden>{{ $cmodel->strCarModelId }}</td>
                      		<td>{{ $cmodel->strCarModelDesc }}</td>
                      		<td>{{ $cmodel->strCarBrandDesc }}</td>
                      		<td>{{ $cmodel->strCarTypeName }}</td>
                      		<td>
								<button id="btn_edit" type="button" class="btn btn-danger" data-toggle="modal" href="#edit{{ $cmodel->strCarModelId }}"><i class="glyphicon glyphicon-pencil"></i></button>
								<button id="btn_delete" type="button" class="btn btn-danger" data-toggle="modal" href="#delete{{ $cmodel->strCarModelId }}"><i class="glyphicon glyphicon-remove	"></i></button>

                      			<!-- Modal Edit -->
									<div id="edit{{ $cmodel->strCarModelId }}" class="modal fade" role="dialog">
									  <div class="modal-dialog">

									    <!-- Modal content-->
									    <div class="modal-content" >
									      <div class="modal-header" style="background-color:black; color:white">
									        <button type="button" class="close" data-dismiss="modal">&times;</button>
									        <h4 class="modal-title"><center>EDIT CAR MODEL</center></h4>
									      </div>
									      <div class="modal-body">
									      	<p>
									      	<form action="/carmodelEdit" method="post">
									        <div class="form-group" style="color:black">

									        	
												

											    <label>Pick the car's type:</label>
											    <div class="input-field">
											      <select class="form-control" name="cartype_edit" id="cartype_edit" required>
											        <option selected value="{{ $cmodel->strCMType }}">{{ $cmodel->strCarTypeName }}</option>
					                                @foreach($carTypes as $type)
					                                	@if(($type->status == '1') && ($type->strCarTypeId != $cmodel->strCMType))
					                                		<option value="{{ $type->strCarTypeId }}">{{ $type->strCarTypeName }}</option>
					                                	@endif
					                                @endforeach
											      </select>
												
												<label>Pick the car's brand:</label>
											    <div class="input-field">
											      <select class="form-control" name="carbrand_edit" id="carbrand_edit" required>
											        <option selected value="{{ $cmodel->strCMBrand }}">{{ $cmodel->strCarBrandDesc }}</option>
					                                @foreach($carBrands as $brand)
					                                	@if(($brand->status == '1') && ($brand->strCarBrandId != $cmodel->strCMBrand))
					                                		<option value="{{ $brand->strCarBrandId }}">{{ $brand->strCarBrandDesc }}</option>
					                                	@endif
					                                @endforeach
											      </select>
											    </div>
											     
											   <!--   <label>Car Model ID </label> -->
											    <input value="{{ $cmodel->strCarModelId }}" id="car_model_id_edit" name="car_model_id_edit"  type="text" hidden>
												
												<label>Car Model Name </label>
											    <input value="{{ $cmodel->strCarModelDesc }}" id="car_model_name_edit" name="car_model_name_edit" class="form-control" type="text" required>
												
											    </div>
											</p>
											</div>
									      </div>
									      <div class="modal-footer">
									        <button type="submit" class="btn btn-info">Save</button>
									        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
									      </div>
									  	</form>
									    </div>
									  </div>
									</div><!-- Modal Edit -->

									<!-- Modal Delete -->
									<div id="delete{{ $cmodel->strCarModelId }}" class="modal fade" role="dialog">
									  <div class="modal-dialog">

									    <!-- Modal content-->
									    <div class="modal-content">
									     
									  
									        
									      <div class="modal-body" style="background-color:black; color:white">
									      	<form id="delete" action="/carmodelDel" method="post">
									        <div class="form-group" >
									        <!-- 	<label>Car Model ID </label> -->
									        <label>Are you sure you want to delete?</h4>
									     
											    <input value="{{ $cmodel->strCarModelId }}" id="car_model_id_del" name="car_model_id_del" type="text" hidden>
											    <br>
											    <label>{{ $cmodel->strCarModelDesc }} </label>
											    <input value="{{ $cmodel->strCarModelDesc }}" id="car_model_name_del" name="car_model_name_del" type="text" hidden>
										  	<div class="container" style="margin-left:430px">
									        <button type="submit" class="btn btn-danger">Yes</button>
									        <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
									      </div>
										  	</div>
									      </div>
									      
									  	</form>
									    </div>
									  </div>
									</div><!-- Modal Delete -->

							</td>
						</tr>
							@endif
                        @endforeach
                      </tbody>                   
  			  	</table>
  			</div>
  			<div class="panel-footer" style="border:0px;">
				<label style="color:black"> No. of records:  </label>
  			</div>
  		</div>
    </form>
@stop