<?php
	$title = 'Dashboard Page';
	$baseUrl = '';
	require_once('layouts/header.php');
?>

<div class="row">
    <?php
		 	if($user['id']==1){
				 echo '<div class="col-md-12">
					 <center>
						 <h1>Dashboard</h1>
						 <h5>Đây là giao diện quản lí người dùng dành cho Người quản lí</h5>
					 </center>
				 </div>';
			 }

			 if($user['id']==2)
			 {
				 echo '<div class="col-md-12">
					 <center>
						 <h1>Dashboard</h1>
						 <h5>Đây là giao diện quản lí người dùng dành cho Nhân viên</h5>
					 </center>
				 </div>';
			 }
		?>
</div>

<?php
	require_once('layouts/footer.php');
?>