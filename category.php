<?php 
require_once('layouts/header.php');

$category_id = getGet('id');

if($category_id == null || $category_id == '') {
	$sql = "select * from product where product.deleted = 0";
}
else {
	$sql = "select * from category where id = $category_id";
	$category = executeResult($sql, true);

	$sql = "select * from product where category_id = $category_id and Product.deleted = 0";
}
$total_record = executeResult($sql);
$total_records = count($total_record);

if($total_records == 0)
{
	echo'
	<div class="container">
	<br/>
		<ul class="breadcrumb">
			<li>
				<a href="index.php">Trang Chủ</a>
			</li>

			<li>/ 
	';
	if($category_id != null || $category_id != '')
		echo '<a href="category.php">Cửa Hàng</a>';
	else
		echo 'Cửa Hàng';

	echo'
			</li>

			<li>/
				Doanh mục hiện không có sản phẩm!
			</li>
		</ul>
	</div>';

	require_once('layouts/footer.php');
	return;
}
//TÌM LIMIT VÀ CURRENT_PAGE
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 12;
// TÍNH TOÁN TOTAL_PAGE VÀ START
// tổng số trang
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
//TRUY VẤN LẤY DANH SÁCH TIN TỨC	
if($category_id == null || $category_id == '') {
	$sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id where Product.deleted = 0 order by Product.updated_at desc limit $start, $limit";
} else {
	$sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id where Product.category_id = $category_id and Product.deleted = 0 order by Product.updated_at desc limit $start, $limit";
}

$lastestItems = executeResult($sql);

?>



<div class="container">
	<br/>
		<ul class="breadcrumb">
			<li>
				<a href="index.php">Trang Chủ</a>
			</li>

			<li>/ 
				<?php
					if($category_id != null || $category_id != '')
						echo '<a href="category.php">Cửa Hàng</a>';
					else
					echo 'Cửa Hàng';
				?>	
			</li>

			<li>/ 
				<?php
					if($category_id != null || $category_id != '')
						echo ''.$category['name'].'';
				?>
			</li>
		</ul>
    <div class="row">
        <?php
		foreach($lastestItems as $item) {
			echo '<div class="col-md-3 col-6 product-item" style="box-shadow: inset 0 0 3em rgba(0,0,0,0.1), 0 0 0 2px rgb(255,255,255), 0.3em 0.3em 1em rgba(0,0,0,0.3);">
					<a href="detail.php?id='.$item['id'].'"><img src="'.$item['thumbnail'].'" style="width: 100%; height: 220px;"></a>
					<p style="font-weight: bold;">Loại: '.$item['category_name'].'</p>
					<p style="font-weight: bold;">'.$item['title'].'</p>
					<p style="color: red; font-weight: bold;">Giá: '.number_format($item['discount']).' VND</p>
					<p><button class="btn btn-success" onclick="addCart('.$item['id'].', 1)" style="width: 100%;"><i class="bi bi-cart-plus-fill"></i> Thêm giỏ hàng</button></p>
				</div>';
		}
	?>
    </div>
</div>

<div id="pagination">
    <?php 
		echo '<ul class="pagination">';
		// nếu current_page > 1 và total_page > 1 mới hiển thị nút Trước
            if ($current_page > 1 && $total_page > 1){
                echo '<li>
					<a href="category.php?id='.$category_id.'&&page='.($current_page-1).'"> Trước </a>
				</li>';
            }
			// Nếu là trang hiện tại thì hiển thị thẻ span
    		// ngược lại hiển thị thẻ a
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
			// nếu current_page < $total_page và total_page > 1 mới hiển thị nút Sau
            if ($current_page < $total_page && $total_page > 1){
                echo '<li>
					<a href="category.php?id='.$category_id.'&&page='.($current_page+1).'"> Sau </a>
				</li>';
            }
		echo '</ul>';
    ?>
</div>

<?php
require_once('layouts/footer.php');
?>
