<?php
require('todoModel.php');

$act=$_REQUEST['act'];
switch ($act) {
case "listJob":
  $jobs=getJobList();
  echo json_encode($jobs);
  return;  
case "addJob":
	$jobName=$_POST['name']; //$_GET, $_REQUEST
	$jobUrgent=$_POST['urgent'];
	$jobContent=$_POST['content'];
	//verify
	addJob($jobName,$jobUrgent,$jobContent);
	return;
case "delJob":
	$id=(int)$_REQUEST['id']; //$_GET, $_REQUEST
	//verify
	delJob($id);
	return;
case "setJobStatus":
	$id=(int)$_REQUEST['id']; //$_GET, $_REQUEST
	//verify
	setJobDone($id);
	return;
default:
  
}

?>