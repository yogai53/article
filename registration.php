<!DOCTYPE html>
<html>
<head>
	<title>REGISTRATION</title>
	<?php include 'common/styles.php'; ?>
	<?php include 'common/scripts.php'; ?>
</head>
<body>
	<?php $pageName='registration';include 'common/header.php'; ?>
	<?php
		$formSuccess = $nameError = $emailError = $phoneError = $passwordError = $confirmPasswordError = $serverError = '';
		$name = $email = $phone = $password = $confirmPassword = '';

		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$password = $_POST['password'];
			$confirmPassword = $_POST['confirm-password'];

			//Name Validation
			if(strlen($name) == 0) $nameError = 'Please enter Name';
			if(strlen($name) > 0 && strlen($name) < 5) $nameError = 'Enter Valid Name with more than 5 character';

			//Email Validation
			if(strlen($email) > 0){
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$emailError = "Invalid email format"; 
				}
			}

			//Phone Validation
			if(strlen($phone) != 10) $phoneError = 'Invalid Phone';

			//Password Validation
			if(strlen($password) < 6) $passwordError = 'Please enter Valid Password';
			if(strlen($confirmPassword) < 6) $confirmPasswordError = 'Please enter Valid Confirm Password';
			if($password != $confirmPassword) $confirmPasswordError = 'Password does not match';

			if($nameError == '' && $emailError == '' && $phoneError == '' && $passwordError == '' && $confirmPasswordError == '')
			{
				include 'dbconfig.php';
				$db = new Db();
				$register = $db->register($name, $email, $password, $phone);
				if($register == true){
					$formSuccess = 'Registered Successfully';
				}
				else
				{
					$serverError = 'Server Error';
				}
			}
		}
	?>

	<div class="container">
		<div class="row">
			<div class="col-md-6 mt-5 offset-md-3">
				<form method="POST" action="/article/registration.php" novalidate>
					<div class="form-group">
						<label for="name">Name</label>
						<input name="name" type="text" class="form-control" id="name" placeholder="Name" value="<?php echo $name; ?>">
						<span class="text-danger"><?php echo $nameError; ?></span>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="email">Email</label>
							<input name="email" type="email" class="form-control" id="email" placeholder="Email" novalidate value="<?php echo $email; ?>">
							<span class="text-danger"><?php echo $emailError; ?></span>
						</div>
						<div class="form-group col-md-6">
							<label for="phone">Phone</label>
							<input name="phone" type="text" class="form-control" id="phone" placeholder="Phone" value="<?php echo $phone; ?>">
							<span class="text-danger"><?php echo $phoneError; ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input name='password' type="password" class="form-control" id="password" placeholder="Password" value="<?php echo $password; ?>">
						<span class="text-danger"><?php echo $passwordError; ?></span>
					</div>
					<div class="form-group">
						<label for="confirmPassword">Confirm Password</label>
						<input name='confirm-password' type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" value="<?php echo $confirmPassword; ?>">
						<span class="text-danger"><?php echo $confirmPasswordError; ?></span>
					</div>
					<button type="submit" class="btn btn-success btn-block">Register</button>
					<span class="text-danger"><?php echo $serverError; ?></span>
					<span class="text-success"><?php echo $formSuccess; ?></span>
				</form>
			</div>
		</div>
	</div>
	<?php include 'common/footer.php'; ?>
</body>
</html>