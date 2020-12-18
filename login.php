<?php
	$empty;

	function validate(){
		//check for empty fields
		if(isset($_POST['login'])){
			if(empty($_POST['email']) or empty($_POST['password'])){
				global $empty;
				$empty = "Please enter all fields";
				return;
			}
		}

		//filters for email
	}

	validate();

	
?>

<?php include "templates/header.php" ?>

<section class="container grey-text">
	<h4 class="center">Login</h4>
	<article class="center red-text"><?php echo htmlspecialchars($empty ?? null); ?></article>
	<form class="white" action="login.php" method="POST">
		<label>Email</label>
		<input type="text" name="email">

		<label>Password</label>
		<input type="password" name="password">

		<div class="center">
			<input type="submit" name="login" value="login" class="btn brand z-depth-0">
		</div>
	</form>
</section>

<?php include "templates/footer.php" ?>