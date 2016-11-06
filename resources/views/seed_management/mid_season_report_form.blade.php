<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Seed Purchase</title>
 {!! Html::script('plugins/jquery/jquery.js') !!}
  	
{!! Html::style('css/bootstrap.min.css') !!}
{!! Html::style('css/bootstrap-extend.min.css') !!}

{!! 	Html::style('plugins/formvalidation/formValidation.css')	!!}
{!! 	Html::style('plugins/bootstrap-select/bootstrap-select.css') !!}
{!! 	Html::style('plugins/bootstrap-dateranger-picker/daterangepicker.css') !!}

    {!! Html::style('css/site.min.css') !!}
 
<style>
	
table.past_transaction_details
{
  width:47%;
  display: inline-block;
 
}
table.past_transaction_details td
{
  padding:5px;
  vertical-align: top;
  font-size: 14px;
}


table.past_transaction_details td:first-child
{
  color:#369;
  font-weight: bold;
}

</style>
</head>
<body>
<div class="page-content">

 
         @if(Entrust::hasRole('admin'))

           <?php
                 $user_details=session('user_details');
                     
 				 // print_r($user_details);

                 $ngo_details=array();
 				 $ngo_details['id']="";
 				  $ngo_details['ngo_name']="";
 				 $ngo_details['data_entered_by']='admin';
 				
 				 
 				
 				 // print_r($ngo_details);


            ?>
         

         @elseif(Session::has('user_details'))
 
          

           <?php
                 $user_details=session('user_details');
                     
 				 // print_r($user_details);

                 $ngo_details=array();
 				 $ngo_details['id']=$user_details->id;
 				  $ngo_details['ngo_name']=$user_details->name;
 				 $ngo_details['data_entered_by']='';
 				 if(Entrust::hasRole('ngo_head'))
 				 {
 				 	 $ngo_details['data_entered_by']=$user_details->email_HON;
 				 }
 				 else
 				 {
 				 	 $ngo_details['data_entered_by']=$user_details->email_incharge;
 				 }

 				 // print_r($ngo_details);


            ?>
			@endif



@if($selected_farmer_id!='')




    <div class="col-sm-12" style="height:auto;">
	          <!-- Panel Wizard Form -->
	          <div class="panel" id="wizard-form">
	            <div class="panel-heading">
	              <h3 class="panel-title">Mid Season Report</h3>
	    </div>

           


<div class="panel-group" id="exampleAccordionDefault" aria-multiselectable="true" role="tablist">
                  <div class="panel">
                    <div class="panel-heading" id="exampleHeadingDefaultOne" role="tab">
                      <a class="panel-title" data-toggle="collapse" href="#exampleCollapseDefaultOne" data-parent="#exampleAccordionDefault" aria-expanded="true" aria-controls="exampleCollapseDefaultOne">
                      Farmer Details 
                    </a>
                    </div>
                    <div class="panel-collapse collapse in" id="exampleCollapseDefaultOne" aria-labelledby="exampleHeadingDefaultOne" role="tabpanel">
                      <div class="panel-body">
                  <div class="panel-body">
         	
         	<div class="row">
         		<div class="col-sm-2">
         		@if($farmer->farmer_image!='')
         		<img src="{{$farmer->farmer_image}}" alt="">
         		@else
         		<img src="{{asset('images/farmer.jpg')}}" alt="">
         		@endif
         		</div>
				<div class="col-sm-4">
				<table>
					<tr>
						<td>Father's Name</td>
						<td>{{$farmer->fname}}</td>
					</tr>
					<tr>
						<td>Gender</td>
						<td>{{$farmer->gender}}</td>
					</tr>
					<tr>
						<td>Caste</td>
						<td>{{$farmer->caste}}</td>
					</tr>
				</table>

				</div>
				<div class="col-sm-5">
					
				<table>
					<tr>
						<td>Contact Number</td>
						<td>{{$farmer->contact_number}}</td>
					</tr>
					<tr>
						<td>Adress</td>
						<td>{{$farmer->full_address}}</td>
					</tr>
					<tr>
						<td>Adhar Card Number</td>
						<td>{{$farmer->adhar_card_number}}</td>
					</tr>
				</table>



				</div>

         	</div>
                      </div>
                    </div>
                  </div>
	  
	<div class="panel">

@if(!empty($seed_purchase_details))

<!-- previous transaction details -->
                  <div class="panel">
                    <div class="panel-heading" id="exampleHeadingDefaultTwo" role="tab">
                      <a class="panel-title collapsed" data-toggle="collapse" href="#exampleCollapseDefaultTwo" data-parent="#exampleAccordionDefault" aria-expanded="false" aria-controls="exampleCollapseDefaultTwo">
                      Past seed purchase details
                    </a>
                    </div>
                    <div class="panel-collapse collapse" id="exampleCollapseDefaultTwo" aria-labelledby="exampleHeadingDefaultTwo" role="tabpanel">
                      <div class="panel-body">

