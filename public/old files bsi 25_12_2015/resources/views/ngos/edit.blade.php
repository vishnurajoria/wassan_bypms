@extends('app')

@section('head')

{!! 	Html::style('plugins/jquery-wizard/jquery-wizard.css')	!!}
{!! 	Html::style('plugins/formvalidation/formValidation.css')	!!}

<style>
	

select{
  width: 150px;
  height: 30px;
  padding: 5px;
  color:#000;
}
select option { color: #222; }

</style>

@endsection

@section('content')

	        <div class="col-md-12" style="height:auto;">
	          <!-- Panel Wizard Form -->
	          <div class="panel" id="wizard-form">
	            <div class="panel-heading">
	              <h3 class="panel-title">Ngo Details</h3>
	            </div>
	            <div class="panel-body">
	              <!-- Steps -->
	              <div class="steps steps-sm row" data-plugin="matchHeight" data-by-row="true" role="tablist">
	                <div class="step col-md-4 current" data-target="#location-details" role="tab">
	                  <span class="step-number">1</span>
	                  <div class="step-desc">
	                    <span class="step-title">Location Details</span>
	                    <!-- <p>ngo's location</p> -->
	                  </div>
	                </div>

	                <div class="step col-md-4" data-target="#basic-details" role="tab">
	                  <span class="step-number">2</span>
	                  <div class="step-desc">
	                    <span class="step-title">Basic Details</span>
	                    <!-- <p>ngo's basic details</p> -->
	                  </div>
	                </div>

	                <div class="step col-md-4" data-target="#advance-details" role="tab">
	                  <span class="step-number">3</span>
	                  <div class="step-desc">
	                    <span class="step-title">Advance Details</span>
	                    <!-- <p>ngo's advance details</p> -->
	                  </div>
	                </div>
	              </div>
	              <!-- End Steps -->

	              <!-- Wizard Content -->
	              <div class="wizard-content">
	                <div class="wizard-pane active" id="location-details" role="tabpanel">
	                  <form 	 id="location-form">

	   				@include('code_snip.location_dropdown')
	                 
	                  </form>
	                </div>



	                <div class="wizard-pane" id="basic-details" role="tabpanel">
	                  <form id="basic-details-form"  action="">

	                  
	                    <div class="form-group ">
	                      <label class="control-label" for="name">Name</label>
	                      <input type="text" class="form-control " value="{{$user->name}}" id="name" name="name" placeholder="name">
	                    </div>
	                   
	                    <div class="form-group">
	                      <label class="control-label" for="HON">Head of the Ngo</label>
	                      <input type="text" class="form-control" id="HON" value="{{$user->HON}}" name="HON" placeholder="Name of the Head of the ngo">
	                    </div>
					


	               		<div class="gender_area_HON">
	              
		                <div class="radio-custom radio-primary" style="display:inline-block;">
		                  <input type="radio" id="inputRadiosChecked" name="gender_HON" value="male" @if($user->gender_HON=='male') checked="checked" @endif>
		                  <label for="inputRadiosChecked">Male</label>
		                </div>

		                <div class="radio-custom radio-primary" style="display:inline-block;">
		                  <input type="radio" id="inputRadiosUnchecked" name="gender_HON" value="female" @if($user->gender_HON=='female') checked="checked" @endif>
		                  <label for="inputRadiosUnchecked">Female</label>
		                </div>
	               
	              		</div>


                      	<div class="form-group">
	                      <label class="control-label" for="contact_number">Contact Number</label>
	                      <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{$user->contact_number}}" placeholder="contact number for Head of the Ngo">
	                    </div>
	                     
	                     <div class="form-group">
	                      <label class="control-label" for="email">email</label>
	                      <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}" placeholder="Email address for Head of the Ngo">
	                    </div>
      					      					
	                   
	                    <div class="form-group">
	                      <label class="control-label" for="field_incharge">Field Incharge</label>
	                      <input type="text" class="form-control" id="field_incharge" value="{{$user->field_incharge}}" name="field_incharge" placeholder="Name of the field incharge">
	                    </div>
					
                      <div class="form-group">
	                      <label class="control-label" for="contact_number_incharge">Incharge Contact Number</label>
	                      <input type="text" class="form-control" id="contact_number_incharge" name="contact_number_incharge" value="{{$user->contact_number_incharge}}" placeholder="contact number for incharge person">
	                    </div>
	                     
	                     <div class="form-group">
	                      <label class="control-label" for="email_inchrage">Incharge email</label>
	                      <input type="text" class="form-control" id="email_incharge" name="email_incharge" value="{{$user->email_incharge}}" placeholder="Email address for Incharge">
	                    </div>
      				

	               		<div class="gender_area_field_incharge">
	              
		                <div class="radio-custom radio-primary" style="display:inline-block;">
		                  <input type="radio" id="inputRadiosChecked" name="gender_field_incharge" value="male" @if($user->gender_field_incharge=='male') checked="checked" @endif>
		                  <label for="inputRadiosChecked">Male</label>
		                </div>

		                <div class="radio-custom radio-primary" style="display:inline-block;">
		                  <input type="radio" id="inputRadiosUnchecked" name="gender_field_incharge" value="female" @if($user->gender_field_incharge=='female') checked="checked" @endif>
		                  <label for="inputRadiosUnchecked">Female</label>
		                </div>
	               
	              		</div>

	      					

			</form>
	        </div>
	                
	         <div class="wizard-pane" id="advance-details" role="tabpanel">
				<form id="advance-details-form"  action="">
	              
	                  <div class="text-center margin-vertical-20 message" style="display:none;">
	                    <i class="icon wb-check font-size-40" aria-hidden="true"></i>
	                    <h4 style="color:green;">Updated Successfully!<br>
	                  
	                    </h4>
	                  </div>


	                 </form>
	                </div>
	              </div>
	              <!-- End Wizard Content -->

	            </div>
	          </div>
	          <!-- End Panel Wizard One Form -->
	        </div>





