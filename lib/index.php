<?php
	if(isset($_SESSION['login_status'])) {
		header("Location: /question/");
	}
if(!empty($_POST['message']))
{
	$message=es($_POST['message']);
}
if(!empty($_POST['mode']))
{ 
		 $name = es($_POST['username']);
		 $regno = es($_POST['reg_no']);
		 $phone = es($_POST['phoneno']);
		 $emailft = es($_POST['emailadd']);
		 $emailrest="@vit.ac.in";
		 $email =$emailft.$emailrest;
		 $password = es($_POST['passwordadd']);
		 $reg_date = date("Y-m-d H:i:s");
		 $encryptPassword = sha1($password);
		 $encrypt_id = substr(md5(rand()),0,7);
		 
		 
		
		$fetchreg=trim($regno," ");	 
		$sql_check = "SELECT `regno` FROM `users` WHERE `regno`='".$fetchreg."'";
		$qry_check=mysql_query($sql_check);
		$finalcount=mysql_num_rows($qry_check);
		if($finalcount == '1')
		{
				 $message="Please check Registration no!";
		}
		else
		{ 
					
					 $sql_con="INSERT INTO `users` SET 
					 `email`= '$email',
					 `password`= '$encryptPassword',
					 `last_level`='',
					 `status`='',
					 `registered_on`='$reg_date',
					`name`='$name' ,
					`type`='',
					`regno`= '$regno', 
					`phoneno`= '$phone',
					`status`='$encrypt_id',
					`type`='aspirant';";
					 
					$res=mysql_query($sql_con);	
					//$fetchlastid=mysql_insert_id();
					if($res)
					{  
					$linkCreation   = SITE_URL."verify/?r=".$regno."&v=".$encrypt_id;	
								
								
							$msg='<table style="width:500px;padding:0;margin:0;">
									<tr>
										<td>
												Dear '.$name.'<br /><br /> 		
												Welcome to Riddler. Thank you for sign up.Your account not yet activated.<br />
												Please <a href='.$linkCreation.'>click here</a> to activate your account.<br />					
												Your login details are given below.<br /><br /> 		
												<strong>Username:</strong>'.$name.'<br /> 		
												<strong>Password:</strong>'.$password.'<br /><br /> 		
												Yours Sincerely,<br /> 		
												Site Administrator,<br /> 		
												Riddler.com team	
										</td>
									</tr>
								</table>';
							
							$contact_email=SITE_EMAIL;
							$subject="Riddler - Sign Up - Account Verification";
							$to=$email;
							$fr="From: $contact_email";
							$headers="MIME-Version: 1.0\r\n";
							$headers.= "Content-type: text/html; charset=ISO-8859-1\r\n";
							$headers.= $fr . "\r\n"; 
							/*echo $msg;
							echo "<br>";
							echo "subject :".$subject."<br>";
							echo "To :".$email."<br>";
							echo $headers;
							exit;*/
							$val=mail($to,$subject,$msg,$headers);
							$message="Thank you for sign up.Your account not yet activated.Check Email!";		
					}
		}
}


?>

<?php require_once$_SERVER['DOCUMENT_ROOT']. '/lib/header1.php'; ?>
<title>Riddler</title>
<link href="styles/style.css" rel="stylesheet" type="text/css" />

	<script language="javascript" type="text/javascript">
		function checkingcontact()
		{
				if(document.getElementById('username').value=='')
				{
					document.getElementById('username').style.backgroundColor='#70B3E0';
					document.sampleform.username.focus();
					return false;
				}
				else
				{
					document.getElementById('username').style.backgroundColor ='';
				}

				if(document.getElementById('reg_no').value=='')
				{
					document.getElementById('reg_no').style.backgroundColor='#70B3E0';
					document.sampleform.reg_no.focus();
					return false;
				}
				else
				{
					document.getElementById('reg_no').style.backgroundColor ='';
				}
								
				if(document.getElementById('phoneno').value=='')
				{
					document.getElementById('phoneno').style.backgroundColor='#70B3E0';
					document.sampleform.phoneno.focus();
					return false;
				}
				else
				{
					document.getElementById('phoneno').style.backgroundColor ='';
				}
				
				if(document.getElementById('emailadd').value=='')
				{
					document.getElementById('emailadd').style.backgroundColor='#70B3E0';
					document.sampleform.emailadd.focus();
					return false;
				}
				else
				{
					document.getElementById('emailadd').style.backgroundColor ='';
				}		
				
				if(document.getElementById('phoneno').value=='')
				{
					document.getElementById('phoneno').style.backgroundColor='#70B3E0';
					document.sampleform.phoneno.focus();
					return false;
				}
				else
				{
					document.getElementById('phoneno').style.backgroundColor ='';
				}	
										
				if(document.getElementById('emailadd').value=='')
				{
					document.getElementById('emailadd').style.backgroundColor='#70B3E0';
					document.sampleform.emailadd.focus();
					return false;
				}
				else
				{
					document.getElementById('emailadd').style.backgroundColor ='';
				}	
				
				var checkEmail2 = document.sampleform.emailadd.value;
				if ((checkEmail2.indexOf('@') > 0))
				{
					document.getElementById('emailadd').style.backgroundColor='#70B3E0';
					document.sampleform.emailadd.focus();
					return false;
				}
				else
				{
					document.getElementById('emailadd').style.backgroundColor ='';
				}
				 if(document.getElementById('passwordadd').value=='')
				{
					document.getElementById('passwordadd').style.backgroundColor='#70B3E0';
					document.sampleform.passwordadd.focus();
					return false;
				}
				else
				{
					document.getElementById('passwordadd').style.backgroundColor ='';
				}
				if(document.getElementById('passwordcon').value=='')
				{
					document.getElementById('passwordcon').style.backgroundColor='#70B3E0';
					document.sampleform.passwordadd.focus();
					return false;
				}
				else
				{
					document.getElementById('passwordcon').style.backgroundColor ='';
				}
				if(document.getElementById('passwordadd').value!=document.getElementById('passwordcon').value)
				{
					document.getElementById('passwordcon').style.backgroundColor='#70B3E0';
					document.sampleform.passwordcon.focus();
					return false;
				}
				else
				{
					document.getElementById('passwordcon').style.backgroundColor ='';
				}
								
		}
	</script>	

<?php require_once$_SERVER['DOCUMENT_ROOT']. '/lib/header2.php'; ?>
<table width="780" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  
  <tr>
        <td width="65%" valign="top"><?php include("reg_body.php");?></td>
        </tr>
</table>

<?php require_once$_SERVER['DOCUMENT_ROOT']. '/lib/footer.php'; ?>
