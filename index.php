<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>STUDENT DATABASE</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<!--thislinkforgliphion---->

	<style>
		.content {
			margin-top: 80px;
		}
	</style>

</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand visible-xs-block visible-sm-block" href="index.php">STUDENT DATA</a>
				<a class="navbar-brand hidden-xs hidden-sm" href="">STUDENT DATA</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php">All data</a></li>
					<li><a href="add.php">Add data</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
			<div class="container">
				<div class="content">
                    <h3>STUDENTS DATABASE</h3>
                    <hr/>
                    <?php
			if(isset($_GET['opp']) == 'delete'){
				$first_name = $_GET['first_name'];
				$selct = mysqli_query($connect, "SELECT * FROM student_info WHERE first_name='$first_name'");
				if(mysqli_num_rows($selct) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data not found.</div>';
				}else{
					$delete = mysqli_query($connect, "DELETE FROM student_info WHERE first_name='$first_name'");
					if($delete){
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data successfully removed</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data failed to delete.</div>';
					}
				}
			}
			?>

                    <form class="form-inline" method="get">
                    	<div class="form-group">
                    		<select name="filter" class="form-control" onchange="form.submit()">

                    			<option value="0">ALL student</option>
                    			<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
                    			<option value="man" <?php if($filter=="man"){echo 'selected';}?>>man</option>
                    			<option value="woman" <?php if($filter=="woman"){echo 'selected';}?>>woman</option>
                    			
                    		</select>
                    	<div>
                    </form>


					<div class="table-responsive">
						<table class="table table-striped table-hover">
							<tr>
								<th>SL</th>
								<th>First_Name</th>
								<th>Lst_Name</th>
			                    <th>gender</th>
			                    <th>student_id</th>
			                    <th>address</th>
								<th>Phone no</th>
								<th>gmail</th>
			                    <th>position</th>
			                    <th>passward</th>
			                    <th>advanced</th>

							</tr>
							
							<?php
								if($filter){
									$sql = mysqli_query($connect, "SELECT * FROM student_info WHERE gender='$filter' ORDER BY first_name ASC");
								}else{
									$sql = mysqli_query($connect, "SELECT * FROM student_info ORDER BY first_name ASC");
								}
								if (!$sql) {
									echo '<tr><td colspan="8">Data Missing.</td></tr>';
								}
								else{
							 	$no = 1;
							 	
							 
							 	while($row = mysqli_fetch_array($sql)){
							 		echo '
							 	<tr> 
							 		<td>'.$no.'</td>
							 		<td>'.$row['first_name'].'</td>
							 		<td><a href="profile.php?first_name='.$row['first_name'].'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>'.$row['last_name'].'</a></td>
							 		<td>';
							 		if($row['gender']=='man'){
							 			echo '<span class="label label-success">man</span>';
							 		}else{
							 			echo '<span class="label label-success">woman</span>';
							 		}
							 		echo '
							 		</td>
							 		<td>'.$row['student_id'].'</td>
							 		<td>'.$row['address'].'</td>
							 		<td>'.$row['phone'].'</td>
							 		<td>'.$row['gmail'].'</td>
							 		<td>'.$row['user_name'].'</td>
							 		<td>'.$row['passward'].'</td>
							 		<td>

								<a href="edit.php?first_name='.$row['first_name'].'" title="Edit Data" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="password.php?first_name='.$row['first_name'].'" title="change Password" data-placement="bottom" data-toggle="tooltip" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a>
								<a href="index.php?opp=delete&first_name='.$row['first_name'].'" title="Clear Data" onclick="return confirm(\'Want to Delete Data?'.$row['last_name'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>

							<td>
							 		</tr>
							 		';
							 		$no++;

							 	}
							 }
							 ?>
						</table>



					</div>
				</div>


			</div>
<center>
	<p>&copy; Banglaserve 2016</p>
		</center>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>


