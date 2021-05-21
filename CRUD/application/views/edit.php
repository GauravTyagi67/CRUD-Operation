<!-- This is a Update Form -->
<!DOCTYPE html>
<html>
<head>
	<title>CRUD Operation In-Edit Form</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">
</head>
<body>

<div class="navbar navbar-dark bg-dark">
	<div class="container">
		<a href="#"class="navbar-brand">CRUD Operation</a>
	</div>
</div>
<div class="container"style="padding-top: 10px;">
	<h3>Edit User Form</h3>
	<hr>
	<div class="row">
		<div class="col-md-6">
			<form name="createUser" method="post"action="<?php echo base_url().'index.php/user/edit'.$user['user_id']; ?>">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name"value="<?php echo set_value('name',$user['name']); ?>"class="form-control"placeholder="Enter Your Name">
					<?php echo form_error('name'); ?>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email"value="<?php echo set_value('email',$user['email']); ?>"class="form-control"placeholder="Enter Your Email">
					<?php echo form_error('email'); ?>
				</div>
				<div class="form-group">
					<button class="btn btn-primary">Update</button>
					<a href="<?php echo base_url().'index.php/user/index'; ?>"class="btn btn-secondary">Cancel</a>
				</div>
			</form>
		</div>
	</div>
</div>

</body>
</html>