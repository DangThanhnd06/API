<!-- start #hoatdong -->
<?php
    $sb = $h->query("select noidung from h_html where id=18");
    $rb = $h->fetch_array($sb);
    if(!isset($mod1)) {
        $tt = '';
        $id = 1;
    } else {
        switch($mod1){
            case 'lich-su-hinh-thanh.html':
                $id = 2;
                $tt = 'Lịch sử hình thành';
                break;
            case 'tam-nhin-su-menh-gia-tri-muc-tieu.html':
                $id = 3;
                $tt = 'Tầm nhìn, Sứ mệnh, Giá trị, Mục tiêu';
                break;
            case 'doi-ngu-giao-vien.html':
                $id = 4;
                $tt = 'Đội ngũ giáo viên';
                break;
            case 'co-so-vat-chat.html':
                $id = 5;
                $tt = 'Cơ sở vật chất';
                break;
            
        }
    }
    $s = $h->query("select tieude,hinhanh,noidung from h_thongtin where id=$id");
    $r = $h->fetch_array($s);
    $tieude = $r['tieude'];
    $ha = $r['hinhanh'];
    $nd = $r['noidung'];
?>
        <div class="hoatdong">
        	<div class="banner"><img src="upload/<?=$rb['noidung']?>"  alt="<?=$tieude?>"></div>
            <div class="boxl div0">
            <h2 class="pankuzu">Giới thiệu
            <?php if(isset($mod1)){ ?>
              &gt; <span><?=$tt?></span>
            <?php } ?>
            </h2>
            <h1><?=$tieude?></h1>
            <div class="child">
                <?php if($ha!='') { ?>
            	<p class="child_l"><img src="upload/thongtin/<?=$ha?>" alt="<?=$tieude?>"></p>
                <?php } ?>
                <div class="txt"><?=$nd?></div>
                <p class="clr"></p>
            </div><!--child-->
            </div><!--boxl-->
            <?php include("right.php"); ?>
            <p class="clr"></p>
         </div><!--hoatdong-->