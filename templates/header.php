<html>
<head>
	<title>Playground </title>
	<link rel="stylesheet" type="text/css" href="materialize/css/materialize.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
</head>
<style>
	.brand{
		background-color: #cbb09c !important;
	}
	.brand-text{
		color: #cbb09c !important;
	}
	form{
		max-width: 90%;
		margin: 1rem auto;
		padding: 1rem;
	}
	@media screen and (max-width:560px){
		.brand-logo{
			font-size: 1.5rem !important;
		}
		#nav-mobile .btn{
			padding: 0.1rem 0.4rem;
		}
	}
</style>
<body class="grey lighten-4">
	<nav class="white z-depth-0">
		<div class="container">
			<a class="left brand-logo brand-text">Playground</a>
			<ul id="nav-mobile" class="right">
				<li><a href="login" class="btn brand z-depth-0">Login</a></li>
				<li><a href="register" class="btn brand z-depth-0">Register</a></li>
			</ul>
		</div>
	</nav>