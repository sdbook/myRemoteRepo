<?php
require("userModel.php");

$act=$_REQUEST['act'];
switch ($act) {
case "login":
	$id=$_REQUEST['id'];
	$pwd=$_REQUEST['pwd'];
	//verify with DB

	$role = login($id,$pwd);
	setcookie('loginRole',$role);
	//setcookie('loginRole',$role,httponly:true); //another way to restrict the cookie visibility
	$msg=[
		"msg" => "OK",
		"role" => $role
	];
	echo json_encode($msg);
	return;
	break;
case 'showInfo':
	//檢查是否已登入
	$loginRole=$_COOKIE['loginRole'];
	if ($loginRole>0) {
		$msg="You've logged in. Your role is $loginRole.";
	} else {
		$msg="You need login to use this funtion.";
	}
	echo $msg;
	break;
case 'logout':
	setcookie('loginRole',0,httponly:true);
	break;
default:
}

?>