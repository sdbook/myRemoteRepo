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
case 'showInfo':
	//檢查是否已登入
	$loginRole=$_COOKIE['loginRole'];
	if ($loginRole>'0') {
		$msg="You've logged in. Your role is $loginRole.";
	} else {
		$msg="You need login to use this funtion.";
	}
	echo $msg;
default:
}

?>