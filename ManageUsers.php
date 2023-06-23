<?php

include('db.php');

if (isset($_POST['apply'])) {

	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$password = $_POST['password'];
	$email = $_POST['email'];

	$sql = "INSERT INTO  users ( name, email ,  gender ,  password )  
	VALUES ('$name','$email','$gender','$password')";

	$query = $dbh->prepare($sql);
	$query->execute();

	$lastInsertId = $dbh->lastInsertId();

	if ($lastInsertId) {
		$msg = " A new user has been added. Thank You!";
	} else {

		$error = " Sorry, could not process this time. Please try again!";
	}
}

?>



<html>

<head>
	<title>Manage Users</title>
	<script src="javaScript.js"></script>

	<!--Bootstrap----->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
	</style>
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>



	<style>
		.table-responsive {
			margin: 30px 0;
		}

		.table-wrapper {
			min-width: 1000px;
			background: #fff;
			padding: 20px;
			box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
		}

		.table-title {
			padding-bottom: 10px;
			margin: 0 0 10px;
			min-width: 100%;
		}

		.table-title h2 {
			margin: 8px 0 0;
			font-size: 22px;
		}

		.search-box {
			position: relative;
			float: right;
		}

		.search-box input {
			height: 34px;
			border-radius: 20px;
			padding-left: 35px;
			border-color: #ddd;
			box-shadow: none;
		}

		.search-box input:focus {
			border-color: #3FBAE4;
		}

		.search-box i {
			color: #a0a5b1;
			position: absolute;
			font-size: 19px;
			top: 8px;
			left: 10px;
		}

		table.table tr th,
		table.table tr td {
			border-color: #e9e9e9;
		}

		table.table-striped tbody tr:nth-of-type(odd) {
			background-color: #fcfcfc;
		}

		table.table-striped.table-hover tbody tr:hover {
			background: #f5f5f5;
		}

		table.table th i {
			font-size: 13px;
			margin: 0 5px;
			cursor: pointer;
		}

		table.table td:last-child {
			width: 130px;
		}

		table.table td a {
			color: #a0a5b1;
			display: inline-block;
			margin: 0 5px;
		}

		table.table td a.view {
			color: #03A9F4;
		}

		table.table td a.edit {
			color: #FFC107;
		}

		table.table td a.delete {
			color: #E34724;
		}

		table.table td i {
			font-size: 19px;
		}

		.pagination {
			float: right;
			margin: 0 0 5px;
		}

		.pagination li a {
			border: none;
			font-size: 95%;
			width: 30px;
			height: 30px;
			color: #999;
			margin: 0 2px;
			line-height: 30px;
			border-radius: 30px !important;
			text-align: center;
			padding: 0;
		}

		.pagination li a:hover {
			color: #666;
		}

		.pagination li.active a {
			background: #03A9F4;
		}

		.pagination li.active a:hover {
			background: #0397d6;
		}

		.pagination li.disabled i {
			color: #ccc;
		}

		.pagination li i {
			font-size: 16px;
			padding-top: 6px
		}

		.hint-text {
			float: left;
			margin-top: 6px;
			font-size: 95%;
		}

		/*
Style for menu and logo
*/
		.menu {
			list-style-type: none;
			height: 3em;
			overflow: hidden;
			padding-left: 390px;
			padding-bottom: 30px;
			padding-top: 20px;
		}

		.menu li {
			float: left;
		}

		li a {
			display: block;
			color: #333;
			text-align: center;
			padding: 13px 16px 17px;
			text-decoration: none;
			font-size: 21px;
		}

		li a:hover {
			transform: translateX(10px);
			transition: all 0.5s cubic-bezier(0.55, 0, 0.1, 1);
			text-decoration: underline #7A72FF;
		}

		.logo {
			text-align: left;
			top: 10px;
			left: 90px;
			position: absolute;
			font-size: x-large;
		}

		.logo span {
			color: #7A72FF;
		}

		footer {
			text-align: center;
			margin-top: 300px;
		}

		#footer {
			color: #7A72FF;
			opacity: 0.6;
		}

		footer img {
			height: 30px;
			width: 30px;
		}
	</style>

	<script>
		$(document).ready(function () {
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>


</head>

<body>
	<!--Menu&Logo----->
	<div class="logo">
		<h3><span>Art</span>Gathering</li>
		</h3>
	</div>
	<ul class="menu" style="height: 100px;">
		<li><a href="Index.html">Home</a></li>
		<li><a href="Shop.html">Shop</a></li>
		<li><a href="Contact.html">Contact</a></li>
		<li><a href="About.html">About</a></li>
		<li><a href="Signup.html" class="signup">Signup </a></li>
		<li><a href="logIn.html">Login </a></li>
		<li><a href="ManageUsers.html">Mange Users</a></li>
		<br><br>
	</ul>

	<div class="container-xl" style="padding-left: 25px; padding-right: 25px;">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-8">
							<h2>Manage <b>Users</b></h2>
						</div>
					</div>
				</div>

				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
					Add new User
				</button>

				<!-- Add new Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
					aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Add User</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="post" name="apply" autocomplete="off" enctype="multipart/form-data">
									<div class="mb-3">
										<label class="col-form-label" for="message-text">Full Name:</label>
										<input class="form-control" name="name" id="name" required></input>
									</div>
									<div class="mb-3">
										<label class="col-form-label" for="message-text">Email:</label>
										<input class="form-control" name="email" id="email" required></input>
									</div>
									<div class="mb-3">
										<label class="col-form-label" for="message-text">Gender:</label>
										<select class="form-control" name="gender" id="gender" required>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											<option value="Other">Other</option>
										</select>
									</div>
									<div class="mb-3">
										<label class="col-form-label" for="message-text">Password:</label>
										<input class="form-control" name="password" id="password" required></input>
									</div>

									<div class="modal-footer">
										<button class="btn btn-secondary" type="button"
											data-bs-dismiss="modal">Close</button>
										<button class="btn btn-primary" name="apply" type="submit">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>



				<br><br>
				<?php if ($error) { ?>
					<div style="background: #D4EDDA; color: #4C632A; height: 40px; padding-top: 10px;"><strong>Info: </strong>
						<?php echo htmlentities($error); ?>

					</div>
				<?php } else if ($msg) { ?>
						<div style="background: #D4EDDA; color: #4C632A; height: 40px; padding-top: 10px;"><strong>Info: </strong>
						<?php echo htmlentities($msg); ?>
						</div>
				<?php } ?>
				<br>
				<table id="myTable" class="table table-striped table-bordered table-responsive table-hover">
					<thead>

						<tr>
							<td>Users Id</td>
							<td>Name</td>
							<td>Email</td>
							<td>Gender</td>
							<td>Password</td>
							<td></td>
						</tr>
					</thead>

					<tbody>
						<?php

						$sql = "SELECT * from users order by id ASC";
						$query = $dbh->prepare($sql);
						$query->execute();
						$results = $query->fetchAll(PDO::FETCH_OBJ);
						$cnt = 1;
						if ($query->rowCount() > 0) {
							foreach ($results as $result) {
								?>

								<tr>
									<td> <b>
											<?php echo htmlentities($result->id); ?>
										</b></td>
									<td>
										<?php echo htmlentities($result->name); ?>
									</td>
									<td>
										<?php echo htmlentities($result->email); ?>
									</td>
									<td>
										<?php echo htmlentities($result->gender); ?>
									</td>

									<td>
										<?php echo htmlentities($result->password); ?>
									</td>
									<td>
										<a href="updateUser.php?uid=<?php echo htmlentities($result->id); ?>" class="edit"
											title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
										<a href="delete.php?uid=<?php echo htmlentities($result->id); ?>" class="delete"
											title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
									</td>
								</tr>
								<?php $cnt++;
							}
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>

	<script type="text/javascript">
		var elems = document.getElementsByClassName('delete');
		var confirmIt = function (e) {
			if (!confirm('Are you sure you want to delete this user?')) e.preventDefault();
		};
		for (var i = 0, l = elems.length; i < l; i++) {
			elems[i].addEventListener('click', confirmIt, false);
		}
	</script>

	<script>
		$(document).ready(function () {
			$('#myTable').dataTable();
		});
	</script>

</body>

</html>