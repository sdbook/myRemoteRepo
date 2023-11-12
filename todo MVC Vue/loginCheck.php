<?php

$act=$_REQUEST['act'];
switch ($act) {
case "login":
	$id=$_REQUEST['id'];
	$pwd=$_REQUEST['pwd'];
	//verify
	if ($id=='1' && $pwd=='2') {
		setcookie('loginRole',"1");
	} else {
		setcookie('loginRole',"0");
	}
	return;
default:
}

?>