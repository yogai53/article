<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<?php include 'common/styles.php'; ?>
	<?php include 'common/scripts.php'; ?>
</head>
<body>
	<?php $pageName='login';include 'common/header.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-6 mt-5 offset-md-3">
				<form method="POST" action="/article/registration.php">
					<div class="form-group">
						<label for="phone">Phone</label>
						<input name="phone" type="text" class="form-control" id="phone" placeholder="Phone">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input name='password' type="password" class="form-control" id="password" placeholder="Password">
					</div>
					<button type="submit" class="btn btn-success btn-block">Login</button>
				</form>
			</div>
		</div>
	</div>

	<?php include 'common/footer.php'; ?>
</body>
</html>