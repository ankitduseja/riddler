<?php
include("lib/connection.php"); 
if(!empty($_REQUEST['message']))
{
	$message=$_REQUEST['message'];
}
if(!empty($_REQUEST['mode']))
{
 
	 			 	$user_regno=$_REQUEST['reg_no']; 
					$user_pass=$_REQUEST['user_pass'];
					
					$encryptPassword = sha1($user_pass);
					
					$sql_chk="SELECT * FROM `users` WHERE `regno`='$user_regno' AND `password`='$encryptPassword'"; 					 
					$rs_chk=mysql_query($sql_chk);
					$checking = mysql_num_rows($rs_chk);
					if($checking == '1')
					{	 
												$fetch_data=mysql_fetch_array($rs_chk);
												$loginid = $fetch_data['regno'];
												$status = $fetch_data['status'];
												$level = $fetch_data['last_level'];
												$_SESSION['level']=$level;
												$_SESSION['login_status']=$loginid;
												if($status=='verified') {
												$_SESSION['verify_status']='verified';
												header("Location: /question/");
												} else {
												$_SESSION['verify_status']='unverified';
												header("Location: /verify/");
												}
					}
					else
					{
						$message="Either 'Registration Number' or 'Password' is incorrect.";
					?>
												<script language='javascript'>
													alert("Either 'Registration Number' or 'Password' is incorrect.");
												</script>
					<?php
					}
}


?>


    <?php require_once $_SERVER['DOCUMENT_ROOT']. '/lib/header1.php'; ?>
    <title>Riddler - Verify</title>
<link href="styles/style.css" rel="stylesheet" type="text/css" />

<script language='javascript'>
function validatefunc()
{
	 				if(document.loginform.reg_no.value=='')
					{
						alert('Please enter the Registration Number!');
						document.loginform.reg_no.focus();
						return false;
					}
					if(document.loginform.user_pass.value=='')
					{
						alert('Please enter the password!');
						document.loginform.user_pass.focus();
						return false;
					}				 
}
</script> 

    <?php require_once $_SERVER['DOCUMENT_ROOT']. '/lib/header2.php'; ?>
<table width="780" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">


 			<tr>
              <td    align="left" valign="middle"  style="color:#F00;"  >
			  <?php if(!empty($message))
					{
					echo $message;
					}
					else
					{
					echo "";	
					}
				?>
                </td>
            </tr>
  
  <tr>
        <td width="65%" valign="top">
		
		                       
<form name="loginform" id="loginform" method="post" action="" onSubmit="return validatefunc();"  >
<input type="hidden"  name="mode" id="mode" value="1" >          
			<table width="83%" border="0" align="center" cellpadding="2" cellspacing="4"> 
            
            <tr>
              <td height="35" colspan="3" align="left" valign="middle" class="heading" style="font-weight:bold; font-size:25px;">Log In</td>
            </tr>
                        
          
            <tr>
              <td width="27%" align="left" valign="middle" class="contact">Registration Number:</td>
              <td width="73%" colspan="2"><input type="text" name="reg_no"  id="reg_no" style="width:250px; height:20px;"/>
              </td>
			 </tr>
			 
              <tr>
              	<td width="27%" align="left" valign="middle" class="contact">Password</td>
            	<td width="73%" colspan="2"><input name="user_pass" id="user_pass"   type="password" style="width:250px; height:20px;"> 
			  </td>
            </tr>
			
			  <tr>
              	<td width="27%" align="left" valign="middle" class="contact"></td>
            	<td width="73%" colspan="2"><input type="submit" name="submit" value="Sign In">
			  </td>
            </tr>
			
			</table> 
</form>	
		
		</td>
        </tr>
</table>
<?php require_once$_SERVER['DOCUMENT_ROOT']. '/lib/footer.php'; ?>