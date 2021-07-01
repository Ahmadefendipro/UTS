<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="styles/stylesheet.css"/>	
</head>
<body>
	<h1 style="text-align:center"><font color="white">Login</font></h1>
	
	<br>
	<br>

	<form action="proseslogin.php" method="post">		
		<table border="5" cellpadding="10" align="center" style="text-align: center;">
			<tr>
				<td bgcolor="#C68B59"><b>Username : </b></td>
			</tr>
			<tr>
				<td bgcolor="#C68B59"><input type="text" name="username" size="100"></td>
			</tr>

			<tr>
				<td bgcolor="#C68B59"><b>Password : </b></td>
			</tr>
			<tr>
				<td bgcolor="#C68B59"><input type="password" name="password" size="100"></td>
			</tr>

			<tr>
				<td bgcolor="#C68B59"><input type="submit" name="login" value="Log In"></td>
			</tr>
		</table>
	</form>

</body>
</html>