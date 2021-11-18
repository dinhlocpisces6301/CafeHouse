<?php
	$title = 'Quản Lý Danh Mục Sản Phẩm';
	$baseUrl = '../';
	require_once('../layouts/header.php');

	if($user['role_id']>1)
	{
		header('Location: ../');
	}

	require_once('form_save.php');

	$sql = "select * from Sales_code";
	$data = executeResult($sql);
	$count = 0;
?>

<div class="row" style="margin-top: 20px;">
	<div class="col-md-12" style="margin-bottom: 20px;">
		<h3>
			<i class="bi bi-square-fill"></i>
			Quản Lý Mã Ưu Đãi
		</h3>
	</div>
	<div class="col-md-6 table-responsive">
		<table class="table table-sm table-hover">
			<thead>
				<tr>
					<th>Mã Ưu Đãi</th>
					<th>Ngày Tạo</th>
					<th> Trạng thái</th>
					<th>Nội dung</th>
				</tr>
			</thead>
			<tbody>
	<?php
	foreach($data as $item) {
		$date = new DateTime($item['created_at']);
        $expired = new DateTime($item['expired_at']);
		echo '<tr>
				<td> '.$item['code'].' </td>
				<td> '.$date->format('d-m-Y').' </td>';

			if($expired->format('d-m-Y') >= date("d-m-Y"))
			{
				echo '<td> Còn hạn sử dụng đến hết ngày '.$expired->format('d-m-Y').' </td> ';
				$count++;
			}
			else
				echo '<td> Không còn hiệu lực </td> ';	
		echo '<td> '.$item['content'].' </td> </tr>';	
	}
		?>
			</tbody>
		</table>
	</div>
	
	<div class="col-md-4">
		<form method="post" onsubmit="return validateForm();">
			<div class="form-group">
			  <label for="usr" style="font-weight: bold;">Mã ưu đãi:</label>
			  <input required="true" type="text" class="form-control" id="code" name="code" value="" minlength="6" style="width: 300px;">
			</div>
			<div class="form-group">
			  <label for="usr" style="font-weight: bold;">Hạn sử dụng:</label>
			  <input required="true" type="date" class="form-control" id="expired" name="expired" value="" style="width: 300px;">
			</div>
			<div class="form-group">
			  <label for="usr" style="font-weight: bold;">Nội dung:</label>
			  <input required="true" type="text" class="form-control" id="content" name="content" value="" style="width: 500px;">
			</div>
			<?php
				if($count < 3)
					echo'
						<button class="btn btn-success">Lưu</button>';
				else
					echo'
						<div class="form-group">
							<label for="usr" style="font-weight: bold;">Hiện tại đang có 3 Mã ưu đãi còn hiệu lực. Không thể thêm mã.</label>
						</div>';
			?>
		</form>
	</div>
	
</div>

<?php
	require_once('../layouts/footer.php');
?>