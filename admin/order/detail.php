<?php
	$title = 'Thông Tin Chi Tiết Đơn Hàng';
	$baseUrl = '../';
	require_once('../layouts/header.php');

	$orderId = getGet('id');

	$sql = "select Order_Details.*, Product.title, Product.thumbnail from Order_Details left join Product on Product.id = Order_Details.product_id where Order_Details.order_id = $orderId";
	$data = executeResult($sql);

	$sql = "select * from Orders where id = $orderId";
	$orderItem = executeResult($sql, true);
?>

<div class="row" style="margin-top: 20px;">
	<div class="col-md-12">
		<h3>Chi Tiết Đơn Hàng</h3>
	</div>
	<div class="col-md-8 table-responsive">
		<table class="table table-sm table-hover" style="margin-top: 20px;">
			<thead>
				<tr>
					<th style="text-align: center">STT</th>
					<th>Ảnh minh họa</th>
					<th>Tên Sản Phẩm</th>
					<th>Giá</th>
					<th>Số Lượng</th>
					<th>Tổng Giá</th>
				</tr>
			</thead>
			<tbody>
<?php
	$index = 0;
	foreach($data as $item) {
		echo '<tr>
					<th style="text-align: center">'.(++$index).'</th>
					<td><img src="'.fixUrl($item['thumbnail']).'" style="height: 160px; width: 160px;"/></td>
					<td>'.$item['title'].'</td>
					<td>'.$item['price'].'</td>
					<td>'.$item['num'].'</td>
					<td>'.$item['total_money'].'</td>
				</tr>';
	}
?>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<th>Tổng Tiền</th>
					<th><?=$orderItem['total_money']?></th>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="col-md-4">
		<table class="table table-sm table-hover" style="margin-top: 20px;">
			<tr>
				<th>Họ và Tên: </th>
				<td><?=$orderItem['fullname']?></td>
			</tr>
			<tr>
				<th>Email: </th>
				<td><?=$orderItem['email']?></td>
			</tr>
			<tr>
				<th>Địa Chỉ: </th>
				<td><?=$orderItem['address']?></td>
			</tr>
			<tr>
				<th>SĐT: </th>
				<td><?=$orderItem['phone_number']?></td>
			</tr>
		</table>
	</div>
</div>
<?php
	require_once('../layouts/footer.php');
?>