<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/lib/functions.php';
require_once $_SERVER['DOCUMENT_ROOT']. '/lib/globals.php';
require_once $_SERVER['DOCUMENT_ROOT']. '/lib/connection.php';
//require_once $_SERVER['DOCUMENT_ROOT']. '/lib/session.php';
//$sess = new SessionManager();
session_start();
?>
<?php
$vs_curDirURL=substr($_SERVER["REQUEST_URI"],0,strrpos($_SERVER["REQUEST_URI"],"/")+1);
switch($vs_curDirURL)
{
case '/':
case '/index.php':
case '/index.html':
require_once $_SERVER['DOCUMENT_ROOT']. '/lib/index.php';
break;
case '/question/':
case '/question':
require_once $_SERVER['DOCUMENT_ROOT']. '/lib/question.php';
break;
case '/response/':
case '/response':
require_once $_SERVER['DOCUMENT_ROOT']. '/lib/response.php';
break;
case '/answer/':
case '/answer':
require_once $_SERVER['DOCUMENT_ROOT']. '/lib/style.php';
break;
case '/register/':
case '/register':
require_once $_SERVER['DOCUMENT_ROOT']. '/lib/register.php';
break;
case '/login/':
case '/login':
require_once $_SERVER['DOCUMENT_ROOT']. '/lib/login.php';
break;
case '/logout/':
case '/logout':
require_once $_SERVER['DOCUMENT_ROOT']. '/lib/logout.php';
break;
case '/scores/':
case '/scores':
require_once $_SERVER['DOCUMENT_ROOT']. '/lib/scores.php';
break;
case '/verify/':
case '/verify':
require_once $_SERVER['DOCUMENT_ROOT']. '/lib/verify.php';
break;
case '/404.php':
default:
require_once $_SERVER['DOCUMENT_ROOT']. '/lib/404.php';
break;
}
?> 