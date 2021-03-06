<?php 
require_once('layouts/header.php');

$sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id where Product.deleted = 0 order by Product.updated_at desc limit 0,8";
$lastestItems = executeResult($sql);
?>
<!-- banner -->
<div id="demo" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="assets/photos/banner1.png" alt="">
        </div>
        <div class="carousel-item">
            <img src="assets/photos/banner2.jpg" alt="">
        </div>
        <div class="carousel-item">
            <img src="assets/photos/banner3.jpg" alt="">
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>
<!-- banner stop -->
<!-- test -->

<div class="container">
    <br/> <br/>
    <h1 style="text-align: center; margin-top: 20px; margin-bottom: 20px;">SẢN PHẨM MỚI NHẤT</h1>
    <div class="row">
        <?php
		foreach($lastestItems as $item) {
			echo '<div class="col-md-3 col-6 product-item" style="box-shadow: inset 0 0 3em rgba(0,0,0,0.1), 0 0 0 2px rgb(255,255,255), 0.3em 0.3em 1em rgba(0,0,0,0.3);">
					<a href="detail.php?id='.$item['id'].'"><img src="'.$item['thumbnail'].'" style="width: 100%; height: 200px;"></a>
					<p style="font-weight: bold;"> Loại: '.$item['category_name'].'</p>
					<p style="font-weight: bold;">'.$item['title'].'</p>
					<p style="color: red; font-weight: bold;">Giá: '.number_format($item['discount']).' VND</p>
					<p><button class="btn btn-success" onclick="addCart('.$item['id'].', 1)" style="width: 100%;"><i class="bi bi-cart-plus-fill"></i> Thêm giỏ hàng</button></p>
				</div>';
		}
	?>
    </div>
</div> <br/> <br/>


<!-- danh muc san pham -->
<?php
$count = 0;
foreach($menuItems as $item) {
	$sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id where Product.category_id = ".$item['id']." and Product.deleted = 0 order by Product.updated_at desc limit 0,4";
	$items = executeResult($sql);
	if($items == null || count($items) < 4) continue;
?>

<div class="container">
    <h1 style="text-align: center; margin-top: 20px; margin-bottom: 20px;"><?=$item['name']?></h1>
    <div class="row">
        <?php
            foreach($items as $pItem) {
                echo '<div class="col-md-3 col-6 product-item" style="box-shadow: inset 0 0 3em rgba(0,0,0,0.1), 0 0 0 2px rgb(255,255,255), 0.3em 0.3em 1em rgba(0,0,0,0.3);">
                <a href="detail.php?id='.$item['id'].'"><img src="'.$pItem['thumbnail'].'" style="width: 100%; height: 220px;"></a>
                <p style="font-weight: bold;">Loại: '.$pItem['category_name'].'</p>
                <p style="font-weight: bold;">'.$pItem['title'].'</p>
                <p style="color: red; font-weight: bold;">Giá: '.number_format($pItem['discount']).' VND</p>
                <p><button class="btn btn-success" onclick="addCart('.$item['id'].', 1)" style="width: 100%;"><i class="bi bi-cart-plus-fill"></i> Thêm giỏ hàng</button></p>
                </div>';
            } ?>
    </div>
</div>

<?php } ?>

<?php
require_once('layouts/footer.php');
?>