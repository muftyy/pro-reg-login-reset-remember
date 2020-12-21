<?php declare(strict_types=1);

	if(isset($_POST['register'])){
		require 'incs/registeration_validator.inc.php';
	}	

?>


<?php include "templates/header.php" ?>

<section class="container grey-text">
	<h4 class="center">Register</h4>
	<article class="center red-text"><?php echo $errors['system'] ?? $errors['empty'] ?? null ?></article>
	<form class="white" action="register" method="POST">

		<label>Username</label>
		<input type="text" name="username" value="<?php echo htmlspecialchars($data['username'] ?? '') ?>">
		<small class="red-text"><?php echo $errors['username'] ?? ''; ?></small><br><br>

		<label>Email</label>
		<input type="text" name="email" value="<?php echo htmlspecialchars($data['email'] ?? '') ?>">
		<small class="red-text"><?php echo $errors['email'] ?? ''; ?></small><br><br>

		<label>Password</label>
		<input type="password" name="password">

		<label>Repeat Password</label>
		<input type="password" name="password_repeat">
		<small class="red-text"><?php echo $errors['password'] ?? ''; ?></small>

		<div class="center">
			<input type="submit" name="register" value="register" class="btn brand z-depth-0">
		</div>
	</form>
</section>

<?php include "templates/footer.php" ?>
