<!-- start #hoatdong -->
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "9c3a4c1b-76aa-43c1-9b85-ed90d2ef8cf9", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<?php
    switch($mod){
        case "hoat-dong":
            $tdn = 'Hoạt động';
            $sos = $mod2;
            if($mod1=='tin-hoat-dong-trung-tam') {
                $idhtml = 14;
                $tdnn = '<a href="hoat-dong/">'.$tdn.'</a> &gt; <a href="hoat-dong/tin-hoat-dong-trung-tam/">Tin hoạt động của trung tâm</a>';
                $tt_id = 2;
            }
            if($mod1=='chuong-trinh-hoc') {
                $idhtml = 16;
                $tdnn = '<a href="hoat-dong/">'.$tdn.'</a> &gt; <a href="hoat-dong/chuong-trinh-hoc/">Chương trình học</a>';
                $tt_id = 8;
            }
            if($mod1=='hinh-anh') {
                $idhtml = 15;
                $tdnn = '<a href="hoat-dong/">'.$tdn.'</a> &gt; <a href="hoat-dong/hinh-anh/">Hình ảnh</a>';
                $tt_id = 9;
            }
            if($mod1=='clip-lien-ket-youtube') {
                $idhtml = 17;
                $tdnn = '<a href="hoat-dong/">'.$tdn.'</a> &gt; <a href="hoat-dong/clip-lien-ket-youtube/">Clip liên kết Youtube</a>';
                $tt_id = 10;
            }
            break;
        case "cau-chuyen":
            $idhtml = 19;
            $sos = $mod1;
            $tdnn = '<a href="cau-chuyen/">Câu chuyện</a>';
            $tt_id = 3;
            break;
        case "goc-chuyen-gia":
            $idhtml = 20;
            $sos = $mod1;
            $tdnn = '<a href="goc-chuyen-gia/">Góc chuyên gia</a>';
            $tt_id = 4;
            break;
        case "qui-dinh-chinh-sach":
            $idhtml = 21;
            $sos = $mod1;
            $tdnn = '<a href="qui-dinh-chinh-sach/">Qui định chính sách</a>';
            $tt_id = 5;
            break;
        case "uu-dai":
            $idhtml = 23;
            $sos = $mod1;
            $tdnn = '<a href="uu-dai/">Ưu đãi</a>';
            $tt_id = 6;
            break;
        case "cam-ket":
            $idhtml = 25;
            $sos = $mod1;
            $tdnn = '<a href="cam-ket/">Cam kết</a>';
            $tt_id = 7;
            break;
        case "thong-tin-tu-van":
            $idhtml = 20;
            $sos = $mod1;
            $tdnn = '<a href="cam-ket/">Cam kết</a>';
            $tt_id = 7;
            break;
    }
    $sb = $h->query("select noidung from h_html where id=$idhtml");
    $rb = $h->fetch_array($sb);
    $s = $h->query("select id,tieude,hinhanh,noidung,video from h_tintuc where tt_id=$tt_id and hienthi=1 order by sapxep desc,id desc");
    while($r = $h->fetch_array($s)){
        $lkk = chuoilink($r['tieude']).'.html';
        if($sos == $lkk){
            $tieude = $r['tieude'];
            $ha = $r['hinhanh'];
            $nd = $r['noidung'];
            $dulieu = "hienthi=1 and tt_id=$tt_id and id!=".$r['id'];
            $id = $r['id'];
            $video = $r['video'];
        }
    }
    $sessionName='articlee_'.$id;
    if(!isset($_SESSION["$sessionName"])){
        $_SESSION["$sessionName"] = 'session: '.$id;
        $slx = $h->query("select luotxem from h_tintuc where id=".$id);
        $rlx = $h->fetch_array($slx);
        $lxt = $rlx['luotxem']+1;
        mysql_query("UPDATE h_tintuc SET luotxem='".$lxt."' WHERE id='".$id."' ");
    }
    $tt = $tdnn." &gt; <span>$tieude</span>";
?>
        <div class="hoatdong">
        	<div class="banner"><img src="upload/<?=$rb['noidung']?>"  alt="<?=$tieude?>"></div>
            <div class="boxl div0">
            <h2 class="pankuzu"><?=$tt?></h2>
            <h1><?=$tieude?></h1>
            <div class="child">
                <?php if($tt_id == 10) { ?>
                <object class="videobv"><param name="movie" value="http://www.youtube.com/v/<?=$video?>?hl=vi_VN&amp;version=3"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/<?=$video?>?hl=vi_VN&amp;version=3" type="application/x-shockwave-flash" class="videobv" allowscriptaccess="always" allowfullscreen="true"></embed></object>
                
                <?php } if($ha!='') { ?>
            	<p class="child_l"><img src="upload/news/<?=$ha?>" alt="<?=$tieude?>"></p>
                <?php } ?>
                <div class="txt"><?=$nd?></div>
                <p class="clr"></p>
                <div class="chiase">
                    <span class='st_facebook_large' displayText='Facebook'></span>
<span class='st_googleplus_large' displayText='Google +'></span>
<span class='st_linkedin_large' displayText='LinkedIn'></span>
<span class='st_twitter_large' displayText='Tweet'></span>
<span class='st_pinterest_large' displayText='Pinterest'></span>
<span class='st_email_large' displayText='Email'></span>
                </div>
                <?php
                    $ss = $h->query("select id from h_tintuc where tt_id=$tt_id and id!=$id and hienthi=1");
                    $ns = $h->num_rows($ss);
                    if($ns){
                ?>
                <h3>Tin liên quan</h3>
                <script type="text/javascript">
                    jQuery(document).ready(function($){
                        function loading_show(){
                            $('#loading').html("<img src='img/loading.gif'/>").fadeIn('fast');
                        }
                        function loading_hide(){
                            $('#loading').fadeOut('fast');
                        }                
                        function loadData(page){
                            loading_show();                   
                            $.ajax
                            ({
                                type: "POST",
                                url: "module/hoatdonglq_data.php",
                                //data: "page="+page,
                                data: {page: page, dulieu: "<?php echo $dulieu; ?>",tt_id:"<?=$tt_id?>"},
                                success: function(msg)
                                {
                                    $("#thuong").ajaxComplete(function(event, request, settings)
                                    {
                                        loading_hide();
                                        $("#thuong").html(msg);
                                    });
                                }
                            });
                        }
                        loadData(1);  // For first time page load default results
                        $('#paging_button li.mo').live('click',function(){
                            var page = $(this).attr('p');
                            loadData(page);
                            $('html, body').animate({scrollTop: $(".pankuzu").offset().top}, 2000);
                        }); 
                       
                            
                    });
                </script>
                <div id="loading"></div>
                <ul id="thuong"></ul>
                <?php
                    }
                ?>
            </div><!--child-->
            </div><!--boxl-->
            <?php include("right.php"); ?>
            <p class="clr"></p>
         </div><!--hoatdong-->