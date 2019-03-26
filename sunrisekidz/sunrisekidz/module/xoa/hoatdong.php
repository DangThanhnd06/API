<!-- start #hoatdong -->
<?php
    switch($mod){
        case "hoat-dong":
            $tdn = 'Hoạt động';
            if(!isset($mod1) || $mod1=='' || $mod1=='tin-hoat-dong-trung-tam') {
                $idhtml = 14;
                $dl = "hienthi=1 and tt_id=2";
                $tdnn = '<a href="hoat-dong/">'.$tdn.'</a> &gt; <span>Tin hoạt động của trung tâm</span>';
                $tdnd = 'Tin hoạt động của trung tâm';
                $tt_id = 2;
            }
            if($mod1=='chuong-trinh-hoc') {
                $idhtml = 16;
                $dl = "hienthi=1 and tt_id=8";
                $tdnn = '<a href="hoat-dong/">'.$tdn.'</a> &gt; <span>Chương trình học</span>';
                $tdnd = 'Chương trình học';
                $tt_id = 8;
            }
            if($mod1=='hinh-anh') {
                $idhtml = 15;
                $dl = "hienthi=1 and tt_id=9";
                $tdnn = '<a href="hoat-dong/">'.$tdn.'</a> &gt; <span>Hình ảnh</span>';
                $tdnd = 'Hình ảnh';
                $tt_id = 9;
            }
            if($mod1=='clip-lien-ket-youtube') {
                $idhtml = 17;
                $dl = "hienthi=1 and tt_id=10";
                $tdnn = '<a href="hoat-dong/">'.$tdn.'</a> &gt; <span>Clip liên kết Youtube</span>';
                $tdnd = 'Clip liên kết Youtube';
                $tt_id = 10;
            }
            break;
        case "cau-chuyen":
            $idhtml = 19;
            $dl = "hienthi=1 and tt_id=3";
            $tdnn = 'Câu chuyện';
            $tdnd = 'Câu chuyện';
            $tt_id = 3;
            break;
        case "goc-chuyen-gia":
            $idhtml = 20;
            $dl = "hienthi=1 and tt_id=4";
            $tdnn = 'Góc chuyên gia';
            $tdnd = 'Góc chuyên gia';
            $tt_id = 4;
            break;
        case "qui-dinh-chinh-sach":
            $idhtml = 21;
            $dl = "hienthi=1 and tt_id=5";
            $tdnn = 'Qui định chính sách';
            $tdnd = 'Qui định chính sách';
            $tt_id = 5;
            break;
        case "uu-dai":
            $idhtml = 23;
            $dl = "hienthi=1 and tt_id=6";
            $tdnn = 'Ưu đãi';
            $tdnd = 'Ưu đãi';
            $tt_id = 6;
            break;
        case "cam-ket":
            $idhtml = 25;
            $dl = "hienthi=1 and tt_id=7";
            $tdnn = 'Cam kết';
            $tdnd = 'Cam kết';
            $tt_id = 7;
            break;
        
    }
    $sb = $h->query("select noidung from h_html where id=$idhtml");
    $rb = $h->fetch_array($sb);
?>
        <div class="hoatdong">
        	<div class="banner"><img src="upload/<?=$rb['noidung']?>"  alt="<?=$tdnd?>" /></div>
            <div class="boxl div0">
            <h2 class="pankuzu"><?=$tdnn?></h2>
            <h1><?=$tdnd?></h1>
            <?php
                        $s = $h->query("select id from h_tintuc where $dl");
                        $n = $h->num_rows($s);
                        if($n){
                    ?>
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
                                url: "module/hoatdong_data.php",
                                //data: "page="+page,
                                data: {page: page, dulieu: "<?php echo $dl; ?>",tt_id:"<?=$tt_id?>"},
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
                <div id="thuong"></div>
                <?php 
                    } else echo '<div class="child"><p style="color:red;text-align:center;font-weight:500;">Tạm thời chưa có dữ liệu trên trang này !!!</p></div>';
                ?> 
            </div><!--boxl-->
            <?php include("right.php"); ?>
            <div class="clr"></div>
         </div><!--hoatdong-->
         <div class="clr"></div>