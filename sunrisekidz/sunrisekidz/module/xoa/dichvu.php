<!-- start #hoatdong -->
<?php
    $sb = $h->query("select noidung from h_html where id=13");
    $rb = $h->fetch_array($sb);
    if(!isset($mod1)) {
        $tt = 'Đào tạo';
        $id = 1;
    } else {
        switch($mod1){
            case 'dao-tao.html':
                $id = 1;
                $tt = 'Đào tạo';
                break;
            case 'tap-huan.html':
                $id = 2;
                $tt = 'Tập huấn';
                break;
            case 'hoi-thao.html':
                $id = 3;
                $tt = 'Hội thảo';
                break;
        }
    }
    $s = $h->query("select tieude,hinhanh,noidung from h_tintuc where id=$id");
    $r = $h->fetch_array($s);
    $tieude = $r['tieude'];
    $ha = $r['hinhanh'];
    $nd = $r['noidung'];
?>
        <div class="hoatdong">
        	<div class="banner"><img src="upload/<?=$rb['noidung']?>"  alt="<?=$tieude?>"></div>
            <div class="boxl div0">
            <h2 class="pankuzu">Dịch vụ &gt; <span><?=$tt?></span></h2>
            <h1><?=$tieude?></h1>
            <div class="child">
                <?php if($ha!='') { ?>
            	<p class="child_l"><img src="upload/news/<?=$ha?>" alt="<?=$tieude?>"></p>
                <?php } ?>
                <div class="txt"><?=$nd?></div>
                <p class="clr"></p>
            </div><!--child-->
            </div><!--boxl-->
            <?php include("right.php"); ?>
            <p class="clr"></p>
         </div><!--hoatdong-->