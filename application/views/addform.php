<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>CodeIgniter Crud</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>

<body>
<div class="container">
	<h1 class="page-header text-center">Add User</h1>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<h3>Add Form
				<span class="pull-right"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
			</h3>
			<hr>
			<form method="POST" action="<?php echo base_url(); ?>index.php/users/insert"  enctype= multipart/form-data>
				<?php echo form_open();?>
				<?php echo form_error();?>
				<div class="form-group">
					<label>Name:</label>
					<input type="text" class="form-control" name="name">
					<?php echo form_error('name'); ?>
				</div>
				<div class="form-group">
					<label>Email:</label>
					<input type="text" class="form-control" name="email">
					<?php echo form_error('email'); ?>
				</div>
				<div class="form-group">
					<label>Password:</label>
					<input type="text" class="form-control" name="password">
					<?php echo form_error('password'); ?>
				</div>
				<div class="form-group">
					<label>Gender:</label><br>
					<input type="radio" name="gender" value="male" unchecked> Male
 					<input type="radio" name="gender" value="female"> Female
 					<?php echo form_error('gender'); ?>
				</div>
				
				<div class="form-group">
					<label>Hobby</label><br>
					<label><input  type="checkbox" name="hobby[]" value="reading"> Reading</label><br>
				    <label><input type="checkbox" name="hobby[]" value="singing"> Singing</label><br>
				    <label><input type="checkbox" name="hobby[]" value="playing"> Playing</label>
				    <?php echo form_error('hobby'); ?>
				</div>

				<div class="dropdown">
					<label>Country:</label><br>
						<select name="country">
						 <option value="">Select Country</option>
						  <option value="india">India</option>
						  <option value="usa">USA</option>
						  <option value="china">China</option>
						  <option value="Japan">Japan</option>
						  <?php echo form_error('country'); ?>
						</select>
				</div><br>

				<div class="form-group">
					<label>Image</label><br>
					<?php echo form_open_multipart('user/do_upload');?>
				    <input type="file" name="user" value="upload">
				</div>
				 

				<button type="submit" class="btn btn-primary" name="submit"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
				<?php echo  form_close();?>
			</form>
		</div>
	</div>
</div>
</body>
</html>