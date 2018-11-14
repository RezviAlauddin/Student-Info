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
	<title>Student Database</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">

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
				<a class="navbar-brand visible-xs-block visible-sm-block" href="index.php">Student's data</a>
				<a class="navbar-brand hidden-xs hidden-sm" href="index.php">student's Data</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.php">ALL Data</a></li>
					<li class="active"><a href="add.php">Add New</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Student Data &raquo; Add New</h2>
			<hr />

			<?php
			if(isset($_POST['add'])){
				$first_name	     = $_POST['first_name'];
				$last_name		     = $_POST['last_name'];
				$gender	 = $_POST['gender'];//place of birth
				$student_id	 = $_POST['student_id'];//date of birth
				$address	     = $_POST['address'];//address
				$phone		 = $_POST['phone'];//telephone
				$gmail           =$_POST['gmail'];
				$user_name		 = $_POST['user_name'];//office
				
				$pass1	         = $_POST['pass1'];
				$pass2           = $_POST['pass2'];

				$selct = mysqli_query($connect, "SELECT * FROM student_info WHERE first_name='$first_name'");
				if(mysqli_num_rows($selct) == 0){
					if($pass1 == $pass2){
						$pass = md5($pass1);
						$insert = mysqli_query($connect, "INSERT INTO student_info(first_name, last_name, gender, student_id, address, phone,gmail, user_name, passward)
			VALUES('$first_name','$last_name', '$gender','student_id', '$address', '$phone', '$gmail', '$user_name', '$pass1')") or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Student Data Saved Successfully.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Oops, Student Data Stored Failed!</div>';
						}
					} else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password Not  same!</div>';
					}
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>first name is exist..!</div>';
				}
			}
			?>

			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">first_name</label>
					<div class="col-sm-2">
						<input type="text" name="first_name" class="form-control" placeholder="first_name" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">last_name</label>
					<div class="col-sm-4">
						<input type="text" name="last_name" class="form-control" placeholder="last_name" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">gender</label>
					<div class="col-sm-2">
						<select name="gender" class="form-control" required>
							<option value=""> ----- </option>
							<option value="man">man</option>
							<option value="woman">woman</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">student_id</label>
					<div class="col-sm-4">
						<input type="text" name="student_id" class="input-group date form-control" placeholder="student_id" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Address</label>
					<div class="col-sm-3">
						<textarea name="address" class="form-control" placeholder="address"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">phone</label>
					<div class="col-sm-3">
						<input type="text" name="phone" class="form-control" placeholder="phone" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">gmail</label>
					<div>
					<input type="text" name="gmail" class="form-control" placeholder="www.gmail.com" required>
					</div>				
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">user_name</label>
					<div class="col-sm-2">
						<input type="text" name="user_name" class="form-control" placeholder="user_name" required>
					</div>
				</div>
			
				<div class="form-group">
					<label class="col-sm-3 control-label">Password</label>
					<div class="col-sm-2">
						<input type="password" name="pass1" class="form-control" placeholder="Password" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Repeat Password</label>
					<div class="col-sm-2">
						<input type="password" name="pass2" class="form-control" placeholder="Repeat Password">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Save">
						<a href="index.php" class="btn btn-sm btn-danger">cancele</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'yyyy-mm-dd',
	})
	</script>
</body>
</html>
