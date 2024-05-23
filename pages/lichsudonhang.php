<?php
session_start();
require_once('../config/dbhelper.php');

if (isset($_SESSION['dangky'])) {
  $id_khachhang = $_SESSION['id_khachhang'];
  $con = mysqli_connect("localhost", "root", "", "eshop");
  $sql_lietke_dh = mysqli_query($con, "SELECT * FROM orders,signup WHERE orders.id_khachhang=signup.id_signup AND orders.id_khachhang='$id_khachhang' ORDER BY orders.id ASC");

?>
  <section id="orderclient" class="history-order featured-cars">
    <div class="container">
      <div class="section-header">
        <h2>Lịch sử đơn hàng</h2>
      </div>
      <div class="featured-cars-content">
        <div class="row">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead class="thead-dark">
                <tr>
                  <th>Mã đơn hàng</th>
                  <th>Họ tên</th>
                  <th style="vertical-align: middle;">Email</th>
                  <th>Tình trạng</th>
                  <th style="vertical-align: middle;">Ngày đặt</th>
                  <th width="50px">Chi tiết</th>
                </tr>
              </thead>
              <?php
              foreach ($sql_lietke_dh as $item) {
              ?>
                <tr>

                  <td><?php echo $item['code_order'] ?></td>
                  <td><?php echo $item['name'] ?></td>
                  <td><?php echo $item['phone'] ?></td>
                  <td>
                    <?php if ($item['status'] == 1) {
                      echo 'Chưa xử lý';
                    } else {
                      echo 'Đã xem';
                    }
                    ?>
                  </td>
                  <td><?php echo $item['order_date'] ?></td>
                  <td><a href="function/orderprint.php?action=xemdonhang&code=<?php echo $item['code_order'] ?>" target="_blank"><i class="fa fa-print" style="font-size: 22px;vertical-align: middle;"></i></a></td>
                </tr>
              <?php
              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php
  include('../content/service.php');
  include('../content/main-content.php');
}
?>