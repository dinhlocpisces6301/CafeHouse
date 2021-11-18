<?php
if(!empty($_POST)) {
	$code = getPost("code");
	$created_at = date('Y-m-d H:s:i');
	$expired = getPost("expired");
	$content = getPost("content");
	$sql = "insert into sales_code(code, created_at, expired_at, content) values ('$code', '$created_at', '$expired', '$content')";
	execute($sql);
}
?>