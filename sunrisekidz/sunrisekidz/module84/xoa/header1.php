<?php 
	include("require_inc.php"); 
	/*if (substr($_SERVER['HTTP_HOST'],0,3) != 'www') {
		header('HTTP/1.1 301 Moved Permanently');
		header('Location: http://www.'.$_SERVER['HTTP_HOST']
		.$_SERVER['REQUEST_URI']);
	}*/
	if(isset($_REQUEST['pqh'])) {
		$pqh = $_REQUEST['pqh'];
		$pqh = explode("/",$pqh);
		$mod = $pqh[0];
        $mod1 = $pqh[1];
        $mod2 = $pqh[2];
	}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="img/icon.png" rel="icon" />
    <base href="http://localhost/giaoduc/"  />
    <meta http-equiv="content-language" content="vi" />
    <title><?php include("module/title.php"); ?></title>
    <meta name="keywords" content="<?php include("module/key.php"); ?>" />
    <meta name="description" content="<?php include("module/desc.php")?>" />
    <meta name="robots" content="noodp,index,follow" />
    <meta name='revisit-after' content='1 days' />
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,300&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <script type="text/javascript" src="js/jquery-1.8.1.min.js"></script>
    <script type="text/javascript" src="js/script_menu.js"></script>
    <script type="text/javascript">
        // Định nghĩa hàm equalHeight căn các div cao bằng nhau
        
        function equalHeight(group) {
            var tallest = 0;
            group.each(function () {
                var thisHeight = jQuery(this).height();
                if (thisHeight > tallest) {
                    tallest = thisHeight;
                }
            });
            group.each(function () {
                jQuery(this).height(tallest);
            });
        }
        
        // Gọi hàm equalHeight
        jQuery(document).ready(function ($) {
            //equalHeight(jQuery('.div0'));
        });
        
    </script>
    <!--Slider-->
    <script type="text/javascript" src="js/jquery.bxslider.js"></script>
    <link rel="stylesheet" href="css/bxslider.css" />
     <script type="text/javascript">
    jQuery(document).ready(function($) {
		$('#slider').bxSlider({
		  auto: true,
		  autoControls: true,
		  pause: 6000,
		  slideMargin: 20
			});	
			});
    </script>
    <!--/Slider-->
    <!--scroll-->
    <script type="text/javascript" src="js/jquery.tinyscrollbar.js"></script>
    <link rel="stylesheet" href="css/tinyscrollbar.css" />
     <script type="text/javascript">
    jQuery(document).ready(function($) {
			 var $scrollbar = $("#scrollbar1");
                $scrollbar.tinyscrollbar();
				});
    </script>
    <!--Sp Menu-->
	<script type="text/javascript" src="js/jquery.meanmenu.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.meanmenu.css" />
	<script type="text/javascript">
    //menu
    $(document).ready(function(e) {
        $('#spmenu').meanmenu();
    });
    </script>
</head>
<body>
<?php    
	if($mod=='dang-xuat.html') {
	   unset($_SESSION['loginchame']);
       unset($_SESSION['userchame']);
       unset($_SESSION['idgv']);
 ?>
 <script type="text/javascript">
    location.assign('dang-nhap.html');
 </script>
 <?php
    }	