@endsection

@section('body_bottom')
<!-- Core  -->




  {!! Html::script('plugins/formvalidation/formValidation.js') !!}
  {!! Html::script('plugins/formvalidation/framework/bootstrap.js') !!}

  {!! Html::script('js/components/jquery-wizard.js') !!}
  {!! Html::script('plugins/jquery-wizard/jquery-wizard.js') !!}
  {{-- Html::script('plugins/combobox/jquery.eComboBox.js') --}}

 
  {!! Html::script("js/location_dropdown.js") !!}


<script>
    (function(document, window, $) {





    var base_url = window.location.origin;

    var sub_domain='/bsi';

    var route_address=base_url+sub_domain+'/';


      'use strict';

      var Site = window.Site;

      $(document).ready(function($) {
        Site.run();
      });

      // Example Wizard Form
      // -------------------
      (function() {

         $("#basic-details-form").formValidation({
          framework: 'bootstrap',
          fields: {
            name: {
              validators: {
                notEmpty: {
                  message: "Ngo's Name is reqired"
                }
                // creditCard: {
                //   message: 'The credit card number is not valid'
                // }
              }
            },
            HON: {
              validators: {
                notEmpty: {
                  message: "Head of the Ngo's name is required"
                }
            
            }
           
            },
           contact_number: {
            	validators: {
            	
            	stringLength: {
                  min:10,
                  max:10,
                  message:'Contact Number should be at least 10 character long'
                	},
            	
            		regexp: {
            			regexp: /^[0-9]+$/,
            			message: 'Contact Number can only contains numerice digit [0-9] only'
            		}
            	}
             },
             email: {
              validators: {
                emailAddress: {
                  message: "email is not valid"
                }
            
            }
           
            },
             field_incharge: {
              validators: {
                notEmpty: {
                  message: "Field Incharge's name is required"
                }
            
            }
           
            },
              contact_number_incharge: {
            	validators: {
            	
            	stringLength: {
                  min:10,
                  max:10,
                  message:'Contact Number should be at least 10 character long'
                	},
            	
            		regexp: {
            			regexp: /^[0-9]+$/,
            			message: 'Contact Number can only contains numerice digit [0-9] only'
            		}
            	}
             },
             email_incharge: {
              validators: {
                emailAddress: {
                  message: "email is not valid"
                }
            
            }
           
            }
          }
        });

        // init the wizard
        var defaults = $.components.getDefaults("wizard");
        var options = $.extend(true, {}, defaults, {
          buttonsAppendTo: '.panel-body',
          onFinish: function(){
          
          	$('a.reload_form').hide();
          	$('.wizard-buttons').html('')
          	$('a[data-wizard=finish]').hide();
          	$('a.reload_form').on('click',function(){
          		$(this).hide();
          		  location.reload();
          		// $('a[data-wizard=finish]').show();
          	})

          	// ajax code starts here
		 
		var url=route_address+"ngo/update";
	
		$.ajax({
	        type: "POST",
	        url: url,
	        data: {
	        '_method':'PUT',
	        'id':'{{$user->id}}',
	        'state':$( "#state option:selected" ).val(),
	        'district':$("#district option:selected").val(),
	        'mandal':$("#mandal option:selected").val(),
	        'village':$("#village option:selected").val(),
	        'name':$("#name").val(),
	        
	        'HON':$("#HON").val(),
	        'gender_HON':$('input[name=gender_HON]:checked', '#basic-details-form').val(),
	        'contact_number':$("#contact_number").val(),
	        'email':$("#email").val(),
	        
	        'field_incharge':$("#field_incharge").val(),
	        'gender_field_incharge':$('input[name=gender_field_incharge]:checked', '#basic-details-form').val(),
	        'contact_number_incharge':$("#contact_number_incharge").val(),
	        'email_incharge':$("#email_incharge").val(),

	    	},
	        cache: false,
	        success: function(data){
	           console.log(data);
	           $('.message').fadeIn();
	        }
	    });

		     //  ajax code ends here

        }
        });

        var wizard = $("#wizard-form").wizard(options).data(
          'wizard');
	;

        wizard.get("#basic-details").setValidator(function() {
          var fv = $("#basic-details-form").data('formValidation');
          fv.validate();

          if (!fv.isValid()) {
            return false;
          }

          return true;
        });
      })();


    })(document, window, jQuery);
  </script>

@endsection