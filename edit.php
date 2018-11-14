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
				<a class="navbar-brand visible-xs-block visible-sm-block" href="index.php">Student Data</a>
				<a class="navbar-brand hidden-xs hidden-sm" href="index.php">Student data</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.php">All  data</a></li>
					<li><a href="add.php">Add Data</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
          <h2>Employee data &raquo; Edit Data</h2>
			<hr />
			
			<?php
			$first_name = $_GET['first_name'];
			$sql = mysqli_query($connect, "SELECT * FROM student_info WHERE first_name='$first_name'");
			if(!$sql){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$first_name=$_POST['first_name'];
				$last_name=$_POST['last_name'];
				$gender=$_POST['gender'];
				$student_id=$_POST['student_id'];
				$address=$_POST['address'];
				$phone=$_POST['phone'];
				$gmail=$_POST['gmail'];
				$user_name=$_POST['user_name'];
				$password=$_POST['passward'];

			$update = mysqli_query($connect, "UPDATE student_info SET last_name='$last_name', gender='$gender', student_id='$student_id', address='$address', phone='$phone', gmail='$gmail',user_name='$user_name' WHERE first_name='$first_name'") or die(mysqli_error());
				if($update){
					header("Location: edit.php?first_name=".$first_name."&massege=success");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data eddintion failed...please try again.</div>';
				}
			}
			
			if(isset($_GET['massege']) == 'success'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data edited successfully</div>';
			}


			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">first name</label>
					<div class="col-sm-2">
						<input type="text" name="first_name" value="<?php echo $row ['first_name']; ?>" class="form-control" placeholder="first_name" required>
					</div>
				</div>


				<div class="form-group">
					<label class="col-sm-3 control-label">last name</label>
					<div class="col-sm-2">
						<input type="text" name="last_name" value="<?php echo $row ['last_name']; ?>" class="form-control" placeholder="last_name" required>
					</div>
				</div>


				<div class="form-group">
					<label class="col-sm-3 control-label">gender</label>
					<div class="col-sm-2">
						<select name="gender" class="form-control" required>
							<option value=""> - gender - </option>
							<option value="man">man</option>
							<option value="woman">woman</option>
							
						</select>

					</div>
					<div class="col-sm-3">
                    <b>gender :</b> <span class="label label-success"><?php echo $row['gender']; ?></span>
				    </div>
				</div>


				<div class="form-group">
					<label class="col-sm-3 control-label">phone</label>
					<div class="col-sm-2">
						<input type="text" name="phone" value="<?php echo $row ['phone']; ?>" class="form-control" placeholder="phone" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">gmail</label>
					<div class="col-sm-2">
						<input type="text" name="gmail" value="<?php echo $row ['gmail']; ?>" class="form-control" placeholder="gmail" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">user_name</label>
					<div class="col-sm-2">
						<input type="text" name="user_name" value="<?php echo $row ['user_name']; ?>" class="form-control" placeholder="user_name" required>
					</div>
				</div>



				<div class="form-group">
					<label class="col-sm-3 control-label">password</label>
					<div class="col-sm-2">
						<input type="text" name="password" value="<?php echo $row ['passward']; ?>" class="form-control" placeholder="password" required>
					</div>
				</div>


                  <div class="form-group">
					<label class="col-sm-3 control-label">student_id</label>
					<div class="col-sm-2">
						<input type="text" name="student_id" value="<?php echo $row ['student_id']; ?>" class="form-control" placeholder="student_id" required>
					</div>
				</div>


				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="save">
						<a href="index.php" class="btn btn-sm btn-danger">cancel</a>
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