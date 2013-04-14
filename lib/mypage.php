<?php
session_start();
				if(empty($_SESSION['login_status']))
				{
					@header("Location: login.php");
					@exit();
				}
?>
<html>
<head>
<title>My Home Page</title>
</head>
<body style="margin:0px; padding:0px;">
<table width="800px;" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>		  	
			<td align="right">
			 <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
          <tr>
		  <td width="55%">&nbsp;</td>
		  	<td width="18%"></td>
			<td width="27%"><strong><a href="logout.php">Logout</a></strong></td>
		  </tr>
</table>
			
			</td>
		  </tr>
		  <tr>		  	
			<td align="right">&nbsp;</td>
		  </tr>
		  <tr>		  	
			<td align="right">Welcome to my Home page</td>
		  </tr>
		  
</table>
</body>
</html>