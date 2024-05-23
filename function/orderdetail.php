<?php
session_start();

$id_khachhang = $_SESSION['id_khachhang'];
$code_carts = $_SESSION['code_cart'];
$con = mysqli_connect("localhost", "root", "", "eshop");
$sql_lietke_dh = mysqli_query($con, "SELECT * FROM orders,signup WHERE orders.id_khachhang=signup.id_signup AND orders.id_khachhang='$id_khachhang' AND orders.code_order='$code_carts' ORDER BY orders.id ASC");
$index = 1;
$order_html = '';
$order_html .= '<div class="container-fluid">';
$order_html .= '<div class="row">';
$order_html .= '<div class="col-md-12">';
$order_html .= ' <div style="margin-top: 15px" class="table-responsive">';
$order_html .= '<table class="table table-light table-hover">';
$order_html .= '<thead class="thead-dark">';
$order_html .= '<tr>';
$order_html .= '<th>Mã đơn hàng</th>';
$order_html .= '<th>Họ tên</th>';

$order_html .= '<th>Tình trạng</th>';
$order_html .= '<th style="vertical-align: middle;">Ngày đặt</th>';
$order_html .= '<th width="50px">In đơn</th>';
$order_html .= '</tr>';
$order_html .= '</thead>';
foreach ($sql_lietke_dh as $item) {
    $order_html .= '<tr>';
    $order_html .= '<td>' . $item['code_order'] . '</td>';
    $order_html .= '<td>' . $item['name'] . '</td>';
  
    $order_html .= '<td>' . ($item['status'] == 1 ? 'Chưa xử lý' : 'Đã xem') . '</td>';
    $order_html .= '<td>' . $item['order_date'] . '</td>';
    $order_html .= '<td><a href="function/orderprint.php?action=xemdonhang&code=' . $item['code_order'] . '" target="_blank"><i class="fa fa-print" style="font-size: 22px;vertical-align: middle;"></i></a></td>';
    $order_html .= '</tr>';
}
$order_html .= '</table>';
$order_html .= '</div>';
$order_html .= '</div>';
$order_html .= '</div>';
$order_html .= '</div>';
$orders = array(
    'renderorder' => $order_html
);

echo json_encode($orders);
