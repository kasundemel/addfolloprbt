@include('layouts.app')

<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="{{URL::asset('js/all.js')}}" ></script>
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/app.css')}}">
	<title></title>
	<script type="text/javascript">
		function AddTemplate(){
			window.location.href = "http://addfolloprbt/template";
		}
		function ViewCampaign(){
			window.location.href = "http://addfolloprbt/viewcamp";
		}
		function ViewTemplate(){
			window.location.href = "http://addfolloprbt/templates";
		}
		function AddCampaign(){
			window.location.href = "http://addfolloprbt/addcampaign";
		}
	</script>
</head>

<body>
		<div class="container menu">
			<div class="row col-md-12">
				<div class="col-md-offset-2 col-md-2 menubtn">
					<button class="button" onclick="AddTemplate()">Add New Template</button>
				</div>
				<div class="col-md-2 menubtn">
					<button class="button" onclick="AddCampaign()">Add New Campaign</button>
				</div>
				<div class="col-md-2 menubtn">
					<button class="button" onclick="ViewTemplate()">View Template</button>
				</div>
				<div class="col-md-2 menubtn">
					<button class="button" onclick="ViewCampaign()">View Campaign</button>
				</div>
			</div>
		</div>
</body>
</html>
