<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
/*
 * Đang phát triển
 */
  
$vnp_TmnCode = "AYK62054"; //Website ID in VNPAY System
$vnp_HashSecret = "HHWKZMJYRBJXDVLENXCEYKDZJXSINQHG"; //Secret key
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost:8080/ShopTraiCay/orderdetail.php";
$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
//Config input format
//Expire
$startTime = date("YmdHis");
$expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));
