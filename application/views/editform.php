<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>CodeIgniter Crud</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1 class="page-header text-center">Update User</h1>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<h3>Edit Form
					<span class="pull-right"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
				</h3>
				<hr>
				<?php extract($user); ?>
				<form method="POST" action="<?php echo base_url(); ?>index.php/users/update/<?php echo $id; ?>">
					<div class="form-group">
						<label>Name:</label>
						<input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
					</div>
					<div class="form-group">
						<label>Email:</label>
						<input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
					</div>
					<div class="form-group">
						<label>Password:</label>
						<input type="text" class="form-control" name="password" value="<?php echo $password; ?>">
					</div>
					<div class="form-group">
						<label>Gender:</label><br>
						<input type="radio" name="gender" value="male" checked value="male" <?php if($user['gender']=="male"){echo "checked";}?>> Male
						<input type="radio" name="gender" value="female" value=""<?php if($user['gender']=="female"){echo "checked";}?>> Female
					</div>

					<div class="form-group">
						<?php 
						$chkbox=$user['hobby'];
						$hobby=explode(",",$chkbox);

						?>
						<label>Hobby</label><br>
						<label><input <?php if(in_array("reading",$hobby)){echo "checked";}?>  type="checkbox" name="hobby[]" value="reading"> Reading</label><br>
						<label><input <?php if(in_array("singing",$hobby)){echo "checked";}?> type="checkbox" name="hobby[]" value="singing"> Singing</label><br>
						<label><input <?php if(in_array("playing",$hobby)){echo "checked";}?> type="checkbox" name="hobby[]" value="playing"> Playing</label>
					</div>

					<div class="dropdown">
						<?php 
						$dropbox=$user['country'];
						$hobby=explode(",",$dropbox);

						?>
						<label for="country">Country:</label><br>
						<select name="country">
							<option <?php if($user['country'] == "india"){echo "selected";} ?>>India</option>
							<option <?php if($user['country'] == "usa"){echo "selected";} ?>>USA</option>
							<option <?php if($user['country'] == "china"){echo "selected";} ?>>China</option>
							<option <?php if($user['country'] == "japan"){echo "selected";} ?>>Japan</option>
						</select>
					</div><br>
					<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>