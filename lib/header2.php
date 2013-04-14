</head>
<body>
<?php
if(isset($_SESSION['login_status'])) {
	echo "<div><a href='/logout/'>Logout</a></div>";
} else {
	echo "<div><a href='/login/'>Login</a> | <a href='/register/'>Register</a></div>";
}
?>
<div id="content">