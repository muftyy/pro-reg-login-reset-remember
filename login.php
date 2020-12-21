<?php declare(strict_types=1);
	
	if(isset($_POST['login'])){
		require 'incs/login_validator.inc.php';
	}	

	
?>

<?php include "templates/header.php" ?>

<section class="container grey-text">
	<h4 class="center">Login</h4>
	<article class="center red-text"><?php echo $errors['system'] ?? $errors['empty'] ?? '' ?></article>
	<form class="white" action="login" method="POST">
		<label>Username or Email</label>
		<input type="text" name="username_or_email" value="<?php echo htmlspecialchars($data['username_or_email'] ?? '') ?>">

		<label>Password</label>
		<input type="password" name="password">

		<div class="center">
			<input type="submit" name="login" value="login" class="btn brand z-depth-0">
		</div>
	</form>
</section>

<?php include "templates/footer.php" ?>