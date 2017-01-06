
@include('menubar')
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		function DeleteTemplate(){
			alert('Deleted Success !!!');
		}
	</script>
</head>
<br><br><br>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-offset-3 col-md-6">
				<table border="1" class="table">
					<?php foreach($template as $temp){ ?>
		    			<tr>
		    				
		       				<td> 
		       					<div class="col-md-8">

			       					<!-- template show as a image

			       					<img src="<?php //echo url('uploads') ?>/<?php //echo $temp->tmp_url; ?>" style="width: 100px; height: 100px;">

			       					 -->
			       					<br><?php echo $temp->tmp_name; ?>
			       					</div>
			       					<div class="col-md-4 dbtn">
			       						<a href="<?php echo url('delete'); ?>/<?php echo $temp->tmp_id; ?>"><button class="deletebtn" onclick="DeleteTemplate()">Delete</button></a>
			       					</div>
		       				</td>
    					</tr>  
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
	
</body>
</html>