<table class="past_transaction_details">
	<tr>

		<td>Past seed purchase data collected on </td>
		<td> {{DateTime::createFromFormat('Y-m-d', $seed_purchase_details->data_collection_date)->format('M d, Y')}}</td>
	</tr>
	<tr>
		<td>Date Collected by NGO</td>
		<td>{{$seed_purchase_details->ngo_name}}</td>
	</tr>
	<tr>
		<td>Date Entered by</td>
		<td>{{$seed_purchase_details->data_entered_by}}</td>
	</tr>
	<tr>
		<td>Data entered on </td>
		<td>{{$seed_purchase_details->created_at}}</td>
	</tr>
	<tr>
		<td>For year/season </td>
		<td>{{$seed_purchase_details->year}}/{{$seed_purchase_details->season}}</td>
	</tr>
	<tr>
		<td>Crop</td>
		<td>@if($seed_purchase_details->crop=='1') Groundnut @endif</td>
	</tr>
	<tr>
		<td>Area to be sown(Acre)</td>
		<td>{{$seed_purchase_details->area_to_be_sown}}</td>
	</tr>
</table>
<table class="past_transaction_details">
	<tr>
		<td>Seed variety</td>
		<td> {{$seed_purchase_details->seed_variety}}</td>
	</tr>
	<tr>
		<td>Seed Class</td>
		<td>{{$seed_purchase_details->seed_class}}</td>
	</tr>
	
	<tr>
		<td>No. of Bag purchased</td>
		<td>{{$seed_purchase_details->bag}}</td>
	</tr>
	<tr>
		<td>Per Bag price</td>
		<td>{{$seed_purchase_details->bag_price}}</td>
	<tr>
		<td>Total (Rs.)</td>
		<td>{{$seed_purchase_details->total}}</td>
	</tr>
	<tr>
		<td>Farmer Contribution (Rs.)</td>
		<td>{{$seed_purchase_details->farmer_contribution}}</td>
	</tr>
	<tr>
		<td>Govt. Subsidy (Rs.)</td>
		<td>{{$seed_purchase_details->govt_subsidy}}</td>
	</tr>
</table>


     
                      </div>
                    </div>
                  </div>

<!-- previous transaction detauls ends here -->




<!-- previous rouging detauls -->
                  <div class="panel">
                    <div class="panel-heading" id="exampleHeadingDefaultThree" role="tab">
                      <a class="panel-title collapsed" data-toggle="collapse" href="#exampleCollapseDefaultThree" data-parent="#exampleAccordionDefault" aria-expanded="false" aria-controls="exampleCollapseDefaultThree">
                      Rouging Details  <span class="badge badge-radius badge-info">{{count($previous_rouging_details)}}</span>
                    </a>
                    </div>
                    <div class="panel-collapse collapse" id="exampleCollapseDefaultThree" aria-labelledby="exampleHeadingDefaultThree" role="tabpanel">
                      <div class="panel-body">
                      <table  style=" width:100%;">
				<tbody>
				<tr style="font-weight:bold;">
				<td>Vittna Mitra</td>
				<td>Rouging Date</td>
				<td>Percentage Rouged Out Plant</td>
				<td>remark</td>
				</tr>
				</tbody>
                @foreach($previous_rouging_details as $rouging_detail)


				<tr>
					<td>{{$rouging_detail->vittna_mitra}}</td>
					<td>{{date('d/m/Y',strtotime($rouging_detail->rouging_date))}}</td>
					<td>{{$rouging_detail->percentage_rouged_out_plant}}</td>
					<td>{!!$rouging_detail->remark!!}</td>
				</tr>
	


                 @endforeach
                    </table>

                      </div>
                    </div>
                  </div>
               

