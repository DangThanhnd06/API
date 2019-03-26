<!-- start #hoatdong -->
<?php
    $sb = $h->query("select noidung from h_html where id=22");
    $rb = $h->fetch_array($sb);
?>
        <div class="hoatdong">
        	<div class="banner"><img src="upload/<?=$rb['noidung']?>"  alt="Banner cha mẹ" /></div>
            <div class="boxl div0">
            <h2 class="pankuzu">Cha mẹ</h2>
            <h1>Cha mẹ</h1>
            <?php if(!isset($_SESSION['chamehs'])) { ?>
            <div class="child">
                <div class="txt">
                Yêu cầu đăng nhập<br />

Mỗi Bố mẹ khi đăng ký con vào trung tâm sẽ được cấp 1 tài khoản dùng để theo dõi tình hình học tập riêng của con em mình.

Thông tin gồm: Họ tên, hình ảnh, tuần 1 (Hành vi hiện tại, liệu pháp áp dụng, hành vi mới, nhận xét GV, nhận xét phụ huynh)

Sơ đồ biểu thị tiến trình phát triển của trẻ qua các Tuần. <br />

                </div>
                <p class="clr"></p>
            </div><!--child-->
            <?php } ?>
            </div><!--boxl-->
            <?php include("right.php"); ?>
            <p class="clr"></p>
         </div><!--hoatdong-->