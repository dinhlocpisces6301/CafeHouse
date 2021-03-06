<?php 
require_once('layouts/header.php');
?>
<div class="container">
	<form method="post" onsubmit="return completeCheckout();">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
			  <input required="true" type="text" class="form-control" id="usr" name="fullname" placeholder="Nhập Họ Tên">
			</div>
			<div class="form-group">
			  <input required="true" type="email" class="form-control" id="email" name="email" placeholder="Nhập Email">
			</div>
			<div class="form-group">
			  <input required="true" type="tel" class="form-control" id="phone" name="phone" placeholder="Nhập SĐT">
			</div>
			<div class="form-group">
			  <input required="true" type="text" class="form-control" id="address" name="address" placeholder="Nhập Địa Chỉ">
			</div>
			<div class="form-group">
			  <label for="pwd">Nội dung:</label>
			  <textarea class="form-control" rows="8"></textarea>
			</div>
		</div>
		<div class="col-md-6">
			<table class="table table-bordered border-primary" style="background-color: #fff;">
			<tr>
				<th>STT</th>
				<th>Sản Phẩm</th>
				<th>Giá</th>
				<th>Số Lượng</th>
				<th>Tổng Giá</th>
			</tr>
<?php
if(!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = [];
}
$sum = 0;
$index = 0;
foreach($_SESSION['cart'] as $item) {
	echo '<tr>
			<td>'.(++$index).'</td>
			<td>'.$item['title'].'</td>
			<td>'.number_format($item['discount']).' VND</td>
			<td>
				'.$item['num'].'
			</td>
			<td>'.number_format($item['discount'] * $item['num']).' VND</td>
		</tr>';
		$sum += $item['discount'] * $item['num'];
}
	echo '<tr>
			<td colspan="5" style="font-size:24px;">Tiền phải thanh toán: '.number_format($sum).' VND</td>
		</tr>'
?>
		</table>
		<a href="checkout.php"><button class="btn btn-success" style="width: 100%;">THANH TOÁN</button></a>
		</div>
	</div>
</form>
</div>

<script type="text/javascript">
	function completeCheckout() {
		$.post('api/ajax_request.php', {
			'action': 'checkout',
			'fullname': $('[name=fullname]').val(),
			'email': $('[name=email]').val(),
			'phone_number': $('[name=phone]').val(),
			'address': $('[name=address]').val(),
			'note': $('[name=note]').val()
		}, function() {
			window.open('complete.php', '_self');
		})

		return false;
	}
</script>
<?php
require_once('layouts/footer.php');
?>