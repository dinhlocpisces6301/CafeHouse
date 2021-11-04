<?php
session_start();
require_once('../../utils/utility.php');
require_once('../../database/dbhelper.php');

$user = getUserToken();
if($user == null) {
	die();
}

if(!empty($_POST)) {
	$action = getPost('action');

	switch ($action) {
		case 'delete':
			deleteUser();
			break;
	}
}

function deleteUser() {
	$id = getPost('id');
	$updated_at = date("Y-m-d H:i:s");
	$sql = "delete from User where id = $id";
	execute($sql);
}
?>