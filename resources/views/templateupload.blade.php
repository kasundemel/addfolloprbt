@include('menubar')

<!DOCTYPE html>
<html>
<head>
	<title>template upload</title>
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/app.css')}}">
	<script type="text/javascript">
		function TemplateAdd(){
			swal("Here's a message!");
		} 
	</script>
</head>
<br><br>
<body>
	<div class="container">
		<div class="form-group">	

		{!! Form::open(['url'=>'templateshow','method'=>'post','file'=>'true','enctype'=>'multipart/form-data','name'=>'addtemplate']) !!}
			{!! Form::token() !!}

			<br>
			<div class="row">
					<div class="col-md-offset-3 col-md-6">
						<div class="col-md-4">
							{!! Form::label('tmp_name','Template Name') !!}
						</div>
						<div class="form-control col-md-8">
							<input type="text" name="tmp_name" class="text" required>
						</div>
					</div>
			</div>
			
			<br>

			<div class="row">
					<div class="col-md-offset-3 col-md-6">
						<div class="label">
							{!! Form::label('tmp_url','Add Template') !!}
						</div>
						<div class="form-control-file">
							<input type="file" name="tmp_url" class="file" required>
						</div>
					</div>
			</div>
			
			<br>
			<div class="row">
					<div class="col-md-offset-3 col-md-4">
						<input type="submit" name="submit" value="Add Template" class="submit" onclick="TemplateAdd()">
					</div>
			</div>
		{!! Form::close() !!}
			<br><br>
			<div class="row">
				<div class="">
					@if (session('success'))
					    <div class="flash-message">
					    <div class="alert alert-success">
					    		Template Added Success !!!!
					    </div>
					    </div>
					@endif
				</div>
			</div>

		</div>
	</div>
</body>
<body>
	
</body>
</html>