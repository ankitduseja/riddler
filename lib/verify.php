<?php
if(isset($_GET['r']) && isset($_GET['r'])) {
	$r=es($_GET['r']);
	$v=es($_GET['v']);
	$q="select * from `users` where `regno`='$r' AND `status`='$v' limit 1;";
	$res=mysql_query($q) or die("Error 1");
	if($res)
	{
		$q2="update `users` set `status`='verified' where regno='$r';";
		$res2=mysql_query($q2) or die("Error 2");
		if($res2) {
			header("Location: /login/");
		}
	}
} else {
	if(isset($_SESSION['login_status'])) {
	$userid=$_SESSION['login_status'];
	?>
    <?php require_once $_SERVER['DOCUMENT_ROOT']. '/lib/header1.php'; ?>
    <title>Riddler - Verify</title>
    <?php require_once $_SERVER['DOCUMENT_ROOT']. '/lib/header2.php'; ?>
    <form action="/verify/" method="get">
    <input type="hidden" name="r" value="<?php echo $userid; ?>"/>
    <input type="text" name="v"/>
    <input type="submit"/>
    </form>
    <?php require_once $_SERVER['DOCUMENT_ROOT']. '/lib/footer.php'; ?>
    <?php
	} else {
		header("Location: /login/");
	}
}

?>