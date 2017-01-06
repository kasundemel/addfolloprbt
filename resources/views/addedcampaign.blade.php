
@include('menubar')

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<br><br><br>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-offset-3 col-md-6">
				<table class="table table-hover">
					<thead class="thead-inverse">
					<tr>
						<th>Campaign Name</th>
						<th>Campaign Url</th>
						<th>Created Date</th>
					</tr>
					</thead>
					<?php foreach($campaign as $camp){ ?>
					<tr>
						<td>
							<?php echo $camp->campaign_name; ?>
						</td>
						<td>
							<?php echo $camp->campaign_url; ?>
						</td>
						<td>
							<?php echo $camp->created_at; ?>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
		
	</div>
</body>
</html>