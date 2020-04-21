<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>user login</title>
</head>
<body>
	<div class="align">
		<img class="logo" src="images/logo.svg">
		<div class="card">
			<div class="head">
				<div></div>
				<a id="login" class="selected" href="#login">Login</a>
				<a id="register" href="#register">Register</a>
				<div></div>
			</div>
			<div class="tabs">
				<form>
					<div class="inputs">
						<div class="input">
							<input placeholder="Username" type="text">
							<img src="images/user.svg">
						</div>
						<div class="input">
							<input placeholder="Password" type="password">
							<img src="images/pass.svg">
						</div>
						<label class="checkbox">
							<input type="checkbox">
							<span>Remember me</span>
						</label>
					</div>
					<button>Login</button>
				</form>
				<form>
					<div class="inputs">
						<div class="input">
							<input placeholder="Username" type="text" name="username">
							<img src="images/user.svg">
						</div>
						<div class="input">
							<input placeholder="Email" type="text" name="email">
							<img src="images/mail.svg">
						</div>
						<div class="input">
							<input placeholder="Phone Number" type="text" name="phone">
							<img src="images/call.svg">
						</div>
						<div class="input">
							<input placeholder="Password" type="password" name="password">
							<img src="images/pass.svg">
						</div>
					</div>
					<button>Register</button>
				</form>
			</div>
		</div>
	</div>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/index.js"></script>
</body>
</html>
