<?php 
require_once('layouts/header.php');

$category_id = getGet('id');

if($category_id == null || $category_id == '') {
	$sql = "select * from product";
}
else {
	$sql = "select * from product where category_id = $category_id";
}
$total_record = executeResult($sql);
$total_records = 0;

foreach($total_record as $item)
	$total_records += 1;

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 12;

$total_page = ceil($total_records / $limit);

// Giới hạn current_page trong khoảng 1 đến total_page
if ($current_page > $total_page){
	$current_page = $total_page;
}
else if ($current_page < 1){
	$current_page = 1;
}

// Tìm Start
$start = ($current_page - 1) * $limit;

if($category_id == null || $category_id == '') {
	$sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id order by Product.updated_at desc limit $start, $limit";
} else {
	$sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id where Product.category_id = $category_id order by Product.updated_at desc limit $start, $limit";
}

$lastestItems = executeResult($sql);

?>

<div class="container">
    <div class="row">
        <?php
		foreach($lastestItems as $item) {
			echo '<div class="col-md-3 col-6 product-item">
					<a href="detail.php?id='.$item['id'].'"><img src="'.$item['thumbnail'].'" style="width: 100%; height: 220px;"></a>
					<p style="font-weight: bold;">Loại: '.$item['category_name'].'</p>
					<p style="font-weight: bold;">'.$item['title'].'</p>
					<p style="color: red; font-weight: bold;">Giá: '.number_format($item['discount']).' VND</p>
					<p><button class="btn btn-success" onclick="addCart('.$item['id'].', 1)" style="width: 100%; border-radius: 0px;"><i class="bi bi-cart-plus-fill"></i> Thêm giỏ hàng</button></p>
				</div>';
		}
	?>
    </div>
</div>

<div id="pagination">
    <?php 
		echo '<ul class="pagination">';
            if ($current_page > 1 && $total_page > 1){
                echo '<li>
					<a href="category.php?id='.$category_id.'&&page='.($current_page-1).'"> Prev </a>
				</li>';
            }
			else{
				echo '<li>
					<span> Prev </span>
				</li>';
			}
 
            for ($i = 1; $i <= $total_page; $i++){
                if ($i == $current_page){
                    echo '<li>
						<span>'.$i.'</span>
					</li>';
                }
                else{
                    echo '<li>
						<a href="category.php?id='.$category_id.'&&page='.$i.'"> '.$i.' </a>
					</li>';
                }
            }
 
            if ($current_page < $total_page && $total_page > 1){
                echo '<li>
					<a href="category.php?id='.$category_id.'&&page='.($current_page+1).'"> Next </a>
				</li>';
            }
			else
			{
				echo '<li>
					<span>Next</span>
				</li>';
			}
		echo '</ul>';
    ?>
</div>

<?php
require_once('layouts/footer.php');
?>