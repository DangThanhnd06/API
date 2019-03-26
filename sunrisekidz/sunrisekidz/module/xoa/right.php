<div class="boxr div0">
    <?php
        if($mod=='cha-me' || $mod=='chia-se-kinh-nghiem' || $mod=='cau-hoi-cua-cha-me'){
    ?>
        <div class="child">
                	<h2>CHIA SẺ KINH NGHIỆM</h2>
                    <ul>
                    <?php 
                        $skn = $h->query("select tieude from h_tintuc where tt_id=12 and hienthi=1 order by sapxep desc,id desc limit 0,7");
                        $nkn = $h->num_rows($skn);
                        if($nkn){
                            while($rkn = $h->fetch_array($skn)){
                                $linkkn = 'chia-se-kinh-nghiem/'.chuoilink($rkn['tieude']).'.html';
                    ?>
                    	<li><a href="<?=$linkkn?>"><?=$rkn['tieude']?></a></li>
                     <?php } ?>
                        <p id="xemthem"><a href="chia-se-kinh-nghiem/">Xem nhiều hơn</a></p>
                     <?php } ?>
                    </ul>
                </div><!--child-->
            	<div class="child">
                	<h2>CÁC CÂU HỎI CỦA CHA MẸ </h2>
                    <ul>
                   	<?php 
                        $sch = $h->query("select tieude from h_tintuc where tt_id=13 and hienthi=1 order by sapxep desc,id desc limit 0,7");
                        $nch = $h->num_rows($sch);
                        if($nch){
                            while($rch = $h->fetch_array($sch)){
                                $linkch = 'cau-hoi-cua-phu-huynh/'.chuoilink($rch['tieude']).'.html';
                    ?>
                    	<li><a href="<?=$linkch?>"><?=$rch['tieude']?></a></li>
                     <?php } ?>
                        <p id="xemthem01"><a href="cau-hoi-cua-phu-huynh/">Xem nhiều hơn</a></p>
                     <?php } ?>
                    </ul>
                </div><!--child-->
            	<div class="child">
                	<h2>CHÁT VỚI GIÁO VIÊN</h2>
                    <script type="text/javascript" src="http://www.skypeassets.com/i/scom/js/skype-uri.js"></script>
                    <?php
                        $sht = $h->query("select yahoo,skype,hoten from h_giaovien where kichhoat=1");
                        while($rht = $h->fetch_array($sht)){
                            if($rht['yahoo']!='') {
                    ?>
                    <div class="box_yahoo">
                    	<div class="yahoo_l">
                         <a href="ymsgr:sendim?<?=$rht['yahoo']?>">
                            <img src="http://opi.yahoo.com/online?u=<?=$rht['yahoo']?>&m=g&t=2" alt="" border=0 width="125" />
                        </a>
                        </div>
                        <div class="yahoo_name"><?=$rht['hoten']?></div>
                        <div class="clear"></div>
                    </div>               
                    <?php } if($rht['skype']!='') { ?>
                    <div class="box_yahoo">
                        <div class="yahoo_l">
                         <div id="SkypeButton_Call_<?=$rht['skype']?>_1" style="margin: -20px 0 -25px 0;">
                         <script type="text/javascript">
                             Skype.ui({
                                 "name": "chat",
                                 "element": "SkypeButton_Call_<?=$rht['skype']?>_1",
                                 "participants": ["<?=$rht['skype']?>"],
                                 "imageSize": 24
                             });
                         </script>
                        </div>
                        </div>
                        <div class="yahoo_name"><?=$rht['hoten']?></div>
                        <div class="clear"></div>
                    </div>
                    <?php } } ?>
                 </div><!--child-->
                
    <?php
        } else {
    ?>
            	<div class="child">
                	<h2>BÀI ĐỌC NHIỀU NHẤT</h2>
                    <ul>
                    <?php 
                        $sdn = $h->query("select tt_id,tieude from h_tintuc where tt_id!=10 and hienthi=1 order by luotxem desc,sapxep desc, id desc limit 0,5");
                        while($rdn = $h->fetch_array($sdn)){
                            $tt_id = $rdn['tt_id'];
                            switch($tt_id){
                                case 2:
                                    $lk = 'hoat-dong/tin-hoat-dong-trung-tam/';
                                    break;
                                case 3:
                                    $lk = 'cau-chuyen/';
                                    break;
                                case 4:
                                    $lk = 'goc-chuyen-gia/';
                                    break;
                                case 5:
                                    $lk = 'qui-dinh-chinh-sach/';
                                    break;
                                case 6:
                                    $lk = 'uu-dai/';
                                    break;
                                case 7:
                                    $lk = 'cam-ket/';
                                    break;
                                case 8:
                                    $lk = 'hoat-dong/chuong-trinh-hoc/';
                                    break;
                                case 9:
                                    $lk = 'hoat-dong/hinh-anh/';
                                    break;
                            }
                            $lkk = $lk.chuoilink($rdn['tieude']).'.html';
                    ?>
                    	<li><a href="<?=$lkk?>"><?=$rdn['tieude']?></a></li>
                     <?php } ?>
                    </ul>
                </div><!--child-->
                <?php
                    $stv = $h->query("select tieude from h_tintuc where hienthi=1 and tt_id=11 order by sapxep desc,id desc limit 0,5");
                    $ntv = $h->fetch_array($stv);
                    if($ntv) {        
                ?>
            	<div class="child">
                	<h2>THÔNG TIN TƯ VẤN</h2>
                    <ul>
                        <?php 
                            while($rtv = $h->fetch_array($stv)){
                                $lik = 'thong-tin-tu-van/'.chuoilink($rtv['tieude']).'.html';
                        ?>
                    	<li><a href="<?=$lik?>"><?=$rtv['tieude']?></a></li>
                        <?php } ?>
                    </ul>
                </div><!--child-->
                <?php } ?>
            	<div class="child">
                	<h2>VIDEO</h2>
                    <div class="video">
                    <?php
                        $sv = $h->query("select id,video from h_tintuc where hienthi=1 and tt_id=10 and video!='' order by sapxep desc,id desc");
                        $rv = $h->fetch_array($sv);
                    ?>
                        <object class="videogt"><param name="movie" value="http://www.youtube.com/v/<?=$rv['video']?>?hl=vi_VN&amp;version=3"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/<?=$rv['video']?>?hl=vi_VN&amp;version=3" type="application/x-shockwave-flash" class="videogt" allowscriptaccess="always" allowfullscreen="true"></embed></object>
                    </div>
                    <div id="scrollbar1">
                        <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
                        <div class="viewport">
                             <div class="overview">
                             <?php
                                $svv = $h->query("select id,tieude from h_tintuc where hienthi=1 and tt_id=10 and id!=".$rv['id']." order by sapxep desc,id desc limit 0,12");
                                while($rvv = $h->fetch_array($svv)){
                                    
                             ?>
                               <p><a class="xemvideo" rel="<?=$rvv['id']?>"><?=$rvv['tieude']?></a></p>
                             <?php } ?>
                            </div>
                        </div>
                    </div>
                </div><!--child-->
                <script type="text/javascript">
                    jQuery(document).ready(function($){
                        $('.xemvideo').click(function(){
                            var idvd = $(this).attr('rel');
                            $.post("module/xemvideo.php", {
    							id: idvd
    						},  function(data){
    						  $('.video').fadeIn().html(data);	
    					    });
                        });
                    });
                </script>
    <?php } ?>
            </div><!--boxr-->
            