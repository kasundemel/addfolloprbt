@include('menubar')	
	
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

	<script type="text/javascript">
    	$(function () {
	        $("input[name='group1']").click(function () {
	            if ($("#url").is(":checked")) {
	                $("#textboxDiv").show();
	            } else {
	                $("#textboxDiv").hide();
	            }
	        });
	    });
	</script>
</head>
<body>
	<br><br><br>
	<div class="container">
		<div class="form-group">
			
			{!! Form::open(['url'=>'campaign']) !!}
			<div class="row">
					<div class="col-md-offset-3 col-md-6">
						<div class="col-md-4">
							{!! Form::label('camp_name','Campain Name') !!}
						</div>
						<div class="form-control">
							<input type="text" name="campaign_name" class="text" required>
						</div>
					</div>
			</div>
			<br>
			<div class="row">
					<div class="col-md-offset-3 col-md-6">
						<div class="col-md-4">
							{!! Form::label('camp_category','Campaign Category') !!}
						</div>
						<div class="form-control">
							<select  name="camp_category" class="text" data-parsley-required="true">
									<option>AddPlatForm</option>
									<option>Follo</option>
									<option>Prbt</option>
							</select>
						</div>
					</div>
			</div>
			<br>
			<div class="row">
					<div class="col-md-offset-3 col-md-6">
						<div class="col-md-4">
							{!! Form::label('campaign_template','Select Template') !!}
						</div>
						<div class="form-control">
							<select class="text" name="campaign_template" data-parsley-required="true">
          					@foreach ($temp as $drpdwn) 
         					 {
           						 <option value="{{ $drpdwn->tmp_name }}">{{ $drpdwn->tmp_name }}</option>
         			 		}
         					@endforeach
       		 				</select>
						</div> 
					</div>
			</div>      		 					
			<br>
			<div class="row">
					<div class="col-md-offset-3 col-md-6">
						<div class="col-md-4">
							{!! Form::label('success_url','Success URL') !!}
						</div>
						<div class="form-control">
							<input type="text" name="success_url" class="text">
						</div>
					</div>
			</div>
			<br>
			<div class="row">
					<div class="col-md-offset-3 col-md-6">
						<div class="col-md-4">
							{!! Form::label('fail_url','Fail URL') !!}
						</div>
						<div class="form-control">
							<input type="text" name="fail_url" class="text">
						</div>
					</div>
			</div>
			<br>
			<div class="row">
					<div class="col-md-offset-3 col-md-6">
						<div class="col-md-4">
							{!! Form::label('parameter','Add Parameter') !!}
						</div>
						<div class="form-control">
							<input type="text" name="parameter" class="text">
						</div>
					</div>
			</div>
			<br>
			
			<div class="row">
					<div class="col-md-offset-5 col-md-4">




							<!--start the fieldset-->
							<fieldset id="group1">
									<label class="mobileurllbl">
										<input type="radio"  id="mobile" name="group1" value="mobile" class="mobileurllbl" required>Redirected to the mobile number selection page 
									</label>
									<br>
									<label class="otherurllbl" >
										<input type="radio" id="url" name="group1" class="otherurllbl" value="url" required>Any Other URL
									</label>
					</div>
			</div>

			<div class="row">
					<div class="col-md-offset-5 col-md-6">
						<div class="form-control">						<!--hide textbox-->
							<div hidden="true" id="textboxDiv">
								<input type="text" name="urls" id="otherurl" class="text" novalidate>
							</div>
						</div>
					</div>
			</div>
							</fieldset>
							<!--close the fieldset-->



			<br>
			<div class="row">
				<div class="col-md-offset-5 col-md-4">
					<input type="submit" name="submit" value="Add Campaign" class="submit">
				</div>
			</div>
		{!! Form::close() !!}
		</div>
	</div>
	<br><br>
	<div class="row">
		@if (session('success'))
			<div class="flash-message">
			    <div class="alert alert-success">
					Campaign Added Success !!!!
				</div>
			</div>
		@endif
	</div>
</body>

</html>