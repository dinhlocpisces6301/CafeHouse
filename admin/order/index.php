<?php
	$title = 'Quản Lý Đơn Hàng';
	$baseUrl = '../';
	require_once('../layouts/header.php');

	//pending, approved, cancel
	$sql = "select * from Orders order by status asc, order_date desc";
	$data = executeResult($sql);
?>

<div class="row" style="margin-top: 20px;">
	<div class="col-md-12 table-responsive">
		<h3>
			<i class="bi bi-minecart"></i>
			Quản Lý Đơn Hàng
		</h3>
		</br>
		<table class="table table-sm table-hover" style="margin-top: 20px;">
			<thead>
				<tr>
					<th style="text-align: center">STT</th>
					<th>Họ và Tên</th>
					<th>SĐT</th>
					<th>Email</th>
					<th>Địa Chỉ</th>
					<th>Nội Dung</th>
					<th>Tổng Tiền</th>
					<th>Ngày Tạo</th>
					<th style="width: 120px"></th>
				</tr>
			</thead>
			<tbody>
<?php
	$index = 0;
	foreach($data as $item) {
		$order_date = new DateTime($item['order_date']);
		echo '<tr>
					<th style="text-align: center">'.(++$index).'</th>
					<td><a href="detail.php?id='.$item['id'].'">'.$item['fullname'].'</a></td>
					<td><a href="detail.php?id='.$item['id'].'">'.$item['phone_number'].'</a></td>
					<td><a href="detail.php?id='.$item['id'].'">'.$item['email'].'</a></td>
					<td>'.$item['address'].'</td>
					<td>'.$item['note'].'</td>
					<td>'.$item['total_money'].'</td>
					<td>'.$order_date->format('d-m-Y H:i:s').'</td>
					<td style="width: 50px">';
		if($item['status'] == 0) {
			echo '
				<button onclick="changeStatus('.$item['id'].', 1)" class="btn btn-sm btn-success" style="margin-bottom: 10px;">Chốt đơn</button>
				<button onclick="changeStatus('.$item['id'].', 2)" class="btn btn-sm btn-danger">Hủy đơn</button>';
		} else if($item['status'] == 1) {
			echo '<label class="badge badge-success">Đã xử lí</label>';
		} else {
			echo '<label class="badge badge-danger">Đã hủy đơn</label>';
		}
		echo '</td>
				</tr>';
	}
?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
	function changeStatus(id, status) {
		$.post('form_api.php', {
			'id': id,
			'status': status,
			'action': 'update_status'
		}, function(data) {
			location.reload()
		})
	}
</script>

<?php
	require_once('../layouts/footer.php');
?>