?>
    <section id="wrapper">
        <header>
            <div class="trai">
            <?php
                $s1 = $h->query("select noidung from h_html where id=1");
                $r1 = $h->fetch_array($s1);
                $s2 = $h->query("select noidung from h_html where id=2");
                $r2 = $h->fetch_array($s2);
                $s3 = $h->query("select noidung from h_html where id=3");
                $r3 = $h->fetch_array($s3);
                $s4 = $h->query("select noidung from h_html where id=4");
                $r4 = $h->fetch_array($s4);
                $s8 = $h->query("select noidung from h_html where id=8");
                        $r8 = $h->fetch_array($s8);
                        $s9 = $h->query("select noidung from h_html where id=9");
                        $r9 = $h->fetch_array($s9);
                        $s6 = $h->query("select noidung from h_html where id=6");
                        $r6 = $h->fetch_array($s6);
                        $s5 = $h->query("select noidung from h_html where id=5");
                        $r5 = $h->fetch_array($s5);
                        $s7 = $h->query("select noidung from h_html where id=7");
                        $r7 = $h->fetch_array($s7);
                        $s10 = $h->query("select noidung from h_html where id=10");
                        $r10 = $h->fetch_array($s10);
                        $s12 = $h->query("select noidung from h_html where id=12");
                        $r12 = $h->fetch_array($s12);
            ?>
                <p class="logo"><a href="<?=URL?>"><img src="upload/<?=$r1['noidung']?>" alt="logo" /></a></p>
                <div class="tentt">
                    <p class="cty"><?=$r2['noidung']?></p>
                    <p class="tencty"><?=$r3['noidung']?></p>
                    <p class="slogan"><?=$r4['noidung']?></p>
                </div>
                <p class="clr"></p>
            </div>
            <div class="timkiem">
                <input type="text" class="tk" id="keyword" placeholder="Tìm kiếm ..." />
                <input type="button" class="buttk" value="&nbsp;" />
            </div>
            <p class="cumicon">
                <a href='ymsgr:sendIM?<?=$r5['noidung']?>'><img class="tungicon" src="img/icon_yahoo.png" alt="Yahoo" /></a>
                <a href="skype:<?=$r6['noidung']?>?chat"><img class="tungicon" src="img/icon_skype.png" alt="Yahoo" /></a>
                <a href="#"><img class="tungicon" src="img/icon_mobile.png" alt="Yahoo" /></a>
                <a href="mailto:<?=$r7['noidung']?>"><img class="tungicon" src="img/icon_email.png" alt="Yahoo" /></a>
            </p>
            <p class="dkdn">
            <?php
                if(!isset($_SESSION['loginchame'])) {
            ?>
                <a href="dang-nhap.html">Đăng nhập</a>
            <?php } else echo '<a href="dang-xuat.html">Đăng xuất</a>'; ?>
            </p>
            <p class="clr"></p>
            <div class="clear"></div>
        </header>
        <!-- start #menu -->
        <div id="menu">
            <div class="menuu">
                <div class="csmenu">
                    <nav id="cssmenu" class="align-center">
                        <ul>
                            <li<?php if(!isset($_REQUEST['pqh'])) echo ' class="active"'; ?>><a href="<?=URL?>">Trang chủ</a></li>
                            <li<?php if($mod=='gioi-thieu') echo ' class="active"'; ?>><a href="gioi-thieu/">Giới thiệu</a>
                                <ul>
                                    <li<?php if($mod1=='lich-su-hinh-thanh.html') echo ' class="active"'; ?>><a href="gioi-thieu/lich-su-hinh-thanh.html">Lịch sử hình thành</a></li>
                                    <li<?php if($mod1=='tam-nhin-su-menh-gia-tri-muc-tieu.html') echo ' class="active"'; ?>><a href="gioi-thieu/tam-nhin-su-menh-gia-tri-muc-tieu.html">Tầm nhìn, Sứ mệnh, Giá trị, Mục tiêu</a></li>
                                    <li<?php if($mod1=='doi-ngu-giao-vien.html') echo ' class="active"'; ?>><a href="gioi-thieu/doi-ngu-giao-vien.html">Đội ngũ giáo viên</a></li>
                                    <li<?php if($mod1=='co-so-vat-chat.html') echo ' class="active"'; ?>><a href="gioi-thieu/co-so-vat-chat.html">Cơ sở vật chất</a></li>
                                </ul>
                            </li>
                            <li<?php if($mod=='dich-vu') echo ' class="active"'; ?>><a href="dich-vu/">Dịch vụ</a>
                                <ul>
                                    <li<?php if($mod1=='dao-tao.html') echo ' class="active"'; ?>><a href="dich-vu/dao-tao.html">Đào tạo</a></li>
                                    <li<?php if($mod1=='tap-huan.html') echo ' class="active"'; ?>><a href="dich-vu/tap-huan.html">Tập huấn</a></li>
                                    <li<?php if($mod1=='hoi-thao.html') echo ' class="active"'; ?>><a href="dich-vu/hoi-thao.html">Hội thảo</a></li>
                                </ul>
                            </li>
                            <li<?php if($mod=='hoat-dong') echo ' class="active"'; ?>><a href="hoat-dong/">Hoạt động</a>
                                <ul>
                                    <li<?php if($mod1=='tin-hoat-dong-trung-tam') echo ' class="active"'; ?>><a href="hoat-dong/tin-hoat-dong-trung-tam/">Tin hoạt động trung tâm</a></li>
                                    <li<?php if($mod1=='chuong-trinh-hoc') echo ' class="active"'; ?>><a href="hoat-dong/chuong-trinh-hoc/">Chương trình học</a></li>
                                    <li<?php if($mod1=='hinh-anh') echo ' class="active"'; ?>><a href="hoat-dong/hinh-anh/">Hình ảnh</a></li>
                                    <li<?php if($mod1=='clip-lien-ket-youtube') echo ' class="active"'; ?>><a href="hoat-dong/clip-lien-ket-youtube/">Clip liên kết Youtube</a></li>
                                </ul>
                            </li>
                            <li<?php if($mod=='cau-chuyen') echo ' class="active"'; ?>><a href="cau-chuyen/">Câu chuyện</a></li>
                            <li<?php if($mod=='goc-chuyen-gia') echo ' class="active"'; ?>><a href="goc-chuyen-gia/">Góc chuyên gia</a></li>
                            <li<?php if($mod=='qui-dinh-chinh-sach') echo ' class="active"'; ?>><a href="qui-dinh-chinh-sach/">Qui định - chính sách</a></li>
                            <li<?php if($mod=='cha-me') echo ' class="active"'; ?>><a href="cha-me/">Cha mẹ</a></li>
                            <li<?php if($mod=='uu-dai') echo ' class="active"'; ?>><a href="uu-dai/">Ưu đãi</a></li>
                            <li<?php if($mod=='lien-he.html') echo ' class="active"'; ?>><a href="lien-he.html">Liên hệ</a></li>
                            <li class="last <?php if($mod=='cam-ket') echo 'active'; ?>"><a href="cam-ket/">Cam kết</a></li>
                        </ul>
                        <div class="clear"></div>
                    </nav>
                </div>
            </div>
        </div>
         <div id="spmenu">
            <ul>
                <?php 
                    if(!isset($_REQUEST['pqh'])) {
                ?>
                <li><span>Trang chủ</span></li>
                <?php } else { ?>
                <li><a href="<?=URL?>">Trang chủ</a></li>
                <?php } ?>
                <li>
                <?php if($mod=='gioi-thieu') { ?>
                <span>Giới thiệu</span>
                <?php } else { ?>
                <a href="gioi-thieu/">Giới thiệu</a>
                <?php } ?>
                    <ul>
                        <li>
                        <?php if($mod1=='lich-su-hinh-thanh.html') { ?>
                            <span>Lịch sử hình thành</span>
                        <?php } else { ?>
                            <a href="gioi-thieu/lich-su-hinh-thanh.html">Lịch sử hình thành</a>
                        <?php } ?>                            
                        </li>
                        <li>
                        <?php if($mod1=='tam-nhin-su-menh-gia-tri-muc-tieu.html') { ?>
                            <span>Tầm nhìn, Sứ mệnh, Giá trị, Mục tiêu</span>
                        <?php } else { ?>
                            <a href="gioi-thieu/tam-nhin-su-menh-gia-tri-muc-tieu.html">Tầm nhìn, Sứ mệnh, Giá trị, Mục tiêu</a>
                        <?php } ?>
                        </li>
                        <li>
                        <?php if($mod1=='doi-ngu-giao-vien.html') { ?>
                            <span>Đội ngũ giáo viên</span>
                        <?php } else { ?>
                            <a href="gioi-thieu/doi-ngu-giao-vien.html">Đội ngũ giáo viên</a>
                        <?php } ?>
                        </li>
                        <li>
                        <?php if($mod1=='co-so-vat-chat.html') { ?>
                            <span>Cơ sở vật chất</span>
                        <?php } else { ?>
                            <a href="gioi-thieu/co-so-vat-chat.html">Cơ sở vật chất</a>
                        <?php } ?>
                        </li>
                    </ul>
                </li>
                <li>
                    <?php if($mod=='dich-vu') { ?>
                        <span>Dịch vụ</span>
                    <?php } else { ?>
                        <a href="dich-vu/">Dịch vụ</a>
                    <?php } ?>
                    <ul>
                        <li>
                        <?php if($mod1=='dao-tao.html') { ?>
                            <span>Đào tạo</span>
                        <?php } else { ?>
                            <a href="dich-vu/dao-tao.html">Đào tạo</a>
                        <?php } ?>
                        </li>
                        <li>
                        <?php if($mod1=='tap-huan.html') { ?>
                            <span>Tập huấn</span>
                        <?php } else { ?>
                            <a href="dich-vu/tap-huan.html">Tập huấn</a>
                        <?php } ?>
                        </li>
                        <li>
                        <?php if($mod1=='hoi-thao.html') { ?>
                            <span>Hội thảo</span>
                        <?php } else { ?>
                            <a href="dich-vu/hoi-thao.html">Hội thảo</a>
                        <?php } ?>
                        </li>
                    </ul>
                </li>
                <li>
                    <?php if($mod=='hoat-dong') { ?>
                    <span>Hoạt động</span>
                    <?php } else { ?>
                    <a href="hoat-dong/">Hoạt động</a>
                    <?php } ?>                    
                    <ul>
                        <li>
                        <?php if($mod1=='tin-hoat-dong-trung-tam') { ?>
                            <span>Tin hoạt động trung tâm</span>
                        <?php } else { ?>
                            <a href="hoat-dong/tin-hoat-dong-trung-tam/">Tin hoạt động trung tâm</a>
                        <?php } ?>
                        </li>
                        <li>
                        <?php if($mod1=='chuong-trinh-hoc') { ?>
                            <span>Chương trình học</span>
                        <?php } else { ?>
                            <a href="hoat-dong/chuong-trinh-hoc/">Chương trình học</a>
                        <?php } ?>
                        </li>
                        <li>
                        <?php if($mod1=='hinh-anh') { ?>
                            <span>Hình ảnh</span>
                        <?php } else { ?>
                            <a href="hoat-dong/hinh-anh/">Hình ảnh</a>
                        <?php } ?>
                        </li>
                        <li>
                        <?php if($mod1=='clip-lien-ket-youtube') { ?>
                            <span>Clip liên kết Youtube</span>
                        <?php } else { ?>
                            <a href="hoat-dong/clip-lien-ket-youtube/">Clip liên kết Youtube</a>
                        <?php } ?>
                        </li>
                    </ul>
                </li>
                <li>
                <?php if($mod=='cau-chuyen') { ?>
                    <span>Câu chuyện</span>
                <?php } else { ?>
                    <a href="cau-chuyen/">Câu chuyện</a>
                <?php } ?>
                </li>
                <li>
                <?php if($mod=='goc-chuyen-gia') { ?>
                    <span>Góc chuyên gia</span>
                <?php } else { ?>
                    <a href="goc-chuyen-gia/">Góc chuyên gia</a>
                <?php } ?>
                </li>
                <li>
                <?php if($mod=='qui-dinh-chinh-sach') { ?>
                    <span>Qui định chính sách</span>
                <?php } else { ?>
                    <a href="qui-dinh-chinh-sach/">Qui định chính sách</a>
                <?php } ?>
                </li>
                <li>
                <?php if($mod=='cha-me') { ?>
                    <span>Cha mẹ</span>
                <?php } else { ?>
                    <a href="cha-me/">Cha mẹ</a>
                <?php } ?>
                </li>
                <li>
                <?php if($mod=='uu-dai') { ?>
                    <span>Ưu đãi</span>
                <?php } else { ?>
                    <a href="uu-dai/">Ưu đãi</a>
                <?php } ?>
                </li>
                <li>
                <?php if($mod=='lien-he.html') { ?>
                    <span>Liên hệ</span>
                <?php } else { ?>
                    <a href="lien-he.html">Liên hệ</a>
                <?php } ?>
                </li>
                <li class="last">
                <?php if($mod=='cam-ket') { ?>
                    <span>Cam kết</span>
                <?php } else { ?>
                    <a href="cam-ket/">Cam kết</a>
                <?php } ?>
                </li>
              </ul>
          </div>
          <div id="spmenu2"></div>
          <div class="clear"></div>
        
        
        <!-- end #menu -->