<!--  Rouging details ends here  -->
    </div>



	<form method="POST" action="{{URL::to('seed_management/store_rouging')}}">
        <div class="col-sm-3">
		
		{!! Form::token() !!}

		<input type="hidden" name="farmer_id" value="{{$farmer->id}}">
		<input type="hidden" name="entered_by" value="{{serialize($ngo_details)}}">



		<div>
	
		<?php

				 $date=DateTime::createFromFormat('Y-m-d', $seed_purchase_details->data_collection_date);
				$data_collection_date=$date->format('d/m/Y');

				 ?>
		
				 <label class="control-label" for="expected_harvesting_time">Expected Harvesting Time</label>

				 <input class="form-control form-group" required name="expected_harvesting_time" value="" id="expected_harvesting_time" />


		</div>
	
		

		 <input type="hidden" class="form-control form-group" name="seed_purchase_id"  value="{{$seed_purchase_details->id}}" id="seed_purchase_id">
		 <input type="hidden" class="form-control form-group" name="season"  value="{{$seed_purchase_details->season}}" id="season">
		 <input type="hidden" class="form-control form-group" name="year"  value="{{$seed_purchase_details->year}}" id="year">
		 <input type="hidden" class="form-control form-group" name="crop"  value="{{$seed_purchase_details->crop}}" id="crop">
		 <input type="hidden" class="form-control form-group" name="seed_variety"  value="{{$seed_purchase_details->seed_variety}}" id="seed_variety">
		 <input type="hidden" class="form-control form-group" name="seed_class"  value="{{$seed_purchase_details->seed_class}}" id="seed_class">
		 <input type="hidden" class="form-control form-group" name="seed_variety"  value="{{$seed_purchase_details->seed_variety}}" id="seed_variety">
		 <input type="hidden" class="form-control form-group" name="state"  value="{{$seed_purchase_details->state}}" id="state">
		 <input type="hidden" class="form-control form-group" name="district"  value="{{$seed_purchase_details->district}}" id="district">
		 <input type="hidden" class="form-control form-group" name="mandal"  value="{{$seed_purchase_details->mandal}}" id="mandal">
		 <input type="hidden" class="form-control form-group" name="mvk"  value="{{$seed_purchase_details->mvk}}" id="mvk">
		 <input type="hidden" class="form-control form-group" name="panchayat"  value="{{$seed_purchase_details->panchayat}}" id="panchayat">
		 <input type="hidden" class="form-control form-group" name="village"  value="{{$seed_purchase_details->village}}" id="village">
		 <input type="hidden" class="form-control form-group" name="habitation"  value="{{$seed_purchase_details->habitation}}" id="habitation">







	</div>
		
		<div class="col-sm-3">
		
		
				 <label class="control-label" for="estimated_yield">Estimated Yield</label>

				 <input class="form-control form-group" required name="estimated_yield" type="number" required  id="estimated_yield" />


		</div>


		<div class="col-sm-3">
		
		
				 <label class="control-label" for="quantity_retained">Quantity Retained for own purpose</label>

				 <input class="form-control form-group" required name="quantity_retained" type="number" required  id="quantity_retained" />


		</div>



		<div class="col-sm-3">
		
		
				 <label class="control-label" for="quantity_to_be_sold">Quantity to be sold</label>

				 <input class="form-control form-group" required name="quantity_to_be_sold" type="number" required  id="quantity_to_be_sold" />


		</div>


		<input type="submit" style="float:right;" class="btn btn-primary" id="save_form" value="save" />


		</form>
    </div>
      </div>
           <!-- End Wizard Content -->

	            </div>
	                </div>
	          <!-- End Panel Wizard One Form -->

	        </div>

@else
		
<div class="btn-danger" >
<img src="{{asset('images/no_seed_purchase.png')}}" alt="">		Farmer didn't take seed previously from CMSS center.
</div>

	@endif

    


		       
	               
	          
	         
	





	

@else

Coudn't found The Farmer in Database.

@endif
</div>	
<!-- Scripts -->

  {!! Html::script('plugins/formvalidation/formValidation.js') !!}
  {!! Html::script('plugins/formvalidation/framework/bootstrap.js') !!}

  {!! Html::script('plugins/bootstrap-select/bootstrap-select.js') !!}
  {!! Html::script('plugins/bootstrap-dateranger-picker/moment.min.js') !!}
  {!! Html::script('plugins/bootstrap-dateranger-picker/daterangepicker.js') !!}


  {!! Html::script('plugins/bootstrap/bootstrap.js') !!}


<script>
    (function(document, window, $) {





      'use strict';

      // Example Wizard Form
      // -------------------
      (function() {

		$('input[name="expected_harvesting_time"]').daterangepicker({
			 singleDatePicker: true,
        showDropdowns: true,
        locale: {
      		format: 'DD/MM/YYYY'
    	},
		});



		$("#save_form").click(function(e){
				var selected_data_collection_date=$('#data_collection_date').val();
				var selected_season=$('#season option:selected').val();
				var selected_year=$('#year option:selected').val();
				var selected_crop=$('#crop option:selected').val();
				var selected_seed_variety=$('#seed_variety option:selected').val();
				var selected_seed_class=$('#seed_class option:selected').val();
				var area_to_be_sown=$('#area_to_be_sown').val();
				var bags=$('#bag').val();
				var farmer_contribution=$('#farmer_contribution').val();
				var govt_subsidy=$('#govt_subsidy').val();

			var url=route_address+"seed_management/store_seed_purchaser";
			
			
			
		});
       


      })();




    })(document, window, jQuery);
  </script>

 <script>

var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;	
}
</script>


</body>
</html>