<!-- This is a Read Form -->
<html>
<head>
	<title>CRUD Operation In-Read Form</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">
</head>
<body>

<div class="navbar navbar-dark bg-dark">
	<div class="container">
		<a href="#"class="navbar-brand">CRUD Operation</a>
	</div>
</div>
<div class="container"style="padding-top: 10px;">
	<div class="row">
		<div class="col-md-12">
			<?php 
				$success=$this->session->userdata('success');
				if ($success !="") 
				{
			?>
					<div class="alert alert-success"><?php echo $success; ?></div>
			<?php 
				 }
			 ?>
			 <?php 
				$failure=$this->session->userdata('failure');
				if ($failure !="") 
				{
			?>
					<div class="alert alert-success"><?php echo $failure; ?></div>
			<?php 
				 }
			 ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<h3>Read/List User Form</h3>
		</div>
		<div class="col-md-6">
			<a href="<?php echo base_url().'index.php/user/create'; ?>" class="btn btn-secondary">Create</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<hr>
			<table class="table  table-striped">

				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<!-- <th>Edit</th>
					<th>Delete</th> -->
					<th>Action</th>
				</tr>

				<?php if(!empty($users)) {foreach($users as  $user){?>
				<tr>
					<td><?php echo $user['user_id'] ?></td>
					<td><?php echo $user['name'] ?></td>
					<td><?php echo $user['email'] ?></td>
					<td>
						<a href="<?php echo base_url().'index.php/user/edit/'.$user['user_id'] ?>"class="btn btn-primary">Edit</a>
						<a href="<?php echo base_url().'index.php/user/delete/'.$user['user_id'] ?>"class="btn btn-danger">Delete</a>
					</td>
				</tr>
				<?php }} else{ ?>
					<tr>
						<td colspan="5">Records not found</td>
					</tr>
				<?php } ?>

			</table>
		</div>
	</div>
</div>

</body>
</html>