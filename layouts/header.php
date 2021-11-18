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

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="assets/font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
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
                <li><a href="news.php">Tin Tức</a></li>
                <li>
                    <a href="category.php">Cửa hàng</a>
                    <ul class="sub-nav">
                        <?php
	  	                    foreach($menuItems as $item) {
	  		                echo '<li>
				                    <a href="category.php?id='.$item['id'].'">'.$item['name'].'</a>
				                </li>';
	  	                    }
	                    ?>
                    </ul>
                </li>
                <li>
                    <a href="">Khuyến mãi</a>
                    <ul class="sub-nav sales-code">
                        <p style="text-align: center; color: red; font-size: 18px;"> 
                            Lưu ý! <br />
                            Chỉ áp dụng khi thanh toán online
                        </p>
                        <?php
                            $sql = "select * from Sales_code";
                        	$salescode = executeResult($sql);
	  	                    foreach($salescode as $item) {
                                $date = new DateTime($item['created_at']);
                                $expired = new DateTime($item['expired_at']);
                                if($expired->format('d-m-Y') >= date("d-m-Y"))
                                    echo '
                                        <li>
                                            <p>
                                                Mã giảm giá: '.$item['code'].' </br>
                                                Từ '.$date->format('d-m').' đến '.$expired->format('d-m-Y').' </br>
                                                '.$item['content'].'
                                            </p>
                                        </li>';
	  	                    }
	                    ?>

                    </ul>
                </li>

                <li>
                    <a href="contact.php">Phản hồi</a>
                </li>

            </ul>

            <div id="nav-btn-shopping">
                <span id="cart_count"><?=$count?></span>
                <a href="cart.php">
                    <i class="ti-shopping-cart"></i>
                </a>
            </div>

            <div id="menu-btn">
                <i class="ti-menu"></i>
            </div>
        </div>


        <script type="text/javascript">
            function addCart(productId, num) {
                $.post('api/ajax_request.php', {
                    'action': 'cart',
                    'id': productId,
                    'num': num
                }, function (data) {
                    location.reload()
                })
            }
        </script>
        <!-- Cart start -->

        <script>
            var header = document.getElementById('header');
            var mobileMenu = document.getElementById('menu-btn');
            var headerHeight = header.clientHeight;

            // Đóng mở menu mobile
            mobileMenu.onclick = function () {
                // console.log(header.clientHeight);
                var isClosed = header.clientHeight === headerHeight;
                if (isClosed) {
                    header.style.height = '420px';
                } else {
                    header.style.height = null;
                }
            }
        </script>