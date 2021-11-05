<?php
	session_start();
	require_once('utils/utility.php');
	require_once('database/dbhelper.php');

	$sql = "select * from Category";
	$menuItems = executeResult($sql);
    
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    $count = 0;
    // var_dump($_SESSION['cart']);
    foreach($_SESSION['cart'] as $item) {
        $count += $item['num'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Trang Chủ</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="assets/font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"/>
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <title>THE CAFÉ HOUSE</title>
</head>

<body>
    <div id="main">
        <div id="header">
            <div id="header-logo"><a href="index.php">HOLA MY FRIEND</a></div>
            <ul id="nav">
                <li><a href="">Tin Tức</a></li>
                <li>
                    <a href="category.php">Cửa hàng</a>
                    <ul class="sub-nav">
                        <?php
	  	                    foreach($menuItems as $item) {
	  		                echo '<li class="nav-item">
				                <a class="nav-link" href="category.php?id='.$item['id'].'">'.$item['name'].'</a>
				            </li>';
	  	                    }
	                    ?>
                    </ul>
                </li>
                <li>
                    <a href="">Khuyến mãi</a>
                </li>
                <li><a href="contact.php">Phản hồi</a></li>

                <li id="nav-btn-shopping">
                    <span id="cart_count"><?=$count?></span>
                    <a href="cart.php">
                        <i class="ti-shopping-cart"></i>
                    </a>
                </li>

                <!-- <li id="nav-btn-user">
                    <a href="">
                        <i class="ti-user"></i>
                    </a>
                    <ul class="sub-nav">
                        <li><a href="">Đăng nhập</a></li>
                        <li><a href="">Đăng kí</a></li>
                    </ul>
                </li> -->
            </ul>
        </div>


<script type="text/javascript">
function addCart(productId, num) {
    $.post('api/ajax_request.php', {
        'action': 'cart',
        'id': productId,
        'num': num
    }, function(data) {
        location.reload()
    })
}
</script>
<!-- Cart start -->