<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!--
Project      : Data Karyawan CRUD MySQLi (Create, read, Update, Delete) PHP, MySQLi dan Bootstrap
Author		 : Hakko Bio Richard, A.Md
Website		 : http://www.niqoweb.com
Blog         : http://www.acchoblues.blogspot.com
Email	 	 : hakkobiorichard[at]gmail.com
-->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>STUDENTS PROFIELS</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

	
	<style>
		.content {
			margin-top: 80px;
		}
	</style>
	
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
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
				<a class="navbar-brand visible-xs-block visible-sm-block" href="index.php">Student data</a>
				<a class="navbar-brand hidden-xs hidden-sm" href="index.php">Student data</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.php">All Data</a></li>
					<li><a href="add.php">Add New</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Student's data &raquo; Profile</h2>
			<hr/>


			<!---database calling begin---->
			<?php
			$first_name=$_GET['first_name'];
			$sql=mysqli_query($connect, "SELECT * FROM student_info WHERE first_name='$first_name' ");
			if(!$sql){
				header("Location :index.php");
			}else{
				$row=mysqli_fetch_array($sql);
			}
			if(isset($_GET['action']) == 'delete'){
				$delete = mysqli_query($koneksi, "DELETE FROM student_info WHERE first_name='$first_name'");
				if($delete){
					echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data successfully removed.</div>';
				}else{
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data failed to delete.</div>';
				}
			}


			 ?>
			<!---database calling end---->


			<table class="table table-striped table-condensed">
				<tr>
					<th>first name</th>
					<td><?php echo $row['first_name']; ?></td>
				</tr>
				<tr>
					<th width="20%">last name</th>
					<td><?php echo $row['last_name']; ?></td>
				</tr>
				<tr>
					<th>gender</th>
					<td><?php echo $row['gender']; ?></td>
				</tr>
				<tr>
					<th>student_id</th>
					<td><?php echo $row['student_id']; ?></td>
				</tr>
				<tr>
					<th>address</th>
					<td><?php echo $row['address']; ?></td>
				</tr>
				<tr>
					<th>phone number</th>
					<td><?php echo $row['phone']; ?></td>
				</tr>
				<tr>
					<th>gmail</th>
					<td><?php echo $row['gmail']; ?></td>
				</tr>
				<tr>
					<th>user name</th>
					<td><?php echo $row['user_name']; ?></td>
				</tr>
				<tr>
					<th>password</th>
					<td><?php echo $row['passward']; ?></td>
				</tr>

           </table>

<!--showing the database information end-->
			<a href="index.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>Home</a>
			<a href="edit.php?first_name=<?php echo $row['first_name']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a>
			<a href="profile.php?action=delete&first_name=<?php echo $row['first_name']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Data deletion successful <?php echo $row['last_name']; ?>')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete</a>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>





	


