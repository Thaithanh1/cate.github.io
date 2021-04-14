<?php
require_once('../../db2/dbhelper.php');
require_once('../../common/utility.php');
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Category Management</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link active" href="#">Category Management</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="../product/">Product Management</a>
		</li>
		<li class="nav-item">
	  	<a class="nav-link" href="../order/">Order Management</a>
	  </li>	
	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Category Management</h2>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6">
						<a href="add.php">
							<button class="btn btn-success" style="margin-bottom: 0px">Add Category</button>
						</a>
					</div>
					<div class="col-md-6">
						<form method="get">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Searching..." id="s" name="s" style="width: 300px; float: right; margin-bottom: 20px;">
							</div>
						</form>
					</div>
				</div>

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Category Name</th>
			<th>Description</th>
			<th width="50px"></th>
			<th width="50px"></th>
		</tr>
	</thead>
	<tbody>
		<?php
            		$query = pg_query($conn, "SELECT * FROM category");
            		while ($item = pg_fetch_array($query)){ 
        	?>
			
				<tr>
					<td>'.$item['cat_name'].'</td>
					<td>'.$item['descripition'].'</td>
					<td>
						<a href="add.php?name='.$item['cat_name'].'"><buttom class="btn btn-warning">Repair</buttom></a>
					</td>
					<td>
						<buttom class="btn btn-danger" onclick="deleteCategory('.$item['cat_name'].')">Delete</buttom>
					</td>
				</tr>;
		
		
		<?php } ?>     
	</tbody>
</table>
			
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function deleteProduct(name){
			var option = confirm('Do you want to delete this CATEGORY ???')
			if (!option) {
				return;
			}
			console.log(name)
			//ajax - lenh post
			$.post('ajax.php', {
				'name': cat_name,
				'action': 'delete',
			}, function(data){
				location.reload()
			})
		}
	</script>
</body>
</html>
