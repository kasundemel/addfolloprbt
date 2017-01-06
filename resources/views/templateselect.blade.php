<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php echo 'here add';?>
			<table style="border:1px solid; width: 400px; height: 400px;">
				<?php foreach($model as $models){ ?>
				<tr>
					<td>
						<p>here image</p>
						<img src="<?php echo url('uploads') ?>/<?php echo $models->tmp_url; ?>" alt="No Template">	
					</td>
				</tr>
				<?php } ?>
			</table>
</body>
</html>