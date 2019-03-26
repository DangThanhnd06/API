<p class="breadcrumbs"><a href="<?=URL?>">Trang chủ</a> &raquo; Video tư vấn</p>
<!-- start .row1 -->
    	<div class="row1 hanhtrinhlm">
            <h2 class="title14">Video tư vấn</h2>
    		<div class="dtdichvu">
    			<script type="text/javascript">
	
            	  // When the document loads do everything inside here ...
            	  jQuery(document).ready(function($){
      	          <?php 
                    if($mod=='blog.html' || $mod=='su-kien-khuyen-mai.html' || $mod=='su-kien-khuyen-mai'){
                        $acc = ' activ';
                 ?>
            		$('#content_3,#content_2,#content_4,#content_5,#content_6').css('display','none');
                 <?php } if($mod=='video-tu-van.html' || $mod=='video-tu-van'){ 
                        $acc1 = ' activ';
                 ?>
                    $('#content_3,#content_1,#content_4,#content_5,#content_6').css('display','none');
                 <?php } if($mod=='me-can-biet.html' || $mod=='me-can-biet' || $mod=='tinh-ngay-du-sinh.html' || $mod=='tinh-ngay-rung-trung.html' || $mod=='su-phat-trien-cua-thai-nhi.html' || $mod=='kiem-tra-lan-da.html'){
                    $acc2 = ' activ';
                 ?>
                    $('#content_2,#content_1,#content_4,#content_5,#content_6').css('display','none');
                 <?php
                 } if($mod=='hoi-me-bau-dep-sau-sinh.html' || $mod=='hoi-me-bau-dep-sau-sinh'){
                    $acc3 = ' activ';
                 ?>
                    $('#content_2,#content_1,#content_3,#content_5,#content_6').css('display','none');
                 <?php
                 } if($mod=='bao-chi-noi-ve-green-field-spa.html' || $mod=='bao-chi-noi-ve-green-field-spa') {
                    $acc4 = ' activ';
                 ?>
                 $('#content_2,#content_1,#content_3,#content_4,#content_6').css('display','none');
                 <?php
                 } if($mod=='khach-hang-noi-ve-green-field-spa.html' || $mod=='khach-hang-noi-ve-green-field-spa') {
                    $acc5 = ' activ';
                 ?>
                 $('#content_2,#content_1,#content_3,#content_4,#content_5').css('display','none');
                 <?php   
                 }
                 
                 ?>
                   	// When a link is clicked
            		$("a.tab").click(function () {
            			
            			
            			// switch all tabs off
            			$(".activ").removeClass("activ");
            			
            			// switch this tab on
            			$(this).addClass("activ");
            			
            			// slide all content up
            			$(".content").slideUp();
            			
            			// slide this content up
            			var content_show = $(this).attr("rel");
            			$("#"+content_show).slideDown();
            		  
            		});
            	
            	  });
              </script>
                <div class="tabbed_area">
                    <ul class="tabss">
                        <li><a href="su-kien-khuyen-mai.html" rel="content_1" class="tab<?=$acc?>">Sự kiện<br />Khuyến mãi</a></li>
                        <li><a href="video-tu-van.html" rel="content_2" class="tab<?=$acc1?>">Video<br />Tư vấn</a></li>
                        <li><a href="me-can-biet.html" rel="content_3" class="tab<?=$acc2?>">Mẹ<br />Cần biết</a></li>
                        <li><a href="hoi-me-bau-dep-sau-sinh.html" rel="content_4" class="tab<?=$acc3?>">Hội mẹ bầu<br />đẹp sau sinh</a></li>
                        <li><a href="bao-chi-noi-ve-green-field-spa.html" rel="content_5" class="tab<?=$acc4?>">Báo chí nói về<br />Green Field</a></li>
                        <li><a href="khach-hang-noi-ve-green-field-spa.html" rel="content_6" class="tab<?=$acc5?> last">Khách hàng nói về<br />Green Field</a></li>
                    </ul>
                    <div id="content_1" class="content">
                        
                    </div>
                    <div id="content_2" class="content">
                        <div class="dtgioithieu">
                			<div class="mnhinh">
                            
                				<div class="mngt">
                                <?php
                                    $ss = $h->query("select id,tieude,p_id3,video,noidung from h_tintuc where hienthi=1 and p_id1=5 and p_id2=3 and p_id3!=0 and p_id4=0 and video!='' order by sapxep desc,id desc");
                                    while($rs = $h->fetch_array($ss)){
                                        $linkss = chuoilink($rs['tieude']).'.html';
                                        if($linkss == $mod1){
                                            $p_id3ss = $rs['p_id3'];
                                            $_SESSION['idd'] = $rs['id'];
                                            $video = $rs['video'];
                                            $noidung = $rs['noidung'];
                                            $tieude = $rs['tieude'];
                                            break;
                                        }
                                    }
                                    $sm1 = $h->query("select tieude,p_id3 from h_tintuc where hienthi=1 and p_id1=5 and p_id2=3 and p_id3!=0 and p_id4=0 and video='' order by sapxep,id");
                                    while($rm1 = $h->fetch_array($sm1)){
                                        if($rm1['p_id3']==$p_id3ss) $clss = ' class="dangxem"';
                                        else $clss = '';
                                        $linkm1 = 'video-tu-van/'.chuoilink($rm1['tieude']).'.html';
                                        echo '<span class="tungmngt"><a'.$clss.' href="'.$linkm1.'">'.$rm1['tieude'].'</a></span>';
                                    } 
                                ?>
                				</div>
                                <?php
                                    $sh1 = $h->query("select tieude,hinhanh from h_tintuc where hienthi=1 and p_id1=5 and p_id2=3 and p_id3=$p_id3ss and p_id4=0 and video=''");
                                    $rh1 = $h->fetch_array($sh1);
                                    if($rh1['hinhanh']!='') $hinh1 = 'upload/news/'.$rh1['hinhanh'];
                                    else $hinh1 = 'images/no-image.png';
                                ?>
                				<div class="hinhgt">
                					<img src="<?=$hinh1?>" alt="<?=$rh1['tieude']?>" />
                				</div>
                                
                				<p class="clr"></p>	
                			</div>
                		</div>
                        <h1 class="title1"><?=$tieude?></h1>
                        <div class="dtgioithieu">
                            <div class="ndgioithieu">
                                <div class="ndgt">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content" id="content_3">
                        
                    </div>
                    <div id="content_4" class="content">
                        
                    </div>
                    <div class="content" id="content_5">
                        
                    </div>
                    <div id="content_6" class="content">
                        
                    </div>
                </div>
                
            </div>
        </div>
                    