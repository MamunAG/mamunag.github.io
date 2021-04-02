<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href="css/bootstrap.css">Sourcecodester</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">PHP - Simple CRUD With SQLite Using PDO</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add Student</button>
		<br /><br/ >
		<table class="table table-bordered">
			<thead class="alert-info">
				<tr>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Gender</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					require 'conn.php';
					$query = $conn->prepare("SELECT * FROM `student`");
					$query->execute();
					while($fetch = $query->fetch()){
				?>
				<tr>
					<td><?php echo $fetch['firstname']?></td>
					<td><?php echo $fetch['lastname']?></td>
					<td><?php echo $fetch['gender']?></td>
					<td><?php echo $fetch['address']?></td>
					<td><button class="btn btn-warning" type="button" data-toggle="modal" data-target="#update_student<?php echo $fetch['student_id']?>"><span class="glyphicon glyphicon-edit"></span> Edit</button> <a href="delete.php?id=<?php echo $fetch['student_id']?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
				</tr>
				
				<div class="modal fade" id="update_student<?php echo $fetch['student_id']?>">
					<div class="modal-dialog">
						<div class="modal-content">
							<form action="update_student.php" method="POST">
								<div class="modal-header">
									<h3 class="modal-title">Update Student</h3>
								</div>
								<div class="modal-body">
									<div class="col-md-2"></div>
									<div class="col-md-8">
										<div class="form-group">
											<label>Firstname</label>
											<input type="text" class="form-control" value="<?php echo $fetch['firstname']?>" name="firstname"/>
											<input type="hidden" class="form-control" value="<?php echo $fetch['student_id']?>" name="student_id"/>
										</div>
										<div class="form-group">
											<label>Lastname</label>
											<input type="text" class="form-control" value="<?php echo $fetch['lastname']?>" name="lastname"/>
										</div>
										<div class="form-group">
											<label>Gender</label>
											<div class="radio">
												<label><input type="radio" name="gender" value="Male" required="required"/>Male</label>
												<label><input type="radio" name="gender" value="Female"/>Female</label>
											</div>
										</div>
										<div class="form-group">
											<label>Address</label>
											<input type="text" class="form-control" value="<?php echo $fetch['address']?>" name="address"/>
										</div>
									</div>
								</div>
								<div style="clear:both;"></div>
								<div class="modal-footer">
									<button class="btn btn-warning" name="update"><span class="glyphicon glyphicon-update"></span> Update</button>
									<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
	<div class="modal fade" id="form_modal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="save_student.php">
					<div class="modal-header">
						<h3 class="modal-title">Add Student</h3>
					</div>
					<div class="modal-body">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="form-group">
								<label>Firstname</label>
								<input type="text" class="form-control" name="firstname"/>
							</div>
							<div class="form-group">
								<label>Lastname</label>
								<input type="text" class="form-control" name="lastname"/>
							</div>
							<div class="form-group">
								<label>Gender</label>
								<div class="radio">
									<label><input type="radio" name="gender" value="Male" required="required"/>Male</label>
									<label><input type="radio" name="gender" value="Female"/>Female</label>
								</div>
							</div>
							<div class="form-group">
								<label>Address</label>
								<input type="text" class="form-control" name="address"/>
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button class="btn btn-primary" name="save">Save</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>