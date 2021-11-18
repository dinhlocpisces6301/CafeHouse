<?php
  session_start();
  require_once($baseUrl.'../utils/utility.php');
  require_once($baseUrl.'../database/dbhelper.php');

  $user = getUserToken();
  if($user == null) {
    header('Location: '.$baseUrl.'authen/login.php');
    die();
  }
?>

<!DOCTYPE html>
<html>

<head>
  <title><?=$title?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
	<link rel="icon" type="image/png" href="https://pbs.twimg.com/profile_images/499551209078784001/DxgiS6We_400x400.png" />

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="<?=$baseUrl?>../assets/css/dashboard.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>

<body>
  <nav class="navbar navbar-dark fixed-top bg-primary flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"
      style="color: rgb(255, 196, 0); font-family: Showcard Gothic, Arial, Helvetica, sans-serif; font-size: 1.5rem; font-weight: bold;">Hola
      My Friends</a>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="<?=$baseUrl?>authen/logout.php">
          <i class="bi bi-box-arrow-right" aria-hidden="true" style="color: #000; font-size: 2rem;"></i>
        </a>
      </li>
    </ul>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">

            <li class="nav-item">
              <a class="nav-link" href="<?=$baseUrl?>">
                <i class="bi bi-house-fill"></i>
                -- Dashboard
              </a>
            </li>

          <?php
            if($user['role_id']==1){
              echo '<li class="nav-item ">
              <a class="nav-link" href="'.$baseUrl.'category">
              <i class="bi bi-folder"></i>
                -- Danh Mục Sản Phẩm
              </a>
              </li>';}
            
            if($user['role_id']==1){
              echo '<li class="nav-item">
              <a class="nav-link" href="'.$baseUrl.'product">
              <i class="bi bi-file-earmark-text"></i>
                -- Quản Lý Sản Phẩm
              </a>
              </li>';}
          ?>

            <li class="nav-item">
              <a class="nav-link" href="<?=$baseUrl?>order">
                <i class="bi bi-minecart"></i>
                -- Quản Lý Đơn Hàng
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?=$baseUrl?>feedback">
                <i class="bi bi-question-circle-fill"></i>
                -- Quản Lý Phản Hồi
              </a>
            </li>

          <?php
            if($user['role_id']==1){
              echo '<li class="nav-item">
                <a class="nav-link" href="'.$baseUrl.'user">
                  <i class="bi bi-people-fill"></i>
                  -- Quản Lý Người Dùng
                </a>
                </li>';}
            
            if($user['role_id']==1){
              echo '<li class="nav-item">
                <a class="nav-link" href="'.$baseUrl.'coupon">
                  <i class="bi bi-square-fill"></i>
                  -- Quản Lý Mã Ưu Đãi
                </a>
                </li>';}
          ?>
          </ul>
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <!-- hien thi tung chuc nang cua trang quan tri START-->