<!-- start #chame -->
    <?php
        $sb = $h->query("select noidung from h_html where id=22");
        $rb = $h->fetch_array($sb);
    ?>
    <link rel="stylesheet" href="css/tab.css" />
        <div id="chame">
        	<div class="banner"><img src="upload/<?=$rb['noidung']?>"  alt="Banner cha mẹ"></div>
            <div class="boxl">
            <p class="pankuzu">Cha mẹ</p>
            <?php if(!isset($_SESSION['loginchame'])) { ?>
            <div class="child">
                Yêu cầu <a href="dang-nhap.html">đăng nhập</a><br />

Mỗi Bố mẹ khi đăng ký con vào trung tâm sẽ được cấp 1 tài khoản dùng để theo dõi tình hình học tập riêng của con em mình.

Thông tin gồm: Họ tên, hình ảnh, tuần 1 (Hành vi hiện tại, liệu pháp áp dụng, hành vi mới, nhận xét GV)

Sơ đồ biểu thị tiến trình phát triển của trẻ qua các Tuần.
            </div>
            <?php } else { 
                $scm = $h->query("select hoten,hinhanh,ngaysinh,diachi,sdt from h_hocsinh where id=".$_SESSION['loginchame']);
                $rcm = $h->fetch_array($scm);    
            ?>
            
            <div class="child">
            	<div class="child_l"><img src="upload/hocsinh/<?=$rcm['hinhanh']?>" width="127" alt="<?=$rcm['hoten']?>"></div>
                <p class="tit"><?=$rcm['hoten']?></p>
                <p>Ngày sinh: <?=$rcm['ngaysinh']?></p>
                <p>Địa chỉ: <?=$rcm['diachi']?></p>
                <p>Số điện thoại: <?=$rcm['sdt']?></p>
            	<div class="clear"></div>
            </div><!--child-->
            <div class="box_tab">
                <div class="tabs tab01">
                <?php
                    $sd = $h->query("select diem,hanhviht,lieuphap,hanhvimoi,nhanxetgv,sapxep from h_bangdiem where id_hs=".$_SESSION['loginchame']." and hienthi=1 order by sapxep");
                    while($rd = $h->fetch_array($sd)){
                    
                ?>
                      <h3>TUẦN <?=$rd['sapxep']?></h3>
                      <div>
                          <div class="tabs tab02">
                          	<!----->
                              <h4>Hành vi hiện tại</h4>
                              <div><?=$rd['hanhviht']?></div>
                              <!---/---->
                              <h4>Liệu pháp áp dụng</h4>
                              <div><?=$rd['lieuphap']?></div>
                          	<!----->
                              <h4>Hành vi mới</h4>
                              <div><?=$rd['hanhvimoi']?></div>
                              <!---/---->
                          	<!----->
                              <h4>Nhận xét GV</h4>
                              <div><?=$rd['nhanxetgv']?></div>
                              <!---/---->
                          	
                         </div><!--/tab02--->
                      </div><!--/---> 
                  <?php } ?>    
                      
                      
            		</div><!--tabs -->  
            </div><!--box_tab--->
            <div class="box_sodo">
            	<div class="box_tit">
                	<div class="title"><span>Sơ đồ biểu thị tiến trình phát triển của trẻ qua các Tuần</span></div>
                </div><!--box_tit-->
               <div class="img_sodo">
               <?php
                    $sdiem = $h->query("select diem from h_bangdiem where id_hs=".$_SESSION['loginchame']." and hienthi=1 order by sapxep asc");
                    $diem = array();
                    array_push($diem,0);
                    while($rdiem = $h->fetch_array($sdiem)){
                        array_push($diem,$rdiem['diem']);
                    }
                     include("pChart/pData.class");
                     include("pChart/pChart.class");
                    
                     // Dataset definition 
                     $DataSet = new pData;
                     $DataSet->AddPoint($diem);
                     $DataSet->AddSerie();
                     $DataSet->SetSerieName("Điểm","Serie1");
                    
                     // Initialise the graph
                     $Test = new pChart(780,250);
                     $Test->setFontProperties("Fonts/tahoma.ttf",10);
                     $Test->setGraphArea(40,30,760,200);
                     $Test->drawGraphArea(252,252,252,FALSE);
                     $Test->drawScale($DataSet->GetData(),$DataSet->GetDataDescription(),SCALE_NORMAL,51,51,51,TRUE,0,2);
                     $Test->drawGrid(4,TRUE,230,230,230,70);
                    
                     // Draw the line graph
                     $Test->drawLineGraph($DataSet->GetData(),$DataSet->GetDataDescription());
                     $Test->drawPlotGraph($DataSet->GetData(),$DataSet->GetDataDescription(),3,2,255,255,255);
                    
                     // Finish the graph
                     $Test->setFontProperties("Fonts/tahoma.ttf",8);
                     $Test->drawLegend(45,35,$DataSet->GetDataDescription(),255,255,255);
                     $Test->setFontProperties("Fonts/tahoma.ttf",10);
                     //$Test->drawTitle(740,20,"Tuần",50,50,50,20);
                     $Test->Render("upload/hocsinh/so_do_phat_trien_".$_SESSION['loginchame'].".png");
               ?>
               <img src="upload/hocsinh/so_do_phat_trien_<?=$_SESSION['loginchame']?>.png" width="760" alt="Sơ đồ biểu thị tiến trình phát triển của trẻ qua các Tuần" /></div>
            </div><!--box_sodo-->
            <?php } ?>
            </div><!--boxl-->
            <?php include("right.php"); ?>
            <div class="clr"></div>
         </div><!--hoatdong-->
         <script src="js/jquery.accTabs.js" type="text/javascript"></script>
         <script type="text/javascript">
            $(function() {
                $('.tab01').accTabs({
                    defaultTab: 0
                });
                $('.tab02').accTabs({
                    defaultTab:0
                });

            });
         </script>