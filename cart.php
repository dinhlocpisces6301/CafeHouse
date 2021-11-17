<?php 
require_once('layouts/header.php');
?>
<div class="container">
	<div class="row">
		<table class="table table-bordered" style="background-color: #fff;">
			<tr>
				<th style="text-align: center;">STT</th>
				<th>Ảnh Minh Họa</th>
				<th>Sản Phẩm</th>
				<th>Giá</th>
				<th>Số Lượng</th>
				<th>Tổng Cộng</th>
				<th></th>
			</tr>
<?php
if(!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = [];
}
$index = 0;
foreach($_SESSION['cart'] as $item) {
	echo '<tr>
			<td style="text-align: center;">'.(++$index).'</td>
			<td><img src="'.$item['thumbnail'].'" style="height: 80px; width: 80px;"/></td>
			<td>'.$item['title'].'</td>
			<td>'.number_format($item['discount']).' VND</td>

			<td style="display: flex">
				<button class="btn btn-light" style="border: solid #e0dede 1px;" onclick="addMoreCart('.$item['id'].', -1)">-</button>
				<input type="number" id="num_'.$item['id'].'" value="'.$item['num'].'" class="form-control" style="width: 90px; border-radius: 0px" onchange="fixCartNum('.$item['id'].')"/>
				<button class="btn btn-light" style="border: solid #e0dede 1px;" onclick="addMoreCart('.$item['id'].', 1)">+</button>
			</td>
			
			<td>'.number_format($item['discount'] * $item['num']).' VND</td>
			<td>
				<center>
					<button class="btn btn-danger" onclick="updateCart('.$item['id'].', 0)">Xoá</button>
				</center>
			</td>
		</tr>';
}
?>
		</table>
		<a href="checkout.php"><button class="btn btn-success">TIẾP TỤC THANH TOÁN</button></a>
	</div>
</div>
<script type="text/javascript">
	function addMoreCart(id, delta) {
		num = parseInt($('#num_' + id).val())
		num += delta
		$('#num_' + id).val(num)

		updateCart(id, num)
	}

	function fixCartNum(id) {
		$('#num_' + id).val(Math.abs($('#num_' + id).val()))

		updateCart(id, $('#num_' + id).val())
	}

	function updateCart(productId, num) {
		$.post('api/ajax_request.php', {
			'action': 'update_cart',
			'id': productId,
			'num': num
		}, function(data) {
			location.reload()
		})
	}
</script>

<?php
require_once('layouts/footer.php');
?>