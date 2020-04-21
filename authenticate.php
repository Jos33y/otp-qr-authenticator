<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>user authentication</title>
</head>
<body>
	<div class="align">
		<h3><span class="green"> user</span><span class="grey">authentication </span></h3>
		<div class="card">
			<div class="head">
				<div></div>
				<a id="otpcode" class="selected" href="#otpcode">OTP Auth</a>
				<a id="qrcode" href="#qrcode">QR Code Auth</a>
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
