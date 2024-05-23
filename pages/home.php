<!-- top-area End -->
<section id="home" class="welcome-hero">
    <div class="container">
        <div class="welcome-hero-txt">
            <h2>Nơi uy tín cho mọi nhà</h2>
            <p>
                Khám phá thế giới kỹ thuật số với linh kiện điện tử chất lượng cao, tạo nên những dự án sáng tạo không giới hạn. Hãy đến với chúng tôi và biến ý tưởng của bạn thành hiện thực!
            </p>
            <button class="welcome-btn" onclick="window.location.href='#service'">Tìm hiểu thêm</button>
        </div>
    </div>

    <div class="container">
        <?php include('common/sort.php'); ?>
    </div>

</section>
<div style="margin-bottom: 100px;"></div>

<div id="searchcontainer"></div>

<!-- Dich vu -->
<?php include('content/service.php'); ?>
<!-- Dich vu -->

<!--coupons start -->
<?php include('content/coupons.php'); ?>
<!--coupons end -->

<!--featured start -->
<?php
include('content/main-content.php');
?>
<!--featured end -->

<!-- clients-say strat -->
<?php
include('content/feedback.php');
?>
<!-- clients-say end -->

<!--brand strat -->
<?php
include('content/brand.php');
?>
<!--brand end -->

<!--blog start -->
<section id="blog" class="blog"></section>
<!--blog end -->