<?php 
require_once('layouts/header.php');

$productId = getGet('id');
$sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id where Product.id = $productId";
$product = executeResult($sql, true);

$category_id = $product['category_id'];
$sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id where Product.category_id = $category_id order by Product.updated_at desc limit 0,4";

$lastestItems = executeResult($sql);
?>

<div class="container">
	<ul class="breadcrumb">
		<li><a href="index.php">Trang Chủ</a></li>
		<li> / <a href="category.php">Cửa Hàng</a></li>
		<li> / <a href="category.php?id=<?=$product['category_id']?>"><?=$product['category_name']?></a></li>
		<li> / <?=$product['title']?></li>
	</ul>
	<div class="row">
		<div class="col-md-6">
			<center>
				<img src="<?=$product['thumbnail']?>" style="width: 400px; height: 400px;">
			</center>
		</div>

		<div class="col-md-6">
			<h2><?=$product['title']?></h2>

			<p style="font-size: 30px; color: red; margin-top: 15px; margin-bottom: 15px;">
				<?=number_format($product['discount'])?> VND
			</p>
			<p style="font-size: 15px; color: grey; margin-top: 15px; margin-bottom: 15px;">
				<del><?=number_format($product['price'])?> VND</del>
			</p>
			<div style="display: flex;">
				<button class="btn btn-light" style="border: solid #e0dede 1px; border-radius: 0px;" onclick="addMoreCart(-1)">-</button>
				<input type="number" name="num" class="form-control" step="1" value="1" style="max-width: 60px;border: solid #e0dede 1px; border-radius: 0px; text-align: center;" onchange="fixCartNum()">
				<button class="btn btn-light" style="border: solid #e0dede 1px; border-radius: 0px;" onclick="addMoreCart(1)">+</button>
			</div>
			<button class="btn btn-success" style="margin-top: 20px; width: 50%; border-radius: 0px; font-size: 16px;" onclick="addCart(<?=$product['id']?>, $('[name=num]').val())">
				<i class="bi bi-cart-plus-fill"></i> THÊM VÀO GIỎ HÀNG
			</button>
			<!-- <button class="btn btn-secondary" style="margin-top: 20px; width: 50%; border-radius: 0px; font-size: 16px; background-color: #edebeb; border: solid #edebeb 1px; color: black;">
				<i class="bi bi-bookmark-heart-fill"></i> THÊM MỤC YÊU THÍCH
			</button> -->
		</div>
		<div class="col-md-12" style="margin-top: 20px; margin-bottom: 30px;">
			<h3>Chi Tiết Sản Phẩm</h3>
			<?=$product['description']?>
		</div>
	</div>
</div>
<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
	<h1 style="text-align: center; margin-top: 20px; margin-bottom: 20px;">SẢN PHẨM LIÊN QUAN</h1>
	<div class="row">
	<?php
		foreach($lastestItems as $item) {
			echo '<div class="col-md-3 col-6 product-item">
					<a href="detail.php?id='.$item['id'].'"><img src="'.$item['thumbnail'].'" style="width: 100%; height: 220px;"></a>
					<p style="font-weight: bold;">'.$item['category_name'].'</p>
					<a href="detail.php?id='.$item['id'].'"><p style="font-weight: bold;">'.$item['title'].'</p></a>
					<p style="color: red; font-weight: bold;">'.number_format($item['discount']).' VND</p>
					<p><button class="btn btn-success" onclick="addCart('.$item['id'].', 1)" style="width: 100%; border-radius: 0px;"><i class="bi bi-cart-plus-fill"></i> Thêm giỏ hàng</button></p>
				</div>';
		}
	?>
	</div>
</div>

<script type="text/javascript">
	function addMoreCart(delta) {
		num = parseInt($('[name=num]').val())
		num += delta
		if(num < 1) num = 1;
		$('[name=num]').val(num)
	}

	function fixCartNum() {
		$('[name=num]').val(Math.abs($('[name=num]').val()))
	}
</script>
<?php
require_once('layouts/footer.php');
?>