<?php
if(isset($_SESSION['login_status'])) {
		$r=$_SESSION['login_status'];
		$q="select * from `users` where `regno`='$r'";
		$res=mysql_query($q) or die("error 1");
		if($res) {
			$user=mysql_fetch_array($res);
			$level = $user['last_level'];
			if ($level==0)
			$level=1;
			$q2="select * from `questions` where `level`='$level'";
			$res2=mysql_query($q2)  or die("error 2");
			if($res2) {
				$ques=mysql_fetch_array($res2);
				$ques_type=$ques['type'];
				$ques_head=$ques['q_head'];
				$ques_body=$ques['q_body'];
			}
		}
?>

    <?php require_once $_SERVER['DOCUMENT_ROOT']. '/lib/header1.php'; ?>
    <title>Riddler - Question</title>
    <?php
	echo $ques_head;
	?>
    <?php require_once $_SERVER['DOCUMENT_ROOT']. '/lib/header2.php'; ?>
    
    <?php
	echo $ques_body;
	?>
    <div style="position:absolute; z-index:100; right:0px; bottom:0px; color:#fff; background:#000;">Answer: 
    <form action="/response/" method="post">
    <input type="text" name="ans"/>
    <input type="submit"/>
    </form>
    </div>
    <?php require_once $_SERVER['DOCUMENT_ROOT']. '/lib/footer.php'; ?>
<?php
} else
header("Location: /login/");
?>