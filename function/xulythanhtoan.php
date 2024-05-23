<?php
session_start();
require_once('../config/dbhelper.php');
require('../mail/sendmail.php');
require('../Carbon/autoload.php');
// require_once('config_vnpay.php');

// use Carbon\Carbon;
date_default_timezone_set('Asia/Ho_Chi_Minh');
$currentDate = date('Y-m-d'); 
$success = array();
if (isset($_SESSION['dangky'])) {
	if (isset($_SESSION['cart'])) {
		try {
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$data = json_decode(file_get_contents("php://input"), true);
				$now = $currentDate;
				$name = $_SESSION['id_khachhang'];
				$code_order = rand(0, 9999);
				$order_payment = $data['payment'];
				$payment_date = $data['paymentdate'];
				$payment_cvv = $data['paymentcvv'];
				//lấy id thông tin giao hàng
				$id_dangky =  $_SESSION['id_khachhang'];
				$con = mysqli_connect("localhost", "root", "", "eshop");
				$sql_getvanchuyen = mysqli_query($con, "SELECT * FROM shipping WHERE id_dangky='$id_dangky' LIMIT 1");
				$row_getvanchuyen = mysqli_fetch_array($sql_getvanchuyen);
				$id_shipping = $row_getvanchuyen['id_shipping'];
				$tongtien = 0;
				foreach ($_SESSION['cart'] as $key => $value) {
					$thanhtien = $value['soluong'] * $value['price'];
					$tongtien = $tongtien + $thanhtien;
				}

				if ($order_payment != null) {
					//insert order
					$_SESSION['code_cart'] = $code_order;
					$con = mysqli_connect("localhost", "root", "", "eshop");
					$insert_cart = mysqli_query($con, "INSERT INTO orders(id_khachhang,code_order,status,order_date,order_payment,payment_date,payment_cvv,order_shipping) 
				VALUE ('" . $name . "','" . $code_order . "',1,'" . $now . "','" . $order_payment . "','" . $payment_date . "','" . $payment_cvv . "','" . $id_shipping . "')");
					foreach ($_SESSION['cart'] as $key => $value) {
						$id_sanpham = $value['id'];
						$soluong = $value['soluong'];
						$insert_order_details = "INSERT INTO order_detail(product_id,code_order,soluongmua) VALUE('" . $id_sanpham . "','" . $code_order . "','" . $soluong . "')";
						mysqli_query($con, $insert_order_details);
					}
					$success = array(
						'result' => true
					);
					echo json_encode($success);
				}
			}
		} catch (Exception) {
			$success = array(
				'result' => false
			);
			echo json_encode($success);
		}

		if ($insert_cart) {
			
			unset($_SESSION['cart']);
		}
	} else {
		$success = array(
			'result' => false
		);
		echo json_encode($success);
	}
} else {
	$success = array(
		'result' => false
	);
	echo json_encode($success);
}
