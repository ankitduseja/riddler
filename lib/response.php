<?php
if(isset($_SESSION['login_status'])) {
		$r=$_SESSION['login_status'];
		$q="select * from `users` where `regno`='$r'";
		$res=mysql_query($q) or die("error 1");
		if($res) {
			$user=mysql_fetch_array($res);
			$level = $user['last_level'];
			if ($level==0)
			{ $level=1; }
			$q2="select * from `questions` where `level`='$level'";
			$res2=mysql_query($q2)  or die("error 2");
			if($res2) {
				$ques=mysql_fetch_array($res2);
				$ques_type=$ques['type'];
				$ques_ans=$ques['answer'];
				$user_ans=$_POST['ans'];
				//echo ">".$ques_ans."<>".$user_ans."<".$level;
				$dt=date("Y-m-d H:i:s");
				if($ques_ans==$user_ans) {
					//update database
					$q2="update `users` set `last_level`='".++$level."',`last_level_time`='".$dt."' where regno='$r';";
					echo $q2;
					$res2=mysql_query($q2) or die("<h2>Cannot update level</h2>");
					if($res2) {
						//success updating
					}
				} 
			}
		}
		header("Location: /question/");
} else
header("Location: /login/");
?>